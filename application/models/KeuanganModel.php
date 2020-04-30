<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class KeuanganModel extends CI_Model {
	

// Keuangan Admin
		function get_id()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(no_keuangan,3)) AS kd_max FROM bendahara_warga WHERE DATE(created_at)=CURDATE()");
	        $kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%04s", $tmp);
	            }
	        }else{
	            $kd = "0001";
	        }
	        date_default_timezone_set('Asia/Jakarta');
	        return date('dmy').$kd;
		}

		function info_debit_credit()
		{
			$this->db->select('
				SUM(IF(jenis_keuangan = "debit", nilai_keuangan, 0)) as total_debit,
				SUM(IF(jenis_keuangan = "credit", nilai_keuangan, 0)) as total_credit,
				SUM(nilai_keuangan) as total_keuangan
				');
			$this->db->from('bendahara_warga');
			$i = $this->db->get()->row();

			$data = array(
				'total_debit' => number_format($i->total_debit),
				'total_credit' => number_format($i->total_credit),
				'total_keuangan' => number_format($i->total_keuangan),
				'persendebit' => number_format($i->total_debit/$i->total_keuangan*100,2),
				'persencredit' => number_format($i->total_credit/$i->total_keuangan*100,2)
			);

			return $data;
		}

		function daftar_keuangan($query)
		{
			$this->db->select('bendahara_warga.*, penduduk.id, penduduk.nama_lengkap');
			$this->db->from('bendahara_warga');
			$this->db->join('penduduk', 'penduduk.id = bendahara_warga.created_at', 'left');
			if ($query != '') {
		 		$this->db->or_like('no_keuangan', $query);
		 		$this->db->or_like('jenis_keuangan', $query);
		 		$this->db->or_like('catatan', $query);
		 		$this->db->or_like('nama_lengkap', $query);
			}
			$this->db->order_by('no_keuangan', 'asc');
			return $this->db->get();
		}

		function simpan_keuangan($data)
		{
			$this->db->insert('bendahara_warga', $data);
		}
	
		function ubah_keuangan($id, $data)
		{
			return $this->db->update('bendahara_warga', $data, array('id_keuangan' =>$id));
		}



// Keuangan Pemuda
		function get_id_pemuda()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(no_keuangan,3)) AS kd_max FROM kas_pemuda WHERE DATE(created_at)=CURDATE()");
	        $kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%04s", $tmp);
	            }
	        }else{
	            $kd = "0001";
	        }
	        date_default_timezone_set('Asia/Jakarta');
	        return date('dmy').$kd;
		}

		function info_debit_credit_pemuda()
		{
			$data = array();
			$this->db->select('
				SUM(IF(jenis_keuangan = "debit", nilai_keuangan, 0)) as total_debit,
				SUM(IF(jenis_keuangan = "credit", nilai_keuangan, 0)) as total_credit,
				SUM(nilai_keuangan) as total_keuangan
				');
			$this->db->from('kas_pemuda');
			$i = $this->db->get()->row();
			if ($i->total_debit > 0) {
				$data = array(
					'total_debit' => number_format($i->total_debit),
					'total_credit' => number_format($i->total_credit),
					'total_keuangan' => number_format($i->total_keuangan),
					'persendebit' => number_format($i->total_debit/$i->total_keuangan*100,2),
					'persencredit' => number_format($i->total_credit/$i->total_keuangan*100,2)
				);
			}else{
				$data = array(
					'total_debit' => 0,
					'total_credit' => 0,
					'total_keuangan' => 0,
					'persendebit' => 0,
					'persencredit' => 0
				);
			}

			return $data;
		}

		function daftar_keuangan_pemuda($query)
		{
			$this->db->select('kas_pemuda.*, pemuda.id_penduduk, penduduk.nama_lengkap');
			$this->db->from('kas_pemuda');
			$this->db->join('penduduk', 'penduduk.id = kas_pemuda.created_at', 'left');
			$this->db->join('pemuda', 'penduduk.id = pemuda.id_penduduk', 'left');
			if ($query != '') {
		 		$this->db->or_like('no_keuangan', $query);
		 		$this->db->or_like('jenis_keuangan', $query);
		 		$this->db->or_like('catatan', $query);
		 		$this->db->or_like('nama_lengkap', $query);
			}
			$this->db->order_by('no_keuangan', 'asc');
			return $this->db->get();
		}

		function simpan_keuangan_pemuda($data)
		{
			$this->db->insert('kas_pemuda', $data);
		}
	
		function ubah_keuangan_pemuda($id, $data)
		{
			return $this->db->update('kas_pemuda', $data, array('id_keuangan' =>$id));
		}
	}
	
	/* End of file KeuanganModel.php */
	/* Location: ./application/models/KeuanganModel.php */
 ?>