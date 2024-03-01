<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_career extends MY_Controller
{
  public $post_tbl = 'carrer_post_details';
  public $carrer_post_cat_tbl = 'carrer_post_category';

	function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
    $this->load->model('Datatable_builder','dt');
	}

	public function index()
	{
    $this->layout->js(ASSETS_PATH.'global/plugins/ckeditor/ckeditor.js');
		$this->layout->title($this->lang->line('post_for_carrer'));
		$this->layout->view('post_career');
	}

  public function save_cat_data()
  {
    extract($_POST);
    $ary = array('carrer_cat'=>$carrer_cat);
    $check_data = $this->sb->data_exists($this->carrer_post_cat_tbl,$ary);

    if(empty($cp_id))
    {
      if($check_data)
      {
        echo json_encode(array('duplicate_status'=>true));
      }
      else
      {
        $status = $this->sb->insert($this->carrer_post_cat_tbl,$ary);
        if($status > 0)
          echo json_encode(array('insert_status'=>true));
        else
          echo json_encode(array('insert_status'=>false));
      }
    }
    else
    {
      $where = array('cp_id'=>$cp_id);
      $status = $this->sb->update($this->carrer_post_cat_tbl,$ary,$where);
      if($status > 0)
          echo json_encode(array('update_status'=>true));
        else
          echo json_encode(array('update_status'=>false)); 
    }
    
  }

  public function view_cate_list()
  {
    $columns = array('cp_id','carrer_cat');
    $list = $this->sb->get_list_nowhere($this->carrer_post_cat_tbl,$columns,'','','cp_id','ASC');
    echo json_encode(array("data"=>$list));
  }

  public function delete_single_cate()
  {
    extract($_POST);
    if(isset($cp_id) && !empty($cp_id))
    {
      $where = array('cp_id'=>$cp_id);
      $list = $this->sb->get_list($this->post_tbl,$where,'','','','cpost_id','DESC');
      
      for($i=0;$i<count($list);$i++)
      {
        if($list[$i]['cpost_photo']!='no_carrer.jpg')
        {
          $delete_status = $this->delete_photo(ASSET_CARRER_PHOTO.$list[$i]['cpost_photo']);
        }
      }
      $qry_status = $this->sb->delete($this->post_tbl,$where);
      $delete_cat = $this->sb->delete($this->carrer_post_cat_tbl,$where);

      if($delete_cat > 0)
        echo json_encode(array('delete_status'=>true));  
      else
        echo json_encode(array('delete_status'=>false));
    }
    else
      echo json_encode(array('delete_status'=>false));
  }

  public function delete_post_data()
  {
    extract($_POST);
    if(isset($cpost_id) && !empty($cpost_id))
    {
      $where = array('cpost_id'=>$cpost_id);
      $list = $this->sb->get_single($this->post_tbl,$where);
      
      if($list->cpost_photo!="no_carrer.jpg")
        $delete_status = $this->delete_photo(ASSET_CARRER_PHOTO.$list->cpost_photo);
      
      $qry_status = $this->sb->delete($this->post_tbl,$where);
      if($qry_status > 0)
        echo json_encode(array('delete_status'=>true));  
      else
        echo json_encode(array('delete_status'=>false));
    }
    else
      echo json_encode(array('delete_status'=>false)); 
  }

  public function view_post_carrer()
  {
    $column_order = array('cpost_title','carrer_cat','cpost_date','cpost_photo');
    $column_search = array('cpost_date');
    $join_tbl = array("carrer_post_category cc","cc.cp_id = carrer_post_details.cp_id","LEFT");
    $order = array('cpost_id' => 'desc'); 

    $this->dt->set_variable($this->post_tbl,$column_order,$column_search,$order,'',$join_tbl);
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];
    
    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->cpost_title;
      $row[] = $org->carrer_cat;
      $row[] = sqltodateformat($org->cpost_date);
      $row[] = '<img alt='.$org->cpost_title.' src='.CARRER_PHOTO.$org->cpost_photo.' height="70" width="100">';
      
      $row[] = '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details('.$org->cpost_id.');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details('.$org->cpost_id.');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                </li>
                
                </ul>
              </div>';
                   
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dt->count_all($this->post_tbl),
            "recordsFiltered" => $this->dt->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);

  }

  public function save_post_carrer()
  {
    extract($_POST);
    if(empty($cpost_id))
    {
        $check_ary = array('cpost_title'=>$cpost_title);
        $check_data = $this->sb->data_exists($this->post_tbl,$check_ary);

        if($check_data)
        {
          echo json_encode(array('duplicate_status'=>true));
        }
        else
        {
            if($_FILES['cpost_attachment']['name'][0] != '')   
            {
              $result = $this->upload_attachments();
              if($result['status'])
                $cpost_attachment = json_encode($result['data']);
              else
                $cpost_attachment = '';  
            }
            else
              $cpost_attachment = '';

            if(isset($_FILES['cpost_photo']['name']) && ($_FILES['cpost_photo']['size'] > 0))   
            { 
              $path = './assets/uploads/carrer_photo';           
              $file = $_FILES['cpost_photo']['name']; 
              $upload_status = $this->upload_img($file,'5000','100%','320','480',TRUE,'cpost_photo',FALSE,$path);
              if($upload_status['status'])
                $cpost_photo = $upload_status['img_name'];
              else
                $cpost_photo = 'no_carrer.jpg';
            }
            else
                $cpost_photo = 'no_carrer.jpg'; 

              $insert_ary = array('cp_id'=>$cp_id,'cpost_title'=>$cpost_title,'cpost_date'=>datetosqlformat($cpost_date),
                'cpost_desc'=>$cpost_desc,'cpost_attachment'=>$cpost_attachment,
                'cpost_photo'=>$cpost_photo);

              $insert_status = $this->sb->insert_with_id($this->post_tbl,$insert_ary);
              if($insert_status)
                echo json_encode(array('insert_status' => TRUE,'insert_id'=>$insert_status));
              else
                echo json_encode(array('insert_status' => FALSE));
        }
    }
    else
    {
      if(!empty($old_photo))
      {
        $delete_status = $this->delete_photo(ASSET_CARRER_PHOTO.$old_photo);
        
        $update_ary = array('cp_id'=>$cp_id,'cpost_title'=>$cpost_title,'cpost_date'=>datetosqlformat($cpost_date),
        'cpost_desc'=>$cpost_desc,'cpost_photo'=>'no_carrer.jpg');
      }
      else
      {
        $update_ary = array('cp_id'=>$cp_id,'cpost_title'=>$cpost_title,'cpost_date'=>datetosqlformat($cpost_date),
        'cpost_desc'=>$cpost_desc);
      }

      $where = array('cpost_id'=>$cpost_id);

      $update_status = $this->sb->update($this->post_tbl,$update_ary,$where);
      if($update_status)
        echo json_encode(array('update_status' => TRUE));
      else
        echo json_encode(array('update_status' => FALSE));
    }
    
  }

  public function upload_attachments()
  {
    
       $filesCount = count($_FILES['cpost_attachment']['name']);
       
        for($i = 0; $i < $filesCount; $i++)
        {
            $_FILES['file']['name'] = $_FILES['cpost_attachment']['name'][$i];     
            $_FILES['file']['type'] = $_FILES['cpost_attachment']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['cpost_attachment']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['cpost_attachment']['error'][$i];
            $_FILES['file']['size'] = $_FILES['cpost_attachment']['size'][$i];

            $file_ext = pathinfo($_FILES["cpost_attachment"]["name"][$i], PATHINFO_EXTENSION);
            $new_name = time().rand(0,999);
            $config['file_name'] = $new_name;
            $lst_file_name = $config['file_name'].".".$file_ext;

            $config['upload_path'] = './assets/uploads/files';
            $config['allowed_types'] = 'pdf';
            $config['overwrite']     = FALSE;
            $config['max_size']     = '10240';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file'))
            {
                $fileData = $this->upload->data();
                $uploadData[$i] = $lst_file_name;                   
                $status = true;     
                $resultdata[] = $uploadData[$i];
            }
            else
            {
                $data = $this->upload->display_errors();
                $status = false;
                $resultdata = $data;
            }
            
        } 
    $result = array('status'=>$status,'data'=>$resultdata);
    return $result;
  }

  public function view_single_post()
  {
    extract($_POST);
    $where_array = array('cpost_id'=>$cpost_id);
    $row = $this->sb->get_single($this->post_tbl,$where_array);
    $data = array('cp_id'=>$row->cp_id,'cpost_desc'=>html_entity_decode(htmlspecialchars_decode($row->cpost_desc)));
    echo json_encode(array($row));
  }

  public function send_notification()
  {
      extract($_POST);
      $where_array = array('cpost_id'=>$cpost_id);
      $row = $this->sb->get_single($this->post_tbl,$where_array);
      $data = array('cpost_id'=>$row->cpost_id,'cpost_title'=>$row->cpost_title,'cpost_photo'=>$row->cpost_photo);
      $status = $this->send_cpost_notification($data);
      if($status)
        echo json_encode(array('status'=>true));
  }

  public function send_cpost_notification($data)
  {
    $notificationdata = [
      'title' => 'Carrer Guidence News',
      'message' => $data['cpost_title'],
      'image' => CARRER_PHOTO.$data['cpost_photo'],
      'type' => 'career_notify',
      'notification_id' => $data['cpost_id'],
      'model_id' => 'App\Models\CarrerPostDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);

    return 1;
  }

}

?>