<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("prediksi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
       $data["prediksi"] = $this->prediksi_model->getJoin();
        $this->load->view("admin/prediksi/list", $data);
    }

    public function tambah()
    {
        $prediksi = $this->prediksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prediksi->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();

        if ($validation->run()) {
            $prediksi->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }


        $this->load->view("admin/prediksi/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/prediksi');
       
        $prediksi = $this->prediksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prediksi->rules());
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();

        if ($validation->run()) {
            $prediksi->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["prediksi"] = $prediksi->getById($id);
        if (!$data["prediksi"]) show_404();
        
        $this->load->view("admin/prediksi/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->prediksi_model->delete($id)) {
            redirect(site_url('admin/prediksi'));
        }
    }
}