<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_config extends MY_Controller
{
  public $tbl = 'ad_charges';

  function __construct()
  {
    parent::__construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
  }

  public function index()
  {
    $this->layout->title($this->lang->line('businessconfig_ttl'));
    $this->layout->view('business_config');
  }

  public function save_business_config()
  {
    extract($_POST);
    $check_ary = array('duration'=>ucwords($duration));
    $check_data = $this->sb->data_exists($this->tbl,$check_ary);
    $array = array('duration'=>ucwords($duration),'price'=>$price);
    if(empty($adc_id))
    {
      if($check_data)
      {
        echo json_encode(array('duplicate_status'=>true));
      }
      else
      {
          $insert_status = $this->sb->insert($this->tbl,$array);
          if($insert_status > 0)
            echo json_encode(array("insert_status"=>true));
          else
            echo json_encode(array("insert_status"=>false));
      }  
    }
    else
    {
      $update_ary = array('adc_id'=>$adc_id);
      $status = $this->sb->update($this->tbl,$array,$update_ary);
      if($status > 0)
        echo json_encode(array("update_status"=>true));
      else
        echo json_encode(array("update_status"=>false));
    }
    
  }

  public function fetch_business_config()
  {
    $column_order = array('adc_id','duration','price');
    $column_search = array('adc_id','duration','price');
    $order = array('duration' => 'ASC'); 

    $this->dt->set_variable($this->tbl,$column_order,$column_search,$order,'');
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->duration;
      $row[] = $org->price;
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="set_details('.$org->adc_id.')"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
              </li>
              
              </ul>
            </div>';    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dt->count_all($this->tbl),
            "recordsFiltered" => $this->dt->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  public function fetch_single_data()
  {
    extract($_POST);
    $where_array = array('adc_id'=>$adc_id);
    $row = $this->sb->get_single($this->tbl,$where_array);
    echo json_encode(array($row));
  }

}

?>