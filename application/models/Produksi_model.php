<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
    private $_table = "produksi";

    public $id_produksi;
    public $id_produk;
    public $tanggal;
    public $biaya_produksi;
    public $jumlah_jadi;
    public $id_user;

    public function rules()
    {
        return [
             ['field' => 'id_produk',
            'label' => 'Id_produk',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'biaya_produksi',
            'label' => 'Biaya_produksi',
            'rules' => 'numeric'],
            
            ['field' => 'jumlah_jadi',
            'label' => 'Junlah_jadi',
            'rules' => 'numeric'],

            ['field' => 'id_user',
            'label' => 'Id_user',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getJoin()
    {
        $this->db->select('*');
         $this->db->from('produksi');
         $this->db->join('produk','produksi.id_produk=produk.id_produk');
         $this->db->join('user','produksi.id_user=user.id_user');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produksi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk        = $post["id_produk"];
        $this->tanggal          = $post["tanggal"];
        $this->biaya_produksi   = $post["biaya_produksi"];
        $this->jumlah_jadi      = $post["jumlah_jadi"];
        $this->id_user          = $post["id_user"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produksi      =$post["id"];
        $this->id_produk        =$post["id_produk"];
        $this->tanggal          = $post["tanggal"];
        $this->biaya_produksi   = $post["biaya_produksi"];
        $this->jumlah_jadi      = $post["jumlah_jadi"];
        $this->id_user          = $post["id_user"];
        
        return $this->db->update($this->_table, $this, array('id_produksi' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produksi" => $id));
    }

}

