<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    private $_table = "penjualan";

    public $id_penjualan;
    public $tanggal;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_penjualan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tanggal    = $post["tanggal"];
        $this->jumlah     = $post["jumlah"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_penjualan     = $post["id"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah           = $post["jumlah"];

        return $this->db->update($this->_table, $this, array('id_penjualan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_penjualan" => $id));
    }

}

