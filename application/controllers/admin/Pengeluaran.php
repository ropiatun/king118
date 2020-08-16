<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengeluaran_model");
        $this->load->library('form_validation');
    }

   public function index()
    {
        $data["pengeluaran"] = $this->pengeluaran_model->getJoin();
       
        $this->load->view("admin/pengeluaran/list", $data);
    }

    public function tambah()
    {
        $pengeluaran = $this->pengeluaran_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengeluaran->rules());
        $data['produk'] = $this->db->get('produk')->result_array();

        if ($validation->run()) {
            $pengeluaran->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/pengeluaran/tambah",$data);
    }

   public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pengeluaran');
       
        $pengeluaran = $this->pengeluaran_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengeluaran->rules());
        $data['produk'] = $this->db->get('produk')->result_array();


        if ($validation->run()) {
            $pengeluaran->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["pengeluaran"] = $pengeluaran->getById($id);
        if (!$data["pengeluaran"]) show_404();
        
        $this->load->view("admin/pengeluaran/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pengeluaran_model->delete($id)) {
            redirect(site_url('admin/pengeluaran'));
        }
    }

    public function print()
    {
        $data['pengeluaran'] =  $this->pengeluaran_model->getJoin();
        $this->load->view("admin/pengeluaran/print", $data);
        $data['produk'] = $this->db->get('produk')->result_array();
    }
}