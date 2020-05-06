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
            $this->load->view('warga/data_penduduk');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/warga/penduduk');
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

		public function save_penduduk()
		{
			$config['upload_path'] = './assets/images/penduduk/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('nik');
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
			} else {
				$foto = '';
			}

			$data = array(
	 			'nik' 				=> $this->input->post('nik'),
	 			'no_kk' 			=> $this->input->post('no_kk'),
	 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
	 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
	 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
	 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
	 			'agama' 			=> $this->input->post('agama'),
	 			'pendidikan' 		=> $this->input->post('pendidikan'),
	 			'pekerjaan' 		=> $this->input->post('pekerjaan'),
	 			'status_keluarga'	=> $this->input->post('status_keluarga'),
	 			'status' 			=> $this->input->post('status'),
	 			'status_perkawinan' => $this->input->post('status_perkawinan'),
	 			'created_by' 		=> $this->session->userdata('id'),
	 			'foto' 				=> $foto
				 );

			$data = $this->KependudukanModel->simpan_penduduk($data);
			echo json_encode($data);
			helper_log("add", "Menambah data Penduduk");

		}

		public function update_penduduk()
		{
			$id = $this->input->post('id');

			$config['upload_path'] = './assets/images/penduduk/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('nik');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/images/penduduk/".$this->input->post('foto_lama'));
			} else {
				$foto = $this->input->post('foto_lama');
			} 
			$data = array(
	 			'nik' 				=> $this->input->post('nik'),
	 			'no_kk' 			=> $this->input->post('no_kk'),
	 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
	 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
	 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
	 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
	 			'agama' 			=> $this->input->post('agama'),
	 			'pendidikan' 		=> $this->input->post('pendidikan'),
	 			'pekerjaan' 		=> $this->input->post('pekerjaan'),
	 			'status' 			=> $this->input->post('status'),
	 			'status_keluarga' 	=> $this->input->post('status_keluarga'),
	 			'status_perkawinan' => $this->input->post('status_perkawinan'),
	 			'update_by' 		=> $this->session->userdata('id'),
	 			'foto'				=> $foto
				 );

			$data = $this->KependudukanModel->ubah_penduduk($id, $data);
			echo json_encode($data);
			helper_log("edit", "Mengubah data Penduduk");

		}	

		public function delete_penduduk()
		{
			$id = $this->input->post('id');

			$query = $this->db->get_where('penduduk', array('id' => $id ))->row();
	    	if ($query) {
				@unlink("./assets/images/penduduk/$query->foto");
			}
			$data = $this->KependudukanModel->hapus_penduduk($id);
			
			echo json_encode($data);
			helper_log("del", "Menghapus data Penduduk");

		}	

		public function search()
		{
			$keyword = $this->input->post('keyword');
			$data = $this->KependudukanModel->search($keywoard);
			echo json_encode($data);
		}

	}
	
	/* End of file Data_Penduduk.php */
	/* Location: ./application/controllers/admin/Data_Penduduk.php */
 ?>