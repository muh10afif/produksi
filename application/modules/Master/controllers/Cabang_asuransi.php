<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_Asuransi extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cabang_asuransi');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Cabang Asuransi";
		$data['userdata'] = $this->userdata;
		$data['data_asuransi'] = $this->M_cabang_asuransi->get_asuransi();
		$this->template->views('Master/cabang_asuransi',$data);
		}

		else{
              redirect('Auth');
            }
	}

	public function json()
	{
		$data = $this->M_cabang_asuransi->get_cabang_asuransi();
		echo json_encode($data);
    }

    public function getData($table)
    {
      $post = $this->input->post();
      $data = $this->M_cabang_asuransi->get_data($table,$post);
      echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_cabang_asuransi');
    	$data = $this->M_cabang_asuransi->hapus($id);
      if ($data) {
        echo "Sukses";
      }else{
        echo "Error";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_cabang_asuransi'] = mt_rand(100000, 999999);
    	$data = $this->M_cabang_asuransi->simpan($arr);

    	echo json_encode($data);
    }
	

	public function edit()
	{
		$id = $this->input->POST('id_cabang_asuransi');
		$data = $this->M_cabang_asuransi->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_cabang_asuransi->update($arr);
		echo json_encode($data);
	}
	
        
}
