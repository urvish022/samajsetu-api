<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Manage_member extends MY_Controller
{
  public $tbl = 'member_details';

  function __construct()
  {
    parent::__construct();

    $this->load->model('Sql_builder', 'sb');
    $this->load->model('Datatable_builder', 'dt');
  }


  public function index()
  {
    $this->layout->title($this->lang->line('manage_member'));
    $this->layout->view('manage_member');
  }

  public function view_datatable_members()
  {
    $column_order = array('', 'full_name_eng', 'eng_name', 'mobile_no', 'city_name', 'mem_active_flag', '');
    $column_search = array('full_name_eng', 'eng_name', 'mobile_no', 'city_name');
    $order = array('member_id' => 'desc');

    $join_site_tbl = array("village_setting vs", "vs.village_id = member_details.village_id", "LEFT");
    $join_party_tbl = array('country_details cd', 'cd.country_id = member_details.country_id', 'LEFT');

    $arrayw = array('member_details.approval_flag' => 1);

    $this->dt->set_variable($this->tbl, $column_order, $column_search, $order, $arrayw, $join_site_tbl, $join_party_tbl);
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $org) {

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->full_name_eng;
      $row[] = $org->eng_name;
      $row[] = $org->mobile_no;
      $row[] = '<a onclick=set_modal_image(' . $org->member_id . ',"' . USER_PHOTO . $org->photo . '")><img alt=' . $org->full_name_eng . ' src=' . USER_PHOTO . $org->photo . ' height="50" width="50"></a>';
      $row[] = $org->city_name;

      if ($org->mem_active_flag == 1)
        $row[] = '<span class="label label-success"> Approved </span>';

      else
        $row[] = '<span class="label label-danger"> Rejected </span>';

      $row[] = '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details(' . $org->member_id . "," . "'edit'" . ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="set_details(' . $org->member_id . "," . "'view'" . ');"><i class="fa fa-eye"></i>&nbsp;View</a>
                </li>
                <li>
                <a onclick="delete_details(' . $org->member_id . ');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                </li>
                </ul>
              </div>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->dt->count_all($this->tbl),
      "recordsFiltered" => $this->dt->count_filtered(),
      "data" => $data,
    );

    //output to json format
    echo json_encode($output);
  }

  public function get_member_data()
  {
    extract($_POST);

    $where = array("member_id" => $member_id);
    $row = $this->sb->get_single($this->tbl, $where);

    $datas = array(
      'member_id' => $row->member_id,
      'full_name_eng' => $row->full_name_eng,
      'full_name_guj' => $row->full_name_guj,
      'village_id' => $row->village_id,
      'country_id' => $row->country_id,
      'city_name' => $row->city_name,
      'sakh' => $row->sakh,
      'birth_date' => $row->birth_date,
      'blood_grp' => $row->blood_grp,
      'mosad' => $row->mosad,
      'married_status' => $row->married_status,
      'education' => $row->education,
      'occupation' => $row->occupation,
      'mobile_no' => $row->mobile_no,
      'wp_mobile_no' => $row->wp_mobile_no,
      'email_id' => $row->email_id,
      'photo' => $row->photo,
      'address' => $row->address,
      'bussiness_address' => $row->bussiness_address,
      'mem_active_flag' => $row->mem_active_flag,
      'user_name' => $row->user_name,
      'password' => my_simple_crypt($row->password, 'd')
    );

    echo json_encode(array($datas));
  }

  public function update_member_datas()
  {
    extract($_POST);
    if (isset($member_id)) {
      $where = array('member_id' => $member_id, 'approval_flag' => 1, 'mem_active_flag' => 1);

      if (!isset($blood_grp))
        $blood_grp = '';

      if (!isset($married_status))
        $married_status = '';

      $array = array(
        'full_name_eng' => $full_name_eng,
        'full_name_guj' => $full_name_guj,
        'village_id' => $village_id,
        'country_id' => $country_id,
        'blood_grp' => $blood_grp,
        'city_name' => $city_name,
        'mobile_no' => $mobile_no,
        'email_id' => $email_id,
        'birth_date' => datetosqlformat($birth_date),
        'address' => $address,
        'bussiness_address' => $bussiness_address,
        'married_status' => $married_status,
        'mosad' => $mosad,
        'sakh' => $sakh,
        'education' => $education,
        'occupation' => $occupation
      );
      $status = $this->sb->update($this->tbl, $array, $where);
      if ($status > 0)
        echo json_encode(array('update_status' => true));
      else
        echo json_encode(array('update_status' => false));
    } else
      echo json_encode(array('update_status' => false));
  }

  public function reject_member()
  {
    extract($_POST);

    $where = array('member_id' => $member_id);
    $data = array('mem_active_flag' => 0);
    $status = $this->sb->update($this->tbl, $data, $where);
    if ($status > 0)
      echo json_encode(array('reject_status' => true));
    else
      echo json_encode(array('reject_status' => false));
  }

  public function approve_member()
  {
    extract($_POST);

    $where = array('member_id' => $member_id);
    $data = array('mem_active_flag' => 1);

    $status = $this->sb->update($this->tbl, $data, $where);

    if ($status > 0){

      echo json_encode(array('reject_status' => true));
    }

    else
      echo json_encode(array('reject_status' => false));
  }

  public function delete_member()
  {
    extract($_POST);

    $where = array('member_id' => $member_id);
    $row = $this->sb->get_single($this->tbl, $where);

    if ($row->photo != 'no_user.jpg')
      $this->delete_photo(ASSET_USER_PHOTO . $row->photo);

    $status = $this->sb->delete($this->tbl, $where);

    if ($status > 0)
      echo json_encode(array('delete_status' => true));
    else
      echo json_encode(array('delete_status' => false));
  }
}
