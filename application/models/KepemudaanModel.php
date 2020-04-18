
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class KepemudaanModel extends CI_Model {

		function daftar_pemuda($query)
		{
			$this->db->select('*');
			$this->db->select('
				CASE 
				WHEN status_perkawinan = 0 THEN "Belum Kawin" 
				WHEN status_perkawinan = 1 THEN "Menikah" 
				WHEN status_perkawinan = 2 THEN "Janda/Duda" 
				END as status_kawin', false);
			
			$this->db->from('penduduk');
			$this->db->join('pemuda', 'pemuda.id_penduduk = penduduk.id', 'RIGHT');
			if ($query != '') {
		 		$this->db->or_like('nama_lengkap', $query);
		 		$this->db->or_like('nama_lengkap', $query);
		 		$this->db->or_like('tempat_lahir', $query);
			}
			$this->db->order_by('nama_lengkap', 'asc');
			return $this->db->get();
		}	

		function data_penduduk()
		{
			$this->db->select('id, nama_lengkap');
			$this->db->from('penduduk');
			$this->db->where('NOT EXISTS (SELECT * FROM pemuda WHERE penduduk.id = pemuda.id_penduduk)', '', FALSE);
			return $this->db->get()->result();
		}

		function simpan_pemuda($data)
		{
			$count = count($data['count']);

			for ($i=0; $i < $count ; $i++) { 
				$data[] = array(
							'id_penduduk' => $data['id_penduduk'][$i],
							'jabatan' => $data['jabatan'][$i]
						);
			}
			$this->db->insert_batch('pemuda', $data);
			if($this->db->affected_rows() > 0)
	            return 1;
	        else
	            return 0;
		}

	}

	/* End of file KepemudaanModel.php */
	/* Location: ./application/models/KepemudaanModel.php */
 ?>