<?php 

class Crud_model extends CI_Model
{

	function __construct(){
		parent::__construct();		
	}

	function create($id){

		$data = $this->search("",$id);

		$this->db->insert("member",array(
			"nama"=> $data[0]['nama'],
			"email"=> $data[0]['email'],
			"phone"=> $data[0]['phone'],
			));

		return $data;
	}

	function add_user($table, $data){
	
		$this->db->insert($table,$data);

	}


	function read(){
		$this->db->order_by("id","desc");
		$query=$this->db->get("member");
		return $query->result_array();
	}


	function update($id,$value,$modul){
		$this->db->where(array("id"=>$id));
		$this->db->update("member",array($modul=>$value));
	}

	function delete($id){
		$this->db->where("id_userproject",$id);
		$this->db->delete("userproject");
	}

	function search($name="",$id=""){
		if($name != ""){
			$data = $this->db->query(" SELECT * FROM `user` WHERE `name` LIKE '%".$name."%' ");
			return $data->result_array(); 
		} else {
			$this->db->where(array("id_or_passport"=> $id));
			$query = $this->db->get("user");
			return $query->result_array();
		}

	}


}