<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Keuangan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status')!='login') {
				redirect('login','refresh');
			}
			$this->load->model('KeuanganModel');
		}

		public function index()
		{
			$this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('admin/keuangan');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/keuangan');
		}

		public function get_id()
		{
			$no = $this->KeuanganModel->get_id();
			echo json_encode($no);
		}

		public function info_debit_credit()
		{
			$data = $this->KeuanganModel->info_debit_credit();
			echo json_encode($data);	
		}

		public function daftar_keuangan()
		{
			$html = '';
			$query = '';

			if($this->input->post('query'))
			  {
			   $query = $this->input->post('query');
			  }
			$data = $this->KeuanganModel->daftar_keuangan($query);
			if ($data->num_rows() > 0) {
				$no = 1;

				foreach ($data->result() as $dp) {
					if ($dp->jenis_keuangan == 'credit') {
						$jenis_keuangan = '<span class="badge badge-danger float-right">'.ucfirst($dp->jenis_keuangan).'</span>';
					}else{
						$jenis_keuangan = '<span class="badge badge-success">'.ucfirst($dp->jenis_keuangan).'</span>';
					}
				$html .= '<tr>
	                        <td class="text-center align-middle">
	                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm edit_keuangan" data-id="'.$dp->id_keuangan.'" data-no="'.$dp->no_keuangan.'" data-jenis="'.$dp->jenis_keuangan.'" data-nilai="'.$dp->nilai_keuangan.'" data-catatan="'.$dp->catatan.'"><span class="far fa-edit"></span></a>
	                        </td>
	                        <td hidden>'.$dp->id_keuangan.'</td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td class="align-middle">'.$dp->no_keuangan.'</td>
	                        <td class="align-middle">'.$jenis_keuangan.'</td>
	                        <td class="align-middle">'.'Rp. '.number_format($dp->nilai_keuangan).'</td>
	                        <td class="align-middle">'.$dp->catatan.'</td>
	                        <td class="align-middle">'.date("d-m-Y : H:i:s", strtotime($dp->created_at)).'</td>
	                    </tr>';
				}
			} else {
				$html .= '<tr>
							<td colspan="7" class="text-center">Tidak Ada Data</td>
						</tr>';
			}

			echo $html;
		}

		public function save_keuangan()
		{
			$data['no_keuangan'] = $this->input->post('no_keuangan');
			$data['nilai_keuangan'] = $this->input->post('nilai_keuangan');
			$data['jenis_keuangan'] = $this->input->post('jenis_keuangan');
			$data['catatan'] = $this->input->post('catatan');
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date("Y-m-d H:i:s");

			$result = $this->KeuanganModel->simpan_keuangan($data);
			echo json_encode($result);
		}

		public function update_keuangan()
		{

			$id_keuangan = $this->input->post('id_keuangan');
			$data['id_keuangan'] = $this->input->post('id_keuangan');
			$data['jenis_keuangan'] = $this->input->post('jenis_keuangan');
			$data['nilai_keuangan'] = $this->input->post('nilai_keuangan');
			$data['catatan'] = $this->input->post('catatan');
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date("Y-m-d H:i:s");

			$result = $this->KeuanganModel->ubah_keuangan($id_keuangan, $data);
			echo json_encode($result);
		}

	}

	/* End of file Keuangan.php */
	/* Location: ./application/controllers/admin/Keuangan.php */
 ?>