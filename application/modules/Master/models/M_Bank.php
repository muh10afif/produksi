<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends CI_Model {

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
		$this->db->where('id_bank', $id);
		return $this->db->delete('bank');
	}

	public function simpan($arr)
	{
		return $this->db->insert('bank', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('bank');
	    $this->db->where('id_bank', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	                  'id_bank' => $row->id_bank,
	                'nama_bank' => $row->nama_bank
	        );
      }
	}
	return $data;
	}

	public function update($arr)
	{
		$this->db->where('id_bank',$arr['id_bank']);
		return $this->db->update('bank',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */