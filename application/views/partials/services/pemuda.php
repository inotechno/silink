// Data Penduduk
<script type="text/javascript">
        $(document).ready(function(){  

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

            $("body").on('click', '.btn-add-more', function (e) {
                e.preventDefault();
                var $sr = ($(".rows").length + 1);
                var rowid = Math.random();
                var $html = '<div class="card my-1" class="rows" id="'+ rowid +'">' +
                                '<div class="card-body p-1">' +
                                    '<div class="row">' +

                                        '<input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'">' +
                                        '<div class="col-md">' +
                                            '<div class="form-group">' +
                                                '<label>Nama Lengkap</label>' +
                                                '<select class="form-control select-nama" name="nama[]">' +
                                                '</select>' +
                                            '</div>' +
                                        '</div>' +

                                        '<div class="col-md">' +
                                            '<div class="form-group">' +
                                                '<label>Jabatan</label>' +
                                                '<select class="form-control select-jabatan" name="jabatan[]">' +
                                                '</select>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' 
                $('#baris').append($html);
                $.ajax({
                    url   : '<?= base_url("admin/Data_Pemuda/daftar_penduduk")?>',
                    method:"POST",
                    success : function(data){
                        $('.select-nama').html(data);
                    }
     
                });     
            });

            $("body").on('click', '.btn-remove-detail-row', function (e) {
                e.preventDefault();
                if($("#baris .card:last-child").attr('id') != 'row1'){
                    $("#baris .card:last-child").remove();
                }
                 
            });

            //  -----------------------------------------------------------------------------
            //  |       AKSI INSERT DATA                                                    |
            //  -----------------------------------------------------------------------------

            $("#form_submit").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("admin/Data_Pemuda/save_pemuda")?>',
                    type: 'POST',
                    data: $("#form_submit").serialize(),
                    success: function (response){
                    if(response == 1){
                        $("#alert-success-text").html('Data Berhasil di Tambahkan');
                        }
                    }
                });
            });

            //  -----------------------------------------------------------------------------
            //  |       AKSI UPDATE DATA                                                    |
            //  -----------------------------------------------------------------------------

            $('#btn_edit_data').on('click', function() {
                var formData = new FormData();
                
            });

            //  -----------------------------------------------------------------------------
            //  |       EKSEKUSI HAPUS DATA PENDUDUK                                        |
            //  -----------------------------------------------------------------------------

            $('#delete_btn').on('click',function(){
            var id=$('#textid').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/Data_Pemuda/daftar_pemuda')?>",
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
                var jabatan=$(this).attr('data-jabatan');
                $('#deletemodal').modal('show');
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