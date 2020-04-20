
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
			$this->db->select('
				CASE 
				WHEN jabatan = 1 THEN "Ketua Pemuda" 
				WHEN jabatan = 2 THEN "Sekretaris" 
				WHEN jabatan = 3 THEN "Bendahara" 
				WHEN jabatan = 4 THEN "Anggota" 
				END as status_pemuda', false);
			
			$this->db->from('penduduk');
			$this->db->join('pemuda', 'pemuda.id_penduduk = penduduk.id', 'RIGHT');
			if ($query != '') {
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
			return $this->db->get();
		}

		function simpan_pemuda($data)
		{
			return $this->db->insert_batch('pemuda', $data);
			
		}

		function edit_pemuda($id, $jabatan)
		{
			$this->db->update('pemuda', array('jabatan' => $jabatan), array('id' => $id));
		}

		function hapus_pemuda($id)
		{
			$this->db->delete('pemuda', array('id' => $id));
		}

	}

	/* End of file KepemudaanModel.php */
	/* Location: ./application/models/KepemudaanModel.php */
 ?>