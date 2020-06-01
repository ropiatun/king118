<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
    private $_table = "produksi";

    public $id_produksi;
    public $tanggal;
    public $jumlah;
    public $produk_jadi;

    public function rules()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],
            
            ['field' => 'produk_jadi',
            'label' => 'Produk Jadi',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produksi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tanggal      = $post["tanggal"];
        $this->jumlah       = $post["jumlah"];
        $this->produk_jadi  = $post["produk_jadi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produksi  =$post["id"];
        $this->tanggal      = $post["tanggal"];
        $this->jumlah       = $post["jumlah"];
        $this->produk_jadi  = $post["produk_jadi"];
        return $this->db->update($this->_table, $this, array('id_produksi' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produksi" => $id));
    }

}

