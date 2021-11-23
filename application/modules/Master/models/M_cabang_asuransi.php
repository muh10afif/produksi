<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang_asuransi extends CI_Model {

	public function get_cabang_asuransi()
	{
		$this->db->select('c.*,a.*,a.nama_asuransi as asuransi');
		$this->db->from('cabang_asuransi as c ');
		$this->db->join('asuransi as a', 'c.id_asuransi = a.id_asuransi', 'inner');
		return $this->db->get()->result();
	}

  public function get_data($table,$where=null)
  {
    if ($where != null) {
      $this->db->where($where);
    }
    return $this->db->get($table)->result();
  }

	public function get_asuransi()
	{
		return $this->db->get('asuransi')->result();
	}
	
	public function hapus($id)
	{
		$this->db->where('id_cabang_asuransi', $id);
		return $this->db->delete('cabang_asuransi');
	}

	public function simpan($arr)
	{
		return $this->db->insert('cabang_asuransi', $arr);
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('cabang_asuransi');
	    $this->db->where('id_cabang_asuransi', $id);
	    $query = $this->db->get();
	    if ($this->db->affected_rows() > 0) {
	      foreach ($query->result() as $row) {
	        $data = array(
	                  'id_cabang_asuransi' => $row->id_cabang_asuransi,
	                  'id_asuransi' => $row->id_asuransi,
	                  'nama_cabang' => $row->nama_cabang,
	                  'alamat' => $row->alamat,
	                  'telfon' => $row->telfon,
	                  'email' => $row->email,
	        );
      }
	return $data;
	}
	}

	public function update($arr)
	{
		$this->db->where('id_cabang_asuransi',$arr['id_cabang_asuransi']);
		return $this->db->update('cabang_asuransi',$arr);
	}


}

/* End of file  */
/* Location: ./application/models/ */