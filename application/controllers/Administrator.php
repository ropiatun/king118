<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('Login_model');
	}

	
	public function index()
	{
		if($this->session->userdata('is_login') == TRUE ){redirect('home');}
		$this->load->view('login');
	}

	public function login()
	{
		if (isset($_POST['submit'])){
			$username = $this->input->post('username'); 
			$password = md5($this->input->post('password'));

			$check = $this->Login_model->checkLogin($username, $password);

			if (!$check) {
				$this->session->set_flashdata('pesan', 'Maaf Username dan Password Anda Salah');
				redirect('Administrator');
			}else{
				$data = array(
					'username' => $username,
					'password' => $password,
					'is_login' => TRUE,
					'nama'	   => $check->nama,
					);
				$this->session->set_userdata($data);
				redirect('Home');
			}
		}
	}
	public function logout(){
		$data = array('usename', 'password', 'is_login');
		$this->session->unset_userdata($data);
		redirect('administrator');
	}
}
