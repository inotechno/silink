
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
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col table-responsive">
                                        
                                        <table class="table table-bordered table-striped table-hover no-wrap small table-sm" id="keluarga">
                                            <thead class="text-center">
                                                <th class="align-middle p-2">AKSI</th>
                                                <th class="align-middle">NO</th>
                                                <th class="align-middle">NOMOR KK</th>
                                                <th class="align-middle">KEPALA KELUARGA</th>
                                                <th class="align-middle">JUMLAH ANGGOTA</th>
                                                <th class="align-middle">KARTU KELUARGA</th>

                                            </thead>
                                            <tbody id="show_data_keluarga"></tbody>
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
        <!-- Modal Delete Penduduk -->
        <!-- ============================================================== -->

        <div id="viewModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
            <div class="modal-dialog modal-full-width">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="viewModalTitle">DATA KELUARGA <span class="nama_kk"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <table class="mb-5">
                            <tr style="border-bottom: 0.2px solid #D1D1D1;">
                                <td class="p-2">NOMOR KARTU KELUARGA</td>
                                <td>:</td>
                                <td><span id="nomor_kk"></span></td>
                            </tr>
                            <tr style="border-bottom: 0.2px solid #D1D1D1;">
                                <td class="p-2">NAMA KEPALA KELUARGA</td>
                                <td>:</td>
                                <td><span class="nama_kk"></span></td>
                            </tr>
                        </table>
                        <div class="table-responsive">
                            <table class="table no-wrap table-sm table-bordered table-hover table-striped" style="font-size: 12px;">
                                <thead class="bg-light">
                                    <th class="align-middle">NO</th>
                                    <th class="align-middle">FOTO</th>
                                    <th class="align-middle">NIK</th>
                                    <th class="align-middle">NAMA LENGKAP</th>
                                    <th class="align-middle">JENIS KELAMIN</th>
                                    <th class="align-middle">TEMPAT LAHIR</th>
                                    <th class="align-middle">TANGGAL LAHIR</th>
                                    <th class="align-middle">AGAMA</th>
                                    <th class="align-middle">PEKERJAAN</th>
                                    <th class="align-middle">PENDIDIKAN</th>
                                    <th class="align-middle">STATUS PERNIKAHAN</th>
                                    <th class="align-middle">STATUS</th>
                                </thead>
                                <tbody id="show_data_anggota_keluarga"></tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div id="ganti-kk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ganti-kk" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="viewModalTitle">UPLOAD KARTU KELUARGA <span class="nama_kk"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        
                        <form enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <input type="hidden" name="no_kk">
                                <label>Upload</label>
                                <input type="file" name="kk" class="form-control-file" required accept=".gif, .jpg, .png, .jpeg">
                            </div>

                            <button id="save-kk" class="btn btn-primary btn-sm btn-success">Kirim</button>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>