
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <form autocomplete="off">
                        <div class="row">
                            <input type="hidden" name="id">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" readonly="">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Ganti Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="konfir_password" class="form-control">
                                </div>
                                <div id="cek-password" class="invalid-feedback"></div>

                            </div>

                        </div>

                    </form>
                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-info float-right btn-update">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
