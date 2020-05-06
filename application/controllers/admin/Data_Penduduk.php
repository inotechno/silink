<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Penduduk extends CI_Controller {
		
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
            $this->load->view('admin/data_penduduk');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
       		$this->load->view('partials/services/penduduk');
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
	                        <td style="text-align:right;" class="align-middle">
	                        	<a class="dropdown-toggle btn btn-outline-info btn-sm" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

										<span class="fa fa-list"></span>
								</a>
								<div class="dropdown-menu p-1">
		                            <a href="javascript:void(0);" class="dropdown-item btn btn-sm item_edit" data-id="'.$dp->id.'">Ubah Data</a>
		                            <a href="javascript:void(0);" class="dropdown-item btn btn-sm item_delete" data-id="'.$dp->id.'" data-nama="'.$dp->nama_lengkap.'">Hapus Data</a>
		                        </div>

	                        </td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td hidden>'.$dp->id.'</td>
	                        <td class="align-middle">
	                        	<a target="_blank" href="'.$foto.'"><img class="" width="40" height="50" src="'.$foto.'"></a>
	                        </td>
	                        <td class="align-middle">'.$dp->nik.'</td>
	                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
	                        <td class="align-middle">'.$dp->no_kk.'</td>
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

		public function export()
		{
			$query = '';

		    // Load plugin PHPExcel nya
		    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		    
		    // Panggil class PHPExcel nya
		    $excel = new PHPExcel();
		    // Settingan awal fil excel
		    $excel->getProperties()->setCreator('Basis Coding')
		                 ->setLastModifiedBy('Basis Coding')
		                 ->setTitle("Data Penduduk")
		                 ->setSubject("Penduduk")
		                 ->setDescription("Laporan Semua Data Penduduk")
		                 ->setKeywords("Data Penduduk");
		    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		    $style_col = array(
		      'font' => array('bold' => true), // Set font nya jadi bold
		      'alignment' => array(
		        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		      ),
		      'borders' => array(
		        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		      )
		    );
		    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		    $style_row = array(
		      'alignment' => array(
		        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		      ),
		      'borders' => array(
		        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		      )
		    );
		    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENDUDUK"); // Set kolom A1 dengan tulisan "DATA SISWA"
		    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

		    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIK");
		    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA LENGKAP");
		    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN");
		    $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO KK"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('F3', "TEMPAT LAHIR"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL LAHIR"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('H3', "AGAMA"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('I3', "PEKERJAAN"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('J3', "PENDIDIKAN"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('K3', "STATUS PERKAWINAN"); 
		    $excel->setActiveSheetIndex(0)->setCellValue('L3', "STATUS"); 

		    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
			
			$data_penduduk = $this->KependudukanModel->daftar_penduduk($query)->result();
		    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
		    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		    foreach($data_penduduk as $data){ // Lakukan looping pada variabel siswa
		      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nik);
		      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_lengkap);
		      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
		      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->no_kk);
		      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tempat_lahir);
		      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tanggal_lahir);
		      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->agama);
		      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->pekerjaan);
		      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->pendidikan);
		      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->status_kawin);
		      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->status);
		      
		      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		   	  $excel->getActiveSheet()->getStyle('B'.$numrow)->getNumberFormat()->setFormatCode('#');
		      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		   	  $excel->getActiveSheet()->getStyle('E'.$numrow)->getNumberFormat()->setFormatCode('#');
		      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		      
		      $no++; // Tambah 1 setiap kali looping
		      $numrow++; // Tambah 1 setiap kali looping
		    }
		    // Set width kolom
		    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
		    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
		    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		    
		    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		    // Set orientasi kertas jadi LANDSCAPE
		    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		    // Set judul file excel nya
		    $excel->getActiveSheet(0)->setTitle("Laporan Data Penduduk");
		    $excel->setActiveSheetIndex(0);
		    // Proses file excel
		    ob_end_clean();
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="Data Penduduk.xlsx"'); // Set nama file excel nya
		    header('Cache-Control: max-age=0');
		    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		    $write->save('php://output');
		}

		// Non Penduduk

		public function daftar_nonpenduduk()
		{
			$html = '';
			$query = '';

			if($this->input->post('query'))
			  {
			   $query = $this->input->post('query');
			  }
			$data = $this->KependudukanModel->daftar_nonpenduduk($query);
			if ($data->num_rows() > 0) {
				$no = 1;
				foreach ($data->result() as $dp) {
				if ($dp->foto == '') {
					$foto = base_url('assets/images/default.jpg');
				}else{
					$foto = base_url("assets/images/penduduk/$dp->foto");
				}
				$html .= '<tr>
	                        <td class="align-middle text-center">
	                        	<div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox" id="'.$dp->id.'" value="'.$dp->id.'">
                                    <label class="custom-control-label" for="'.$dp->id.'"></label>
                                </div>
	                        </td>
	                        <td class="align-middle text-center">'.$no++.'</td>
	                        <td hidden>'.$dp->id.'</td>
	                        <td class="align-middle">
	                        	<a target="_blank" href="'.$foto.'"><img class="" width="40" height="50" src="'.$foto.'"></a>
	                        </td>
	                        <td class="align-middle">'.$dp->nik.'</td>
	                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
	                        <td class="align-middle">'.$dp->no_kk.'</td>
	                        <td class="align-middle">'.$dp->tempat_lahir.'</td>
	                        <td class="align-middle">'.date("d-m-Y", strtotime($dp->tanggal_lahir)).'</td>
	                        <td class="align-middle">'.$dp->jenis_kelamin.'</td>
	                    </tr>';
				}
			} else {
				$html .= '<tr>
							<td colspan="14" class="text-center">Tidak Ada Data</td>
							</tr>';
			}
			echo $html;
		}

		public function update_aktif()
		{
			$id_all = $this->input->post('id');

			foreach ($id_all as $id) {
				$data['created_at'] = date('Y-m-d H:i:s');
				$data['created_by'] = $this->session->userdata('id');

				$result = $this->KependudukanModel->ubah_penduduk($id, $data);
			}

			echo json_encode($result);
		}

		public function delete_aktif()
		{
			$id_all = $this->input->post('id');

			foreach ($id_all as $id) {
				$result = $this->KependudukanModel->hapus_penduduk($id);
			}

			echo json_encode($result);
		}
	}
	
	/* End of file Data_Penduduk.php */
	/* Location: ./application/controllers/admin/Data_Penduduk.php */
 ?>