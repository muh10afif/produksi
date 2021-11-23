<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_principal extends CI_Model {

  public function simpan($data)
  {
    return $this->db->insert('principal', $data);
  }
  
  public function get_data($table,$where=null)
  {
    if ($where != null) {
      $this->db->where($where);
    }
    return $this->db->get($table)->result();
  }

  public function update($arr)
  {
    $this->db->where('id_principal',$arr['id_principal']);
    return $this->db->update('principal',$arr);
  }

  public function hapus($id)
  {
    $this->db->where('id_principal', $id);
    return $this->db->delete('principal');
  }

}

/* End of file M_principal.php */
/* Location: ./application/modules/Master/models/M_principal.php */