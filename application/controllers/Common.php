<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends MY_controller
{
  public $village_tbl = 'village_setting';
  public $bussiness_category_tbl = 'bussiness_category';
  public $country_details_tbl = 'country_details';
  public $organization_tbl = 'organization_details';
  public $album_tbl = 'album_details';
  public $carrer_post_category_tbl = 'carrer_post_category';
  public $relation_details_tbl = 'relation_details';
  public $proud_cat_tbl = 'proud_cat_details';


	public function __construct()
	{
		parent::__construct();
    $this->load->model('Sql_builder','sb');
	}	

	public function change_theme()
	{
		extract($_POST);
		$status = change_mytheme($theme);
		if($status > 0)
			echo json_encode(true);
		else
			echo json_encode(false);
	}

  public function all_backup()
  {
    $this->load->dbutil();

    $prefs = array(     
        'format'      => 'zip',             
        'filename'    => 'my_db_backup.sql'
        );

    $backup =& $this->dbutil->backup($prefs); 
    $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';

    $this->load->helper('download');
    force_download($db_name, $backup);
  }

	public function change_lang()
	{
		extract($_POST);
		$status = change_language($lang);
		if($status > 0)
			echo json_encode(true);
		else
			echo json_encode(false);	
	}

  public function villages_list()
  {
    $columns = array('village_id','eng_name');
    $where_array = array('active_flag' => 1);
    $count = $this->sb->count_all($this->village_tbl,$where_array);
    if($count > 0)
    {
      $list = $this->sb->get_list($this->village_tbl,$where_array,$columns,'','','eng_name','ASC');
      echo json_encode($list);
    }
  }

  public function businesscat_list()
  {
    $columns = array('bc_id','bc_eng_name','bc_guj_name');
    $count = $this->sb->count_all($this->bussiness_category_tbl);
    if($count > 0)
    {
      $list = $this->sb->get_list_nowhere($this->bussiness_category_tbl,$columns,'','','bc_eng_name','ASC');
      echo json_encode($list);
    }
  }

  public function carrer_cat_list()
  {
    $columns = array('cp_id','carrer_cat');
    $count = $this->sb->count_all($this->carrer_post_category_tbl);
    if($count > 0)
    {
      $list = $this->sb->get_list_nowhere($this->carrer_post_category_tbl,$columns,'','','carrer_cat','ASC');
      echo json_encode($list);
    }
  }

  public function proud_cat_list()
  {
    $columns = array('prc_id','prc_name');
    $count = $this->sb->count_all($this->proud_cat_tbl);
    if($count > 0)
    {
      $list = $this->sb->get_list_nowhere($this->proud_cat_tbl,$columns,'','','prc_name','ASC');
      echo json_encode($list);
    }
  }


  public function organization_list()
  {
    $columns = array('org_id','org_name');
    $count = $this->sb->count_all($this->organization_tbl);
    if($count > 0)
    {
      $list = $this->sb->get_list_nowhere($this->organization_tbl,$columns,'','','org_id','ASC');
      echo json_encode($list);
    }
  }

  public function view_album()
  {
    $columns = array('album_id','album_name');
    $list = $this->sb->get_list_nowhere($this->album_tbl,$columns,'','','album_name','ASC');
    echo json_encode($list);
  }

  public function villagesguj_list()
  {
    $columns = array('village_id','guj_name');
    $where_array = array('active_flag' => 1);
    $count = $this->sb->count_all($this->village_tbl,$where_array);
    if($count > 0)
    {
      $list = $this->sb->get_list($this->village_tbl,$where_array,$columns,'','','eng_name','ASC');
      echo json_encode($list);
    }
  }  

  public function countries_list()
  {
    $columns = array('country_id','country_std','country_name');
    $where_array = array('active_flag' => 1);
    $count = $this->sb->count_all($this->country_details_tbl,$where_array);
    if($count > 0)
    {
      $list = $this->sb->get_list($this->country_details_tbl,$where_array,$columns,'','','country_id','ASC');
      echo json_encode($list);
    }
  }

  public function relation_list()
  {
    $columns = array('relation_id','relation_name_eng','relation_name_guj');
    $count = $this->sb->count_all($this->relation_details_tbl);
    if($count > 0)
    {
      $list = $this->sb->get_list_nowhere($this->relation_details_tbl,$columns,'','','relation_name_eng','ASC');
      echo json_encode($list);
    }
  }

}
?>