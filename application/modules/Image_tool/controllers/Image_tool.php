<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_tool extends MY_Controller
{
  public $tbl = 'image_gallery';

  function __construct()
  {
    parent:: __construct();
    $this->load->model('Sql_builder','sb');
  }

  public function index()
  {
    $this->layout->css(ASSETS_PATH.'global/plugins/lightbox/css/lc_lightbox.css');
    $this->layout->css(ASSETS_PATH.'global/plugins/lightbox/skins/minimal.css');

    $this->layout->js(ASSETS_PATH.'global/plugins/lightbox/js/lc_lightbox.lite.js');
    $this->layout->js(ASSETS_PATH.'global/plugins/lightbox/lib/AlloyFinger/alloy_finger.min.js');
    
    $this->layout->title('Image Tool');
    
    $this->layout->view('image_tool');
  }

  public function save_gallery()
  {
    extract($_POST);

    if($_FILES['photo_name']['size'][0] > 0)   
    {
       $response = $this->upload_multiple_images('photo_name','./assets/uploads/general');
       if($response['status'])
       {
           for($i=0;$i<count($response['data']);$i++)
            {
              $insert_array = array('photo_name'=>$response['data'][$i]);
              $status = $this->sb->insert($this->tbl,$insert_array);
            }

            if($status > 0)
              echo json_encode(array('insert_status' => TRUE));  
            else
              echo json_encode(array('insert_status' => FALSE));  
       }
       else
          echo json_encode(array('insert_status' => FALSE));          
    }
  }

  public function upload_multiple_images($filename,$path)
  {
    $filesCount = count($_FILES[$filename]['name']);

    for($i = 0; $i < $filesCount; $i++)
    {
        $_FILES['file']['name'] = $_FILES[$filename]['name'][$i];     
        $_FILES['file']['type'] = $_FILES[$filename]['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES[$filename]['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES[$filename]['error'][$i];
        $_FILES['file']['size'] = $_FILES[$filename]['size'][$i];

        $file_ext = pathinfo($_FILES[$filename]["name"][$i], PATHINFO_EXTENSION);
        $new_name = time().rand(0,999);
        $config['file_name'] = $new_name;
        $lst_file_name = $config['file_name'].".".$file_ext;

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite']     = FALSE;
        $config['detect_mime'] = TRUE;
        $config['max_size']     = '5000';

        // Load and initialize upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        // Upload file to server
        if($this->upload->do_upload('file'))
        {
            $fileData = $this->upload->data();
            $config['image_library']   = 'gd2';
            $config['source_image']= $path.'/'.$fileData['file_name'];
            $config['maintain_ratio'] = TRUE;
            $config['remove_spaces'] = TRUE;
            // $config['width'] = 1200;
            // $config['height'] = 675;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

            $config['source_image']= $path.'/'.$fileData['file_name'];
            $config['wm_overlay_path'] = './assets/uploads/general/gallery_watermark.png';
            $config['wm_type'] = 'overlay';
            $config['wm_opacity'] = 100;
            $config['wm_vrt_alignment'] = 'top';
            $config['wm_hor_alignment'] = 'right';
            $config['wm_padding'] = '18';
            $config['wm_hor_offset'] = '35';
          
            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);                   
            $this->image_lib->watermark();
            $uploadData[$i] = $lst_file_name;  
            $mydata[] = $uploadData[$i];
            $status = true;   
        }
        else
        {
          $mydata = $this->upload->display_errors();
          $status = false;
        }
    }
    return array('status'=>$status,'data'=>$mydata);
  }

  public function fetch_gallery()
  {
    $this->load->library("pagination");
    $total_rows = $this->sb->count_all($this->tbl);
    $config = array();
    $config['base_url'] = '#';
    $config['total_rows'] = $total_rows;
    $config['per_page'] = 12;
    $config['uri_segment'] = 3;
    $config['use_page_numbers'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['num_links'] = '1';
    $this->pagination->initialize($config);
    $page = $this->uri->segment(3);
    $start = ($page - 1) * $config['per_page'];

    $output = array(
                'pagination_link' => $this->pagination->create_links(),
                'gallery_content' => $this->sb->fetch_gallery_photos($config['per_page'],$start)
              );
    echo json_encode($output);

  }

  public function delete_gallery_photo()
  {
    $id = $this->input->post('img_id');
    $status = $this->delete_photo(ASSET_GENERAL_PHOTO."/".$this->input->post('photo_name'));
    $where = array('img_id'=>$id);
    $delete_status = $this->sb->delete($this->tbl,$where);

    if($delete_status > 0)
      echo json_encode(array("response_status"=>true));
    else
     echo json_encode(array("response_status"=>false));  
  }

}
?>