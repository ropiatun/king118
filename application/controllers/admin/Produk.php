<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["produk"] = $this->produk_model->getAll();
        $this->load->view("admin/produk/list", $data);
    }

    public function tambah()
    {
        $produk = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/produk/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/produk');
       
        $produk = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["produk"] = $produk->getById($id);
        if (!$data["produk"]) show_404();
        
        $this->load->view("admin/produk/edit", $data);
    }

    function detail($id){
         $data = [
            'kingsamadenganraja' => $this->db->get_where('produk',['id_produk'=>$id])->row_array(),
        ];
        $this->load->view("admin/produk/detail", $data);
    }

     public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->produk_model->delete($id)) {
            redirect(site_url('admin/produk'));
        }
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