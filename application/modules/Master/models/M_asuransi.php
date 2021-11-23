<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_asuransi extends CI_Model {

	public function get_asuransi()
	{
		return $this->db->get('asuransi')->result();
	}

	public function count_asuransi()
	{
		return $this->db->get('nasabah')->num_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id_asuransi', $id);
		return $this->db->delete('asuransi');
	}

	public function simpan($arr)
	{
		return $this->db->insert('asuransi', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('asuransi');
	    $this->db->where('id_asuransi', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	                  'id_asuransi' => $row->id_asuransi,
	                'nama_asuransi' => $row->nama_asuransi
	        );
      }
	}
	return $data;
	}

	public function update($arr)
	{
		$this->db->where('id_asuransi',$arr['id_asuransi']);
		return $this->db->update('asuransi',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */