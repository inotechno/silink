 <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="card-body b-l calender-sidebar">
                                        <button type="button" class="btn btn-sm btn-outline-info" id="add_kegiatan" data-target="#tambah_kegiatan" data-toggle="modal">Tambah</button>
                                        <div id="calendar"></div>
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

            <!-- Modal Tambah Kegiatan -->
            <!-- ============================================================== -->

            <div id="tambah_kegiatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambah_kegiatan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content modal-filled bg-warning">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <form method="post">

                                    <div class="form-group">
                                        <label>Judul Kegiatan</label>
                                        <input type="text" name="title" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Mulai Tanggal</label>
                                        <input type="datetime-local" name="start" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="datetime-local" name="end" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Warna</label>
                                        <input type="color" name="color" class="form-control form-control-sm">
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-light btn-rounded my-2" data-dismiss="modal">Batal</button>
                            <button type="submit" id="btn-add-kegiatan" class="btn btn-sm btn-rounded btn-success">Simpan</button>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <!-- Modal Tambah Kegiatan -->
            <!-- ============================================================== -->

            <div id="update_kegiatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update_kegiatan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content modal-filled bg-info">
                        <div class="modal-header bg-light">
                            <button class="btn btn-outline-danger btn-sm" data-target="#delete_kegiatan" data-dismiss="modal" data-toggle="modal"><span class="fa fa-trash-alt"></span> Hapus Kegiatan</button>
                        </div>
                        <div class="modal-body p-4">
                                <form>
                                    <input type="text" name="id_edit" value="" hidden="">
                                    <div class="form-group">
                                        <label>Judul Kegiatan</label>
                                        <input type="text" name="title_edit" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Mulai Tanggal</label>
                                        <input type="datetime-local" name="start_edit" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="datetime-local" name="end_edit" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label>Warna</label>
                                        <input type="color" name="color_edit" class="form-control form-control-sm">
                                    </div>

                                </form>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-sm btn-light btn-rounded my-2" data-dismiss="modal">Batal</button>
                            <button type="submit" id="btn-edit-kegiatan" class="btn btn-sm btn-rounded btn-success">Simpan</button>

                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <!-- Modal Delete Kegiatan -->
            <!-- ============================================================== -->

            <div id="delete_kegiatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update_kegiatan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content modal-filled bg-danger">
                        <div class="modal-body text-center">
                            Apakah Anda Yakin ingin Menghapus Kegiatan <span id="title_hapus"></span> ? <input type="text" hidden="" name="id_hapus">
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-sm btn-light btn-rounded my-2" data-dismiss="modal">Batal</button>
                            <button type="submit" id="btn-delete-kegiatan" class="btn btn-sm btn-rounded btn-success">Hapus</button>

                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
