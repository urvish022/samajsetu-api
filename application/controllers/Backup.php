<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Backup extends MY_Controller 
{
  public $site_zip = '';
  public $db_zip = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
      $this->build_backups();
    }
    
    function build_backups()
    {
      $date = date('Y-m-d');
      $this->db_backup($date);
      $this->project_backup($date);
      $this->send_backup();
    }

    function db_backup($date)
    {
      $this->load->helper('file');
      $this->load->dbutil();
      @ $backup =& $this->dbutil->backup();
      write_file('site_backup/database_backup_'.$date.'.zip',$backup);
      $this->db_zip = 'database_backup_'.$date.'.zip';
    }

    function project_backup($date)
    {
      $this->load->library('zip');
      $this->zip->read_dir(FCPATH,FALSE);
      //$this->zip->download('site_backup_'.$date.'.zip');
      $this->zip->archive('site_backup/site_backup_'.$date.'.zip');
      $this->site_zip = 'site_backup_'.$date.'.zip';
    }

    function send_backup()
    {
      $response = $this->sendMailAttachment("urvish31797@gmail.com",$this->db_zip,$this->site_zip);
      print_r($response);
    }


}
?>