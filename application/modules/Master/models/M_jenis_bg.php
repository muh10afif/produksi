<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_bg extends CI_Model {

	public function get_jenis_bg()
	{
		return $this->db->get('jenis_bg')->result();
	}

	public function count_jenis_bg()
	{
		return $this->db->get('nasabah')->num_rows();
	}

	public function hapus($id)
	{
		$this->db->where('id_jenis_bg', $id);
		return $this->db->delete('jenis_bg');
	}

	public function simpan($arr)
	{
		return $this->db->insert('jenis_bg', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('jenis_bg');
	    $this->db->where('id_jenis_bg', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	                  'id_jenis_bg' => $row->id_jenis_bg,
	                'jenis_bg' => $row->jenis_bg
	        );
      }
	}
	return $data;
	}

	public function update($arr)
	{
		$this->db->where('id_jenis_bg',$arr['id_jenis_bg']);
		return $this->db->update('jenis_bg',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */