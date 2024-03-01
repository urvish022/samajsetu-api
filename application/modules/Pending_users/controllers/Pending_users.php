<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Pending_users extends MY_Controller
{
  public $tbl = "member_details";

  function __construct()
  {
    parent::__construct();
    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->title($this->lang->line("pending_user_ttl"));
    $this->layout->view("pending_users");
  }

  public function view_datatable_members()
  {
    $column_order = [
      "",
      "full_name_eng",
      "eng_name",
      "mobile_no",
      "city_name",
      "mem_active_flag",
      "",
    ];

    $column_search = [
      "full_name_eng",
      "eng_name",
      "mobile_no",
      "city_name",
      "country_name",
    ];

    $order = ["member_id" => "desc"];

    $join_site_tbl = [
      "village_setting vs",
      "vs.village_id = member_details.village_id",
      "LEFT",
    ];

    $join_party_tbl = [
      "country_details cd",
      "cd.country_id = member_details.country_id",
      "LEFT",
    ];

    $arrayw = [
      "member_details.mem_active_flag" => 1,
      "member_details.approval_flag" => 0,
    ];

    $this->dt->set_variable(
      $this->tbl,
      $column_order,
      $column_search,
      $order,
      $arrayw,
      $join_site_tbl,
      $join_party_tbl
    );

    $list = $this->dt->get_datatables();

    $data = [];
    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $row[] = $no;
      $row[] = $org->full_name_eng;
      $row[] = $org->eng_name;
      $row[] = $org->mobile_no;
      $row[] =
        "<a onclick=set_modal_image(" .
        $org->member_id .
        ',"' .
        USER_PHOTO .
        $org->photo .
        '")><img alt=' .
        $org->full_name_eng .
        " src=" .
        USER_PHOTO .
        $org->photo .
        ' height="50" width="50"></a>';

      $row[] = $org->city_name;
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
        $org->member_id .
        ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' .
        $org->member_id .
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
    if (!empty($user_crop_id)) {
      $where = ["member_id" => $user_crop_id];
      $row = $this->sb->get_single($this->tbl, $where);
      $photoname = $row->photo;
      $save_path = "./assets/uploads/user_photo/";

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

  public function get_member_data()
  {
    extract($_POST);
    $where = ["member_id" => $member_id];
    $row = $this->sb->get_single($this->tbl, $where);

    echo json_encode([$row]);
  }

  public function delete_member()
  {
    extract($_POST);

    if (isset($member_id)) {
      $where = ["member_id" => $member_id];

      $row = $this->sb->get_single($this->tbl, $where, "photo");

      if ($row->photo != "no_user.jpg") {
        $this->delete_photo(ASSET_USER_PHOTO . $row->photo);
      }

      $status = $this->sb->delete($this->tbl, $where);

      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }

  public function approve_member()
  {
    $mail_status = false;
    $sms_status = true;

    extract($_POST);

    if (!empty($email_id)) {
      $user_name = $email_id;
    } else {
      $user_name = $mobile_no;
    }

    $mobile_ch = substr($mobile_no, 0, -4);
    $random = rand(10, 80);
    $password = $mobile_ch . $random;

    if (!empty($email_id)) {
      $mail_response = $this->sendMail(
        $email_id,
        $user_name,
        $password,
        $full_name_eng,
        "login"
      );

      if ($mail_response) {
        $mail_status = true;
      }
    }

    // if ($country_id == "3") {
    //   if (!empty($mobile_no)) {
    //     $str = $this->session->userdata("login_sms_context");
    //     $str1 = str_replace("[username]", $user_name, $str);
    //     $final_str = str_replace("[password]", $password, $str1);
    //     $url = $this->session->userdata("sms_api_send_url");
    //     $sms_api_key = $this->session->userdata("sms_api_key");
    //     $mystr = str_replace(["\n"], " ", $final_str);
    //     $sms_response = $this->send_sms(
    //       $url,
    //       $sms_api_key,
    //       $mystr,
    //       $mobile_no
    //     );

    //     if ($sms_response["status"]) {
    //       $sms_status = true;
    //     }
    //   }
    // }

    if ($mail_status == true) {
      if (!empty($path)) {
        $delete_status = $this->delete_photo($old_photo);

        $photo = "no_user.jpg";
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
          $path = "./assets/uploads/user_photo/";

          $upload_status = $this->edit_image(
            $old_photo,
            "300",
            "300",
            $path,
            true,
            $angle
          );

          if ($upload_status["status"]) {
            $photo = $old_photo;
          } else {
            $photo = "no_user.jpg";
          }
        } else {
          $photo = "no_user.jpg";
        }
      }

      $where_array = ["member_id" => $member_id];

      if (!isset($blood_grp)) {
        $blood_grp = "";
      }

      $member_array = [
        "full_name_eng" => ucwords($full_name_eng),
        "user_name" => $user_name,
        "password" => my_simple_crypt($password),
        "full_name_guj" => $full_name_guj,
        "village_id" => $village_id,
        "country_id" => $country_id,
        "city_name" => ucwords($city_name),
        "blood_grp" => $blood_grp,
        "birth_date" => datetosqlformat($birth_date),
        "mobile_no" => $mobile_no,
        "email_id" => $email_id,
        "address" => ucwords($address),
        "photo" => $photo,
        "approval_flag" => 1,
      ];

      $response = $this->sb->update(
        $this->tbl,
        $member_array,
        $where_array
      );

      if ($response > 0) {
        $apiUrl = APPROVE_USER_URL;
        call_app_curl($member_id,$apiUrl);

        echo json_encode(["insert_status" => true]);
      } else {
        echo json_encode(["insert_status" => false]);
      }
    }
  }

  public function reject_member()
  {
    extract($_POST);

    $where = ["member_id" => $member_id];
    $data = ["mem_active_flag" => 0, "approval_flag" => 1];
    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }
}
