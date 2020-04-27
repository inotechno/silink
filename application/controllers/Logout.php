<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Logout extends CI_Controller {
	
		public function index()
		{
			helper_log("logout", "Melakukan Logout");
			$this->session->sess_destroy();
			redirect(base_url('Login'));	
		}
	
	}
	
	/* End of file Logout.php */
	/* Location: ./application/controllers/Logout.php */
 ?>