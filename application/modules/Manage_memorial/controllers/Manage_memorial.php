<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Manage_memorial extends MY_Controller
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
    $this->layout->title($this->lang->line("manage_memorial_ttl"));
    $this->layout->view("manage_memorial");
  }

  public function view_datatable_memorial()
  {
    $column_order = [
      "",
      "full_name_eng",
      "memorial_date",
      "eng_name",
      "photo",
      "mem_active_flag",
    ];
    $column_search = [
      "full_name_eng",
      "memorial_date",
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

    $arrayw = ["memorial_details.approval_flag" => 1];
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
      $row[] = sqltodateformat($org->memorial_date);
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

      if ($org->mem_active_flag == 1) {
        $row[] = '<span class="label label-success"> Approved </span>';
      } else {
        $row[] = '<span class="label label-danger"> Rejected </span>';
      }

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
        ');"><i class="fa fa-eye"></i>&nbsp;View</a>
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

  public function get_memorial_data()
  {
    extract($_POST);

    $where = ["memorial_id" => $memorial_id];
    $row = $this->sb->get_single($this->tbl, $where);
    $data = [
      "memorial_id" => $row->memorial_id,
      "full_name_eng" => $row->full_name_eng,
      "full_name_guj" => $row->full_name_guj,
      "member_id" => $row->member_id,
      "dead_date" => $row->dead_date,
      "dead_day_name" => $row->dead_day_name,
      "memorial_date" => $row->memorial_date,
      "memorial_day_name" => $row->memorial_day_name,
      "memorial_time" => $row->memorial_time,
      "memorial_place" => $row->memorial_place,
      "memorial_date1" => $row->memorial_date1,
      "memorial_day_name1" => $row->memorial_day_name1,
      "memorial_time1" => $row->memorial_time1,
      "memorial_from" => $row->memorial_from,
      "village_id" => $row->village_id,
      "photo" => $row->photo,
      "memorial_fulltext" => htmlspecialchars_decode(
        $row->memorial_fulltext
      ),
      "memorial_place1" => $row->memorial_place1,
    ];

    $where1 = ["member_id" => $row->member_id];
    $column = ["photo", "full_name_eng", "mobile_no", "village_id"];
    $row1 = $this->sb->get_single("member_details", $where1, $column);
    $where2 = ["village_id" => $row1->village_id];
    $row2 = $this->sb->get_single("village_setting", $where2, "eng_name");

    echo json_encode([$data, $row1, $row2]);
  }

  public function approve_memorial()
  {
    extract($_POST);
    $where = ["memorial_id" => $memorial_id];
    $data = ["mem_active_flag" => 1];

    $status = $this->sb->update($this->tbl, $data, $where);
    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }

  public function reject_memorial()
  {
    extract($_POST);

    $where = ["memorial_id" => $memorial_id];
    $data = ["mem_active_flag" => 0];
    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0) {
      echo json_encode(["reject_status" => true]);
    } else {
      echo json_encode(["reject_status" => false]);
    }
  }

  public function delete_memorial()
  {
    extract($_POST);
    $where = ["memorial_id" => $memorial_id];

    $row = $this->sb->get_single($this->tbl, $where, "photo");

    if ($row->photo != "no_memorial.jpg") {
      $this->delete_photo(ASSET_MEMORIAL_PHOTO . $row->photo);
    }

    $status = $this->sb->delete($this->tbl, $where);

    if ($status > 0) {
      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }
}
