<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller
{
  public $village_tbl = 'village_setting';
  public $translate_tbl = 'translate_api_setting';
  public $app_ui_tbl = 'app_ui_setting';
  public $message_api_setting_tbl = 'message_api_setting';
  public $sms_templates_tbl = 'sms_templates';
  public $app_detail_tbl = 'app_detail';
  public $business_tbl = 'bussiness_category';

	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
	}

	public function index()
	{
    $this->layout->js(ASSETS_PATH.'global/plugins/ckeditor/ckeditor.js');
		$this->layout->title($this->lang->line('settings_ttl'));
		$this->layout->view('settings');
	}

  public function update_appinfo()
  {
    extract($_POST);
    $where = array('app_id'=>$app_id);
    $data = array('app_desc'=>htmlspecialchars($app_desc,ENT_QUOTES));
    $response = $this->sb->update($this->app_detail_tbl,$data,$where);
    if($response > 0)
      echo json_encode(array('update_status'=>true));
    else
      echo json_encode(array('update_status'=>false));
  }

  public function fetch_app_info()
  {
    $where_array = array('app_id'=>1);
    $row = $this->sb->get_single($this->app_detail_tbl,$where_array);
    $data = array('app_id'=>$row->app_id,'app_desc'=>htmlspecialchars_decode($row->app_desc));
    echo json_encode(array($data));
  }

	public function add_village()
	{
		extract($_POST);
    
    $village_ary = array('guj_name' => $guj_name, 'eng_name' => $eng_name);
    $check_ary = array( 'eng_name' => $eng_name);
    if(empty($village_id))
    {
      $check_data = $this->sb->data_exists($this->village_tbl,$check_ary);  

        if($check_data)
        {
          echo json_encode(array('duplicate_status' => TRUE));
        }
        else
        {
          $insert_status = $this->sb->insert($this->village_tbl,$village_ary);
          if($insert_status)
            echo json_encode(array('insert_status' => TRUE));
          else
            echo json_encode(array('insert_status' => FALSE));
        }
    }
    else
    {
      $where_array = array('village_id'=>$village_id);
      $response =$this->sb->update($this->village_tbl,$village_ary,$where_array);
      if($response > 0)
        echo json_encode(array('update_status' => TRUE));
      else
        echo json_encode(array('update_status' => FALSE));
    } 
	}

  public function add_business_cat()
  {
    extract($_POST);
    $insert_ary =array('bc_eng_name'=>ucwords($bc_eng_name),'bc_guj_name'=>$bc_guj_name);
    $check_ary = array('bc_eng_name'=>ucwords($bc_eng_name));

    $check_data = $this->sb->data_exists($this->business_tbl,$check_ary);  
    if($check_data)
    {
       echo json_encode(array('duplicate_status' => TRUE));
    }
    else
    {
        if(empty($bc_id))
        {
          $insert_status = $this->sb->insert($this->business_tbl,$insert_ary);
          if($insert_status > 0)
            echo json_encode(array("insert_status"=>true));
          else
            echo json_encode(array("insert_status"=>false));
        }
        else
        {
          $where_array = array('bc_id'=>$bc_id);
          $response = $this->sb->update($this->business_tbl,$insert_ary,$where_array);
          if($response > 0)
            echo json_encode(array('update_status' => TRUE));
          else
            echo json_encode(array('update_status' => FALSE));
        }
    } 
  }

  public function add_sms_api()
  {
    extract($_POST);
    $insert_ary = array('sms_api_name'=>$sms_api_name,'sms_api_send_url'=>$sms_api_send_url,'sms_api_view_balance_url'=>$sms_api_view_balance_url,'sms_api_key'=>$sms_api_key);
    $check_ary = array('sms_api_name'=>$sms_api_name,'active_flag'=>1);
    if(empty($sms_api_id))
    {
      $check_data = $this->sb->data_exists($this->message_api_setting_tbl,$check_ary);  

        if($check_data)
        {
          echo json_encode(array('duplicate_status' => TRUE));
        }
        else
        {
          $insert_status = $this->sb->insert($this->message_api_setting_tbl,$insert_ary);
          if($insert_status)
            echo json_encode(array('insert_status' => TRUE));
          else
            echo json_encode(array('insert_status' => FALSE));
        }
    }
    else
    {
      $where_array = array('sms_api_id'=>$sms_api_id);
      $response =$this->sb->update($this->message_api_setting_tbl,$insert_ary,$where_array);
      if($response > 0)
        echo json_encode(array('update_status' => TRUE));
      else
        echo json_encode(array('update_status' => FALSE));
      
    }
    
  }

  public function add_message()
  {
    extract($_POST);
    $insert_ary = array('sms_title'=>$sms_title,'sms_context'=>$sms_context);
    if(empty($sms_temp_id))
    {
      $insert_status = $this->sb->insert($this->sms_templates_tbl,$insert_ary);
      if($insert_status)
            echo json_encode(array('insert_status' => TRUE));
          else
            echo json_encode(array('insert_status' => FALSE));
    }
    else
    {
      $where_array = array('sms_temp_id'=>$sms_temp_id);
      $update_status = $this->sb->update($this->sms_templates_tbl,$insert_ary,$where_array);
      if($update_status > 0)
            echo json_encode(array('update_status' => TRUE));
          else
            echo json_encode(array('update_status' => FALSE));
    }
  }

  public function add_translate_api()
  {
    extract($_POST);
    $api_ary = array('api_name' => $api_name, 'api_url' => $api_url, 'api_key' => $api_key, 
                        'api_email' => $api_email);
    $check_ary = array( 'api_name' => $api_name, 'api_url' => $api_url);

    $check_data = $this->sb->data_exists($this->translate_tbl,$check_ary);

    if($check_data)
    {
      echo json_encode(array('duplicate_status' => TRUE));
    }
    else
    {
      $insert_status = $this->sb->insert($this->translate_tbl,$api_ary);
      if($insert_status)
        echo json_encode(array('insert_status' => TRUE));
      else
        echo json_encode(array('insert_status' => FALSE));
    }
      
  }

  public function add_app_ui()
  {
    extract($_POST);
    if(!empty($_FILES['icon']['name']) && ($_FILES['icon']['size'] > 0))
    {
      $check_ary = array('ui_category'=>$ui_category,'eng_name'=>$eng_name);
      $check_data = $this->sb->data_exists($this->app_ui_tbl,$check_ary);

      if($check_data)
         echo json_encode(array('duplicate_status' => TRUE));
      else
      {
        $file = $_FILES['icon']['name']; 
        $path = './assets/uploads/appicons_photo';
        $upload_status = $this->upload_img($file,'5000','100%','','',FALSE,'icon',FALSE,$path);
        
        if($upload_status['status'])
        {
          $icon = $upload_status['img_name'];

          $ui_array = array('ui_category'=>$ui_category,'icon'=>$icon,'guj_name'=>$guj_name,
                           'eng_name'=>$eng_name,'activity_name'=>$activity_name);
          $insert_status = $this->sb->insert($this->app_ui_tbl,$ui_array);
          if($insert_status)
            echo json_encode(array('insert_status' => TRUE));
          else
            echo json_encode(array('insert_status' => FALSE));          
        }
        else
           echo json_encode(array('insert_status' => FALSE));           
      }
      
    }
    else
      echo json_encode(array('insert_status' => FALSE));
  }

  public function view_village()
  {
    $columns = array('village_id','guj_name','eng_name');
    $where_array = array('active_flag' => 1);
    $list = $this->sb->get_list($this->village_tbl,$where_array,$columns,'','','eng_name','ASC');
    echo json_encode(array("data"=>$list));
  }

  public function view_business()
  {
    $columns = array('bc_id','bc_eng_name','bc_guj_name');
    $list = $this->sb->get_list_nowhere($this->business_tbl,$columns,'','','bc_eng_name','ASC');
    echo json_encode(array("data"=>$list));
  }

  public function view_api()
  {
    $columns = array('api_id','api_name','api_url','api_key','api_email','active_api');
    $where_array = array('active_flag' => 1);
    $list = $this->sb->get_list($this->translate_tbl,$where_array,$columns,'','','api_name','ASC');
    echo json_encode(array("data"=>$list)); 
  }

  public function view_msgtemplate()
  {
    $columns = array('sms_temp_id','sms_title','sms_context');
    $where_array = array('active_flag' => 1);
    $list = $this->sb->get_list($this->sms_templates_tbl,$where_array,$columns,'','','sms_title','ASC');
    echo json_encode(array("data"=>$list)); 
  }

  public function view_smsapi()
  {
    $columns = array('sms_api_id','sms_api_name','sms_api_send_url','sms_api_view_balance_url','sms_api_key','active_api');
    $where_array = array('active_flag' => 1);
    $list = $this->sb->get_list($this->message_api_setting_tbl,$where_array,$columns,'','','sms_api_name','ASC');
    echo json_encode(array("data"=>$list)); 
  }

  public function view_appui()
  {
    $columns = array('id','ui_category','icon','guj_name','eng_name','activity_name');
    $where_array = array('active_flag' => 1);
    $list = $this->sb->get_list($this->app_ui_tbl,$where_array,$columns,'','','id','ASC');
    echo json_encode(array("data"=>$list)); 
  }
}

?>