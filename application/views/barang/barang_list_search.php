<div id="search-barang">
	<div id="search-barang-titleBar"><strong>Pecarian Barang</strong></div>
	<div id="search-barang-content">
		<form action="" method="post" id="form-search-barang" enctype="multipart/form-data">
			<?php echo input_text_hidden('NO','no','100%');?>
			<?php echo input_text('KODE','kode','100%');?>
			<?php echo input_text('NAMA','nama','100%');?>
			<?php echo input_option($dataJenisBarang,'kode', 'nama', 'JENIS','jenis','100%');?>
			<?php echo input_option($dataSupplier,'kode', 'nama', 'SUPPLIER','supplier','100%');?>
			<?php echo submit_button('cari-barang','Cari Barang','100px');?>
		</form>	
	</div>
</div>

<script type="text/javascript">
	    $('#form-search-barang').submit(function(event){
        
          event.preventDefault();
          //alert('masuk');
          
          var $form = $('#form-search-barang');
          var data = $form.serialize();
          var url = '<?php echo site_url("barang_controller/filterBarang") ?>';

           $.show_on_progress();

          $.post(url, data)
          .done(function(data){
            $.close_modal();              
          	$('#content').html(data);          
          })
          .fail(function(data){                     		
              $.show_error('pencarian gagal')
          });
       });
</script>