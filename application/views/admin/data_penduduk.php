
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm mb-2">
                                        
                                        <button class="btn btn-sm btn-primary" type="button"><span class="fa fa-file-excel"></span></button>
                                        <button class="btn btn-sm btn-primary" type="button"><span class="fa fa-file-pdf"></span></button>
                                        <button class="btn btn-sm btn-primary" type="button"><span class="fa fa-print"></span></button>
                                        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#addmodal">
                                            <span class="fas fa-plus-square fa-lg" data-toggle="tooltip" title="Tambah Data" ></span>
                                        </button>

                                    </div>

                                    <div class="col-sm-4 col-md-3 float-right">
                                        <input type="text" name="search_text" class="form-control form-control-sm" placeholder="Search" id="search_text">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col table-responsive">
                                        
                                        <table class="table table-striped table-hover no-wrap small table-sm" id="penduduk" >
                                            <thead class="text-center">
                                                <th class="align-middle p-2">Aksi</th>
                                                <th class="align-middle">No</th>
                                                <th class="align-middle" hidden="">ID</th>
                                                <th class="align-middle">Foto</th>
                                                <th class="align-middle">NIK</th>
                                                <th class="align-middle">Nama Lengkap</th>
                                                <th class="align-middle">KK</th>
                                                <th class="align-middle">Tempat Lahir</th>
                                                <th class="align-middle">Tanggal Lahir</th>
                                                <th class="align-middle">Jenis Kelamin</th>
                                                <th class="align-middle">Agama</th>
                                                <th class="align-middle">Pekerjaan</th>
                                                <th class="align-middle">Pendidikan</th>
                                                <th class="align-middle">Status Perkawinan</th>
                                                <th class="align-middle">Status</th>
                                            </thead>
                                            <tbody id="show_data"></tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            

            <!-- Modal Create Penduduk -->
            <!-- ============================================================== -->

            <div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="primary-header-modalLabel">Tambah Data Penduduk
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" id="tambahPenduduk">
                                <div class="row">

                                    <div class="col-md">
                                        <div class="preview text-center mb-3">
                                            <img width="150" height="180" id="previewFoto" class="text-center" src="<?= base_url('assets/images/default.jpg') ?>">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="foto">Pilih Foto</label>
                                            <input type="file" class="form-control-file" id="foto" name="foto">
                                        </div>

                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik">
                                        </div>

                                        <div class="form-group">
                                            <label>NO KK</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk">
                                        </div>

                                    </div>

                                    <div class="col-md">
                                        
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control text-uppercase" name="nama_lengkap" id="nama_lengkap">
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir">
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempun</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select id="agama" name="agama" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Katholik">Katholik</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md">

                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select id="pekerjaan" name="pekerjaan" class="form-control">
                                                <option value="Buruh">Buruh</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select id="pendidikan" name="pendidikan" class="form-control">
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D2">D2</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Perkawinan</label>
                                            <select id="status_perkawinan" name="status_perkawinan" class="form-control">
                                                <option value="0">Belum Kawin</option>
                                                <option value="1">Menikah</option>
                                                <option value="2">Janda/Duda</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Keluarga</label>
                                            <select id="status_keluarga" name="status_keluarga" class="form-control">
                                                <option value="1">Kepala Keluarga</option>
                                                <option value="2">Istri</option>
                                                <option value="3">Suami</option>
                                                <option value="4">Anak</option>
                                                <option value="5">Cucu</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Keluarga</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="Hidup">Hidup</option>
                                                <option value="Meninggal">Meninggal</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-success" id="btn_add_data">Simpan</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Modal Delete Penduduk -->
            <!-- ============================================================== -->

            <div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content modal-filled bg-warning">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <h4 class="mt-2"><i class="fa fa-exclamation-triangle"></i> Hati-Hati !</h4>
                                <input type="hidden" name="id" id="textid" value="">
                                <p class="mt-3">Anda Akan Menghapus Data <span id="hapusnama"></span> ?</p>
                                <button type="button" class="btn btn-sm btn-light btn-rounded my-2" data-dismiss="modal">Batal</button>
                                <button type="button" id="delete_btn" class="btn btn-sm btn-rounded btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <!-- Modal Update Penduduk -->
            <!-- ============================================================== -->

            <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Ubah Data Penduduk
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" id="updatependuduk">
                                <div class="row">
                                    <input type="hidden" name="id_edit" id="id_edit">
                                    <input type="hidden" name="foto_lama" id="foto_lama">
                                    <div class="col-md">
                                        <div class="preview text-center mb-3">
                                            <img width="150" height="180" id="previewFoto_Edit" class="text-center" src="<?= base_url('assets/images/default.jpg') ?>">
                                            <input id="ganti_foto" type="button" name="ganti_foto" class="col-md my-2 btn btn-sm btn-rounded btn-outline-warning" value="Ganti Foto">

                                        </div>

                                        <div class="form-group" id="upload_foto">
                                            <label for="foto_edit">Pilih Foto</label>
                                            <input type="file" class="form-control-file" id="foto_edit" name="foto_edit">
                                        </div>

                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="number" class="form-control" id="nik_edit" name="nik_edit">
                                        </div>

                                        <div class="form-group">
                                            <label>NO KK</label>
                                            <input type="number" class="form-control" id="no_kk_edit" name="no_kk_edit">
                                        </div>

                                    </div>

                                    <div class="col-md">
                                        
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control text-uppercase" name="nama_lengkap_edit" id="nama_lengkap_edit">
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir_edit" class="form-control" id="tempat_lahir_edit">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir_edit">
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select id="jenis_kelamin_edit" name="jenis_kelamin_edit" class="form-control">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select id="agama_edit" name="agama_edit" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Katholik">Katholik</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md">

                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select id="pekerjaan_edit" name="pekerjaan_edit" class="form-control">
                                                <option value="Buruh">Buruh</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select id="pendidikan_edit" name="pendidikan_edit" class="form-control">
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D2">D2</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Perkawinan</label>
                                            <select id="status_perkawinan_edit" name="status_perkawinan_edit" class="form-control">
                                                <option value="0">Belum Kawin</option>
                                                <option value="1">Menikah</option>
                                                <option value="2">Janda/Duda</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Keluarga</label>
                                            <select id="status_keluarga_edit" name="status_keluarga_edit" class="form-control">
                                                <option value="1">Kepala Keluarga</option>
                                                <option value="2">Istri</option>
                                                <option value="3">Suami</option>
                                                <option value="4">Anak</option>
                                                <option value="5">Cucu</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select id="status_edit" name="status_edit" class="form-control">
                                                <option value="Hidup">Hidup</option>
                                                <option value="Meninggal">Meninggal</option>
                                            </select>
                                        </div>                                        

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_edit_data">Simpan</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->