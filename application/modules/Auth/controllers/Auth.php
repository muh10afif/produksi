<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('Template');
    $this->load->model('M_auth');
  }

  public function index(){
    $session = $this->session->userdata('status');
    if ($session == '') {
      $this->load->view('login');
    } else {
      redirect('Dashboard');
    }
  }

  public function login() {
    $this->load->model('M_auth');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if ($this->form_validation->run() == TRUE) {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);
      $data = $this->M_auth->login($username);
      if (password_verify($password,$data->password) AND $data->id_level != '3') {
        $session = [
          'userdata'  => $data,
          'status'    => "Loged in",
          'pengguna'  => $data->id_pengguna
        ];
        $this->session->set_userdata($session);
        redirect('Dashboard');
      }
      elseif (password_verify($password,$data->password) AND $data->id_level == '3') {
          $this->session->set_flashdata('error_msg', '<div class="alert  alert-danger" role="alert">
         <span class="alert-icon-wrap"></span> Maaf Anda Tidak Memiliki Hak Akses
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
         </button>
      </div>');
          redirect('Auth','refresh');
      }else {
          $this->session->set_flashdata('error_msg', '<div class="alert  alert-danger" role="alert">
         <span class="alert-icon-wrap"></span> Username/Password yang anda masukan salah
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
         </button>
      </div>');
          redirect('Auth','refresh');
      } 
    }else{
      $this->session->set_flashdata('error_msg', validation_errors());
      redirect('Auth');
    }
  }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Auth');
    }

    public function data_pengguna()
    {
      if (!empty($this->userdata)) {
     
      $data['Menu']      = "Registrasi";
      $data['Page']      = "User";
      $data['userdata'] = $this->userdata;

      $this->template->views('user_list',$data);
      }else
      {
        redirect('Auth','refresh');
      }    
    }

    public function json($table)
    {
      $post = $this->input->post();
      $data = $this->M_auth->get_data($table,$post);
      echo json_encode($data);
    }

    public function json_join()
    {
      $data = $this->M_auth->get_join('pengguna','level','id_level');
        echo json_encode($data);
    }

    public function register_proses()
    { 
      $data = $this->input->post();
      $data['id_pengguna'] = mt_rand(100000, 999999);
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $data['add_time'] = date('Y-m-d H:i:s');
      $id = $this->M_auth->register($data);
      echo json_encode($id);

  }

  public function edit_pengguna()
  {
    $id = $this->input->GET('id_pengguna');
    $data = $this->M_auth->get_pengguna_byid($id);

    echo json_encode($data);
    
  }

  public function hapus_pengguna()
  {
    $id= $this->input->post('id_pengguna');
    $data = $this->M_auth->hapus($id);
    if ($data) {
      echo "Sukses";
    }

  }

  public function update_pengguna()
  {
    $post = $this->input->post();
    $id = $this->input->post('id_pengguna');
    $post['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $data = $this->M_auth->update($post,$id,'id_pengguna');

    echo json_encode($id);
  }

}

/* End of file  */
/* Location: ./application/controllers/ */