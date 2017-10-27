<div class="form-container">	
	<form action="<?php echo site_url("barang/update.html") ?>" method="post" class="form-ajax-post" enctype="multipart/form-data">		
	
		<?php echo input_text_hidden('KODE','kode','100%', $dataBarang[0]->kode);?>

		<?php echo input_text('NAMA','nama','100%', $dataBarang[0]->nama);?>		

		<?php echo input_option_with_QuickAdd($dataJenisBarang,'kode', 'nama', 'JENIS','jenis','100%',$dataBarang[0]->kode_jenis,'Pilih Jenis Barang',site_url('Barang_controller/getQuickAddFormJenis'));?>

		<?php echo input_currency('HARGA BELI (Rp.)','harga_beli','100%', $dataBarang[0]->harga_beli);?>

		<?php echo input_currency('HARGA JUAL (Rp.)','harga_jual','100%', $dataBarang[0]->harga_jual);?>

		<?php echo input_percent('DISKON ( % )','diskon','100%', $dataBarang[0]->diskon);?>

		<?php echo input_number('QTY DISKON','qty_diskon','100%', $dataBarang[0]->qty_diskon);?>

		<?php echo input_number('QTY','qty','100%', $dataBarang[0]->qty);?>	

		<?php echo input_option_with_QuickAdd($dataSatuanBarang,'kode', 'nama', 'SATUAN','satuan','100%',$dataBarang[0]->kode_satuan,'Pilih Satuan Barang',site_url('Barang_controller/getQuickAddFormSatuan'));?>				

		<?php echo input_option_with_QuickAdd($dataSupplier,'kode', 'nama', 'SUPPLIER','supplier','100%',$dataBarang[0]->kode_supplier,'Pilih Supplier',site_url('Barang_controller/getQuickAddFormSupplier'));?>

	</form>	
	<?php echo normal_button('link-daftar-barang', 'daftar barang', '90%',site_url("barang_controller/"))?>
</div>

<script type="text/javascript">
	$(document).ready(function(){  
		$('#add-menu').removeClass().addClass('hide-menu');                       	
      	$('#save-menu').removeClass().addClass('show-menu'); 
      	$("#search-menu").removeClass().addClass('hide-menu');                    
      	$('#title-bar').html('EDIT BARANG');

		$.plainModal_prepare();
       	$.currency_number_format();

		$('#save-menu').click(function(){
	        // event.preventDefault();

	        var $form = $('.form-ajax-post');
	        var data = $form.serialize();
	        var url = $form.attr('action');

	        $.show_on_progress();

	        $.post(url, data)
	        .done(function(data){
	        $.show_success('berhasil menyimpan');

	        })
	        .fail(function(data){           
	            $.show_error('gagal menyimpan, terjadi kesalahan')
	        });
	    });

	    $('.quick-add').click(function(){
          $.get( $(this).attr('formUrl'),function( data ) {              
              $.show_popUp(data);              
          });
       	});
       	
	});
</script>