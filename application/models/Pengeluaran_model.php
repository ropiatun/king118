<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{
    private $_table = "pengeluaran";

    public $id_pengeluaran;
    public $id_produk;
    public $tanggal;
    public $jumlah_kredit;

    public function rules()
    {
        return [

            ['field' => 'id_produk',
            'label' => 'Id_produk',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],
            
            ['field' => 'jumlah_kredit',
            'label' => 'Jumlah_kredit',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

     public function getJoin()
    {
        $this->db->select('*');
         $this->db->from('pengeluaran');
         $this->db->join('produk','pengeluaran.id_produk=produk.id_produk');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengeluaran" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk         = $post["id_produk"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_kredit     = $post["jumlah_kredit"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengeluaran   = $post["id"];
        $this->id_produk        = $post["id_produk"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_kredit    = $post["jumlah_kredit"];
        
        return $this->db->update($this->_table, $this, array('id_pengeluaran' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengeluaran" => $id));
    }

}

