<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("penjualan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
       $data["penjualan"] = $this->penjualan_model->getJoin();
        $this->load->view("admin/penjualan/list", $data);
        
    }

    public function tambah()
    {
        $penjualan  = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualan->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();


        if ($validation->run()) {
            $penjualan->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/penjualan/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/penjualan');
       
        $penjualan  = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualan->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();

        if ($validation->run()) {
            $penjualan->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["penjualan"] = $penjualan->getById($id);
        if (!$data["penjualan"]) show_404();
        
        $this->load->view("admin/penjualan/edit", $data);
    }

     public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->penjualan_model->delete($id)) {
            redirect(site_url('admin/penjualan'));
        }
    }

    public function print()
    {
        $data['penjualan'] =  $this->penjualan_model->getAll();
        $this->load->view("admin/penjualan/print", $data);
    }

}