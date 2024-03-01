<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Village_history extends MY_Controller
{
  public $tbl = 'village_history';

	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
	}

	public function index()
	{
    $this->layout->js(ASSETS_PATH.'global/plugins/ckeditor/ckeditor.js');
		$this->layout->title($this->lang->line('village_ttl'));
		$this->layout->view('village_history');
	}

  public function save_history()
  {
    extract($_POST);
    if(empty($history_id))
    {
      $check_ary = array('village_id'=>$village_id,'active_flag'=>1);
      $check_data = $this->sb->data_exists($this->tbl,$check_ary);

        if($check_data)
          echo json_encode(array('duplicate_status'=>true));
        else
        {
          if($_FILES['village_photo']['size'] > 0)
          {
            $file = $_FILES['village_photo']['name']; 
            $path = './assets/uploads/village_photo';
            $upload_status = $this->upload_img($file,'5000','100%','480','320',TRUE,'village_photo',FALSE,$path);
            if($upload_status['status'])
              $village_photo = $upload_status['img_name'];
            else
              $village_photo = 'no_village.jpg';
          }
          else
            $village_photo = 'no_village.jpg';

            $array = array('village_id'=>$village_id,'village_history'=>htmlspecialchars($village_history),
              'village_photo'=>$village_photo);
            
              $insert_status = $this->sb->insert($this->tbl,$array);
              if($insert_status > 0)
                echo json_encode(array("insert_status"=>true));
              else
                echo json_encode(array("insert_status"=>false));
        }
    }
    else
    {
      if(!empty($old_photo))
      {
        $delete_status = $this->delete_photo(ASSET_VILLAGE_PHOTO.$old_photo);
        
        $update_ary = array('village_id'=>$village_id,
        'village_history'=>htmlspecialchars($village_history),'village_photo'=>'no_village.jpg');
      }
      else
        $update_ary = array('village_id'=>$village_id,'village_history'=>htmlspecialchars($village_history));

        $where = array('history_id'=>$history_id,'active_flag'=>1);
        $update_status = $this->sb->update($this->tbl,$update_ary,$where);
        if($update_status > 0)
          echo json_encode(array("update_status"=>true));
        else
          echo json_encode(array("update_status"=>false));
    }  
  }

  public function view_village_history()
  {
    $column_order = array('','eng_name','village_photo','');
    $column_search = array('eng_name');
    $order = array('history_id' => 'DESC'); 

    $join_village_tbl = array("village_setting vs","vs.village_id = village_history.village_id","LEFT");
    $arrayw = array('village_history.active_flag' => '1');

    $this->dt->set_variable($this->tbl,$column_order,$column_search,$order,$arrayw,$join_village_tbl);
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->eng_name;
      $row[] = '<img alt='.$org->eng_name.' src='.VILLAGE_PHOTO.$org->village_photo.' height="60" width="100">';
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="edit_details('.$org->history_id.');"><i class="fa fa-pencil"></i>&nbsp;Edit Details</a>
              </li>
              <li>
              <a onclick="delete_details('.$org->history_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

  public function fetch_single_history()
  {
    extract($_POST);
    $where_array = array('history_id'=>$history_id);
    $row = $this->sb->get_single($this->tbl,$where_array);
    $data = array('history_id'=>$history_id,'village_id'=>$row->village_id,
      'village_history'=>htmlspecialchars_decode($row->village_history),'village_photo'=>$row->village_photo);
    echo json_encode(array($data));
  }

  public function delete_single_data()
  {
    extract($_POST);
    $where_array = array('history_id'=>$history_id);
    $row = $this->sb->get_single($this->tbl,$where_array);
    if($row->village_photo != 'no_village.jpg')
    {
      $delete_status = $this->delete_photo(ASSET_VILLAGE_PHOTO.$row->village_photo);
    }

    $qry_status = $this->sb->delete($this->tbl,$where_array);
    if($qry_status > 0)
      echo json_encode(array('delete_status'=>true));
    else
      echo json_encode(array('delete_status'=>false));
  }

}

?>