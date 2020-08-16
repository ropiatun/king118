<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suplai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("suplai_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["suplai"] = $this->suplai_model->getJoin();
       
        $this->load->view("admin/suplai/list", $data);
    }

    public function tambah()
    {
        $suplai = $this->suplai_model;
        $validation = $this->form_validation;
        $validation->set_rules($suplai->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['toko'] = $this->db->get('toko')->result_array();

        if ($validation->run()) {
            $suplai->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/suplai/tambah",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/suplai');
       
        $suplai = $this->suplai_model;
        $validation = $this->form_validation;
        $validation->set_rules($suplai->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $data['toko'] = $this->db->get('toko')->result_array();


        if ($validation->run()) {
            $suplai->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["suplai"] = $suplai->getById($id);
        if (!$data["suplai"]) show_404();
        
        $this->load->view("admin/suplai/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->suplai_model->delete($id)) {
            redirect(site_url('admin/suplai'));
        }
    }
}