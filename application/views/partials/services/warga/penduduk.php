<!-- // Data Penduduk -->
<script type="text/javascript">
        $(document).ready(function(){  

            daftar_penduduk();

            //  -----------------------------------------------------------------------------
            //  |       AMBIL DATA KE DATABASE                                              |
            //  -----------------------------------------------------------------------------

            function daftar_penduduk(query){
                $.ajax({
                    url   : '<?= base_url("warga/Data_Penduduk/daftar_penduduk")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data').html(data);
                    }
     
                });
            }


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

        });
</script>
<!-- // End Data Penduduk -->

</body>
    
</html>