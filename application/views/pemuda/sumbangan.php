<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
        	<div class="card">
        		<div class="card-header text-white bg-info">
        			<h4 class="mb-0">Jenis Sumbangan</h4>
				</div>
        		<div class="card-body table-responsive p-1">
        			<table style="font-size: 12px" class="table table-sm table-hover" id="data_jenis_sumbangan">
        				<thead class="text-center">
        					<th class="align-middle"></th>
        					<th class="align-middle">No</th>
        					<th class="align-middle">Jenis Sumbangan</th>
        					<th class="align-middle">Tanggal</th>
        					<th class="align-middle">Sudah Dibayar</th>
        				</thead>
        				
        				<tbody id="show_data_jenis_sumbangan"></tbody>
        			</table>
        		</div>
        		<div class="card-footer bg-info p-1">
        			<button class="btn btn-sm btn-success p-1 btn-flat" type="button" id="btn_tambah_data">
                        <span class="fa fa-plus-circle fa-lg"></span>
                    </button>
                    <button class="btn btn-sm btn-warning p-1 btn-flat" type="button" id="btn_refresh">
                        <span class="fa fa-sync-alt text-white fa-lg" data-toggle="tooltip" title="Refresh"></span>
                    </button>
        		</div>
        	</div>
		</div>

		<div class="col-md-8">

			<div class="card">
        		<div class="card-header text-white bg-success">
        			<h4 class="mb-0">Daftar Sumbangan</h4>
				</div>
        		<div class="card-body table-responsive p-1">
        			<table style="font-size: 12px" class="table table-sm">
        				<thead>
                            <th class="align-middle text-center">Aksi</th>
        					<th class="align-middle text-center">No</th>
        					<th class="align-middle">Jenis Sumbangan</th>
        					<th class="align-middle">Nilai Sumbangan</th>
        					<th class="align-middle">Nama Pemberi</th>
        					<th class="align-middle">Tanggal</th>
        				</thead>
        				<tbody id="show_data_sumbangan"></tbody>
        			</table>
        		</div>

        		<div class="card-footer bg-info p-1">
        			<button class="btn btn-sm btn-success p-1 btn-flat" type="button" id="btn_tambah_data_sumbangan">
                        <span class="fa fa-plus-circle fa-lg"></span>
                    </button>
        		</div>
        	</div>

		</div>
    </div>
</div>

<!-- Modal Add Jenis Sumbangan -->
<!-- ============================================================== -->

<div id="add_jenis_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-warning">
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">

            			<div class="form-group">
            				<label>Jenis Sumbangan</label>
            				<input type="text" name="jenis_sumbangan" class="form-control">
            			</div>

            			<div class="form-group">
            				<label>Tanggal Mulai</label>
            				<input type="date" name="mulai_sumbangan" class="form-control">
            			</div>

            			<div class="form-group">
            				<label>Tanggal Selesai</label>
            				<input type="date" name="selesai_sumbangan" class="form-control">
            			</div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                    	<button type="button" class="btn btn-info btn-sm" id="btn-add-sumbangan">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Ubah Jenis Sumbangan -->
<!-- ============================================================== -->

<div id="edit_jenis_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-warning">
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">

            			<input hidden type="text" name="id_jenis_edit" class="form-control">
            			<div class="form-group">
            				<label>Jenis Sumbangan</label>
            				<input type="text" name="jenis_sumbangan_edit" class="form-control">
            			</div>

            			<div class="form-group">
            				<label>Tanggal Mulai</label>
            				<input type="date" name="mulai_sumbangan_edit" class="form-control">
            			</div>

            			<div class="form-group">
            				<label>Tanggal Selesai</label>
            				<input type="date" name="selesai_sumbangan_edit" class="form-control">
            			</div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                    	<button type="button" class="btn btn-info btn-sm" id="btn-edit-jenis-sumbangan">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Ubah Jenis Sumbangan -->
<!-- ============================================================== -->

<div id="hapus_jenis_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-warning">
            <div class="modal-body p-4">
                <div class="text-center">
                    Anda Yakin Ingin Menghapus Jenis Sumbangan Ini dan Akan Menghapus Semua Sumbangan Dari Jenis ini ?
                    <input type="text" name="id_jenis_hapus" hidden>
                    <div class="mt-2">
	                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
	                    <button type="button" class="btn btn-info btn-sm" id="btn-hapus-jenis-sumbangan">Ya</button>
	                </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Add Sumbangan -->
<!-- ============================================================== -->

<div id="add_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
        	<div class="modal-header">
        		<h4 class="modal-title">Tambah Data Sumbangan</h4>
        	</div>
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Jenis Sumbangan</label>
                                    <select class="form-control form-control-sm" name="jenis_sumbangan_warga">
                                        <?php 
                                            $jenis = $this->db->get('jenis_sumbangan_warga')->result();
                                            foreach ($jenis as $jn) {?>
                                            <option value="<?= $jn->id_jenis ?>"><?= $jn->nama_sumbangan ?></option>
                                        <?php }?>  
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nilai Sumbangan</label>
                                    <input type="number" name="nilai_sumbangan_warga" class="form-control form-control-sm">
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Sumbangan Dari</label>
                                    <select class="form-control form-control-sm" name="sumbangan_dari_warga">   
                                    <?php 
                                        $warga = $this->db->get('penduduk')->result();
                                        foreach ($warga as $wr) {?>
                                        <option value="<?= $wr->id ?>"><?= $wr->nama_lengkap ?></option>
                                    <?php }?>    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal_sumbangan_warga" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                    	<button type="button" class="btn btn-info btn-sm" id="btn-add-sumbangan-warga">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Edit Sumbangan -->
<!-- ============================================================== -->

<div id="edit_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Sumbangan</h4>
            </div>
            <div class="modal-body p-4">
                <div class="text-center">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" name="edit_id_sumbangan_warga" hidden>
                                <div class="form-group">
                                    <label>Jenis Sumbangan</label>
                                    <select class="form-control form-control-sm" name="edit_jenis_sumbangan_warga">
                                        <?php 
                                            $jenis = $this->db->get('jenis_sumbangan_warga')->result();
                                            foreach ($jenis as $jn) {?>
                                            <option value="<?= $jn->id_jenis ?>"><?= $jn->nama_sumbangan ?></option>
                                        <?php }?>  
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nilai Sumbangan</label>
                                    <input type="number" name="edit_nilai_sumbangan_warga" class="form-control form-control-sm">
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Sumbangan Dari</label>
                                    <select class="form-control form-control-sm" name="edit_sumbangan_dari_warga">   
                                    <?php 
                                        $warga = $this->db->get('penduduk')->result();
                                        foreach ($warga as $wr) {?>
                                        <option value="<?= $wr->id ?>"><?= $wr->nama_lengkap ?></option>
                                    <?php }?>    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="edit_tanggal_sumbangan_warga" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                           

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn-edit-sumbangan-warga">Simpan</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Delete Sumbangan -->
<!-- ============================================================== -->

<div id="hapus_sumbangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled bg-warning">
            <div class="modal-body p-4">
                <div class="text-center">
                    Anda Yakin Ingin Menghapus Data Sumbangan ini ?
                    <input type="text" name="id_sumbangan_hapus" hidden>
                    <div class="mt-2">
                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn-hapus-sumbangan">Ya</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
