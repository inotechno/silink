<script type="text/javascript">
	$(document).ready(function() {
		view();
		function view() {
			$.ajax({
				url: '<?= base_url('profil/view') ?>',
				type: 'POST',
				dataType: 'json',
				success:function (data) {
					$.each(data, function(id, nama_lengkap, username, email) {
						$('[name="id"]').val(data.id);
						$('[name="nama_lengkap"]').val(data.nama_lengkap);
						$('[name="email"]').val(data.email);
						$('[name="username"]').val(data.username);
						$('[name="password"]').val('');
					});
				}

			});
			
		}

		function validasi() {
			var password = $('[name="password"]').val();

		}

		$('[name="konfir_password"]').keyup(function() {
			var password = $('[name="password"]').val();
			if (password != $('[name="konfir_password"]').val()) {
                $('[name="konfir_password"]').addClass('is-invalid');
			}else{
                $('[name="konfir_password"]').removeClass('is-invalid');
                $('[name="konfir_password"]').addClass('is-valid');
			}
		});

		$('.btn-update').on('click', function() {
			
			if (window.confirm('Jika Anda Mengubah Data Maka Akan Logout')) {
				var email = $('[name="email"]').val();
				var username = $('[name="username"]').val();
				var password = $('[name="password"]').val();
				$.ajax({
					url: '<?= base_url('profil/update') ?>',
					type: 'POST',
					dataType: 'json',
					data: {username:username, email:email, password:password},
					success:function (respond) {
						window.location.href = "<?= base_url('logout') ?>";
					}
				});
			}
			
		});

	});
</script>

</body>
</html>