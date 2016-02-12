<?php

    /**
     * @autor Elbert Tous
     * @email felipe@cogroupsas.com
     * @company COgroup.com | todos los derechos reservados
     */

                        

class equipo extends  DataMapper {

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 50.
     */
    public $nombre;

    /**
     * @var int Max length is 11.
     */
    public $grupo_id;

    /**
     * @var int Max length is 11.
     */
    public $imagen_id;

    public $table = 'equipo';

    public $model = 'equipo';
    public $primarykey = 'id';
    public $_fields = array('id','nombre','grupo_id','imagen_id');

    public $has_one =  array(
                'grupo' => array(
                  'class' => 'grupos',
                  'other_field' => 'equipo',
                  'join_other_as' => 'grupo',
                  'join_self_as' => 'equipo',
                  'join_table' => 'cms_grupos',
                ),

                'imagen' => array(
                  'class' => 'imagen',
                  'other_field' => 'equipo',
                  'join_other_as' => 'imagen',
                  'join_self_as' => 'equipo',
                  'join_table' => 'cms_imagen',
                )
            );



    public $has_many =  array(
                'posiciones' => array(
                  'class' => 'posiciones',
                  'other_field' => 'equipo',
                  'join_other_as' => 'posiciones',
                  'join_self_as' => 'equipo',
                  'join_table' => 'cms_posiciones',
                )
            );



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


    public function get_grupo_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new grupos();
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


    public function get_grupo($join_retale="") {
         $model = new grupos();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_equipo_id($this->id);
         }else{
         	return $model->get_by_equipo_id($this->id);
         }
    }


    public function get_imagen_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new imagen();
         $model->where($where)->get();
         $arrList = array();
         $r = 0;
         foreach ($model as $k) {
         	$arrList [$r]['id'] = $k->id;
         	foreach ($campos as $campo) :
         	$arrList[$r]['name'][] = $k->{$campo};
         	endforeach;
         	$arrList[$r]['name'] = implode($conector, $arrList[$r]['name']);
         }
         return $arrList;
    }


    public function get_imagen($join_retale="") {
         $model = new imagen();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_equipo_id($this->id);
         }else{
         	return $model->get_by_equipo_id($this->id);
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

                'nombre' => array(
                  'rules' => array( 'max_length' => 50, 'required' ),
                  'label' => 'NOMBRE',
                ),

                'grupo_id' => array(
                  'rules' => array( 'max_length' => 11, 'required' ),
                  'label' => 'GRUPO',
                ),

                'imagen_id' => array(
                  'rules' => array( 'max_length' => 11, 'required' ),
                  'label' => 'IMAGEN',
                )
            );


    public $coments =  array(
);

}