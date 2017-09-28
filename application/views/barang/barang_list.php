<div id="add-menu" onclick="goTo('<?php echo site_url('barang/add')?>')">
  <span class="add-ico"></span></div>
<div id="content">    
    
    <?php if ($daftarBarang != NULL): ?>
        <?php $this->load->view('barang/barang_list_item'); ?>  
    <?php else :?>
        <div class="no-data">Tidak Ada Data</div>
    <?php endif ?>
		
</div>

<script>

  $(document).ready(function()
    {    	


       $('#title-bar').html('BARANG');

       $.plainModal_prepare();
       $.currency_number_format();

       $('.delete-menu').click(function(){
        $('#' + $(this).attr('itemId')).toggleClass('selected-row');
       		$.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
       })

    });

  function hapus(me){      
      $.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
  }

  // function checkThis(rowId, me){  	
  // 	if ($(me).prop('checked') == true) {
  // 		$('#'+rowId).addClass('selected-row');			
  // 	}  	
  // 	else{
  // 		$('#'+rowId).removeClass('selected-row');			
  // 	}
  // }

  function hapus_ajax(){  

      $.close_confirm();

   		var selectedRow = $('.selected-row');	
   		//var url = $table.attr('deleteUrl');       		
   		$.ajax({
  		url: selectedRow.attr('deleteUrl'),
      method: "POST", 
      data: { "kode": selectedRow.attr('id')},
      dataType: "text"
    }).done(function(data) {		  		    
      //$.show_success('berhasil menghapus');	          	      
      setTimeout(function ()
        {
          selectedRow.hide('fast', function(){selectedRow.remove();});
        }, 500);                  		              
    }).fail(function(data) {
      $.show_error('gagal menghapus');
    }); 
  
  }


  function batal(){
  	$('.selected-row').removeClass('selected-row');
  	$.close_confirm();
  }

  function goTo(link){  			
  			window.location.href = link + '.html';
       }

	

</script>

