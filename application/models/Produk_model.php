<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $nama;
    public $harga;
    public $keterangan;
    public $gambar = "default.jpg";
    public $stok;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'],

            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'numeric']
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
        $this->nama         = $post["nama"];
        $this->harga        = $post["harga"];
        $this->keterangan   = $post["keterangan"];
        $this->gambar       =$this->_uploadImage();
        $this->stok         = $post["stok"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk    =$post["id"];
        $this->nama         = $post["nama"];
        $this->harga        = $post["harga"];
        $this->keterangan   = $post["keterangan"];

        if (!empty($_FILES["gambar"]["name"])){
            $this->gambar = $this->_uploadImage();
        }else {
            $this->gambar = $post["old_image"];
        }
        $this->stok         = $post["stok"];
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
    $config['file_name']            = $this->id_produk;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

private function _deleteImage($id)
{
    $product = $this->getById($id);
    if ($produk->gambar != "default.jpg") {
        $filename = explode(".", $produk->gambar)[0];
        return array_map('unlink', glob(FCPATH."upload/produk/$filename.*"));
    }
}
}

