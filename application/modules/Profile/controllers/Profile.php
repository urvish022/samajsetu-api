<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{
  public $admin_tbl = 'admin_details';

  function __construct()
  {
    parent::__construct();
    $this->load->model('Sql_builder','sb');
  }

  public function index()
  {    
    $this->layout->title($this->lang->line('profile_ttl'));
    $this->layout->view('profile');
  }

  public function edit_profile()
  {
    extract($_POST);

    if(!empty($admin_password))
      $admin_password = my_simple_crypt($admin_password);
    else
      $admin_password = $this->session->userdata('admin_password');

    $update_ary = array('admin_fullname'=>$admin_fullname,'admin_username'=>$admin_username,
      'admin_password'=>$admin_password,'admin_email'=>$admin_email,'admin_mobile'=>$admin_mobile);

    if(empty($remove_photo))
    {
        if(isset($_FILES['admin_img']['name']) && ($_FILES['admin_img']['size'] > 0))
        {
          if($_FILES['admin_img']['name'] == 'no_user.jpg' || empty($_FILES['admin_img']['name']))
            $admin_img = 'no_user.jpg';
          else
          {
            if($this->session->userdata('admin_img') != 'no_user.jpg')
            $this->delete_photo($this->session->userdata('admin_img'));
            $path = './assets/images';
            $upload_status = $this->upload_img($_FILES['admin_img']['name'],'5000','100%','100','100','','admin_img','',$path);      
            if($upload_status['status'])
              $admin_img = $upload_status['img_name'];
            else
              $admin_img = 'no_user.jpg';
          }
        }
        else
        {
          $admin_img =  $this->session->userdata('admin_img');
        }
    }
    else
    {
      if($this->session->userdata('admin_img') != 'no_user.jpg')
      $this->delete_photo($remove_photo);
      $admin_img = 'no_user.jpg';
    }

    $img_ary = array('admin_img'=>$admin_img);
    $final = array_merge($update_ary,$img_ary);

    $where_ary = array('admin_id'=>$admin_id);
    $response = $this->sb->update($this->admin_tbl,$final,$where_ary);      
    if($response > 0)
      echo json_encode(array("update_status"=>TRUE));
    else
      echo json_encode(array("update_status"=>FALSE));
    
  }
}
?>