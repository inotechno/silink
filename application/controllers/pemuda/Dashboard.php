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
            $inventaris = $this->DashboardModel->get_jumlah_inventaris();
            $data['pemuda'] = $pemuda->total_pemuda;
            $data['penduduk'] = $penduduk->total_penduduk;
            $data['keluarga'] = $keluarga->total_keluarga;
            $data['inventaris'] = $inventaris->total_barang;
            $data['pria'] = $penduduk->pria;
            $data['wanita'] = $penduduk->wanita;
            $data['sd'] = $penduduk->sd;
            $data['smp'] = $penduduk->smp;
            $data['sma'] = $penduduk->sma;
            $data['d1'] = $penduduk->d1;
            $data['d2'] = $penduduk->d2;
            $data['d3'] = $penduduk->d3;
            $data['s1'] = $penduduk->s1;
            $data['s2'] = $penduduk->s2;
            $data['s3'] = $penduduk->s3;
            $data['tidak_sekolah'] = $penduduk->tidak_sekolah;
            echo json_encode($data);

        }
    
    }
    
    /* End of file Dashboard.php */
    /* Location: ./application/controllers/admin/Dashboard.php */
 ?>