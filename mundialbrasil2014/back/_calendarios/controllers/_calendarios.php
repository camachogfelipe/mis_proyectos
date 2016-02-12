<?php

    /**
     * @autor Elbert Tous
     * @email elbert.tous@imaginamos.co
     * @company Imaginamos S.A.S | Todos los derechos reservados
     * @date Mon, 16 Jun 2014 15:47:23
     */

                        

class _calendarios extends Back_Controller {
	protected $admin_area = true;
	public $model = 'calendario';
	public $name = 'calendarios';
	public $title = 'Calendarios';


	public function __construct() {
		parent::__construct();
		$this->menu();
		$this->migas($this->current_menu);
		$this->add_modular_assets('js', 'autoload');
	}

	public function menu() {
		return $this->current_menu['Calendarios'] = cms_url('calendarios');
	}

	public function index() {
		$data['pag'] = $this->session->userdata('page_'.  $this->name);
		$this->session->set_userdata('page_'.$this->name, '1');
		$data['title_page'] = $this->title;
		$data['pag'] = 1;
		$data['migas'] = $this->miga;
		$data['pag_content'] = $this->contents();
		$data['pag_content_title'] = ucwords ($this->title);
		return $this->build('index', $data);
	}

	public function contents() {
		$data['path_delete'] = cms_url($this->name.'/delete');
		$data['path_add'] = cms_url($this->name.'/form');
		$data['path_edit'] = cms_url($this->name.'/form');
		$data['path_list'] = cms_url($this->name.'/lista');
		$data['mpag_content'] = $this->lista();
		$data['pag'] = 1;
		$this->session->set_userdata('page_'.$this->name, '1');
		return $this->buildajax('control', $data);
	}

	public function form() {
		$obj = new $this->model();
		$id = $this->_post('id');
		if(!empty($id))
		  $obj->join_related('equipo1')->join_related('equipo2')->get_by_id($id);
		$data['form_content'] = "";
		$data['form_content'] .= $this->inputHidden($obj->id, "id");
		
		$data['form_content'] .= $this->inputDate($obj->fecha, "fecha", "Fecha del partido", "Ingrese la fecha del partido", $obj->get_rule("fecha", "required"), "span2", "yyyy/mm/dd");
		
		$data['form_content'] .= $this->inputTime($obj->hora, "hora", "Hora del partido", "Ingrese la hora de Colombia del partido. Formato 12 Horas", $obj->get_rule("hora", "required"), "span2");
		
		$equipos = $obj->get_equipo1_list(array("nombre"));
		
		$data['form_content'] .= $this->combox($obj->equipo1_id, $equipos, "equipo1_id", "Equipo 1", "Seleccionar un equipo", $obj->get_rule("equipo1", "required"), "span3");
		
		$data['form_content'] .= $this->combox($obj->equipo2_id, $equipos, "equipo2_id", "Equipo 2", "Seleccionar un equipo", $obj->get_rule("equipo2", "required"), "span3");
		
		$data['form_content'] .= $this->input($obj->goles_equipo1, "goles_equipo1", $obj->get_rule("goles_equipo1", "max_length"), "Goles del equipo 1", "Maximo " . $obj->get_rule("equipo1", "max_length") . " caracteres, y solo numeros", $obj->get_rule("equipo1", "required"), "span3");
		
		$data['form_content'] .= $this->input($obj->goles_equipo2, "goles_equipo2", $obj->get_rule("goles_equipo2", "max_length"), "Goles del equipo 2", "Maximo " . $obj->get_rule("equipo2", "max_length") . " caracteres, y solo numeros", $obj->get_rule("equipo2", "required"), "span3");
		
		$fases = array(
							array('id' => 'GRUPOS', 'name' => 'GRUPOS'),
							array('id' => 'OCTAVOS', 'name' => 'OCTAVOS DE FINAL'),
							array('id' => 'CUARTOS', 'name' => 'CUARTOS DE FINAL'),
							array('id' => 'SEMIFINAL', 'name' => 'SEMIFINAL'),
							array('id' => 'FINAL', 'name' => 'FINAL'),
						 );
		
		$data['form_content'] .= $this->combox($obj->fase, $fases, "fase", "Fase en que se juega el partido", "Seleccionar una fase", $obj->get_rule("fase", "required"), "span3");

		$data['direct_form'] = $this->name.'/add';
		return $this->buildajax('control/form', $data);
	}

	public function lista() {
		$obj = new $this->model();
		$data['datos'] = $obj->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->order_by('id', 'asc')->order_by("fecha", "asc")->order_by("hora", "asc")->get();
		$data['direct_form'] = $this->name.'/delete';
		return $this->buildajax('control/lista', $data);
	}

	public function add() {
		$error = false;
		$msg = "";
		$obj = new $this->model();
		$obj->get_by_id($this->_post('id'));
		if(!$obj->exists())
		$obj->id = "";
		$this->loadVar($obj);
		if($obj->equipo1 == $obj->equipo2) :
			$error = true;
			$msg = "El equipo es el mismo";
		else :
			if (!$obj->save()) :
				$error = true;
				$msg = $obj->error->string;
				$this->deleteImg($this->data_id_obj_path($obj));
			else :
				if($obj->fase == "GRUPOS") :
					$this->definir_posiciones($obj->equipo1_id);
					$this->definir_posiciones($obj->equipo2_id);
				endif;
			endif;
		endif;
		if ($error)
			$this->set_alert_session("Error guardando datos," . $msg, 'error');
		else
			$this->set_alert_session("Datos Guardados con exito...!", 'info');
		redirect(cms_url($this->name));
	}

	public function delete() {
		$error = false;
		$obj = new $this->model();
		$obj->get_by_id($this->_post('value'));
		$msg = "";
		if ($obj->exists()) {
			$id_file = $this->data_id_obj_path($obj);
			if (!$obj->delete()){
				$error = true;
				$msg = $obj->error->string;
			}
			$this->delete_files($this->data_file_path($obj));
			$this->deleteImg($id_file);
		} else {
			$error = true;
			$msg = "No existe item...!";
		}
		if ($error)
			$this->set_alert('Error al eliminar datos' . ', ' . $msg, 'error');
		else{
			$this->set_alert_session("Datos eliminados con éxito...!", 'info');
		}
		return $this->render_json(!$error);
	}

	private function definir_posiciones($equipo) {
		$data = new $this->model();
		$data = $data->where("equipo1_id", $equipo)->or_where("equipo2_id", $equipo)->get()->all_to_array();
		$obj1 = new posiciones();
		$obj1->where("equipo_id", $equipo)->get();
		$obj1->pts = $obj1->pj = $obj1->pg = $obj1->pe = $obj1->pp = $obj1->gf = $obj1->gc = $obj1->dg = 0;
		foreach($data as $dat) :
			if(!is_null($dat['goles_equipo1']) and !is_null($dat['goles_equipo2'])) :
				if($dat['goles_equipo1'] == $dat['goles_equipo2']) :
					$obj1->pts += 1;
					$obj1->pe += 1;
				endif;
				if($dat['equipo1_id'] == $equipo) :
					if($dat['goles_equipo1'] > $dat['goles_equipo2']) :
						$obj1->pts += 3;
						$obj1->pg += 1;
					elseif($dat['goles_equipo1'] < $dat['goles_equipo2']) :
						$obj1->pp += 1;
					endif;
				elseif($dat['equipo2_id'] == $equipo) :
					if($dat['goles_equipo1'] > $dat['goles_equipo2']) :
						$obj1->pp += 1;
					elseif($dat['goles_equipo1'] < $dat['goles_equipo2']) :
						$obj1->pts += 3;
						$obj1->pg += 1;
					endif;
				endif;
				if($dat['equipo1_id'] == $equipo) :
					$obj1->gf += $dat['goles_equipo1'];
					$obj1->gc += $dat['goles_equipo2'];
				elseif($dat['equipo2_id'] == $equipo) :
					$obj1->gf += $dat['goles_equipo2'];
					$obj1->gc += $dat['goles_equipo1'];
				endif;
				$obj1->pj += 1;
				$obj1->dg = $obj1->gf - $obj1->gc;
			endif;
		endforeach;
		if (!$obj1->save()) {
			$error = true;
			echo $msg = $obj1->error->string;
		}
	}
}
?>