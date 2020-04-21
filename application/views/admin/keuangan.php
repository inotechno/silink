
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex d-lg-flex d-lg-block align-items-center">
                                            <div>
                                                <div class="d-inline-flex align-items-center">
                                                    <h3 class="text-dark mb-1 font-weight-medium" id="infocredit"></h3>
                                                    <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" id="persencredit"></span>
                                                </div>
                                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Credit</h6>
                                            </div>
                                            <div class="ml-auto mt-md-3 mt-lg-0">
                                                <span class="fas fa-arrow-circle-up fa-2x text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex d-lg-flex d-lg-block align-items-center">
                                            <div>
                                                <div class="d-inline-flex align-items-center">
                                                    <h3 class="text-dark mb-1 font-weight-medium" id="infodebit"></h3>
                                                    <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" id="persendebit"></span>
                                                </div>
                                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Debit</h6>
                                            </div>
                                            <div class="ml-auto mt-md-3 mt-lg-0">
                                                <span class="fas fa-arrow-circle-down fa-2x text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex d-lg-flex d-lg-block align-items-center">
                                            <div>
                                                <div class="d-inline-flex align-items-center">
                                                    <h3 class="text-dark mb-1 font-weight-medium" id="totalkeuangan"></h3>
                                                </div>
                                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Keuangan</h6>
                                            </div>
                                            <div class="ml-auto mt-md-3 mt-lg-0">
                                                <span class="fas fa-dollar-sign fa-2x text-info"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        

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
                                        
                                        <table class="table table-striped table-bordered table-hover no-wrap small table-sm" id="keuangan" >
                                            <thead class="text-center">
                                                <th class="align-middle p-2">AKSI</th>
                                                <th class="align-middle">NO</th>
                                                <th class="align-middle">NO TRANSAKSI</th>
                                                <th class="align-middle">JENIS TRANSAKSI</th>
                                                <th class="align-middle">NILAI</th>
                                                <th class="align-middle">CATATAN</th>
                                                <th class="align-middle">TANGGAL</th>
                                            </thead>
                                            <tbody id="show_data_keuangan"></tbody>
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

            <div id="add_modal_keuangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-success">
                            <h4 class="modal-title" id="primary-header-modalLabel">Tambah Data Keuangan
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="add_keuangan">
                                <div class="row">
                                    <div class="col-md">

                                        <div class="form-group">
                                            <label>No Keuangan</label>
                                            <input type="text" name="no_keuangan" readonly class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Nilai Dalam Rupiah</label>
                                            <input type="number" name="nilai_keuangan" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md">

                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <textarea name="catatan" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Keuangan</label>
                                            <select name="jenis_keuangan" class="form-control">
                                                <option value="debit">Debit</option>
                                                <option value="credit">Credit</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success" id="btn_submit_keuangan">Simpan</button>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- Modal Update Keuangan -->
            <!-- ============================================================== -->

            <div id="edit_modal_keuangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addmodal_label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-info">
                            <h4 class="modal-title" id="primary-header-modalLabel">Ubah Data Pemuda
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="edit_keuangan">
                                <div class="row">
                                    <div class="col-md">
                                        <input type="text" name="id" hidden class="form-control">

                                        <div class="form-group">
                                            <label>No Keuangan</label>
                                            <input type="text" name="no_keuangan_edit" readonly class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Nilai Dalam Rupiah</label>
                                            <input type="number" name="nilai_keuangan_edit" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md">

                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <textarea name="catatan_edit" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Keuangan</label>
                                            <select name="jenis_keuangan_edit" class="form-control">
                                                <option value="debit">Debit</option>
                                                <option value="credit">Credit</option>
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