<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('status')!='login') {
                redirect('login','refresh');
            }

            $this->load->model('DashboardModel');
        }
        public function index()
        {
            $this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
            $this->load->view('partials/services/Dashboard');
        }

        public function get_jumlah()
        {
            $penduduk = $this->DashboardModel->get_jumlah_penduduk();
            $keluarga = $this->DashboardModel->get_jumlah_keluarga();
            $pemuda = $this->DashboardModel->get_jumlah_pemuda();
            $data['pemuda'] = $pemuda->total_pemuda;
            $data['penduduk'] = $penduduk->total_penduduk;
            $data['keluarga'] = $keluarga->total_keluarga;
            echo json_encode($data);
        }
    
    }
    
    /* End of file Dashboard.php */
    /* Location: ./application/controllers/admin/Dashboard.php */
 ?>