<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Pending_business extends MY_Controller
{
  public $tbl = "business_directory";

  function __construct()
  {
    parent::__construct();

    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->title($this->lang->line("pending_business_ttl"));
    $this->layout->view("pending_business");
  }

  public function view_datatable_business()
  {
    $column_order = [
      "",
      "eng_name",
      "company_name_eng",
      "bc_eng_name",
      "mobile_no",
      "photo",
      "order_no",
      "",
    ];

    $column_search = [
      "eng_name",
      "company_name_eng",
      "bc_eng_name",
      "area",
      "mobile_no",
      "owner_name",
      "order_no",
    ];

    $order = ["business_id" => "desc", "ad_category" => "business_ad"];

    $join_village_tbl = [
      "village_setting vs",
      "vs.village_id = business_directory.village_id",
      "LEFT",
    ];

    $join_cat_tbl = [
      "bussiness_category bc",
      "bc.bc_id = business_directory.bc_id",
      "LEFT",
    ];

    $arrayw = [
      "business_directory.bd_active_flag" => 1,
      "business_directory.approval_flag" => 0,
      "business_directory.ad_category" => "business_ad",
    ];

    $this->dt->set_variable(
      $this->tbl,
      $column_order,
      $column_search,
      $order,
      $arrayw,
      $join_village_tbl,
      $join_cat_tbl
    );

    $list = $this->dt->get_datatables();

    $data = [];

    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $photo = ASSET_BUSINESS_PHOTO . $org->photo;
      $row[] = $no;
      $row[] = $org->eng_name;
      $row[] = $org->company_name_eng;
      $row[] = $org->bc_eng_name;
      $row[] = $org->mobile_no;
      $row[] =
        "<a onclick=set_modal_image(" .
        $org->business_id .
        ',"' .
        strval($photo) .
        '")><img alt=' .
        $org->company_name_eng .
        " src=" .
        ASSET_BUSINESS_PHOTO .
        $org->photo .
        ' height="70" width="100"></a>';

      $row[] = $org->order_no;
      $row[] = '<span class="label label-danger"> Pending </span>';
      $row[] =
        '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details(' .
                  $org->business_id .
                  ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' .
                  $org->business_id .
                  ');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                </li>
                </ul>
              </div>';

      $data[] = $row;
    }

    $output = [
      "draw" => $_POST["draw"],
      "recordsTotal" => $this->dt->count_all($this->tbl),
      "recordsFiltered" => $this->dt->count_filtered(),
      "data" => $data,
    ];

    //output to json format
    echo json_encode($output);
  }

  public function crop_photo()
  {
    extract($_POST);
    if (!empty($bus_crop_id)) {
      $where = ["business_id" => $bus_crop_id];
      $row = $this->sb->get_single($this->tbl, $where);
      $photoname = $row->photo;
      $save_path = "./assets/uploads/business_photo/";

      $status = $this->crop_image($photoname, $save_path, $h, $w, $x, $y);
      if ($status["status"]) {
        $setdata = ["photo" => $status["file_name"]];
        $this->sb->update($this->tbl, $setdata, $where);
        echo json_encode(["update_status" => true]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    } else {
      echo json_encode(["update_status" => false]);
    }
  }

  public function get_business_data()
  {
    extract($_POST);

    $where = ["business_id" => $business_id];
    $row = $this->sb->get_single($this->tbl, $where);

    $where1 = ["member_id" => $row->member_id];
    $column = ["photo", "full_name_eng", "mobile_no"];

    $row1 = $this->sb->get_single("member_details", $where1, $column);
    $where2 = ["village_id" => $row->village_id];

    $row2 = $this->sb->get_single("village_setting", $where2, "eng_name");

    echo json_encode([$row, $row1, $row2]);
  }

  public function delete_buiness()
  {
    extract($_POST);
    if (isset($business_id) && !empty($business_id)) {
      $where = ["business_id" => $business_id];
      $setdata = ["bd_active_flag" => "0"];
      $status = $this->sb->update($this->tbl, $setdata, $where);
      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }

  public function approve_business()
  {
    extract($_POST);

    if (!empty($business_id)) {
      if (!empty($path)) {
        $delete_status = $this->delete_photo(
          ASSET_BUSINESS_PHOTO . $old_photo
        );

        $photo = "no_business.jpg";
      } else {
        if (!empty($image_angle)) {
          if ($image_angle == "90") {
            $angle = 270;
          } elseif ($image_angle == "270") {
            $angle = 90;
          } elseif ($image_angle == "180") {
            $angle = 180;
          } else {
            $angle = 0;
          }
        } else {
          $angle = "";
        }

        if (!empty($old_photo)) {
          $save_path = "./assets/uploads/business_photo/";

          $upload_status = $this->edit_image(
            $old_photo,
            "300",
            "300",
            $save_path,
            false,
            $angle
          );

          if ($upload_status["status"]) {
            $photo = $old_photo;
          } else {
            $photo = "no_business.jpg";
          }
        } else {
          $photo = "no_business.jpg";
        }
      }

      $where_array = ["business_id" => $business_id];

      $ad_start_date = date("Y-m-d");

      $ad_end_date = date("Y-m-d", strtotime($ad_duration_year));

      $bc_array = [
        "bc_id" => $bc_id,
        "owner_name" => ucwords($owner_name),
        "company_name_eng" => ucwords($company_name_eng),
        "country_id" => $country_id,
        "company_name_guj" => $company_name_guj,
        "area" => ucwords($area),
        "address" => ucwords($address),
        "mobile_no" => $mobile_no,
        "wp_mobile_no" => $wp_mobile_no,
        "email" => $email,
        "website" => $website,
        "photo" => $photo,
        "timing" => ucwords($timing),
        "details" => ucwords($details),
        "ad_start_date" => $ad_start_date,
        "ad_end_date" => $ad_end_date,
        "approval_flag" => 1,
      ];

      $response = $this->sb->update($this->tbl, $bc_array, $where_array);

      if ($response > 0) {
        echo json_encode([
          "update_status" => true,
          "id" => $business_id,
          "photo" => $photo,
          "title" => ucwords($company_name_eng),
        ]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    } else {
      echo json_encode(["update_status" => false]);
    }
  }

  public function send_fcm_notify()
  {
    extract($_POST);

    $notificationdata = [
      'title' => 'New Business Advertisement',
      'message' => $title,
      'image' => BUSINESS_PHOTO . $photo,
      'type' => 'business_notify',
      'notification_id' => $id,
      'model_id' => 'App\Models\BusinessDirectory'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);
    
    return 1;
    
    // $fcm_list = $this->get_fcm_list();
    // $this->load->library("Notification");
    // $this->notification->setTitle("New Business Advertisement");
    // $this->notification->setMessage($title);
    // $this->notification->setImage(BUSINESS_PHOTO . $photo);
    // $this->notification->setType("business_notify");
    // $this->notification->setBsId($id);

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
    //         //print_r($result);exit;
    //         if($result === FALSE){
    //           die('Curl failed: ' . curl_error($ch));
    //         }
    //         // Close connection
    //         curl_close($ch);

    // }
    
  }

  public function reject_business()
  {
    extract($_POST);

    $where = ["business_id" => $business_id];
    $data = ["bd_active_flag" => 0];

    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }
}
