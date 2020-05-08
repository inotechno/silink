<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Daftar extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('KependudukanModel');
		}
	
		public function index()
		{
			$this->load->view('daftar');
		}

		public function save_penduduk()
		{
			$config['upload_path'] = './assets/images/penduduk/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('nik');
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
			} else {
				$foto = '';
			}

			$data = array(
	 			'nik' 				=> $this->input->post('nik'),
	 			'no_kk' 			=> $this->input->post('no_kk'),
	 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
	 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
	 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
	 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
	 			'agama' 			=> $this->input->post('agama'),
	 			'pendidikan' 		=> $this->input->post('pendidikan'),
	 			'pekerjaan' 		=> $this->input->post('pekerjaan'),
	 			'status_keluarga'	=> $this->input->post('status_keluarga'),
	 			'status' 			=> $this->input->post('status'),
	 			'status_perkawinan' => $this->input->post('status_perkawinan'),
	 			'foto' 				=> $foto
				 );

			$data = $this->KependudukanModel->simpan_penduduk($data);
			echo json_encode($data);

		}
	
	}
	
	/* End of file Daftar.php */
	/* Location: ./application/controllers/Daftar.php */
?>