<div class="container-fluid">
	<div class="row">
	    <div class="col-12">

	            	<div class="row">

	            		<div class="col-md">
	            			<div class="card">
	            				<div class="card-header text-white bg-info">
									<h4 class="mb-0">Daftar User
                                        <button type="button" data-target="#add_user" data-toggle="modal" class="float-right text-white btn btn-sm btn-success" id="tambah_user"><span class="fa fa-plus"></span> Tambah User</button>
                                    </h4>
								</div>
	            				<div class="card-body table-responsive p-1">
	            					<table class="table table-sm table-hover table-striped">
	            						<thead>
	            							<th>Aksi</th>
	            							<th>No</th>
	            							<th>Nama Lengkap</th>
	            							<th>Level</th>
	            							<th>Username</th>
	            							<th>Email</th>
	            							<th>Status</th>
	            						</thead>
	            						<tbody id="show_user"></tbody>
	            					</table>
	            				</div>
	            			</div>
	            		</div>

	            	</div>

	    </div>
	</div>
</div>

<!-- Modal Ubah User -->
<!-- ============================================================== -->

<div id="update_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    
                    <form>
                    	<div class="form-group">
                    		<label>Nama Lengkap</label>
                    		<input type="text" name="nama_lengkap" disabled class="form-control">
                    	</div>

                    	<div class="form-group">
                    		<label>Username</label>
                    		<input type="text" name="username" disabled class="form-control">
                    	</div>

                    	<div class="form-group">
                    		<label>Email</label>
                    		<input type="text" name="email" class="form-control">
                    	</div>

                    	<div class="form-group">
                    		<label>Level</label>
                    		<select class="form-control" name="id_level">
                    			<option value="1">Administrator</option>
                                <option value="2">Pemuda</option>
                    			<option value="3">User</option>
                    		</select>
                    	</div>
                    </form>
                    
                </div>
            </div>

            <div class="modal-footer">
            	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-ubah-user">Ya</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Ubah User -->
<!-- ============================================================== -->

<div id="add_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    
                    <form>
                        <div class="row">
                            <div class="col-md"> 
                                <div class="form-group">
                                    <label>Pilih Penduduk</label>
                                    <select name="id_user_add" class="form-control">
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
                                    <label>Username</label>
                                    <input type="text" name="username_add" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email_add" class="form-control">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password_add" class="form-control">
                                </div>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="id_level_add">
                                <option value="1">Administrator</option>
                                <option value="2">Pemuda</option>
                                <option value="3">User</option>
                            </select>
                        </div>
                    </form>
                    
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-add-user">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- Modal Hapus User -->
<!-- ============================================================== -->

<div id="delete_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <input type="text" name="id_user" hidden>
                    Anda Yakin Ingin Menghapus Data User <span id="nama_user"></span> ??
                </div>
            </div>

            <div class="modal-footer">
            	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-hapus-user">Ya</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
