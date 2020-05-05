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
        $this->load->view('partials/services/keluarga');
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
	                    <td class="align-middle text-center">'.$no++.'</td>
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
		$fotokk = '';
		$data = $this->KependudukanModel->daftar_keluarga();
		if ($data->num_rows() > 0) {
			$no = 1;
			foreach ($data->result() as $dp) {
			if ($dp->foto_kk != 0) {
				$fotokk = '<a class="btn btn-success btn-sm" href="'.base_url('assets/images/galeri/'.$dp->foto_kk).'" download>Download</a>';
			}else{
				$fotokk = '<span class="badge badge-warning text-white">KK Tidak Ada</span>';
			}
			$html .= '<tr>
                        <td class="align-middle text-center">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm item_view" data-kk="'.$dp->no_kk.'" data-namakk="'.$dp->nama_lengkap.'"><span class="fas fa-eye"></span></a>
                        </td>
                        <td class="align-middle text-center">'.$no++.'</td>
                        <td class="align-middle">'.$dp->no_kk.'</td>
                        <td class="align-middle">'.strtoupper($dp->nama_lengkap).'</td>
                        <td class="align-middle text-center">'.$dp->jumlah_anggota.'</td>
                        <td class="align-middle text-center">'.$fotokk.'<button class="ml-2 btn btn-sm btn-info upload_kk" data-kk="'.$dp->no_kk.'">Upload</button></td>
                    </tr>';
			}
		} else {
			$html .= '<tr>
						<td colspan="14" class="text-center">Tidak Ada Data</td>
						</tr>';
		}
		echo $html;
	}

	public function save_kk()
	{

		$config['upload_path'] = './assets/images/galeri/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1024';
        $config['file_name'] = $this->input->post('no_kk');
        $this->load->library('upload', $config);

        $cek = $this->db->get_where('galeri',array('id_galeri' => $this->input->post('no_kk')));
        if ($cek->num_rows() > 0) {
			$this->db->delete('galeri', array('id_galeri' => $this->input->post('no_kk'))); 
			@unlink("./assets/images/galeri/".$cek->row()->url);  	
        }

        if($this->upload->do_upload("kk")){
			$kk = $this->upload->file_name;
		} else {
			$kk = '';
		}

        $data = array(
        	'id_galeri' => $this->input->post('no_kk'),
         	'url'=>$kk,
         	'ket'=>$this->input->post('no_kk'),
         	'created_at'=>date('Y-m-d H:i:s')
         );

        $result = $this->KependudukanModel->simpan_kk($data);
        echo json_encode($result);
		helper_log("add", "Menambah File Kartu Keluarga");

	}

}

/* End of file Keluarga.php */
/* Location: ./application/controllers/admin/Keluarga.php */
?>