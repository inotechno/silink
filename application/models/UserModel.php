<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function daftar_user()
		{
			$this->db->select('user_aktif.*, penduduk.id, penduduk.nama_lengkap, user_group.id_akses, user_group.nama_akses');
			$this->db->from('user_aktif');
			$this->db->join('penduduk', 'penduduk.id = user_aktif.id_user', 'left');
			$this->db->join('user_group', 'user_aktif.id_level = user_group.id_akses', 'left');
			return $this->db->get();
		}
		
		function ubah_user($username, $data)
		{
			$this->db->update('user_aktif', $data, array('username' => $username));
		}

		function hapus_user($username)
		{
			$this->db->delete('user_aktif', array('username' => $username));
		}

		function ganti_status($username, $status)
		{
			$this->db->update('user_aktif', array('status' => $status ), array('username' => $username));
		}

		function tambah_data($data)
		{
			return $this->db->insert('user_aktif', $data);
		}
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
 ?>