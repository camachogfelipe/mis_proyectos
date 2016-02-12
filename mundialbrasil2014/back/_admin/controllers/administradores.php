<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author rigobcastro
 */
class Administradores extends Back_Controller {

  private $_mapper = 'Users';

  public function __construct() {
    parent::__construct();

    $this->superadmin_area();
  }

  // ----------------------------------------------------------------------

  public function index() {
    $grupos = new Groups();
    $grupos->order_by("id", "asc")->get(); /* ->where_in('name', array('superadmin', 'admin')) */

    $grupos_buscar = $gruposs = array();

    $x = 0;
    foreach ($grupos->all as $grupo) {
      $grupos_buscar[] = $grupo->id;
      $gruposs[$x]['id'] = $grupo->id;
      $gruposs[$x]['name'] = $grupo->name;
      $gruposs[$x]['description'] = $grupo->description;
      $x++;
    }

    $this->_data['grupos'] = $gruposs;

    $datos = $this->ACL->users($grupos_buscar)->result();

    if (!empty($datos)) {
      foreach ($datos as &$dato) {
        $dato->grupos = $this->ACL->get_users_groups($dato->id)->result();
      }
    }

    $this->_data['datos'] = $datos;

    return $this->build('administradores/body', $this->_data);
  }

  // ----------------------------------------------------------------------

  public function add() {
    $securify = $this->load->library('securify');

    $password = $securify(random_string());
    $username = $this->_post('username');
    $email = $this->_post('email');

    $grupos = new Groups();
    $group = 'admin';

    $save = false;

    $group = $this->_post('rol');

    $grupos->get_by_id($group);

    if (!$this->ACL->email_check($email)) {
      $save = (bool) $this->ACL->register($username, $password, $email, array(), (array) $grupos->id);
    } else {
      $user = new \User;
      $user->get_by_email($email);

      $save = (bool) $this->ACL->add_to_group($grupos->id, $user->id);
    }

    if ($save) {
      $this->set_alert_session('Se ha creado el usuario', 'success');
      $this->_send_email($username, $email, $password);
    } else {
      $errors = 'Error al crear el usuario';

      if ($this->ACL->errors()) {
        $errors = $this->ACL->errors();
      }
      $this->set_alert_session($errors, 'error');
    }

    return redirect(cms_url('admin/administradores'));
  }

  // ----------------------------------------------------------------------

  public function _send_email($username, $email, $password) {
    $this->load->library('email');

    $this->email->clear();

    $this->_data = array(
        'username' => $username,
        'email' => $email,
        'password' => $password
    );
    $html = $this->view('emails/administradores/nuevo_usuario');

    $this->email->from('cms@imaginamos.com', 'CMS Imaginamos');
    $this->email->to($email);

    $this->email->subject('Hola ' . $username . ', estos son los datos de su nueva cuenta');
    $this->email->message($html);


    return $this->email->send();
  }

  public function delete() {
    $error = false;
    $obj = new Users();
    $obj->join_related("groups")->get_by_id($this->_post('value'));
    $obj2 = new Groups();
    $obj2->where("id", $obj->group_id)->get();
    $msg = "";
    if ($obj->exists()) {
      $success = $obj->delete($obj2);
      if (!$success) {
        $error = true;
        $msg = $obj->error->string;
      }
      $id = $obj->id;
      $ok = $this->db->delete("users", array("id" => $id));
      if (!$ok) {
        $error = true;
        $msg = "";
      }
    } else {
      $error = true;
      $msg = "No existe item...!";
    }
    if ($error)
      $this->set_alert('Error al eliminar datos' . ', ' . $msg, 'error');
    else {
      $this->set_alert_session("Datos eliminados con éxito...!", 'info');
    }
    return $this->render_json(!$error);
  }

// ----------------------------------------------------------------------
}
