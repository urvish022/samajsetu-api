<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
  public $tbl = "admin_details";
  public $translate_api_tbl = "translate_api_setting";
  public $message_api_setting_tbl = "message_api_setting";
  public $sms_temp_tbl = 'sms_templates';

	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
	}

	public function index()
	{
    if($this->session->userdata('admin_id'))
      redirect('Dashboard');
    else
		  $this->load->view('login');
	}

  public function check_credentials()
  {
    $flag = 0;
    $flag1 = 0;
    $flag2 = 0;
    $flag3 = 0;
    $flag4 = 0;

    extract($_POST);
    
    //get admin details in session
    $data = array('admin_username'=>$admin_username,
      'admin_password'=>my_simple_crypt($admin_password));
    $response_data = $this->sb->check_admin_credentials($this->tbl,$data);
    if($response_data['status'])
    {
          $darray['admin_id'] = $response_data['data'][0]['admin_id'];
          $darray['admin_fullname'] = $response_data['data'][0]['admin_fullname']; 
          $darray['admin_password'] = $response_data['data'][0]['admin_password']; 
          $darray['admin_img'] = $response_data['data'][0]['admin_img'];
          $darray['admin_username'] = $response_data['data'][0]['admin_username'];
          $darray['admin_email'] = $response_data['data'][0]['admin_email'];
          $darray['admin_mobile'] = $response_data['data'][0]['admin_mobile'];
          
          $data_ary = array('admin_login_time'=>date("Y-m-d H:i:s"));
          $where_ary = array('admin_id'=>$darray['admin_id']);
          
          $status = $this->sb->set_time_stamp($this->tbl,$data_ary,$where_ary);

          if($status > 0)
          {
            $flag = 1;  
          }
          else
          {
            $flag = 0;   
          }
    }
    else
    {
      $flag = 0;
    }

    //get active translate api in session
    $where_ary = array('active_api'=>1,'active_flag'=>1);
    $row = $this->sb->get_single($this->translate_api_tbl,$where_ary);
    if(!empty($row))
    {
          $darray['api_id'] = $row->api_id;
          $darray['api_name'] = $row->api_name;
          $darray['api_url'] = $row->api_url; 
          $darray['api_key'] = $row->api_key;
          $darray['api_email'] = $row->api_email;

          $flag1 = 1;
    }
    else
    { 
        $flag1 = 0;
    }

    //get current sms api in session
    $where_ary_msg = array('active_api'=>1,'active_flag'=>1);
    $row_msg = $this->sb->get_single($this->message_api_setting_tbl,$where_ary_msg);
    if(!empty($row_msg))
    {
          $darray['sms_api_id'] = $row_msg->sms_api_id;
          $darray['sms_api_send_url'] = $row_msg->sms_api_send_url;
          $darray['sms_api_view_balance_url'] = $row_msg->sms_api_view_balance_url; 
          $darray['sms_api_key'] = $row_msg->sms_api_key;

      $flag2 = 1;
    }
    else
    {
      $flag2 = 0;
    }

    //get login sms template in session
    $where_login_sms = array('sms_title'=>'login_msg','active_flag'=>1);
    $row_login_sms = $this->sb->get_single($this->sms_temp_tbl,$where_login_sms);
    if(!empty($row_login_sms))
    {
      $darray['login_sms_context'] = $row_login_sms->sms_context;
      $flag3 = 1;
    }
    else
    { 
      $flag3 = 0;
    }

    //get forget sms template in session
    $where_forget_sms = array('sms_title'=>'forget_msg','active_flag'=>1);
    $row_forget_sms = $this->sb->get_single($this->sms_temp_tbl,$where_forget_sms);
    if(!empty($row_forget_sms))
    {
      $darray['forget_sms_context'] = $row_forget_sms->sms_context;
      $flag4 = 1;
    }
    else
    {
      $flag4 = 0;
    }

    $json = '';
    if($flag == 1 && $flag1 == 1 && $flag2 == 1 && $flag3 == 1 && $flag4 == 1)
    {
      $this->session->set_userdata($darray);
      $json = array("response_status"=>TRUE);     
    }
    else
    {
      $json = array("response_status"=>FALSE);    
    }
      
    echo json_encode($json);

  }

  public function forget_password()
  {
    extract($_POST);

    $status = $this->sb->data_exists($this->tbl,array('admin_email'=>$admin_email));
    if($status)
    {
      $data = $this->sb->get_single($this->tbl,array('admin_email'=>$admin_email));
      
      $password =  my_simple_crypt($data->admin_password,'d');
      $username =  $data->admin_username;
      $full_name = $data->admin_fullname;

      $mail_status = $this->sendMail($admin_email,$username,$password,$full_name,'reset');

      if($mail_status)
      {
        echo json_encode(array('response_status'=>true));
      }
      else
      {
        echo json_encode(array('response_status'=>false));
      }
    }
    else
    {
      echo json_encode(array('response_status'=>false));
    }
  }

}

?>