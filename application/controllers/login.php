<?php

class Login extends CI_controller{

	function __construct();
	$this->load->model('login_model');

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$where = array(
			'nim' => $nim,
			'password' => md5($password);

			$cek = $this->login_model->cek_login("akun", $where)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("home-mahasiswa"));
			}else{
				echo "Username dan password tidak cocok";
			}
		);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('masuk'));
	}


}