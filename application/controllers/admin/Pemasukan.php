<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pemasukan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pemasukan"] = $this->pemasukan_model->getJoin();
       
        $this->load->view("admin/pemasukan/list", $data);
    }

    public function tambah()
    {
        $pemasukan = $this->pemasukan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemasukan->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['target'] = $this->db->get('target')->result_array();

        if ($validation->run()) {
            $pemasukan->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/pemasukan/tambah",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pemasukan');
       
        $pemasukan = $this->pemasukan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemasukan->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['target'] = $this->db->get('target')->result_array();


        if ($validation->run()) {
            $pemasukan->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["pemasukan"] = $pemasukan->getById($id);
        if (!$data["pemasukan"]) show_404();
        
        $this->load->view("admin/pemasukan/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pemasukan_model->delete($id)) {
            redirect(site_url('admin/pemasukan'));
        }
    }

    public function print()
    {
        $data['pemasukan'] =  $this->pemasukan_model->getJoin();
        $this->load->view("admin/pemasukan/print", $data);
        $data['produk'] = $this->db->get('produk')->result_array();
    }
}