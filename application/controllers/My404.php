<?php

class My404 extends MY_controller{
    
    function __construct(){
        parent::__construct();
    }

    function index()
    {    
      echo json_encode(array("status_code"=>"0","status"=>"Page Not Found"));
    }

    function notfound()
    {
      $this->load->view('layout/404.php');
    }
}

?>