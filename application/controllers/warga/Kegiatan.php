<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Kegiatan extends CI_Controller {
	
		public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('status')!='login') {
                redirect('login','refresh');
            }

            $this->load->model('KegiatanModel');
        }
        public function index()
        {
            $this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('warga/kegiatan');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
            $this->load->view('partials/services/warga/kegiatan');
        }

        public function daftar_kegiatan()
        {
        	$data = array();
        	$result = $this->KegiatanModel->daftar_kegiatan();
        	foreach ($result as $dt) {
        		$data[] = array(
        			'id' => $dt->id_kegiatan,
        			'title' => $dt->title,
        			'start' => $dt->start_event,
        			'end' => $dt->end_event,
        			'color' => $dt->warna,
        			 );
        	}

        	echo json_encode($data);
        }
	}
	
	/* End of file Kegiatan.php */
	/* Location: ./application/controllers/pemuda/Kegiatan.php */
 ?>