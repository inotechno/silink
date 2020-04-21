
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
                                        <button class="btn btn-sm btn-success" type="button" id="btn_tambah_data">
                                            <span class="fas fa-plus-square fa-lg"></span>
                                        </button>

                                    </div>

                                    <div class="col-sm-4 col-md-3 float-right">
                                        <input type="text" name="search_text" class="form-control form-control-sm" placeholder="Search" id="search_text">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col table-responsive">
                                        
                                        <table class="table table-striped table-hover no-wrap small table-sm" id="Pemuda" >
                                            <thead class="text-center">
                                                <th class="align-middle p-2">Aksi</th>
                                                <th class="align-middle">No</th>
                                                <th class="align-middle" hidden="">ID</th>
                                                <th class="align-middle">Foto</th>
                                                <th class="align-middle">Nama Lengkap</th>
                                                <th class="align-middle">Tempat Lahir</th>
                                                <th class="align-middle">Tanggal Lahir</th>
                                                <th class="align-middle">Jenis Kelamin</th>
                                                <th class="align-middle">Jabatan</th>
                                            </thead>
                                            <tbody id="show_data_pemuda"></tbody>
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
            

            <!-- Modal Create Pemuda -->
            <!-- ============================================================== -->

            <div id="add_modal_pemuda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="primary-header-modalLabel">Tambah Data Pemuda
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="form_submit">
                                <div>
                                    <div class="card my-1 rows">
                                        <div class="card-body p-1">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <select class="form-control select-nama" name="id_penduduk[]" required>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <select class="form-control select-jabatan" name="jabatan[]" required>
                                                            <option value="1">Ketua Pemuda</option>
                                                            <option value="2">Sekretaris</option>
                                                            <option value="3">Bendahara</option>
                                                            <option value="4">Anggota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div id="insert-form"></div>
                                <button type="button" class="btn btn-primary btn-sm btn-add-more"><span class="fa fa-plus"></span></button>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success" id="btn_submit_pemuda">Simpan</button>
                        </div>
                            <input type="hidden" value="1" id="jumlah-form">

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Modal Delete Pemuda -->
            <!-- ============================================================== -->

            <div id="delete_modal_pemuda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete_modal_pemuda" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content modal-filled bg-warning">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <h4 class="mt-2"><i class="fa fa-exclamation-triangle"></i> Hati-Hati !</h4>
                                <input type="hidden" name="id" id="textid" value="">
                                <p class="mt-3">Anda Akan Menghapus Data <span id="hapusnama"></span> ? Dari Daftar Pemuda, Sebagai <span id="hapusjabatan"></span></p>
                                <button type="button" class="btn btn-sm btn-light btn-rounded my-2" data-dismiss="modal">Batal</button>
                                <button type="button" id="delete_btn" class="btn btn-sm btn-rounded btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <!-- Modal Update Pemuda -->
            <!-- ============================================================== -->

            <div id="edit_modal_pemuda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="primary-header-modalLabel">Ubah Data Pemuda
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="form-edit">
                                <div class="card my-1 rows">
                                    <div class="card-body p-1">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="id_pemuda" hidden class="form-control">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control edit-select-nama">
                                                </div>
                                            </div>

                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <select class="form-control select-jabatan" name="jabatan">
                                                        <option value="1">Ketua Pemuda</option>
                                                        <option value="2">Sekretaris</option>
                                                        <option value="3">Bendahara</option>
                                                        <option value="4">Anggota</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
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