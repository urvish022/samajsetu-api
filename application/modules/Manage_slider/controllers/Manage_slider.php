<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Manage_slider extends MY_Controller
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
    $this->layout->title("Manage Business");
    $this->layout->view("manage_slider");
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
      "",
    ];

    $column_search = [
      "eng_name",
      "company_name_eng",
      "bc_eng_name",
      "area",
      "mobile_no",
      "owner_name",
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
      "business_directory.approval_flag" => 1,
      "business_directory.ad_category" => "slider_ad",
      "business_directory.bd_active_flag" => 1,
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
      $photo = ASSET_SLIDER_PHOTO . $org->photo;
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
        ASSET_SLIDER_PHOTO .
        $org->photo .
        ' height="70" width="100"></a>';

      if ($org->bd_active_flag == 1) {
        $row[] =
          '<span class="label label-success"> Approved </span>&nbsp; <a onclick="disable_details(' .
          $org->business_id .
          ');"><i class="fa fa-ban"></i>&nbsp;Disable</a> ';
      } else {
        $row[] =
          '<span class="label label-danger"> Rejected </span> &nbsp;<a onclick="enable_details(' .
          $org->business_id .
          ');"><i class="fa fa-check"></i>&nbsp;Enable</a> ';
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
                  $org->business_id .
                  "," .
                  "'edit'" .
                  ');">
                <i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="set_details(' .
                  $org->business_id .
                  "," .
                  "'view'" .
                  ');">
                <i class="fa fa-eye"></i>&nbsp;View</a>
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

  public function update_business()
  {
    extract($_POST);
    if (isset($business_id) && !empty($business_id)) {
      $where = ["business_id" => $business_id];
      $data = [
        "owner_name" => $owner_name,
        "bc_id" => $bc_id,
        "country_id" => $country_id,
        "company_name_eng" => $company_name_eng,
        "company_name_guj" => $company_name_guj,
        "area" => $area,
        "address" => $address,
        "mobile_no" => $mobile_no,
        "wp_mobile_no" => $wp_mobile_no,
        "email" => $email,
        "website" => $website,
        "timing" => $timing,
        "details" => $details,
      ];
      $stats = $this->sb->update($this->tbl, $data, $where);
      if ($stats > 0) {
        echo json_encode(["update_status" => true]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    } else {
      echo json_encode(["update_status" => false]);
    }
  }
}
