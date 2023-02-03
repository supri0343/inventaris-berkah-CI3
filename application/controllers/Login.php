<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->login) redirect('dashboard');
		$this->load->model('M_users', 'm_users');
	}

	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$get_user = $this->m_users->lihat_username($this->input->post('username'));
		if($get_user){
			if($get_user->password == sha1($this->input->post('password'))){
				
				$role ;
				if($get_user->role == 1){
					$role = "admin";
				}else if($get_user->role == 2){
					$role = "owner";
				}

				$session = [
					'kode' => $get_user->kode,
					'nama' => $get_user->nama,
					'username' => $get_user->username,
					'password' => $get_user->password,
					'role' => $role,
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

}
