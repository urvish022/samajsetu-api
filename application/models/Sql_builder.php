<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sql_builder extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

  public function check_admin_credentials($tbl,$data)
  {
    $columns = array('admin_id','admin_fullname','admin_img','admin_username','admin_password',
      'admin_email','admin_mobile');
    $where_array = array('active_flag' => 1,'admin_username'=>$data['admin_username'],
      'admin_password'=>$data['admin_password']);
    $count = $this->count_all($tbl,$where_array);
    if($count > 0)
    {
      $list = $this->get_list($tbl,$where_array,$columns,'','','','');
      $response = array('status'=>true,'data'=>$list);
    }
    else
    {
      $response = array('status'=>false,'data'=>'');
    }
    return $response;
  }

  public function set_time_stamp($tbl,$data_ary,$id_ary)
  {
    $status = $this->update($tbl,$data_ary,$id_ary);
    return $status;
  }

  public function fetch_gallery_content($limit,$start)
  {
    $output = '';
    $this->db->select('*');
    $this->db->from('photo_gallery');
    $this->db->join('album_details', 'album_details.album_id = photo_gallery.album_id');
    $this->db->order_by('photo_id','desc');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    
    foreach ($query->result() as $value) {
      
      $output .= '
        <a class="elem" href="'.GALLERY_PHOTO.$value->photo_name.'" 
        title="'.$value->album_name.'" 
        data-lcl-txt="'.sqltodateformat($value->date).'" 
        data-lcl-author="Samaj Setu" 
        data-lcl-thumb="'.GALLERY_PHOTO.$value->photo_name.'?dpr=1&auto=format&fist=crop&w=150&q=80&cs=tinysrgb">

        <span style="background-image: url('.GALLERY_PHOTO.$value->photo_name.'
        "?dpr=1&auto=format&fit=crop&w=400&q=80&cs=tinysrgb");"></span>
        </a>

        <a id="target" class="trash_link btn btn-icon-only default" 
        onclick=set_photo_id("'.$value->photo_id.'","'.$value->photo_name.'")><i class="fa fa-trash"></i></a>
      ';
    }
    
    return $output;
  }
  
  public function fetch_gallery_photos($limit,$start)
  {
    $output = '';
    $this->db->select('*');
    $this->db->from('image_gallery');
    $this->db->order_by('img_id','desc');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    
    foreach ($query->result() as $value) {
      
      $output .= '
        <a class="elem" href="'.GENERAL_PHOTO.$value->photo_name.'" 
        title="" 
        data-lcl-txt="" 
        data-lcl-author="'.GENERAL_PHOTO.$value->photo_name.'" 
        data-lcl-thumb="'.GENERAL_PHOTO.$value->photo_name.'?dpr=1&auto=format&fist=crop&w=150&q=80&cs=tinysrgb">

        <span style="background-image: url('.GENERAL_PHOTO.$value->photo_name.'
        "?dpr=1&auto=format&fit=crop&w=400&q=80&cs=tinysrgb");"></span>
        </a>

        <a id="target" class="trash_link btn btn-icon-only default" 
        onclick=set_photo_id("'.$value->img_id.'","'.$value->photo_name.'")><i class="fa fa-trash"></i></a>
      ';
    }
    
    return $output;
  }
}
?>