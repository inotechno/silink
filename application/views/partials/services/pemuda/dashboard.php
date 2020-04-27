<script src="<?= base_url('assets'); ?>/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('assets'); ?>/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>

<script type="text/javascript">
	
	dashboard();
  log_activity();

	function dashboard() {
		$.ajax({
			url: '<?= base_url('admin/dashboard/get_jumlah') ?>',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
               $.each(data,function(penduduk, keluarga, pemuda,inventaris, pria, wanita, sd, smp, sma, d1, d2, d3, s1, s2, s3, tidak_sekolah){
               	console.log(data.penduduk)
                $('#jumlah_pemuda').html(data.pemuda);
                $('#jumlah_inventaris').html(data.inventaris);
                $('#jumlah_pemuda').html(data.pemuda);
                $('#total_pria').html(data.pria);
               	$('#total_wanita').html(data.wanita);
               	$('#jumlah_penduduk').html(data.penduduk);
               	$('#jumlah_keluarga').html(data.keluarga);
               	// ==============================================================
                // Campaign
                // ==============================================================

                  var chart1 = c3.generate({
                      bindto: '#total-jenis-kelamin',
                      data: {
                          columns: [
                              ['Pria', data.pria],
                              ['Wanita', data.wanita],
                          ],

                          type: 'donut',
                          tooltip: {
                              show: true
                          }
                      },
                      donut: {
                          label: {
                              show: false
                          },
                          title: 'Jenis Kelamin',
                          width: 18
                      },

                      legend: {
                          hide: true
                      },
                      color: {
                          pattern: [
                              '#5f76e8',
                              '#ff4f70'
                          ]
                      }
                  });

                  var chart = c3.generate({
                      bindto: '#pendidikan-chart',
                      data: {
                          // iris data from R
                          columns: [
                              ['SD', data.sd],
                              ['SMP', data.smp],
                              ['SMA', data.sma],
                              ['D1', data.d1],
                              ['D2', data.d2],
                              ['D3', data.d3],
                              ['S1', data.s1],
                              ['S2', data.s2],
                              ['S3', data.s3],
                              ['Tidak Sekolah', data.tidak_sekolah],
                          ],
                          type : 'pie',
                          onclick: function (d, i) { console.log("", d, i); },
                          onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                          onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                      }
                  });
                });
            }
        });
        return false;
    }

    function log_activity() {
      $.ajax({
        url: '<?= base_url('admin/dashboard/log_activity') ?>',
        type: 'POST',
        success:function (data) {
          $('.activity').html(data);
        }
      });
      
    }

</script>

</body>
</html>