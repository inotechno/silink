<script type="text/javascript">

	jenis_sumbangan();
	daftar_sumbangan();

	function daftar_sumbangan(jenis){
        $.ajax({
            url   : '<?= base_url("admin/sumbangan/daftar_sumbangan_warga")?>',
            method:"POST",
            data:{jenis:jenis},
            success : function(data){
                $('#show_data_sumbangan').html(data);
            }

        });
    }
	
	function jenis_sumbangan(){
        $.ajax({
            url   : '<?= base_url("admin/sumbangan/daftar_jenis_sumbangan")?>',
            method:"POST",
            success : function(data){
                $('#show_data_jenis_sumbangan').html(data);
            }

        });
    }

    //  -----------------------------------------------------------------------------
    //  |       FILTER DATA                                                         |
    //  -----------------------------------------------------------------------------
    $("#show_data_jenis_sumbangan").delegate("tr", "click", function(){
        var jenis = $(this).attr('data-id');
        if (jenis != '') {
        	daftar_sumbangan(jenis);
        	$('html, body').animate({
                scrollTop: $("#show_data_sumbangan").offset().top
            }, 1000);
        }else{
        	daftar_sumbangan();
        }
    });

    $('#btn_tambah_data').on('click', function () {
    	$('#add_jenis_sumbangan').modal('show');
    })

    $('#btn-add-sumbangan').on('click', function () {
    	var nama_sumbangan = $('[name="jenis_sumbangan"]').val();
    	var mulai_sumbangan = $('[name="mulai_sumbangan"]').val();
    	var selesai_sumbangan = $('[name="selesai_sumbangan"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/sumbangan/save_jenis_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {nama_sumbangan:nama_sumbangan, mulai_sumbangan:mulai_sumbangan, selesai_sumbangan:selesai_sumbangan},
    		success:function (data) {
    			console.log(data);
    			$('#add_jenis_sumbangan').modal('hide');
    			$("#alert-success-text").html('Data Berhasil di Tambahkan');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});
    	
    })

</script>

</body>
</html>