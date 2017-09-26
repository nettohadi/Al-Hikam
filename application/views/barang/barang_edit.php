<div class="form-container">
	<h1>Edit Data Barang</h1>	
	<form action="<?php echo site_url("barang/update.html") ?>" method="post" class="form-ajax-post" enctype="multipart/form-data">
		<?php echo input_text_hidden('KODE','kode','100%', $dataBarang[0]->kode);?>
		<?php echo input_text('NAMA','nama','100%', $dataBarang[0]->nama);?>
		<?php echo input_text('MERK','merk','100%', $dataBarang[0]->merk);?>
		
		<?php echo input_option($dataJenisBarang,'kode', 'nama', 'JENIS','jenis','100%',$dataBarang[0]->kode_jenis);?>

		<?php echo input_option($dataSatuanBarang,'kode', 'nama', 'SATUAN','satuan','100%',$dataBarang[0]->kode_satuan);?>

		<?php echo input_currency('HARGA BELI (Rp.)','harga_beli','100%', $dataBarang[0]->harga_beli);?>
		<?php echo input_currency('HARGA JUAL (Rp.)','harga_jual','100%', $dataBarang[0]->harga_jual);?>
		<?php echo input_percent('DISKON ( % )','diskon','100%', $dataBarang[0]->diskon);?>
		<?php echo input_number('QTY DISKON','qty_diskon','100%', $dataBarang[0]->qty_diskon);?>
		<?php echo input_number('QTY','qty','100%', $dataBarang[0]->qty);?>	
		<?php echo input_text('SUPPLIER','supplier','100%', $dataBarang[0]->supplier);?>	
		<?php echo input_date('TANGGAL EXPIRED','tgl_expired','100%', $dataBarang[0]->tgl_expired);?>		
		<?php echo link_button_style('daftar barang',site_url("barang_controller/"),'100%')?>
	</form>	
</div>

<script type="text/javascript">
	$(document).ready(function(){                        
		$('#add-menu').addClass('hide-menu');      
      	$('#delete-menu').addClass('hide-menu');      
      	$('#save-menu').addClass('show-menu');  
      	$('#search-menu').addClass('hide-menu');                            

		$.plainModal_prepare();
       	$.currency_number_format();

		$('#save-menu').click(function(){
	        // event.preventDefault();

	        var $form = $('.form-ajax-post');
	        var data = $form.serialize();
	        var url = $form.attr('action');

	        $.show_on_progress('sedang menyimpan...');

	        $.post(url, data)
	        .done(function(data){
	        $.show_success('berhasil menyimpan');

	        })
	        .fail(function(data){           
	            $.show_error('gagal menyimpan, terjadi kesalahan')
	        });
	    });
	});
</script>