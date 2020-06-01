<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sales_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["sales"] = $this->sales_model->getAll();
        $this->load->view("admin/sales/list", $data);
    }

    public function tambah()
    {
        $sales      = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($sales->rules());

        if ($validation->run()) {
            $sales->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/sales/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/sales');
       
        $sales = $this->sales_model;
        $validation = $this->form_validation;
        $validation->set_rules($sales->rules());

        if ($validation->run()) {
            $sales->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["sales"] = $produk->getById($id);
        if (!$data["sales"]) show_404();
        
        $this->load->view("admin/sales/edit", $data);
    }

     public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/sales');
       
        $sales = $this->sales_model;
        $validation = $this->form_validation;
        $validation->set_rules($sales->rules());

        if ($validation->run()) {
            $sales->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["sales"] = $sales->getById($id);
        if (!$data["sales"]) show_404();
        
        $this->load->view("admin/sales/delete", $data);
    }
}