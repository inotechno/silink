
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <form>
                        <div class="row">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nama Lingkungan</label>
                                    <input type="text" name="nama_lingkungan" class="form-control">
                                </div>
                            </div>

                            <div class="col-md">
                                 <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="prov" class="form-control">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" name="kota" class="form-control">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kec" class="form-control">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" name="kel" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input type="number" name="rt" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>RW</label>
                                            <input type="number" name="rw" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Ketua RT</label>
                                    <select name="id_rt" class="form-control">
                                        <?php 
                                            $warga = $this->db->get('penduduk')->result();
                                            foreach ($warga as $wr) {?>
                                            <option value="<?= $wr->id ?>"><?= $wr->nama_lengkap ?></option>
                                        <?php }?>  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-info float-right btn-setting">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
