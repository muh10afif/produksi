<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{	
		if (!empty($this->userdata)) {

			$tgl_sekarang 	= date("Y-m-d", now('Asia/Jakarta'));

            $tahun_skrg 	= date("Y", now('Asia/Jakarta'));
            
			$tgl_awal	 	= "$tahun_skrg-01-01";
			
			// mencari 5 bulan terkahir
			$bln = array();

			$skrg = date("Y-m");

			$nilai_kontrak 	= array();
			$nilai_jaminan 	= array();
			$nilai_komisi 	= array();

			for ($i=5; $i >= 1; $i--) { 
				$a = date('F-Y', strtotime("$skrg -$i months"));

				$data = (object) ['bulan' => $a ];

				$a_bln = date("Y-m", strtotime($a));

				// mencari jumlah nilai kontrak
				$nilai_k = $this->M_dashboard->total_nilai_kontrak($a_bln, $tgl_a = '', $tgl_k = '')->row();

				$data_k = (object) ['jml_nilai_kontrak' => $nilai_k->jml_nilai_kontrak];

				array_push($nilai_kontrak, $data_k);

				// mencari jumlah nilai jaminan
				$nilai_j = $this->M_dashboard->total_nilai_jaminan($a_bln, $tgl_a = '', $tgl_k = '')->row();

				$data_j  = (object) ['jml_nilai_jaminan' => $nilai_j->jml_nilai_jaminan];

				array_push($nilai_jaminan, $data_j);

				// mencari jumlah nilai komisi
				$nilai_ko = $this->M_dashboard->total_nilai_komisi($a_bln, $tgl_a = '', $tgl_k = '')->row();

				$data_ko  = (object) ['jml_nilai_komisi' => $nilai_ko->jml_nilai_komisi];

				array_push($nilai_komisi, $data_ko);

				array_push($bln, $data);
			}

			$data = ['jml_asuransi' 			=> $this->M_dashboard->get_data('asuransi')->num_rows(),
					'jml_cb_asuransi'			=> $this->M_dashboard->get_data('cabang_asuransi')->num_rows(),
					'jml_bank'					=> $this->M_dashboard->get_data('bank')->num_rows(),
					'jml_cb_bank'				=> $this->M_dashboard->get_data('cabang_bank')->num_rows(),
					'jml_permohonan_jaminan'	=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 1))->num_rows(),
					'jml_pengantar_asuransi'	=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 2))->num_rows(),
					'jml_persetujuan_asuransi'	=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 3))->num_rows(),
					'jml_pengantar_bank'		=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 4))->num_rows(),
					'jml_bank_garansi'			=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 5))->num_rows(),
					'jml_bukti_byr_premi'		=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 6))->num_rows(),
					'jml_penagihan_komisi'		=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 7))->num_rows(),
					'jml_selesai'				=> $this->M_dashboard->cari_data('permohonan_bank_garansi', array('id_status_permohonan' => 8))->num_rows(),
					'alur_bg'					=> $this->M_dashboard->total_alur_bg($tgl_awal, $tgl_sekarang),
					'lima_bulan'				=> $bln,
					'nilai_kontrak'				=> $nilai_kontrak,
					'nilai_jaminan'				=> $nilai_jaminan,
					'nilai_komisi'				=> $nilai_komisi
					];

			$data['Menu'] 					= "Dashboard";
			$data['Page'] 					= "Dashboard";
			$data['data_total_asuransi'] 	= $this->M_dashboard->get_total_asuransi();
			$data['userdata'] 				= $this->userdata;
			
			$this->template->views('index',$data);
		 
		} else {	
			session_destroy();
			redirect('Auth');
		}
	}

	// menampikan filter dashboard
	public function menampilkan_filter_dashboard()
	{
		$tgl_awal 	= date("Y-m-d", strtotime($this->input->post('tgl_awal')));
		$tgl_akhir 	= date("Y-m-d", strtotime($this->input->post('tgl_akhir')));

		// mencari 5 bulan terkahir
		$bln = array();

		$skrg = date("Y-m");

		$nilai_kontrak 	= array();
		$nilai_jaminan 	= array();
		$nilai_komisi 	= array();

		for ($i=5; $i >= 1; $i--) { 
			$a = date('F-Y', strtotime("$skrg -$i months"));

			$data = (object) ['bulan' => $a ];

			$a_bln = date("Y-m", strtotime($a));

			// mencari jumlah nilai kontrak
			$nilai_k = $this->M_dashboard->total_nilai_kontrak($a_bln, $tgl_awal, $tgl_akhir)->row();

			$data_k = (object) ['jml_nilai_kontrak' => $nilai_k->jml_nilai_kontrak];

			array_push($nilai_kontrak, $data_k);

			// mencari jumlah nilai jaminan
			$nilai_j = $this->M_dashboard->total_nilai_jaminan($a_bln, $tgl_awal, $tgl_akhir)->row();

			$data_j  = (object) ['jml_nilai_jaminan' => $nilai_j->jml_nilai_jaminan];

			array_push($nilai_jaminan, $data_j);

			// mencari jumlah nilai komisi
			$nilai_ko = $this->M_dashboard->total_nilai_komisi($a_bln, $tgl_awal, $tgl_akhir)->row();

			$data_ko  = (object) ['jml_nilai_komisi' => $nilai_ko->jml_nilai_komisi];

			array_push($nilai_komisi, $data_ko);

			array_push($bln, $data);
		}

		$data = [
				'jml_permohonan_jaminan'	=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 1, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_pengantar_asuransi'	=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 2, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_persetujuan_asuransi'	=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 3, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_pengantar_bank'		=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 4, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_bank_garansi'			=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 5, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_bukti_byr_premi'		=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 6, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_penagihan_komisi'		=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 7, $tgl_awal, $tgl_akhir)->num_rows(),
				'jml_selesai'				=> $this->M_dashboard->cari_data_jml_status('permohonan_bank_garansi', 8, $tgl_awal, $tgl_akhir)->num_rows(),
				'alur_bg'					=> $this->M_dashboard->total_alur_bg($tgl_awal, $tgl_akhir),
				'lima_bulan'				=> $bln,
				'nilai_kontrak'				=> $nilai_kontrak,
				'nilai_jaminan'				=> $nilai_jaminan,
				'nilai_komisi'				=> $nilai_komisi,
				'Menu'						=> 'Dashboard',
				'Page'						=> "<i class='fa fa-dashboard'></i> Dashboard"
				];

		$this->load->view('V_dashboard_filter', $data);
		
	}

	public function tes()
	{
		$bln = array();

		$skrg = date("Y-m");

        $bln_s = date("Y-m", strtotime("$skrg +1 months"));

        for ($i=1; $i <= 5; $i++) { 
            $a = date('F-Y', strtotime("$skrg -$i months"));
            $data = (object) ['bulan' => $a ];

			array_push($bln, $data);
		}
		
		print_r($bln);

	}

	
        
}
