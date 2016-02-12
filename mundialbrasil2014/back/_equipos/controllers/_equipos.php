<?php

    /**
     * @autor Elbert Tous
     * @email elbert.tous@imaginamos.co
     * @company Imaginamos S.A.S | Todos los derechos reservados
     * @date Mon, 16 Jun 2014 15:47:23
     */

                        

class _equipos extends Back_Controller {
	protected $admin_area = true;
	public $model = 'equipo';
	public $name = 'equipos';
	public $title = 'Equipos';


	public function __construct() {
		parent::__construct();
		$this->menu();
		$this->migas($this->current_menu);
		$this->add_modular_assets('js', 'autoload');
	}

	public function menu() {
		return $this->current_menu['Equipos'] = cms_url('equipos');
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
		  $obj->join_related('grupos')->get_by_id($id);
		$data['form_content'] = "";
		$data['form_content'] .= $this->inputHidden($obj->id, "id");

		$grupos = $obj->get_grupo_list(array("nombre"));
		
		$data['form_content'] .= $this->input($obj->nombre, "nombre", $obj->get_rule("nombre", "max_length"), "Nombre del equipo", "Maximo " . $obj->get_rule("nombre", "max_length") . " caracteres", $obj->get_rule("nombre", "required"), "span3");
		
		$data['form_content'] .= $this->combox($obj->grupo_id, $grupos, "grupo_id", "Grupo al que pertenece", "Seleccionar un grupo", $obj->get_rule("nombre", "required"), "span3");
		echo $obj->imagen_path;
		
		$data['form_content'] .= $this->imagen($obj->imagen_id, $obj->imagen_path, "Imagen del equipo", "48px X 48px", false, $obj->is_rule("imagen_id", "required"), "span9");

		$data['direct_form'] = $this->name.'/add';
		return $this->buildajax('control/form', $data);
	}

	public function lista() {
		$obj = new $this->model();
		$data['datos'] = $obj->join_related('grupos')->join_related('imagen')->order_by("grupo_nombre")->order_by("nombre")->get();
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
		if (!$obj->save()) {
			$error = true;
			$msg = $obj->error->string;
			$this->deleteImg($this->data_id_obj_path($obj));
		}
		else {
			$obj1 = new posiciones();
			$obj1->get_by_id($obj->id);
			$obj1->equipo_id = $obj->id;
			$obj1->pts = $obj1->pj = $obj1->pg = $obj1->pe = $obj1->pp = $obj1->gf = $obj1->gc = $obj1->dg = 0;
			if (!$obj1->save()) {
				$error = true;
				echo $msg = $obj1->error->string;
			}
		}
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
			$obj1 = new posiciones();
			$obj1->get_by_id($obj->id);
			if($obj1->delete()) :
				if (!$obj->delete()){
					$error = true;
					$msg = $obj->error->string;
				}
				$this->delete_files($this->data_file_path($obj));
				$this->deleteImg($id_file);
			endif;
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

}
?>