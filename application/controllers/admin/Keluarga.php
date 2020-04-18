<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')!='login') {
			redirect('login','refresh');
		}
		$this->load->model('KependudukanModel');
	}

	public function index()
	{
		$this->load->view('partials/01head');
        $this->load->view('partials/02header');
        $this->load->view('partials/03sidebar');
        $this->load->view('admin/keluarga');
        $this->load->view('partials/05footer');
        $this->load->view('partials/06plugin');
	}

	public function view_keluarga()
	{
		$html = '';
		$no_kk = $this->input->get('kk');
		$data = $this->KependudukanModel->get_by_kk($no_kk);
		if ($data->num_rows() > 0) {
			$no = 1;
			foreach ($data->result() as $dp) {
			if ($dp->foto == '') {
				$foto = base_url('assets/images/default.jpg');
			}else{
				$foto = base_url("assets/images/penduduk/$dp->foto");
			}
			$html .= '<tr>
	                    <td class="align-middle">'.$no++.'</td>
	                    <td hidden>'.$dp->id.'</td>
	                    <td class="align-middle">
	                    	<a target="_blank" href="'.$foto.'"><img class="" width="40" height="50" src="'.$foto.'"></a>
	                    </td>
	                    <td class="align-middle">'.$dp->nik.'</td>
	                    <td class="align-middle">'.strtoupper($dp->nama_lengkap).'</td>
	                    <td class="align-middle">'.$dp->jenis_kelamin.'</td>
	                    <td class="align-middle">'.strtoupper($dp->tempat_lahir).'</td>
	                    <td class="align-middle">'.date("d-m-Y", strtotime($dp->tanggal_lahir)).'</td>
	                    <td class="align-middle">'.strtoupper($dp->agama).'</td>
	                    <td class="align-middle">'.strtoupper($dp->pekerjaan).'</td>
	                    <td class="align-middle">'.strtoupper($dp->pendidikan).'</td>
	                    <td class="align-middle">'.strtoupper($dp->status_kawin).'</td>
	                    <td class="align-middle">'.strtoupper($dp->statuskeluarga).'</td>
	                </tr>';
			}
		}else{
			$html .= '<tr>
					<td colspan="14" class="text-center">Tidak Ada Data</td>
					</tr>';
		}
		echo $html;
	}

	public function daftar_keluarga()
	{
		$html = '';
		$data = $this->KependudukanModel->daftar_keluarga();
		echo $this->db->last_query($data);
		if ($data->num_rows() > 0) {
			$no = 1;
			foreach ($data->result() as $dp) {
			
			$html .= '<tr>
                        <td class="align-middle text-center">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm item_view" data-kk="'.$dp->no_kk.'" data-namakk="'.$dp->nama_lengkap.'"><span class="fas fa-eye"></span></a>
                        </td>
                        <td class="align-middle">'.$no++.'</td>
                        <td class="align-middle">'.$dp->no_kk.'</td>
                        <td class="align-middle">'.strtoupper($dp->nama_lengkap).'</td>
                        <td class="align-middle">'.$dp->jumlah_anggota.'</td>
                    </tr>';
			}
		} else {
			$html .= '<tr>
						<td colspan="14" class="text-center">Tidak Ada Data</td>
						</tr>';
		}
		echo $html;
	}

}

/* End of file Keluarga.php */
/* Location: ./application/controllers/admin/Keluarga.php */
?>