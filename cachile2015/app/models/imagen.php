<?php

    /**
     * @autor Elbert Tous
     * @email felipe@cogroupsas.com
     * @company COgroup.com | todos los derechos reservados
     */

                        

class imagen extends  DataMapper {

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $path;

    /**
     * @var varchar Max length is 70.
     */
    public $name;

    public $table = 'imagen';

    public $model = 'imagen';
    public $primarykey = 'id';
    public $_fields = array('id','path','name');

    public $has_one = array();
    public $has_many =  array(
                'users' => array(
                  'class' => 'users',
                  'other_field' => 'imagen',
                  'join_other_as' => 'users',
                  'join_self_as' => 'imagen',
                  'join_table' => 'cms_users',
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

                'path' => array(
                  'rules' => array( 'max_length' => 255, 'required' ),
                  'label' => 'PATH',
                ),

                'name' => array(
                  'rules' => array( 'max_length' => 70 ),
                  'label' => 'NAME',
                )
            );


    public $coments =  array(
                'id' => 'inputhidden|none',
);

}