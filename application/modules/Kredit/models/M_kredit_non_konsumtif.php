<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kredit_non_konsumtif extends CI_Model
{
  /*****************************************************************************************************/
  /*
  /*                                      Permohonan Bank Garansi
  /*
  /*****************************************************************************************************/

    // 02-04-2020

      // cari daa permohonan bank garansi
      public function cari_data_permohonan($id_permohonan)
      {
        $this->db->select('*, ca.alamat as alamat_cabang_as');
        $this->db->from('permohonan_bank_garansi as pbg');
        $this->db->join('cabang_asuransi as ca', 'ca.id_cabang_asuransi = pbg.id_cabang_asuransi', 'left');
        $this->db->join('asuransi as a', 'a.id_asuransi = ca.id_asuransi', 'left');
        $this->db->join('cabang_bank as cb', 'cb.id_cabang_bank = pbg.id_cabang_bank', 'left');
        $this->db->join('bank as b', 'b.id_bank = cb.id_bank', 'left');
        $this->db->join('legalitas_permohonan as lp', 'lp.id_permohonan_bg = pbg.id_permohonan', 'left');
        $this->db->join('jenis_bg as j', 'j.id_jenis_bg = pbg.id_jenis_bg', 'left');
        $this->db->join('principal as p', 'p.id_principal = pbg.id_principal', 'left');
        $this->db->join('status_permohonan as sp', 'sp.id_status_permohonan = pbg.id_status_permohonan', 'left');
        $this->db->join('bank_garansi as bg', 'bg.id_bg = pbg.id_bg', 'left');
        $this->db->join('persetujuan_asuransi as pa', 'pa.id_permohonan_bg = pbg.id_permohonan', 'left');
        

        $this->db->where('pbg.id_permohonan', $id_permohonan);
        
        return $this->db->get();
      }

    // Akhir 02-04-2020

    // 01-04-2020

      // cari dokumen syarat
      public function cari_data_dokumen_syarat($id_permohonan)
      {
        $this->db->order_by('id_jenis_dokumen_persyaratan', 'desc');
        
        return $this->db->get_where('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan));
      }

      // cari dokumen khusus
      public function cari_data_dokumen_khusus($id_permohonan)
      {
        $this->db->order_by('id_jenis_dokumen_persyaratan', 'desc');
        
        return $this->db->get_where('dokumen_persyaratan', array('id_permohonan_bg' => $id_permohonan));
      }

    // Akhir 01-04-2020

    // 30-03-2020

      // menampilkan data list permohonan bank garansi
      public function semua_data_permohonan_bank_garansi()
      {
        $this->db->select('*');
        $this->db->from('permohonan_bank_garansi as pbg');
        $this->db->join('cabang_asuransi as ca', 'ca.id_cabang_asuransi = pbg.id_cabang_asuransi', 'left');
        $this->db->join('asuransi as a', 'a.id_asuransi = ca.id_asuransi', 'left');
        $this->db->join('cabang_bank as cb', 'cb.id_cabang_bank = pbg.id_cabang_bank', 'left');
        $this->db->join('bank as b', 'b.id_bank = cb.id_bank', 'left');
        $this->db->join('legalitas_permohonan as lp', 'lp.id_permohonan_bg = pbg.id_permohonan', 'left');
        $this->db->join('jenis_bg as j', 'j.id_jenis_bg = pbg.id_jenis_bg', 'left');
        $this->db->join('principal as p', 'p.id_principal = pbg.id_principal', 'left');
        $this->db->join('status_permohonan as sp', 'sp.id_status_permohonan = pbg.id_status_permohonan', 'left');
        $this->db->join('bank_garansi as bg', 'bg.id_bg = pbg.id_bg', 'left');
        
        return $this->db->get();
      }

    // Akhir 30-03-2020

    // 20-03-2020

      // ambil nomor registrasi
      public function cari_data_nomor_regis()
      {
        $this->db->from('permohonan_bank_garansi');
        $this->db->where("nomor_registrasi is not null");
        $this->db->order_by('add_time', 'desc');
        
        return $this->db->get();
      }

    // Akhir 20-03-2020

    // 22-03-2020

      // menampilkan data ubah data permohonan bank garansi
      public function tampil_data_permohonan_bg($id_permohnan)
      {
        $this->db->select('*');
        $this->db->from('permohonan_bank_garansi as pbg');
        $this->db->join('cabang_asuransi as ca', 'ca.id_cabang_asuransi = pbg.id_cabang_asuransi', 'left');
        $this->db->join('asuransi as a', 'a.id_asuransi = ca.id_asuransi', 'left');
        $this->db->join('cabang_bank as cb', 'cb.id_cabang_bank = pbg.id_cabang_bank', 'left');
        $this->db->join('bank as b', 'b.id_bank = cb.id_bank', 'left');
        $this->db->join('legalitas_permohonan as lp', 'lp.id_permohonan_bg = pbg.id_permohonan', 'left');
        $this->db->join('jenis_bg as j', 'j.id_jenis_bg = pbg.id_jenis_bg', 'left');
        $this->db->join('principal as p', 'p.id_principal = pbg.id_principal', 'left');
        
        $this->db->where('pbg.id_permohonan', $id_permohnan);
        
        return $this->db->get();
      }

    // Akhir 22-03-2020

    // 23-03-2020

      // Aksi hapus data
      public function hapus_data($tabel, $where)
      {
        $this->db->delete($tabel, $where);
      }

      // menampilkan data dokumen persyaratan
      public function get_data_dokumen_syarat($id_permohonan)
      {
        $this->db->select('d.*, j.*');
        $this->db->from('dokumen_persyaratan as d');
        $this->db->join('jenis_dok_persyaratan as j', 'j.id_jenis_dok_persyaratan = d.id_jenis_dokumen_persyaratan', 'inner');
        $this->db->where('d.id_permohonan_bg', $id_permohonan);
        $this->db->order_by('j.id_jenis_dok_persyaratan', 'asc');
       
        return $this->db->get();
      }

    // Akhir 23-03-2020

    // 17-03-2020

      public function get_data_2($tabel)
      {
        return $this->db->get($tabel);
      }

      public function cari_data($tabel, $where)
      {
        return $this->db->get_where($tabel, $where);
      }

      public function input_data($tabel, $data)
      {
        $this->db->insert($tabel, $data);
      }

      public function get_data_order($tabel, $field, $order)
      {
        $this->db->order_by($field, $order);
        
        return $this->db->get($tabel);
      }

      public function ubah_data($tabel, $data, $where)
      {
        $this->db->update($tabel, $data, $where);
        
      }

      // Master per_bank_garansi
      public function get_data_per_bank_garansi()
      {
          $this->_get_datatables_query_per_bank_garansi();

          if ($this->input->post('length') != -1) {
              $this->db->limit($this->input->post('length'), $this->input->post('start'));
              
              return $this->db->get()->result_array();
          }
      }

      var $kolom_order_per_bank_garansi = [null, 'i.nama_principal', 'p.nama_oblige', 'p.nomor_surat_permohonan', 'a.nama_asuransi', 'b.nama_bank', null, null, 's.status_permohonan'];
      var $kolom_cari_per_bank_garansi  = ['LOWER(i.nama_principal)', 'LOWER(p.nama_oblige)', 'LOWER(p.nomor_surat_permohonan)', 'LOWER(a.nama_asuransi)', 'LOWER(b.nama_bank)', 'LOWER(s.status_permohonan)'];
      var $order_per_bank_garansi       = ['p.id_permohonan' => 'asc'];

      public function _get_datatables_query_per_bank_garansi()
      {
        $this->db->select('p.id_permohonan, i.nama_principal, p.nomor_surat_permohonan, p.nama_oblige, a.nama_asuransi, b.nama_bank, s.status_permohonan, s.id_status_permohonan');
        $this->db->from('permohonan_bank_garansi as p');
        $this->db->join('principal as i', 'i.id_principal = p.id_principal', 'left');
        $this->db->join('cabang_asuransi as c', 'c.id_cabang_asuransi = p.id_cabang_asuransi', 'left');
        $this->db->join('asuransi as a', 'a.id_asuransi = c.id_asuransi', 'left');
        $this->db->join('cabang_bank as cb', 'cb.id_cabang_bank = p.id_cabang_bank', 'left');
        $this->db->join('bank as b', 'b.id_bank = cb.id_bank', 'left');
        $this->db->join('status_permohonan as s', 's.id_status_permohonan = p.id_status_permohonan', 'inner');
        
        $b = 0;
        
        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_per_bank_garansi;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_per_bank_garansi;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_per_bank_garansi)) {
            
            $order = $this->order_per_bank_garansi;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
          
      }

      public function jumlah_semua_per_bank_garansi()
      {
        $this->db->select('p.id_permohonan, i.nama_principal, i.nomor_surat_permohonan, i.nama_oblige, a.nama_asuransi, b.nama_bank, s.status_permohonan, s.id_status_permohonan');
        $this->db->from('permohonan_bank_garansi as p');
        $this->db->join('principal as i', 'i.id_principal = p.id_principal', 'left');
        $this->db->join('cabang_asuransi as c', 'c.id_cabang_asuransi = p.id_cabang_asuransi', 'left');
        $this->db->join('asuransi as a', 'a.id_asuransi = c.id_asuransi', 'left');
        $this->db->join('cabang_bank as cb', 'cb.id_cabang_bank = p.id_cabang_bank', 'left');
        $this->db->join('bank as b', 'b.id_bank = cb.id_bank', 'left');
        $this->db->join('status_permohonan as s', 's.id_status_permohonan = p.id_status_permohonan', 'inner');

        return $this->db->count_all_results();
      }

      public function jumlah_filter_per_bank_garansi()
      {
          $this->_get_datatables_query_per_bank_garansi();

          return $this->db->get()->num_rows();       
      }

    // Akhir 17-03-2020

    public function get_bank_garansi()
    {
      // $this->db->from('bank_garansi as bg');
      // $this->db->join('asuransi as a', 'bg.id_asuransi = a.id_asuransi', 'left');
      // $this->db->join('bank as b', 'bg.id_bank = b.id_bank');
      // $this->db->join('cabang_asuransi as ca', 'bg.id_cabang_asuransi = ca.id_cabang_asuransi', 'right');
      // $this->db->order_by('tgl_ppk', 'desc');
      // $query = $this->db->get();

        $query = $this->db->query("SELECT * FROM bank_garansi as bg 
          JOIN asuransi as a ON bg.id_asuransi = a.id_asuransi 
          JOIN bank as b ON bg.id_bank = b.id_bank 
          JOIN cabang_asuransi as ca ON bg.id_cabang_asuransi = ca.id_cabang_asuransi ORDER BY tgl_ppk");
    
        return $query;
    }

    public function get_data($table,$where=null)
    {
      if ($where != null) {
        $this->db->where($where);
      }
      return $this->db->get($table)->result();
    }

    public function get($table,$where=null,$join=null)
    {
      $this->db->from($table);

      if ($join != null) {
        foreach ($join as $key) {
          $this->db->join($key["table"], $table.'.'.$key["on"].' = '.$key["table"].'.'.$key["on"]);
          // $this->db->query('join '.$key["table"].' on '.$table.'.'.$key["on"].' = '.$key["table"].'.'.$key["on"]);
        }
      }

      if ($where != null) {
        $this->db->where($where);
      }
      $query = $this->db->get();
      
      return $query->result();
    }

    public function get_jenis_bg()
    {
        return $this->db->get('jenis_bg')->result();
    }

    public function hapus($where,$table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function simpan($arr)
    {
      return $this->db->insert('bank_garansi', $arr);
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('bank_garansi');

        $this->db->where('id_bg', $id);
        $query = $this->db->get();
        if ($this->db->affected_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = array(
                      'id_bg' => $row->id_bg,
                      'id_asuransi' => $row->id_asuransi,
                      // 'nama_asuransi' => $row->nama_asuransi,
                      'id_cabang_asuransi' => $row->id_cabang_asuransi,
                      // 'nama_cabang' => $row->nama_cabang,
                      'no_regis' => $row->no_regis,
                      'tgl_regis' => $row->tgl_regis,
                      'no_srt_permohonan' => $row->no_srt_permohonan,
                      'tgl_srt_permohonan' => $row->tgl_srt_permohonan,
                      'no_ppk' => $row->no_ppk,
                      'tgl_ppk' => $row->tgl_ppk,
                      'sumber_bisnis' => $row->sumber_bisnis,
                      'principal' => $row->principal,
                      'alamat_principal' => $row->alamat_principal,
                      'no_surat' => $row->no_surat,
                      'tgl_surat' => $row->tgl_surat,
                      'jenis_bg' => $row->jenis_bg,
                      'tgl_awal' => $row->tgl_awal,
                      'tgl_akhir' => $row->tgl_akhir,
                      'nilai_jaminan' => $row->nilai_jaminan,
                      'nama_obligee' => $row->nama_obligee,
                      'alamat_obligee' => $row->alamat_obligee,
                      'nama_pekerjaan' => $row->nama_pekerjaan,
                      'nilai_kontrak' => $row->nilai_kontrak,
                      'nilai_premi' => $row->nilai_premi,
                      'premi_asuransi' => $row->premi_asuransi,
                      'premi_bank' => $row->premi_bank,
                      'potensi_komisi' => $row->potensi_komisi,
                      'no_bg' => $row->no_bg,
                      'tgl_bg' => $row->tgl_bg,
                      'ket_bg' => $row->ket_bg,
                      'bukti_bayar' => $row->bukti_bayar,
                      'no_surat_tagih' => $row->no_surat_tagih,
                      'tgl_surat_tagih' => $row->tgl_surat_tagih,
                      'tgl_masuk_tagih' => $row->tgl_masuk_tagih,
                      'ket' => $row->ket,

                );
            }
        }
        return $data;
    }
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('bank_garansi as bg');
        $this->db->where('id_bg', $id);
        $this->db->join('bank as b', 'bg.id_bank = b.id_bank');
        $this->db->join('asuransi as a', 'bg.id_asuransi = a.id_asuransi');
        $this->db->join('cabang_asuransi as cb', 'bg.id_cabang_asuransi = cb.id_cabang_asuransi');
        $query = $this->db->get();
        if ($this->db->affected_rows() > 0) {
            foreach ($query->result() as $row) {
                $date1=date_create($row->tgl_awal);
                $date2=date_create($row->tgl_akhir);
                $diff=date_diff($date1, $date2)->format("%a");

              // $day = date_diff($row->tgl_ppk,$row->jangka_waktu,absolute)->format('%R%d');
                $data = array(
                      'id_bg' => $row->id_bg,
                      'nama_asuransi' => $row->nama_asuransi,
                      'nama_cabang' => $row->nama_cabang,
                      'nama_bank' => $row->nama_bank,
                      'no_regis' => $row->no_regis,
                      'tgl_regis' => $row->tgl_regis,
                      'no_srt_permohonan' => $row->no_srt_permohonan,
                      'tgl_srt_permohonan' => $row->tgl_srt_permohonan,
                      'no_ppk' => $row->no_ppk,
                      'tgl_ppk' => $row->tgl_ppk,
                      'sumber_bisnis' => $row->sumber_bisnis,
                      'principal' => $row->principal,
                      'alamat_principal' => $row->alamat_principal,
                      'no_surat' => $row->no_surat,
                      'tgl_surat' => $row->tgl_surat,
                      'jenis_bg' => $row->jenis_bg,
                      'tgl_awal'=> $row->tgl_awal,
                      'tgl_akhir'=> $row->tgl_akhir,
                      'hari' => ' ('.($diff + 1).' hari)' ,
                      'nilai_kontrak' => $row->nilai_kontrak,
                      'nilai_jaminan' => $row->nilai_jaminan,
                      'nama_obligee' => $row->nama_obligee,
                      'alamat_obligee' => $row->alamat_obligee,
                      'nama_pekerjaan' => $row->nama_pekerjaan,
                      'nilai_premi' => $row->nilai_premi,
                      'premi_asuransi' => $row->premi_asuransi,
                      'premi_bank' => $row->premi_bank,
                      'potensi_komisi' => $row->potensi_komisi,
                      'no_bg' => $row->no_bg,
                      'tgl_bg' => $row->tgl_bg,
                      'ket_bg' => $row->ket_bg,
                      'bukti_bayar' => $row->bukti_bayar,
                      'no_surat_tagih' => $row->no_surat_tagih,
                      'tgl_surat_tagih' => $row->tgl_surat_tagih,
                      'tgl_masuk_tagih' => $row->tgl_masuk_tagih,
                      'ket' => $row->ket,

                );
            }
        }
    
    
        return $data;
    }

    public function update($arr)
    {
        $this->db->where('id_bg', $arr['id_bg']);
        $this->db->query("set DateStyle='ISO, DMY' ");
        return $this->db->update('bank_garansi', $arr);
    }

    public function update_permohonan($arr)
    {
        $this->db->where('id_permohonan', $arr['id_permohonan']);
        return $this->db->update('permohonan_bank_garansi', $arr);
    }

/*====================================
=            Cash By Cash            =
====================================*/

    public function get_cbc()
    {
      $this->db->from('cbc');
      $this->db->join('asuransi as a', 'cbc.id_asuransi = a.id_asuransi');
      $this->db->join('bank as b', 'cbc.id_bank = b.id_bank');
      $this->db->order_by('tgl_tagih_sm', 'desc');
      return $this->db->get()->result();
    }

    public function hapus_cbc($id)
    {
        $this->db->where('id_cbc', $id);
        return $this->db->delete('cbc');
    }

    public function simpan_cbc($arr)
    {
        $this->db->query("set DateStyle='DMY' ");
        return $this->db->insert('cbc', $arr);
    }

    public function edit_cbc($id)
    {
        $this->db->from('cbc as c');
        $this->db->join('asuransi as a', 'c.id_asuransi = a.id_asuransi');
        $this->db->join('bank as b', 'c.id_bank = b.id_bank');
        $this->db->where('id_cbc', $id);
        return $this->db->get()->row();
    }

    public function update_cbc($arr)
    {
        $this->db->where('id_cbc', $arr['id_cbc']);
        return $this->db->update('cbc', $arr);
    }

/*=====  End of Cash By Cash  ======*/

    
    /*============================
    =            ASUM            =
    ============================*/
                                        
    public function simpan_asum($arr)
    {
      return $this->db->insert('asum', $arr);
    }

    public function hapus_asum($id)
    {
        $this->db->where('id_asum', $id);
        return $this->db->delete('asum');
    }
    public function update_asum($arr)
    {
        $this->db->where('id_asum', $arr['id_asum']);
        $this->db->query("set DateStyle='DMY' ");
        return $this->db->update('asum', $arr);
    }
}
    /*=====  End of ASUM  ======*/

/* End of file  */
/* Location: ./application/models/ */
