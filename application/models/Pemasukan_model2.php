<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_model2 extends CI_Model
{
    private $_table = "pemasukan";

    public $id_pemasukan;
    public $id_user;
    public $tanggal;
    public $jumlah_debit;
    public $jumlah_pcs;
    public $id_produk;
    public $return_produk;
    public $id_target;

    public function rules()
    {
        return [

            ['field' => 'id_user',
            'label' => 'Id_user',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],
            
            ['field' => 'jumlah_debit',
            'label' => 'Jumlah_debit',
            'rules' => 'numeric'],

            ['field' => 'jumlah_pcs',
            'label' => 'Jumlah_pcs',
            'rules' => 'numeric'],

            ['field' => 'id_produk',
            'label' => 'Id_produk',
            'rules' => 'required'],
            
            ['field' => 'return_produk',
            'label' => 'Return_produk',
            'rules' => 'numeric'],

             ['field' => 'id_target',
            'label' => 'Id_target',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getJoin()
    {
        $this->db->select('*');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->join('target','pemasukan.id_target=target.id_target');
         $this->db->group_by('user.id_user');
         $query = $this->db->get();
         return $query->result();
    }

    

    public function detaillosdol($id_user)
    {
         $this->db->select('*');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->join('target','pemasukan.id_target=target.id_target');
         // $this->db->where('tanggal',$tanggal);
         $this->db->where('user.id_user',$id_user);
         $query = $this->db->get();
         return $query->result_array();
    }
    public function detaillosdolfilter($id_user,$where)
    {
         $this->db->select('*');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->join('target','pemasukan.id_target=target.id_target');
         // $this->db->where('tanggal',$tanggal);
         $this->db->where('user.id_user',$id_user);
         $this->db->where($where);
         $query = $this->db->get();
         return $query->result_array();
    }
    
    public function hitungdolfilter($id_user,$where)
    {
         $this->db->select('sum(jumlah_debit) as king, sum(jumlah_pcs) as queen');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->join('target','pemasukan.id_target=target.id_target');
         // $this->db->where('tanggal',$tanggal);
         $this->db->where($where);
          $this->db->where('user.id_user',$id_user);
         $query = $this->db->get();
         return $query->result_array();
    }
    public function hitungdol($id_user)
    {
        $this->db->select('sum(jumlah_debit) as king, sum(jumlah_pcs) as queen');
        $this->db->from('pemasukan');
        $this->db->join('user','pemasukan.id_user=user.id_user');
        $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
        $this->db->join('target','pemasukan.id_target=target.id_target');
         // $this->db->where('tanggal',$tanggal);
          $this->db->where('user.id_user',$id_user);
         $query = $this->db->get();
         return $query->result_array();
    }
    
    public function detaillosdolsatu($id_user)
    {
        $this->db->select('*');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->join('target','pemasukan.id_target=target.id_target');
         // $this->db->where('tanggal',$tanggal);
          $this->db->where('user.id_user',$id_user);
         $query = $this->db->get();
         return $query->row_array();
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pemasukan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user          = $post["id_user"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_debit     = $post["jumlah_debit"];
        $this->jumlah_pcs       = $post["jumlah_pcs"];
        $this->id_produk        = $post["id_produk"];
        $this->return_produk    = $post["return_produk"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pemasukan     = $post["id"];
        $this->id_user          = $post["id_user"];
        $this->tanggal          = $post["tanggal"];
        $this->jumlah_debit     = $post["jumlah_debit"];
        $this->jumlah_pcs       = $post["jumlah_pcs"];
        $this->id_produk        = $post["id_produk"];
        $this->return_produk    = $post["return_produk"];
        
        return $this->db->update($this->_table, $this, array('id_pemasukan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pemasukan" => $id));
    }

}

