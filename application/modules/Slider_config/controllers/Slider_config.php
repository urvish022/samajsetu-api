<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_config extends MY_Controller
{
  public $tbl = 'slider_payment_setting';

  function __construct()
  {
    parent::__construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
  }

  public function index()
  {
    $this->layout->title($this->lang->line('sliderconfig_ttl'));
    $this->layout->view('slider_config');
  }

  public function save_slider_config()
  {
    extract($_POST);
    $check_ary = array('slider_name'=>$slider_name);
    $check_data = $this->sb->data_exists($this->tbl,$check_ary);
    $array = array('slider_price'=>$slider_price);
    if(empty($sp_id))
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
      $update_ary = array('sp_id'=>$sp_id);
      $status = $this->sb->update($this->tbl,$array,$update_ary);
      if($status > 0)
        echo json_encode(array("update_status"=>true));
      else
        echo json_encode(array("update_status"=>false));
    }
    
  }

  public function fetch_slider_config()
  {
    $column_order = array('sp_id','slider_name','slider_price');
    $column_search = array('sp_id','slider_name','slider_price');
    $order = array('slider_name' => 'ASC'); 

    $this->dt->set_variable($this->tbl,$column_order,$column_search,$order,'');
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->slider_name;
      $row[] = $org->slider_price;
      if($org->set_as_active == '1')
      $row[] = "<a class='btn green btn-xs' onclick='show_popup(".$org->sp_id.",".$org->set_as_active.");'><small class='label pull-right'>Active</small></a>";  
      else
      $row[] = "<a class='btn red btn-xs' onclick='show_popup(".$org->sp_id.",".$org->set_as_active.");'><small class='label pull-right'>Inactive</small></a>";  
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="edit_details('.$org->sp_id.');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
              </li>
              <li>
              <a href="Slider_payment/'.$org->slider_name.'" target="_blank"><i class="fa fa-external-link"></i>&nbsp;Visit</a>
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

  public function fetch_single_config()
  {
    extract($_POST);
    $where_array = array('sp_id'=>$sp_id);
    $row = $this->sb->get_single($this->tbl,$where_array);
    echo json_encode(array($row));
  }

  public function change_status()
  {
    extract($_POST);
    if($set_as_active == '1')
      $status = 0;
    else
      $status = 1;
    $where = array('sp_id'=>$sp_id);
    $update_ary = array('set_as_active'=>$status);
    $update_status = $this->sb->update($this->tbl,$update_ary,$where);
    if($update_status > 0)
      echo json_encode(array('update_status'=>TRUE));
    else
      echo json_encode(array('update_status'=>FALSE));
  }

}

?>