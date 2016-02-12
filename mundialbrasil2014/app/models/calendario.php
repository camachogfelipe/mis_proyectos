<?php

    /**
     * @autor Elbert Tous
     * @email felipe@cogroupsas.com
     * @company COgroup.com | todos los derechos reservados
     */

                        

class calendario extends  DataMapper {

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var datetime
     */
    public $fecha;

    /**
     * @var int Max length is 11.
     */
    public $equipo1_id;

    /**
     * @var int Max length is 11.
     */
    public $equipo2_id;

    /**
     * @var int Max length is 11.
     */
    public $goles_equipo1;

    /**
     * @var int Max length is 11.
     */
    public $goles_equipo2;

    /**
     * @var enum 'GRUPOS','OCTAVOS','CUARTOS','SEMIFINAL','FINAL').
     */
    public $fase;

    public $table = 'calendario';

    public $model = 'calendario';
    public $primarykey = 'id';
    public $_fields = array('id','fecha','hora','equipo1_id','equipo2_id','goles_equipo1','goles_equipo2','fase');

    public $has_one =  array(
                'equipo1' => array(
                  'class' => 'equipo',
                  'other_field' => 'calendario',
                  'join_other_as' => 'equipo1',
                  'join_self_as' => 'calendario',
                  'join_table' => 'cms_equipo',
                ),

                'equipo2' => array(
                  'class' => 'equipo',
                  'other_field' => 'calendario',
                  'join_other_as' => 'equipo2',
                  'join_self_as' => 'calendario',
                  'join_table' => 'cms_equipo',
                )
            );



    public $has_many = array();



    public function __construct($id = NULL) {
         parent::__construct($id);
    }


    public function get_data($id = '', $campo = 'name') {
        $obj = new $this->model();
        $arrList = array();
        if (empty($id)) {
             $obj->get_iterated();
              foreach ($obj as $value) {
                 $arrList[] = array('id' => $value->id,'name' => $value->{$campo});
              }
              return $arrList;
        } else {
              return $obj->get_by_id($id);
        }
    }


    public function get_equipo1_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new equipo();
         $model->where($where)->order_by("nombre", "asc")->get();
         $arrList = array();
         $r = 1;
				 $arrList[0]['id'] = "";
				 $arrList[0]['name'] = "Seleccione un equipo";
         foreach ($model as $k) {
         	$arrList [$r]['id'] = $k->id;
					$arrList[$r]['name'] = $k->nombre;
					$r++;
         	//$arrList[$r]['name'] = implode($conector, $arrList[$r]['name']);
         }
         return $arrList;
    }


    public function get_equipo1($join_retale="") {
         $model = new equipo();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_calendario_id($this->id);
         }else{
         	return $model->get_by_calendario_id($this->id);
         }
    }


    public function get_equipo2_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new equipo();
         $model->where($where)->order_by("nombre", "asc")->get();
         $arrList = array();
         $r = 0;
         foreach ($model as $k) {
         	$arrList [$r]['id'] = $k->id;
					$arrList[$r]['name'] = $k->nombre;
					$r++;
         	//$arrList[$r]['name'] = implode($conector, $arrList[$r]['name']);
         }
         return $arrList;
    }


    public function get_equipo2($join_retale="") {
         $model = new equipo();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_calendario_id($this->id);
         }else{
         	return $model->get_by_calendario_id($this->id);
         }
    }


    public function selected_id($related_id = '', $related = 'modelo') {
        $obj = new $this->model();
        $obj->where_related($related, 'id', $related_id)->get();
        if ($obj->exists()) {
        	return $obj->id;
        } else {
        	return 0;
        }
    }


    public function selected_multiple_id($id = '', $related = 'modelo') {
        $obj = new $this->model();
        $obj->join_related($related)->get_by_id($id);
        $array = array();
        if ($obj->exists()) {
        	foreach ($obj as $value) {
        		$array[] = $value->modelo_id;
        	}
        }
        return $array;
    }


    public function get_rule($campo, $rule){
         if(array_key_exists($rule, $this->validation[$campo]['rules']))
            return $this->validation[$campo]['rules'][$rule];
         else
            return false;
    }


    public function is_rule($campo, $rule){
         if(in_array($rule, $this->validation[$campo]['rules']))
            return true;
         else
            return false;
    }


    public function to_array_first_row() {
     $model = clone $this;
     $model->get_by_id(1);
     $datos = array();
      foreach ($this->fields as $key) {
           if($key != 'id')
             $datos[$key] = $model->{$key};
      }
      return $datos;
    }


    public $default_order_by = array('id' => 'desc');


    public function post_model_init($from_cache = FALSE){}


    public function _encrypt($field)
    {
          if (!empty($this->{$field}))
          {
              if (empty($this->salt))
              {
                  $this->salt = md5(uniqid(rand(), true));
              }
             $this->{$field} = sha1($this->salt . $this->{$field});
          }
    }


    public $validation =  array(
                'id' => array(
                  'rules' => array( 'max_length' => 11 ),
                  'label' => 'ID',
                ),

                'fecha' => array(
                  'rules' => array( 'required' ),
                  'label' => 'FECHA',
                ),

                'hora' => array(
                  'rules' => array( 'max_length' => 12, 'required' ),
                  'label' => 'HORA',
                ),

                'equipo1_id' => array(
                  'rules' => array( 'max_length' => 11 ),
                  'label' => 'EQUIPO1',
                ),

                'equipo2_id' => array(
                  'rules' => array( 'max_length' => 11 ),
                  'label' => 'EQUIPO2',
                ),

                'goles_equipo1' => array(
                  'rules' => array( 'max_length' => 11 ),
                  'label' => 'GOLESEQUIPO1',
                ),

                'goles_equipo2' => array(
                  'rules' => array( 'max_length' => 11 ),
                  'label' => 'GOLESEQUIPO2',
                ),

                'fase' => array(
                  'rules' => array( 'required' ),
                  'label' => 'FASE',
                )
            );


    public $coments =  array(
);

}