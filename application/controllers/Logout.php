<?php
class Logout extends MY_controller
{
  public function __construct()
  {
    parent:: __construct();
  } 

  public function index()
  {
    //$this->session->unset_userdata('admin_id');
    $this->session->sess_destroy();
    redirect('Login');
  }
}
?>