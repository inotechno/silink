	<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/extra-libs/datatables/datatables.min.js"></script>
    
    <!-- apps -->
    <!-- apps -->
    <script src="<?= base_url('assets'); ?>/dist/js/app-style-switcher.js"></script>
    <script src="<?= base_url('assets'); ?>/dist/js/feather.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets'); ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->

    <script type="text/javascript">

    <!--
      function showTime() {
          var a_p = "";
          var today = new Date();
          var curr_hour = today.getHours();
          var curr_minute = today.getMinutes();
          var curr_second = today.getSeconds();
          // if (curr_hour < 12) {
          //     a_p = "AM";
          // } else {
          //     a_p = "PM";
          // }
          // if (curr_hour == 0) {
          //     curr_hour = 12;
          // }
          // if (curr_hour > 12) {
          //     curr_hour = curr_hour - 12;
          // }
          curr_hour = checkTime(curr_hour);
          curr_minute = checkTime(curr_minute);
          curr_second = checkTime(curr_second);
       document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
          }
   
      function checkTime(i) {
          if (i < 10) {
              i = "0" + i;
          }
          return i;
      }
      setInterval(showTime, 500);

      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth();
      var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
      var yy = date.getYear();
      var year = (yy < 1000) ? yy + 1900 : yy;
      document.getElementById('haritanggal').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
      //-->
    //-->
        
    // Data Penduduk
        $(document).ready(function(){  

            daftar_penduduk();

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

            //  -----------------------------------------------------------------------------
            //  |       AKSI TAMBAH DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_add_data').on('click', function () {
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
                    url: '<?php echo base_url('admin/data_penduduk/update_penduduk')?>',
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
                url  : "<?php echo base_url('admin/data_penduduk/delete_penduduk')?>",
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
                    url  : "<?php echo base_url('admin/data_penduduk/get_by_id')?>",
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
        });
    // End Data Penduduk

    // Data Keluarga
        $(document).ready(function(){

            daftar_keluarga();

            function daftar_keluarga(query){
                $.ajax({
                    url   : '<?= base_url("admin/keluarga/daftar_keluarga")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data_keluarga').html(data);
                    }
     
                });
            }

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN DATA KELUARGA DI FORM EDIT MODAL                        |
            //  -----------------------------------------------------------------------------
            
            $('#show_data_keluarga').on('click','.item_view',function(){
                var kk=$(this).attr('data-kk');
                var nama_kk=$(this).attr('data-namakk');
                var base_url = '<?= base_url('assets/images/')?>';
                $.ajax({
                    type : "GET",
                    url  : "<?php echo base_url('admin/keluarga/view_keluarga')?>",
                    data : {kk:kk},
                    success: function(data){
                        $('#viewModal').modal('show');
                        $('#nomor_kk').html(kk);
                        $('.nama_kk').html(nama_kk.toUpperCase());
                        $('#show_data_anggota_keluarga').html(data);
                    }
                });
                return false;
            });
        });
    // End Data Keluarga
    </script>
</body>
    
</html>