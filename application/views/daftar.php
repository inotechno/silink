
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/assets/images/logoicon.png">
    <title>Daftar - Sistem Informasi Lingkungan</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets'); ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?= base_url('assets'); ?>/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-md bg-white overflow-auto">
                    <div class="p-3">
                        
                                <form enctype="multipart/form-data" id="tambahPenduduk">
                                    <div class="row">

                                        <div class="col-md">
                                            <div class="preview text-center mb-3">
                                                <img width="150" height="180" id="previewFoto" class="text-center" src="<?= base_url('assets/images/default.jpg') ?>">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="foto">Pilih Foto</label>
                                                <input type="file" class="form-control-file" id="foto" name="foto" accept=".gif, .jpg, .png, .jpeg">
                                            </div>

                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="number" class="form-control" id="nik" name="nik">
                                                <div id="cek-nik" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>NO KK</label>
                                                <input type="number" class="form-control" id="no_kk" name="no_kk">
                                                <div id="cek-no-kk" class="invalid-feedback"></div>
                                            </div>

                                        </div>

                                        <div class="col-md">
                                            
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control text-uppercase" name="nama_lengkap" id="nama_lengkap">
                                                <div id="cek-nama" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                                                <div id="cek-tempat-lahir" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                                <div id="cek-tanggal-lahir" class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempun</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select id="agama" name="agama" class="form-control">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Katholik">Katholik</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md">

                                            <div class="form-group">
                                                <label>Pekerjaan</label>
                                                <select id="pekerjaan" name="pekerjaan" class="form-control">
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Pendidikan</label>
                                                <select id="pendidikan" name="pendidikan" class="form-control">
                                                    <option value="SD/Sederajat">SD/Sederajat</option>
                                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status Perkawinan</label>
                                                <select id="status_perkawinan" name="status_perkawinan" class="form-control">
                                                    <option value="0">Belum Kawin</option>
                                                    <option value="1">Menikah</option>
                                                    <option value="2">Janda/Duda</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status Keluarga</label>
                                                <select id="status_keluarga" name="status_keluarga" class="form-control">
                                                    <option value="1">Kepala Keluarga</option>
                                                    <option value="2">Istri</option>
                                                    <option value="3">Suami</option>
                                                    <option value="4">Anak</option>
                                                    <option value="5">Cucu</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status Keluarga</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="Hidup">Hidup</option>
                                                    <option value="Meninggal">Meninggal</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-success" id="btn_add_data">Simpan</button>
                                </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets'); ?>/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets'); ?>/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            
            
            //  -----------------------------------------------------------------------------
            //  |       PREVIEW FOTO PENDUDUK DI FORM TAMBAH                                |
            //  -----------------------------------------------------------------------------

            function previewFoto(input) {
               if (input.files && input.files[0]) {
                  var reader = new FileReader();
             
                  reader.onload = function (e) {
                      $('#previewFoto').attr('src', e.target.result);
                  }
             
                  reader.readAsDataURL(input.files[0]);
               }
            }
            $("#foto").change(function(){
                previewFoto(this);
            });
            
            //  -----------------------------------------------------------------------------
            //  |       AKSI TAMBAH DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_add_data').on('click', function () {
                
                if ($('[name="no_kk"]').val().length == 0){
                    $('#cek-no-kk').html('No KK Harus Diisi');
                    $('[name="no_kk"]').addClass('is-invalid');
                    $('[name="no_kk"]').focus();
                    return false;
                }else{
                    $('[name="no_kk"]').removeClass('is-invalid');
                    $('[name="no_kk"]').addClass('is-valid');
                }
                if ($('[name="nik"]').val().length == 0){
                    $('#cek-nik').html('No NIK Harus Diisi');
                    $('[name="nik"]').addClass('is-invalid');
                    $('[name="nik"]').focus();
                    return false;
                }else{
                    $('[name="nik"]').removeClass('is-invalid');
                    $('[name="nik"]').addClass('is-valid');
                }
                if ($('[name="nama_lengkap"]').val().length == 0){
                    $('#cek-nama').html('Nama Lengkap Harus Diisi');
                    $('[name="nama_lengkap"]').addClass('is-invalid');
                    $('[name="nama_lengkap"]').focus();
                    return false;
                }else{
                    $('[name="nama_lengkap"]').removeClass('is-invalid');
                    $('[name="nama_lengkap"]').addClass('is-valid');
                }
                if ($('[name="tempat_lahir"]').val().length == 0){
                    $('#cek-tempat-lahir').html('Tempat Lahir Harus Diisi');
                    $('[name="tempat_lahir"]').addClass('is-invalid');
                    $('[name="tempat_lahir"]').focus();
                    return false;
                }else{
                    $('[name="tempat_lahir"]').removeClass('is-invalid');
                    $('[name="tempat_lahir"]').addClass('is-valid');
                }
                if ($('[name="tanggal_lahir"]').val().length == 0){
                    $('#cek-tanggal-lahir').html('Tanggal Lahir Harus Diisi');
                    $('[name="tanggal_lahir"]').addClass('is-invalid');
                    $('[name="tanggal_lahir"]').focus();
                    return false;
                }else{
                    $('[name="tanggal_lahir"]').removeClass('is-invalid');
                    $('[name="tanggal_lahir"]').addClass('is-valid');
                }

                var base_url = '<?= base_url("assets/images/")?>';
                var formData = new FormData();
                formData.append('nik', $('[name="nik"]').val()); 
                formData.append('no_kk', $('[name="no_kk"]').val()); 
                formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
                formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
                formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
                formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
                formData.append('agama', $('[name="agama"]').val()); 
                formData.append('pekerjaan', $('[name="pekerjaan"]').val()); 
                formData.append('pendidikan', $('[name="pendidikan"]').val()); 
                formData.append('status_perkawinan', $('[name="status_perkawinan"]').val()); 
                formData.append('status_keluarga', $('[name="status_keluarga"]').val()); 
                formData.append('status', $('[name="status"]').val()); 
                formData.append('foto', $('[name="foto"]')[0].files[0]);
               
                $.ajax({
                    url: '<?= base_url("Daftar/save_penduduk")?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        alert('Data Berhasil di Kirim');
                        $('[name="nik"]').removeClass('is-valid'); 
                        $('[name="no_kk"]').removeClass('is-valid'); 
                        $('[name="nama_lengkap"]').removeClass('is-valid'); 
                        $('[name="tempat_lahir"]').removeClass('is-valid'); 
                        $('[name="tanggal_lahir"]').removeClass('is-valid'); 

                        $('[name="nik"]').val(''); 
                        $('[name="no_kk"]').val(''); 
                        $('[name="nama_lengkap"]').val(''); 
                        $('[name="tempat_lahir"]').val(''); 
                        $('[name="tanggal_lahir"]').val(''); 
                        $('[name="agama"]').val(''); 
                        $('[name="pekerjaan"]').val(''); 
                        $('[name="pendidikan"]').val(''); 
                        $('[name="status"]').val(''); 
                        $('[name="status_keluarga"]').val(''); 
                        $('[name="foto"]').val(''); 
                        $('[name="status_perkawinan"]').val('');
                        $('#previewFoto').attr("src", base_url+"/default.jpg");
                        window.location.href = 'login';
                    }
                });
                return false;
            }); 
        });
    </script>
</body>

</html>