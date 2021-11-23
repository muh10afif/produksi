<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kredit extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jenis_kredit');
		
	}

	public function index()
	{	
		if (!empty($this->userdata)) {
		$data['Menu'] = "Master";
		$data['Page'] = "Jenis Kredit";
		$data['userdata'] = $this->userdata;
		$this->template->views('Master/jenis_kredit',$data);
		}

		else{
              redirect('Auth');
            }
	}

	public function json()
	{
		$data = $this->M_jenis_kredit->get_jenis_kredit();
		echo json_encode($data);
    }

    public function hapus()
    {
    	$id = $this->input->post('id_jenis_kredit');
    	$data = $this->M_jenis_kredit->hapus($id);
      if ($data) {
        echo "Sukses";
      }
    }

    public function simpan()
    {
    	$arr = $this->input->post();
      $arr['id_jenis_kredit'] = mt_rand(100000, 999999);
    	$data = $this->M_jenis_kredit->simpan($arr);

    	echo json_encode($data);
    }

	public function edit()
	{
		$id = $this->input->POST('id_jenis_kredit');
		$data = $this->M_jenis_kredit->edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$arr = $this->input->post();
		$data = $this->M_jenis_kredit->update($arr);
		echo json_encode($data);
	}
	
        
}
