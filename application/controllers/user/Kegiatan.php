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
            $this->load->view('user/kegiatan');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
            $this->load->view('partials/services/pemuda/kegiatan');
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

        public function add_kegiatan()
        {
        	$data['title'] 			= $this->input->post('title');
        	$data['start_event'] 	= $this->input->post('start');
        	$data['end_event'] 		= $this->input->post('end');
        	$data['warna'] 			= $this->input->post('color');

        	$result = $this->KegiatanModel->tambah_kegiatan($data);
        	echo json_encode($result);
        }

        public function update_kegiatan()
        {
        	$id_kegiatan = $this->input->post('id');
        	$data['title'] = $this->input->post('title');
        	$data['start_event'] = $this->input->post('start');
        	$data['end_event'] = $this->input->post('end');
        	$data['warna'] = $this->input->post('color');

        	$result = $this->KegiatanModel->ubah_kegiatan($id_kegiatan, $data);
        	echo json_encode($result);
        }

        public function delete_kegiatan()
        {
        	$id_kegiatan = $this->input->post('id');

        	$result = $this->KegiatanModel->hapus_kegiatan($id_kegiatan);
        	echo json_encode($result);
        }
	
	}
	
	/* End of file Kegiatan.php */
	/* Location: ./application/controllers/pemuda/Kegiatan.php */
 ?>