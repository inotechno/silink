<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white bg-info">
                    <h4 class="mb-0">Daftar Peminjam</h4>
                </div>
                <div class="card-body table-responsive p-1">
                    <table style="font-size: 12px" class="table table-sm table-hover" id="daftar_peminjam">
                        <thead class="text-center">
                            <th class="align-middle">Aksi</th>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Peminjam</th>
                            <th class="align-middle">Nama Barang</th>
                            <th class="align-middle">Jumlah Barang</th>
                            <th class="align-middle">Tanggal Pinjam</th>
                            <th class="align-middle">Tanggal Kembali</th>
                        </thead>
                        
                        <tbody id="show_daftar_peminjam"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-white bg-success">
                    <h4 class="mb-0">Daftar Barang <button data-toggle="modal" data-target="#add_barang" type="button" class="float-right btn-success btn btn-sm"><span class="fas fa-plus"></span></button></h4>
                </div>
                <div class="card-body table-responsive p-1">
                    <table style="font-size: 12px" class="table table-sm">
                        <thead>
                            <th class="align-middle text-center">Aksi</th>
                            <th class="align-middle text-center">No</th>
                            <th class="align-middle">Nama Barang</th>
                            <th class="align-middle">Satuan</th>
                            <th class="align-middle">Jumlah Barang</th>
                            <th class="align-middle">Status</th>
                        </thead>
                        <tbody id="show_daftar_barang"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Add Barang -->
<!-- ============================================================== -->

<div id="add_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control" name="satuan">
                                        <option value="Pcs">Pcs</option>
                                        <option value="Unit">Unit</option>
                                        <option value="Lusin">Lusin</option>
                                        <option value="Gram">Gram</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control">
                                </div>
                            </div>
                            

                        </div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn-add-barang">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Add Pinjaman -->
<!-- ============================================================== -->

<div id="add_pinjaman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_pinjaman" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">
                        <input type="hidden" name="id_barang">

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <select name="id_penduduk" class="form-control">
                                    <?php 
                                        $penduduk = $this->db->get('penduduk')->result();
                                        foreach ($penduduk as $p) {?>
                                            <option value="<?= $p->id ?>"><?= $p->nama_lengkap ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        

                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah_pinjaman" class="form-control">
                            </div>


                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn-add-pinjaman">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Hapus Barang -->
<!-- ============================================================== -->

<div id="hapus_pinjaman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hapus_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <input type="hidden" name="id_peminjam_hapus">
                    <input type="hidden" name="id_barang_hapus">
                    <h4>Yakin Ingin Menghapus Barang <span id="nama_lengkap_hapus"></span></h4>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-outline-info btn-sm" id="btn-delete-pinjaman">Ya</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Pinjaman Selesai -->
<!-- ============================================================== -->

<div id="selesai_pinjaman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hapus_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-info">
            <div class="modal-body p-4">
                <div class="text-center">
                    <input type="hidden" name="id_peminjam">
                    <input type="hidden" name="id_barang">
                    <h4>Apakah Barang ini Sudah Di Kembalikan</h4>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-success btn-sm" id="btn-selesai-pinjaman">Ya</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Barang Habis -->
<!-- ============================================================== -->

<div id="barang_habis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="barang_habis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <h4>Barang Tidak Tersedia, Silahkan Cek Status Pinjaman Barang !!!</h4>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Edit Barang -->
<!-- ============================================================== -->

<div id="edit_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">
                        <input type="hidden" name="id_barang_edit">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang_edit" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control" name="satuan_edit">
                                        <option value="Pcs">Pcs</option>
                                        <option value="Unit">Unit</option>
                                        <option value="Lusin">Lusin</option>
                                        <option value="Gram">Gram</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah_edit" class="form-control">
                                </div>
                            </div>
                            

                        </div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn-edit-barang">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Hapus Barang -->
<!-- ============================================================== -->

<div id="hapus_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hapus_barang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <input type="hidden" name="id_barang_hapus">
                    <h4>Yakin Ingin Menghapus Barang <span id="nama_barang_hapus"></span></h4>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-outline-info btn-sm" id="btn-delete-barang">Ya</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Hapus Barang Pinjam -->
<!-- ============================================================== -->

<div id="hapus_barang_pinjam" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hapus_barang_pinjam" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <h4>Barang Tidak Bisa Dihapus, Silahkan Cek Status Pinjaman Barang !!!</h4>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>