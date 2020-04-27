<script type="text/javascript">
$(document).ready(function() {
	
	daftar_barang();
	daftar_peminjam();
	
	function daftar_barang() {
		$.ajax({
            url   : '<?= base_url("admin/Inventaris/daftar_barang")?>',
            method:"POST",
            success : function(data){
                $('#show_daftar_barang').html(data);
            }

        });
	}

	function daftar_peminjam() {
		$.ajax({
            url   : '<?= base_url("admin/Inventaris/daftar_peminjam")?>',
            method:"POST",
            success : function(data){
                $('#show_daftar_peminjam').html(data);
            }

        });
	}

	$('#btn-add-barang').on('click', function() {
		
		var nama_barang = $('[name="nama_barang"]').val();
		var satuan = $('[name="satuan"]').val();
		var jumlah = $('[name="jumlah"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/save_barang') ?>',
			type: 'POST',
			data: {nama_barang:nama_barang, satuan:satuan, jumlah:jumlah},
			success:function(data) {
				$('#add_barang').modal('hide');
				$("#alert-success-text").html('Data Berhasil di Tambahkan');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
			}
		});
		
	});

	$('#show_daftar_barang').on('click', '.tambah_peminjam', function() {
		
		var id_barang = $(this).attr('data-id');
		var nama_barang = $(this).attr('data-nama');
		var jumlah = $(this).attr('data-jumlah');
		if (jumlah == 0) {
			$('#barang_habis').modal('show');
		}else{
			$('#add_pinjaman').modal('show');
			$('[name="id_barang"]').val(id_barang);
			$('[name="nama_barang"]').val(nama_barang);
			$('[name="jumlah"]').val(jumlah);
			$('[name="jumlah"]').attr({max:jumlah});
		}
	});

	$('#btn-add-pinjaman').on('click', function() {
		
		var id_barang = $('[name="id_barang"]').val();
		var id_penduduk = $('[name="id_penduduk"]').val();
		var jumlah_barang = $('[name="jumlah"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/save_pinjaman') ?>',
			type: 'POST',
			data: {id_barang:id_barang, id_penduduk:id_penduduk,jumlah_barang:jumlah_barang},
			success:function(data) {
				$('#add_pinjaman').modal('hide');
				$("#alert-success-text").html('Data Berhasil di Tambahkan');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
                daftar_peminjam();
			}
		});
	});

	$('#show_daftar_barang').on('click', '.edit_barang', function() {
		
		var id_barang = $(this).attr('data-id');
		var nama_barang = $(this).attr('data-nama');
		var jumlah = $(this).attr('data-jumlah');
		var satuan = $(this).attr('data-satuan');
		
		$('#edit_barang').modal('show');
		$('[name="id_barang_edit"]').val(id_barang);
		$('[name="nama_barang_edit"]').val(nama_barang);
		$('[name="jumlah_edit"]').val(jumlah);
		$('[name="satuan_edit"]').val(satuan);
	});

	$('#btn-edit-barang').on('click', function() {
		
		var id = $('[name="id_barang_edit"]').val();
		var nama_barang = $('[name="nama_barang_edit"]').val();
		var satuan = $('[name="satuan_edit"]').val();
		var jumlah = $('[name="jumlah_edit"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/update_barang') ?>',
			type: 'POST',
			data: {id:id, nama_barang:nama_barang, satuan:satuan, jumlah:jumlah},
			success:function(data) {
				$('#edit_barang').modal('hide');
				$("#alert-success-text").html('Data Berhasil di Ubah');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
			}
		});
	});

	$('#show_daftar_barang').on('click', '.hapus_barang', function() {
		
		var id_barang = $(this).attr('data-id');
		var nama_barang = $(this).attr('data-nama');
		var pinjam = $(this).attr('data-pinjam');

		if (pinjam != '') {
			$('#hapus_barang_pinjam').modal('show');
		}else{
			$('#hapus_barang').modal('show');
			$('[name="id_barang_hapus"]').val(id_barang);
			$('#nama_barang_hapus').html(nama_barang);
		}
		
		
	});

	$('#btn-delete-barang').on('click', function() {
		
		var id = $('[name="id_barang_hapus"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/delete_barang') ?>',
			type: 'POST',
			data: {id:id},
			success:function(data) {
				$('#hapus_barang').modal('hide');
				$("#alert-success-text").html('Data Berhasil di Hapus');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
			}
		});
	});

	$('#show_daftar_peminjam').on('click', '.hapus_pinjaman', function() {
		
		var id_peminjam = $(this).attr('data-id');
		var nama_penduduk = $(this).attr('data-penduduk');
		var id_barang = $(this).attr('data-barang');

		$('#hapus_pinjaman').modal('show');
		$('[name="id_barang_hapus"]').val(id_barang);
		$('[name="id_peminjam_hapus"]').val(id_peminjam);
		$('#nama_lengkap_hapus').html(nama_penduduk);
		
	});

	$('#btn-delete-pinjaman').on('click', function() {
		
		var id_barang = $('[name="id_barang_hapus"]').val();
		var id = $('[name="id_peminjam_hapus"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/delete_peminjam') ?>',
			type: 'POST',
			data: {id:id, id_barang:id_barang},
			success:function (data) {
				$('#hapus_pinjaman').modal('hide');
				$('[name="id_barang_hapus"]').val('');
				$('#nama_lengkap_hapus').html('');
				$("#alert-success-text").html('Data Berhasil di Hapus');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
                daftar_peminjam();
			}
		});
		
	});		

	$('#show_daftar_peminjam').on('click', '.selesai_pinjaman', function() {
		
		var id_peminjam = $(this).attr('data-id');
		var id_barang = $(this).attr('data-barang');

		$('#selesai_pinjaman').modal('show');
		$('[name="id_barang"]').val(id_barang);
		$('[name="id_peminjam"]').val(id_peminjam);
		
	});

	$('#btn-selesai-pinjaman').on('click', function() {
		
		var id_barang = $('[name="id_barang"]').val();
		var id = $('[name="id_peminjam"]').val();

		$.ajax({
			url: '<?= base_url('admin/Inventaris/selesai_pinjaman') ?>',
			type: 'POST',
			data: {id:id, id_barang:id_barang},
			success:function (data) {
				$('#selesai_pinjaman').modal('hide');
				$('[name="id_peminjam"]').val('');
				$('[name="id_barang"]').val('');
				$("#alert-success-text").html('Data Berhasil di Kembalikan');
                $("#alert-success").fadeIn().delay(2000).fadeOut();
                daftar_barang();
                daftar_peminjam();
			}
		});
		
	});		

});

</script>

</body>
</html>