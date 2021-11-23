<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_kredit extends CI_Model {

	public function get_jenis_kredit()
	{
		return $this->db->get('jenis_kredit')->result();
	}
	
	public function hapus($id)
	{
		$this->db->where('id_jenis_kredit', $id);
		return $this->db->delete('jenis_kredit');
	}

	public function simpan($arr)
	{
		return $this->db->insert('jenis_kredit', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('jenis_kredit');
	    $this->db->where('id_jenis_kredit', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	                  'id_jenis_kredit' => $row->id_jenis_kredit,
	                'jenis_kredit' => $row->jenis_kredit
	        );
      }
	}
	return $data;
	}

	public function update($arr)
	{
		$this->db->where('id_jenis_kredit',$arr['id_jenis_kredit']);
		return $this->db->update('jenis_kredit',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */