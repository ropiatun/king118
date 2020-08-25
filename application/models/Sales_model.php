<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $username;
    public $password;
    public $nama;
    public $email;
    public $no_telepon;
    public $foto_ktp    ="default.jpg";
    public $selfie_ktp  ="default.jpg";
    public $foto_profil ="default.jpg";
    public $alamat;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
            
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

             ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

             ['field' => 'no_telepon',
            'label' => 'No_telepon',
            'rules' => 'required'],

             ['field' => 'foto_ktp',
            'label' => 'Foto_ktp',
            'rules' => 'required'],

             ['field' => 'selfie_ktp',
            'label' => 'Selfie_ktp',
            'rules' => 'required'],

            ['field' => 'foto_profil',
            'label' => 'Foto_profil',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required']
        ];
    }

        public function getAll()
    {
        // return $this->db->get($this->_table)->result();
         $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_user', 2);
        return $this->db->get()->result();
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama    = $post["nama"];
        $this->no_telepon = $post["no_telepon"];
        $this->alamat       = $post["alamat"];
        $this->email        = $post["email"];
        $this->fotoktp   =$this->_uploadImage1();
        $this->selfie_ktp    =$this->_uploadImage2();
        $this->foto_profil    =$this->_uploadImage3();

        return $this->db->insert($this->_table, $this);
    }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_toko      = $post["id"];
    //     $this->nama_toko    = $post["nama_toko"];
    //     $this->nama_pemilik = $post["nama_pemilik"];
    //     $this->alamat       = $post["alamat"];
    //     $this->no_hp        = $post["no_hp"];

    //     if (!empty($_FILES["foto_toko"]["name"])){
    //         $this->foto_toko = $this->_uploadImage();
    //     }else {
    //         $this->foto_toko = $post["old_image"];
    //     }

    //     return $this->db->update($this->_table, $this, array('id_toko' => $post['id']));
    // }

  function detail($id){
        $sales = array('id_user'=>$id);
        return $this->db->get_where('user',$sales);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    private function _uploadImage1()
{
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['file_name']            = $this->id_toko;
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

private function _uploadImage2()
{
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['file_name']            = $this->id_toko;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('selfie_ktp')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

private function _uploadImage3()
{
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['file_name']            = $this->id_toko;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto_profil')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

private function _deleteImage1($id)
{
    $sales = $this->getById($id);
    if ($sales->foto_ktp != "default.jpg") {
        $filename = explode(".", $sales->foto_ktp)[0];
        return array_map('unlink', glob(FCPATH."upload/sales/$filename.*"));
    }
}

private function _deleteImage2($id)
{
    $sales = $this->getById($id);
    if ($sales->selfie_ktp != "default.jpg") {
        $filename = explode(".", $sales->selfie_ktp)[0];
        return array_map('unlink', glob(FCPATH."upload/sales/$filename.*"));
    }
}

private function _deleteImage3($id)
{
    $sales = $this->getById($id);
    if ($sales->foto_profil != "default.jpg") {
        $filename = explode(".", $sales->foto_profil)[0];
        return array_map('unlink', glob(FCPATH."upload/sales/$filename.*"));
    }
}

public function hitung_sales()
{
 $this->db->select('*');
 $this->db->from('user');
 $this->db->where('role_user', 2);
 $query = $this->db->get();
 return $query->num_rows();
}

}

