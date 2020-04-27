<script type="text/javascript">
	$(document).ready(function() {
		daftar_user();
		
		function daftar_user() {
			$.ajax({
	            url   : '<?= base_url("admin/user/show_user")?>',
	            method:"POST",
	            success : function(data){
	                $('#show_user').html(data);
	            }

	        });
		}

		$('#show_user').on('click', '.ubah_user', function() {
			var nama_lengkap = $(this).attr('data-nama');
			var username = $(this).attr('data-user');
			var email = $(this).attr('data-email');
			var level = $(this).attr('data-level');
			
			$('#update_user').modal('show');
			$('[name="nama_lengkap"]').val(nama_lengkap);
			$('[name="username"]').val(username);
			$('[name="email"]').val(email);
			$('[name="id_level"]').val(level);
		});

		$('#btn-ubah-user').on('click', function() {
			
			var username = $('[name="username"]').val();
			var email = $('[name="email"]').val();
			var id_level = $('[name="id_level"]').val();

			$.ajax({
				url: '<?= base_url('admin/user/update_user') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {id_level:id_level, username:username, email:email},
				success:function (data) {
					$('#update_user').modal('hide');
					$('[name="nama_lengkap"]').val('');
					$('[name="username"]').val('');
					$('[name="email"]').val('');
					$("#alert-success-text").html('Data Berhasil di Simpan');
                    $("#alert-success").fadeIn().delay(1000).fadeOut();	
                    daftar_user();
				}
			});
		});

		$('#show_user').on('click', '.hapus_user', function() {
			var username = $(this).attr('data-user');
			var nama_lengkap = $(this).attr('data-nama');
			
			$('#delete_user').modal('show');
			$('[name="username"]').val(username);
			$('#nama_user').html(nama_lengkap);
		});

		$('#btn-hapus-user').on('click', function() {
			
			var username = $('[name="username"]').val();

			$.ajax({
				url: '<?= base_url('admin/user/delete_user') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {username:username},
				success:function (data) {
					$('#delete_user').modal('hide');
					$('[name="username"]').val('');
					$('#nama_user').html('');
					$("#alert-success-text").html('Data Berhasil di Hapus');
                    $("#alert-success").fadeIn().delay(1000).fadeOut();	
                    daftar_user();
				}
			});
		});

		$('#show_user').on('click', '.ubah_status', function() {
			var username = $(this).attr('data-user');
			var status = $(this).attr('data-ganti');
			
			$.ajax({
				url: '<?= base_url('admin/user/change_status') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {username:username, status:status},
				success:function (data) {
					$("#alert-success-text").html('Data Berhasil di Ganti');
                    $("#alert-success").fadeIn().delay(1000).fadeOut();	
                    daftar_user();
				}
			});
		});

		$('#btn-add-user').on('click', function() {
			
			var id_user = $('[name="id_user_add"]').val();
			var username = $('[name="username_add"]').val();
			var password = $('[name="password_add"]').val();
			var email = $('[name="email_add"]').val();
			var id_level = $('[name="id_level_add"]').val();

			$.ajax({
				url: '<?= base_url('admin/user/add_user') ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id_user:id_user, username:username, password:password, email:email, id_level:id_level},
				success:function (data) {
					if (data.error) {
						window.alert('Username Sudah Ada');
					}else{
						$('#add_user').modal('hide');
						$('[name="username_add"]').val('');
						$('[name="password_add"]').val('');
						$('[name="email_add"]').val('');
						$("#alert-success-text").html('Data Berhasil Di Tambah');
	                    $("#alert-success").fadeIn().delay(1000).fadeOut();	
	                    daftar_user();
					}
				}
			});
			
		});

	});
</script>

</body>
</html>