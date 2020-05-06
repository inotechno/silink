<!-- // Data Penduduk -->
<script type="text/javascript">
        $(document).ready(function(){  

            daftar_penduduk();
            daftar_nonpenduduk();

            //  -----------------------------------------------------------------------------
            //  |       AMBIL DATA KE DATABASE                                              |
            //  -----------------------------------------------------------------------------

            function daftar_penduduk(query){
                $.ajax({
                    url   : '<?= base_url("admin/Data_Penduduk/daftar_penduduk")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data').html(data);
                    }
     
                });
            }

            function daftar_nonpenduduk(query){
                $.ajax({
                    url   : '<?= base_url("admin/Data_Penduduk/daftar_nonpenduduk")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data_nonpenduduk').html(data);
                    }
     
                });
            }

            //  -----------------------------------------------------------------------------
            //  |       AKSI TAMBAH DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_add_data').on('click', function () {
                
                if ($('[name="no_kk"]').val().length == 0){
                    $('#cek-no-kk').html('No KK Harus Diisi');
                    $('[name="no_kk"]').addClass('is-invalid');
                    $('[name="no_kk"]').focus();
                    return false;
                }
                if ($('[name="nik"]').val().length == 0){
                    $('#cek-nik').html('No NIK Harus Diisi');
                    $('[name="nik"]').addClass('is-invalid');
                    $('[name="nik"]').focus();
                    return false;
                }
                if ($('[name="nama_lengkap"]').val().length == 0){
                    $('#cek-nama').html('Nama Lengkap Harus Diisi');
                    $('[name="nama_lengkap"]').addClass('is-invalid');
                    $('[name="nama_lengkap"]').focus();
                    return false;
                }
                if ($('[name="tempat_lahir"]').val().length == 0){
                    $('#cek-tempat-lahir').html('Tempat Lahir Harus Diisi');
                    $('[name="tempat_lahir"]').addClass('is-invalid');
                    $('[name="tempat_lahir"]').focus();
                    return false;
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
                    url: '<?= base_url("admin/Data_Penduduk/save_penduduk")?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
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
                        daftar_penduduk();
                    }
                });
                return false;
            });

            //  -----------------------------------------------------------------------------
            //  |       AKSI UPDATE DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_edit_data').on('click', function() {
                var formData = new FormData();
                formData.append('id', $('[name="id_edit"]').val()); 
                formData.append('nik', $('[name="nik_edit"]').val()); 
                formData.append('no_kk', $('[name="no_kk_edit"]').val()); 
                formData.append('nama_lengkap', $('[name="nama_lengkap_edit"]').val()); 
                formData.append('tempat_lahir', $('[name="tempat_lahir_edit"]').val()); 
                formData.append('tanggal_lahir', $('[name="tanggal_lahir_edit"]').val()); 
                formData.append('jenis_kelamin', $('[name="jenis_kelamin_edit"]').val()); 
                formData.append('agama', $('[name="agama_edit"]').val()); 
                formData.append('pekerjaan', $('[name="pekerjaan_edit"]').val()); 
                formData.append('pendidikan', $('[name="pendidikan_edit"]').val()); 
                formData.append('status_perkawinan', $('[name="status_perkawinan_edit"]').val()); 
                formData.append('status_keluarga', $('[name="status_keluarga_edit"]').val()); 
                formData.append('status', $('[name="status_edit"]').val()); 
                formData.append('foto_lama', $('[name="foto_lama"]').val()); 
                formData.append('foto', $('[name="foto_edit"]')[0].files[0]);
                
                $.ajax({
                    url: '<?php echo base_url('admin/Data_Penduduk/update_penduduk')?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(respond){
                        $('[name="id_edit"]').val(""); 
                        $('[name="nik_edit"]').val(""); 
                        $('[name="no_kk_edit"]').val(""); 
                        $('[name="nama_lengkap_edit"]').val(""); 
                        $('[name="tempat_lahir_edit"]').val(""); 
                        $('[name="tanggal_lahir_edit"]').val("");
                        $('[name="jenis_kelamin_edit"]').val("");
                        $('[name="agama_edit"]').val(''); 
                        $('[name="pekerjaan_edit"]').val(''); 
                        $('[name="foto_lama"]').val(''); 
                        $('[name="pendidikan_edit"]').val('');
                        $('[name="foto_edit"]').val(''); 
                        $('[name="status_perkawinan_edit"]').val("");
                        $('[name="status_keluarga"]').val("");
                        $('[name="status"]').val("");
                        $("#editmodal").modal('hide');
                        $("#alert-success-text").html('Data Berhasil di Ubah');
                        $("#alert-success").fadeIn().delay(2000).fadeOut();
                        daftar_penduduk();
                    }
                });
            });

            //  -----------------------------------------------------------------------------
            //  |       EKSEKUSI HAPUS DATA PENDUDUK                                        |
            //  -----------------------------------------------------------------------------

            $('#delete_btn').on('click',function(){
            var id=$('#textid').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/Data_Penduduk/delete_penduduk')?>",
                dataType : "JSON",
                        data : {id: id},
                        success: function(data){
                            $("#alert-success-text").html('Data Berhasil di Hapus');
                            $("#alert-success").fadeIn().delay(1000).fadeOut();
                            $('#deletemodal').modal('hide');
                            daftar_penduduk();
                        }
                    });
                    return false;
            });

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN MODAL HAPUS DATA DENGAN ID                              |
            //  -----------------------------------------------------------------------------

            $('#show_data').on('click','.item_delete',function(){
                var id=$(this).attr('data-id');
                var nama=$(this).attr('data-nama');
                $('#deletemodal').modal('show');
                $('[name="id"]').val(id);
                $('#hapusnama').html(nama);
            });

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN DATA DI FORM EDIT MODAL                                 |
            //  -----------------------------------------------------------------------------
            
            $('#show_data').on('click','.item_edit',function(){
                var id=$(this).attr('data-id');
                var base_url = '<?= base_url('assets/images/')?>';
                $.ajax({
                    type : "GET",
                    url  : "<?php echo base_url('admin/Data_Penduduk/get_by_id')?>",
                    dataType : "JSON",
                    data : {id:id},
                    success: function(data){
                        $.each(data,function(nik, nama_lengkap, no_kk, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, pekerjaan, pendidikan, status_perkawinan, status_keluarga, status, foto){
                            $('#editmodal').modal('show');
                            $('[name="id_edit"]').val(data.id); 
                            $('[name="nik_edit"]').val(data.nik); 
                            $('[name="no_kk_edit"]').val(data.no_kk); 
                            $('[name="nama_lengkap_edit"]').val(data.nama_lengkap); 
                            $('[name="tempat_lahir_edit"]').val(data.tempat_lahir); 
                            $('[name="tanggal_lahir_edit"]').val(data.tanggal_lahir); 
                            $('[name="jenis_kelamin_edit"]').val(data.jenis_kelamin); 
                            $('[name="agama_edit"]').val(data.agama); 
                            $('[name="pekerjaan_edit"]').val(data.pekerjaan); 
                            $('[name="pendidikan_edit"]').val(data.pendidikan); 
                            $('[name="foto_lama"]').val(data.foto); 
                            $('[name="status_perkawinan_edit"]').val(data.status_perkawinan);
                            $('[name="status_keluarga_edit"]').val(data.status_keluarga);
                            $('[name="status_edit"]').val(data.status);
                            
                            if (data.foto != '') {
                                $('#previewFoto_Edit').attr("src", base_url+"/penduduk/"+data.foto);
                                $('#ganti_foto').show();
                                $('#upload_foto').hide();

                            } else {
                                $('#previewFoto_Edit').attr("src", base_url+"/default.jpg");
                                $('#upload_foto').show();
                                $('#ganti_foto').hide();
                            }

                        });
                    }
                });
                return false;
            });

            $('#ganti_foto').click(function() {
                
                $('#upload_foto').fadeIn(500);
                $('#ganti_foto').hide();
                
            });

            //  -----------------------------------------------------------------------------
            //  |       PENCARIAN DATA                                                      |
            //  -----------------------------------------------------------------------------

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '') {
                    daftar_penduduk(search);
                } else {
                    daftar_penduduk();
                }
            });

            $('#search_text_nonpenduduk').keyup(function(){
                var search = $(this).val();
                if(search != '') {
                    daftar_nonpenduduk(search);
                } else {
                    daftar_nonpenduduk();
                }
            });

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
            //  |       PREVIEW FOTO PENDUDUK DI FORM EDIT                                  |
            //  -----------------------------------------------------------------------------

            function previewFotoEdit(input) {
               if (input.files && input.files[0]) {
                  var reader = new FileReader();
             
                  reader.onload = function (e) {
                      $('#previewFoto_Edit').attr('src', e.target.result);
                  }
             
                  reader.readAsDataURL(input.files[0]);
               }
            }
            $("#foto_edit").change(function(){
                previewFotoEdit(this);
            });   


            // Non Penduduk

            $('#checkall').change(function() {
                var checked = $(this).is(':checked');
                   if(checked){
                      $(".checkbox").each(function(){
                          $(this).prop("checked",true);
                          $('#aktifcheck').fadeIn('slow');
                          $('#hapuscheck').fadeIn('3000');
                      });
                   }else{
                      $(".checkbox").each(function(){
                          $(this).prop("checked",false);
                          $('#aktifcheck').fadeOut('slow');
                          $('#hapuscheck').fadeOut('3000');
                      });
                   }
            });

            $("#show_data_nonpenduduk").on('click','.checkbox', function(){
                $('#aktifcheck').fadeIn('slow');
                $('#hapuscheck').fadeIn('3000');
               if($(".checkbox").length == $(".checkbox:checked").length) {
                   $("#checkall").prop("checked", true);
               } else {
                   $("#checkall").prop("checked",false);
               }

            });

            $('#aktifcheck').click(function(){

               // Confirm alert
               var deleteConfirm = confirm("Apakah Anda Yakin ?");
               if (deleteConfirm == true) {

                  // Get userid from checked checkboxes
                  var id_user = [];
                  $(".checkbox:checked").each(function(){
                      var userid = $(this).val();

                      id_user.push(userid);
                  });

                  // Array length
                  var length = id_user.length;

                  if(length > 0){

                     // AJAX request
                    $.ajax({
                        url: '<?= base_url('admin/Data_Penduduk/update_aktif') ?>',
                        type: 'post',
                        data: {id: id_user},
                        success: function(response){
                            $("#alert-success-text").html('Data Berhasil di Aktifkan');
                            $("#alert-success").fadeIn().delay(1000).fadeOut();
                            $('#aktifcheck').fadeOut('slow');
                            $('#hapuscheck').fadeOut('3000');
                            daftar_nonpenduduk();
                            daftar_penduduk();
                        }
                     });
                  }
               } 

            });

            $('#hapuscheck').click(function(){

               // Confirm alert
               var deleteConfirm = confirm("Apakah Anda Yakin ?");
               if (deleteConfirm == true) {

                  // Get userid from checked checkboxes
                  var id_user = [];
                  $(".checkbox:checked").each(function(){
                      var userid = $(this).val();

                      id_user.push(userid);
                  });

                  // Array length
                  var length = id_user.length;

                  if(length > 0){

                     // AJAX request
                    $.ajax({
                        url: '<?= base_url('admin/Data_Penduduk/delete_aktif') ?>',
                        type: 'post',
                        data: {id: id_user},
                        success: function(response){
                            $("#alert-success-text").html('Data Berhasil di Hapus');
                            $("#alert-success").fadeIn().delay(1000).fadeOut();
                            $('#aktifcheck').fadeOut('slow');
                            $('#hapuscheck').fadeOut('3000');
                            daftar_nonpenduduk();
                            daftar_penduduk();
                        }
                     });
                  }
               } 

            });
        });
</script>
<!-- // End Data Penduduk -->

</body>
    
</html>