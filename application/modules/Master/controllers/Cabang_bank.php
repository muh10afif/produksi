<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_bank extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cabang_bank');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Cabang Bank";
		$data['userdata'] = $this->userdata;
		$data['bank'] = $this->M_cabang_bank->get_bank();	
		$this->template->views('Master/cabang_bank',$data);
		}
		else{
			  session_destroy();
              redirect('Auth');
            }
	}

	public function json()
	{
		$data = $this->M_cabang_bank->get_cabang_bank();
		echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_cabang_bank');
    	$data = $this->M_cabang_bank->hapus($id);
      if ($data) {
        echo "Sukses";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_cabang_bank'] = mt_rand(100000,999999);
    	$data = $this->M_cabang_bank->simpan($arr);

    	echo json_encode($data);
    }

	public function edit()
	{
		$id = $this->input->POST('id_cabang_bank');
		$data = $this->M_cabang_bank->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_cabang_bank->update($arr);
		echo json_encode($data);
	}
	
        
}
