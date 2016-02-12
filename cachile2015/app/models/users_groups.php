<?php

    /**
     * @autor Elbert Tous
     * @email felipe@cogroupsas.com
     * @company COgroup.com | todos los derechos reservados
     */

                        

class users_groups extends  DataMapper {

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $user_id;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $group_id;

    public $table = 'users_groups';

    public $model = 'users_groups';
    public $primarykey = 'id';
    public $_fields = array('id','user_id','group_id');

    public $has_one =  array(
                'user' => array(
                  'class' => 'user',
                  'other_field' => 'users_groups',
                  'join_other_as' => 'user',
                  'join_self_as' => 'users_groups',
                  'join_table' => 'cms_user',
                ),

                'group' => array(
                  'class' => 'group',
                  'other_field' => 'users_groups',
                  'join_other_as' => 'group',
                  'join_self_as' => 'users_groups',
                  'join_table' => 'cms_group',
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


    public function get_user_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new user();
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


    public function get_user($join_retale="") {
         $model = new user();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_users_groups_id($this->id);
         }else{
         	return $model->get_by_users_groups_id($this->id);
         }
    }


    public function get_group_list($campos=array("name"),$where=array(), $conector= ',') {
         $model = new group();
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


    public function get_group($join_retale="") {
         $model = new group();
         if($join_retale!=""){
         	return $model->join_related($join_retale)->get_by_users_groups_id($this->id);
         }else{
         	return $model->get_by_users_groups_id($this->id);
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
                  'rules' => array( 'min_length' => 0, 'max_length' => 10 ),
                  'label' => 'ID',
                ),

                'user_id' => array(
                  'rules' => array( 'min_length' => 0, 'max_length' => 10, 'required' ),
                  'label' => 'USER',
                ),

                'group_id' => array(
                  'rules' => array( 'min_length' => 0, 'max_length' => 10, 'required' ),
                  'label' => 'GROUP',
                )
            );


    public $coments =  array(
);

}