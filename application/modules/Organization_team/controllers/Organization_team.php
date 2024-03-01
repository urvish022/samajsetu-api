<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_team extends MY_Controller
{
  public $org_tbl = 'organization_details';
  public $team_tbl = 'team_details';

	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
	}

	public function index()
	{
    $this->layout->js(ASSETS_PATH.'global/plugins/ckeditor/ckeditor.js');
		$this->layout->title($this->lang->line('org_team_ttl'));
		$this->layout->view('organization_team');
	}

  public function add_organization()
  {
    extract($_POST);
    if(empty($org_id))
    {
      $check_ary = array('org_name'=>$org_name);
      $check_data = $this->sb->data_exists($this->org_tbl,$check_ary);
    
      if($check_data)
      {
         echo json_encode(array('duplicate_status' => TRUE));
      }
      else
      {
          if($_FILES['org_photo']['size'] > 0)
          {
            $file = $_FILES['org_photo']['name']; 
            $path = './assets/uploads/organization_photo';
            $upload_status = $this->upload_img($file,'5000','100%','150','150',FALSE,'org_photo',FALSE,$path);
            if($upload_status['status'])
              $org_photo = $upload_status['img_name'];
            else
              $org_photo = 'no_img.png';
          }
          else
            $org_photo = 'no_img.png';

            $insert_ary = array('org_name'=>$org_name,'org_photo'=>$org_photo,
              'org_details'=>htmlspecialchars($org_details));
            $status = $this->sb->insert($this->org_tbl,$insert_ary);
            if($status > 0)
              echo json_encode(array("insert_status"=>true));
            else
              echo json_encode(array("insert_status"=>false));
          
      } 
    }
    else
    {
      if(!empty($old_photo))
      {
        $delete_status = $this->delete_photo(ASSET_ORG_PHOTO.$old_photo);
        
        $update_ary = array('org_name'=>$org_name,'org_photo'=>'no_img.png',
              'org_details'=>htmlspecialchars($org_details));
      }
      else
        $update_ary = array('org_name'=>$org_name,'org_details'=>htmlspecialchars($org_details));
        
        $where = array('org_id'=>$org_id);
        $update_status = $this->sb->update($this->org_tbl,$update_ary,$where);
        if($update_status > 0)
          echo json_encode(array("update_status"=>true));
        else
          echo json_encode(array("update_status"=>false));
    }

  }

  public function add_team()
  {
    extract($_POST);
    if(empty($team_id))
    {
        $check_ary = array('org_id'=>$org_id,'designation'=>$designation,'member_name'=>$member_name,'mobile_no'=>$mobile_no);
        $check_data = $this->sb->data_exists($this->team_tbl,$check_ary);

        if($check_data)
           echo json_encode(array('duplicate_status' => TRUE));
        else
        {
            if(isset($_FILES['member_photo']['name']) && ($_FILES['member_photo']['size'] > 0))
            {
              $file = $_FILES['member_photo']['name']; 
              $path = './assets/uploads/organization_photo';
              $upload_status = $this->upload_img($file,'5000','100%','150','150',FALSE,'member_photo',FALSE,$path);
              if($upload_status['status'])
                 $member_photo = $upload_status['img_name'];
              else
                $member_photo = 'no_user.jpg';
            }
            else
              $member_photo = 'no_user.jpg';

              $insert_ary = array('org_id'=>$org_id,'member_name'=>$member_name,
                            'designation'=>$designation,'village_id'=>$village_id,
                            'mobile_no'=>$mobile_no,'member_photo'=>$member_photo);

              $status = $this->sb->insert($this->team_tbl,$insert_ary);
              if($status > 0)
                echo json_encode(array("insert_status"=>true));
              else
                echo json_encode(array("insert_status"=>false));   
        }
    }
    else
    {
      if(!empty($old_team_photo))
      {
        $delete_status = $this->delete_photo(ASSET_ORG_PHOTO.$old_team_photo);
        
        $update_ary = array('org_id'=>$org_id,'member_name'=>$member_name,
                            'designation'=>$designation,'village_id'=>$village_id,
                            'mobile_no'=>$mobile_no,'member_photo'=>'no_user.jpg');
      }
      else
        $update_ary = array('org_id'=>$org_id,'member_name'=>$member_name,
                            'designation'=>$designation,'village_id'=>$village_id,
                            'mobile_no'=>$mobile_no);
        
        $where = array('team_id'=>$team_id);
        $update_status = $this->sb->update($this->team_tbl,$update_ary,$where);
        if($update_status > 0)
          echo json_encode(array("update_status"=>true));
        else
          echo json_encode(array("update_status"=>false));
    }
     
  }

  public function view_organization()
  {
    $column_order = array('','org_name','org_photo','');
    $column_search = array('org_name');
    $order = array('org_id' => 'DESC'); 

    $this->dt->set_variable($this->org_tbl,$column_order,$column_search,$order);
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->org_name;
      $row[] = '<img alt='.$org->org_photo.' src='.ORG_PHOTO.$org->org_photo.' height="75" width="75">';
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="edit_details('.$org->org_id.');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
              </li>
              <li>
              <a onclick="delete_details('.$org->org_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
              </li>
              </ul>
            </div>';    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dt->count_all($this->org_tbl),
            "recordsFiltered" => $this->dt->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);

  }

  public function view_team()
  {
    $column_order = array('','org_name','member_name','eng_name','designation','mobile_no');
    $column_search = array('org_name','member_name','eng_name','designation','mobile_no');
    $order = array('team_id' => 'DESC'); 

    $join1 = array("organization_details od","od.org_id = team_details.org_id","LEFT");
    $join2 = array("village_setting vs","vs.village_id = team_details.village_id","LEFT");

    $ary = $this->dt->set_variable($this->team_tbl,$column_order,$column_search,$order,'',$join1,$join2);
    
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->org_name;
      $row[] = $org->member_name;
      $row[] = $org->eng_name;
      $row[] = $org->designation;
      $row[] = $org->mobile_no;
      $row[] = '<img alt='.$org->member_photo.' src='.ORG_PHOTO.$org->member_photo.' height="50" width="50">';
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="edit_team_details('.$org->team_id.');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
              </li>
              <li>
              <a onclick="delete_team_details('.$org->team_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
              </li>
              </ul>
            </div>';    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dt->count_all($this->org_tbl),
            "recordsFiltered" => $this->dt->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);

  }

  public function fetch_single_data()
  {
    extract($_POST);
    $where_array = array('org_id'=>$org_id);
    $row = $this->sb->get_single($this->org_tbl,$where_array);
    $data = array('org_name'=>$row->org_name,'org_photo'=>$row->org_photo,
      'org_details'=>htmlspecialchars_decode($row->org_details),'org_id'=>$row->org_id);
    echo json_encode(array($data));
  }

  public function fetch_single_team_data()
  {
    extract($_POST);
    $where_array = array('team_id'=>$team_id);
    $row = $this->sb->get_single($this->team_tbl,$where_array);
    echo json_encode(array($row));
  }

  public function delete_single_data()
  {
    extract($_POST);
    $where_array = array('org_id'=>$org_id);
    $row = $this->sb->get_single($this->org_tbl,$where_array);
    if($row->org_photo != 'no_img.png')
    {
      $delete_status = $this->delete_photo(ASSET_ORG_PHOTO.$row->org_photo);
    }

    $qry_status = $this->sb->delete($this->org_tbl,$where_array);
    
    $count = $this->sb->count_all($this->team_tbl,$where_array);
    if($count > 0)
    {
      $data = $this->sb->get_list($this->team_tbl,$where_array);

      for($i=0;$i<count($data);$i++)
      {
        if($data[$i]['member_photo'] != 'no_user.jpg'){
          $delete_status = $this->delete_photo(ASSET_ORG_PHOTO.$data[$i]['member_photo']);
        }   
      }
      $team_delete_status = $this->sb->delete($this->team_tbl,$where_array);  
    }
    if($qry_status > 0)
      echo json_encode(array('delete_status'=>true));
    else
      echo json_encode(array('delete_status'=>false));
  }

  public function delete_team_data()
  {
    extract($_POST);
    $where_array = array('team_id'=>$team_id);
    $row = $this->sb->get_single($this->team_tbl,$where_array);
    if($row->member_photo != 'no_user.jpg')
    {
      $delete_status = $this->delete_photo(ASSET_ORG_PHOTO.$row->member_photo);
    }
    $team_delete_status = $this->sb->delete($this->team_tbl,$where_array); 
    if($team_delete_status > 0)
      echo json_encode(array('delete_status'=>true));
    else
      echo json_encode(array('delete_status'=>false)); 

  }
}

?>