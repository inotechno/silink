<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanModel extends CI_Model {

	function view_data($id)
	{
		$pengaturan = $this->db->get_where('pengaturan_website', array('id' => $id));
		if ($pengaturan->num_rows() != '') {
			foreach ($pengaturan->result() as $p) {
				$data = array(
					'id' => $p->id,
					'nama_lingkungan' => $p->nama_lingkungan,
					'alamat' => $p->alamat,
					'rt' => $p->rt,
					'rw' => $p->rw,
					'prov' => $p->prov,
					'kota' => $p->kota,
					'kec' => $p->kec,
					'kel' => $p->kel,
					'id_rt' => $p->id_rt,
				);
			}
		}
		return $data;
	}

	function ubah_pengaturan($id, $data)
	{
		$this->db->update('pengaturan_website', $data,array('id' => $id));
	}

}

/* End of file PengaturanModel.php */
/* Location: ./application/models/PengaturanModel.php */
 ?>