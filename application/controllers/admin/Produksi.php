<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("produksi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["produksi"] = $this->produksi_model->getJoin();
       
        $this->load->view("admin/produksi/list", $data);
    }

    public function tambah()
    {
        $produksi = $this->produksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($produksi->rules());
        $data['produk'] = $this->db->get('produk')->result_array();

        if ($validation->run()) {
            $produksi->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/produksi/tambah",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/produksi');
       
        $produksi = $this->produksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($produksi->rules());
        $data['produk'] = $this->db->get('produk')->result_array();


        if ($validation->run()) {
            $produksi->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["produksi"] = $produksi->getById($id);
        if (!$data["produksi"]) show_404();
        
        $this->load->view("admin/produksi/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->produksi_model->delete($id)) {
            redirect(site_url('admin/produksi'));
        }
    }
}