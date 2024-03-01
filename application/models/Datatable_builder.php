<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable_builder extends MY_Model {

	var $table;
	var $column_order; 
	var $column_search; 
	var $order;
	var $join1;
	var $join2;
  var $join3;
  var $join4;
	var $where;

	function __construct()
	{
		parent::__construct();
	}

	public function set_variable($table,$column_order,$column_search,$order,$where='',$join1='',$join2='',$join3='',$join4='')
	{
		$this->table = $table;
		$this->column_order = $column_order;
		$this->column_search = $column_search;
		$this->order = $order;
		$this->where = $where;
		$this->join1 = $join1;
		$this->join2 = $join2;
    $this->join3 = $join3;
    $this->join4 = $join4;
	}
	public function _get_datatables_query()
	{
		$this->db->from($this->table);
    if(!empty($this->where))
    $this->db->where($this->where);  
    if(!empty($this->join1))
		$this->db->join($this->join1[0],$this->join1[1],$this->join1[2]);
		if(!empty($this->join2))
		$this->db->join($this->join2[0],$this->join2[1],$this->join2[2]);
    if(!empty($this->join3))
    $this->db->join($this->join3[0],$this->join3[1],$this->join3[2]);
    if(!empty($this->join4))
    $this->db->join($this->join4[0],$this->join4[1],$this->join4[2]);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}  
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query(); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	public function get_by_id($table,$id,$tableid)
	{
		$this->db->from($table);
		$this->db->where($tableid,$id);
		$query = $this->db->get();

		return $query->row();
	}

}
?>
