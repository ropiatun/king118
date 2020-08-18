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
    public $foto_selfie ="default.jpg";
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
        $this->username         = $post['username'];
        $this->password         = $post['password'];
        $this->nama             = $post['nama'];
        $this->email            = $post['email'];
        $this->no_telepon       = $post['no_telepon'];
        $this->foto_ktp         =$this->_uploadImageKtp();
        $this->foto_selfie      =$this->_uploadImageSelfie();
        $this->foto_profil      =$this->_uploadImageProfil();
        $this->alamat           = $post['alamat'];

        // var_dump($this->foto_ktp); die;?

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $this->id_user         =$post["id"];
         $this->username        = $post["username"];
         $this->password        = $post["password"];
         $this->nama            = $post["nama"];
         $this->email           = $post["email"];
         $this->no_telepon      = $post["no_hp"];

         if (!empty($_FILES["foto_ktp"]["name"])){
            $this->foto_ktp = $this->_uploadImage();
         }else {
             $this->foto_ktp = $post["old_image"];
         }

         if (!empty($_FILES["foto_selfie"]["name"])){
            $this->foto_selfie = $this->_uploadImage();
         }else {
             $this->foto_selfie = $post["old_image"];
         }

         if (!empty($_FILES["foto_profil"]["name"])){
            $this->foto_profil = $this->_uploadImage();
         }else {
             $this->foto_selfie = $post["old_image"];
         }


         $this->alamat      = $post["alamat"];
    }

    function detail($id){
        $sales = array('id_user'=>$id);
        return $this->db->get_where('sales',$sales);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    private function _uploadImageKtp()
    {
    $data = [];
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['encrypt_name']            = true;
    // $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto_ktp')) {
            $error = array('error' => $this->upload->display_errors());
    } else {
        $fileData = $this->upload->data();
        return $data['foto_ktp'] = $fileData['file_name'];
    }
    }

    private function _uploadImageSelfie()
    {
        $data = [];
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['encrypt_name']            = true;
    // $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto_selfie')) {
        $error = array('error' => $this->upload->display_errors()); 
         return "default.jpg";
    } else {
        $fileData = $this->upload->data();
        return $data['foto_selfie'] = $fileData['file_name'];
    }
    
       
}
    
 private function _uploadImageProfil()
    {
        $data = [];
    $config['upload_path']          = './upload/sales/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['encrypt_name']            = true;
    // $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto_profil')) {
        $error = array('error' => $this->upload->display_errors()); 
        return "default.jpg";
    } else {
        $fileData = $this->upload->data();
        return $data['foto_profil'] = $fileData['file_name'];
    }
}   
private function _deleteImage($id)
{
    $sales = $this->getById($id);
    if ($sales->foto_ktp != "default.jpg") {
        $filename = explode(".", $sales->foto_ktp)[0];
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

 public function reward($id,$tanggal)
    {
        $this->db->select('sum(jumlah_debit) as king');
         $this->db->from('pemasukan');
         $this->db->join('user','pemasukan.id_user=user.id_user');
         $this->db->join('produk','pemasukan.id_produk=produk.id_produk');
         $this->db->where('tanggal',$tanggal);
          $this->db->where('user.id_user',$id);
         $query = $this->db->get();
         return $query->result_array();
    }
}

