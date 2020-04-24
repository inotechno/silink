<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class InventarisModel extends CI_Model {
	
		function daftar_barang()
		{
			$this->db->select('inventaris.*,pinjaman_barang.jumlah_barang, pinjaman_barang.id_barang');
			$this->db->join('pinjaman_barang', 'inventaris.id = pinjaman_barang.id_barang', 'left');
			$this->db->from('inventaris');
			return $this->db->get();
		}

		function daftar_peminjam()
		{
			$this->db->select('inventaris.id, inventaris.nama_barang, penduduk.id, penduduk.nama_lengkap, pinjaman_barang.*');
			$this->db->from('pinjaman_barang');
			$this->db->join('inventaris', 'inventaris.id = pinjaman_barang.id_barang', 'left');
			$this->db->join('penduduk', 'penduduk.id = pinjaman_barang.id_penduduk', 'left');
			return $this->db->get();
		}
		function hapus_peminjam($id, $id_barang, $status)
		{
			$this->db->update('inventaris', array('status' => $status ), array('id' => $id_barang));
			return $this->db->delete('pinjaman_barang', array('id' => $id));
		}

		function simpan_barang($data)
		{
			$this->db->insert('inventaris', $data);
		}

		function ubah_barang($id, $data)
		{
			$this->db->update('inventaris', $data, array('id' => $id));
		}

		function hapus_barang($id)
		{
			$this->db->delete('inventaris', array('id' => $id));
		}

		function simpan_pinjaman($id, $data)
		{
			$this->db->insert('pinjaman_barang', $data);
			$this->db->update('inventaris', array('status' => 'Pinjam'), array('id' => $id));
		}

		function selesai_pinjaman($id, $status, $tanggal_kembali, $id_barang)
		{
			$this->db->update('inventaris',array('status' => $status), array('id' => $id_barang));
			$this->db->update('pinjaman_barang',array('tanggal_kembali' => $tanggal_kembali), array('id' => $id));
		}
	
	}
	
	/* End of file InventarisModel.php */
	/* Location: ./application/models/InventarisModel.php */
 ?>