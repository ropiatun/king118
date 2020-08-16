<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi_model extends CI_Model
{
    private $_table = "prediksi";

    public $id_prediksi;
    public $tanggal;
    public $penjualan;
    public $hasil_prediksi;

    public function rules()
    {
        return [

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'penjualan',
            'label' => 'Penjualan',
            'rules' => 'numeric'],
            
            ['field' => 'hasil_prediksi',
            'label' => 'Hasil_prediksi',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_prediksi" => $id])->row();
    }

    public function save()
    {
        $coba2 = $this->db->select('jumlah')->from('penjualan')->order_by('tanggal','desc')->limit(4)->get()->num_rows();
        $coba1 = $this->prediksi_model->getjumlah()->result_array();   

        $prediksi = $coba1[0]['sum(jumlah)']/$coba2 ;
        // var_dump($prediksi); die;

        $post = $this->input->post();
        $this->tanggal          = $post["tanggal"];
        $this->penjualan        = $post["penjualan"];
        $this->hasil_prediksi   = $prediksi;

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_prediksi      = $post["id"];
        $this->tanggal          = $post["tanggal"];
        $this->penjualan        = $post["penjualan"];
        $this->hasil_prediksi   = $post["hasil_prediksi"];
        
        return $this->db->update($this->_table, $this, array('id_prediksi' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_prediksi" => $id));
    }


    public function getjumlah()
    {
        return $this->db->query("SELECT sum(jumlah) FROM (SELECT jumlah FROM penjualan ORDER BY tanggal DESC LIMIT 4) as HASIL");

        // return $this->db->query("SELECT SUM(jumlah) as total FROM penjualan ORDER BY tanggal DESC LIMIT 8");
    }

}

