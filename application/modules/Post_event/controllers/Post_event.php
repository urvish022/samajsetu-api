<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Post_event extends MY_Controller
{
  public $post_tbl = "event_details";

  function __construct()
  {
    parent::__construct();

    $this->load->model("Sql_builder", "sb");
    $this->load->model("Datatable_builder", "dt");
  }

  public function index()
  {
    $this->layout->css(
      ASSETS_PATH .
        "global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
    );

    $this->layout->js(
      ASSETS_PATH .
        "global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
    );

    $this->layout->js(ASSETS_PATH . "global/plugins/ckeditor/ckeditor.js");
    $this->layout->title($this->lang->line("post_for_event"));
    $this->layout->view("post_event");
  }

  public function view_post_event()
  {
    $column_order = [
      "event_id",
      "event_title",
      "event_date",
      "event_time",
      "event_place",
    ];

    $column_search = [
      "event_id",
      "event_title",
      "event_date",
      "event_time",
      "event_place",
    ];

    $order = ["event_id" => "desc"];

    $this->dt->set_variable(
      $this->post_tbl,
      $column_order,
      $column_search,
      $order,
      ""
    );

    $list = $this->dt->get_datatables();

    $data = [];

    $no = $_POST["start"];

    foreach ($list as $org) {
      $no++;

      $row = [];
      $row[] = $no;
      $row[] = $org->event_title;
      $row[] = sqltodateformat($org->event_date) . " " . $org->event_time;
      $row[] = $org->event_place;
      $row[] =
        '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details(' .
        $org->event_id .
        ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' .
        $org->event_id .
        ');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                </li>
                </ul>
              </div>';

      $data[] = $row;
    }

    $output = [
      "draw" => $_POST["draw"],
      "recordsTotal" => $this->dt->count_all($this->post_tbl),
      "recordsFiltered" => $this->dt->count_filtered(),
      "data" => $data,
    ];

    //output to json format
    echo json_encode($output);
  }

  public function save_post_event()
  {
    extract($_POST);

    if (empty($event_id)) {
      $check_ary = ["event_title" => $event_title];

      $check_data = $this->sb->data_exists($this->post_tbl, $check_ary);

      if ($check_data) {
        echo json_encode(["duplicate_status" => true]);
      } else {
        if (!empty($_FILES["event_attachment"]["name"][0])) {
          $result = $this->upload_attachments();

          if ($result["status"]) {
            $event_attachment = json_encode($result["data"]);
          } else {
            $event_attachment = "";
          }
        } else {
          $event_attachment = "";
        }

        if (
          isset($_FILES["event_photo"]["name"]) &&
          $_FILES["event_photo"]["size"] > 0
        ) {
          $path = "./assets/uploads/event_photo";
          $file = $_FILES["event_photo"]["name"];

          $upload_status = $this->upload_img(
            $file,
            "5000",
            "100%",
            "320",
            "480",
            true,
            "event_photo",
            false,
            $path
          );

          if ($upload_status["status"]) {
            $event_photo = $upload_status["img_name"];
          } else {
            $event_photo = "no_event.jpg";
          }
        } else {
          $event_photo = "no_event.jpg";
        }

        $insert_ary = [
          "event_title" => $event_title,
          "event_photo" => $event_photo,
          "event_content" => htmlspecialchars($event_content),
          "event_date" => datetosqlformat($event_date),
          "event_time" => $event_time,
          "event_place" => $event_place,
          "event_attachment" => $event_attachment,
        ];

        $insert_status = $this->sb->insert_with_id(
          $this->post_tbl,
          $insert_ary
        );

        if ($insert_status) {
          echo json_encode([
            "insert_status" => true,
            "insert_id" => $insert_status,
          ]);
        } else {
          echo json_encode(["insert_status" => false]);
        }
      }
    } else {
      if (!empty($old_photo)) {
        $delete_status = $this->delete_photo(
          ASSET_EVENT_PHOTO . $old_photo
        );

        $update_ary = [
          "event_title" => $event_title,
          "event_date" => datetosqlformat($event_date),
          "event_time" => $event_time,
          "event_place" => $event_place,
          "event_content" => htmlspecialchars($event_content),
          "event_photo" => "no_event.jpg",
        ];
      } else {
        $update_ary = [
          "event_title" => $event_title,
          "event_date" => datetosqlformat($event_date),
          "event_time" => $event_time,
          "event_place" => $event_place,
          "event_content" => htmlspecialchars($event_content),
        ];
      }

      $where = ["event_id" => $event_id];

      $update_status = $this->sb->update(
        $this->post_tbl,
        $update_ary,
        $where
      );

      if ($update_status) {
        echo json_encode(["update_status" => true]);
      } else {
        echo json_encode(["update_status" => false]);
      }
    }
  }

  public function upload_attachments()
  {
    $filesCount = count($_FILES["event_attachment"]["name"]);

    for ($i = 0; $i < $filesCount; $i++) {
      $_FILES["file"]["name"] = $_FILES["event_attachment"]["name"][$i];
      $_FILES["file"]["type"] = $_FILES["event_attachment"]["type"][$i];
      $_FILES["file"]["tmp_name"] = $_FILES["event_attachment"]["tmp_name"][$i];
      $_FILES["file"]["error"] = $_FILES["event_attachment"]["error"][$i];
      $_FILES["file"]["size"] = $_FILES["event_attachment"]["size"][$i];

      $file_ext = pathinfo(
        $_FILES["event_attachment"]["name"][$i],
        PATHINFO_EXTENSION
      );

      $new_name = time() . rand(0, 999);

      $config["file_name"] = $new_name;
      $lst_file_name = $config["file_name"] . "." . $file_ext;
      $config["upload_path"] = "./assets/uploads/files";
      $config["allowed_types"] = "pdf";
      $config["overwrite"] = false;
      $config["max_size"] = "10240";

      // Load and initialize upload library
      $this->load->library("upload", $config);
      $this->upload->initialize($config);

      // Upload file to server
      if ($this->upload->do_upload("file")) {
        $fileData = $this->upload->data();
        $uploadData[$i] = $lst_file_name;

        $status = true;
        $resultdata[] = $uploadData[$i];
      } else {
        $data = $this->upload->display_errors();
        $status = false;
        $resultdata = $data;
      }
    }

    $result = ["status" => $status, "data" => $resultdata];
    return $result;
  }

  public function view_single_event()
  {
    extract($_POST);

    $where_array = ["event_id" => $event_id];

    $row = $this->sb->get_single($this->post_tbl, $where_array);

    $data = [
      "event_id" => $row->event_id,
      "event_content" => htmlspecialchars_decode($row->event_content),
      "event_date" => $row->event_date,
      "event_title" => $row->event_title,
      "event_photo" => $row->event_photo,
      "event_time" => $row->event_time,
      "event_place" => $row->event_place,
    ];

    echo json_encode([$data]);
  }

  public function send_notification()
  {
    extract($_POST);

    $where_array = ["event_id" => $event_id];

    $row = $this->sb->get_single($this->post_tbl, $where_array);

    $data = [
      "event_id" => $row->event_id,
      "event_title" => $row->event_title,
      "event_photo" => $row->event_photo,
    ];

    $status = $this->send_event_notification($data);

    if ($status) {
      echo json_encode(["status" => true]);
    }
  }

  public function send_event_notification($data)
  {
    $notificationdata = [
      'title' => 'Latest Event',
      'message' => $data["event_title"],
      'image' => EVENT_PHOTO . $data["event_photo"],
      'type' => 'event_notify',
      'notification_id' => $data['event_id'],
      'model_id' => 'App\Models\EventDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);

    return 1;
  }

  public function delete_single_data()
  {
    extract($_POST);

    $where_array = ["event_id" => $event_id];

    $row = $this->sb->get_single($this->post_tbl, $where_array);

    if ($row->event_photo != "no_event.jpg") {
      $delete_status = $this->delete_photo(
        ASSET_EVENT_PHOTO . $row->event_photo
      );
    }

    $qry_status = $this->sb->delete($this->post_tbl, $where_array);

    if ($qry_status > 0) {
      echo json_encode(["delete_status" => true]);
    } else {
      echo json_encode(["delete_status" => false]);
    }
  }
}
