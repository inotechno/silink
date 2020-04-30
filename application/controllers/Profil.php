<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {
	
		 public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('status')!='login') {
                redirect('login','refresh');
            }

            $this->load->model('ProfilModel');
        }
        public function index()
        {
            $this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('profil');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
            $this->load->view('partials/services/profil');
        }

        public function view()
        {
            $data = $this->ProfilModel->view();
            echo json_encode($data);
        }

        public function update()
        {
            $username = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));

            $result = $this->ProfilModel->update($username, $data);
            echo json_encode($result);
        }
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/pemuda/Profile.php */
 ?>