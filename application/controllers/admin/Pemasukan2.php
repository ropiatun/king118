<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pemasukan_model2");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pemasukan"] = $this->db->get_where('user', ['role_user    ' => 2])->result();

        $this->load->view("admin/pemasukan2/list", $data);
    }

    public function tambah()
    {
        $pemasukan = $this->pemasukan_model2;
        $validation = $this->form_validation;
        $validation->set_rules($pemasukan->rules());
        $data['user'] = $this->db->get('user')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();

        if ($validation->run()) {
            $pemasukan->save();
            $this->session->set_flashdata('sukses', 'Berhasil disimpan');
        }

        $this->load->view("admin/pemasukan/tambah", $data);
    }

    public function detail($id_user)
    {

        $data = [
            'kingsamadenganraja' => $this->db->get_where('user', ['id_user' => $id_user])->row_array(),
            'satu_orang' => $this->pemasukan_model2->detaillosdolsatu($id_user),
            'los_dol' => $this->pemasukan_model2->detaillosdol($id_user),
            'hitung_dol' => $this->pemasukan_model2->hitungdol($id_user),
            'jumlahtarget' => $this->pemasukan_model2->target($id_user),
        ];

        // echo '<pre>';
        // var_dump($data['jumlahtarget']);
        // echo '</pre>';
        // die;
        $this->load->view("admin/pemasukan2/detail", $data);
    }

    public function table_out($id_user)
    {
        $data = [
            'kingsamadenganraja' => $this->db->get_where('pemasukan', ['id_user' => $id_user])->row_array(),
            'satu_orang' => $this->pemasukan_model2->detaillosdolsatu($id_user),
            'los_dol' => $this->pemasukan_model2->detaillosdol($id_user),
            'hitung_dol' => $this->pemasukan_model2->hitungdol($id_user),
        ];

        // var_dump($data['hitung_dol']);
        // die;

        $this->load->view("admin/pemasukan2/table_out", $data);
    }
    public function filterbulan($id_user, $filter)
    {
        $where = ['date_format(pemasukan.tanggal,"%Y-%m")' => $filter];
        $data = array(
            'kingsamadenganraja' => $this->db->get_where('pemasukan', ['id_user' => $id_user])->row_array(),
            'satu_orang' => $this->pemasukan_model2->detaillosdolsatu($id_user),
            'los_dol' => $this->pemasukan_model2->detaillosdolfilter($id_user, $where),
            'hitung_dol' => $this->pemasukan_model2->hitungdolfilter($id_user, $where),
        );

        $this->load->view('admin/pemasukan2/table_out', $data);
    }

    // public function edit($id = null)
    // {
    //     if (!isset($id)) redirect('admin/pemasukan');

    //     $pemasukan = $this->pemasukan_model2;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pemasukan->rules());
    //     $data['sales'] = $this->db->get('sales')->result_array();
    //     $data['produk'] = $this->db->get('produk')->result_array();


    //     if ($validation->run()) {
    //         $pemasukan->update();
    //         $this->session->set_flashdata('sukses', 'Berhasil disimpan');
    //     }

    //     $data["pemasukan"] = $pemasukan->getById($id);
    //     if (!$data["pemasukan"]) show_404();

    //     $this->load->view("admin/pemasukan/edit", $data);
    // }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->pemasukan_model->delete($id)) {
            redirect(site_url('admin/pemasukan'));
        }
    }
}
