<script type="text/javascript">
    // Data Keluarga
        $(document).ready(function(){

            daftar_Keluarga();

            function daftar_Keluarga(){
                $.ajax({
                    url   : '<?= base_url("admin/Keluarga/daftar_Keluarga")?>',
                    method:"POST",
                    success : function(data){
                        $('#show_data_keluarga').html(data);
                    }
     
                });
        
            }

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN DATA Keluarga DI FORM EDIT MODAL                        |
            //  -----------------------------------------------------------------------------
            
            $('#show_data_keluarga').on('click','.item_view',function(){
                var kk=$(this).attr('data-kk');
                var nama_kk=$(this).attr('data-namakk');
                $.ajax({
                    type : "GET",
                    url  : "<?php echo base_url('admin/Keluarga/view_Keluarga')?>",
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

            $('#show_data_keluarga').on('click','.upload_kk',function(){
                var kk=$(this).attr('data-kk');
                
                $('#ganti-kk').modal('show');
                $('[name="no_kk"]').val(kk);

            });

            $('#save-kk').on('click',function() {
                var formData = new FormData();
                formData.append('no_kk', $('[name="no_kk"]').val()); 
                formData.append('kk', $('[name="kk"]')[0].files[0]);

                $.ajax({
                    url: '<?= base_url("admin/Keluarga/save_kk")?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        
                        $('[name="no_kk"]').val(''); 
                        $('[name="kk"]').val(''); 
                        
                        $('#ganti-kk').modal('hide');
                        $("#alert-success-text").html('Data Berhasil di Tambahkan');
                        $("#alert-success").fadeIn().delay(2000).fadeOut();
                        daftar_Keluarga();
                    }
                });
                return false;

            });

        });
    // End Data Keluarga
</script>
</body>
</html>