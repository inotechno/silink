<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class SumbanganModel extends CI_Model {
	
		function daftar_jenis_sumbangan_warga()
		{
			$this->db->select('jenis_sumbangan_warga.*, SUM(nilai_sumbangan) as total_sumbangan, sumbangan_warga.id_jenis, sumbangan_warga.nilai_sumbangan');
			$this->db->from('jenis_sumbangan_warga');
			$this->db->join('sumbangan_warga', 'sumbangan_warga.id_jenis = jenis_sumbangan_warga.id_jenis', 'left');
			$this->db->group_by('jenis_sumbangan_warga.id_jenis');
			return $this->db->get();
		}
		
		function daftar_sumbangan_warga($jenis)
		{
			$this->db->select('sumbangan_warga.*, penduduk.id, penduduk.nama_lengkap, jenis_sumbangan_warga.*');
			$this->db->from('sumbangan_warga');
			$this->db->join('jenis_sumbangan_warga', 'sumbangan_warga.id_jenis = jenis_sumbangan_warga.id_jenis', 'left');
			$this->db->join('penduduk', 'penduduk.id = sumbangan_warga.sumbangan_dari', 'left');
			if ($jenis != '') {
		 		$this->db->where('sumbangan_warga.id_jenis', $jenis);
			}
			$this->db->order_by('nama_lengkap', 'asc');
			return $this->db->get();
		}

		function simpan_jenis_sumbangan($data)
		{
			$this->db->insert('jenis_sumbangan_warga', $data);
		}
	}
	
	/* End of file SumbanganModel.php */
	/* Location: ./application/models/SumbanganModel.php */
 ?>