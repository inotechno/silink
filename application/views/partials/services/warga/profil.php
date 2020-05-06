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

            var base_url = '<?= base_url('assets/images/')?>';
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
                url: '<?= base_url("warga/Data_Penduduk/save_penduduk")?>',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    $('[name="nik"]').removeClass('is-valid'); 
                    $('[name="no_kk"]').removeClass('is-valid'); 
                    $('[name="nama_lengkap"]').removeClass('is-valid'); 
                    $('[name="tempat_lahir"]').removeClass('is-valid'); 

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
                    $('#addmodal').modal('hide');
                    $("#alert-success-text").html('Data Berhasil di Tambahkan');
                    $("#alert-success").fadeIn().delay(2000).fadeOut();
                }
            });
            return false;
        });	
	});
</script>

</body>
</html>