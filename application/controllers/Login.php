<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			redirect(base_url($this->session->userdata('link').'/Dashboard'), 'refresh');
		}
		$this->load->view('login');
	}

	public function ceklogin()
	{
		$username = $this->input->post('username'); 
		$password = md5($this->input->post('password'));
		$cek = $this->LoginModel->data_login(
			array('username' => $username),
			array('password' => $password));
		if ($cek != FALSE) {
			foreach ($cek as $ck) {
				$data_session = array(
				'username'		=> $username,
				'nama_lengkap' 	=> $ck->nama_lengkap,
				'id'			=> $ck->id,
				'level'			=> $ck->id_level,
				'foto'			=> $ck->foto,
				'email'			=> $ck->email,
				'nama_akses'	=> $ck->nama_akses,
				'link'			=> $ck->link,
				'status' 		=> "login"
			);
			

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('sukses', 'Anda Berhasil Masuk Dengan Level '. $ck->nama_akses);
			helper_log('login', 'Melakukan Login');
			redirect(base_url($ck->link.'/Dashboard'),'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Username Atau Password Salah');
			redirect(base_url('Login'));
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */