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
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();

        

        if ($validation->run()) {
            $produksi->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
$id = $this->input->post('id_produk');
            $jadi =$this->input->post('jumlah_jadi');
            $select = $this->db->get_where('produk',['id_produk'=>$id])->row();
            $stokbaru = $select->stok_produk + $jadi;
            
            $this->db->set('stok_produk',$stokbaru);
            $this->db->where('id_produk',$id);
            $this->db->update('produk');
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
        $data['user'] = $this->db->get_where('user',['role_user'=>1])->result_array();


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