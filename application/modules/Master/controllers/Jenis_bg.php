<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_bg extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jenis_bg');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Jenis BG";
		$data['userdata'] = $this->userdata;
		$this->template->views('Master/jenis_bg',$data);
		}

		else{
              redirect('Auth');
            }
	}

	public function json()
	{
		$data = $this->M_jenis_bg->get_jenis_bg();
		echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_jenis_bg');
    	$data = $this->M_jenis_bg->hapus($id);
      if ($data) {
        echo "Sukses";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_jenis_bg'] = mt_rand(100000,999999);
    	$data = $this->M_jenis_bg->simpan($arr);

    	echo json_encode($data);
    }

	public function edit()
	{
		$id = $this->input->POST('id_jenis_bg');
		$data = $this->M_jenis_bg->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_jenis_bg->update($arr);
		echo json_encode($data);
	}
	
        
}
