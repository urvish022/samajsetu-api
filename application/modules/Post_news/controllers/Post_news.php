<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_news extends MY_Controller
{
  public $post_tbl = 'news_details';

  function __construct()
  {
    parent::__construct();
    $this->load->model('Sql_builder', 'sb');
    $this->load->model('Datatable_builder', 'dt');
  }

  public function index()
  {
    $this->layout->js(ASSETS_PATH . 'global/plugins/ckeditor/ckeditor.js');
    $this->layout->title($this->lang->line('post_for_news'));
    $this->layout->view('post_news');
  }

  public function view_post_news()
  {
    $column_order = array('news_id', 'post_title', 'post_date', 'post_photo');
    $column_search = array('news_id', 'post_title', 'post_date', 'post_photo');
    $order = array('news_id' => 'desc');

    $this->dt->set_variable($this->post_tbl, $column_order, $column_search, $order, '');
    $list = $this->dt->get_datatables();
    $data = array();
    $no = $_POST['start'];

    foreach ($list as $org) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $org->post_title;
      $row[] = sqltodateformat($org->post_date);
      $row[] = '<img alt=' . $org->post_photo . ' src=' . NEWS_PHOTO . $org->post_photo . ' height="50" width="100">';

      $row[] = '<div class="btn-group m-r-2 m-b-2">
               <a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="btn red dropdown-toggle form-control">
                Action 
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                <a onclick="set_details(' . $org->news_id . ');"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                </li>
                <li>
                <a onclick="delete_details(' . $org->news_id . ');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

  public function save_post_news()
  {
    extract($_POST);
    if (empty($news_id)) {
      $check_ary = array('post_title' => $post_title);
      $check_data = $this->sb->data_exists($this->post_tbl, $check_ary);

      if ($check_data) {
        echo json_encode(array('duplicate_status' => true));
      } else {
        if ($_FILES['post_attachment']['name'][0] != '') {
          $result = $this->upload_attachments();
          if ($result['status'])
            $post_attachment = json_encode($result['data']);
          else
            $post_attachment = '';
        } else {
          $post_attachment = '';
        }

        if (isset($_FILES['post_photo']['name']) && ($_FILES['post_photo']['size'] > 0)) {
          $path = './assets/uploads/news_photo';
          $file = $_FILES['post_photo']['name'];
          $upload_status = $this->upload_img($file, '5000', '100%', '320', '480', TRUE, 'post_photo', FALSE, $path);
          if ($upload_status['status'])
            $post_photo = $upload_status['img_name'];
          else
            $post_photo = 'no_news.jpg';
        } else
          $post_photo = 'no_news.jpg';

        $insert_ary = array(
          'post_title' => $post_title, 'post_date' => datetosqlformat($post_date),
          'post_content' => htmlspecialchars($post_content), 'post_attachment' => $post_attachment, 'post_photo' => $post_photo
        );

        $insert_status = $this->sb->insert_with_id($this->post_tbl, $insert_ary);
        if ($insert_status)
          echo json_encode(array('insert_status' => TRUE, 'insert_id' => $insert_status));
        else
          echo json_encode(array('insert_status' => FALSE));
      }
    } else {
      if (!empty($old_photo)) {
        $delete_status = $this->delete_photo(ASSET_NEWS_PHOTO . $old_photo);

        $update_ary = array(
          'post_title' => $post_title, 'post_date' => datetosqlformat($post_date),
          'post_content' => htmlspecialchars($post_content), 'post_photo' => 'no_news.jpg'
        );
      } else {
        $update_ary = array(
          'post_title' => $post_title, 'post_date' => datetosqlformat($post_date),
          'post_content' => htmlspecialchars($post_content)
        );
      }

      $where = array('news_id' => $news_id);

      $update_status = $this->sb->update($this->post_tbl, $update_ary, $where);
      if ($update_status)
        echo json_encode(array('update_status' => TRUE));
      else
        echo json_encode(array('update_status' => FALSE));
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

  public function view_single_news()
  {
    extract($_POST);
    $where_array = array('news_id' => $news_id);
    $row = $this->sb->get_single($this->post_tbl, $where_array);
    $data = array(
      'news_id' => $row->news_id, 'post_content' => htmlspecialchars_decode($row->post_content),
      'post_date' => $row->post_date, 'post_title' => $row->post_title, 'post_photo' => $row->post_photo
    );
    echo json_encode(array($data));
  }

  public function send_notification()
  {
    extract($_POST);
    $where_array = array('news_id' => $news_id);
    $row = $this->sb->get_single($this->post_tbl, $where_array);
    $data = array('news_id' => $row->news_id, 'post_title' => $row->post_title, 'post_photo' => $row->post_photo);
    $status = $this->send_news_notification($data);
    if ($status)
      echo json_encode(array('status' => true));
  }

  public function send_news_notification($data)
  {
    $notificationdata = [
      'title' => 'Latest News',
      'message' => $data["post_title"],
      'image' => NEWS_PHOTO . $data["post_photo"],
      'type' => 'news_notify',
      'notification_id' => $data['news_id'],
      'model_id' => 'App\Models\NewsDetail'
    ];

    $id = $this->sb->insert_with_id('fcm_notifications', $notificationdata);
    call_notification_curl($id);

    return 1;
  }

  public function delete_single_data()
  {
    extract($_POST);
    $where_array = array('news_id' => $news_id);
    $row = $this->sb->get_single($this->post_tbl, $where_array);
    if ($row->post_photo != 'no_news.jpg') {
      $delete_status = $this->delete_photo(ASSET_NEWS_PHOTO . $row->post_photo);
    }

    $qry_status = $this->sb->delete($this->post_tbl, $where_array);
    if ($qry_status > 0)
      echo json_encode(array('delete_status' => true));
    else
      echo json_encode(array('delete_status' => false));
  }
}
