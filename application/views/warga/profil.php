
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form enctype="multipart/form-data" id="tambahPenduduk">
                                    <div class="row">

                                        <div class="col-md">
                                            <div class="preview text-center mb-3">
                                                <img width="150" height="180" id="previewFoto" class="text-center" src="<?= base_url('assets/images/default.jpg') ?>">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="foto">Pilih Foto</label>
                                                <input type="file" class="form-control-file" id="foto" name="foto" accept=".gif, .jpg, .png, .jpeg">
                                            </div>

                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="number" class="form-control" id="nik" name="nik">
                                                <div id="cek-nik" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>NO KK</label>
                                                <input type="number" class="form-control" id="no_kk" name="no_kk">
                                                <div id="cek-no-kk" class="invalid-feedback"></div>
                                            </div>

                                        </div>

                                        <div class="col-md">
                                            
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control text-uppercase" name="nama_lengkap" id="nama_lengkap">
                                                <div id="cek-nama" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                                                <div id="cek-tempat-lahir" class="invalid-feedback"></div>
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
                                                    <option value="D3">D3</option>
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

                                    <button type="button" class="btn btn-outline-success" id="btn_add_data">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            