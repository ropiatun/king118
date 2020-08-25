<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Target extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("target_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["target"] = $this->target_model->getJoin();

        $this->load->view("admin/target/list", $data);
    }

    public function tambah()
    {
        $target = $this->target_model;
        $validation = $this->form_validation;
        $validation->set_rules($target->rules());
        $data['user'] = $this->db->get_where('user', ['role_user' => 2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();


        if ($validation->run()) {
            $target->save();
            $id = $this->input->post('id_produk');
            $pcs = $this->input->post('target_pcs');
            $select = $this->db->get_where('produk', ['id_produk' => $id])->row();
            $stoklama = $select->stok_produk - $pcs;
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');

            $this->db->set('stok_produk', $stoklama);
            $this->db->where('id_produk', $id);
            $this->db->update('produk');
        }

        $this->load->view("admin/target/tambah", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/target');

        $target = $this->target_model;
        $validation = $this->form_validation;
        $validation->set_rules($target->rules());
        $data['user'] = $this->db->get_where('user', ['role_user' => 2])->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();


        if ($validation->run()) {
            $target->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["target"] = $target->getById($id);
        if (!$data["target"]) show_404();

        $this->load->view("admin/target/edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->target_model->delete($id)) {
            redirect(site_url('admin/target'));
        }
    }
}
