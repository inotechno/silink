<?php


	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Penduduk extends CI_Controller {
		
		private $filename = "import_data";

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
            $this->load->view('pemuda/data_penduduk');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/pemuda/penduduk');
		}

		public function get_by_id()
		{
			$id = $this->input->get('id');
	        $data = $this->KependudukanModel->get_by_id($id);

	        echo json_encode($data);
		}

		public function daftar_penduduk()
		{
			$html = '';
			$query = '';

			if($this->input->post('query'))
			  {
			   $query = $this->input->post('query');
			  }
			$data = $this->KependudukanModel->daftar_penduduk($query);
			if ($data->num_rows() > 0) {
				$no = 1;
				foreach ($data->result() as $dp) {
				if ($dp->foto == '') {
					$foto = base_url('assets/images/default.jpg');
				}else{
					$foto = base_url("assets/images/penduduk/$dp->foto");
				}
				$html .= '<tr>
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
	}
	
	/* End of file Data_Penduduk.php */
	/* Location: ./application/controllers/admin/Data_Penduduk.php */
 ?>