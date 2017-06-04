<?php

class M_address extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	
	public function getAddress() {
    $protocol = isset($_SERVER['HTTPS']) === true ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

}