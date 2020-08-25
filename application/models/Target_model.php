<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Target_model extends CI_Model
{
    private $_table = "target";

    public $id_target;
    public $tanggal;
    public $target_pcs;
    public $target_toko;
    public $id_user;
    public $id_produk;
    public $selisih_target;
    public $sisa_target;

    public function rules()
    {
        return [
             ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'target_pcs',
            'label' => 'Target_pcs',
            'rules' => 'required'],

            ['field' => 'target_toko',
            'label' => 'Target_toko',
            'rules' => 'required'],

           ['field' => 'id_user',
            'label' => 'Id_user',
            'rules' => 'required'],

           ['field' => 'id_produk',
            'label' => 'Id_produk',
            'rules' => 'required'],
            
             ['field' => 'selisih_target',
            'label' => 'Selisih_target',
            'rules' => 'required'],

             ['field' => 'sisa_target',
            'label' => 'Sisa_target',
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
         $this->db->from('target');
         $this->db->join('user','target.id_user=user.id_user');
         $this->db->join('produk','target.id_produk=produk.id_produk');
         $query = $this->db->get();
         return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_target" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tanggal          = $post["tanggal"];
        $this->target_pcs       = $post["target_pcs"];
        $this->target_toko      = $post["target_toko"];
        $this->id_user          = $post["id_user"];
        $this->id_produk        = $post["id_produk"];
        $this->selisih_target   = $post["selisih_target"];
        $this->sisa_target      = $post["sisa_target"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_target        =$post["id"];
        $this->tanggal          = $post["tanggal"];
        $this->target_pcs       = $post["target_pcs"];
        $this->target_toko      = $post["target_toko"];
        $this->id_user          = $post["id_user"];
        $this->id_produk        = $post["id_produk"];
        $this->selisih_target   = $post["selisih_target"];
        $this->sisa_target      = $post["sisa_target"];
        
        return $this->db->update($this->_table, $this, array('id_target' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_target" => $id));
    }

}

