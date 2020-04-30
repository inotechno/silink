<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class KegiatanModel extends CI_Model {
	
		function daftar_kegiatan()
		{
			$this->db->select('*');
			$this->db->from('kegiatan');
			$this->db->order_by('id_kegiatan', 'asc');
			return $this->db->get()->result();
		}
		
		function tambah_kegiatan($data)
		{
			$this->db->insert('kegiatan', $data);
		}

		function ubah_kegiatan($id, $data)
		{
			$this->db->update('kegiatan', $data, array('id_kegiatan' => $id));
		}

		function hapus_kegiatan($id)
		{
			$this->db->delete('kegiatan', array('id_kegiatan' => $id));
		}
	}
	
	/* End of file KegiatanModel.php */
	/* Location: ./application/models/KegiatanModel.php */
 ?>