<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_matrimony extends MY_Controller
{
  public $tbl = 'matrimony_details';

	function __construct()
	{
		parent:: __construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
	}

	public function index()
	{
		$this->layout->title('Manage Matrimony');
		$this->layout->view('manage_matrimony');
	}

  public function view_datatable_matrimony()
  {
    $column_order = array('','full_name_eng','gender','birth_date','eng_name','country_name','photo','met_active_flag');
    $column_search = array('full_name_eng','birth_date','gender','eng_name','eng_name','country_name','photo','met_active_flag');
    $order = array('matrimony_id' => 'desc'); 

    $join_site_tbl = array("village_setting vs","vs.village_id = matrimony_details.village_id","LEFT");
    $join_party_tbl = array('country_details cd','cd.country_id = matrimony_details.country_id','LEFT');
  
    $arrayw = array('matrimony_details.approval_flag'=>1);
    $this->dt->set_variable($this->tbl,$column_order,$column_search,$order,$arrayw,$join_site_tbl,$join_party_tbl);

    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $photo = MATRIMONY_PHOTO.$org->photo;
      $row[] = $no;
      $row[] = $org->full_name_eng;
      $row[] = $org->gender;
      $row[] = sqltodateformat($org->birth_date);
      $row[] = $org->eng_name;
      $row[] = $org->country_name;
      $row[] = '<a onclick=set_modal_image('.$org->matrimony_id.',"'.strval($photo).'")><img alt='.$org->full_name_eng.' src='.MATRIMONY_PHOTO.$org->photo.' height="50" width="50"></a>';
      if($org->met_active_flag == 1)
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
                <a onclick="view_details('.$org->matrimony_id.","."'edit'".');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="view_details('.$org->matrimony_id.","."'view'".');"><i class="fa fa-eye"></i>&nbsp;View</a>
                </li>
                <li>
                <a onclick="delete_details('.$org->matrimony_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

  public function get_matrimony_data()
  {
    extract($_POST);
    $where = array("matrimony_id"=>$matrimony_id);
    $row = $this->sb->get_single($this->tbl,$where);

    $where2 = array('village_id'=>$row->village_id);
    $row2 = $this->sb->get_single('village_setting',$where2);

    $where3 = array("member_id"=>$row->member_id);
    $row3 = $this->sb->get_single('member_details',$where3);
    $array = array('eng_name'=>$row2->eng_name,'full_name_eng'=>$row3->full_name_eng,'photo'=>$row3->photo

      ,'mobile'=>$row3->mobile_no);
    

    echo json_encode(array($row,$array));
  }

  public function approve_matrimony()
  {
    extract($_POST);
    $where = array('matrimony_id'=>$matrimony_id);
    $data = array('met_active_flag'=>1,'approval_flag'=>1);
    $status = $this->sb->update($this->tbl,$data,$where);
    if($status > 0)
      echo json_encode(array('reject_status'=>true));
    else
      echo json_encode(array('reject_status'=>false));
  }

  public function update_matrimony()
  {
    extract($_POST);
    if(isset($matrimony_id) && !empty($matrimony_id))
    {
      $where_array = array('matrimony_id'=>$matrimony_id);

      $member_array = array('full_name_eng'=>ucwords($full_name_eng),
      'full_name_guj'=>$full_name_guj,'village_id'=>$village_id,
      'country_id'=>$country_id,'sakh'=>ucwords($sakh),
      'education'=>ucwords($education),'gender'=>ucwords($gender),
      'height'=>ucwords($height),'weight'=>ucwords($weight),
      'mosad'=>ucwords($mosad),'occupation'=>ucwords($occupation),
      'maritual_status'=>ucwords($maritual_status),
      'birth_date'=>datetosqlformat($birth_date),'address'=>ucwords($address),
      'land'=>$land,'mother_name'=>ucwords($mother_name),
      'mosad_sakh'=>ucwords($mosad_sakh),'father_occupation'=>ucwords($father_occupation),
      'mother_occupation'=>ucwords($mother_occupation),'brother'=>$brother,
      'sister'=>$sister,'income'=>$income,
      'extra_details'=>ucwords($extra_details),
      'mobile_no'=>$mobile_no,
      'father_mobile'=>$father_mobile);

      $response = $this->sb->update($this->tbl,$member_array,$where_array); 
      if($response > 0)
        echo json_encode(array('update_status'=>true));
      else
        echo json_encode(array('update_status'=>false));    
    }
    else
      echo json_encode(array('update_status'=>false));
  }
}

?>