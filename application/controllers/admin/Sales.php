<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sales_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["sales"] = $this->sales_model->getAll();
        $this->load->view("admin/sales/list", $data);
    }

    public function tambah()
    {
        $sales      = $this->sales_model;
        $validation = $this->form_validation;
        $validation->set_rules($sales->rules());

        if ($validation->run()) {
            $sales->save();
        // var_dump($sales->save());
        // die;
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
            redirect('admin/sales');
        }


        $this->load->view("admin/sales/tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/sales');
       
        $sales = $this->sales_model;
        $validation = $this->form_validation;
        $validation->set_rules($sales->rules());

        if ($validation->run()) {
            $sales->update();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $data["sales"] = $produk->getById($id);
        if (!$data["sales"]) show_404();
        
        $this->load->view("admin/sales/edit", $data);
    }

    function detail($id){
         $data = [
            'kingsamadenganraja' => $this->db->get_where('sales',['id_user'=>$id])->row_array(),
        ];
        $this->load->view("admin/sales/detail", $data);
    }

     public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->sales_model->delete($id)) {
            redirect(site_url('admin/sales'));
        }
    }

    
}