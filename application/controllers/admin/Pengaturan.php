<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pengaturan extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status')!='login') {
				redirect('login','refresh');
			}
			$this->load->model('PengaturanModel');
		}

		public function index()
		{
			$this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('admin/pengaturan');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/pengaturan');
		}

		public function lihat_data()
		{
			$id = 1;
			$data = $this->PengaturanModel->view_data($id);
			
			echo json_encode($data);
		}

		public function update_pengaturan()
		{
			$id = 1;
			$data['nama_lingkungan'] = $this->input->post('nama_lingkungan');	
			$data['alamat'] = $this->input->post('alamat');	
			$data['rt'] = $this->input->post('rt');	
			$data['rw'] = $this->input->post('rw');	
			$data['prov'] = $this->input->post('prov');	
			$data['kota'] = $this->input->post('kota');	
			$data['kec'] = $this->input->post('kec');	
			$data['kel'] = $this->input->post('kel');	
			$data['id_rt'] = $this->input->post('id_rt');

			$result = $this->PengaturanModel->ubah_pengaturan($id, $data);
			echo json_encode($result);
		}
	
	}
	
	/* End of file Pengaturan.php */
	/* Location: ./application/controllers/admin/Pengaturan.php */
 ?>