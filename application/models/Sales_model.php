<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    private $_table = "sales";

    public $id_sales;
    public $nama;
    public $alamat;
    public $no_hp;
    public $foto_ktp = "default.jpg";
    public $foto_selfie = "default.jpg";
    public $foto_profil = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'no_hp',
            'label' => 'Nomer Hp',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_sales" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama         = $post["nama"];
        $this->alamat        = $post["alamat"];
        $this->no_hp        = $post["no_hp"];
        $this->foto_ktp       =$this->_uploadImage();
        $this->foto_selfie       =$this->_uploadImage();
        $this->foto_profil       =$this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_sales    =$post["id"];
        $this->nama         = $post["nama"];
        $this->alamat        = $post["alamat"];
        $this->no_hp        = $post["no_hp"];

        if (!empty($_FILES["foto_ktp"]["name"])){
            $this->foto_ktp = $this->_uploadImage();
        }else {
            $this->foto_ktp = $post["old_image"];
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_sales" => $id));
    }

    private function _uploadImage()
{
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_sales;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto_ktp')) {
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

