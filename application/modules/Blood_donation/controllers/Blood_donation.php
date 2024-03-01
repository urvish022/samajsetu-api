<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Blood_donation extends MY_Controller
{
    public $tbl = "blooddonation_details";

    function __construct()
    {
        parent::__construct();

        $this->load->model("Sql_builder", "sb");
        $this->load->model("Datatable_builder", "dt");
    }

    public function index()
    {
        $this->layout->js(ASSETS_PATH . "global/plugins/ckeditor/ckeditor.js");
        $this->layout->title($this->lang->line("blood_ttl"));
        $this->layout->view("blood_donation");
    }

    public function save_blood()
    {
        extract($_POST);

        $check_ary = [
            "blood_grp" => $blood_grp,
            "req_date" => datetosqlformat($req_date),
            "place" => $place,
        ];

        $check_data = $this->sb->data_exists($this->tbl, $check_ary);

        if ($check_data) {
            echo json_encode(["duplicate_status" => true]);
        } else {
            $array = [
                "blood_grp" => $blood_grp,
                "description" => htmlspecialchars($description),
                "place" => $place,
                "req_date" => datetosqlformat($req_date),
            ];

            $insert_status = $this->sb->insert_with_id($this->tbl, $array);

            if ($insert_status > 0) {
                $stats = $this->send_fcm_blood_notification(
                    $blood_grp,
                    $place,
                    $insert_status
                );

                if ($stats) {
                    echo json_encode(["insert_status" => true]);
                }
            } else {
                echo json_encode(["insert_status" => false]);
            }
        }
    }

    public function get_birthday_list()
    {
        $day = date("d");
        $month = date("m");
        $qry =
            "SELECT member_id,full_name_eng,birth_date,photo FROM `member_details` WHERE Month(birth_date)=" .
            $month .
            " AND DAY(birth_date)=" .
            $day .
            "";
        $qry1 =
            "SELECT member_id,ffull_name_eng,fbirth_date,fphoto FROM `family_details` WHERE Month(fbirth_date)=" .
            $month .
            " AND DAY(fbirth_date)=" .
            $day .
            "";
        $data = $this->sb->custom_query($qry);

        if ($data > 0) {
            $datas = $this->sb->execute_qry($qry);
            $datas1 = $this->sb->execute_qry($qry1);
            for ($i = 0; $i < count($datas); $i++) {
                $row["no"] = $i + 1;
                $row["member_id"] = $datas[$i]->member_id;
                $row["full_name_eng"] = $datas[$i]->full_name_eng;
                $row["birth_date"] = $datas[$i]->birth_date;
                $row["photo"] = $datas[$i]->photo;
                $myary[] = $row;
            }
            for ($i = 0; $i < count($datas1); $i++) {
                $row["no"] = $i + 1;
                $row["member_id"] = $datas1[$i]->member_id;
                $row["full_name_eng"] = $datas1[$i]->ffull_name_eng;
                $row["birth_date"] = $datas1[$i]->fbirth_date;
                $row["photo"] = $datas1[$i]->fphoto;
                $myary[] = $row;
            }

            echo json_encode(["data" => $myary]);
        } else {
            echo json_encode(["data" => ""]);
        }
    }

    public function send_bday_notification()
    {
        extract($_POST);
        $photo = USER_PHOTO . $photo;
        $msg = "Happy birthday " . $full_name_eng;
        
        $this->send_birtday_notification($msg, $photo, $member_id);
        echo json_encode(["status" => true]);
        
    }

    public function send_birtday_notification($title, $photo, $member_id)
    {
        $msg = 'Aap ne Janmdin ni Khub Shubh Kamanao.. Apnu Jivan Sarv prakare Uttam bani rahe, Prabhu ne Dil thi Prathna. Happy Birthday! From:-  "SAMAJ SETU"9825076415';
        $notificationdata = [
            'title' => $title,
            'message' => $msg,
            'image' => $photo,
            'type' => 'birthday_notify',
            'notification_id' => $member_id,
            'model_id' => 'App\Models\MemberDetail',
            'is_all' => 0
          ];
      
        $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
        call_notification_curl($id);

        return 1;

        // $this->load->library("Notification");
        // $this->notification->setTitle("Happy Birthday To You");
        // $this->notification->setMessage($msg);
        // $this->notification->setImage($photo);
        // $this->notification->setType("birthday_notify");

        // $request_data = $this->notification->getNotification();
        // $request_data["desc"] = $msg;
        
        // for ($i = 0; $i < count($fcm_list); $i++) {
        //     $fields = [
        //         "to" => $fcm_list[$i]["fcm_token"],
        //         "data" => $request_data,
        //         "priority" => "high",
        //     ];

        //     // Set POST variables

        //     $url = "https://fcm.googleapis.com/fcm/send";

        //     $headers = [
        //         "Authorization: key=" . fcm_server_key,

        //         "Content-Type: application/json",
        //     ];

        //     $json_field = json_encode($fields);

        //     // Open connection

        //     $ch = curl_init();

        //     // Set the url, number of POST vars, POST data

        //     curl_setopt($ch, CURLOPT_URL, $url);

        //     curl_setopt($ch, CURLOPT_POST, true);

        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //     // Disabling SSL Certificate support temporarily

        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $json_field);

        //     // Execute post

        //     $result = curl_exec($ch);

        //     if ($result === false) {
        //         die("Curl failed: " . curl_error($ch));
        //     }

        //     // Close connection

        //     curl_close($ch);
        // }

    }

    public function view_blood()
    {
        $column_order = ["bd_id", "blood_grp", "req_date", "place"];
        $column_search = ["bd_id", "blood_grp", "req_date", "place"];
        $order = ["bd_id" => "DESC"];

        $this->dt->set_variable(
            $this->tbl,
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
            $row[] = $org->blood_grp;
            $row[] = sqltodateformat($org->req_date);
            $row[] = $org->place;
            $row[] =
                '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="delete_setdata(' .
                $org->bd_id .
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

    public function delete_single_data()
    {
        extract($_POST);

        $where_array = ["bd_id" => $bd_id];
        $qry_status = $this->sb->delete($this->tbl, $where_array);

        if ($qry_status > 0) {
            echo json_encode(["delete_status" => true]);
        } else {
            echo json_encode(["delete_status" => false]);
        }
    }

    public function send_fcm_blood_notification($blood_grp, $place, $id)
    {
        $notificationdata = [
            "title" => "Urgent Blood Required",
            "message" => $blood_grp . " blood required at " . $place,
            "image" => UPLOAD_PATH . "blood_donation.jpg",
            "type" => "blood_notify",
            "notification_id" => $id,
            "model_id" => "App\Models\BlooddonationDetail",
        ];

        $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
        call_notification_curl($id);

        return 1;

        // $fcm_list = $this->get_fcm_list();

        // $this->load->library("Notification");

        // $this->notification->setTitle("Urgent Blood Required");

        // $this->notification->setMessage(
        //     $blood_grp . " blood required at " . $place
        // );

        // $this->notification->setImage(UPLOAD_PATH . "blood_donation.jpg");

        // $this->notification->setType("blood_notify");

        // $this->notification->setBloodId($id);

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

        //         if($result === FALSE){

        //           die('Curl failed: ' . curl_error($ch));

        //         }

        //         // Close connection

        //         curl_close($ch);

        // }
    }
}
