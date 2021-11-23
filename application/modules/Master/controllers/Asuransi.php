<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_asuransi');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Asuransi";
		$data['userdata'] = $this->userdata;
		$this->template->views('Master/asuransi',$data);
		}

		else{
      redirect('Auth');
    }
	}

	public function json()
	{
		$data = $this->M_asuransi->get_asuransi();
		echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_asuransi');
    	$data = $this->M_asuransi->hapus($id);
      if ($data) {
        echo "Sukses";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_asuransi'] = mt_rand(100000, 999999);
    	$data = $this->M_asuransi->simpan($arr);

    	echo json_encode($data);
    }
	public function cabang_asuransi()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Cabang Asuransi";
		$data['userdata'] = $this->userdata;
		$this->template->views('Master/cabang_asuransi',$data);
		}

		else{
          redirect('Auth');
        }
	}

	public function edit()
	{
		$id = $this->input->POST('id_asuransi');
		$data = $this->M_asuransi->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_asuransi->update($arr);
		echo json_encode($data);
	}
	
        
}
