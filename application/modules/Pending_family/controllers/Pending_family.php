<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Pending_family extends MY_Controller
{
  public $tbl = "family_details";

  function __construct()
  {
    parent::__construct();

    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->title("Pending Family");
    $this->layout->view("pending_family");
  }

  public function view_family_table()
  {
    $column_order = [
      "",
      "eng_name",
      "full_name_eng",
      "relation_name_eng",
      "ffull_name_eng",
      "fmobile_no",
      "",
    ];

    $column_search = [
      "ffull_name_eng",
      "eng_name",
      "eng_name",
      "relation_name_eng",
      "fmobile_no",
    ];

    $order = ["family_id" => "desc"];

    $join_relation_tbl = [
      "relation_details rd",
      "rd.relation_id = family_details.relation_id",
      "LEFT",
    ];

    $join_village_tbl = [
      "village_setting vs",
      "vs.village_id = family_details.village_id",
      "INNER",
    ];

    $join_member_tbl = [
      "member_details md",
      "md.member_id = family_details.member_id",
      "LEFT",
    ];

    $arrayw = [
      "family_details.fd_active_flag" => 1,
      "family_details.approval_flag" => 0,
    ];

    $this->dt->set_variable(
      $this->tbl,
      $column_order,
      $column_search,
      $order,
      $arrayw,

      $join_relation_tbl,
      $join_member_tbl,
      $join_village_tbl
    );

    $list = $this->dt->get_datatables();

    $data = [];

    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $row[] = $no;
      $row[] = $org->eng_name;
      $row[] = $org->full_name_eng;
      $row[] = $org->relation_name_eng;
      $row[] = $org->ffull_name_eng;
      $row[] =
        "<a onclick=set_modal_image(" .
        $org->family_id .
        ',"' .
        USER_PHOTO .
        $org->fphoto .
        '")><img alt=' .
        $org->full_name_eng .
        " src=" .
        USER_PHOTO .
        $org->fphoto .
        ' height="50" width="50"></a>';
      $row[] = $org->fmobile_no;
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
                $org->family_id .
                ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' .
                $org->family_id .
                ');"><i class="fa fa-trash"></i>&nbsp;Delete Details</a>
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
    if (!empty($fam_crop_id)) {
      $where = ["family_id" => $fam_crop_id];
      $row = $this->sb->get_single($this->tbl, $where);
      $photoname = $row->fphoto;
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

  public function get_family_data()
  {
    extract($_POST);

    $where = ["family_id" => $family_id];
    $row = $this->sb->get_single($this->tbl, $where);
    $where2 = ["village_id" => $row->village_id];
    $row2 = $this->sb->get_single("village_setting", $where2);
    $where3 = ["member_id" => $row->member_id];
    $row3 = $this->sb->get_single("member_details", $where3);

    $array = [
      "eng_name" => $row2->eng_name,
      "full_name_eng" => $row3->full_name_eng,
      "photo" => $row3->photo,
      "mobile" => $row3->mobile_no,
    ];

    echo json_encode([$row, $array]);
  }

  public function delete_family()
  {
    extract($_POST);
    $where = ["family_id" => $family_id];
    $row = $this->sb->get_single($this->tbl, $where);
    if ($row->fphoto != "no_user.jpg") {
      $this->delete_photo(ASSET_USER_PHOTO . $row->fphoto);
    }
    $status = $this->sb->delete($this->tbl, $where);
    if ($status > 0) {
      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }

  public function approve_member()
  {
    extract($_POST);
    if (!empty($path)) {
      $delete_status = $this->delete_photo(ASSET_USER_PHOTO . $old_photo);
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
          $fphoto = $old_photo;
        } else {
          $fphoto = "no_user.jpg";
        }
      } else {
        $fphoto = "no_user.jpg";
      }
    }

    $where_array = ["family_id" => $family_id];

    if (!isset($fblood_grp)) {
      $fblood_grp = "";
    }

    $member_array = [
      "ffull_name_eng" => ucwords($ffull_name_eng),
      "ffull_name_guj" => $ffull_name_guj,
      "relation_id" => $relation_id,
      "fcity_name" => ucwords($fcity_name),
      "fblood_grp" => ucwords($fblood_grp),
      "country_id" => $country_id,
      "fmosad" => ucwords($fmosad),
      "fpiyar" => ucwords($fpiyar),
      "fbirth_date" => datetosqlformat($fbirth_date),
      "fmarried_status" => ucwords($fmarried_status),
      "feducation" => ucwords($feducation),
      "foccupation" => ucwords($foccupation),
      "fmobile_no" => $fmobile_no,
      "femail_id" => $femail_id,
      "fbussiness_address" => ucwords($fbussiness_address),
      "fphoto" => $fphoto,
      "approval_flag" => 1,
    ];

    $response = $this->sb->update($this->tbl, $member_array, $where_array);

    if ($response > 0) {
      echo json_encode(["insert_status" => true]);
    } else {
      echo json_encode(["insert_status" => false]);
    }
  }

  public function reject_family()
  {
    extract($_POST);

    $where = ["family_id" => $family_id];

    $data = ["fd_active_flag" => 0, "approval_flag" => 1];

    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }
}
