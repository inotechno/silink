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
            $this->load->view('partials/services/dashboard');
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

        public function log_activity()
        {
            $html = '';
            $icon = '';
            $warna = '';
            $title = '';
            $result = $this->DashboardModel->log_aktivitas();
            if ($result->num_rows() > 0) {
            $no = 1;
                foreach ($result->result() as $dp) {
                if ($dp->log_tipe == 0) {
                    $icon = 'fas fa-sign-in-alt';
                    $title = 'Login';
                    $warna = 'info';
                }elseif ($dp->log_tipe == 1) {
                    $icon = 'fas fa-sign-out-alt';
                    $warna = 'dark';
                    $title = 'Logout';
                }elseif ($dp->log_tipe == 2) {
                    $icon = 'fas fa-plus-circle';
                    $warna = 'success';
                    $title = 'Add Data';
                }elseif ($dp->log_tipe == 3) {
                    $title = 'Update Data';
                    $warna = 'warning';
                    $icon = 'far fa-edit';
                }elseif ($dp->log_tipe == 4) {
                    $title = 'Delete Data';
                    $warna = 'danger';
                    $icon = 'fas fa-trash-alt';
                }else{
                    $warna = 'light';
                    $title = 'Other';
                    $icon = 'far fa-list-alt';
                }
                $html .= '
                        <div class="d-flex align-items-start border-left-line pb-3">
                            <div>
                                <a href="javascript:void(0)" class="btn btn-'.$warna.' btn-circle mb-2 btn-item">
                                    <i class="text-white '.$icon.' fa-lg"></i>
                                </a>
                            </div>
                            <div class="ml-3 mt-2">
                                <h5 class="text-dark font-weight-medium mb-2">'.$title.'</h5>
                                <p class="font-14 mb-2 text-muted">'.$dp->nama_lengkap.' '.ucwords($dp->log_desc).'.
                                </p>
                                <span class="font-weight-light font-14 text-muted">'.date('d-m-Y H:i:s', strtotime($dp->log_time)).'</span>
                            </div>
                        </div>
                ';
                    }
                } 

            echo $html;
        }
    
    }
    
    /* End of file Dashboard.php */
    /* Location: ./application/controllers/admin/Dashboard.php */
 ?>