<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Slider_payment extends MY_Controller

{

  public $tbl = 'slider_payment_setting';

  public $member_details_tbl = 'member_details';

  public $business_directory_tbl = 'business_directory';

  public $transaction_ary = '';

  public $transaction_msg = '';



  function __construct()

  {

    parent::__construct();

    $this->load->model('Sql_builder','sb');

  }



  public function index()

  {

    redirect("My404/notfound");

  }



  public function slider_1()

  {

   $row = $this->fetch_slider_config('slider_1');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૧";

      $data['price'] = $row->slider_price;

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function slider_2()

  {

   $row = $this->fetch_slider_config('slider_2');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૨";

      $data['price'] = $row->slider_price;

      

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function slider_3()

  {

   $row = $this->fetch_slider_config('slider_3');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૩";

      $data['price'] = $row->slider_price;

      

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function slider_4()

  {

   $row = $this->fetch_slider_config('slider_4');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૪";

      $data['price'] = $row->slider_price;

      

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function slider_5()

  {

   $row = $this->fetch_slider_config('slider_5');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૫";

      $data['price'] = $row->slider_price;

      

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function slider_6()

  {

   $row = $this->fetch_slider_config('slider_6');

   if($row->set_as_active == 1)

   {

      $data['sl_name'] = "સ્લાઇડર ૬";

      $data['price'] = $row->slider_price;

      

      $this->load->view('slider_payment',$data);

   }

   else

    redirect("My404/notfound"); 

  }



  public function fetch_slider_config($slider)

  {

     $where_array = array('slider_name'=>$slider);

     $row = $this->sb->get_single($this->tbl,$where_array);

     return $row;

  }



  public function login_verify()

  {

    extract($_POST);

    if(!empty($user_name) && !empty($password))

    {

      $check_ary = array('user_name'=>$user_name,'password'=>my_simple_crypt($password),

        'approval_flag'=>1,'mem_active_flag'=>1);

      $check_member = $this->sb->data_exists($this->member_details_tbl,$check_ary);

      if($check_member)

      {

        $row = $this->sb->get_single($this->member_details_tbl,$check_ary);

        echo json_encode(array('response'=>true,"mydata"=>$row));  

      }

      else

      echo json_encode(array('response'=>false));

    }

    else

      echo json_encode(array('response'=>false));

  }



  public function save_business_data()

  {

    extract($_POST);

    if(($_FILES['photo']['size'] > 0) && ($_FILES['photo']['name']!=""))

    {

        $file = $_FILES['photo']['name']; 

        $path = './assets/uploads/slider_photo';

        $upload_status = $this->upload_img($file,'5000','100%','1024','576',FALSE,'photo',FALSE,$path);

        

        if($upload_status['status'])

          $photo = $upload_status['img_name'];



        $responseDecoded = $this->translate_text($company_name_eng);

        

        if(empty($responseDecoded['responseData']['translatedText']))

        $company_name_guj = '';

        else 

        $company_name_guj = $responseDecoded['responseData']['translatedText'];



        $orderId = $this->sb->get_custom_id('transaction_details','tra_id','TES');

        $insert_ary = array('bc_id'=>$bc_id,

                            'owner_name'=>$full_name_eng,

                            'company_name_eng'=>ucwords($company_name_eng),

                            'company_name_guj'=>$company_name_guj,

                            'member_id'=>$member_id,

                            'village_id'=>$village_id,

                            'area'=>ucwords($area),

                            'address'=>ucwords($address),

                            'country_id'=>$country_id,

                            'mobile_no'=>$mobile_no,

                            'wp_mobile_no'=>$wp_mobile_no,

                            'email'=>$email,

                            'website'=>$website,

                            'photo'=>$photo,

                            'timing'=>$timing_start." - ".$timing_end,

                            'details'=>ucwords($details),

                            'ad_category'=>'slider_ad',

                            'ad_duration_year'=>'1 Year',

                            'tra_id'=>0,

                            'order_no'=>$orderId);



        $insert_status = $this->sb->insert($this->business_directory_tbl,$insert_ary);

        if($insert_status > 0)

        {

          $this->generate_paytm_details($member_id,$slider_price,$email,$mobile_no,$orderId);

        }

        else

          echo json_encode(array('insert_status'=>false));

    }

    else

      echo json_encode(array('insert_status'=>false));

  }



  public function payment_response()

  {
   extract($_POST);

    if(isset($BANKNAME))
    {
      if(empty($BANKNAME))
      $BANKNAME = "";
      else
      $BANKNAME = $BANKNAME; 
    }
    else
        $BANKNAME = "";

    if(isset($DETAILS))
    {
      if(empty($DETAILS))
        $DETAILS = "";
      else
        $DETAILS = $DETAILS;
    }
    else
        $DETAILS = "";

    if(isset($TXNID))
    {
      if(empty($TXNID))
        $TXNID = "";
      else
        $TXNID = $TXNID;
    }

    else
        $TXNID = "";

    if(isset($TXNDATE))

    {

      if(empty($TXNDATE))

        $TXNDATE = "";

      else

        $TXNDATE = $TXNDATE;

    }

    else

        $TXNDATE = "";



    if(isset($GATEWAYNAME))
    {
      if(empty($GATEWAYNAME))
        $GATEWAYNAME = "";
      else
        $GATEWAYNAME = $GATEWAYNAME;
    }
    else
        $GATEWAYNAME = "";

    if(isset($BANKTXNID))
    {
      if(empty($BANKTXNID))
        $BANKTXNID = "";
      else
        $BANKTXNID = $BANKTXNID;
    }
    else
        $BANKTXNID = "";

    if(isset($TXNAMOUNT))
    {
      if(empty($TXNAMOUNT))
        $TXNAMOUNT = "";
      else
        $TXNAMOUNT = $TXNAMOUNT;
    }
    else
      $TXNAMOUNT = "";

    if(isset($MERC_UNQ_REF))
    {
      if(empty($MERC_UNQ_REF))
        $MERC_UNQ_REF = "";
      else
        $MERC_UNQ_REF = $MERC_UNQ_REF;
    }
    else
      $MERC_UNQ_REF = "";

    if(isset($STATUS))
    {
      if(empty($STATUS))
        $STATUS = "";
      else
        $STATUS = $STATUS;
    }
    else
      $STATUS = "";

    if(isset($ORDERID))
    {
      if(empty($ORDERID))
        $ORDERID = "";
      else
        $ORDERID = $ORDERID;
    }
    else
      $ORDERID = "";

    if(isset($RESPMSG))
    {
      if(empty($RESPMSG))
        $RESPMSG = "";
      else
        $RESPMSG = $RESPMSG;
    }
    else
      $RESPMSG = "";

    if(isset($RESPCODE))
    {
      if(empty($RESPCODE))
        $RESPCODE = "";
      else
        $RESPCODE = $RESPCODE;
    }
    else
      $RESPCODE = "";

    if(isset($PAYMENTMODE))

    {

      if($PAYMENTMODE == 'CC' || $PAYMENTMODE == 'DC' || $PAYMENTMODE == 'NB')

      {

        $total_charge = pytm_tr_charge + pytm_gst_charge;

        $final_dedution = $TXNAMOUNT * $total_charge / 100;

        $final = $TXNAMOUNT - $final_dedution;

        $TOTALAMT = $final;

      }

      else

        $TOTALAMT = $TXNAMOUNT;  

    }

    else

    {

      $TOTALAMT = $TXNAMOUNT;

      $PAYMENTMODE = '';

    }

    

    $member_id = $MERC_UNQ_REF;      



    if($STATUS == 'TXN_SUCCESS')

    {

      $display_msg = 'Transaction Successful';

      $row = $this->sb->get_single('member_details',array('member_id' => $member_id),'full_name_eng');



      $DETAILS = $row->full_name_eng." Paid Rs. ".number_format($TXNAMOUNT,2)." for Slider Advertisement for 1 Year";

    }

    else if($STATUS == 'TXN_FAILURE')

    {

      switch ($RESPCODE) {



        case 202:

          $display_msg = 'You have not enough credit limit. Bank has declined the

                          transaction';

          break;



        case 141:

          $display_msg = 'You not completed transaction';

          break;  



        case 205:

          $display_msg = 'Transaction has been declined by the bank';

          break;



        case 207:

          $display_msg = 'Your card has been expired';

          break;

          

        case 208:

          $display_msg = 'Transaction has been declined by the acquirer bank.';

          break;

          

        case 209:

          $display_msg = 'You entered invalid card details';

          break;

          

        case 210:

          $display_msg = 'Lost Card received';

          break;

          

        case 220:

          $display_msg = 'Bank communication error';

          break;



        case 222:

          $display_msg = 'Transaction amount return by the gateway does not match with

                          Paytm transaction amount';

          break;

          

        case 227:

          $display_msg = 'Transaction Failed ';

          break;

          

        case 229:

          $display_msg = '3D Secure Verification failed';

          break;

          

        case 232:

          $display_msg = 'Invalid account details';

          break;



        case 325:

          $display_msg = 'Duplicate OrderId';

          break;  

          

        case 295:

          $display_msg = 'No Description available';

          break;

          

        case 296:

          $display_msg = 'We are facing problem at bank end. Try using another Payment

                          mode';

          break; 

          

        case 297:

          $display_msg = 'You canceled transaction and Redirect to 3D Page';

          break; 

          

        case 401:

          $display_msg = 'Abandoned transaction';

          break; 

          

        case 402:

          $display_msg = 'Transaction abandoned from CCAvenue';

          break;

          

        case 810:

          $display_msg = 'Closed after page load';

          break; 

          

        case 2271:

          $display_msg = 'You cancelled the transaction on banks net banking page';

          break;

          

        case 2272:

          $display_msg = 'You cancelled the transaction from 3D secure/OTP page';

          break;



        case 3102:

          $display_msg = 'Invalid card details';

          break;                                 

        

        default:

          $display_msg = 'Transaction Fail';

          break;

      }



    }

    else if($STATUS == 'PENDING')

    {

      $display_msg = 'Your payment is pending';

      $DETAILS = '';

      $TXNID = '';

      $TXNDATE = '';

      $GATEWAYNAME = '';

      $BANKTXNID = '';

    }

    else

    {

      $display_msg = 'Error! Transaction Failed';

      $DETAILS = '';

      $TXNID = '';

      $TXNDATE = '';

      $GATEWAYNAME = '';

      $BANKTXNID = '';

    }

    

    $insert_ary = array('ORDERID'=>$ORDERID,'TXNID'=>$TXNID,

                        'member_id'=>$member_id,'BANKNAME'=>$BANKNAME,

                        'TXNAMOUNT'=>$TXNAMOUNT,'TXNDATE'=>$TXNDATE,

                        'TYPE'=>'INCOME','CATEGORY'=>'slider_ad',

                        'TOTALAMT'=>$TOTALAMT,'DETAILS'=>$DETAILS,

                        'PAYMENTMODE'=>$PAYMENTMODE,'RESPMSG'=>$RESPMSG,

                        'STATUS'=>$STATUS,'RESPCODE'=>$RESPCODE,

                        'GATEWAYNAME'=>$GATEWAYNAME,'BANKTXNID'=>$BANKTXNID);



    $check_ary = array('ORDERID'=>$ORDERID);

    $check_status = $this->sb->data_exists('transaction_details',$check_ary);

    if($check_status)

    { 

      //redirect(base_url());

    }

    else

    {

      $insert_id = $this->sb->insert_with_id('transaction_details',$insert_ary,TRUE);

      $this->transaction_ary = $insert_ary;

      $this->transaction_msg = $display_msg;



      $where_array = array('member_id'=>$member_id,'order_no'=>$ORDERID);

      $update_status = $this->sb->update('business_directory', array('tra_id' => $insert_id,'payment_status'=>$STATUS), $where_array);

    }

    $data = array();

    //$bus_row = $this->sb->get_single('business_directory',$where_array);
    $member_ary = array('member_id'=>$member_id);
    $memberdata = $this->sb->get_single('member_details',$member_ary,'');

    if($STATUS == 'TXN_FAILURE')
    {
      $vstatus = "Failure";
    }
    else if($STATUS == 'PENDING')
    {
     $vstatus = "Pending"; 
    }
    else if($STATUS == "TXN_SUCCESS")
    {
      $vstatus = "Successful";
    }
    else
    {
      $vstatus = "Error"; 
    }

    $data = array('payment'=>$vstatus,
      'invoice'=>$ORDERID,
      'msg'=>$display_msg,
      'date'=>date('d-m-Y'),
      'amount'=>$TXNAMOUNT,
      'full_name_eng'=>"Urvish", //$memberdata->full_name_eng
      'mobile'=>"9574202214", //$memberdata->mobile_no
      'email'=>"sdas@masd.com"); //$memberdata->email_id

    $this->load->view('order',$data);
  }



  public function generate_paytm_details($member_id,$slider_price,$email,$phone,$orderId)

  {

    require_once(APPPATH."libraries/config_paytm.php");

    require_once(APPPATH."libraries/encdec_paytm.php");



    

    $paramList["MID"] = PAYTM_MERCHANT_MID;

    $paramList["ORDER_ID"] = $orderId;      

    $paramList["CUST_ID"] = $member_id;

    $paramList["INDUSTRY_TYPE_ID"] = INDUSTRY_TYPE_ID;

    $paramList["CHANNEL_ID"] = CHANNEL_ID;

    $paramList["MOBILE_NO"] = $phone;

    $paramList["EMAIL"] = $email;

    $paramList["MERC_UNQ_REF"] = $member_id;

    $paramList["TXN_AMOUNT"] = $slider_price;

    $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

    $paramList["CALLBACK_URL"] = CALLBACK_URL;

     

    $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);



    $ary = array('ORDER_ID'=>$orderId,

                'CUST_ID'=>$member_id,

                'TXN_AMOUNT'=>$slider_price,

                'CHECKSUMHASH'=>$checkSum,

                'MID'=>PAYTM_MERCHANT_MID,

                'WEBSITE'=>PAYTM_MERCHANT_WEBSITE,

                'CALLBACK_URL'=>CALLBACK_URL,

                'MERC_UNQ_REF'=>$member_id,

                'INDUSTRY_TYPE_ID'=>INDUSTRY_TYPE_ID,

                'CHANNEL_ID'=>CHANNEL_ID,

                'MOBILE_NO'=>$phone,

                'EMAIL'=>$email,

                'insert_status'=>true);

    echo json_encode($ary);

  }





}

?>