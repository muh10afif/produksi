<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Bank');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Bank";
		$data['userdata'] = $this->userdata;
		$this->template->views('Master/bank',$data);
		}

		else{
              redirect('Auth');
            }
	}

	public function json()
	{
		$data = $this->M_Bank->get_bank();
		echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_bank');
    	$data = $this->M_Bank->hapus($id);
      if ($data) {
        echo "Sukses";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_bank'] = mt_rand(100000,999999);
    	$data = $this->M_Bank->simpan($arr);

    	echo json_encode($data);
    }

	public function edit()
	{
		$id = $this->input->POST('id_bank');
		$data = $this->M_Bank->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_Bank->update($arr);
		echo json_encode($data);
	}
	
        
}
