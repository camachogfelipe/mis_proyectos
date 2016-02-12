<?php

/**
 * @autor Elbert Tous
 * @email elbert.tous@imaginamos.com
 * @company Imaginamos S.A.S | Todos los derechos reservados
 * @date 3-050050
 */
class Home extends Front_Controller {

    public function __construct() {
        $this->_data['anonymous'] = ($this->session->userdata('current_user_one')==TRUE)?NULL:TRUE;
		$this->session->set_userdata(array('current_page',  strtolower(__CLASS__))); 
		$this->_data['current_page'] = $this->session->userdata('current_page'); 
        parent::__construct();
    }

    public function index() {
			$grupos = new grupos();
			$this->_data['grupos'] = $grupos->order_by("nombre")->get();
			$equipos = new equipo();
			$this->_data['equipos'] = $equipos->join_related('grupos')->join_related('imagen')->order_by("grupo_nombre")->order_by("nombre")->get();
			$fechas = new calendario();
			$this->_data['fechas'] = $fechas->select("fecha")->where("fase", "GRUPOS")->distinct()->order_by("fecha", "asc")->get()->all_to_array("fecha");
			$datos = array("hora", "equipo1_imagen_path", "equipo1_nombre", "goles_equipo1", "goles_equipo2", "equipo2_imagen_path",
										 "equipo2_nombre", "fase");
			$this->_data['para_hoy'] = $fechas
																 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
																 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
																 ->where("fecha", date("Y-m-d"))->order_by("hora", "asc")->get()->all_to_array($datos);
			$datos = array("fecha", "hora", "equipo1_imagen_path", "equipo1_nombre", "goles_equipo1", "goles_equipo2", 
										 "equipo2_imagen_path", "equipo2_nombre", "fase");
			$this->_data['calendario'] = $fechas
												 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->where("fase", "GRUPOS")->order_by("fecha", "asc")->order_by("hora", "asc")
												 ->order_by('equipo1_grupo_nombre', 'asc')->get()->all_to_array($datos);
			$this->_data['octavos'] = $fechas
												 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->where("fase", "OCTAVOS")->order_by("id", "asc")->order_by("fecha", "asc")
												 ->get()->all_to_array($datos);
			$this->_data['cuartos'] = $fechas
												 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->where("fase", "CUARTOS")->order_by("id", "asc")->order_by("fecha", "asc")->get()->all_to_array($datos);
			$this->_data['semifinal'] = $fechas
												 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->where("fase", "SEMIFINAL")->order_by("id", "asc")->order_by("fecha", "asc")->get()->all_to_array($datos);
			$this->_data['final'] = $fechas
												 ->join_related('equipo1')->join_related('equipo1/imagen')->join_related("equipo1/grupos")
												 ->join_related('equipo2')->join_related('equipo2/imagen')->join_related("equipo2/grupos")
												 ->where("fase", "FINAL")->order_by("id", "asc")->get()->all_to_array($datos);
			$posiciones = new posiciones();
			$this->_data['posiciones'] = $posiciones->join_related("equipo")
																							->join_related("equipo/imagen")
																							->join_related("equipo/grupos")
																							->order_by("equipo_grupo_nombre", "asc")
																							->order_by("pts", "desc")
																							->order_by("dg", "desc")
																							->order_by("gf", "desc")
																							->order_by("gc", "asc")
																							->get();
			return $this->build();
    }
		
		public function dia_semana($fecha) {
			$i = strtotime($fecha);
			$i = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
			$fecha = explode("-", $fecha);
			switch($i) :
				case 1 : return "Lunes " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 2 : return "Martes " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 3 : return "Miercoles " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 4 : return "Jueves " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 5 : return "Viernes " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 6 : return "Sabado " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
				case 0 : return "Domingo " . $fecha[2] . " de " . Home::mes($fecha[1]) . " de " . $fecha[0]; break;
			endswitch;
		}
		
		public function dia_semana1($fecha) {
			$i = strtotime($fecha);
			$i = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
			$fecha = explode("-", $fecha);
			switch($i) :
				case 1 : return "Lunes"; break;
				case 2 : return "Martes"; break;
				case 3 : return "Miercoles"; break;
				case 4 : return "Jueves"; break;
				case 5 : return "Viernes"; break;
				case 6 : return "Sabado"; break;
				case 0 : return "Domingo"; break;
			endswitch;
		}
		
		public function mes($mes) {
			switch($mes) :
				case '01' : return "enero"; break;
				case '02' : return "febrero"; break;
				case '03' : return "marzo"; break;
				case '04' : return "abril"; break;
				case '05' : return "mayo"; break;
				case '06' : return "junio"; break;
				case '07' : return "julio"; break;
				case '08' : return "agosto"; break;
				case '09' : return "septiembre"; break;
				case '10' : return "octubre"; break;
				case '11' : return "noviembre"; break;
				case '12' : return "diciembre"; break;
			endswitch;
		}
}

?>