<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class e404 extends CI_Controller {
	
		public function index()
		{
			$this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('404');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/404');
		}
	
	}
	
	/* End of file 404.php */
	/* Location: ./application/controllers/404.php */
 ?>