<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function login($username) {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $username);

        $data = $this->db->get();

        if ($data->num_rows() == 1) {
            return $data->row();
        } else {
            return false;
        }
    }

    public function register($data) {
      return  $this->db->insert('pengguna', $data);
      
    }
  
  public function get_data($table,$where=null)
  {
    if ($where != null) {
      $this->db->where($where);
    }
    return $this->db->get($table)->result();
  }

  public function get_join($tab1,$tab2,$on,$where=null)
  {
    $this->db->select('*');
    $this->db->from($tab1);
    $this->db->join($tab2, $tab2.'.'.$on.' = '.$tab1.'.'.$on);
    if ($where != null) {
      $this->db->where($where);
    }
    $data = $this->db->get();
    return $data->result();
  }

  public function get_pengguna_byid($id)
  {   
    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->where('id_pengguna', $id);
    $query = $this->db->get();
    if ($this->db->affected_rows() > 0) {
      foreach ($query->result() as $row) {
        $data = array(
                'id_pengguna' => $row->id_pengguna,
                'nama_lengkap' => $row->nama_lengkap,
                'username' => $row->username,
                'password' => $row->password,
                'level' => $row->level,
                'status' => $row->status
        );
      }
    }

    return $data;
  }

  public function update($data,$id,$field)
  {
    $this->db->where($field,$id);
    $query =  $this->db->update('pengguna', $data);
    return $query;

  }

  public function hapus($id)
  { 
    $this->db->where('id_pengguna',$id);
   return  $this->db->delete('pengguna');


  }
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */