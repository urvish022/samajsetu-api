<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
  public $tbl = 'member_details';

  function __construct()
  {
    parent:: __construct();
  }

  public function index()
  {
    $this->load->view('Home/home');
  }

}
?>