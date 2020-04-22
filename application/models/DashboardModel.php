<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DashboardModel extends CI_Model {
	
		function get_jumlah_penduduk()
		{
			$this->db->select('COUNT(id) as total_penduduk');
			return $this->db->get('penduduk')->row();
		}
		
		function get_jumlah_keluarga()
		{
			$this->db->select('COUNT(no_kk) as total_keluarga, status_keluarga');
			$this->db->group_by('status_keluarga');
			return $this->db->get('penduduk')->row();
		}

		function get_jumlah_pemuda()
		{
			$this->db->select('COUNT(id) as total_pemuda');
			return $this->db->get('pemuda')->row();
		}
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/models/Dashboard.php */
 ?>