<?php

class M_upload extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	
	public function show($table){
		$this->db->select('*');
		$data = $this->db->get($table);
		if($data->num_rows() > 0){
			return $data->result_array();
		}
		else{
			return false;
		}
	}

	public function getId($table){
		$data = $this->db->query("select MAX(ID) from ".$table);
		return $data->result_array();
	}

	public function get_datetime(){
		date_default_timezone_set('Asia/Jakarta');
		$date_clicked = date('Y-m-d H:i:s');;
		return $date_clicked;
	}
	
	public function insert($data,$table){
		$this->db->insert($table, $data);
	}

	public function updateData($tablename, $data2, $where)
	{
		$res = $this->db->update($tablename, $data2, $where);
		return $res;
	}
	
}