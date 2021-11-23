<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang_bank extends CI_Model {

	public function get_cabang_bank()
	{
		$this->db->select('*');
		$this->db->from('cabang_bank');
		$this->db->join('bank', 'bank.id_bank = cabang_bank.id_bank');

		return $this->db->get()->result();
	}
	public function get_bank()
	{
		return $this->db->get('bank')->result();
	}
	public function count_bank()
	{
		return $this->db->get('nasabah')->num_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id_cabang_bank', $id);
		return $this->db->delete('cabang_bank');
	}

	public function simpan($arr)
	{
		return $this->db->insert('cabang_bank', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('cabang_bank');
	    $this->db->where('id_cabang_bank', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	        		'id_cabang_bank' => $row->id_cabang_bank,
	                'bank' => $row->id_bank,
	                'cabang_bank' => $row->cabang_bank
	        );
      }
	}
	return $data;
	}

	public function update($arr)
	{
		$this->db->where('id_cabang_bank',$arr['id_cabang_bank']);
		return $this->db->update('cabang_bank',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */