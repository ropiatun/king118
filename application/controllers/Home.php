<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login') == FALSE ){redirect('administrator');}
	}

	
	public function index()
	{
		$this->load->view('admin/home');
	}
}
