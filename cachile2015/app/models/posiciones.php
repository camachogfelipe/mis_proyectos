<?php

    /**
     * @autor Elbert Tous
     * @email felipe@cogroupsas.com
     * @company COgroup.com | todos los derechos reservados
     */

                        

class posiciones extends  DataMapper {

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $equipo_id;

    /**
     * @var tinyint Max length is 3.
     */
    public $pts;

    /**
     * @var tinyint Max length is 3.
     */
    public $pj;

    /**
     * @var tinyint Max length is 3.
     */
    public $pg;

    /**
     * @var tinyint Max length is 3.
     */
    public $pe;

    /**
     * @var tinyint Max length is 3.
     */
    public $pp;

    /**
     * @var tinyint Max length is 3.
     */
    public $gf;

    /**
     * @var tinyint Max length is 3.
     */
    public $gc;

    /**
     * @var tinyint Max length is 3.
     */
    public $dg;

    public $table = 'posiciones';

    public $model = 'posiciones';
    public $primarykey = 'id';
    public $_fields = array('id','equipo_id','pts','pj','pg','pe','pp','gf','gc','dg');

    public $has_one =  array(
                'equipo' => array(
                  'class' => 'equipo',
                  'other_field' => 'posiciones',
                  'join_other_as' => 'equipo',
                  'join_self_as' => 'posiciones',
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


    public function get_equipo_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new equipo();
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


    public function get_equipo($join_retale="") {
         $model = new equipo();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_posiciones_id($this->id);
         }else{
         	return $model->get_by_posiciones_id($this->id);
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

                'equipo_id' => array(
                  'rules' => array( 'max_length' => 11, 'required' ),
                  'label' => 'EQUIPO',
                ),

                'pts' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'PTS',
                ),

                'pj' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'PJ',
                ),

                'pg' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'PG',
                ),

                'pe' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'PE',
                ),

                'pp' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'PP',
                ),

                'gf' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'GF',
                ),

                'gc' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'GC',
                ),

                'dg' => array(
                  'rules' => array( 'max_length' => 3, 'required' ),
                  'label' => 'DG',
                )
            );


    public $coments =  array(
);

}