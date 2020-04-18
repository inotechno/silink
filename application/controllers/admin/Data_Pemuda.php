<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Pemuda extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status')!='login') {
				redirect('login','refresh');
			}
			$this->load->model('KepemudaanModel');
		}

		public function index()
		{
			$this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('admin/data_pemuda');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/pemuda');
		}

		public function daftar_pemuda()
		{
			$html = '';
			$query = '';

			if($this->input->post('query'))
			  {
			   $query = $this->input->post('query');
			  }
			$data = $this->KepemudaanModel->daftar_pemuda($query);
			if ($data->num_rows() > 0) {
				$no = 1;
				foreach ($data->result() as $dp) {
				if ($dp->foto == '') {
					$foto = base_url('assets/images/default.jpg');
				}else{
					$foto = base_url("assets/images/penduduk/$dp->foto");
				}
				$html .= '<tr>
	                        <td style="text-align:right;" class="align-middle">
	                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm item_edit" data-id="'.$dp->id.'"><span class="far fa-edit"></span></a>
	                            <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm item_delete" data-id="'.$dp->id.'" data-nama="'.$dp->nama_lengkap.'" data-jabatan="'.$dp->jabatan.'"><span class="far fa-trash-alt"></span></a>
	                        </td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td hidden>'.$dp->id.'</td>
	                        <td class="align-middle">
	                        	<a target="_blank" href="'.$foto.'"><img class="" width="40" height="50" src="'.$foto.'"></a>
	                        </td>
	                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
	                        <td class="align-middle">'.$dp->tempat_lahir.'</td>
	                        <td class="align-middle">'.date("d-m-Y", strtotime($dp->tanggal_lahir)).'</td>
	                        <td class="align-middle">'.$dp->jenis_kelamin.'</td>
	                        <td class="align-middle">'.$dp->agama.'</td>
	                        <td class="align-middle">'.$dp->pendidikan.'</td>
	                        <td class="align-middle">'.$dp->pekerjaan.'</td>
	                        <td class="align-middle">'.$dp->status_kawin.'</td>
	                        <td class="align-middle">'.$dp->status.'</td>
	                    </tr>';
				}
			} else {
				$html .= '<tr>
							<td colspan="14" class="text-center">Tidak Ada Data</td>
							</tr>';
			}
			echo $html;
		}

		public function daftar_penduduk()
		{
			$html = '';
			$data = $this->KepemudaanModel->data_penduduk();
			foreach ($data as $dt) {
				$html = '<option value="'.$dt->id.'">'.$dt->nama_lengkap.'</option>';
			}
			echo $this->db->last_query($data);
			echo $html;
		}

		public function save_pemuda()
		{
			$result = $this->KepemudaanModel->simpan_pemuda($_POST);
			echo $this->db->last_query($result);
			if ($result) {
				echo 1;
			} else {
				echo 0;
			}
			exit;
		}
	
	}
	
	/* End of file Data_Pemuda.php */
	/* Location: ./application/controllers/admin/Data_Pemuda.php */
 ?>