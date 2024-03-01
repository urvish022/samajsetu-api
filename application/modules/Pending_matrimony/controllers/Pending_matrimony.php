<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending_matrimony extends MY_Controller
{
  public $tbl = 'matrimony_details';

	function __construct()
	{
	    parent:: __construct();
        $this->load->model('Sql_builder','sb');
        $this->load->model('Datatable_builder','dt');
        
	}

	public function index()
	{
		$this->layout->title($this->lang->line('pending_matrimony_ttl'));
		$this->layout->view('pending_matrimony');
	}

  public function view_datatable_matrimony()
  {
    $column_order = array('','full_name_eng','gender','birth_date','eng_name','country_name','photo','');
    $column_search = array('full_name_eng','birth_date','gender','eng_name','eng_name','country_name','photo');
    $order = array('matrimony_id' => 'desc'); 

    $join_site_tbl = array("village_setting vs","vs.village_id = matrimony_details.village_id","LEFT");
    $join_party_tbl = array('country_details cd','cd.country_id = matrimony_details.country_id','LEFT');
  
    $arrayw = array('matrimony_details.met_active_flag'=> 1 ,'matrimony_details.approval_flag'=> 0 );
    $this->dt->set_variable($this->tbl,$column_order,$column_search,$order,$arrayw,$join_site_tbl,$join_party_tbl);

    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $photo = MATRIMONY_PHOTO.$org->photo;
      $row[] = $no;
      $row[] = $org->full_name_eng;
      $row[] = $org->gender;
      $row[] = sqltodateformat($org->birth_date);
      $row[] = $org->eng_name;
      $row[] = $org->country_name;
      $row[] = '<a onclick=set_modal_image('.$org->matrimony_id.',"'.strval($photo).'")><img alt='.$org->full_name_eng.' src='.MATRIMONY_PHOTO.$org->photo.' height="50" width="50"></a>';
      $row[] = '<span class="label label-danger"> Pending </span>';
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details('.$org->matrimony_id.');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details('.$org->matrimony_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

  public function get_matrimony_data()
  {
    extract($_POST);
    $where = array("matrimony_id"=>$matrimony_id);
    $row = $this->sb->get_single($this->tbl,$where);

    $where2 = array('village_id'=>$row->village_id);
    $row2 = $this->sb->get_single('village_setting',$where2);

    $where3 = array("member_id"=>$row->member_id);
    $row3 = $this->sb->get_single('member_details',$where3);
    $array = array('eng_name'=>$row2->eng_name,'full_name_eng'=>$row3->full_name_eng,'photo'=>$row3->photo

      ,'mobile'=>$row3->mobile_no);
    

    echo json_encode(array($row,$array));
  }

  public function delete_matrimony()
  {
    extract($_POST);
    if(isset($matrimony_id) && !empty($matrimony_id))
    {
      $where = array('matrimony_id'=>$matrimony_id);
      $row = $this->sb->get_single($this->tbl,$where);
      if($row->photo!='no_user.jpg')
        $this->delete_photo(ASSET_MATRIMONY_PHOTO.$row->photo);
      $status = $this->sb->delete($this->tbl,$where);
      if($status > 0)
        echo json_encode(array('delete_status'=>true));
      else
        echo json_encode(array('delete_status'=>false));
    }
    else
      echo json_encode(array('delete_status'=>false));
  }
  
  public function crop_photo()
  {
    extract($_POST);
    if(!empty($mat_crop_id))
    {
      $where = array("matrimony_id"=>$mat_crop_id);
      $row = $this->sb->get_single($this->tbl,$where);
      $photoname = $row->photo;
      $save_path = './assets/uploads/matrimony_photo/';

      $status = $this->crop_image($photoname,$save_path,$h,$w,$x,$y);
      if($status['status'])
      {
        $setdata = array('photo'=>$status['file_name']);
        $this->sb->update($this->tbl,$setdata,$where);
        echo json_encode(array('update_status'=>true));   
      }
      else
      {
        echo json_encode(array('update_status'=>false));
      }
    }
    else
    {
      echo json_encode(array('update_status'=>false));
    }
  }

  public function approve_matrimony()
  {
    extract($_POST);
      
      if(!empty($path))
      {
        $delete_status = $this->delete_photo(ASSET_MATRIMONY_PHOTO.$old_photo);
        $photo = 'no_user.jpg';
      }
      else
      {
        if(!empty($image_angle))
        {
            if($image_angle == '90')
              $angle = 270;
            else if($image_angle == '270')
              $angle = 90;
            else if($image_angle == '180')
              $angle = 180;
            else
              $angle = 0;
        }          
        else
            $angle = '';

        if(!empty($old_photo))
        {
          $save_path = './assets/uploads/matrimony_photo/';
          $upload_status = $this->edit_image($old_photo,'300','300',$save_path, true, $angle);        
          if($upload_status['status'])
          $photo = $old_photo;
          else
          $photo = 'no_user.jpg';
        }
        else
          $photo = 'no_user.jpg'; 
      } 

      $where_array = array('matrimony_id'=>$matrimony_id);

      $member_array = array('full_name_eng'=>ucwords($full_name_eng),
      'full_name_guj'=>$full_name_guj,'village_id'=>$village_id,
      'country_id'=>$country_id,'sakh'=>ucwords($sakh),
      'education'=>ucwords($education),'gender'=>ucwords($gender),
      'height'=>ucwords($height),'weight'=>ucwords($weight),
      'mosad'=>ucwords($mosad),'occupation'=>ucwords($occupation),
      'maritual_status'=>ucwords($maritual_status),
      'birth_date'=>datetosqlformat($birth_date),'address'=>ucwords($address),
      'photo'=>$photo,'approval_flag'=>1,
      'land'=>$land,'mother_name'=>ucwords($mother_name),
      'mosad_sakh'=>ucwords($mosad_sakh),'father_occupation'=>ucwords($father_occupation),
      'mother_occupation'=>ucwords($mother_occupation),'brother'=>$brother,
      'sister'=>$sister,'income'=>$income,
      'extra_details'=>ucwords($extra_details),
      'mobile_no'=>$mobile_no,
      'father_mobile'=>$father_mobile);

      $response = $this->sb->update($this->tbl,$member_array,$where_array);      
      if($response > 0)
      {
        $this->send_fcm_matrimony(ucwords($full_name_eng),$photo,$matrimony_id);
        
        echo json_encode(array("insert_status"=>TRUE,"id"=>$matrimony_id,"photo"=>$photo,"title"=>ucwords($full_name_eng)));
      }
      else
        echo json_encode(array("insert_status"=>FALSE));   
  }

  public function send_fcm_matrimony()
  {
    extract($_POST);
    $notificationdata = [
      'title' => 'New Matrimony Biodata',
      'message' => $title,
      'image' => MATRIMONY_PHOTO.$photo,
      'type' => 'matrimony_notify',
      'notification_id' => $id,
      'model_id' => 'App\Models\MatrimonyDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);
    
    return 1;
    // $fcm_list = $this->get_fcm_list();
    // $this->load->library('Notification');
    // $this->notification->setTitle('New Matrimony Biodata');
    // $this->notification->setMessage($title);
    // $this->notification->setImage(MATRIMONY_PHOTO.$photo);
    // $this->notification->setType('matrimony_notify');    
    // $this->notification->setMatId($id);    

    
    // $request_data = $this->notification->getNotification();
    // for($i=0;$i<count($fcm_list);$i++)
    // {
    //   $fields = array(
    //             'to' => $fcm_list[$i]['fcm_token'],
    //             'data' => $request_data,
    //             'priority' => "high"
    //           );

    //         // Set POST variables
    //         $url = 'https://fcm.googleapis.com/fcm/send';
 
    //         $headers = array(
    //           'Authorization: key=' . fcm_server_key,
    //           'Content-Type: application/json'
    //         );

    //         $json_field = json_encode($fields);
            
    //         // Open connection
    //         $ch = curl_init();
 
    //         // Set the url, number of POST vars, POST data
    //         curl_setopt($ch, CURLOPT_URL, $url);
 
    //         curl_setopt($ch, CURLOPT_POST, true);
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    //         // Disabling SSL Certificate support temporarily
    //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, $json_field);
 
    //         // Execute post
    //         $result = curl_exec($ch);
            
    //         if($result === FALSE){
    //           die('Curl failed: ' . curl_error($ch));
    //         }
    //         // Close connection
    //         curl_close($ch);

    // }
  }

  public function reject_member()
  {
    extract($_POST);
    $where = array('matrimony_id'=>$matrimony_id);
    $data = array('met_active_flag'=>0,'approval_flag'=>1);
    $status = $this->sb->update($this->tbl,$data,$where);
    if($status > 0)
      echo json_encode(array('reject_status'=>true));
    else
      echo json_encode(array('reject_status'=>false));
  }
}

?>