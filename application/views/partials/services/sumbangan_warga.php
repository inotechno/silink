<script type="text/javascript">

	jenis_sumbangan();
	daftar_sumbangan();

	function daftar_sumbangan(jenis){
        $.ajax({
            url   : '<?= base_url("admin/Sumbangan/daftar_sumbangan_warga")?>',
            method:"POST",
            data:{jenis:jenis},
            success : function(data){
                $('#show_data_sumbangan').html(data);
            }

        });
    }
	
	function jenis_sumbangan(){
        $.ajax({
            url   : '<?= base_url("admin/Sumbangan/daftar_jenis_sumbangan")?>',
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

    $('#btn_refresh').on('click', function() {
    	daftar_sumbangan();
    	$('html, body').animate({
            scrollTop: $("#show_data_sumbangan").offset().top
        }, 1000);
    });

    $('#btn_tambah_data').on('click', function () {
    	$('#add_jenis_sumbangan').modal('show');
    });

    $('#btn-add-sumbangan').on('click', function () {
    	var nama_sumbangan = $('[name="jenis_sumbangan"]').val();
    	var mulai_sumbangan = $('[name="mulai_sumbangan"]').val();
    	var selesai_sumbangan = $('[name="selesai_sumbangan"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/save_jenis_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {nama_sumbangan:nama_sumbangan, mulai_sumbangan:mulai_sumbangan, selesai_sumbangan:selesai_sumbangan},
    		success:function (data) {
    			$('[name="jenis_sumbangan"]').val('');
		    	$('[name="mulai_sumbangan"]').val('');
		    	$('[name="selesai_sumbangan"]').val('');
    			$('#add_jenis_sumbangan').modal('hide');
    			$("#alert-success-text").html('Data Berhasil di Tambahkan');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	}); 	
    });

    $("#show_data_jenis_sumbangan").delegate(".edit_jenis", "click", function(){
    	var id_jenis = $(this).attr('data-id');
    	var nama_sumbangan = $(this).attr('data-nama');
    	var mulai_sumbangan = $(this).attr('data-mulai');
    	var selesai_sumbangan = $(this).attr('data-selesai');
    	$('#edit_jenis_sumbangan').modal('show');
    	$('[name="id_jenis_edit"]').val(id_jenis);
    	$('[name="jenis_sumbangan_edit"]').val(nama_sumbangan);
    	$('[name="mulai_sumbangan_edit"]').val(mulai_sumbangan);
    	$('[name="selesai_sumbangan_edit"]').val(selesai_sumbangan);
    });

    $('#btn-edit-jenis-sumbangan').on('click', function() {
    	var id_jenis = $('[name="id_jenis_edit"]').val();
    	var nama_sumbangan = $('[name="jenis_sumbangan_edit"]').val();
    	var mulai_sumbangan = $('[name="mulai_sumbangan_edit"]').val();
    	var selesai_sumbangan = $('[name="selesai_sumbangan_edit"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/edit_jenis_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {id_jenis:id_jenis, nama_sumbangan:nama_sumbangan, mulai_sumbangan:mulai_sumbangan, selesai_sumbangan:selesai_sumbangan},
    		success:function (data) {
    			$('#edit_jenis_sumbangan').modal('hide');
		    	$('[name="id_jenis_edit"]').val('');
		    	$('[name="jenis_sumbangan_edit"]').val('');
		    	$('[name="mulai_sumbangan_edit"]').val('');
		    	$('[name="selesai_sumbangan_edit"]').val('');
		    	$("#alert-success-text").html('Data Berhasil di Ubah');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});
    	
    });

    $("#show_data_jenis_sumbangan").delegate(".hapus_jenis", "click", function(){
    	var id_jenis = $(this).attr('data-id');
    	$('#hapus_jenis_sumbangan').modal('show');
    	$('[name="id_jenis_hapus"]').val(id_jenis);
    });

    $('#btn-hapus-jenis-sumbangan').on('click', function() {
    	var id_jenis = $('[name="id_jenis_hapus"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/hapus_jenis_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {id_jenis:id_jenis},
    		success:function (data) {
    			$('#hapus_jenis_sumbangan').modal('hide');
		    	$('[name="id_jenis_hapus"]').val('');
		    	$("#alert-success-text").html('Data Berhasil di Hapus');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});
    });

    $('#btn_tambah_data_sumbangan').on('click', function () {
    	$('#add_sumbangan').modal('show');
    });

    $('#btn-add-sumbangan-warga').on('click', function() {
    	
    	var id_jenis = $('[name="jenis_sumbangan_warga"]').val();
    	var nilai_sumbangan = $('[name="nilai_sumbangan_warga"]').val();
    	var sumbangan_dari = $('[name="sumbangan_dari_warga"]').val();
    	var tanggal_sumbangan = $('[name="tanggal_sumbangan_warga"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/save_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {id_jenis:id_jenis, nilai_sumbangan:nilai_sumbangan, sumbangan_dari:sumbangan_dari, tanggal_sumbangan:tanggal_sumbangan},
    		success:function (data) {
    			$('#add_sumbangan').modal('hide');
		    	$('[name="nilai_sumbangan_warga"]').val('');
		    	$('[name="tanggal_sumbangan_warga"]').val('');
		    	$("#alert-success-text").html('Data Berhasil di Ubah');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});	
    });

    $('#show_data_sumbangan').on('click', '.edit_sumbangan', function() {
    	var id_sumbangan = $(this).attr('data-id');
    	var nilai_sumbangan = $(this).attr('data-nilai');
    	var jenis_sumbangan = $(this).attr('data-jenis');
    	var sumbangan_dari = $(this).attr('data-nama');
    	var tanggal_sumbangan = $(this).attr('data-tanggal');

    	$('#edit_sumbangan').modal('show');
    	$('[name="edit_id_sumbangan_warga"]').val(id_sumbangan);
    	$('[name="edit_jenis_sumbangan_warga"]').val(jenis_sumbangan);
    	$('[name="edit_nilai_sumbangan_warga"]').val(nilai_sumbangan);
    	$('[name="edit_sumbangan_dari_warga"]').val(sumbangan_dari);
    	$('[name="edit_tanggal_sumbangan_warga"]').val(tanggal_sumbangan);
    });

    $('#btn-edit-sumbangan-warga').on('click', function() {
    	var id_sumbangan = $('[name="edit_id_sumbangan_warga"]').val();
    	var id_jenis = $('[name="edit_jenis_sumbangan_warga"]').val();
    	var nilai_sumbangan = $('[name="edit_nilai_sumbangan_warga"]').val();
    	var sumbangan_dari = $('[name="edit_sumbangan_dari_warga"]').val();
    	var tanggal_sumbangan = $('[name="edit_tanggal_sumbangan_warga"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/edit_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {id_sumbangan:id_sumbangan,id_jenis:id_jenis, nilai_sumbangan:nilai_sumbangan, sumbangan_dari:sumbangan_dari, tanggal_sumbangan:tanggal_sumbangan},
    		success:function (data) {
    			console.log(data);
    			$('#edit_sumbangan').modal('hide');
		    	$('[name="edit_id_sumbangan_warga"]').val('');
		    	$('[name="edit_nilai_sumbangan_warga"]').val('');
		    	$('[name="edit_tanggal_sumbangan_warga"]').val('');
		    	$("#alert-success-text").html('Data Berhasil di Ubah');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});
    });

    $('#show_data_sumbangan').on('click', '.hapus_sumbangan', function() {
    	var id_sumbangan = $(this).attr('data-id');

    	$('#hapus_sumbangan').modal('show');
    	$('[name="id_sumbangan_hapus"]').val(id_sumbangan);
    });

    $('#btn-hapus-sumbangan').on('click', function() {
    	var id_sumbangan = $('[name="id_sumbangan_hapus"]').val();

    	$.ajax({
    		url: '<?= base_url('admin/Sumbangan/hapus_sumbangan') ?>',
    		type: 'POST',
    		dataType: 'JSON',
    		data: {id_sumbangan:id_sumbangan},
    		success:function (data) {
    			$('#hapus_sumbangan').modal('hide');
		    	$('[name="id_sumbangan_hapus"]').val('');
		    	$("#alert-success-text").html('Data Berhasil di Ubah');
				$("#alert-success").fadeIn().delay(2000).fadeOut();
				jenis_sumbangan();
				daftar_sumbangan();
    		}
    	});
    });

</script>

</body>
</html>