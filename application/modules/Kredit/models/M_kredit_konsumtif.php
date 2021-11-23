<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kredit_konsumtif extends CI_Model {

	public function get_tr_cac()
	{
		$this->db->select('*');
		$this->db->from('tr_cac as t ');
		$this->db->join('asuransi as a', 't.id_asuransi = a.id_asuransi', 'LEFT');
		$this->db->join('cabang_asuransi as ca', 't.id_cabang_asuransi = ca.id_cabang_asuransi', 'LEFT');
		$this->db->join('bank as b', 't.id_bank = b.id_bank', 'LEFT');
		$this->db->order_by('t.waktu', 'desc');
		return $this->db->get()->result();
	}

  public function get_data($table,$where=null)
  {
    if ($where != null) {
      $this->db->where($where);
    }
    return $this->db->get($table)->result();
  }


	public function get_cabang_by_id($id)
	{	
		$this->db->select('*');
		$this->db->from('cabang_asuransi as cb');
		$this->db->where('cb.id_asuransi', $id);
		$data = $this->db->get()->result();
	
	return $data;

	}

	public function hapus($id)
	{
		$this->db->where('id_tr_cac', $id);
		return $this->db->delete('tr_cac');
	}

	public function simpan($arr)
	{
		return $this->db->insert('tr_cac', $arr);
	}

	public function update($arr)
	{
		$this->db->where('id_tr_cac',$arr['id_tr_cac']);
		return $this->db->update('tr_cac',$arr);
	}

	public function get_trcac_ex($data)
	{	
		$id_cabang_asuransi = $data['id_cabang_asuransi'];
		// var_dump($id_cabang_asuransi);
		// exit();
		$id_bank = $data['id_bank'] ;
		$id_bank_tot = count($data['id_bank']);	
		$id_cab_tot = count($data['id_cabang_asuransi']);

		$start = date('Y-m-d', strtotime($data['start']));
		$end = date('Y-m-d', strtotime($data['end']));
		// var_dump($id_cab_tot);
		// exit();
		$this->db->distinct('tr.id_cabang_asuransi');
		$this->db->select('tr.id_cabang_asuransi,cb.nama_cabang,b.nama_bank');
		$this->db->from('tr_cac as tr');
		$this->db->join('asuransi as a', 'tr.id_asuransi = a.id_asuransi');
		$this->db->join('cabang_asuransi as cb', 'tr.id_cabang_asuransi = cb.id_cabang_asuransi');
		$this->db->join('bank as b', 'tr.id_bank = b.id_bank', 'left');
		$this->db->where('waktu >=', $start);
		$this->db->where('waktu <=', $end);
		if (!empty($data['id_asuransi'])) {
			$this->db->where('tr.id_asuransi', $data['id_asuransi']);
		}else{"";}
		if ($id_cab_tot > 0) {
		$this->db->where_in('tr.id_cabang_asuransi',$data['id_cabang_asuransi']);
		$this->db->where_in('tr.id_bank',$data['id_bank']);
			}
		else{
			"";
		}
		return $this->db->get()->result();

	}

	public function get_trcac_h_ex($data)
	{	$id_cabang_asuransi = $data['id_cabang_asuransi'];
		// var_dump($id_cabang_asuransi);
		// exit();
		$id_bank = $data['id_bank'] ;
		$id_bank_tot = count($data['id_bank']);	
		$id_cab_tot = count($data['id_cabang_asuransi']);
		// var_dump($id_cab_tot);
		// exit();

		$this->db->select('tr.id_cabang_asuransi,cb.nama_cabang,b.nama_bank,tr.plafond,tr.noa,tr.premi,tr.waktu,tr.id_asuransi,tr.id_bank');
		$this->db->from('tr_cac as tr');
		$this->db->join('asuransi as a', 'tr.id_asuransi = a.id_asuransi');
		$this->db->join('cabang_asuransi as cb', 'tr.id_cabang_asuransi = cb.id_cabang_asuransi');
		$this->db->join('bank as b', 'tr.id_bank = b.id_bank', 'left');
		$this->db->where('tr.id_asuransi', $data['id_asuransi']);

		if (isset($data['start'])) {
			$start = date('Y-m-d', strtotime($data['start']));
			$this->db->where('waktu >=', $start);
			$end = date('Y-m-d', strtotime($data['end']));
			$this->db->where('waktu <=', $end);
		}
		
		if ($id_cab_tot > 0) {
		$this->db->where_in('tr.id_cabang_asuransi',$data['id_cabang_asuransi']);
		$this->db->where_in('tr.id_bank',$data['id_bank']);
		
			}

		else{
			"";
		}
		

		return $this->db->get()->result();

	}
	public function get_by_cab($id,$p)
	{
		$this->db->select('*');
		$this->db->from('tr_cac');
		$this->db->where('id_cabang_asuransi', $id);
		$this->db->where('waktu', $p);

		return $this->db->get()->result();
	}

}

/* End of file  */
/* Location: ./application/models/ */