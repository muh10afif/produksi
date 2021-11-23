<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {

  // 30-03-2020

    // cari data
    public function cari_data($tabel, $where)
    {
      return $this->db->get_where($tabel, $where);
    }

    // get data
    public function get_data($tabel)
    {
      return $this->db->get($tabel);
    }

  // AKhir 30-03-2020

  // 31-03-2020

    // mencari total rekap alur bank garansi
    public function total_alur_bg($tgl_awal, $tgl_akhir)
    {
      $bln_periode = "and to_char(p.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'";

      $this->db->select("s.status_permohonan, s.id_status_permohonan, COALESCE( (SELECT count(p.id_permohonan) as tot_alur FROM permohonan_bank_garansi as p WHERE p.id_status_permohonan = s.id_status_permohonan $bln_periode) ,0) as jml_rekap_alur");
      $this->db->from('status_permohonan as s');
      
      $query = $this->db->get();

      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    // mencari total nilai kontrak 
    public function total_nilai_kontrak($bulan, $tgl_awal, $tgl_akhir)
    {
      $this->db->select('COALESCE( sum(nilai_kontrak), 0) AS jml_nilai_kontrak');
      $this->db->from('permohonan_bank_garansi');
      $this->db->where("to_char(tgl_registrasi, 'YYYY-MM') = '$bulan'");

      if ($tgl_awal != '' && $tgl_akhir != '') {
        $this->db->where("to_char(tgl_registrasi, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      }
      
      return $this->db->get();
    }

    // mencari total nilai jaminan 
    public function total_nilai_jaminan($bulan, $tgl_awal, $tgl_akhir)
    {
      $this->db->select('COALESCE( sum(nilai_jaminan), 0) AS jml_nilai_jaminan');
      $this->db->from('permohonan_bank_garansi');
      $this->db->where("to_char(tgl_registrasi, 'YYYY-MM') = '$bulan'");

      if ($tgl_awal != '' && $tgl_akhir != '') {
        $this->db->where("to_char(tgl_registrasi, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      }
      
      return $this->db->get();
    }

    // mencari total nilai jaminan 
    public function total_nilai_komisi($bulan, $tgl_awal, $tgl_akhir)
    {
      $this->db->select('COALESCE( sum(komisi_dibayar), 0) AS jml_nilai_komisi');
      $this->db->from('bayar_komisi');
      $this->db->where("to_char(tgl_bayar, 'YYYY-MM') = '$bulan'");

      if ($tgl_awal != '' && $tgl_akhir != '') {
        $this->db->where("to_char(tgl_bayar, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      }
      
      return $this->db->get();
    }

    // mecari jumlah status permohonan
    public function cari_data_jml_status($tabel, $id_sp, $tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_status_permohonan', $id_sp);
        
        if ($tgl_awal != '' && $tgl_akhir != '') {
          $this->db->where("to_char(add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        return $this->db->get();
    }

  // Akhihr 31-03-2020

    public function get_total_nasabah() {
     $this->db->select('*');
     $this->db->from('nasabah as n');
     $this->db->join('detail_nasabah as dn', 'n.id_nasabah = dn.id_nasabah', 'left');
     $this->db->where('status', '0');

     return $this->db->get()->num_rows();
    }

     public function get_total_asuransi() {
     return $this->db->get('asuransi')->num_rows();
    }

     public function get_total_topup() {
      $this->db->select('*');
     $this->db->from('topup as t');
     $this->db->join('detail_nasabah as dn', 't.id_detail_nasabah = dn.id_detail_nasabah', 'inner');
     $this->db->join('nasabah as n', 'n.id_nasabah = dn.id_nasabah', 'inner');
     $this->db->where('t.status', '0');

     return $this->db->get()->num_rows();
    }

     public function get_total_topup_disetujui() {
      $this->db->select('*');
     $this->db->from('topup as t');
     $this->db->join('detail_nasabah as dn', 't.id_detail_nasabah = dn.id_detail_nasabah', 'inner');
     $this->db->join('nasabah as n', 'n.id_nasabah = dn.id_nasabah', 'inner');
     $this->db->where('t.status', '1');

     return $this->db->get()->num_rows();
    }

     public function get_total_topup_ditolak() {
      $this->db->select('*');
     $this->db->from('topup as t');
     $this->db->join('detail_nasabah as dn', 't.id_detail_nasabah = dn.id_detail_nasabah', 'inner');
     $this->db->join('nasabah as n', 'n.id_nasabah = dn.id_nasabah', 'inner');
     $this->db->where('t.status', '2');

     return $this->db->get()->num_rows();
    }

    public function get_total_kredit_ditolak()
    {
       $this->db->select('*');
     $this->db->from('nasabah as n');
     $this->db->join('detail_nasabah as dn', 'n.id_nasabah = dn.id_nasabah', 'inner');
     $this->db->where('status', '2');

      return $this->db->get()->num_rows();
    }

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */
 