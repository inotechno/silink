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
                    url   : '<?= base_url("pemuda/Data_Pemuda/daftar_pemuda")?>',
                    method:"POST",
                    data:{query:query},
                    success : function(data){
                        $('#show_data_pemuda').html(data);
                    }
     
                });
            }

            
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