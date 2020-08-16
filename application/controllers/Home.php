<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->model('sales_model');
		$this->load->model('toko_model');
		$this->load->model('produk_model');
		$this->load->model('suplai_model');
		if($this->session->userdata('is_login') == FALSE ){redirect('administrator');}
	}

	
	public function index()
	{
		$data = array(
		'hitung_sales' => $this->sales_model->hitung_sales(),
		'hitung_toko' => $this->toko_model->hitung_toko(),
		'hitung_produk' => $this->produk_model->hitung_produk(),
		// 'reward' => $this->suplai_model->reward(),
	    );
	    // var_dump($data['reward']); die;

		$this->load->view('admin/home', $data);
	}
}
