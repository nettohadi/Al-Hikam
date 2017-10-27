<?php if ($daftarBarang != NULL): ?>
	<div id="list-container">
		<?php $this->load->view('barang/barang_list_item'); ?>          		
	</div>
<?php else :?>
    <div class="no-data">Tidak Ada Data</div>
<?php endif ?> 		


