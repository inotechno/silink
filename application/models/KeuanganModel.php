<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class KeuanganModel extends CI_Model {
	
		function get_id()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(no_keuangan,3)) AS kd_max FROM keuangan_sistem WHERE DATE(created_at)=CURDATE()");
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
			$this->db->from('keuangan_sistem');
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
			$this->db->select('keuangan_sistem.*, penduduk.id, penduduk.nama_lengkap');
			$this->db->from('keuangan_sistem');
			$this->db->join('penduduk', 'penduduk.id = keuangan_sistem.created_at', 'left');
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
			$this->db->insert('keuangan_sistem', $data);
		}
	
	}
	
	/* End of file KeuanganModel.php */
	/* Location: ./application/models/KeuanganModel.php */
 ?>