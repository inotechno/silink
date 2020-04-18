	<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/extra-libs/datatables/datatables.min.js"></script>
    
    <!-- apps -->
    <!-- apps -->
    <script src="<?= base_url('assets'); ?>/dist/js/app-style-switcher.js"></script>
    <script src="<?= base_url('assets'); ?>/dist/js/feather.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets'); ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->

    <script type="text/javascript">

    <!--
      function showTime() {
          var a_p = "";
          var today = new Date();
          var curr_hour = today.getHours();
          var curr_minute = today.getMinutes();
          var curr_second = today.getSeconds();
          // if (curr_hour < 12) {
          //     a_p = "AM";
          // } else {
          //     a_p = "PM";
          // }
          // if (curr_hour == 0) {
          //     curr_hour = 12;
          // }
          // if (curr_hour > 12) {
          //     curr_hour = curr_hour - 12;
          // }
          curr_hour = checkTime(curr_hour);
          curr_minute = checkTime(curr_minute);
          curr_second = checkTime(curr_second);
       document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
          }
   
      function checkTime(i) {
          if (i < 10) {
              i = "0" + i;
          }
          return i;
      }
      setInterval(showTime, 500);

      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth();
      var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
      var yy = date.getYear();
      var year = (yy < 1000) ? yy + 1900 : yy;
      document.getElementById('haritanggal').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
      //-->
    //-->
        
    </script>
