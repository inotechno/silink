
    <script src="<?= base_url('assets') ?>/assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets') ?>/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>

    <script>

	  $(document).ready(function() {

	   var calendar = $('#calendar').fullCalendar({
	   	
	    editable:true,
	    header:{
	     left:'prev,next today',
	     center:'title',
	     right:'month,agendaWeek,agendaDay'
	    },
	    events: 'Kegiatan/daftar_kegiatan',
	    selectable:true,
	    selectHelper:true,

	    // Event Update

	    editable:true,
		});
	});
	  </script>

</body>
</html>