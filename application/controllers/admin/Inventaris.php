<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')!='login') {
			redirect('login','refresh');
		}
		$this->load->model('InventarisModel');
	}

	public function index()
	{
		$this->load->view('partials/01head');
        $this->load->view('partials/02header');
        $this->load->view('partials/03sidebar');
        $this->load->view('admin/inventaris');
        $this->load->view('partials/05footer');
        $this->load->view('partials/06plugin');
   		$this->load->view('partials/services/inventaris');
	}

	public function daftar_barang()
	{
		$html = '';
		$barang_dipinjam = 0;
		$result = $this->InventarisModel->daftar_barang();
		if ($result->num_rows() > 0) {
		$no = 1;
			foreach ($result->result() as $dp) {

			$this->db->select('SUM(jumlah_barang) as jumlah_barang');
			$this->db->from('pinjaman_barang');
			$this->db->where('id_barang', $dp->id);
			$pj = $this->db->get()->row();

			if ($pj->jumlah_barang > 0) {
				$dipinjam = '<span class="badge badge-success align-top badge-pill"><span class="fas fa-clone mr-1"></span>'.$pj->jumlah_barang.'</span>';
			}else{
				$dipinjam = '';
			}
			$html .= '<tr>
							<td class="text-center align-middle">
								<a class="dropdown-toggle btn btn-outline-info btn-sm" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

									<span class="fa fa-list"></span>
								</a>
								<div class="dropdown-menu">
									<a href="javascript:void(0);" class="dropdown-item tambah_peminjam" data-id="'.$dp->id.'" data-jumlah="'.number_format($dp->jumlah-$pj->jumlah_barang).'" data-nama="'.$dp->nama_barang.'"><span class="fas fa-clone"></span> Pinjam Barang</a>
		                            <a href="javascript:void(0);" class="dropdown-item edit_barang" data-id="'.$dp->id.'" data-nama="'.$dp->nama_barang.'" data-satuan="'.$dp->satuan.'" data-jumlah="'.$dp->jumlah.'" data-status="'.$dp->status.'"><span class="fas fa-pencil-alt"></span> Ubah Data</a>
		                            <a href="javascript:void(0);" class="dropdown-item hapus_barang" data-id="'.$dp->id.'" data-nama="'.$dp->nama_barang.'" data-pinjam="'.$pj->jumlah_barang.'"><span class="far fa-trash-alt"></span> Hapus Data</a>
		                        </div>
	                        </td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td class="align-middle">'.$dp->nama_barang.'</td>
	                        <td class="align-middle">'.$dp->satuan.'</td>
	                        <td class="align-middle">'.$dp->jumlah.' '.$dipinjam.'</td>
	                        <td class="align-middle">'.ucfirst($dp->status).'</td>
	                   </tr>';
				}
			} else {
				$html .= '<tr>
							<td colspan="6" class="text-center">Tidak Ada Data</td>
						</tr>';
			}
			echo $this->db->last_query($result);
		echo $html;

	}

	public function daftar_peminjam()
	{
		$html = '';
		$tanggal_kembali = '';
		$result = $this->InventarisModel->daftar_peminjam();
		if ($result->num_rows() > 0) {
		$no = 1;
			foreach ($result->result() as $dp) {
			if ($dp->tanggal_kembali == '') {
				$tanggal_kembali = '-';
			}else{
				$tanggal_kembali = date('d-m-Y', strtotime($dp->tanggal_kembali));
			}
			$html .= '<tr>
							<td class="text-center align-middle">
								<a class="dropdown-toggle btn btn-outline-info btn-sm" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

									<span class="fa fa-list"></span>
								</a>
								<div class="dropdown-menu">
		                            <a href="javascript:void(0);" class="dropdown-item hapus_pinjaman" data-id="'.$dp->id.'"  data-penduduk="'.$dp->nama_lengkap.'" data-barang="'.$dp->id_barang.'"><span class="fas fa-trash-alt"></span> Hapus Data</a>
		                            <a href="javascript:void(0);" class="dropdown-item selesai_pinjaman" data-id="'.$dp->id.'"  data-penduduk="'.$dp->nama_lengkap.'" data-barang="'.$dp->id_barang.'"><span class="far fa-clone"></span> Selesaikan Pinjaman</a>
		                        </div>
	                        </td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
	                        <td class="align-middle">'.$dp->nama_barang.'</td>
	                        <td class="align-middle text-center">'.$dp->jumlah_barang.'</td>
	                        <td class="align-middle">'.date('d-m-Y', strtotime($dp->tanggal_pinjam)).'</td>
	                        <td class="align-middle text-center">'.$tanggal_kembali.'</td>
	                   </tr>';
				}
			} else {
				$html .= '<tr>
							<td colspan="7" class="text-center">Tidak Ada Data</td>
						</tr>';
			}
		echo $html;
	}

	public function delete_peminjam()
	{
		$id = $this->input->post('id');

		$id_barang = $this->input->post('id_barang');
		$status = 'Ada';

		$result = $this->InventarisModel->hapus_peminjam($id, $id_barang, $status);
		json_encode($result);
		helper_log("del", "Menghapus data Inventaris");

	}

	public function selesai_pinjaman()
	{
		$id = $this->input->post('id');

		$id_barang = $this->input->post('id_barang');
		$status = 'Ada';
		$tanggal_kembali = date("Y-m-d");

		$result = $this->InventarisModel->selesai_pinjaman($id, $status, $tanggal_kembali, $id_barang);
		helper_log("other", "Menyelesaikan Pinjaman Inventaris");
		json_encode($result);

	}

	public function save_barang()
	{
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['satuan'] = $this->input->post('satuan');
		$data['jumlah'] = $this->input->post('jumlah');
		$data['status'] = 'Ada';

		$result = $this->InventarisModel->simpan_barang($data);
		helper_log("add", "Tambah data barang");
		json_encode($result);
	}

	public function update_barang()
	{
		$id = $this->input->post('id');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['satuan'] = $this->input->post('satuan');
		$data['jumlah'] = $this->input->post('jumlah');

		$result = $this->InventarisModel->ubah_barang($id, $data);
		helper_log("edit", "mengubah data barang");
		json_encode($result);

	}

	public function delete_barang()
	{
		$id = $this->input->post('id');

		$result = $this->InventarisModel->hapus_barang($id);
		helper_log("del", "Menghapus data barang");
		json_encode($result);
	}

	public function save_pinjaman()
	{
		$id = $this->input->post('id_barang');
		$data['id_barang'] = $this->input->post('id_barang');
		$data['id_penduduk'] = $this->input->post('id_penduduk');
		$data['jumlah_barang'] = $this->input->post('jumlah_barang');
		$data['tanggal_pinjam'] = date("Y-m-d");


		$result = $this->InventarisModel->simpan_pinjaman($id, $data);
		helper_log("add", "membuat data pinjaman");
		json_encode($result);
	}

}

/* End of file Inventaris.php */
/* Location: ./application/controllers/admin/Inventaris.php */
 ?>