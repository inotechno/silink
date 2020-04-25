<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DashboardModel extends CI_Model {
	
		function get_jumlah_penduduk()
		{
			$this->db->select('COUNT(id) as total_penduduk');
			$this->db->select('
				SUM( CASE WHEN jenis_kelamin = "Laki-Laki" THEN 1 ELSE 0 END ) AS pria, 
				SUM( CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END ) AS wanita, 
				SUM( CASE WHEN pendidikan = "SD/Sederajat" THEN 1 ELSE 0 END ) AS sd, 
				SUM( CASE WHEN pendidikan = "SMP/Sederajat" THEN 1 ELSE 0 END ) AS smp, 
				SUM( CASE WHEN pendidikan = "SMA/Sederajat" THEN 1 ELSE 0 END ) AS sma, 
				SUM( CASE WHEN pendidikan = "D1" THEN 1 ELSE 0 END ) AS d1, 
				SUM( CASE WHEN pendidikan = "D2" THEN 1 ELSE 0 END ) AS d2, 
				SUM( CASE WHEN pendidikan = "D3" THEN 1 ELSE 0 END ) AS d3,
				SUM( CASE WHEN pendidikan = "S1" THEN 1 ELSE 0 END ) AS s1,
				SUM( CASE WHEN pendidikan = "S2" THEN 1 ELSE 0 END ) AS s2, 
				SUM( CASE WHEN pendidikan = "S3" THEN 1 ELSE 0 END ) AS s3, 
				SUM( CASE WHEN pendidikan = "Tidak Sekolah" THEN 1 ELSE 0 END ) AS tidak_sekolah, 
				');
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