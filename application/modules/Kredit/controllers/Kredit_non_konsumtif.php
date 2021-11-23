<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'/third_party/spout/src/Spout/Autoloader/autoload.php';

class Kredit_non_konsumtif extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kredit_non_konsumtif');
    }

    /*=====================================
    =            Bank Garansi           =
    =====================================*/

        public function index()
        {
            if (!empty($this->userdata)) {
                $data['Menu']           = "Kredit Non Konsumtif";
                $data['Page']           = "Bank Garansi";
                $data['userdata']       = $this->userdata;
                $data['data_asuransi']  = $this->M_kredit_non_konsumtif->get_data_2('asuransi')->result_array();
                $data['data_bank']      = $this->M_kredit_non_konsumtif->get_data_2('bank')->result_array();
                $data['data_cabang']    = $this->M_kredit_non_konsumtif->get_data('cabang_asuransi');
                $data['data_jenis_bg']  = $this->M_kredit_non_konsumtif->get_jenis_bg();
                $data['principal']      = $this->M_kredit_non_konsumtif->get_data_2('principal')->result_array();
                $data['jenis_bg']       = $this->M_kredit_non_konsumtif->get_data_order('jenis_bg', 'jenis_bg', 'asc')->result_array();
                
                $this->template->views('Kredit/bank_garansi/V_bank_garansi', $data);
            } else {
                redirect('Auth');
            }
        }

    // Afif

        // 17-03-2020

            // menampilkan data bank garansi
            public function tampil_bank_garansi()
            {
                $list = $this->M_kredit_non_konsumtif->get_data_per_bank_garansi();

                $data = array();

                $no   = $this->input->post('start');

                foreach ($list as $o) {
                    $no++;
                    $tbody = array();

                    if ($o['id_status_permohonan'] == 1) {
                        $bg = 'badge bg-info';
                    } elseif ($o['id_status_permohonan'] == 2) {
                        $bg = 'badge bg-light';
                    } elseif ($o['id_status_permohonan'] == 3) {
                        $bg = 'badge bg-primary';
                    } elseif ($o['id_status_permohonan'] == 4) {
                        $bg = 'badge bg-info';
                    } elseif ($o['id_status_permohonan'] == 5) {
                        $bg = 'badge bg-dark';
                    } elseif ($o['id_status_permohonan'] == 6) {
                        $bg = 'badge bg-primary';
                    } elseif ($o['id_status_permohonan'] == 7) {
                        $bg = 'badge bg-info';
                    } elseif ($o['id_status_permohonan'] == 8) {
                        $bg = 'badge bg-success';
                    } else {
                        $bg = '';
                    }

                    if ($o['id_status_permohonan'] > 5) {
                        $disabled = '';
                    } else {
                        $disabled = 'disabled';
                    }

                    $tbody[]    = "<div align='center'>".$no.".</div>";
                    $tbody[]    = $o['nama_principal'];
                    $tbody[]    = $o['nama_oblige'];
                    $tbody[]    = $o['nomor_surat_permohonan'];
                    $tbody[]    = $o['nama_asuransi'];
                    $tbody[]    = $o['nama_bank'];
                    $tbody[]    = "<div align='center'><span class='".$bg."'>".$o['status_permohonan']."</span></div>";
                    $tbody[]    = "<div align='center'><a href='".base_url("kredit/kredit_non_konsumtif/tampil_detail_permohonan/").$o['id_permohonan']."'><button type='button' class='btn btn-sm btn-outline-success mt-1 btn-sm mr-3 detail-permohonan' data-id='".$o['id_permohonan']."' data-toggle='tooltip' data-placement='top' title='Detail'><i class='fa fa-info m-1'></i></button></a><a href='".base_url("kredit/kredit_non_konsumtif/tampil_dokumen_persyaratan/").$o['id_permohonan']."'><button type='button' class='btn btn-sm btn-outline-info btn-sm mt-1 mr-3 dok-syarat' data-id='".$o['id_permohonan']."' data-toggle='tooltip' data-placement='top' title='Dokumen Persyaratan'><i class='fa fa-file m-1'></i></button></a><button type='button' class='btn btn-sm btn-outline-warning btn-sm mt-1 mr-3 edit-permohonan' data-id='".$o['id_permohonan']."' data-toggle='tooltip' data-placement='top' title='Edit Permohonan'><i class='fa fa-pencil m-1'></i></button><button type='button' class='btn btn-sm btn-outline-danger btn-sm mt-1 mr-3 hapus-permohonan' data-id='".$o['id_permohonan']."' data-toggle='tooltip' data-placement='top' title='Hapus Permohonan'><i class='fa fa-trash m-1'></i></button></div>";
                    $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-success btn-sm mr-3 penagihan-komisi' data-id='".$o['id_permohonan']."' $disabled >Lihat</button></div>";
                    $data[]     = $tbody;
                }

                $output = [ "draw"             => $_POST['draw'],
                            "recordsTotal"     => $this->M_kredit_non_konsumtif->jumlah_semua_per_bank_garansi(),
                            "recordsFiltered"  => $this->M_kredit_non_konsumtif->jumlah_filter_per_bank_garansi(),   
                            "data"             => $data
                        ];

                echo json_encode($output);
            }

            // menampilkan detail principal
            public function tampil_detail_principal()
            {
                $id_pr = $this->input->post('id_principal');
                
                if ($id_pr == '') {
                    $id_principal = $this->input->post('id_principal_2');
                } else {
                    $id_principal   = $this->input->post('id_principal');
                }

                $data = $this->M_kredit_non_konsumtif->cari_data('principal', array('id_principal' => $id_principal))->row_array();

                echo json_encode($data);
            }

            // aksi simpan principal
            public function simpan_principal($aksi)
            {
                $aksi_simpan    = $this->input->post('aksi_simpan');
                $id_permohonan  = $this->input->post('id_permohonan');
                
                // jika simpan principal
                if ($aksi == 'simpan') {
                    $id_principal = $this->input->post('id_principal');

                    if ($aksi_simpan == 'buat') {

                        // kondisi bila id permohonan ada atau tidak
                        if ($id_permohonan == '') {
                            $this->M_kredit_non_konsumtif->input_data('permohonan_bank_garansi', array('id_principal' => $id_principal, 'id_status_permohonan' => 1));

                            $id_permohonan = $this->db->insert_id();
                        } else {
                            $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_principal' => $id_principal, 'id_status_permohonan' => 1), array('id_permohonan' => $id_permohonan));
                        }
                        
                        $cari_data = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                        if ($cari_data == 0) {
                            // input dokumen persyaratan

                                for ($i=1; $i <= 14 ; $i++) { 

                                    $data_dok = ['id_permohonan_bg'             => $id_permohonan,
                                                 'id_jenis_dokumen_persyaratan' => $i,
                                                 'status_aktif'                 => 1,
                                                 'add_by'                       => $this->session->userdata('pengguna')
                                                ];

                                    // simpan juga ke dokumen persyaratan
                                    $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                                }

                            // akhir input dokumen persyaratan
                        }
                        
                    } else {
                        $id_permohonan = $this->input->post('id_permohonan');
                        
                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_principal' => $id_principal), array('id_permohonan' => $id_permohonan));

                        $cari_data = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                        if ($cari_data == 0) {
                            // input dokumen persyaratan

                                for ($i=1; $i <= 14 ; $i++) { 

                                    $data_dok = ['id_permohonan_bg'             => $id_permohonan,
                                                 'id_jenis_dokumen_persyaratan' => $i,
                                                 'status_aktif'                 => 1,
                                                 'add_by'                       => $this->session->userdata('pengguna')
                                                ];

                                    // simpan juga ke dokumen persyaratan
                                    $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                                }

                            // akhir input dokumen persyaratan
                        } 
                    }
                    
                } else {

                    $id_permohonan = $this->input->post('id_permohonan');

                    $data = ['nama_principal'       => $this->input->post('nama_principal'),
                             'alamat_principal'     => $this->input->post('alamat_principal'),
                             'pic1'                 => $this->input->post('pic1'),
                             'jabatan_pic1'         => $this->input->post('jabatan_pic1'),
                             'nik_pic1'             => $this->input->post('nik_pic1'),
                             'pic2'                 => $this->input->post('pic2'),
                             'jabatan_pic2'         => $this->input->post('jabatan_pic2'),
                             'nik_pic2'             => $this->input->post('nik_pic2'),
                             'akta_principal'       => $this->input->post('akta_principal'),
                             'nomor_akta_principal' => $this->input->post('nomor_akta_principal'),
                             'tgl_akta_principal'   => $this->input->post('tgl_akta_principal')
                            ];

                    if ($aksi_simpan == 'buat') {

                        $this->M_kredit_non_konsumtif->input_data('principal', $data);

                        $id_principal = $this->db->insert_id();
                                            
                        if ($id_permohonan == '') {
                            $this->M_kredit_non_konsumtif->input_data('permohonan_bank_garansi', array('id_principal' => $id_principal, 'id_status_permohonan' => 1));

                            $id_permohonan = $this->db->insert_id();
                        } else {
                            $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_principal' => $id_principal, 'id_status_permohonan' => 1), array('id_permohonan' => $id_permohonan));
                        }

                        $cari_data = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                        if ($cari_data == 0) {
                            // input dokumen persyaratan

                                for ($i=1; $i <= 14 ; $i++) { 

                                    $data_dok = ['id_permohonan_bg'             => $id_permohonan,
                                                 'id_jenis_dokumen_persyaratan' => $i,
                                                 'status_aktif'                 => 1,
                                                 'add_by'                       => $this->session->userdata('pengguna')
                                                ];

                                    // simpan juga ke dokumen persyaratan
                                    $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                                }

                            // akhir input dokumen persyaratan
                        }
                        
                    } else {
                        $this->M_kredit_non_konsumtif->input_data('principal', $data);

                        $id_principal = $this->db->insert_id();

                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_principal' => $id_principal), array('id_permohonan' => $id_permohonan));

                        $cari_data = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                        if ($cari_data == 0) {
                            // input dokumen persyaratan

                                for ($i=1; $i <= 14 ; $i++) { 

                                    $data_dok = ['id_permohonan_bg'             => $id_permohonan,
                                                 'id_jenis_dokumen_persyaratan' => $i,
                                                 'status_aktif'                 => 1,
                                                 'add_by'                       => $this->session->userdata('pengguna')
                                                ];

                                    // simpan juga ke dokumen persyaratan
                                    $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                                }

                            // akhir input dokumen persyaratan
                        }
                    }

                    
                }

                echo json_encode(['id_permohonan' => $id_permohonan, 'id_principal' => $id_principal]);
            }

            // aksi simpan permohonan
            public function simpan_permohonan()
            {
                $aksi_simpan    = $this->input->post('aksi_simpan');
                $id_permohonan  = $this->input->post('id_permohonan');

                $data = ['nomor_registrasi'         => $this->input->post('nomor_registrasi'),
                         'nomor_surat_permohonan'   => $this->input->post('nomor_surat_permohonan'),
                         'tgl_surat_permohonan'     => date('Y-m-d', strtotime($this->input->post('tgl_surat_permohonan'))),
                         'no_surat_undangan'        => $this->input->post('no_surat_undangan'),
                         'tgl_surat_undangan'       => date('Y-m-d', strtotime($this->input->post('tgl_surat_undangan'))),
                         'id_cabang_asuransi'       => $this->input->post('id_cabang_asuransi'),
                         'id_cabang_bank'           => $this->input->post('id_cabang_bank'),
                         'nama_oblige'              => $this->input->post('nama_oblige'),
                         'alamat_oblige'            => $this->input->post('alamat_oblige'),
                         'nama_pekerjaan'           => $this->input->post('nama_pekerjaan'),
                         'nilai_kontrak'            => $this->input->post('nilai_kontrak'),
                         'nilai_jaminan'            => $this->input->post('nilai_jaminan'),
                         'tgl_registrasi'           => $this->input->post('tgl_registrasi'),
                         'id_jenis_bg'              => $this->input->post('jenis_jaminan'),
                         'id_status_permohonan'     => 1,
                         'jangka_waktu_awal'        => $this->input->post('jangka_waktu_awal'),
                         'jangka_waktu_akhir'       => $this->input->post('jangka_waktu_akhir'),
                         'tgl_terbit_jaminan'       => $this->input->post('tgl_terbit_jaminan')
                        ];
                
                // kondisi tambah data
                if ($aksi_simpan == 'buat') {

                    if ($id_permohonan == '') {
                        $this->M_kredit_non_konsumtif->input_data('permohonan_bank_garansi', $data);

                        $id_permohonan = $this->db->insert_id();
                    } else {
                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', $data, array('id_permohonan' => $id_permohonan));
                    }

                    // input dokumen persyaratan
                    
                        // cek id permohonan di dokumen persyaratan

                        $cari = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                        if ($cari == 0) {

                            for ($i=1; $i <= 14 ; $i++) { 

                                $data_dok = ['id_permohonan_bg'             => $id_permohonan,
                                            'id_jenis_dokumen_persyaratan' => $i,
                                            'status_aktif'                 => 1,
                                            'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan juga ke dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                            }

                            $jns_bg = $data['id_jenis_bg'];

                            if ($jns_bg != 'a') {

                                if ($jns_bg == 1) {
                                    $id_jns_dok = 15;
                                } elseif ($jns_bg == 2) {
                                    $id_jns_dok = 16;
                                } elseif ($jns_bg == 3) {
                                    $id_jns_dok = 17;
                                } elseif ($jns_bg == 4) {
                                    $id_jns_dok = 18;
                                }

                                $data_dok2 = ['id_permohonan_bg'             => $id_permohonan,
                                            'id_jenis_dokumen_persyaratan' => $id_jns_dok,
                                            'status_aktif'                 => 1,
                                            'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan data jenis persyaratan khusus dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok2);
                            }

                        } else {

                            // cek kondisi bila data telah ada namun apakah jenis dokumen persayaratan telah ada belum
                            $cari_2 = $this->M_kredit_non_konsumtif->cari_data_dokumen_syarat($id_permohonan)->row_array();

                            if ($cari_2['id_jenis_dokumen_persyaratan'] == 14) {

                                $jns_bg = $data['id_jenis_bg'];

                                if ($jns_bg != 'a') {

                                    if ($jns_bg == 1) {
                                        $id_jns_dok = 15;
                                    } elseif ($jns_bg == 2) {
                                        $id_jns_dok = 16;
                                    } elseif ($jns_bg == 3) {
                                        $id_jns_dok = 17;
                                    } elseif ($jns_bg == 4) {
                                        $id_jns_dok = 18;
                                    }

                                    $data_dok2 = ['id_permohonan_bg'             => $id_permohonan,
                                                'id_jenis_dokumen_persyaratan' => $id_jns_dok,
                                                'status_aktif'                 => 1,
                                                'add_by'                       => $this->session->userdata('pengguna')
                                                ];

                                    // simpan data jenis persyaratan khusus dokumen persyaratan
                                    $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok2);
                                }
                            }

                        }

                    // akhir input dokumen persyaratan

                // kondisi ubah data
                } else {

                    unset($data['id_status_permohonan']);

                    $id_permohonan = $this->input->post('id_permohonan');

                    $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', $data, array('id_permohonan' => $id_permohonan));

                    $cari   = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                    if ($cari == 0) {
                        // input dokumen persyaratan

                            for ($i=1; $i <= 14 ; $i++) { 

                                $data_dok = ['id_permohonan_bg'            => $id_permohonan,
                                             'id_jenis_dokumen_persyaratan' => $i,
                                             'status_aktif'                 => 1,
                                             'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan juga ke dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                            }

                            $jns_bg = $data['id_jenis_bg'];

                            if ($jns_bg != 'a') {

                                if ($jns_bg == 1) {
                                    $id_jns_dok = 15;
                                } elseif ($jns_bg == 2) {
                                    $id_jns_dok = 16;
                                } elseif ($jns_bg == 3) {
                                    $id_jns_dok = 17;
                                } elseif ($jns_bg == 4) {
                                    $id_jns_dok = 18;
                                }

                                $data_dok2 = [  'id_permohonan_bg'             => $id_permohonan,
                                                'id_jenis_dokumen_persyaratan' => $id_jns_dok,
                                                'status_aktif'                 => 1,
                                                'add_by'                       => $this->session->userdata('pengguna')
                                             ];

                                // simpan data jenis persyaratan khusus dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok2);
                            }

                        // akhir input dokumen persyaratan
                    } else {

                        // cek kondisi bila data telah ada namun apakah jenis dokumen persayaratan telah ada belum
                        $cari_2 = $this->M_kredit_non_konsumtif->cari_data_dokumen_syarat($id_permohonan)->row_array();

                        if ($cari_2['id_jenis_dokumen_persyaratan'] == 14) {

                            $jns_bg = $data['id_jenis_bg'];

                            if ($jns_bg != 'a') {

                                if ($jns_bg == 1) {
                                    $id_jns_dok = 15;
                                } elseif ($jns_bg == 2) {
                                    $id_jns_dok = 16;
                                } elseif ($jns_bg == 3) {
                                    $id_jns_dok = 17;
                                } elseif ($jns_bg == 4) {
                                    $id_jns_dok = 18;
                                }

                                $data_dok2 = ['id_permohonan_bg'             => $id_permohonan,
                                            'id_jenis_dokumen_persyaratan' => $id_jns_dok,
                                            'status_aktif'                 => 1,
                                            'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan data jenis persyaratan khusus dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok2);
                            }
                        }

                    }

                }

                echo json_encode(['status' => TRUE, 'id_permohonan' => $id_permohonan]);
    
            }

            // aksi simpan legalitas
            public function simpan_legalitas()
            {
                $aksi_simpan    = $this->input->post('aksi_simpan');
                $id_permohonan  = $this->input->post('id_permohonan');

                if ($aksi_simpan == 'buat') {

                    if ($id_permohonan == '') {
                        $this->M_kredit_non_konsumtif->input_data('permohonan_bank_garansi', array('id_status_permohonan' => 1));
                        
                        $id_permohonan = $this->db->insert_id();
                    } else {
                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 1), array('id_permohonan' => $id_permohonan));
                    }
                    
                    $cari   = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                    if ($cari == 0) {
                        // input dokumen persyaratan

                            for ($i=1; $i <= 14 ; $i++) { 

                                $data_dok = ['id_permohonan_bg'            => $id_permohonan,
                                             'id_jenis_dokumen_persyaratan' => $i,
                                             'status_aktif'                 => 1,
                                             'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan juga ke dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                            }

                        // akhir input dokumen persyaratan
                    }

                    $data = ['nama_notaris'         => $this->input->post('nama_notaris'),
                             'id_permohonan_bg'     => $id_permohonan,
                             'alamat_notaris'       => $this->input->post('alamat_notaris'),
                             'no_ktp'               => $this->input->post('no_ktp'),
                             'pengadilan'           => $this->input->post('pengadilan'),
                             'alamat_pengadilan'    => $this->input->post('alamat_pengadilan'),
                             'pasal'                => $this->input->post('pasal'),
                             'add_by'               => $this->session->userdata('pengguna'),
                             'status'               => 1
                            ];

                    $this->M_kredit_non_konsumtif->input_data('legalitas_permohonan', $data);
                    
                } else {
                    $id_permohonan = $this->input->post('id_permohonan');

                    // $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', $data, array('id_permohonan' => $id_permohonan));

                    $cari   = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                    if ($cari == 0) {
                        // input dokumen persyaratan

                            for ($i=1; $i <= 14 ; $i++) { 

                                $data_dok = ['id_permohonan_bg'            => $id_permohonan,
                                             'id_jenis_dokumen_persyaratan' => $i,
                                             'status_aktif'                 => 1,
                                             'add_by'                       => $this->session->userdata('pengguna')
                                            ];

                                // simpan juga ke dokumen persyaratan
                                $this->M_kredit_non_konsumtif->input_data('dokumen_persyaratan', $data_dok);
                            }

                        // akhir input dokumen persyaratan
                    }

                    $data = ['nama_notaris'         => $this->input->post('nama_notaris'),
                             'id_permohonan_bg'     => $id_permohonan,
                             'alamat_notaris'       => $this->input->post('alamat_notaris'),
                             'no_ktp'               => $this->input->post('no_ktp'),
                             'pengadilan'           => $this->input->post('pengadilan'),
                             'alamat_pengadilan'    => $this->input->post('alamat_pengadilan'),
                             'pasal'                => $this->input->post('pasal'),
                             'add_by'               => $this->session->userdata('pengguna'),
                             'status'               => 1
                            ];

                    $cari_2 = $this->M_kredit_non_konsumtif->cari_data('legalitas_permohonan', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                    if ($cari_2 == 0) {
                        $this->M_kredit_non_konsumtif->input_data('legalitas_permohonan', $data);
                    } else {
                        $this->M_kredit_non_konsumtif->ubah_data('legalitas_permohonan', $data, array('id_permohonan_bg' => $id_permohonan));
                    }

                    
                }

                echo json_encode(['status' => TRUE, 'id_permohonan' => $id_permohonan]);
    
            }

            // ambil cabang asuransi
            public function ambil_cabang_asuransi()
            {
                $id_asuransi = $this->input->post('id_asuransi');

                $option = "";

                if ($id_asuransi == "a") {

                    $option = "";

                } else {

                    $list_as = $this->M_kredit_non_konsumtif->cari_data('cabang_asuransi', array('id_asuransi' => $id_asuransi))->result_array();

                    $option = "<option value='a'>Pilih Cabang Asuransi</option>";

                    foreach ($list_as as $a) {
                    $option .= "<option value='".$a['id_cabang_asuransi']."'>".$a['nama_cabang']."</option>";
                    }

                }

                $data = ['cabang_asuransi'  => $option];

                echo json_encode($data);
            }

            // ambil cabang bank
            public function ambil_cabang_bank()
            {
                $id_bank = $this->input->post('id_bank');

                $option = "";

                if ($id_bank == "a") {

                    $option = "";

                } else {

                    $list_as = $this->M_kredit_non_konsumtif->cari_data('cabang_bank', array('id_bank' => $id_bank))->result_array();

                    $option = "<option value='a'>Pilih Cabang Bank</option>";

                    foreach ($list_as as $a) {
                    $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
                    }

                }

                $data = ['cabang_bank'  => $option];

                echo json_encode($data);
            }

            // ambil nomor register
            public function ambil_nomor_register()
            {
                $id_permohonan  = $this->input->post('id_permohonan');
                $no_regis       = $this->input->post('no_regis');

                // cari nomor regis
                $cari = $this->M_kredit_non_konsumtif->cari_data('permohonan_bank_garansi', array('nomor_registrasi' => $no_regis))->num_rows();
                
                if ($id_permohonan == '') {
                    $dt = '';
                } else {
                    $data   = $this->M_kredit_non_konsumtif->tampil_data_permohonan_bg($id_permohonan)->row_array();
                    $dt     = $data['nomor_registrasi'];
                }

                // cari kode level 
                $hasil = $this->M_kredit_non_konsumtif->cari_data_nomor_regis()->row_array(); 

                if ($hasil['nomor_registrasi'] != '') {

                    // ambil angka urut terakhir 
                    $angka_urut = substr($hasil['nomor_registrasi'], 4);

                    $au = $angka_urut + 1;

                    $au = str_pad($au, 5, 0, STR_PAD_LEFT);

                    $no_regis = "PRBG".$au;

                } else {

                    $no_regis ="PRBG00001";

                }

                $tgl_regis = date("d-M-Y", now('Asia/Jakarta'));

                echo json_encode(['no_regis' => $no_regis, 'tgl_regis' => $tgl_regis, 'cek_no_regis' => $dt, 'ada_no_regis' => $cari]);
            }
            
        // Akhir 17-03-2020

        // 22-03-2020

            // menampilkan data ubah data permohonan bank garansi
            public function tampil_data_edit_permohonan()
            {
                $id_permohonan = $this->input->post('id_permohonan');
                
                $data = $this->M_kredit_non_konsumtif->tampil_data_permohonan_bg($id_permohonan)->row_array();

                // cari kode level 
                $hasil = $this->M_kredit_non_konsumtif->cari_data_nomor_regis()->row_array(); 

                if ($hasil['nomor_registrasi'] != '') {

                    // ambil angka urut terakhir 
                    $angka_urut = substr($hasil['nomor_registrasi'], 4);

                    $au = $angka_urut + 1;

                    $au = str_pad($au, 5, 0, STR_PAD_LEFT);

                    $no_regis = "PRBG".$au;

                } else {

                    $no_regis ="PRBG00001";

                }

                $tgl_regis = date("d-M-Y", now('Asia/Jakarta'));

                array_push($data, ['no_regis' => $no_regis, 'tgl_regis' => $tgl_regis, 'cek_no_regis' => $data['nomor_registrasi']]);

                echo json_encode($data);
            }

        // Akhir 22-03-2020

        // 23-03-2020

            // aksi hapus permohonan bank garansi
            public function hapus_permohonan_bg()
            {
                $id_permohonan = $this->input->post('id_permohonan');
                
                $this->M_kredit_non_konsumtif->hapus_data('permohonan_bank_garansi', array('id_permohonan' => $id_permohonan));
                $this->M_kredit_non_konsumtif->hapus_data('legalitas_permohonan', array('id_permohonan_bg' => $id_permohonan)); 
                $this->M_kredit_non_konsumtif->hapus_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan)); 

                echo json_encode(['status' => TRUE]);
            }

            // menampilkan dokumen persyaratan
            public function tampil_dokumen_persyaratan($id_permohonan)
            {
                $data['breadcrumb'] = array('<li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>','<li class="breadcrumb-item"><a href="'. base_url().'Kredit/Kredit_non_konsumtif" class="text-success">Bank Garansi</a></li>','<li class="breadcrumb-item active">Dokumen Persyaratan</li>');

                $data['Menu']           = "Kredit Non Konsumtif";
                $data['Page']           = "Dokumen Persyaratan";
                $data['userdata']       = $this->userdata;
                $data['id_permohonan']  = $id_permohonan;

                // cari data apakah telah ada dokumen persyaratan khusus
                $data['id_dok_khusus']  = $this->M_kredit_non_konsumtif->cari_data_dokumen_khusus($id_permohonan)->row_array();
                $data['jml_lengkap']    = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan, 'kelengkapan' => '1'))->num_rows();
                $data['jml_valid']    = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan, 'valid' => '1'))->num_rows();

                $this->template->views('Kredit/bank_garansi/V_dokumen_persyaratan', $data);
            }

            // menampilkan data dokumen persyaratan
            public function tampil_dok_syarat($id_permohonan)
            {
                $list = $this->M_kredit_non_konsumtif->get_data_dokumen_syarat($id_permohonan)->result_array();

                $no = 1;
                foreach ($list as $h) {
                    $tbody = array();

                    $id_jenis_dok = $h['id_jenis_dokumen_persyaratan'];
                    $tgl_bd       = $h['tgl_berakhir_dok'];
                    $dok_syarat   = $h['dokumen_persyaratan'];

                    $dt_my      = 'hidden';

                    if ($id_jenis_dok == 1 || $id_jenis_dok == 4 || $id_jenis_dok == 11 || $id_jenis_dok == 12 || $id_jenis_dok == 13 || $id_jenis_dok == 14) {

                        // kondisi untuk menghilangkan atau menampilkan logo file, checkbox kelangkapan
                        if ($dok_syarat == null) {
                            $ds = 'hidden';
                            $kl = 'hidden';
                        } else {
                            if ($dok_syarat == 'dokumen_menyusul') {
                                $ds         = 'hidden';
                                $kl         = '';
                                $dt_my      = '';
                            } else{
                                $ds = '';
                                $kl = '';
                            }
                            
                        }

                        $jd = "<div align='center'><i class='fa fa-minus-square'></i></div>";
                        $td = "<div align='center'><i class='fa fa-minus-square'></i></div>";
                    } else {
                        if ($id_jenis_dok == 8 || $id_jenis_dok == 9) {

                            if ($dok_syarat == 'dokumen_menyusul') {
                                $dt_my      = '';
                                $ds         = 'hidden';
                                $kl         = ''; 
                                $jd         = "<div align='center'><i class='fa fa-minus-square'></i></div>";
                            } else {
                                // kondisi untuk menghilangkan atau menampilkan logo file, checkbox kelangkapan
                                if (($dok_syarat != null) && ($h['nomor_dokumen'] != null)) {
                                    $ds = '';
                                    $kl = ''; 
                                    $jd = $h['nomor_dokumen'];
                                } else {
                                    if ($dok_syarat != null) {
                                        $ds = '';
                                    } else {
                                        $ds = 'hidden';
                                    }
                                    $jd = $h['nomor_dokumen'];
                                    $kl = 'hidden';
                                }
                            }

                            
                            $td = "<div align='center'><i class='fa fa-minus-square'></i></div>";
                        } else {
                            if ($dok_syarat == 'dokumen_menyusul') {
                                $dt_my      = '';
                                $ds         = 'hidden';
                                $kl         = ''; 
                            } else {
                                // kondisi untuk menghilangkan atau menampilkan logo file, checkbox kelangkapan
                                if (($dok_syarat != null) && ($h['nomor_dokumen'] != null) && ($h['tgl_berakhir_dok'] != null)) {
                                    $ds = '';
                                    $kl = ''; 
                                } else {
                                    if ($dok_syarat != null) {
                                        $ds = '';
                                    } else {
                                        $ds = 'hidden';
                                    }
                                    
                                    $kl = 'hidden';
                                }

                                // menampilkan nomor dokumen dan tanggal berkahir dokumen
                                $jd = $h['nomor_dokumen'];
                                if ($tgl_bd == null) {
                                    $td = '';
                                } else {
                                    $td = date("d-M-Y", strtotime($tgl_bd));
                                }
                            }
                        }
                    }
                    
                    $kelengkapan = $h['kelengkapan'];
                    $valid       = $h['valid'];

                    if ($kelengkapan == 1 || $kelengkapan == 2) {
                        $aksi_kl = "checked";
                    } else {
                        $aksi_kl = "";
                    }

                    if ($valid == 1 || $valid == 2) {
                        $aksi_vl = "checked";
                    } else {
                        if ($kelengkapan == 1) {
                            $aksi_vl = "";
                        } else {
                            $aksi_vl = "hidden";
                        }
                        
                    }

                    if ($dok_syarat != null) {

                        if ($dok_syarat == 'dokumen_menyusul') {
                            $dokumen_syarat = '';
                        } else {
                            $dok            = base64_decode($h['dokumen_persyaratan']);
                            $lm = ['(', ')'];
                            $br = ['kurung_buka','kurung_tutup'];

                            $dokumen_syarat = str_replace($lm,$br,$dok);
                        }
                        

                    } else {
                        $dokumen_syarat = '';
                    }

                    if ($no == 6 || $no == 9 || $no == 10 || $no == 13) {
                        $jns_dok = "<span style='color: red;'>".$h['jenis_dok_persyaratan']."</span>";
                    } else {
                        $jns_dok = $h['jenis_dok_persyaratan'];
                    }
                    
                    $tbody[]    = "<div align='center'>".$no.".</div>";
                    $tbody[]    = $jns_dok;
                    $tbody[]    = $jd;
                    $tbody[]    = "<div align='center'>".$td."</div>";
                    $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm btn-warning btn-sm edit-dokumen' data-id='".$h['id_dokumen_persyaratan']."' data-id_jenis_dok='".$id_jenis_dok."' data-toggle='tooltip' data-placement='top' title='Edit Dokumen'><i class='fa fa-pencil'></i></button></div>";
                    $tbody[]    = "<div align='center'><a href='".base_url("kredit/kredit_non_konsumtif/tampil_pdf/$dokumen_syarat/preview")."' target='_blank'><button type='button' class='btn btn-sm waves-effect waves-light btn-success btn-sm ubah' data-id='".$h['id_dokumen_persyaratan']."' data-toggle='tooltip' data-placement='top' title='Dokumen' $ds><i class='fa fa-file-text'></i></button></a><span class='badge badge-danger' $dt_my>Data Menyusul</div>";
                    $tbody[]    = "<div align='center'><input type='checkbox' class='kelengkapan' data-id='".$no."' name='kelengkapan[]' id='kelengkapan".$no."' id_jenis_dok_syarat='".$h['id_jenis_dokumen_persyaratan']."' id_dok_syarat='".$h['id_dokumen_persyaratan']."' $kl $aksi_kl></div>";
                    $tbody[]    = "<div align='center'><input type='checkbox' class='valid".$no."' name='valid[]' id_dok_syarat='".$h['id_dokumen_persyaratan']."' id_jenis_dok_syarat='".$h['id_jenis_dokumen_persyaratan']."' id='valid' $aksi_vl></div>"; 

                    $data[]  = $tbody;

                    $no++;
                }

                if ($list) {
                    echo json_encode(['data' => $data]);
                } else {
                    echo json_encode(['data' => 0]);

                }
            }

            // menampilkan ubah data dokumen persyaratan
            public function ambil_data_dokumen()
            {
                $id_dokumen_syarat = $this->input->post('id_dokumen_syarat');

                $data = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_dokumen_persyaratan' => $id_dokumen_syarat))->row_array();
                
                echo json_encode($data);
            }

        // Akhir 23-03-2020

        // 24-03-2020

            // proses simpan dokumen persyaratan
            public function simpan_dokumen_persyaratan()
            {
                $kelengkapan        = $this->input->post('kelengkapan');
                $valid              = $this->input->post('valid');
                $id_permohonan      = $this->input->post('id_permohonan');
                $jml_kelengkapan    = $this->input->post('jml_kelengkapan');
                $jml_valid          = $this->input->post('jml_valid');
                $kelengkapan_id_jns_dok    = $this->input->post('kelengkapan_id_jns_dok');
                $valid_id_jns_dok          = $this->input->post('valid_id_jns_dok');

                if (!empty($kelengkapan)) {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('kelengkapan' => null), array('id_permohonan_bg' => $id_permohonan));
                
                    // ubah data kelengkapan
                    for ($i=0; $i < count($kelengkapan); $i++) { 

                        if ($kelengkapan_id_jns_dok[$i] == 1 || $kelengkapan_id_jns_dok[$i] == 2 || $kelengkapan_id_jns_dok[$i] == 3 || $kelengkapan_id_jns_dok[$i] == 4 || $kelengkapan_id_jns_dok[$i] == 5 || $kelengkapan_id_jns_dok[$i] == 7 || $kelengkapan_id_jns_dok[$i] == 8 || $kelengkapan_id_jns_dok[$i] == 11 || $kelengkapan_id_jns_dok[$i] == 12 || $kelengkapan_id_jns_dok[$i] == 14 || $kelengkapan_id_jns_dok[$i] == 15|| $kelengkapan_id_jns_dok[$i] == 16 || $kelengkapan_id_jns_dok[$i] == 17 || $kelengkapan_id_jns_dok[$i] == 18) {
                            $kelengkapan_2 = 2;
                        } else {
                            $kelengkapan_2 = 1;
                        }

                        $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('kelengkapan' => $kelengkapan_2), array('id_dokumen_persyaratan' => $kelengkapan[$i]));
                    }
                } else {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('kelengkapan' => null), array('id_permohonan_bg' => $id_permohonan));
                }

                if (!empty($valid)) {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('valid' => null), array('id_permohonan_bg' => $id_permohonan));

                    // ubah data valid
                    for ($i=0; $i < count($valid); $i++) { 

                        if ($valid_id_jns_dok[$i] == 1 || $valid_id_jns_dok[$i] == 2 || $valid_id_jns_dok[$i] == 3 || $valid_id_jns_dok[$i] == 4 || $valid_id_jns_dok[$i] == 5 || $valid_id_jns_dok[$i] == 7 || $valid_id_jns_dok[$i] == 8 || $valid_id_jns_dok[$i] == 11 || $valid_id_jns_dok[$i] == 12 || $valid_id_jns_dok[$i] == 14 || $valid_id_jns_dok[$i] == 15|| $valid_id_jns_dok[$i] == 16 || $valid_id_jns_dok[$i] == 17 || $valid_id_jns_dok[$i] == 18) {
                            $valid_2 = 2;
                        } else {
                            $valid_2 = 1;
                        }

                        $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('valid' => $valid_2), array('id_dokumen_persyaratan' => $valid[$i]));
                    }
                } else {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', array('valid' => null), array('id_permohonan_bg' => $id_permohonan));
                }

                $cari1 = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan, 'kelengkapan' => 2))->num_rows();
                $cari2 = $this->M_kredit_non_konsumtif->cari_data('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan, 'valid' => 2))->num_rows();

                if ($cari1 == 11 && $cari2 == 11) {
                    
                    // update status permohonan
                    $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 2), array('id_permohonan' => $id_permohonan));

                    // input data pada pengantar asuransi 
                    $this->M_kredit_non_konsumtif->input_data('pengantar_asuransi', array('id_permohonan_bg' => $id_permohonan, 'tgl_terbit' => date('Y-m-d', now('Asia/Jakarta'))));

                }

                echo json_encode(['status' => TRUE]);
            }

            // proses simpan data jenis dokumen
            public function simpan_data_jenis_dokumen()
            {
                $no_dokumen         = $this->input->post('nomor_dokumen');
                $tgl_berakhir_dok   = ($this->input->post('tgl_berakhir_dok') == '') ? null : date('Y-m-d', strtotime($this->input->post('tgl_berakhir_dok')));
                $id_dokumen_syarat  = $this->input->post('id_dokumen_syarat');
                
                // upload file
                $config['max_size']         = 15048;
                $config['allowed_types']    = "pdf";
                $config['remove_spaces']    = TRUE;
                $config['overwrite']        = TRUE;
                $config['upload_path']      = FCPATH.'uploads/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                $dok_srt       = $_FILES['dokumen_persyaratan']['name'];

                if (empty($dok_srt)) {
                    // ubah data
                    $data = ['nomor_dokumen'        => $no_dokumen,
                             'tgl_berakhir_dok'     => $tgl_berakhir_dok
                            ];

                    $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', $data, array('id_dokumen_persyaratan' => $id_dokumen_syarat));

                    echo json_encode(['hasil' => 'berhasil']);

                } else {

                    if (!$this->upload->do_upload("dokumen_persyaratan")){

                        echo json_encode(['hasil' => 0]);
        
                    } else {

                        $this->upload->do_upload('dokumen_persyaratan');
                        $data           = array('upload_data' => $this->upload->data());
                        $filename       = $data['upload_data']['file_name'];

                        $dok_syarat  = trim(base64_encode($filename));

                        // ubah data
                        $data = ['nomor_dokumen'        => $no_dokumen,
                                 'tgl_berakhir_dok'     => $tgl_berakhir_dok,
                                 'dokumen_persyaratan'  => $dok_syarat
                                ];

                        $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', $data, array('id_dokumen_persyaratan' => $id_dokumen_syarat));

                        echo json_encode(['hasil' => 'berhasil']);

                    }

                }
            }

            // tampil pdf
            public function tampil_pdf()
            {
                $nama = $this->uri->segment(4);

                $br = ['(', ')'];
                $lm = ['kurung_buka','kurung_tutup'];

                $nama_br = str_replace($lm,$br,$nama);

                $data = ['nama_dok' => $nama_br];

                $this->load->view('bank_garansi/V_dokumen', $data);
            }

            // menampilkan halaman detail permohonan bank garansi
            public function tampil_detail_permohonan($id_permohonan)
            {
                $data['breadcrumb'] = array('<li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>','<li class="breadcrumb-item"><a href="'. base_url().'Kredit/Kredit_non_konsumtif" class="text-success">Bank Garansi</a></li>','<li class="breadcrumb-item active">Detail Permohonan Bank Garansi</li>');

                $bg = $this->M_kredit_non_konsumtif->cari_data('permohonan_bank_garansi', array('id_permohonan' => $id_permohonan))->row_array();

                $data['Menu']           = "Kredit Non Konsumtif";   
                $data['Page']           = "Bank Garansi";
                $data['userdata']       = $this->userdata;
                $data['id_permohonan']  = $id_permohonan;
                $data['bg']             = $this->M_kredit_non_konsumtif->tampil_data_permohonan_bg($id_permohonan)->row_array();
                $data['pr_asuransi']    = $this->M_kredit_non_konsumtif->cari_data('persetujuan_asuransi', array('id_permohonan_bg' => $id_permohonan));
                $data['b_garansi']      = $this->M_kredit_non_konsumtif->cari_data('bank_garansi', array('id_permohonan_bg' => $id_permohonan));
                $data['per_jaminan']    = $this->M_kredit_non_konsumtif->cari_data('permohonan_bank_garansi', array('id_permohonan' => $id_permohonan))->row_array();
                $data['status_mhn']     = $bg['id_status_permohonan'];

                // mengambil tanggal terbit dokumen
                $data['tgl_pnga']       = $this->M_kredit_non_konsumtif->cari_data('pengantar_asuransi', array('id_permohonan_bg' => $id_permohonan))->row_array();
                $data['tgl_pja']        = $this->M_kredit_non_konsumtif->cari_data('persetujuan_asuransi', array('id_permohonan_bg' => $id_permohonan))->row_array();
                $data['tgl_pgb']        = $this->M_kredit_non_konsumtif->cari_data('pengantar_bank', array('id_permohonan_bg' => $id_permohonan))->row_array();
                $data['tgl_bg']         = $this->M_kredit_non_konsumtif->cari_data('bank_garansi', array('id_permohonan_bg' => $id_permohonan))->row_array();
                $data['tgl_sp']         = $this->M_kredit_non_konsumtif->cari_data('bayar_komisi', array('id_permohonan' => $id_permohonan))->row_array();
                $data['tgl_sls']        = $this->M_kredit_non_konsumtif->cari_data('bayar_komisi', array('id_permohonan' => $id_permohonan))->row_array();
                $data['tgl_byr_premi']  = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'dokumen_kelengkapan' => 'Bukti Bayar Premi'))->row_array();

                $this->template->views('Kredit/bank_garansi/V_detail_permohonan', $data);
            }

            // aksi simpan data perseujuan asuransi
            public function simpan_data_persetujuan_asuransi()
            {
                $nomor_persetujuan  = $this->input->post('nomor_persetujuan');
                $tgl_persetujuan    = ($this->input->post('tgl_persetujuan') == '') ? null : date('Y-m-d', strtotime($this->input->post('tgl_persetujuan')));
                $id_permohonan      = $this->input->post('id_permohonan');
                $aksi_simpan        = $this->input->post('aksi_simpan');
                $id_persetujuan_as  = $this->input->post('id_persetujuan_asuransi');
                $id_dokumen         = $this->input->post('id_dokumen');
                $id_kelengkapan     = $this->input->post('id_kelengkapan');
                $premi              = $this->input->post('premi');
                
                // upload file
                $config['max_size']         = 15048;
                $config['allowed_types']    = "pdf";
                $config['remove_spaces']    = TRUE;
                $config['overwrite']        = TRUE;
                $config['upload_path']      = FCPATH.'uploads/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                $dok_srt       = $_FILES['dokumen']['name'];

                if (empty($dok_srt)) {
                    // input data
                    $data = ['nomor_persetujuan'    => $nomor_persetujuan,
                             'tgl_persetujuan'      => $tgl_persetujuan,
                             'id_permohonan_bg'     => $id_permohonan,
                             'nilai_premi'          => $premi,
                             'add_by'               => $this->session->userdata('pengguna')
                             ];

                    if ($aksi_simpan == 'buat') {

                        $this->M_kredit_non_konsumtif->input_data('persetujuan_asuransi', $data);

                        $id_pr_as = $this->db->insert_id();

                        // input ke tabel pengantar bank
                            $datanya2 = ['id_permohonan_bg' => $id_permohonan,
                                         'tgl_terbit'       => date('Y-m-d', now('Asia/Jakarta'))
                                        ];

                            $this->M_kredit_non_konsumtif->input_data('pengantar_bank', $datanya2);

                        // input ke tabel kelengkapa dokumen penagihan
                            $data3 = ['id_permohonan'       => $id_permohonan,
                                      'dokumen_kelengkapan' => 'Persetujuan Asuransi',
                                      'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                      'add_by'              => $this->session->userdata('pengguna')
                                    ];

                            $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data3);

                            $data4 = ['id_permohonan'       => $id_permohonan,
                                      'dokumen_kelengkapan' => 'Permohonan Jaminan',
                                      'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                      'add_by'              => $this->session->userdata('pengguna')
                                    ];

                            $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data4);

                        // ubah status permohonan
                            $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 4), array('id_permohonan' => $id_permohonan));

                        echo json_encode(['hasil' => 'berhasil', 'no_persetujuan' => $nomor_persetujuan, 'tgl_persetujuan' => $tgl_persetujuan, 'id_persetujuan_asuransi' => $id_pr_as, 'id_dokumen' => $id_dokumen, 'tgl_terbit_pa' => date('d-M-Y', strtotime($data['tgl_persetujuan'])), 'tgl_terbit_pb' => date('d-M-Y', strtotime($datanya2['tgl_terbit'])), 'nilai_premi' => 'Rp. '.number_format($data['nilai_premi'],'0','.','.')]);

                    } else {

                        $this->M_kredit_non_konsumtif->ubah_data('persetujuan_asuransi', $data, array('id_persetujuan_asuransi' => $id_persetujuan_as));

                        echo json_encode(['hasil' => 'berhasil', 'no_persetujuan' => $nomor_persetujuan, 'tgl_persetujuan' => $tgl_persetujuan, 'id_persetujuan_asuransi' => $id_persetujuan_as, 'id_dokumen' => $id_dokumen, 'nilai_premi' => 'Rp. '.number_format($data['nilai_premi'],'0','.','.')]);
                    }

                } else {

                    if (!$this->upload->do_upload("dokumen")){

                        echo json_encode(['hasil' => 0]);

                    } else {

                        $this->upload->do_upload('dokumen');
                        $data           = array('upload_data' => $this->upload->data());
                        $filename       = $data['upload_data']['file_name'];

                        $dok  = trim(base64_encode($filename));

                        $data = ['nomor_persetujuan'    => $nomor_persetujuan,
                                 'tgl_persetujuan'      => $tgl_persetujuan,
                                 'dokumen'              => $dok,
                                 'id_permohonan_bg'     => $id_permohonan,
                                 'nilai_premi'          => $premi,
                                 'add_by'               => $this->session->userdata('pengguna')
                                ];

                        if ($aksi_simpan == 'buat') {
                            $this->M_kredit_non_konsumtif->input_data('persetujuan_asuransi', $data);

                            $id_pr_as = $this->db->insert_id();

                            // input ke tabel pengantar bank
                                $datanya2 = ['id_permohonan_bg' => $id_permohonan,
                                             'tgl_terbit'       => date('Y-m-d', now('Asia/Jakarta'))
                                            ];

                                $this->M_kredit_non_konsumtif->input_data('pengantar_bank', $datanya2);

                            // input ke tabel kelengkapa dokumen penagihan
                                $data3 = [  'id_permohonan'       => $id_permohonan,
                                            'dokumen_kelengkapan' => 'Persetujuan Asuransi',
                                            'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                            'dokumen'             => $dok,
                                            'add_by'              => $this->session->userdata('pengguna')
                                            ];

                                $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data3);

                                $id_kelengkapan = $this->db->insert_id();

                                $data4 = [  'id_permohonan'       => $id_permohonan,
                                            'dokumen_kelengkapan' => 'Permohonan Jaminan',
                                            'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                            'dokumen'             => '1',
                                            'add_by'              => $this->session->userdata('pengguna')
                                            ];

                                $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data4);

                            // ubah status permohonan
                                $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 4), array('id_permohonan' => $id_permohonan));

                            echo json_encode(['hasil' => 'berhasil', 'no_persetujuan' => $nomor_persetujuan, 'tgl_persetujuan' => $tgl_persetujuan, 'id_persetujuan_asuransi' => $id_pr_as, 'id_dokumen' => $id_dokumen, 'tgl_terbit_pa' => date('d-M-Y', strtotime($data['tgl_persetujuan'])), 'tgl_terbit_pb' => date('d-M-Y', strtotime($datanya2['tgl_terbit'])), 'id_kelengkapan' => $id_kelengkapan, 'nilai_premi' => 'Rp. '.number_format($data['nilai_premi'],'0','.','.')]);

                        } else {

                            $this->M_kredit_non_konsumtif->ubah_data('persetujuan_asuransi', $data, array('id_persetujuan_asuransi' => $id_persetujuan_as));

                            // ubah data ke tabel kelengkapan dokumen penagihan
                            $datanya2 = ['dokumen'  => $dok ];
                
                            $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', $datanya2, array('id_kelengkapan' => $id_kelengkapan));

                            echo json_encode(['hasil' => 'berhasil', 'no_persetujuan' => $nomor_persetujuan, 'tgl_persetujuan' => $tgl_persetujuan, 'id_persetujuan_asuransi' => $id_persetujuan_as, 'id_dokumen' => $id_dokumen, 'id_kelengkapan' => $id_kelengkapan, 'nilai_premi' => 'Rp. '.number_format($data['nilai_premi'],'0','.','.')]);
                        }

                    }

                }
            }

            // aksi simpan data bank garansi
            public function simpan_data_bank_garansi()
            {
                $no_bg          = $this->input->post('no_bg');
                $tgl_bg         = ($this->input->post('tgl_bg') == '') ? null : date('Y-m-d', strtotime($this->input->post('tgl_bg')));
                $id_permohonan  = $this->input->post('id_permohonan');
                $aksi_simpan    = $this->input->post('aksi_simpan');
                $id_bg          = $this->input->post('id_bg');
                $id_dokumen     = $this->input->post('id_dokumen');
                $id_kelengkapan = $this->input->post('id_kelengkapan');
                
                // upload file
                $config['max_size']         = 15048;
                $config['allowed_types']    = "pdf";
                $config['remove_spaces']    = TRUE;
                $config['overwrite']        = TRUE;
                $config['upload_path']      = FCPATH.'uploads/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                $dok_srt       = $_FILES['dokumen']['name'];

                if (empty($dok_srt)) {
                    // input data
                    $data = ['no_bg'            => $no_bg,
                             'tgl_bg'           => $tgl_bg,
                             'id_permohonan_bg' => $id_permohonan
                             ];

                    if ($aksi_simpan == 'buat') {

                        $this->M_kredit_non_konsumtif->input_data('bank_garansi', $data);

                        $id = $this->db->insert_id();
                        
                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_bg' => $id), array('id_permohonan' => $id_permohonan));

                        // input ke tabel kelengkapa dokumen penagihan
                            $data3 = [  'id_permohonan'       => $id_permohonan,
                                        'dokumen_kelengkapan' => 'Bank Garansi',
                                        'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                        'add_by'              => $this->session->userdata('pengguna')
                                    ];

                            $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data3);

                            $id_kelengkapan = $this->db->insert_id();

                        // ubah status permohonan
                            $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 5), array('id_permohonan' => $id_permohonan));

                        echo json_encode(['hasil' => 'berhasil', 'no_bg' => $no_bg, 'tgl_bg' => date("d-M-Y", strtotime($data['tgl_bg'])), 'id_bg' => $id, 'id_dokumen' => $id_dokumen, 'tgl_terbit' => $data['tgl_bg'], 'id_kelengkapan' => $id_kelengkapan]);

                    } else {

                        $this->M_kredit_non_konsumtif->ubah_data('bank_garansi', $data, array('id_bg' => $id_bg));

                        echo json_encode(['hasil' => 'berhasil', 'no_bg' => $no_bg, 'tgl_bg' => date("d-M-Y", strtotime($data['tgl_bg'])), 'id_bg' => $id_bg, 'id_dokumen' => $id_dokumen]);
                    }
                    

                } else {

                    if (!$this->upload->do_upload("dokumen")){

                        echo json_encode(['hasil' => 0]);

                    } else {

                        $this->upload->do_upload('dokumen');
                        $data           = array('upload_data' => $this->upload->data());
                        $filename       = $data['upload_data']['file_name'];

                        $dok  = trim(base64_encode($filename));

                        $data = ['no_bg'            => $no_bg,
                                 'tgl_bg'           => $tgl_bg,
                                 'id_permohonan_bg' => $id_permohonan,
                                 'dokumen'          => $dok
                                ];

                        if ($aksi_simpan == 'buat') {

                            $this->M_kredit_non_konsumtif->input_data('bank_garansi', $data);

                            $id = $this->db->insert_id();
                            
                            $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_bg' => $id), array('id_permohonan' => $id_permohonan));

                            // input ke tabel kelengkapa dokumen penagihan
                                $data3 = [  'id_permohonan'       => $id_permohonan,
                                            'dokumen_kelengkapan' => 'Bank Garansi',
                                            'add_time'            => date('Y-m-d H:i:s', now('Asia/Jakarta')),
                                            'dokumen'             => $dok,
                                            'add_by'              => $this->session->userdata('pengguna')
                                            
                                        ];

                                $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data3);

                                $id_kelengkapan = $this->db->insert_id();

                            // ubah status permohonan
                                $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 5), array('id_permohonan' => $id_permohonan));

                            echo json_encode(['hasil' => 'berhasil', 'no_bg' => $no_bg, 'tgl_bg' => date("d-M-Y", strtotime($data['tgl_bg'])), 'id_bg' => $id, 'id_dokumen' => $id_dokumen, 'tgl_terbit' => date("d-M-Y", strtotime($data['tgl_bg'])), 'id_kelengkapan' => $id_kelengkapan]);

                        } else {

                            $this->M_kredit_non_konsumtif->ubah_data('bank_garansi', $data, array('id_bg' => $id_bg));

                            // ubah data ke tabel kelengkapan dokumen penagihan
                                $data3 = [ 'dokumen' => $dok ];
                                
                                $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', $data3, array('id_kelengkapan' => $id_kelengkapan));

                            echo json_encode(['hasil' => 'berhasil', 'no_bg' => $no_bg, 'tgl_bg' => date("d-M-Y", strtotime($data['tgl_bg'])), 'id_bg' => $id_bg, 'id_dokumen' => $id_dokumen,'id_kelengkapan' => $id_kelengkapan]);
                        }

                    }

                }
            }

            // aksi simpan bukti bayar premi
            public function simpan_data_bukti_premi()
            {
                $id_permohonan  = $this->input->post('id_permohonan');
                $aksi_simpan    = $this->input->post('aksi_simpan');
                $id_dokumen     = $this->input->post('id_dokumen');
                $id_kelengkapan = $this->input->post('id_kelengkapan');
                
                // upload file
                $config['max_size']         = 15048;
                $config['allowed_types']    = "pdf";
                $config['remove_spaces']    = TRUE;
                $config['overwrite']        = TRUE;
                $config['upload_path']      = FCPATH.'uploads/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                $dok_srt       = $_FILES['dokumen']['name'];

                if (!$this->upload->do_upload("dokumen")){

                    echo json_encode(['hasil' => 0]);

                } else {

                    $this->upload->do_upload('dokumen');
                    $data           = array('upload_data' => $this->upload->data());
                    $filename       = $data['upload_data']['file_name'];

                    $dok  = trim(base64_encode($filename));

                    $data = ['id_permohonan'        => $id_permohonan,
                             'dokumen_kelengkapan'  => 'Bukti Bayar Premi',
                             'add_by'               => $this->session->userdata('pengguna'),
                             'add_time'             => date("Y-m-d H:i:s", now('Asia/Jakarta')),
                             'dokumen'              => $dok
                            ];

                    if ($aksi_simpan == 'buat') {
                        $this->M_kredit_non_konsumtif->input_data('kelengkapan_dokumen_penagihan', $data);
                    } else {
                        $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('dokumen' => $dok), array('id_kelengkapan' => $id_kelengkapan, 'id_permohonan' => $id_permohonan));
                    }
                    

                    // ubah status permohonan
                        $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 6), array('id_permohonan' => $id_permohonan));

                    echo json_encode(['hasil' => 'berhasil', 'id_permohonan' => $id_permohonan, 'tgl_terbit' => date("d-M-Y", strtotime($data['add_time'])), 'id_kelengkapan' => $id_kelengkapan, 'dokumen' => base64_decode($data['dokumen'])]);

                }

            }

            // aksi ambil data persetujuan asuransi
            public function ambil_data_persetujuan_asuransi()
            {
                $id_permohonan = $this->input->post('id_permohonan');

                $data = $this->M_kredit_non_konsumtif->cari_data('persetujuan_asuransi', array('id_permohonan_bg' => $id_permohonan))->row_array();

                // ambil id dokumen
                $cari = $this->M_kredit_non_konsumtif->cari_data('dokumen', array('id_permohonan_bg' => $id_permohonan, 'jenis_dokumen' => 'persetujuan_asuransi'))->row_array();

                $cari2 = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'dokumen_kelengkapan' => 'Persetujuan Asuransi'))->row_array();

                array_push($data, array('id_dokumen' => $cari['id_dokumen'], 'id_kelengkapan' => $cari2['id_kelengkapan']));

                echo json_encode($data);
            }

            // aksi ambil data persetujuan asuransi
            public function ambil_data_bank_garansi()
            {
                $id_permohonan = $this->input->post('id_permohonan');

                $dt = $this->M_kredit_non_konsumtif->cari_data('permohonan_bank_garansi', array('id_permohonan' => $id_permohonan))->row_array();

                $data = $this->M_kredit_non_konsumtif->cari_data('bank_garansi', array('id_bg' => $dt['id_bg']))->row_array();

                // ambil id dokumen
                $cari = $this->M_kredit_non_konsumtif->cari_data('dokumen', array('id_permohonan_bg' => $id_permohonan, 'jenis_dokumen' => 'bank_garansi'))->row_array();

                $cari2 = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'dokumen_kelengkapan' => 'Bank Garansi'))->row_array();

                array_push($data, array('id_dokumen' => $cari['id_dokumen'], 'id_kelengkapan' => $cari2['id_kelengkapan']));

                echo json_encode($data);
            }

            // aksi ambil data persetujuan asuransi
            public function ambil_data_bukti_byr_premi()
            {
                $id_permohonan = $this->input->post('id_permohonan');

                $data = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'dokumen_kelengkapan' => 'Bukti Bayar Premi'))->row_array();

                echo json_encode($data);
            }

        // Akhir 24-03-2020

        // 26-03-2020

            // menampilkan dokumen 
            public function tampil_data_dokumen($id_permohonan)
            {
                // $list = $this->M_kredit_non_konsumtif->cari_data('dokumen', array('id_permohonan_bg' => $id_permohonan))->result_array();

                // $list = $this->M_kredit_non_konsumtif->cari_dokumen($id_permohonan)->result_array();

                $data = ['Pemohonan Jaminan', 'Surat pernyataan Kesediaan Membayar Ganti Rugi', 'Surat Sanggup', 'Surat Pernyataan Kesanggupan Menyelesaikan Pekerjaan dan Tanggung Jawab Mutlak', 'Surat Pengantar dari Agent'];

                $cari = $this->M_kredit_non_konsumtif->cari_data('pengantar_asuransi', array('id_permohonan_bg' => $id_permohonan))->row_array();

                $datanya = array();

                $no=1;
                foreach ($data as $value) {
                    if ($value == 'Surat Pengantar dari Agent') {
                        $no2 = 8;
                    } else {
                        $no2 = $no;
                    }
                    $datanya[] = ['nama_dokumen' => $value,
                                  'tgl_terbit'   => date("d-M-Y", strtotime($cari['tgl_terbit'])),
                                  'dokumen'      => $no2
                                 ];
                    $no++;
                }

                // persetujuan asuransi
                $cari2 = $this->M_kredit_non_konsumtif->cari_data('persetujuan_asuransi', array('id_permohonan_bg' => $id_permohonan))->row_array();

                if (!empty($cari2)) {
                    $datanya[] = ['nama_dokumen'    => 'Persetujuan Asuransi',
                                  'tgl_terbit'      => date("d-M-Y", strtotime($cari2['tgl_persetujuan'])),
                                  'dokumen'         => $cari2['dokumen']
                                 ];
                }

                // pengantar bank
                $cari22 = $this->M_kredit_non_konsumtif->cari_data('pengantar_bank', array('id_permohonan_bg' => $id_permohonan))->row_array();

                if (!empty($cari22)) {
                    $datanya[] = ['nama_dokumen'    => 'Pengantar Bank',
                                  'tgl_terbit'      => date("d-M-Y", strtotime($cari22['tgl_terbit'])),
                                  'dokumen'         => '5'
                                 ];
                }

                // bank garansi
                $cari3 = $this->M_kredit_non_konsumtif->cari_data('bank_garansi', array('id_permohonan_bg' => $id_permohonan))->row_array();

                if (!empty($cari3)) {
                    $datanya[] = ['nama_dokumen'    => 'Surat IP BG',
                                  'tgl_terbit'      => date("d-M-Y", strtotime($cari3['tgl_bg'])),
                                  'dokumen'         => $cari3['dokumen']
                                 ];
                }

                // bukti bayar premi
                $cari4 = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'dokumen_kelengkapan' => 'Bukti Bayar Premi'))->row_array();

                if (!empty($cari4)) {
                    $datanya[] = ['nama_dokumen'    => 'Bukti Bayar Premi',
                                  'tgl_terbit'      => date("d-M-Y", strtotime($cari4['add_time'])),
                                  'dokumen'         => $cari4['dokumen']
                                 ];
                }

                $cari_pengantar_asuransi = $this->M_kredit_non_konsumtif->cari_data('pengantar_asuransi', array('id_permohonan_bg' => $id_permohonan))->num_rows();

                $no =1;
                foreach ($datanya as $v) {
                    $tbody = array();
                    $tbody[] = "<div align='center'>".$no++.".</div>";
                    $tbody[] = $v['nama_dokumen'];
                    $tbody[] = date("d-M-Y", strtotime($v['tgl_terbit']));
                    $tbody[] = "<div align='center'><form action='".base_url('kredit/kredit_non_konsumtif/download_dokumen')."' method='POST'><input type='hidden' name='dokumen' value='".$v['dokumen']."'><input type='hidden' name='id_permohonan' value='".$id_permohonan."'><button type='submit' class='btn btn-sm btn-outline-success mt-1 btn-sm mr-3 unduh-dokumen' data-toggle='tooltip' data-placement='top' title='Lihat Dokumen'><i class='fa fa-info m-1'></i></button></form></div>";
                    $data2[]  = $tbody; 
                }

                if ($cari_pengantar_asuransi != 0) {
                    echo json_encode(array('data'=> $data2));
                }else{
                    echo json_encode(array('data'=> 0));
                }
            }

            public function tes()
            {
                $data = ['Pemohonan Jaminan', 'Surat pernyataan Kesediaan Membayar Ganti Rugi', 'Surat Sanggup', 'Surat Pernyataan Kesanggupan Menyelesaikan Pekerjaan dan Tanggung Jawab Mutlak'];

                $cari = $this->M_kredit_non_konsumtif->cari_data('pengantar_asuransi', array('id_permohonan_bg' => 32))->row_array();

                $datanya = array();

                $no=1;
                foreach ($data as $value) {
                    $datanya[] = ['nama_dokumen' => $value,
                                  'tgl_terbit'   => date("d-M-Y", strtotime($cari['tgl_terbit'])),
                                  'dokumen'      => $no
                                 ];
                    $no++;
                }

                // persetujuan asuransi
                $cari2 = $this->M_kredit_non_konsumtif->cari_data('persetujuan_asuransi', array('id_permohonan_bg' => 32))->row_array();

                if (!empty($cari2)) {
                    $datanya[] = ['nama_dokumen'    => 'Persetujuan Asuransi',
                                                      'tgl_terbit'      => date("d-M-Y", strtotime($cari2['add_time'])),
                                                      'dokumen'         => $cari2['dokumen']
                                                     ];
                }

                // pengantar bank
                $cari22 = $this->M_kredit_non_konsumtif->cari_data('pengantar_bank', array('id_permohonan_bg' => 32))->row_array();

                if (!empty($cari22)) {
                    $datanya[] = ['nama_dokumen'    => 'Pengantar Bank',
                                                       'tgl_terbit'      => date("d-M-Y", strtotime($cari22['add_time'])),
                                                       'dokumen'         => 'pengantar_bank'
                                                       ];
                }

                // bank garansi
                // cari id bg
                $cr = $this->M_kredit_non_konsumtif->cari_data('permohonan_bank_garansi', array('id_permohonan' => 32))->row_array();

                $cari3 = $this->M_kredit_non_konsumtif->cari_data('bank_garansi', array('id_bg' => $cr['id_bg']))->row_array();

                if (!empty($cari3)) {
                    $datanya[] = ['nama_dokumen'    => 'Bank Garansi',
                                                      'tgl_terbit'      => date("d-M-Y", strtotime($cari3['add_time'])),
                                                      'dokumen'         => $cari3['dokumen']
                                                     ];
                }

                // ksort($datanya);

                // foreach ($datanya as $key => $value) {
                //     foreach ($value as $v) {
                //         echo $v['nama_dokumen'];
                //     }
                // }

                echo "<pre>";
                print_r($datanya);
                echo "</pre>";
            }

        // Akhir 26-03-2020

        // 29-03-2020

            // menampilkan data dokumen penagihan komisi
            public function tampil_dok_penagihan($id_permohonan)
            {
                $list = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan))->result_array();

                $no =1;
                foreach ($list as $v) {
                    $tbody = array();

                    if ($v['kelengkapan'] == 1) {
                        $ck = 'checked';
                    } else {
                        $ck = '';
                    }

                    if ($v['valid'] == 1) {
                        $ck2 = 'checked';
                    } else {
                        if ($v['kelengkapan'] == 1) {
                            $ck2 = '';
                        } else {
                            $ck2 = 'hidden';
                        }
                       
                    }

                    $tbody[] = "<div align='center'>".$no++.".</div>";
                    $tbody[] = $v['dokumen_kelengkapan'];
                    $tbody[] = "<div align='center'><form action='".base_url('kredit/kredit_non_konsumtif/download_dokumen')."' method='POST'><input type='hidden' name='dokumen' value='".$v['dokumen']."'><input type='hidden' name='id_permohonan' value='".$id_permohonan."'><button type='submit' class='btn btn-sm btn-info btn-sm mr-3 unduh-dokumen'><i class='fa fa-download mr-2'></i>Unduh </button></form></div>";
                    $tbody[]    = "<div align='center'><input type='checkbox' class='kelengkapan' data-id='".$no."' name='kelengkapan[]' id='kelengkapan".$no."' id_kel='".$v['id_kelengkapan']."' $ck></div>";
                    $tbody[]    = "<div align='center'><input type='checkbox' class='valid".$no."' name='valid[]' id_kel='".$v['id_kelengkapan']."' id='valid' $ck2></div>"; 
                    $data[]  = $tbody; 
                }

                if ($list) {
                    echo json_encode(array('data'=> $data));
                }else{
                    echo json_encode(array('data'=> 0));
                }
            }

            // cek kelengkapan penagihan
            public function cek_kelengkapan_penagihan()
            {
                $id_permohonan = $this->input->post('id_permohonan');
                
                $cari   = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan))->num_rows();

                $cari2   = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'kelengkapan' => 1))->num_rows();

                $cari3   = $this->M_kredit_non_konsumtif->cari_data('kelengkapan_dokumen_penagihan', array('id_permohonan' => $id_permohonan, 'valid' => 1))->num_rows();

                // $cari4   = $this->M_kredit_non_konsumtif->cari_data('dokumen', array('id_permohonan_bg' => $id_permohonan, 'jenis_dokumen' => 'surat_penagihan'))->row_array();

                $cari5  = $this->M_kredit_non_konsumtif->cari_data('bayar_komisi', array('id_permohonan' => $id_permohonan, 'komisi_dibayar !=' => null));

                $cr5 = $cari5->row_array();

                $tgl_bayar_komisi = date("d-M-Y", strtotime($cr5['tgl_bayar']));
                $nominal_bayar    = number_format($cr5['komisi_dibayar'],'2',',','.');

                // $cari_dokumen = $this->M_kredit_non_konsumtif->cari_data('dokumen', array('id_permohonan_bg' => $id_permohonan, 'dokumen' => '6'))->row_array();

                $cari6 = $this->M_kredit_non_konsumtif->cari_data('bayar_komisi', array('id_permohonan' => $id_permohonan))->row_array();

                echo json_encode(['cek_data_kdp' => $cari, 'jml_kelengkapan' => $cari2, 'jml_valid' => $cari3, 'tgl_terbit' => date("d-M-Y", strtotime($cari6['add_time'])), 'cek_bayar_komisi' => $cari5->num_rows(), 'tgl_bayar_komisi' => $tgl_bayar_komisi, 'nominal_bayar' => $nominal_bayar, 'bukti_bayar' => $cr5['bukti_bayar'], 'id_bayar_komisi' => $cari6['id_bayar_komisi'], 'dokumen_penagihan' => '6']);
            }

            // simpan kelengkapan dan valid
            public function simpan_kel_penagihan_komisi()
            {
                $kelengkapan        = $this->input->post('kelengkapan');
                $valid              = $this->input->post('valid');
                $id_permohonan      = $this->input->post('id_permohonan');
                $jml_kelengkapan    = $this->input->post('jml_kelengkapan');
                $jml_valid          = $this->input->post('jml_valid');

                if (!empty($kelengkapan)) {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('kelengkapan' => null), array('id_permohonan' => $id_permohonan));
                
                    // ubah data kelengkapan
                    for ($i=0; $i < count($kelengkapan); $i++) { 
                        $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('kelengkapan' => 1), array('id_kelengkapan' => $kelengkapan[$i]));
                    }
                } else {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('kelengkapan' => null), array('id_permohonan' => $id_permohonan));
                }

                if (!empty($valid)) {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('valid' => null), array('id_permohonan' => $id_permohonan));

                    // ubah data valid
                    for ($i=0; $i < count($valid); $i++) { 
                        $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('valid' => 1), array('id_kelengkapan' => $valid[$i]));
                    }
                } else {
                    // reset semua ke null
                    $this->M_kredit_non_konsumtif->ubah_data('kelengkapan_dokumen_penagihan', array('valid' => null), array('id_permohonan' => $id_permohonan));
                }

                if ($jml_kelengkapan == 4 && $jml_valid == 4) {
                    
                    // update status permohonan
                    $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 7), array('id_permohonan' => $id_permohonan));

                    $datanya = ['add_time'      => date("Y-m-d H:i:s", now('Asia/Jakarta')),
                                'id_permohonan' => $id_permohonan,
                                'add_by'        => $this->session->userdata('pengguna')
                                ];

                    // simpan pada tabel dokumen
                    $this->M_kredit_non_konsumtif->input_data('bayar_komisi', $datanya);

                    $id_bayar_komisi = $this->db->insert_id();

                }

                echo json_encode(['status' => TRUE, 'tgl_terbit' => date("d-M-Y", now('Asia/Jakarta')), 'dokumen_penagihan' => 6, 'id_bayar_komisi' => $id_bayar_komisi]);
            }

        // Akhir 29-03-2020

        // 30-03-2020

            // simpan data pembayaran komisi
            public function simpan_data_bayar_komisi()
            {
                $komisi_dibayar = $this->input->post('komisi_dibayar');
                $tgl_bayar      = ($this->input->post('tgl_bayar') == '') ? null : date('Y-m-d', strtotime($this->input->post('tgl_bayar')));
                $id_permohonan  = $this->input->post('id_permohonan');
                $id_bayar_komisi  = $this->input->post('id_bayar_komisi');
                
                // upload file
                $config['max_size']         = 15048;
                $config['allowed_types']    = "pdf|jpg|jpeg|png";
                $config['remove_spaces']    = TRUE;
                $config['overwrite']        = TRUE;
                $config['upload_path']      = FCPATH.'uploads/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload("dokumen")){

                    echo json_encode(['hasil' => 0]);
    
                } else {

                    $this->upload->do_upload('dokumen');

                    $data           = array('upload_data' => $this->upload->data());
                    $filename       = $data['upload_data']['file_name'];

                    $dok            = trim(base64_encode($filename));

                    // input data
                    $data = ['komisi_dibayar'   => $komisi_dibayar,
                             'tgl_bayar'        => $tgl_bayar,
                             'bukti_bayar'      => $dok
                            ];

                    $this->M_kredit_non_konsumtif->ubah_data('bayar_komisi', $data, array('id_bayar_komisi' => $id_bayar_komisi));

                    // ubah status permohonan
                    $this->M_kredit_non_konsumtif->ubah_data('permohonan_bank_garansi', array('id_status_permohonan' => 8), array('id_permohonan' => $id_permohonan));

                    echo json_encode(['hasil' => 'berhasil', 'tgl_bayar_komisi' => date("d-M-Y", strtotime($data['tgl_bayar'])), 'nominal_bayar' => number_format($data['komisi_dibayar'], '2', '.', ','), 'bukti_bayar' => $data['bukti_bayar'] ]);

                }
            }

            // download unduh bukti
            public function download_unduh_bukti()
            {
                $dok = base64_decode($this->input->post('unduh_bukti'));

                force_download("uploads/$dok", NULL);
            }

            // unduh excel permohonan bank garansi
            public function unduh_excel_bank_garansi()
            {
                $data   = [ 'dt_bg'         => $this->M_kredit_non_konsumtif->semua_data_permohonan_bank_garansi()->result_array(),
                            'jenis_report'  => 'Permohonan Bank Garansi',
                            'Menu'          => "Kredit Non Konsumtif",
                            'Page'          => "Bank Garansi"
                          ];

                $this->template->excel('kredit/bank_garansi/V_excel_permohonan_bg', $data);
            } 

        // Akhir 30-03-2020

        // 1-04-2020

            // download dokumen detail permohonan
            public function download_dokumen()
            {
                $dokumen        = $this->input->post('dokumen');
                $id_permohonan  = $this->input->post('id_permohonan');

                if ($dokumen == 1 || $dokumen == 2 || $dokumen == 3 || $dokumen == 4 || $dokumen == 5 || $dokumen == 6 || $dokumen == 7 || $dokumen == 8) {

                    if ($dokumen == 6) {
                        $name = 'Surat Penagihan';
                    } else {
                        $name = 'Dokumen';
                    }

                    $data = ['name'         => $name,
                             'bg'           => $this->M_kredit_non_konsumtif->cari_data_permohonan($id_permohonan)->row_array(),
                             'id_pemohonan' => $id_permohonan
                            ];

                    $this->template->word("kredit/bank_garansi/V_word_dokumen_$dokumen", $data);
                } else {
                    $dok = base64_decode($dokumen);

                    force_download("uploads/$dok", NULL);
                }
                
            }

            public function bilangan()
            {
                echo $a = terbilang(12306700);
            }

        // Akhir 1-04-2020

        // 12-04-2020
            // simpan data menyusul
            public function simpan_data_menyusul()
            {
                $id_dokumen_persyaratan = $this->input->post('id_dokumen_syarat');

                $data = ['dokumen_persyaratan'  => 'dokumen_menyusul',
                        'kelengkapan'           => 2,
                        'valid'                 => 2
                        ];

                $this->M_kredit_non_konsumtif->ubah_data('dokumen_persyaratan', $data, array('id_dokumen_persyaratan' => $id_dokumen_persyaratan));

                echo json_encode(['status' => true]);
            }

            public function hitung_hari()
            {
                $date1 = new DateTime("2020-04-01");
                $date2 = new DateTime("2020-04-02");

                echo $diff = $date2->diff($date1)->format("%a") + 1;

            }
        // Akhir 12-04-2020

    // Akhir Afif

        public function dokumen_persyaratan()
        {
            if (!empty($this->userdata)) {
                $data['breadcrumb'] = array('<li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>','<li class="breadcrumb-item"><a href="'. base_url().'Kredit/Kredit_non_konsumtif" class="text-success">Bank Garansi</a></li>','<li class="breadcrumb-item active">Dokumen Persyaratan</li>');
                $data['Menu'] = "Kredit Non Konsumtif";
                $data['Page'] = "Dokumen Persyaratan";
                $data['userdata'] = $this->userdata;
                $data['data_asuransi'] = $this->M_kredit_non_konsumtif->get_data('asuransi');
                $data['data_bank'] = $this->M_kredit_non_konsumtif->get_data('bank');
                $data['data_cabang'] = $this->M_kredit_non_konsumtif->get_data('cabang_asuransi');
                $data['data_jenis_bg'] = $this->M_kredit_non_konsumtif->get_jenis_bg();
                $this->template->views('Kredit/dokumen_persyaratan', $data);
            } else {
            redirect('Auth');
            }
        }

        public function detail_pg()
        {
            if (!empty($this->userdata)) {
                $data['breadcrumb'] = array('<li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>','<li class="breadcrumb-item"><a href="'. base_url().'Kredit/Kredit_non_konsumtif" class="text-success">Bank Garansi</a></li>','<li class="breadcrumb-item active">Detail</li>');
                $data['Menu'] = "Kredit Non Konsumtif";
                $data['Page'] = "Detail";
                $data['userdata'] = $this->userdata;
                $data['data_asuransi'] = $this->M_kredit_non_konsumtif->get_data('asuransi');
                $data['data_bank'] = $this->M_kredit_non_konsumtif->get_data('bank');
                $data['data_cabang'] = $this->M_kredit_non_konsumtif->get_data('cabang_asuransi');
                $data['data_jenis_bg'] = $this->M_kredit_non_konsumtif->get_jenis_bg();
                $this->template->views('Kredit/detail', $data);
            } else {
            redirect('Auth');
            }
        }

        public function json()
        {
            $data = $this->M_kredit_non_konsumtif->get_bank_garansi()->result();
            echo json_encode($data);
        }

        public function get_data($table)
        {
            $where = $this->input->post();
            $data = $this->M_kredit_non_konsumtif->get_data($table,$where);
            echo json_encode($data);
        }

        public function join_permohonan_bank_garansi()
        {
            $this->db->select(' pbg.id_permohonan,
                                pbg.nama_oblige,
                                pbg.nomor_surat_permohonan,

                                principal.id_principal,
                                principal.nama_principal,
                                principal.alamat_principal,
                                principal.pic1,
                                principal.jabatan_pic1,
                                
                                asuransi.nama_asuransi,
                                status_permohonan.status_permohonan');
            $this->db->from('permohonan_bank_garansi as pbg');

            $this->db->join('principal', 'pbg.id_principal = principal.id_principal','left');
            $this->db->join('asuransi', 'pbg.id_cabang_asuransi = asuransi.id_asuransi','left');
            $this->db->join('status_permohonan', 'pbg.id_status_permohonan = status_permohonan.id_status_permohonan','left');

            echo json_encode($this->db->get()->result());
        }

        public function hapus()
        {
            $id = $this->input->post();
            $data = $this->M_kredit_non_konsumtif->hapus($id,'permohonan_bank_garansi');
            if ($data) {
            echo "Sukses";
            }else{
            echo "Gagal";
            }
        }

        public function save($table)
        {
            $post = $this->input->post();
            $post['add_time'] = date('Y-m-d H:i:s');
            $data = $this->db->insert($table, $post);
            if ($data) {
            echo "Sukses";
            }else{
            echo "Gagal";
            }
        }

        public function save_permohonanPrincipal()
        {
            $post = $this->input->post();
            $post['add_time'] = date('Y-m-d H:i:s');
            $dat = array('id_principal' => $post['id_principal']);
            $dat['id_permohonan'] = mt_rand(100000,999999);

            // START
            $this->db->trans_start();
            $this->db->trans_strict(FALSE);

            $this->db->insert('principal', $post);

            $this->db->insert('permohonan_bank_garansi', $dat);
            $this->db->trans_complete();


            if ($this->db->trans_status() === FALSE) {
                # ERROR
                $this->db->trans_rollback();
                return FALSE;
            } 
            else {
            # Sukses, Lanjut 
            $this->db->trans_commit();
            $out = array('hasil' => "Sukses", "id_permohonan" => $dat['id_permohonan']);
            echo json_encode($out);
            return TRUE;
            }

        }

        public function Update1()
        {
            $post = $this->input->post();
            $data = $this->M_kredit_non_konsumtif->update_permohonan($post);
            if ($data) {
            echo "Sukses";
            }else{
            echo "Gagal";
            }
        }

        public function simpan()
        {
            if (empty($this->input->post('tgl_ppk'))) {
                $tgl_ppk = "".date("01-01-0001");
            } else {
                $tgl_ppk = $this->input->post('tgl_ppk');
            }
            if (empty($this->input->post('tgl_surat'))) {
                $tgl_surat = "".date("01-01-0001");
            } else {
                $tgl_surat = $this->input->post('tgl_surat');
            }

            if (empty($this->input->post('tgl_awal'))) {
                $tgl_awal = "".date("01-01-0001");
            } else {
                $tgl_awal = $this->input->post('tgl_awal');
            }
            
            if (empty($this->input->post('tgl_akhir'))) {
                $tgl_akhir = "".date("01-01-0001");
            } else {
                $tgl_akhir = $this->input->post('tgl_akhir');
            }

            if (empty($this->input->post('n_jaminan'))) {
                $n_jaminan = null;
            } else {
                $n_jaminan = str_replace(',', '', $this->input->post('n_jaminan'));
            }
            if (empty($this->input->post('n_premi'))) {
                $n_premi = null;
            } else {
                $n_premi = str_replace(',', '', $this->input->post('n_premi'));
            }
            
            if (empty($this->input->post('p_asuransi'))) {
                $p_asuransi = null;
            } else {
                $p_asuransi = str_replace(',', '', $this->input->post('p_asuransi'));
            }
            if (empty($this->input->post('p_bank'))) {
                $p_bank = null;
            } else {
                $p_bank = str_replace(',', '', $this->input->post('p_bank'));
            }
            if (empty($this->input->post('p_komisi'))) {
                $p_komisi = null;
            } else {
                $p_komisi = str_replace(',', '', $this->input->post('p_komisi'));
            }
            if (empty($this->input->post('n_kontrak'))) {
                $n_kontrak = null;
            } else {
                $n_kontrak = str_replace(',', '', $this->input->post('n_kontrak'));
            }
            if (empty($this->input->post('tgl_bg'))) {
                $tgl_bg = "".date("01-01-0001");
            } else {
                $tgl_bg = $this->input->post('tgl_bg');
            }
            if (empty($this->input->post('tgl_s_tagih'))) {
                $tgl_s_tagih = "".date("01-01-0001");
            } else {
                $tgl_s_tagih = $this->input->post('tgl_s_tagih');
            }
            if (empty($this->input->post('tgl_m_tagih'))) {
                $tgl_m_tagih = "".date("01-01-0001");
            } else {
                $tgl_m_tagih = $this->input->post('tgl_m_tagih');
            }
            if (empty($this->input->post('tgl_regis'))) {
                $tgl_regis = "".date("01-01-0001");
            } else {
                $tgl_regis = $this->input->post('tgl_regis');
            }
            if (empty($this->input->post('tgl_srt_perm'))) {
                $tgl_srt_perm = "".date("01-01-0001");
            } else {
                $tgl_srt_perm = $this->input->post('tgl_srt_perm');
            }
            $arr = array(
                'id_asuransi' => $this->input->post('asuransi'),
                'id_cabang_asuransi' => $this->input->post('cb_as'),
                'id_bank' => $this->input->post('nama_bank'),
                'no_regis' => $this->input->post('no_regis'),
                'tgl_regis' => $tgl_regis,
                'no_srt_permohonan' => $this->input->post('no_srt_perm'),
                'tgl_srt_permohonan' => $tgl_srt_perm,
                'no_ppk' => $this->input->post('no_ppk'),
                'tgl_ppk' =>$tgl_ppk,
                'sumber_bisnis' => $this->input->post('sumber_bis'),
                'principal' => $this->input->post('nama_pri'),
                'alamat_principal' => $this->input->post('alamat_pri'),
                'no_surat' => $this->input->post('no_surat'),
                'tgl_surat' => $tgl_surat,
                'jenis_bg' => $this->input->post('jenis_bg'),
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'nilai_jaminan' => $n_jaminan,
                'nama_obligee' => $this->input->post('na_obligee'),
                'alamat_obligee' => $this->input->post('al_obligee'),
                'nama_pekerjaan' => $this->input->post('n_pekerjaan'),
                'nilai_kontrak' => $n_kontrak,
                'nilai_premi' => $n_premi,
                'premi_asuransi' => $p_asuransi,
                'premi_bank' => $p_bank,
                'potensi_komisi' => $p_komisi,
                'no_bg' => $this->input->post('no_bg'),
                'tgl_bg' => $tgl_bg,
                'ket_bg' => $this->input->post('ket_bg'),
                'bukti_bayar' => $this->input->post('bk_bayar'),
                'no_surat_tagih' => $this->input->post('no_s_tagih'),
                'tgl_surat_tagih' => $tgl_s_tagih,
                'tgl_masuk_tagih' => $tgl_m_tagih,
                'ket' => $this->input->post('keterangan')
            );
            $data = $this->M_kredit_non_konsumtif->simpan($arr);
            echo json_encode($data);
        }

        public function edit()
        {
            $id = $this->input->GET('id_bg');
            $data = $this->M_kredit_non_konsumtif->edit($id);

            echo json_encode($data);
        }

        public function detail()
        {
            $id = $this->input->GET('id_bg');
            $data = $this->M_kredit_non_konsumtif->detail($id);

            echo json_encode($data);
        }
        public function update()
        {
            if (empty($this->input->post('tgl_ppk'))) {
                $tgl_ppk = "".date("01-01-0001");
            } else {
                $tgl_ppk = $this->input->post('tgl_ppk');
            }
            if (empty($this->input->post('tgl_surat'))) {
                $tgl_surat = "".date("01-01-0001");
            } else {
                $tgl_surat = $this->input->post('tgl_surat');
            }

            if (empty($this->input->post('tgl_awal'))) {
                $tgl_awal = "".date("01-01-0001");
            } else {
                $tgl_awal = $this->input->post('tgl_awal');
            }
            
            if (empty($this->input->post('tgl_akhir'))) {
                $tgl_akhir = "".date("01-01-0001");
            } else {
                $tgl_akhir = $this->input->post('tgl_akhir');
            }

            if (empty($this->input->post('n_jaminan'))) {
                $n_jaminan = null;
            } else {
                $n_jaminan = str_replace(',', '', $this->input->post('n_jaminan'));
            }
            if (empty($this->input->post('n_premi'))) {
                $n_premi = null;
            } else {
                $n_premi = str_replace(',', '', $this->input->post('n_premi'));
            }
            
            if (empty($this->input->post('p_asuransi'))) {
                $p_asuransi = null;
            } else {
                $p_asuransi = str_replace(',', '', $this->input->post('p_asuransi'));
            }
            if (empty($this->input->post('p_bank'))) {
                $p_bank = null;
            } else {
                $p_bank = str_replace(',', '', $this->input->post('p_bank'));
            }
            if (empty($this->input->post('p_komisi'))) {
                $p_komisi = null;
            } else {
                $p_komisi = str_replace(',', '', $this->input->post('p_komisi'));
            }
            if (empty($this->input->post('n_kontrak'))) {
                $n_kontrak = null;
            } else {
                $n_kontrak = str_replace(',', '', $this->input->post('n_kontrak'));
            }
            if (empty($this->input->post('tgl_bg'))) {
                $tgl_bg = "".date("01-01-0001");
            } else {
                $tgl_bg = $this->input->post('tgl_bg');
            }
            if (empty($this->input->post('tgl_s_tagih'))) {
                $tgl_s_tagih = "".date("01-01-0001");
            } else {
                $tgl_s_tagih = $this->input->post('tgl_s_tagih');
            }
            if (empty($this->input->post('tgl_m_tagih'))) {
                $tgl_m_tagih = "".date("01-01-0001");
            } else {
                $tgl_m_tagih = $this->input->post('tgl_m_tagih');
            }
            if (empty($this->input->post('tgl_regis'))) {
                $tgl_regis = "".date("01-01-0001");
            } else {
                $tgl_regis = $this->input->post('tgl_regis');
            }
            if (empty($this->input->post('tgl_srt_perm'))) {
                $tgl_srt_perm = "".date("01-01-0001");
            } else {
                $tgl_srt_perm = $this->input->post('tgl_srt_perm');
            }
            
            $arr = array(
                'id_bg'  => $this->input->post('id_bg'),
            'id_asuransi' => $this->input->post('asuransi'),
                'id_cabang_asuransi' => $this->input->post('cb_as'),
                'id_bank' => $this->input->post('nama_bank'),
                'no_regis' => $this->input->post('no_regis'),
                'tgl_regis' => $tgl_regis,
                'no_srt_permohonan' => $this->input->post('no_srt_perm'),
                'tgl_srt_permohonan' => $tgl_srt_perm,
                'no_ppk' => $this->input->post('no_ppk'),
                'tgl_ppk' =>$tgl_ppk,
                'sumber_bisnis' => $this->input->post('sumber_bis'),
                'principal' => $this->input->post('nama_pri'),
                'alamat_principal' => $this->input->post('alamat_pri'),
                'no_surat' => $this->input->post('no_surat'),
                'tgl_surat' => $tgl_surat,
                'jenis_bg' => $this->input->post('jenis_bg'),
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'nilai_jaminan' => $n_jaminan,
                'nama_obligee' => $this->input->post('na_obligee'),
                'alamat_obligee' => $this->input->post('al_obligee'),
                'nama_pekerjaan' => $this->input->post('n_pekerjaan'),
                'nilai_kontrak' => $n_kontrak,
                'nilai_premi' => $n_premi,
                'premi_asuransi' => $p_asuransi,
                'premi_bank' => $p_bank,
                'potensi_komisi' => $p_komisi,
                'no_bg' => $this->input->post('no_bg'),
                'tgl_bg' => $tgl_bg,
                'ket_bg' => $this->input->post('ket_bg'),
                'bukti_bayar' => $this->input->post('bk_bayar'),
                'no_surat_tagih' => $this->input->post('no_s_tagih'),
                'tgl_surat_tagih' => $tgl_s_tagih,
                'tgl_masuk_tagih' => $tgl_m_tagih,
                'ket' => $this->input->post('keterangan')
                        );
            $data = $this->M_kredit_non_konsumtif->update($arr);
            echo json_encode($data);
        }
    
    
    /*=====  End of Bank Garansi  ======*/

    /*====================================
    =            Cash By Cash            =
    ====================================*/
    
    public function cbc()
    {

        if (!empty($this->userdata)) {
            $data['Menu'] = "Kredit Non Konsumtif";
            $data['Page'] = "Case By Case";
            $data['userdata'] = $this->userdata;
            $data['data_asuransi'] = $this->M_kredit_non_konsumtif->get_data('asuransi');
            $data['data_bank'] = $this->M_kredit_non_konsumtif->get_data('bank');
            $this->template->views('Kredit/cbc', $data);
        } else {
              redirect('Auth');
        }
    }
    
    public function json_cbc()
    {
        $data = $this->M_kredit_non_konsumtif->get_cbc();
        echo json_encode($data);
    }
    
    public function hapus_cbc()
    {
        $id = $this->input->post('id_cbc');
        $data = $this->M_kredit_non_konsumtif->hapus_cbc($id);
        if ($data) {
          echo "Sukses";
        }else{
          echo "Gagal";
        }
    }

    public function simpan_cbc()
    {
        $arr = $this->input->post();
        $arr['id_cbc'] = mt_rand(100000,999999);
        $arr['nilai_pertanggungan'] = str_replace('.', '', $arr['nilai_pertanggungan']);
        $arr['nilai_premi'] = str_replace('.', '', $arr['nilai_premi']);
        $arr['potensi_komisi'] = str_replace('.', '', $arr['potensi_komisi']);
        $arr['jumlah_tagih'] = str_replace('.', '', $arr['jumlah_tagih']);
        $arr['add_time'] = date('Y-m-d H:i:s');
        $data = $this->M_kredit_non_konsumtif->simpan_cbc($arr);
        if ($data) {
          echo "Sukses";
        }else{
          echo "Gagal";
        }
    }

    public function edit_cbc()
    {
        $id = $this->input->POST('id_cbc');
        $data = $this->M_kredit_non_konsumtif->edit_cbc($id);

        echo json_encode($data);
    }

    public function update_cbc()
    {
        $arr = $this->input->post();
        $arr['nilai_pertanggungan'] = str_replace('.', '', $arr['nilai_pertanggungan']);
        $arr['nilai_premi'] = str_replace('.', '', $arr['nilai_premi']);
        $arr['potensi_komisi'] = str_replace('.', '', $arr['potensi_komisi']);
        $arr['jumlah_tagih'] = str_replace('.', '', $arr['jumlah_tagih']);
        $data = $this->M_kredit_non_konsumtif->update_cbc($arr);
        if ($data) {
          echo "Sukses";
        }else{
          echo "Gagal";
        }
    }


    public function detail_cbc()
    {
        $id = $this->input->POST('id_cbc');
        $data = $this->M_kredit_non_konsumtif->detail_cbc($id);

        echo json_encode($data);
    }
    /*=====  End of Cash By Cash  ======*/


/*===========================================
    =            export bank garansi            =
    ===========================================*/
    public function export_bg_preview()
    {
        $data['data_bg'] = $this->M_kredit_non_konsumtif->get_bank_garansi()->result();
        $this->load->view('Kredit/laporan_bg_preview.php', $data);
    }

    public function export_bg()
    {
        $data['data_bg'] = $this->M_kredit_non_konsumtif->get_bank_garansi()->result();
        $this->load->view('Kredit/laporan_bank_garansi.php', $data);
    }
    
    /*=====  End of export bank garansi  ======*/

    
  /*===========================================
  =            export CBC            =
  ===========================================*/
    public function export_cbc_preview()
    {
        $data['data_bg'] = $this->M_kredit_non_konsumtif->get_cbc();
        $this->load->view('Kredit/laporan_cbc_preview.php', $data);
    }
    
    public function export_cbc()
    {
        $data['data_bg'] = $this->M_kredit_non_konsumtif->get_cbc();
        $this->load->view('Kredit/laporan_cbc.php', $data);
    }
  
  /*=====  End of export CBC  ======*/

    public function asum()
    {
        if (!empty($this->userdata)) {
            $data['Menu'] = "Kredit Non Konsumtif";
            $data['Page'] = "ASUM";
            $data['userdata'] = $this->userdata;
          // $data['data_asum'] = $this->M_kredit_non_konsumtif->get_data('asum');
        
            $this->template->views('Kredit/asum', $data);
        } else {
              redirect('Auth');
        }
    }

    public function json_asum()
    {
        $data = $this->M_kredit_non_konsumtif->get_data('asum');
        echo json_encode($data);
    }

    public function hapus_asum()
    {
        $id = $this->input->post('id_asum');
        $data = $this->M_kredit_non_konsumtif->hapus_asum($id);
        if ($data) {
          echo "Sukses";
        }else{
          echo "Gagal";
        }
    }

    public function simpan_asum()
    {
        $arr = $this->input->post();
        $arr['id_asum'] = mt_rand(100000,999999);
        $data = $this->M_kredit_non_konsumtif->simpan_asum($arr);
        if ($data) {
          echo "Sukses";
        }else{
          echo "Gagal";
        }
    }
    public function edit_asum()
    {
        $id = $this->input->post();
        $data = $this->M_kredit_non_konsumtif->get_data('asum',$id);

        echo json_encode($data);
    }

    public function update_asum()
    {
      $arr = $this->input->post();
      $arr['premi'] = str_replace('.', '', $arr['premi']);
      $arr['komisi'] = str_replace('.', '', $arr['komisi']);
      $data = $this->M_kredit_non_konsumtif->update_asum($arr);
      if ($data) {
        echo "Sukses";
      }else{
        echo "Gagal";
      }
    }

    public function export_asum()
    {
        $data['data_asum'] = $this->M_kredit_non_konsumtif->get_data('asum');
        $this->load->view('Kredit/laporan_asum.php', $data);
    }
}
