<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class M_login extends CI_Model

{


	public function __construct()
		{
		parent::__construct();
		}


	public function takeUser($username, $password, $status)

		{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('hak_akses', $status);
		

		$query = $this->db->get();
		return $query->num_rows();
		}

	public function getLevel($username, $password)

		{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		

		$query = $this->db->get();
		return $query->result_array();
		}

	 
	public function userData($username)

		{
		$this->db->select('username');
		$this->db->select('name');
		$this->db->select('level');
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->row();
		}

	public function userData2($username)

		{
		$this->db->select('username');
		$this->db->select('name');
		$this->db->select('level');
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->result_array();

		}

 

}
