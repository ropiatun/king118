<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $nama_produk;
    public $harga_dasar;
    public $keterangan;
    public $foto_produk = "default.jpg";
    public $stok_produk;
    public $harga_jual;
    public $berat_satuan;

    public function rules()
    {
        return [
            ['field' => 'nama_produk',
            'label' => 'Nama_produk',
            'rules' => 'required'],
            
            ['field' => 'harga_dasar',
            'label' => 'Harga_dasar',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'],

            ['field' => 'stok_produk',
            'label' => 'Stok_produk',
            'rules' => 'required'],

            ['field' => 'harga_jual',
            'label' => 'Harga_jual',
            'rules' => 'required'],

            ['field' => 'berat_satuan',
            'label' => 'Berat_satuan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id_produk = uniqid();
        $this->nama_produk  = $post["nama_produk"];
        $this->harga_dasar  = $post["harga_dasar"];
        $this->keterangan   = $post["keterangan"];
        $this->foto_produk  =$this->_uploadImage();
        $this->stok_produk  = $post["stok_produk"];
        $this->harga_jual   = $post["harga_jual"];
        $this->berat_satuan = $post["berat_satuan"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk    = $post["id"];
        $this->nama_produk  = $post["nama_produk"];
        $this->harga_dasar  = $post["harga_dasar"];
        $this->keterangan   = $post["keterangan"];

        if (!empty($_FILES["foto_produk"]["name"])){
            $this->foto_produk = $this->_uploadImage();
        }else {
            $this->foto_produk = $post["old_image"];
        }

        $this->stok_produk   = $post["stok_produk"];
        $this->harga_jual    = $post["harga_jual"];
        $this->berat_satuan  = $post["berat_satuan"];

        return $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

   function detail($id){
        $produk = array('id_produk'=>$id);
        return $this->db->get_where('produk',$produk);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }

   private function _uploadImage()
{
    $config['upload_path']          = './upload/produk/';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['file_name']            = $this->id_produk;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto_produk')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

private function _deleteImage($id)
{
    $produk = $this->getById($id);
    if ($produk->foto_produk != "default.jpg") {
        $filename = explode(".", $produk->foto_produk)[0];
        return array_map('unlink', glob(FCPATH."upload/produk/$filename.*"));
    }
}

public function hitung_produk()
{
 $this->db->select('*');
 $this->db->from('produk');
 $query = $this->db->get();
 return $query->num_rows();

}
}

