<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status')!='login') {
				redirect('login','refresh');
			}
			$this->load->model('KepemudaanModel');
		}

		public function index()
		{
			$this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('warga/profil');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/warga/profil');
		}

	}
	
	/* End of file Profil.php */
	/* Location: ./application/controllers/warga/Profil.php */
?>