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
								<td class="text-center align-middle">
		                            <a href="javascript:void(0);" class="fas fa-pencil-alt edit_jenis" data-id="'.$dp->id_jenis.'" data-nama="'.$dp->nama_sumbangan.'" data-mulai="'.$dp->mulai_sumbangan.'" data-selesai="'.$dp->selesai_sumbangan.'"></a>
		                            <a href="javascript:void(0);" class="far fa-trash-alt hapus_jenis" data-id="'.$dp->id_jenis.'"></a>
		                        </td>
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
							<td class="text-center align-middle">
	                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-info edit_sumbangan" data-id="'.$dp->id_sumbangan.'" data-jenis="'.$dp->id_jenis.'" data-nilai="'.$dp->nilai_sumbangan.'" data-nama="'.$dp->id.'" data-tanggal="'.$dp->tanggal_sumbangan.'"><span class="fas fa-pencil-alt"></span></a>
	                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger hapus_sumbangan" data-id="'.$dp->id_sumbangan.'"><span class="far fa-trash-alt"></span></a>
	                        </td>
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
								<td colspan="6" class="text-center">Tidak Ada Data</td>
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
		
		public function edit_jenis_sumbangan()
		{
			$id = $this->input->post('id_jenis');
			$data['id_jenis'] = $this->input->post('id_jenis');
			$data['nama_sumbangan'] = $this->input->post('nama_sumbangan');
			$data['mulai_sumbangan'] = $this->input->post('mulai_sumbangan');
			$data['selesai_sumbangan'] = $this->input->post('selesai_sumbangan');

			$result = $this->SumbanganModel->ubah_jenis_sumbangan($id, $data);
			echo json_encode($result);
		}

		public function hapus_jenis_sumbangan()
		{
			$id_jenis = $this->input->post('id_jenis');

			$result = $this->SumbanganModel->hapus_jenis_sumbangan($id_jenis);
			echo json_encode($id_jenis);
		}

		public function save_sumbangan()
		{
			$data['id_jenis'] = $this->input->post('id_jenis');
			$data['nilai_sumbangan'] = $this->input->post('nilai_sumbangan');
			$data['sumbangan_dari'] = $this->input->post('sumbangan_dari');
			$data['tanggal_sumbangan'] = $this->input->post('tanggal_sumbangan');
			$data['created_by']	= $this->session->userdata('id');
			$data['created_at'] = date("Y-m-d H:i:s");

			$result = $this->SumbanganModel->simpan_sumbangan($data);
			echo json_encode($result);

		}

		public function edit_sumbangan()
		{
			$id_sumbangan = $this->input->post('id_sumbangan');
			$data['id_jenis'] = $this->input->post('id_jenis');
			$data['nilai_sumbangan'] = $this->input->post('nilai_sumbangan');
			$data['sumbangan_dari'] = $this->input->post('sumbangan_dari');
			$data['tanggal_sumbangan'] = $this->input->post('tanggal_sumbangan');
			$data['created_by']	= $this->session->userdata('id');
			$data['created_at'] = date("Y-m-d H:i:s");

			$result = $this->SumbanganModel->ubah_sumbangan($id_sumbangan, $data);
			echo json_encode($result);
		}

		public function hapus_sumbangan()
		{
			$id_sumbangan = $this->input->post('id_sumbangan');

			$result = $this->SumbanganModel->hapus_sumbangan($id_sumbangan);
			echo json_encode($result);
		}
	}
	
	/* End of file Sumbangan.php */
	/* Location: ./application/controllers/admin/Sumbangan.php */
 ?>