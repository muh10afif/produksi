<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_principal');
    
  }

  public function index()
  { 
    if (!empty($this->userdata)) {
    $data['Menu'] = "Master";
    $data['Page'] = "Principal";
    $data['userdata'] = $this->userdata;
    $this->template->views('Master/principal',$data);
    }else{
      redirect('Auth');
    }
  }

  public function json()
  {
    $data = $this->M_principal->get_data('principal');
    echo json_encode($data);
    }

    public function getData($table)
    {
      $post = $this->input->post();
      $data = $this->M_principal->get_data($table,$post);
      echo json_encode($data);
    }

    public function hapus()
    {
      $id = $this->input->post('id_principal');
      $data = $this->M_principal->hapus($id);
      if ($data) {
        echo "Sukses";
      }else{
        echo "Error";
      }
    }

    public function simpan()
    {
      $arr = $this->input->post();
      $arr['id_principal'] = mt_rand(100000, 999999);
      $data = $this->M_principal->simpan($arr);
      if ($data) {
        echo "Sukses";
      }else{
        echo "Error";
      }
    }
  
  public function update()
  {
    $arr = $this->input->post();
    $data = $this->M_principal->update($arr);
    if ($data) {
        echo "Sukses";
      }else{
        echo "Error";
      }
  }
  
        
}
