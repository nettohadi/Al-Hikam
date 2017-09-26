<div class="form-container">
	<h1>Edit Data Barang</h1>	
	
		<?php echo label_text('KODE','kode','100%', $dataBarang[0]->kode);?>
		<?php echo input_text('NAMA','nama','100%', $dataBarang[0]->nama);?>
		<?php echo input_text('MERK','merk','100%', $dataBarang[0]->merk);?>
		
		<?php echo input_option($dataJenisBarang,'kode', 'nama', 'JENIS','jenis','100%',$dataBarang[0]->kode_jenis);?>

		<?php echo input_option($dataSatuanBarang,'kode', 'nama', 'SATUAN','satuan','100%',$dataBarang[0]->kode_satuan);?>

		<?php echo input_currency('HARGA BELI (Rp.)','harga_beli','100%', $dataBarang[0]->harga_beli);?>
		<?php echo input_currency('HARGA JUAL (Rp.)','harga_jual','100%', $dataBarang[0]->harga_jual);?>
		<?php echo input_percent('DISKON ( % )','diskon','100%', $dataBarang[0]->diskon);?>
		<?php echo input_number('QTY DISKON','qty_diskon','100%', $dataBarang[0]->qty_diskon);?>
		<?php echo input_number('QTY','qty','100%', $dataBarang[0]->qty);?>		
		<?php echo input_date('TANGGAL EXPIRED','tgl_expired','100%', $dataBarang[0]->tgl_expired);?>
		<?php echo submit_button('simpan','Simpan');?>
	
</div>