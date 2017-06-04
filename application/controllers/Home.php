<?php
if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');
	class Home extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('m_login');
			$this->load->model('m_upload');

			$this->load->library(array('session'));
		}

		public function index(){
			$this->load->view('tes.php');
			}
		
	}
