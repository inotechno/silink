<script src="<?= base_url('assets'); ?>/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/pages/dashboards/dashboard1.min.js"></script>

<script type="text/javascript">
	
	dashboard();

	function dashboard() {
		$.ajax({
			url: '<?= base_url('admin/dashboard/get_jumlah') ?>',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
               $.each(data,function(penduduk, keluarga, pemuda){
               	console.log(data.penduduk)
               	$('#jumlah_pemuda').html(data.pemuda);
               	$('#jumlah_penduduk').html(data.penduduk);
               	$('#jumlah_keluarga').html(data.keluarga);
               	
                });
            }
        });
        return false;
    }

</script>

</body>
</html>