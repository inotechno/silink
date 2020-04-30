<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class ProfilModel extends CI_Model {
	
		function view()
		{
			$this->db->select('penduduk.nama_lengkap, penduduk.id, user_aktif.*');
			$this->db->join('penduduk', 'penduduk.id = user_aktif.id_user', 'left');
			$this->db->from('user_aktif');
			$this->db->where('id', $this->session->userdata('id'));
			$data = $this->db->get()->result();
			foreach ($data as $dt) {
				$profil = array(
					'id' => $dt->id,
					'nama_lengkap' => $dt->nama_lengkap,
					'username' => $dt->username,
					'email' => $dt->email
				);
			}
			return $profil;
		}

		function update($username, $data)
		{
			return $this->db->update('user_aktif', $data,  array('username' => $username));
		}
	}
	
	/* End of file ProfilModel.php */
	/* Location: ./application/models/ProfilModel.php */
 ?>