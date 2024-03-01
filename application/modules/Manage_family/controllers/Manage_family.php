<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Manage_family extends MY_Controller
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
        $this->layout->title($this->lang->line("pending_user_ttl"));
        $this->layout->view("manage_family");
    }

    public function view_family_table()
    {
        $column_order = [
            "",
            "eng_name",
            "full_name_eng",
            "relation_name_eng",
            "ffull_name_eng",
            "fbirth_date",
            "fmobile_no",
            "fd_active_flag",
        ];

        $column_search = [
            "eng_name",
            "full_name_eng",
            "relation_name_eng",
            "ffull_name_eng",
            "fbirth_date",
            "fmobile_no",
            "fmosad",
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

        $arrayw = ["family_details.approval_flag" => 1];

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

            if ($org->fd_active_flag == 1) {
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
                $org->family_id .
                "," .
                "'edit'" .
                ');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="set_details(' .
                $org->family_id .
                "," .
                "'view'" .
                ');"><i class="fa fa-eye"></i>&nbsp;View</a>
                </li>
                <li>
                <a onclick="delete_details(' .
                $org->family_id .
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

    public function update_family()
    {
        extract($_POST);
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
        ];

        $response = $this->sb->update($this->tbl, $member_array, $where_array);

        if ($response > 0) {
            echo json_encode(["update_status" => true]);
        } else {
            echo json_encode(["update_status" => false]);
        }
    }

    public function approve_family()
    {
        extract($_POST);

        $where = ["family_id" => $family_id];
        $data = ["fd_active_flag" => 1];
        $status = $this->sb->update($this->tbl, $data, $where);

        if ($status > 0) {
            echo json_encode(["reject_status" => true]);
        } else {
            echo json_encode(["reject_status" => false]);
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

?>
