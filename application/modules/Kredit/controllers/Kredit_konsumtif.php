<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kredit_konsumtif extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kredit_konsumtif');

	}
	/*=====================================
	=            Transaksi CAC            =
	=====================================*/
	public function index()
	{
		if (!empty($this->userdata)) {
		$data['Menu'] = "Kredit Konsumtif";
		$data['Page'] = "Transaksi CAC";
		$data['userdata'] = $this->userdata;
		$data['data_asuransi'] = $this->M_kredit_konsumtif->get_data('asuransi');
		$data['data_cabang'] = $this->M_kredit_konsumtif->get_data('cabang_asuransi');
		$data['data_bank'] = $this->M_kredit_konsumtif->get_data('bank');
		$this->template->views('Kredit/tr_cac',$data);
		}

		else{
		      redirect('Auth');
		    }
	}

	public function json()
	{
		$data = $this->M_kredit_konsumtif->get_tr_cac();
		echo json_encode($data);
  }

  public function get_data($table)
  {
  	$where = $this->input->post();
  	$data = $this->M_kredit_konsumtif->get_data($table,$where);
  	echo json_encode($data);
  }

    public function hapus()
    {
    	$id = $this->input->post('id_tr_cac');
    	$data = $this->M_kredit_konsumtif->hapus($id);
    	if ($data) {
    	echo "Sukses";
    	}else{
    		echo "gagal";
    	}
    }

    public function simpan()
    {
    	$arr = $this->input->post();
    	$arr['id_tr_cac'] = mt_rand(100000,999999);
    	$arr['plafond'] = str_replace('.', '', $arr['plafond']);
    	$arr['premi'] = str_replace('.', '', $arr['premi']);
    	$arr['add_time'] = date('Y-m-d H:i:s');

    	$data = $this->M_kredit_konsumtif->simpan($arr);
    	if ($data) {
    		echo "Sukses";
    	}
    }

		public function edit()
		{
			$where = $this->input->post();
			$data = $this->M_kredit_konsumtif->get_data('tr_cac',$where);
			echo json_encode($data);

		}

	public function update()
	{
		$arr = $this->input->post();
		$arr['plafond'] = str_replace('.', '', $arr['plafond']);
  	$arr['premi'] = str_replace('.', '', $arr['premi']);
		$data = $this->M_kredit_konsumtif->update($arr);
		echo json_encode($data);
	}


	/*=====  End of Transaksi CAC  ======*/

	/*=================================
	=            Pelaporan            =
	=================================*/
	public function pelaporan()
	{
		if (!empty($this->userdata)) {
		$data['Menu'] = "Kredit Konsumtif";
		$data['Page'] = "Pelaporan";
		$data['userdata'] = $this->userdata;
		$data['data_asuransi'] = $this->M_kredit_konsumtif->get_data('asuransi');
		$data['data_cabang'] = $this->M_kredit_konsumtif->get_data('cabang_asuransi');
		$data['data_bank'] = $this->M_kredit_konsumtif->get_data('bank');
		$this->template->views('Kredit/pelaporan',$data);
		}
		else{
              redirect('Auth');
            }
	}

	public function get_cabang_by_id()
	{
		$id = $this->input->POST('id_asr');
		$data = $this->M_kredit_konsumtif->get_cabang_by_id($id);
		echo json_encode($data);
	}

	public function excel()
		{
			$data = array(
							'id_asuransi' => $this->input->post('id_asuransi'),
							'id_cabang_asuransi' => $this->input->post('id_cabang_asuransi'),
							'id_bank' => $this->input->post('id_bank'),
							'start'  => $this->input->post('start'),
							'end'  => $this->input->post('end')
				);
				
			if ($data['id_asuransi'] == "") {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Pilih Asuransi Terlebih Dahulu
			</div>');
				redirect('Kredit/Kredit_konsumtif/pelaporan','refresh');
				exit();
			}

			$data['id_cab_count'] = count($data['id_cabang_asuransi']);

			for ($i=0; $i < $data['id_cab_count'] ; $i++) {
				$id_cab_name ="id_cabang".$i;
				$data["id_cabang".$i] = $data['id_cabang_asuransi'][$i];
			}
			$get_trcac = $this->M_kredit_konsumtif->get_trcac_ex($data);
			$get_trcac_h = $this->M_kredit_konsumtif->get_trcac_h_ex($data);

			$n_arr = count($get_trcac_h)+2;

			$ts= date("F", strtotime($data['start']));
			$te= date("F", strtotime($data['end']));
			$s = new DateTime ($this->input->post('start'));
			$e = new DateTime ($this->input->post('end'));
			$total_date = $s->diff($e)->m+1;
			$name = array();
			for ($i=0; $i < $total_date ; $i++) {
				$monthName = "name_".$i;
				$monthNum= date("n",strtotime($data['start']))+$i;
				$dateObj   = DateTime::createFromFormat('!m', $monthNum);
				$$monthName = $dateObj->format('F'); // March

				array_push($name, $$monthName);
				}

    // Load plugin PHPExcel nya
			    include_once'assets/plugins/PHPExcel/PHPExcel.php';
			    PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
			    // Panggil class PHPExcel nya
			    $excel = new PHPExcel();
			    //Settingan awal fil excel
			    $excel->getProperties()->setCreator('My Notes Code')
			                 ->setLastModifiedBy('My Notes Code')
			                 ->setTitle("Data Transaksi CAC")
			                 ->setSubject("Transaksi CAC")
			                 ->setDescription("Laporan Transaksi CAC")
			                 ->setKeywords("Data Transaksi CAC");
			    //Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			    $style_col = array(
			      'font' => array('bold' => true), // Set font nya jadi bold
			      'alignment' => array(
			        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			      ),
			      'borders' => array(
			        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			      )
			    );
			    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			    $style_row = array(
			      'alignment' => array(
			        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			      ),
			      'borders' => array(
			        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			      )
			    );
			    $excel->setActiveSheetIndex(0)->setCellValue('B1', "DATA TRANSAKSI CAC"); // Set kolom A1 dengan tulisan "DATA SISWA"
			    $excel->getActiveSheet()->mergeCells('B1:M1'); // Set Merge Cell pada kolom A1 sampai E1
			    $excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); // Set bold kolom A1
			    $excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			    $excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			    // Buat header tabel nya pada baris ke 3
			    $excel->getActiveSheet()->mergeCells('B3:B5');
			    $excel->getActiveSheet()->mergeCells('C3:C5');
			    // $excel->getActiveSheet()->mergeCells('D3:D5');
			    $excel->getActiveSheet()->mergeCells('D3:D5');
			    $excel->getActiveSheet()->mergeCells('E3:M3');
			    for($i =4; $i < 12; $i+=3) {

	 		    $excel->getActiveSheet()->mergeCells(chr(65+$i).'4:'.chr(65+$i+2).'4');
	 			}
			    // $excel->setActiveSheetIndex(0)->setCellValue('B3', "No"); // Set kolom A3 dengan tulisan "NO"
			    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Cabang Asuransi"); // Set kolom B3 dengan tulisan "NIS"
			    // $excel->setActiveSheetIndex(0)->setCellValue('D3:D5', "Jenis Kredit"); // Set kolom C3 dengan tulisan "NAMA"
			    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis kredit");
			    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Sumber Bisnis(Bank)"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			    $excel->setActiveSheetIndex(0)->setCellValue('E3', "BULAN" ); // Set kolom E3 dengan tulisan "ALAMAT"
			    $j = 0 ;
			    for ($i=4; $i < 12; $i+=3) {
			    $excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i)."4", date("F", strtotime($data['start'].'+'.$j.'month')));
			    $j++;
				}
			   	for ($i=4; $i < 12; $i+=3) {
				$excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i)."5", "Plafond");
				}
				for ($i=5; $i < 12; $i+=3) {
				$excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i).'5', "NOA");
				}
				for ($i=6; $i < 15; $i+=3) {
			    $excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i).'5', "Premi");
				}

			    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
			    $excel->getActiveSheet()->getStyle('B3:B5')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('C3:C5')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('D3:F5')->applyFromArray($style_col);

			    for($i =4; $i < 12; $i+=3) {
			    $excel->getActiveSheet()->getStyle(chr(65+$i).'3:'.chr(65+$i+2).'3')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle(chr(65+$i).'4:'.chr(65+$i+2).'4')->applyFromArray($style_col);
				}
				for($i =4; $i < 12; $i+=3) {
			    $excel->getActiveSheet()->getStyle(chr(65+$i).'5')->applyFromArray($style_col);
				}
				for($i =5; $i < 12; $i+=3) {
			    $excel->getActiveSheet()->getStyle(chr(65+$i).'5')->applyFromArray($style_col);
				}
				for($i =6; $i < 15; $i+=3) {
			    $excel->getActiveSheet()->getStyle(chr(65+$i).'5')->applyFromArray($style_col);
				}


			    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			    $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
			     // Lakukan looping pada variabel siswa
			      // $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $no);

			     foreach ($get_trcac as $key) {
			     $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $key->nama_cabang );
			     $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, "Konsumtif");
			      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $key->nama_bank);

			      for($i =4; $i < 12; $i+=3) {
				      $excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i).$numrow,
				      	"=SUMIFS(Sheet2!D3:D".$n_arr.",Sheet2!A3:A".$n_arr.",'Laporan Data Transaksi CAC'!B".$numrow.",Sheet2!B3:B".$n_arr.",'Laporan Data Transaksi CAC'!D".$numrow.",Sheet2!C3:C".$n_arr.",'Laporan Data Transaksi CAC'!".chr(65+$i)."4)");

				  		}
				  	  $j=4;
				      for($i =5; $i < 12; $i+=3) {
				      $excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i).$numrow,
				      	"=SUMIFS(Sheet2!E3:E".$n_arr.",Sheet2!A3:A".$n_arr.",'Laporan Data Transaksi CAC'!B".$numrow.",Sheet2!B3:B".$n_arr.",'Laporan Data Transaksi CAC'!D".$numrow.",Sheet2!C3:C".$n_arr.",'Laporan Data Transaksi CAC'!".chr(65+$j)."4)");
				      	$j+=3;
				  		}
				  	 $x = 4;
				      for($i =6; $i < 15; $i+=3) {
				      $excel->setActiveSheetIndex(0)->setCellValue(chr(65+$i).$numrow,
				      	"=SUMIFS(Sheet2!F3:F".$n_arr.",Sheet2!A3:A".$n_arr.",'Laporan Data Transaksi CAC'!B".$numrow.",Sheet2!B3:B".$n_arr.",'Laporan Data Transaksi CAC'!D".$numrow.",Sheet2!C3:C".$n_arr.",'Laporan Data Transaksi CAC'!".chr(65+$x)."4)");
				      $x+=3;
				      }

			      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('E'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      $excel->getActiveSheet()->getStyle('G'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      $excel->getActiveSheet()->getStyle('H'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      $excel->getActiveSheet()->getStyle('J'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      $excel->getActiveSheet()->getStyle('K'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      $excel->getActiveSheet()->getStyle('M'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			      for($i =4; $i < 12; $i+=3) {
			      $excel->getActiveSheet()->getStyle(chr(65+$i).$numrow)->applyFromArray($style_row);
			  	  }
			      for($i =5; $i < 12; $i+=3) {
			      $excel->getActiveSheet()->getStyle(chr(65+$i).$numrow)->applyFromArray($style_row);
			  		}
			      for($i =6; $i < 15; $i+=3) {
			      $excel->getActiveSheet()->getStyle(chr(65+$i).$numrow)->applyFromArray($style_row);
			  		}
			  		 $no++;
			      $numrow++;
			      }


			    // Set width kolom
			    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom A
			    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom B
			    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom C
			    for($i =4; $i < 12; $i+=3) {
			    $excel->getActiveSheet()->getColumnDimension(chr(65+$i))->setWidth(20); // Set width kolom D
				}
			    for($i =4; $i < 12; $i+=3) {
			    $excel->getActiveSheet()->getColumnDimension(chr(65+$i))->setWidth(20); // Set width kolom E
				}
			    for($i =4; $i < 15; $i+=3) {
			     $excel->getActiveSheet()->getColumnDimension(chr(65+$i))->setWidth(20); // Set width kolom E
			 	}

			    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			    // Set orientasi kertas jadi LANDSCAPE
			    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			    // Set judul file excel nya
			    $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi CAC");



			    $objWorkSheet = $excel->createSheet(2);
			    // HEADER

			    $objWorkSheet->setCellValue('A2', "ASURANSI");
			    $objWorkSheet->setCellValue('B2', "BANK");
			    $objWorkSheet->setCellValue('C2', "BULAN");
			    $objWorkSheet->setCellValue('D2', "PLAFOND");
			    $objWorkSheet->setCellValue('E2', "NOA");
			    $objWorkSheet->setCellValue('F2', "PREMI");

			    // ISI
			    $row = 3;
			    foreach ($get_trcac_h as $key) {
			    $objWorkSheet->setCellValue('A'.$row,$key->nama_cabang);
			    $objWorkSheet->setCellValue('B'.$row, $key->nama_bank);
			    $objWorkSheet->setCellValue('C'.$row, date("F", strtotime($key->waktu)));
			    $objWorkSheet->setCellValue('D'.$row, $key->plafond);
			    $objWorkSheet->setCellValue('E'.$row, $key->noa);
			    $objWorkSheet->setCellValue('F'.$row, $key->premi);

			    // $objWorkSheet->getStyle('D'.$row)->setQuotePrefix(true);
			    $objWorkSheet->getStyle('D'.$row)->getNumberFormat()->setFormatCode('#,##0.00');
			    $objWorkSheet->getStyle('F'.$row)->getNumberFormat()->setFormatCode('#,##0.00');
			    $objWorkSheet->getColumnDimension('D')->setWidth(30);
			    $objWorkSheet->getColumnDimension('F')->setWidth(30);
			    $row++;
			    }
			     $objWorkSheet->setTitle("Sheet2");

			    // Proses file excel
			     $filename = "Laporan_trcac_".$ts." - ".$te.".xlsx";
			    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			    header('Content-Disposition: attachment; filename= '.$filename); // Set nama file excel nya
			    header('Cache-Control: max-age=0');
			    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			    ob_end_clean();
			    $write->save('php://output');

  	}


	/*=====  End of Pelaporan  ======*/


	public function get_month($monthNum)
	{
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		return $monthName = $dateObj->format('F'); // March
	}


}
