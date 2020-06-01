<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_model extends CI_Model
{
    private $_table = "toko";

    public $id_toko;
    public $nama_toko;
    public $nama_pemilik;
    public $alamat;
    public $no_hp;
    public $gambar = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'nama_toko',
            'label' => 'Nama Toko',
            'rules' => 'required'],

            ['field' => 'nama_pemilik',
            'label' => 'Nama Pemilik',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'Nomer Hp',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_toko" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_toko    = $post["nama_toko"];
        $this->nama_pemilik = $post["nama_pemilik"];
        $this->alamat       = $post["alamat"];
        $this->no_hp        = $post["no_hp"];
        $this->gambar       =$this->_uploadImage();
        
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_toko      =$post["id"];
        $this->nama_toko    = $post["nama_toko"];
        $this->nama_pemilik = $post["nama_pemilik"];
        $this->alamat       = $post["alamat"];
        $this->no_hp        = $post["no_hp"];

        if (!empty($_FILES["gambar"]["name"])){
            $this->gambar = $this->_uploadImage();
        }else {
            $this->gambar = $post["old_image"];
        }
        
        return $this->db->update($this->_table, $this, array('id_toko' => $post['id']));
    }

   function detail($id){
        $toko = array('id_toko'=>$id);
        return $this->db->get_where('toko',$toko);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_toko" => $id));
    }

    private function _uploadImage()
{
    $config['upload_path']          = './upload/toko/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_toko;
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
    if ($toko->gambar != "default.jpg") {
        $filename = explode(".", $toko->gambar)[0];
        return array_map('unlink', glob(FCPATH."upload/toko/$filename.*"));
    }
}
}

