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
        					<th class="align-middle">No</th>
        					<th class="align-middle">Jenis Sumbangan</th>
        					<th class="align-middle">Nilai Sumbangan</th>
        					<th class="align-middle">Nama Pemberi</th>
        					<th class="align-middle">Tanggal</th>
        				</thead>
        				<tbody id="show_data_sumbangan"></tbody>
        			</table>
        		</div>
        	</div>

		</div>
    </div>
</div>

<!-- Modal Delete Penduduk -->
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