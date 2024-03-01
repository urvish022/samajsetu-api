<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Manage_transaction extends MY_Controller
{
  public $tbl = "transaction_details";

  function __construct()
  {
    parent::__construct();

    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->title($this->lang->line("payment_ttl"));
    $this->layout->view("manage_transaction");
  }

  public function view_datatable_transactions()
  {
    $column_order = [
      "",
      "ORDERID",
      "TXNAMOUNT",
      "TOTALAMT",
      "TXNDATE",
      "TYPE",
      "STATUS",
    ];
    $column_search = ["ORDERID", "TXNDATE", "TYPE", "STATUS"];

    $order = ["tra_id" => "desc"];
    $where = ["tra_active_flag" => 1];

    $this->dt->set_variable(
      $this->tbl,
      $column_order,
      $column_search,
      $order,
      $where
    );
    $list = $this->dt->get_datatables();

    $data = [];
    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $row[] = $no;
      $row[] = $org->ORDERID;
      $row[] =
        '<i class="fa fa-rupee">&nbsp;' .
        number_format($org->TXNAMOUNT, 2) .
        "</i>";
      $row[] =
        '<i class="fa fa-rupee">&nbsp;' .
        number_format($org->TOTALAMT, 2) .
        "</i>";
      $row[] = sqltodateformat($org->TXNDATE);
      if ($org->TYPE == "INCOME") {
        $row[] =
          '<span class="label label-success">' .
          $org->TYPE .
          "</span>";
      } else {
        $row[] =
          '<span class="label label-danger">' .
          $org->TYPE .
          "</span>";
      }

      if ($org->STATUS == "TXN_SUCCESS") {
        $row[] =
          '<span class="label label-success">' .
          $org->STATUS .
          "</span>";
      } else {
        $row[] =
          '<span class="label label-danger">' .
          $org->STATUS .
          "</span>";
      }

      $row[] =
        '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="edit_details(' .
                  $org->tra_id .
                  ');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' .
                  $org->tra_id .
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

  public function get_data()
  {
    extract($_POST);

    $where = ["tra_id" => $tra_id];
    $row = $this->sb->get_single($this->tbl, $where);

    if ($row->ENTRYTYPE == 1) {
      $where1 = ["member_id" => $row->member_id];
      $column = ["photo", "full_name_eng", "mobile_no", "village_id"];
      $row1 = $this->sb->get_single("member_details", $where1, $column);
      $where2 = ["village_id" => $row1->village_id];

      $row2 = $this->sb->get_single(
        "village_setting",
        $where2,
        "eng_name"
      );

      echo json_encode([$row, $row1, $row2]);
    } else {
      echo json_encode([$row]);
    }
  }

  public function save_transaction()
  {
    extract($_POST);

    if (empty($tra_id)) {
      $orderId = $this->sb->get_custom_id(
        "transaction_details",
        "tra_id",
        "TES"
      );

      $ORDERID = $orderId;

      $check_ary = [
        "ORDERID" => $ORDERID,
        "TXNDATE" => datetosqlformat($TXNDATE),
        "TOTALAMT" => $TOTALAMT,
      ];

      $check_data = $this->sb->data_exists($this->tbl, $check_ary);

      if ($check_data) {
        echo json_encode(["duplicate_status" => true]);
      } else {
        $txn_date = datetosqlformat($TXNDATE) . " " . date("h:i:s");

        $array = [
          "TXNID" => "",
          "ORDERID" => $ORDERID,
          "member_id" => 0,
          "BANKTXNID" => "",
          "TXNAMOUNT" => $TOTALAMT,
          "STATUS" => "TXN_SUCCESS",
          "RESPCODE" => "",
          "RESPMSG" => "",
          "RESPMSG" => "",
          "GATEWAYNAME" => "",
          "BANKNAME" => "",
          "PAYMENTMODE" => "",
          "TYPE" => $TYPE,
          "CATEGORY" => "",
          "DETAILS" => $DETAILS,
          "PLAN" => "",
          "CHECKSUMHASH" => "",
          "ENTRYTYPE" => 0,
          "TXNDATE" => $txn_date,
          "TOTALAMT" => $TOTALAMT,
        ];

        $insert_status = $this->sb->insert($this->tbl, $array);

        if ($insert_status > 0) {
          echo json_encode(["insert_status" => true]);
        } else {
          echo json_encode(["insert_status" => false]);
        }
      }
    } else {
      $date = datetosqlformat($TXNDATE) . " " . date("h:i:s");

      $data = [
        "TOTALAMT" => $TOTALAMT,
        "TXNDATE" => $date,
        "TYPE" => $TYPE,
        "DETAILS" => $DETAILS,
        "TXNAMOUNT" => $TOTALAMT,
      ];

      $where = ["tra_id" => $tra_id];

      $update_status = $this->sb->update($this->tbl, $data, $where);

      if ($update_status > 0) {
        echo json_encode(["update_status" => true, "date" => $date]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    }
  }

  public function update_transaction()
  {
    extract($_POST);

    if (isset($tra_id)) {
      if (!empty($tra_id)) {
        $data = ["STATUS" => $STATUS, "DETAILS" => $DETAILS];
        $data1 = ["payment_status" => $STATUS];

        $where = ["tra_id" => $tra_id];
        $update_status = $this->sb->update($this->tbl, $data, $where);

        $update_status1 = $this->sb->update(
          "business_directory",
          $data1,
          $where
        );

        if ($update_status > 0) {
          echo json_encode(["update_status" => true]);
        } else {
          echo json_encode(["update_status" => false]);
        }
      }
    }
  }

  public function delete_single_data()
  {
    extract($_POST);

    $where = ["tra_id" => $tra_id];
    $row = $this->sb->get_single($this->tbl, $where);

    $data = ["tra_active_flag" => 0];
    $data1 = ["bd_active_flag" => 0];

    if ($row->ENTRYTYPE == 1) {
      $status = $this->sb->update($this->tbl, $data, $where);

      $status1 = $this->sb->update("business_directory", $data1, $where);
    } else {
      $status = $this->sb->update($this->tbl, $data, $where);
    }

    if ($status > 0) {
      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }
}
