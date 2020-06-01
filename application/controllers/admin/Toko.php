<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("toko_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["toko"] = $this->toko_model->getAll();
        $this->load->view("admin/toko/list", $data);
    }

    public function tambah()
    {
        $toko = $this->toko_model;
        $validation = $this->form_validation;
        $validation->set_rules($toko->rules());

        if ($validation->run()) {
            $toko->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/toko/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/toko');
       
        $toko = $this->toko_model;
        $validation = $this->form_validation;
        $validation->set_rules($toko->rules());

        if ($validation->run()) {
            $toko->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["toko"] = $toko->getById($id);
        if (!$data["toko"]) show_404();
        
        $this->load->view("admin/toko/edit", $data);
    }

    function detail($id){
        $toko = array('id_toko'=>$id);
        return $this->db->get_where('toko',$produk);
    }

    public function delete($id=null)
    {
        if (!isset($id)) redirect('admin/toko');
       
        $toko = $this->toko_model;
        $validation = $this->form_validation;
        $validation->set_rules($toko->rules());

        if ($validation->run()) {
            $toko->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["toko"] = $toko->getById($id);
        if (!$data["toko"]) show_404();
        
        $this->load->view("admin/toko/delete", $data);
    }

    public function print_data()
    {
        $s_id = $this->uri->segment(3);

        $where = "s_id = '$s_id'";

        $data['student'] = $this->m_students->get_students($where);
        $data['title'] = $data['student']['s_name']." &minus; Arsip Digital Siswa | SMK Muhammadiyah 3 Nganjuk";
        $data['attachment'] = 'Lampiran';
        if (!$s_id) {
            redirect(site_url('student'));
        } else {
            $this->load->view('dashboard/student-print', $data);
        }
    }
}