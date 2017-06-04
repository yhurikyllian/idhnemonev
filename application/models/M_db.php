<?php

class M_db extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}

	public function getTabel($where = "", $how ="*")
	{
		$data = $this->db->query('select '.$how.' from '.$where);
		return $data->result_array();
	}

	public function getEditTabel($table , $act)
	{
		$data = $this->db->query("SELECT * FROM ".$table." WHERE activity_code = '".$act."'");
		return $data->result_array();
	}

	public function getEditTabelUser($act){
		$data = $this->db->query("SELECT * FROM `user` INNER JOIN userproject ON user.id_user = userproject.id_user WHERE activity_code = '".$act."'");
		return $data->result_array();
	}

	public function getEditTabelSpeaker($act){
		$data = $this->db->query("SELECT * FROM `speaker` INNER JOIN session ON speaker.id_speaker = session.id_speaker  Where activity_code = '".$act."' GROUP BY session.id_speaker");
		return $data->result_array();
	}


	public function getProject(){
		$data = $this->db->query('SELECT DISTINCT project_title FROM `project`');
		return $data->result_array();
	}

	public function getYear($where){
		$data = $this->db->query("SELECT DISTINCT project_year FROM `project` WHERE project_title = '".$where."'");
		return $data->result_array();
	}

	public function getActivity($where){

		$data = $this->db->query("SELECT activity_code, activity_name FROM `project` WHERE project_year = '".$where."'");
		return $data->result_array();
	}

	public function getSession($where){

		$data = $this->db->query("SELECT session_title,id_session FROM `session` WHERE activity_code = '".$where."'");
		return $data->result_array();
	}

	public function getSessionbyId($where){

		$data = $this->db->query("SELECT session_date,id_session FROM `session` WHERE id_session = '".$where."'");
		return $data->result_array();
	}

	public function getActivityUser($where){

		$data = $this->db->query("SELECT userproject.id_userproject,user.id_or_passport, user.name, user.age, user.phone, user.id_or_passport FROM user INNER JOIN userproject ON userproject.id_user = user.id_user WHERE userproject.activity_code = '".$where."'");
		return $data->result_array();
	}

	public function getActivitySurvey($where, $survey){

		$data = $this->db->query("SELECT ".$survey." FROM survey INNER JOIN project ON survey.activity_code = project.activity_code WHERE survey.activity_code = '".$where."'");
		return $data->result_array();
	}

	public function getActivityMap($where){

		$data = $this->db->query("SELECT userproject.id_userproject, user.address, user.country, user.province, user.lat, user.lng, user.city FROM user INNER JOIN userproject ON userproject.id_user = user.id_user WHERE userproject.activity_code = '".$where."'");
		return $data->result_array();
	}

	

	public function getActivitySession($where){

		$data = $this->db->query("SELECT userproject.id_userproject,user.id_or_passport, user.name, user.age, user.phone, user.id_or_passport FROM user INNER JOIN userproject ON userproject.id_user = user.id_user WHERE userproject.activity_code = '".$where."'");
		return $data->result_array();
	}

	public function getId($where){

		$data = $this->db->query("SELECT * FROM `user` WHERE id_user = '".$where."'");
		return $data->result_array();
	}

	public function getId_project($where){

		$data = $this->db->query("SELECT * FROM `userproject` WHERE id_user = '".$where."'");
		return $data->result_array();
	}

	public function getId_speaker($where){
		$data = $this->db->query("SELECT * FROM `speaker` WHERE name = '".$where."'");
		return $data->result_array();
	}

	public function getId_document($where){

		$data = $this->db->query("SELECT * FROM `document` WHERE file_link = '".$where."'");
		return $data->result_array();
	}
	
	

	
	public function getTabel2($where = "", $how ="*", $poll, $num){
		$data = $this->db->query('select '.$how.' from '.$where.' WHERE `poll'.$poll.'` ='.$num);
		return $data->result_array();
	}

	public function getGender($where = "", $how ="*", $num){
		$data = $this->db->query("select ".$how." from `".$where."` WHERE `gender` = '".$num."'");
		return $data->result_array();
	}

	public function getRow($where = "", $how ="*", $username)
	{
		$data = $this->db->query("select ".$how." from ".$where." where `username` = '".$username."'");
		return $data->result_array();
	}

	public function getSurat($where = "", $how ="*")
	{
		$data = $this->db->query('select '.$how.' from surat '.$where);
		return $data->result_array();
	}
	 public function updateSurat($tablename, $data2, $where)
	{
		$res = $this->db->update($tablename, $data2, $where);
		return $res;
	}

	public function insert($data,$table){
		$this->db->insert($table, $data);
	}

	public function update($id,$surat, $data){
		$this->db->where('nomor_register', $id);
		$this->db->update($surat, $data);
	}

	public function getFrom($kolom, $value)
	{
		$data = $this->db->query("Select * From `surat` where `".$kolom."` = '".$value."'");
		return $data->result_array();
	}



	public function get_datetime(){
		date_default_timezone_set('Asia/Jakarta');
		$date_clicked = date('Y-m-d H:i:s');;
		return $date_clicked;
	}

	public function get_date(){
		date_default_timezone_set('Asia/Jakarta');
		$date_clicked = date('Y-m-d');
		return $date_clicked;
	}

	public function cek_id($nomor_register, $status)

		{
		$this->db->select('*');
		$this->db->from('surat_'.$status);
		$this->db->where('nomor_register', $nomor_register);
		$query = $this->db->get();
		return $query->num_rows();
		}
	// public function updateSurat($data2, $where)
	// {
	// 	$nama_surat = $data2['nama_surat'];
	// 	$tanggal_masuk = $data2['tanggal_masuk'];
	// 	$tanggal_keluar = $data2['tanggal_keluar'];
	// 	$status_surat = $data2['status_surat'];
	// 	$jenis_surat = $data2['jenis_surat'];

	// 	$res = $this->db->query("UPDATE 'surat' SET 'nama_surat' = '".$nama_surat."', 'tanggal_masuk' = '".$tanggal_masuk." , 'tanggal_keluar' = '".$tanggal_keluar."', 'status_surat' = '".$status_surat."' , 'jenis_surat' = '".$jenis_surat."' WHERE 'surat'.'nomor_surat' LIKE '%".$where."%'");
	// 	return $res;
	// }
// UPDATE `surat` SET `nama_surat` = '14' WHERE `surat`.`nomor_surat` = ' 123sdFsdg'

	

}