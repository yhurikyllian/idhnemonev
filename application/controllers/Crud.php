<?php 

class Crud extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->helper('url');
		$this->load->database();
	}


	function index(){

		$data["people"]=$this->crud_model->read();
		$this->load->view("crud_view",$data);

	}

	function create(){

		$id = $this->input->post("id");
		echo json_encode(array("id"=>$this->crud_model->create($id)));
	}

	function update(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->crud_model->update($id,$value,$modul);
		echo "{}";
	}

	function delete(){
		$id= $this->input->post("id");
		$this->crud_model->delete($id);
		echo "{}";
	}

	function search_nama(){

		$nama = $this->input->post("nama");
		$array = $this->crud_model->search($nama);
		
		$jumlah = count($array);

		

		// echo json_encode($tes);
		echo json_encode(array("id"=> $array, "jml" =>$jumlah));
			
	}



	function tes(){

		$id = "16";
		$data = $this->crud_model->create($id);

		$this->db->insert("member",array(
			"nama"=> $data[0]['nama'],
			"email"=> $data[0]['email'],
			"phone"=> $data[0]['phone'],
			));
		
	}

}