<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
  public $member_details_tbl = 'member_details';

  function __construct()
  {
    parent:: __construct();
    $this->load->model('Sql_builder','sb');
  }

  public function index()
  {
    $this->load->view('Register/register');
  }

  public function register_member()
  {
    extract($_POST);
    if(isset($full_name_eng) && ($village_id) && ($country_id) && ($city_name) && ($birth_date) && ($mobile_no) 
      && ($address) && ($gender))
   {
          //check alredy exist or not user
      $check_array = array('mobile_no'=>$mobile_no);
      $check_member = $this->sb->data_exists($this->member_details_tbl,$check_array);
      if($check_member)
      {
        echo json_encode(array("duplicate_status"=>true));
      }
      else
      {
        $url = 'https://api.mymemory.translated.net/get?q='.rawurlencode($full_name_eng).
        '&langpair=en|gu&de=urvish31797@gmail.com';
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        curl_close($handle);

        if(!isset($responseDecoded['responseData']['translatedText']))
        {
          $full_name_guj = '';
        }
        else if(isset($responseDecoded['responseData']['translatedText']))
        {
          $full_name_guj = $responseDecoded['responseData']['translatedText'];  
        }  
        else
        {
          $full_name_guj = '';
        }

        if(isset($_FILES['photo']['name']))
        {
          
          $img_response = $this->upload_img($_FILES['photo']['name'],'5000','100%'
                          ,'300','300','','photo','');
        
          if($img_response['status'])
          $photo = $img_response['img_name'];
          else
          $photo = 'no_user.jpg';   
        }
        else
        {
          $photo = 'no_user.jpg';
        }

        $member_array = array('full_name_eng'=>ucwords($full_name_eng),'full_name_guj'=>$full_name_guj,'village_id'=>$village_id,'country_id'=>$country_id,'city_name'=>ucwords($city_name),'blood_grp'=>$blood_grp,'gender'=>$gender,'birth_date'=>date('Y-m-d', strtotime($birth_date))
          ,'mobile_no'=>$mobile_no,'email_id'=>$email_id,'address'=>ucwords($address)
          ,'reg_from'=>'web','photo'=>$photo);
        $insert_status = $this->sb->insert($this->member_details_tbl,$member_array);
        if($insert_status > 0)
        {
            echo json_encode(array("insert_status"=>true));
        }
        else
        {
           echo json_encode(array("insert_status"=>false));
        }
      }  
   }
   else
   {
      echo json_encode(array("status"=>"fail","status_code"=>"0","eng_message"=>"Something Went Wrong","guj_message"=>"કંઈક ખોટું થઇ ગયું છે"));
   }

  }
}
?>