<script type="text/javascript">
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