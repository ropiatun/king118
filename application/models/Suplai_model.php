<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Suplai_model extends CI_Model
{
    private $_table = "suplai";

    public $id_suplai;
    public $id_user;
    public $id_produk;
    public $id_toko;
    public $tanggal;
    public $jumlah_suplai;
    public $status_suplai;

    public function rules()
    {
        return [
             ['field' => 'id_user',
            'label' => 'Id_user',
            'rules' => 'required'],

            ['field' => 'id_produk',
            'label' => 'Id_produk',
            'rules' => 'required'],

            ['field' => 'id_toko',
            'label' => 'Id_toko',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],

            ['field' => 'jumlah_suplai',
            'label' => 'Jumlah_suplai',
            'rules' => 'numeric'],
            
             ['field' => 'status_suplai',
            'label' => 'Status_suplai',
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
         $this->db->from('suplai');
         $this->db->join('user','suplai.id_user=user.id_user');
         $this->db->join('produk','suplai.id_produk=produk.id_produk');
         $this->db->join('toko','suplai.id_toko=toko.id_toko');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_suplai" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user          = $post["id_user"];
        $this->id_produk        = $post["id_produk"];
        $this->id_toko          = $post["id_toko"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_suplai    = $post["jumlah_suplai"];
        $this->status_suplai    = $post["status_suplai"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_suplai     =$post["id"];
        $this->id_user          =$post["id_user"];
        $this->id_produk        = $post["id_produk"];
        $this->id_toko          = $post["id_toko"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_suplai    = $post["jumlah_suplai"];
        $this->status_suplai    = $post["status_suplai"];
        
        return $this->db->update($this->_table, $this, array('id_suplai' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_suplai" => $id));
    }

    public function reward()
    {
        return $this->db->select('sum(jumlah_debit) as jmlh, sum(jumlah_pcs) as pcs,pemasukan.id_user,tanggal,user.nama')->from('pemasukan')->join('user','user.id_user=pemasukan.id_user')->group_by('id_user')->group_by('tanggal')->order_by('tanggal','desc')->order_by('pcs','desc')->get()->row();
    }

}

