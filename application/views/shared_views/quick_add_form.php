<div id="quick-add-div" getUrl="<?php echo $getUrl ?>">

<form id="quick-add-form-ajax" action="<?php echo $insertUrl ?>" method="post" class="form-ajax-post" enctype="multipart/form-data">
	<?php echo input_text('NAMA','quick-nama','100%');?>
	<?php echo submit_button('quick-add-btnSimpan','Simpan', '100%');?>
</form>
	
</div>

<script type="text/javascript">
	$('#quick-add-form-ajax').submit(function(event){
	        event.preventDefault();	        
	        var $form = $(this);
	        var data = $form.serialize();
	        var url = $form.attr('action');

	        $.show_on_progress('');

	        $.post(url, data)
	        .done(function(data){
		        $.show_success('berhasil menyimpan');
		        		        	
			        $.get( $('#quick-add-div').attr('getUrl'),function( data ) {	
	              		$('#<?php echo $selectId ?>').html(data);              	
	          		});
	        })
	        .fail(function(data){           
	            $.show_error('gagal menyimpan, terjadi kesalahan')
	        });
	    });
</script>