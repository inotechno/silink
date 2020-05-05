
    <script src="<?= base_url('assets') ?>/assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets') ?>/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>

    <script>

	  $(document).ready(function() {

	  	$('#btn-add-kegiatan').on('click', function() {
	  		
	  		var title = $('[name="title"]').val();
	  		var start = $('[name="start"]').val();
	  		var end = $('[name="end"]').val();
	  		var color = $('[name="color"]').val();
	  		$.ajax({
		       url:'<?= base_url('pemuda/Kegiatan/add_kegiatan') ?>',
		       type:"POST",
		       data:{title:title, start:start, end:end, color:color},
		       success:function(){
		       		calendar.fullCalendar('refetchEvents');
		       		$('#tambah_kegiatan').modal('hide');
		       		$("#alert-success-text").html('Data Berhasil di Simpan');
                    $("#alert-success").fadeIn().delay(1000).fadeOut();
		       	}
		    });
	  	});

	  	$('#btn-edit-kegiatan').on('click', function() {
	  		var id = $('[name="id_edit"]').val();
	  		var title = $('[name="title_edit"]').val();
	  		var start = $('[name="start_edit"]').val();
	  		var end = $('[name="end_edit"]').val();
	  		var color = $('[name="color_edit"]').val();
	  		
	  		$.ajax({
		      url:"<?= base_url('pemuda/Kegiatan/update_kegiatan') ?>",
		      type:"POST",
		      data:{title:title, start:start, end:end, id:id, color:color},
		      success:function(){
		       	calendar.fullCalendar('refetchEvents');
		       	$('#update_kegiatan').modal('hide');
	       		$("#alert-success-text").html('Data Berhasil di Update');
	            $("#alert-success").fadeIn().delay(1000).fadeOut();
		      }
		    });
	  	});

	  	$('#btn-delete-kegiatan').on('click', function() {
	  		var id = $('[name="id_hapus"]').val();

	  		$.ajax({
		      url:"<?= base_url('pemuda/Kegiatan/delete_kegiatan') ?>",
		      type:"POST",
		      data:{id:id},
		      success:function(){
		       	calendar.fullCalendar('refetchEvents');
		       	$('#delete_kegiatan').modal('hide');
	       		$("#alert-success-text").html('Data Berhasil di Hapus');
	            $("#alert-success").fadeIn().delay(1000).fadeOut();
		      }
		    });
	  	});

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

	    eventResize:function(event){

	     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
	     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
	     var title = event.title;
	     var id = event.id;
	     $.ajax({
	      url:"<?= base_url('pemuda/Kegiatan/update_kegiatan') ?>",
	      type:"POST",
	      data:{title:title, start:start, end:end, id:id},
	      success:function(){
	       calendar.fullCalendar('refetchEvents');
	       alert('Event Berhasil Di Update');
	      }
	     })
	    },

	    eventDrop:function(event){
	     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
	     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
	     var title = event.title;
	     var color = event.color;
	     var id = event.id;
	     $.ajax({
	      url:"<?= base_url('pemuda/Kegiatan/update_kegiatan') ?>",
	      type:"POST",
	      data:{title:title, start:start, end:end, id:id, color:color},
	      success:function(){
	       calendar.fullCalendar('refetchEvents');
	       alert("Event Berhasil Di Update");
	      }
	     });
	    },
	    // Event Click Hapus
	    eventClick:function(event){

	    	$('#update_kegiatan').modal('show');
	    	$('[name="id_edit"]').val(event.id);
	    	$('[name="title_edit"]').val(event.title);
	  		$('[name="start_edit"]').val(new Date(event.start).toJSON().slice(0,19));
	  		$('[name="end_edit"]').val(new Date(event.end).toJSON().slice(0,19));
	  		$('[name="color_edit"]').val(event.color);
	  		$('#title_hapus').html(event.title);
	  		$('[name="id_hapus"]').val(event.id);
	    }
	   });
	  });
	  </script>

</body>
</html>