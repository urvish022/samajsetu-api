<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Pending_memorial extends MY_Controller
{
  public $tbl = "memorial_details";

  function __construct()
  {
    parent::__construct();
    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->js(ASSETS_PATH . "global/plugins/ckeditor/ckeditor.js");
    $this->layout->title($this->lang->line("pending_memorial_ttl"));
    $this->layout->view("pending_memorial");
  }

  public function view_datatable_memorial()
  {
    $column_order = [
      "full_name_eng",
      "dead_date",
      "memorial_time",
      "memorial_place",
      "eng_name",
      "photo",
    ];

    $column_search = [
      "full_name_eng",
      "dead_date",
      "memorial_time",
      "memorial_place",
      "eng_name",
      "photo",
    ];

    $order = ["memorial_id" => "desc"];

    $join_site_tbl = [
      "village_setting vs",
      "vs.village_id = memorial_details.village_id",
      "LEFT",
    ];

    $arrayw = [
      "memorial_details.mem_active_flag" => 1,
      "memorial_details.approval_flag" => 0,
    ];

    $this->dt->set_variable(
      $this->tbl,
      $column_order,
      $column_search,
      $order,
      $arrayw,
      $join_site_tbl
    );

    $list = $this->dt->get_datatables();
    $data = [];
    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $photo = MEMORIAL_PHOTO . $org->photo;
      $row[] = $no;
      $row[] = $org->full_name_eng;
      $row[] = sqltodateformat($org->dead_date);
      $row[] = $org->eng_name;
      $row[] =
        "<a onclick=set_modal_image(" .
        $org->memorial_id .
        ',"' .
        strval($photo) .
        '")><img alt=' .
        $org->full_name_eng .
        " src=" .
        MEMORIAL_PHOTO .
        $org->photo .
        ' height="50" width="50"></a>';

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
        $org->memorial_id .
        ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                    </li>
                    <li>
                    <a onclick="delete_details(' .
        $org->memorial_id .
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

  public function delete_memorial()
  {
    extract($_POST);
    if (isset($id)) {
      $where = ["memorial_id" => $id];
      $row = $this->sb->get_single($this->tbl, $where);
      $setdata = ["mem_active_flag" => "0"];
      if (!empty($row->photo) && $row->photo != "no_memorial.jpg") {
        $delete_status = $this->delete_photo(
          ASSET_MATRIMONY_PHOTO . $row->photo
        );
      }
      $status = $this->sb->delete($this->tbl, $where);
      if ($status) {
        echo json_encode(["delete_status" => true]);
      } else {
        echo json_encode(["delete_status" => false]);
      }
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }

  public function crop_photo()
  {
    extract($_POST);

    if (!empty($mem_crop_id)) {
      $where = ["memorial_id" => $mem_crop_id];
      $row = $this->sb->get_single($this->tbl, $where);
      $photoname = $row->photo;
      $save_path = "./assets/uploads/memorial_photo/";
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

  public function get_memorial_data()
  {
    extract($_POST);
    $where = ["memorial_id" => $memorial_id];
    $row = $this->sb->get_single($this->tbl, $where);

    $where1 = ["member_id" => $row->member_id];
    $column = ["photo", "full_name_eng", "mobile_no", "village_id"];
    $row1 = $this->sb->get_single("member_details", $where1, $column);

    $where2 = ["village_id" => $row1->village_id];
    $row2 = $this->sb->get_single("village_setting", $where2, "eng_name");
    echo json_encode([$row, $row1, $row2]);
  }

  public function approve_memorial()
  {
    extract($_POST);

    if (!empty($memorial_id)) {
      if (!empty($path)) {
        $delete_status = $this->delete_photo(
          ASSET_MATRIMONY_PHOTO . $old_photo
        );

        $photo = "no_memorial.jpg";
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
          $save_path = "./assets/uploads/memorial_photo/";

          $upload_status = $this->edit_image(
            $old_photo,
            "350",
            "350",
            $save_path,
            true,
            $angle
          );

          if ($upload_status["status"]) {
            $photo = $old_photo;
          } else {
            $photo = "no_memorial.jpg";
          }
        } else {
          $photo = "no_memorial.jpg";
        }
      }

      $where_array = ["memorial_id" => $memorial_id];

      $member_array = [
        "full_name_eng" => ucwords($full_name_eng),
        "full_name_guj" => $full_name_guj,
        "village_id" => $village_id,
        "dead_date" => datetosqlformat($dead_date),
        "dead_day_name" => $dead_day_name,
        "memorial_date" => datetosqlformat($memorial_date),
        "memorial_day_name" => $memorial_day_name,
        "memorial_time" => $memorial_time,
        "memorial_place" => $memorial_place,
        "memorial_date1" => datetosqlformat($memorial_date1),
        "memorial_day_name1" => $memorial_day_name1,
        "memorial_time1" => $memorial_time1,
        "memorial_place" => $memorial_place1,
        "memorial_from" => $memorial_from,
        "memorial_fulltext" => htmlspecialchars($memorial_fulltext),
        "photo" => $photo,
        "approval_flag" => 1,
      ];

      $response = $this->sb->update(
        $this->tbl,
        $member_array,
        $where_array
      );

      if ($response > 0) {
        echo json_encode([
          "update_status" => true,
          "id" => $memorial_id,
          "photo" => $photo,
          "title" => ucwords($full_name_eng),
        ]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    } else {
      echo json_encode(["update_status" => false]);
    }
  }

  public function send_fcm_memorial()
  {
    extract($_POST);
    $notificationdata = [
      'title' => 'Besnu',
      'message' => $title,
      'image' => MATRIMONY_PHOTO . $photo,
      'type' => 'matrimony_notify',
      'notification_id' => $id,
      'model_id' => 'App\Models\MatrimonyDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);

    return 1;

    // $fcm_list = $this->get_fcm_list();
    // $this->load->library("Notification");
    // $this->notification->setTitle("Besnu");
    // $this->notification->setMessage($title);
    // $this->notification->setImage(MEMORIAL_PHOTO . $photo);
    // $this->notification->setType("memorial_notify");
    // $this->notification->setMemId($id);

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

  public function reject_profile()
  {
    extract($_POST);

    $where = ["memorial_id" => $memorial_id];
    $data = ["approval_flag" => 1, "mem_active_flag" => 0];
    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }
}
