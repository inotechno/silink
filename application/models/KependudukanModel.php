<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class KependudukanModel extends CI_Model {
 
 	function get_by_id($id)
 	{
 		$data = $this->db->get_where('penduduk', array('id' => $id ));
 		if ($data->num_rows() > 0) {
 			foreach ($data->result() as $dt) {
 				$hasil = array(
 							'id' 				=> $dt->id,
 				 			'nik' 				=> $dt->nik,
 				 			'nama_lengkap' 		=> $dt->nama_lengkap,
 				 			'no_kk' 			=> $dt->no_kk,
 				 			'tempat_lahir' 		=> $dt->tempat_lahir,
 				 			'tanggal_lahir' 	=> $dt->tanggal_lahir,
 				 			'jenis_kelamin' 	=> $dt->jenis_kelamin,
 				 			'agama' 			=> $dt->agama,
 				 			'pekerjaan'			=> $dt->pekerjaan,
 				 			'pendidikan' 		=> $dt->pendidikan,
 				 			'status_perkawinan' => $dt->status_perkawinan,
 				 			'status_keluarga'	=> $dt->status_keluarga,
 				 			'status'			=> $dt->status,
 				 			'foto'		 		=> $dt->foto
 				 			);
 			}
 		}
 		return $hasil;
 	}

// ====================
// |  PENDUDUK 		  |
// ====================
 	function daftar_penduduk($query)
	{
		$this->db->select('*');
		$this->db->select('
			CASE 
			WHEN status_perkawinan = 0 THEN "Belum Kawin" 
			WHEN status_perkawinan = 1 THEN "Menikah" 
			WHEN status_perkawinan = 2 THEN "Janda/Duda" 
			END as status_kawin', false);
		
		$this->db->from('penduduk');
		if ($query != '') {
	 		$this->db->or_like('nama_lengkap', $query);
	 		$this->db->or_like('nama_lengkap', $query);
	 		$this->db->or_like('tempat_lahir', $query);
		}
		$this->db->order_by('nama_lengkap', 'asc');
		return $this->db->get();
	}	

 	function simpan_penduduk($data)
 	{
 		return $this->db->insert('penduduk', $data);
 	}

 	function hapus_penduduk($id)
 	{
 		$this->db->delete('pemuda', array('id_penduduk' => $id));
 		return $this->db->delete('penduduk', array('id' => $id));
 	}

 	function ubah_penduduk($id, $data)
 	{
 		$this->db->update('penduduk', $data, array('id' => $id));
 	}
 
// ====================
// |  KELUARGA 		  |
// ====================
 	function get_by_kk($kk)
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
			WHEN status_keluarga = 1 THEN "KEPALA KELUARGA" 
			WHEN status_keluarga = 2 THEN "ISTRI" 
			WHEN status_keluarga = 3 THEN "SUAMI" 
			WHEN status_keluarga = 4 THEN "ANAK" 
			WHEN status_keluarga = 5 THEN "CUCU" 
			END as statuskeluarga', false);
		
		$this->db->from('penduduk');
		$this->db->where('no_kk', $kk);
		$this->db->order_by('status_keluarga', 'asc');
		return $this->db->get();
 	}

 	function daftar_keluarga()
 	{
 		$this->db->select('COUNT(status) as jumlah_anggota, no_kk, status_keluarga, nama_lengkap, galeri.url as foto_kk');
		$this->db->select('
			CASE 
			WHEN status_keluarga = 1 THEN "KEPALA KELUARGA" 
			WHEN status_keluarga = 2 THEN "ISTRI" 
			WHEN status_keluarga = 3 THEN "SUAMI" 
			WHEN status_keluarga = 4 THEN "ANAK" 
			WHEN status_keluarga = 5 THEN "CUCU" 
			END as statuskeluarga', false);
		
		$this->db->from('penduduk');
		$this->db->join('galeri', 'galeri.id_galeri = penduduk.no_kk', 'left');
		$this->db->group_by('no_kk');
		$this->db->having('status_keluarga', 1);

		return $this->db->get();
 	}

 	function simpan_kk($data)
 	{
 		return $this->db->insert('galeri', $data);
 	}

 }
 
 /* End of file KependudukanModel.php */
 /* Location: ./application/models/KependudukanModel.php */ 
 ?>