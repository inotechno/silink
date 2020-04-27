<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller {
	
		public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('status')!='login') {
                redirect('login','refresh');
            }

            $this->load->model('UserModel');
        }
        public function index()
        {
            $this->load->view('partials/01head');
            $this->load->view('partials/02header');
            $this->load->view('partials/03sidebar');
            $this->load->view('admin/user');
            $this->load->view('partials/05footer');
            $this->load->view('partials/06plugin');
            $this->load->view('partials/services/user');
        }

        public function show_user()
        {
        	$html = '';
        	$ganti_status = '';
			$result = $this->UserModel->daftar_user();
			if ($result->num_rows() > 0) {
			$no = 1;
				foreach ($result->result() as $dp) {
				if ($dp->status == 'Aktif') {
					$ganti_status = 'Tidak Aktif';
				}else{
					$ganti_status = 'Aktif';
				}
				$html .= '<tr>
								<td class="text-center align-middle">
										<a class="dropdown-toggle btn btn-outline-info btn-sm" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											<span class="fa fa-list"></span>
										</a>
										<div class="dropdown-menu">
				                            <a href="javascript:void(0);" class="dropdown-item ubah_user" data-user="'.$dp->username.'" data-nama="'.$dp->nama_lengkap.'" data-email="'.$dp->email.'" data-level="'.$dp->id_level.'"><span class="fas fa-pencil-alt"></span> Edit Data</a>
				                            <a href="javascript:void(0);" class="dropdown-item hapus_user" data-nama="'.$dp->nama_lengkap.'" data-user="'.$dp->username.'"><span class="fas fa-trash-alt"></span> Hapus Data</a>
				                            <a href="javascript:void(0);" class="dropdown-item ubah_status" data-user="'.$dp->username.'"  data-ganti="'.$ganti_status.'">Ganti Status '.$ganti_status.'</a>
				                        </div>
		                        </td>
		                        <td class="align-middle text-center">'.$no++.'</td>
		                        <td class="align-middle">'.$dp->nama_lengkap.'</td>
		                        <td class="align-middle">'.$dp->nama_akses.'</td>
		                        <td class="align-middle">'.$dp->username.'</td>
		                        <td class="align-middle">'.$dp->email.'</td>
		                        <td class="align-middle">'.$dp->status.'</td>
		                   </tr>';
					}
				} else {
					$html .= '<tr>
								<td colspan="6" class="text-center">Tidak Ada Data</td>
							</tr>';
				}
			echo $html;
		}

		public function add_user()
		{
			$output = array('error' => false);
			$data['id_user'] = $this->input->post('id_user');
			$data['username'] = $this->input->post('username');
			$data['password'] = md5($this->input->post('password'));
			$data['email'] = $this->input->post('email');
			$data['id_level'] = $this->input->post('id_level');
			$data['status'] = 'Aktif';

			$validasi = $this->db->get_where('user_aktif', array('username' => $data['username'] ));
			if ($validasi->num_rows() != '') {
				$output['error'] = true;
				$output['message'] = 'Username Sudah Terdaftar';
			}else{
				$output['error'] = false;
				$output['message'] = 'Data Berhasil Di Tambahkan';
				$result = $this->UserModel->tambah_data($data);
			}
			helper_log("add", "menambah data user");
			echo json_encode($output);

		}
				
		public function update_user()
		{
			$username = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['id_level'] = $this->input->post('id_level');

			$result = $this->UserModel->ubah_user($username, $data);
			echo json_encode($result);
			helper_log("edit", "mengubah data user");
		}

		public function delete_user()
		{
			$username = $this->input->post('username');

			$result = $this->UserModel->hapus_user($username);
			echo json_encode($result);
			helper_log("del", "menghapus data user");
		}

		public function change_status()
		{
			$username = $this->input->post('username');
			$status = $this->input->post('status');

			$result = $this->UserModel->ganti_status($username, $status);
			echo json_encode($result);
			helper_log("ganti", "mengganti data user");
		}
	}
	
	/* End of file User.php */
	/* Location: ./application/controllers/admin/User.php */
 ?>