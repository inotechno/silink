<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Sumbangan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status')!='login') {
				redirect('login','refresh');
			}
			$this->load->model('SumbanganModel');
		}
	
		public function index()
		{
			$this->load->view('partials/01head');
	        $this->load->view('partials/02header');
	        $this->load->view('partials/03sidebar');
	        $this->load->view('admin/sumbangan');
	        $this->load->view('partials/05footer');
	        $this->load->view('partials/06plugin');
	        $this->load->view('partials/services/sumbangan_warga');
		}

		public function daftar_jenis_sumbangan()
		{
			$html = '';

			$result = $this->SumbanganModel->daftar_jenis_sumbangan_warga();
			if ($result->num_rows() > 0) {
			$no = 1;
				foreach ($result->result() as $dp) {
				
				$html .= '<tr style="cursor:pointer;" data-id="'.$dp->id_jenis.'">

								<td hidden>'.$dp->id_jenis.'</td>
		                        <td class="align-middle text-center">'.$no++.'</td>
		                        <td class="align-middle">'.$dp->nama_sumbangan.'</td>
		                        <td class="align-middle text-center"><span class="badge badge-info">'.date("d/m/Y", strtotime($dp->mulai_sumbangan)).'</span><span class="badge badge-danger">'.date("d/m/Y", strtotime($dp->selesai_sumbangan)).'</span></td>
		                        <td class="align-middle"><span class="badge badge-success">Rp. '.number_format($dp->total_sumbangan).'</span></td>
		                   </tr>';
					}
				} else {
					$html .= '<tr>
								<td colspan="4" class="text-center">Tidak Ada Data</td>
							</tr>';
				}
			echo $html;
		}

		public function daftar_sumbangan_warga()
		{
			$jenis = '';
			$html = '';
			if($this->input->post('jenis'))
			{
			   $jenis = $this->input->post('jenis');
			}

			$data = $this->SumbanganModel->daftar_sumbangan_warga($jenis);
			if ($data->num_rows() > 0) {
			$no = 1;
				foreach ($data->result() as $dp) {
				$html .= '<tr>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td hidden>'.$dp->id_sumbangan.'</td>
	                        <td class="align-middle">'.$dp->nama_sumbangan.'</td>
	                        <td class="align-middle">Rp. '.number_format($dp->nilai_sumbangan).'</td>
	                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
	                        <td class="align-middle">'.date("d/m/Y", strtotime($dp->tanggal_sumbangan)).'</span></td>
	                    </tr>';
					}
				} else {
					$html .= '<tr>
								<td colspan="4" class="text-center">Tidak Ada Data</td>
							</tr>';
				}
			echo $html;
		}

		public function save_jenis_sumbangan()
		{
			$data['nama_sumbangan'] = $this->input->post('nama_sumbangan');
			$data['mulai_sumbangan'] = $this->input->post('mulai_sumbangan');
			$data['selesai_sumbangan'] = $this->input->post('selesai_sumbangan');

			$result = $this->SumbanganModel->simpan_jenis_sumbangan($data);
			echo json_encode($result);
		}
	
	}
	
	/* End of file Sumbangan.php */
	/* Location: ./application/controllers/admin/Sumbangan.php */
 ?>