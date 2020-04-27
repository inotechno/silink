<script type="text/javascript">
	$(document).ready(function(){
		data_pengaturan();

		function data_pengaturan() {
			$('.btn-setting').html('Ubah');
			$('.btn-setting').attr('id', 'ubah_pengaturan');
			$.ajax({
				url: '<?= base_url('admin/pengaturan/lihat_data') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$.each(data, function(id, nama_lingkungan, alamat, rt, rw, prov, kota, kec, kel, id_rt) {
						$('[name="nama_lingkungan"]').val(data.nama_lingkungan);
						$('[name="alamat"]').val(data.alamat);
						$('[name="rt"]').val(data.rt);
						$('[name="rw"]').val(data.rw);
						$('[name="prov"]').val(data.prov);
						$('[name="kota"]').val(data.kota);
						$('[name="kec"]').val(data.kec);
						$('[name="kel"]').val(data.kel);
						$('[name="id_rt"]').val(data.id_rt);

						$('[name="nama_lingkungan"]').prop('disabled', true);
						$('[name="alamat"]').prop('disabled', true);
						$('[name="rt"]').prop('disabled', true);
						$('[name="rw"]').prop('disabled', true);
						$('[name="prov"]').prop('disabled', true);
						$('[name="kota"]').prop('disabled', true);
						$('[name="kec"]').prop('disabled', true);
						$('[name="kel"]').prop('disabled', true);
						$('[name="id_rt"]').prop('disabled', true);
					});
				}
			});	
			return false;
		}

		$('#ubah_pengaturan').on('click', function() {
			$(this).html('Simpan');
			$(this).attr('id', 'simpan_pengaturan');

			$('[name="nama_lingkungan"]').prop('disabled', false);
			$('[name="alamat"]').prop('disabled', false);
			$('[name="rt"]').prop('disabled', false);
			$('[name="rw"]').prop('disabled', false);
			$('[name="prov"]').prop('disabled', false);
			$('[name="kota"]').prop('disabled', false);
			$('[name="kec"]').prop('disabled', false);
			$('[name="kel"]').prop('disabled', false);
			$('[name="id_rt"]').prop('disabled', false);

			$('#simpan_pengaturan').on('click', function() {
			
				var nama_lingkungan = $('[name="nama_lingkungan"]').val();
				var alamat = $('[name="alamat"]').val();
				var rt = $('[name="rt"]').val();
				var rw = $('[name="rw"]').val();
				var prov = $('[name="prov"]').val();
				var kota = $('[name="kota"]').val();
				var kec = $('[name="kec"]').val();
				var kel = $('[name="kel"]').val();
				var id_rt = $('[name="id_rt"]').val();

				$.ajax({
					url: '<?= base_url('admin/pengaturan/update_pengaturan') ?>',
					type: 'POST',
					dataType: 'JSON',
					data: {nama_lingkungan:nama_lingkungan, alamat:alamat, rt:rt, rw:rw, prov:prov, kota:kota, kec:kec, kel:kel, id_rt:id_rt},
					success:function (data) {
						$("#alert-success-text").html('Data Berhasil di Simpan');
                    	$("#alert-success").fadeIn().delay(1000).fadeOut();	
						data_pengaturan();
					}
				});
				
			});
		});

	});

</script>

</body>
</html>	