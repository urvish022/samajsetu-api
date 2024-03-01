<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Samaj_proud extends MY_Controller
{
  public $tbl = 'proud_details';

  function __construct()
  {
    parent::__construct();
    $this->load->model('Sql_builder', 'sb');
    $this->load->model('Datatable_builder', 'dt');
  }

  public function index()
  {
    $this->layout->js(ASSETS_PATH . 'global/plugins/ckeditor/ckeditor.js');
    $this->layout->title($this->lang->line('samaj_ttl'));
    $this->layout->view('samaj_proud');
  }

  public function save_proud()
  {
    extract($_POST);

    if (empty($pr_id)) {
      if (!empty($_FILES['photo_list']['name'][0])) {
        $response = $this->upload_multiple_images('photo_list', './assets/uploads/achievment_photo');
        if ($response['status']) {
          $photo_list = json_encode($response['data']);
        } else
          $photo_list = '';

        if (!empty($_FILES['post_attachment']['name'][0])) {
          $result = $this->upload_attachments();
          if ($result['status'])
            $post_attachment = json_encode($result['data']);
          else
            $post_attachment = '';
        } else
          $post_attachment = '';

        $insert_ary = array('prc_id' => $sprc_id, 'full_name' => ucwords($full_name), 'village_id' => $village_id, 'photo_list' => $photo_list, 'post_attachment' => $post_attachment, 'proud_details' => htmlspecialchars($proud_details));
        $insert_status = $this->sb->insert_with_id($this->tbl, $insert_ary);

        if ($insert_status > 0) {
          $photo_ary = json_decode($photo_list, TRUE);
          echo json_encode(array('insert_status' => true, 'insert_id' => $insert_status, 'name' => ucwords($full_name), 'photo' => $photo_ary[0]));
          //$this->send_proud_notification($insert_status,ucwords($full_name),$photo_ary[0]);
        } else
          echo json_encode(array('insert_status' => false));
      } else
        echo json_encode(array('insert_status' => false));
    } else {
      $insert_ary = array(
        'prc_id' => $sprc_id, 'full_name' => ucwords($full_name), 'village_id' => $village_id,
        'proud_details' => htmlspecialchars($proud_details)
      );
      $where = array('pr_id' => $pr_id);
      $update_status = $this->sb->update($this->tbl, $insert_ary, $where);

      if ($update_status > 0)
        echo json_encode(array('update_status' => true));
      else
        echo json_encode(array('update_status' => false));
    }
  }

  public function upload_attachments()
  {
    $filesCount = count($_FILES['post_attachment']['name']);

    for ($i = 0; $i < $filesCount; $i++) {
      $_FILES['file']['name'] = $_FILES['post_attachment']['name'][$i];
      $_FILES['file']['type'] = $_FILES['post_attachment']['type'][$i];
      $_FILES['file']['tmp_name'] = $_FILES['post_attachment']['tmp_name'][$i];
      $_FILES['file']['error'] = $_FILES['post_attachment']['error'][$i];
      $_FILES['file']['size'] = $_FILES['post_attachment']['size'][$i];

      $file_ext = pathinfo($_FILES["post_attachment"]["name"][$i], PATHINFO_EXTENSION);
      $new_name = time() . rand(0, 999);
      $config['file_name'] = $new_name;
      $lst_file_name = $config['file_name'] . "." . $file_ext;

      $config['upload_path'] = './assets/uploads/files';
      $config['allowed_types'] = 'pdf';
      $config['overwrite']     = FALSE;
      $config['max_size']     = '10240';

      // Load and initialize upload library
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      // Upload file to server
      if ($this->upload->do_upload('file')) {
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

    $result = array('status' => $status, 'data' => $resultdata);
    return $result;
  }

  public function upload_multiple_images($filename, $path)
  {
    $filesCount = count($_FILES[$filename]['name']);

    for ($i = 0; $i < $filesCount; $i++) {
      $_FILES['file']['name'] = $_FILES[$filename]['name'][$i];
      $_FILES['file']['type'] = $_FILES[$filename]['type'][$i];
      $_FILES['file']['tmp_name'] = $_FILES[$filename]['tmp_name'][$i];
      $_FILES['file']['error'] = $_FILES[$filename]['error'][$i];
      $_FILES['file']['size'] = $_FILES[$filename]['size'][$i];

      $file_ext = pathinfo($_FILES[$filename]["name"][$i], PATHINFO_EXTENSION);
      $new_name = time() . rand(0, 999);
      $config['file_name'] = $new_name;
      $lst_file_name = $config['file_name'] . "." . $file_ext;

      $config['upload_path'] = $path;
      $config['allowed_types'] = 'jpg|jpeg';
      $config['overwrite']     = FALSE;
      $config['detect_mime'] = TRUE;
      $config['max_size']     = '5000';

      // Load and initialize upload library
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      // Upload file to server
      if ($this->upload->do_upload('file')) {
        $fileData = $this->upload->data();
        $config['image_library']   = 'gd2';
        $config['source_image'] = $path . '/' . $fileData['file_name'];
        $config['wm_overlay_path'] = './assets/images/gallery_watermark.png';
        $config['wm_type'] = 'overlay';
        $config['wm_opacity'] = 100;
        $config['wm_vrt_alignment'] = 'top';
        $config['wm_hor_alignment'] = 'right';
        $config['wm_padding'] = '30';
        $config['wm_hor_offset'] = '70';

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
        $uploadData[$i] = $lst_file_name;
        $mydata[] = $uploadData[$i];
        $status = true;
      } else {
        $mydata = $this->upload->display_errors();
        $status = false;
      }
    }
    return array('status' => $status, 'data' => $mydata);
  }

  public function view_proud()
  {
    $column_order = array('pr_id', 'prc_name', 'full_name', 'eng_name');
    $column_search = array('pr_id', 'prc_name', 'full_name', 'eng_name');
    $order = array('pr_id' => 'DESC');

    $join_village_tbl = array("village_setting vs", "vs.village_id = proud_details.village_id", "LEFT");
    $join_proud_tbl = array("proud_cat_details ps", "ps.prc_id = proud_details.prc_id", "LEFT");

    $this->dt->set_variable($this->tbl, $column_order, $column_search, $order, '', $join_village_tbl, $join_proud_tbl);
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->prc_name;
      $row[] = $org->full_name;
      $row[] = $org->eng_name;

      $row[] = '<div class="btn-group m-r-2 m-b-2">
            <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
              Action 
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li>
              <a onclick="edit_details(' . $org->pr_id . ');"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
              </li>
              <li>
              <a onclick="delete_details(' . $org->pr_id . ');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

  public function proud_cat_list()
  {
    $columns = array('prc_id', 'prc_name');
    $list = $this->sb->get_list_nowhere('proud_cat_details', $columns, '', '', 'prc_id', 'DESC');
    echo json_encode(array("data" => $list));
  }

  public function save_proud_cat()
  {
    extract($_POST);

    if (empty($prc_id)) {
      $insert_status = $this->sb->insert('proud_cat_details', array('prc_name' => $prc_name));
      if ($insert_status > 0)
        echo json_encode(array('insert_status' => true));
      else
        echo json_encode(array('insert_status' => false));
    } else {
      $update_status = $this->sb->update('proud_cat_details', array('prc_name' => $prc_name), array('prc_id' => $prc_id));
      if ($update_status > 0)
        echo json_encode(array('update_status' => true));
      else
        echo json_encode(array('update_status' => false));
    }
  }

  public function delete_single_cate()
  {
    extract($_POST);
    $where = array('prc_id' => $prc_id);
    $rows = $this->sb->count_all($this->tbl, $where);
    if ($rows > 0) {
      $list = $this->sb->get_list($this->tbl, $where, '', '', '', 'pr_id', 'DESC');

      for ($i = 0; $i < count($list); $i++) {
        if (!empty($list[$i]['photo_list'])) {
          $photo_ary = json_decode($list[$i]['photo_list'], true);
          for ($j = 0; $j < count($photo_ary); $j++) {
            $delete_status = $this->delete_photo(ASSET_PROUD_PHOTO . $photo_ary[$j]);
          }
        }
      }
    }
    $delete_status = $this->sb->delete('proud_cat_details', $where);
    $delete_status1 = $this->sb->delete($this->tbl, $where);
    if ($delete_status > 0)
      echo json_encode(array('delete_status' => true));
    else
      echo json_encode(array('delete_status' => false));
  }

  public function delete_single_detail()
  {
    extract($_POST);
    $where = array('pr_id' => $id);
    $row = $this->sb->get_single($this->tbl, $where, '');
    if ($row) {
      if (!empty($row->photo_list)) {
        $photo_ary = json_decode($row->photo_list, true);
        for ($j = 0; $j < count($photo_ary); $j++) {
          $delete_status = $this->delete_photo(ASSET_PROUD_PHOTO . $photo_ary[$j]);
        }
      }

      if (!empty($row->post_attachment)) {
        $attach_ary = json_decode($row->post_attachment, true);
        for ($j = 0; $j < count($attach_ary); $j++) {
          $delete_status = $this->delete_photo('assets/uploads/files/' . $attach_ary[$j]);
        }
      }
      $delete_status = $this->sb->delete('proud_details', $where);
      echo json_encode(array('delete_status' => true));
    } else
      echo json_encode(array('delete_status' => false));
  }

  public function fetch_single_proud()
  {
    extract($_POST);
    $where_array = array('pr_id' => $pr_id);
    $row = $this->sb->get_single($this->tbl, $where_array);
    $data = array(
      'prc_id' => $row->prc_id, 'pr_id' => $row->pr_id, 'village_id' => $row->village_id,
      'proud_details' => htmlspecialchars_decode($row->proud_details),
      'full_name' => $row->full_name, 'photo_list' => json_decode($row->photo_list, true)
    );
    echo json_encode(array($data));
  }

  public function send_proud_notification()
  {
    extract($_POST);
    $notificationdata = [
      'title' => 'Samaj\'s Proud',
      'message' => 'Samaj Proud : '.$full_name,
      'image' => PROUD_PHOTO . $photo,
      'type' => 'proud_notify',
      'notification_id' => $pr_id,
      'model_id' => 'App\Models\ProudDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);

    return 1;
  }
}
