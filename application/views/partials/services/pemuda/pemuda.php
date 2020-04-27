// Data Penduduk
<script type="text/javascript">
        $(document).ready(function(){  
            var sr = 1;
            daftar_pemuda();

            //  -----------------------------------------------------------------------------
            //  |       AMBIL DATA KE DATABASE                                              |
            //  -----------------------------------------------------------------------------

            function daftar_pemuda(query){
                $.ajax({
                    url   : '<?= base_url("admin/Data_Pemuda/daftar_pemuda")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data_pemuda').html(data);
                    }
     
                });
            }

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN DATA DI FORM TAMBAH DATA                                |
            //  -----------------------------------------------------------------------------
            
            $('#btn_tambah_data').on('click', function(){
                $('#add_modal_pemuda').modal('show');
                $.ajax({
                    url   : '<?= base_url("admin/Data_Pemuda/daftar_penduduk")?>',
                    method:"POST",
                    success : function(data){
                        $('.select-nama').html(data);
                    }
     
                });     
            });


            //  -----------------------------------------------------------------------------
            //  |       AKSI TAMBAH DATA ROWS                                                    |
            //  -----------------------------------------------------------------------------

            $("body").on('click', '.btn-add-more', function () {
                var jumlah = parseInt($("#jumlah-form").val());
                var nextform = jumlah + 1;
                var $html = '<div class="card my-1 rows" id="row'+ nextform +'">' +
                                '<div class="card-body p-1">' +
                                    '<div class="row">' +

                                        '<div class="col-md">' +
                                            '<div class="form-group">' +
                                                '<label>Nama Lengkap</label>' +
                                                '<select class="form-control select-nama" name="id_penduduk[]">' +
                                                '</select>' +
                                            '</div>' +
                                        '</div>' +

                                        '<div class="col-md">' +
                                            '<div class="form-group">' +
                                                '<label>Jabatan</label>' +
                                                '<select class="form-control select-jabatan" name="jabatan[]">' +
                                                    '<option value="1">Ketua Pemuda</option>' +
                                                    '<option value="2">Sekretaris</option>' +
                                                    '<option value="3">Bendahara</option>' +
                                                    '<option value="4">Anggota</option>' +
                                                '</select>' +
                                            '</div>' +
                                        '</div>' +

                                        '<div class="col-md-1">' +
                                            '<button data-row="row'+ nextform +'" class="btn btn-sm float-right btn-outline-danger btn-remove-detail-row" type="button">X</button>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' 
                $('#insert-form').append($html);
                $('#jumlah-form').val(nextform);
                $.ajax({
                    url   : '<?= base_url("admin/Data_Pemuda/daftar_penduduk")?>',
                    method:"POST",
                    success : function(data){
                        $('.select-nama').html(data);
                    }
     
                });     
            });

            // //  -----------------------------------------------------------------------------
            // //  |       AKSI INSERT DATA                                                    |
            // //  -----------------------------------------------------------------------------

            $("#btn_submit_pemuda").on('click', function () {
                var id_penduduk = [];
                var jabatan = [];

                $('.select-nama').each(function() {
                    id_penduduk.push($(this).val());
                });
                $('.select-jabatan').each(function() {
                    jabatan.push($(this).val());
                });
                
                $.ajax({
                    url: '<?= base_url("admin/Data_Pemuda/save_pemuda")?>',
                    type: 'POST',
                    data: {id_penduduk:id_penduduk, jabatan:jabatan},
                    success: function(data){
                        $("#insert-form").val("");
                        $("#alert-success-text").html('Data Berhasil di Simpan');
                        $("#alert-success").fadeIn().delay(1000).fadeOut();
                        $('#add_modal_pemuda').modal('hide');
                        daftar_pemuda();
                    }
                });
            });


            $("body").on('click', '.btn-remove-detail-row', function () {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();      
            });


            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN DATA DI FORM EDIT MODAL                                 |
            //  -----------------------------------------------------------------------------
            
            $('#show_data_pemuda').on('click','.edit_pemuda',function(){
                var id=$(this).attr('data-id');
                var nama_lengkap=$(this).attr('data-nama');
                var jabatan=$(this).attr('data-jabatan');

                $('[name="id_pemuda"]').val(id);
                $('.edit-select-nama').val(nama_lengkap);
                $('.edit-select-nama').attr('disabled', true);
                $('.edit-select-jabatan').val(jabatan);
                $('#edit_modal_pemuda').modal('show');
            });

            //  -----------------------------------------------------------------------------
            //  |       AKSI UPDATE DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_edit_data').on('click', function() {
                id= $('[name="id_pemuda"]').val();
                jabatan= $('[name="jabatan"]').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/Data_Pemuda/update_pemuda')?>",
                    dataType:"JSON",
                    data : {id:id, jabatan:jabatan},
                    success: function(data){
                        $("#alert-success-text").html('Data Berhasil di Ubah');
                        $("#alert-success").fadeIn().delay(1000).fadeOut();
                        $('#edit_modal_pemuda').modal('hide');
                        daftar_pemuda();
                    }
                });
                return false;
            });

            //  -----------------------------------------------------------------------------
            //  |       EKSEKUSI HAPUS DATA PENDUDUK                                        |
            //  -----------------------------------------------------------------------------

            $('#delete_btn').on('click',function(){
                var id=$('#textid').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/Data_Pemuda/delete_pemuda')?>",
                    dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                        $("#alert-success-text").html('Data Berhasil di Hapus');
                        $("#alert-success").fadeIn().delay(1000).fadeOut();
                        $('#delete_modal_pemuda').modal('hide');
                        daftar_pemuda();
                    }
                });
                return false;
            });

            //  -----------------------------------------------------------------------------
            //  |       MENAMPILKAN MODAL HAPUS DATA DENGAN ID                              |
            //  -----------------------------------------------------------------------------

            $('#show_data_pemuda').on('click','.delete_pemuda',function(){
                var id=$(this).attr('data-id');
                var nama=$(this).attr('data-nama');
                var jabatan=$(this).attr('data-jabatan');
                    if (jabatan == 1) {
                        $('#hapusjabatan').html('Ketua Pemuda');
                    }else if(jabatan == 2){
                        $('#hapusjabatan').html('Sekretaris');
                    }else if(jabatan == 3){
                        $('#hapusjabatan').html('Bendahara');
                    }else{
                        $('#hapusjabatan').html('Anggota');
                    }
                $('#delete_modal_pemuda').modal('show');
                $('[name="id"]').val(id);
                $('#hapusnama').html(nama);
                
            });

            
            //  -----------------------------------------------------------------------------
            //  |       PENCARIAN DATA                                                      |
            //  -----------------------------------------------------------------------------

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '') {
                    daftar_pemuda(search);
                } else {
                    daftar_pemuda();
                }
            });

        });
</script>
// End Data Penduduk

</body>
    
</html>