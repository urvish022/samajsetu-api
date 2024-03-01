<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    // insert new data

    function insert($table_name, $data_array) {
        return $this->db->insert($table_name, $data_array);  
     }

     function insert_with_id($table_name, $data_array)
     {
        $this->db->insert($table_name, $data_array);
        $insert_id = $this->db->insert_id();
        return $insert_id;
     }

     // check data exist
     public function data_exists($table,$where)
      {
          $query = $this->db->get_where($table,$where);
          if ($query->num_rows() > 0)
            return TRUE;
          else
            return FALSE;
      }

    // insert new data

    function insert_batch($table_name, $data_array) {

        $this->db->insert_batch($table_name, $data_array);

        return $this->db->insert_id();
    }

    function print_query()
    {
      echo $this->db->last_query();
    }

    public function custom_query($qry)
    {
      $query = $this->db->query($qry);
      return $query->num_rows();
    }

    public function execute_qry($qry)
    {
      $query = $this->db->query($qry);
      $result = $query->result();
      return $result;
    }

    public function execute_my_query($myqry)
    {
        $query = $this->db->query($myqry);

        return $query->result_array();
    }

    // update data by index

    function update($table_name, $data_array, $index_array) {

        $this->db->update($table_name, $data_array, $index_array);

        return $this->db->affected_rows();
    }

    // delete data by index

    function delete($table_name, $index_array) {
        $this->db->delete($table_name, $index_array);

        return $this->db->affected_rows();
    }

    public function get_list($table_name, $index_array, $columns = null, $limit = null, $offset = 0, $order_field = null, $order_type = null) {

        if ($columns)
            $this->db->select($columns);

        if ($limit)
            $this->db->limit($limit, $offset);

        if ($order_type) {
            $this->db->order_by($order_field, $order_type);
        }

        return $this->db->get_where($table_name, $index_array)->result_array();
    }

    public function get_join_list($table_name, $index_array=null, $columns = null, $limit = null, $offset = 0, 
      $order_field = null, $order_type = null, $join1 = null, $join2 = null, $join3 = null)
    {
      if ($columns)
      $this->db->select($columns);

      if(!empty($join1))
      $this->db->join($join1[0],$join1[1],$join1[2]);

      if(!empty($join2))
      $this->db->join($join2[0],$join2[1],$join2[2]);

      if(!empty($join3))
      $this->db->join($join3[0],$join3[1],$join3[2]);

      if ($limit)
          $this->db->limit($limit, $offset);

      if ($order_type) {
          $this->db->order_by($order_field, $order_type);
      }
      if($index_array==null || $index_array=='')
        return $this->db->get($table_name)->result_array();
      else
        return $this->db->get_where($table_name, $index_array)->result_array();
    }

    public function get_list_nowhere($table_name, $columns = null, $limit = null, $offset = 0, $order_field = null, $order_type = null) {

        if ($columns)
            $this->db->select($columns);

        if ($limit)
            $this->db->limit($limit, $offset);

        if ($order_type) {
            $this->db->order_by($order_field, $order_type);
        }

        return $this->db->get($table_name)->result_array();
    }

    // get data list by index order

    function get_list_order($table_name, $index_array, $order_array, $limit = null) {

        if ($limit) {

            $this->db->limit($limit);
        }

        if ($order_array) {

            $this->db->order_by($order_array['by'], $order_array['type']);
        } else {

            $this->db->order_by('created', 'desc');
        }

        return $this->db->get_where($table_name, $index_array)->result();
    }

    // get single data by index

    function get_single($table_name, $index_array, $columns = null) {

        if ($columns)
            $this->db->select($columns);

        $this->db->limit(1);


        $row = $this->db->get_where($table_name, $index_array)->row();

        return $row;
    }

    function fetch_slider_data()
    {
      $this->db->select('*');
      $rows = $this->db->get_where('slider_setting','business_id != 0')->result_array();
      return $rows;
    }

    function get_single_nowhere($table_name) {

        $this->db->select('*');
        $this->db->limit(1);
        $row = $this->db->get($table_name)->row();

        return $row;
    }
   
    function get_single_row($table_name, $index_array, $columns = null) {

        if ($columns)
            $this->db->select($columns);

        $this->db->limit(1);

        $row = $this->db->get_where($table_name, $index_array)->result();

        return $row;
    }

    function get_single_random($table_name, $index_array, $columns = null) {

        if ($columns)
            $this->db->select($columns);

        $this->db->order_by('rand()');
        $this->db->limit(1);
        $row = $this->db->get_where($table_name, $index_array)->row();
        return $row;
    }

    // get number of rows in database

    function count_all($table_name, $index_array = null) {

        if ($index_array) {
            $this->db->where($index_array);
        }
        return $this->db->count_all_results($table_name);
    }

    // get data with paging

    function get_paged_list($table_name, $index_array, $url, $segment, $offset = 0, $order_by = null) {

        $result = array('rows' => array(), 'total_rows' => 0);



        $this->load->library('pagination');



        $limit = $this->config->item('admin_per_page');



        $this->db->where($index_array);



        $this->db->order_by('id', 'desc');


        /* if($order_by){
          $this->db->order_by('sort_order', 'ASC');
          }else{
          $this->db->order_by('modified', 'desc');
          } */


        $result['rows'] = $this->db->get($table_name, $limit, $offset)->result();


        $this->db->where($index_array);

        $result['total_rows'] = $total_rows = $this->db->count_all_results($table_name);


        $config['uri_segment'] = $segment;

        $config['base_url'] = site_url() . $url;

        $config['total_rows'] = $total_rows;

        $config['per_page'] = $this->config->item('admin_per_page');



        $this->pagination->initialize($config);

        $result['pagination'] = $this->pagination->create_links();



        return $result;
    }

// get data with paging

    function get_paged_list_order($table_name, $index_array, $order_array, $limit = 10, $offset = 0) {

        $result = array('rows' => array(), 'total_rows' => 0);



        if ($order_array) {

            $this->db->order_by($order_array['by'], $order_array['type']);
        } else {

            $this->db->order_by('created', 'desc');
        }



        $this->db->where($index_array);

        $result['rows'] = $this->db->get($table_name, $limit, $offset)->result();



        $this->db->where($index_array);

        $result['total_rows'] = $this->db->count_all_results($table_name);



        return $result;
    }

    // get single data by index

    function get_single_order($table_name, $index_array, $order_array, $columns = null) {

        if ($columns)
            $this->db->select($columns);

        $this->db->limit(1);

        if ($order_array) {

            $this->db->order_by($order_array['by'], $order_array['type']);
        } 

        $row = $this->db->get_where($table_name, $index_array)->row();

        return $row;
    }


    public function get_table_fields($table) {

        return $this->db->list_fields($table);
    }
        
   public function get_custom_id($table,$id_name,$prefix)
   {
      $max_id = '';
      $this->db->select_max($id_name);
      $max_id = $this->db->get($table)->row()->$id_name;
      
      if(isset($max_id) && $max_id > 0)
      {
        $max_id = $max_id+1;
      }else{
          $max_id = 1;
      }
      
      if(!$max_id){
        $max_id = '0000'.$max_id;
      }elseif($max_id > 0 && $max_id < 10){
          $max_id = '0000'.$max_id;      
      }elseif($max_id >= 10 && $max_id < 100){
          $max_id = '000'.$max_id;
      }elseif($max_id >= 100 && $max_id < 1000){
          $max_id = '00'.$max_id;
      }elseif($max_id >= 1000 && $max_id < 10000){
          $max_id = '0'.$max_id;
      }else{
          $max_id = $max_id;
      }      
      return $prefix.$max_id;
   }    
  
}

?>