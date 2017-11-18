<div id="lookUp-overlay"></div>	

<div id="lookUp-container">
	<div class="lookUp-title"><?php echo $jmlData ?> barang ditemukan<span class="close-lookUp x-modal-button"></span></div>
	<div class="lookUp-title">Pilih salah satu</div>
	<div id="lookUp-item-container">
		<?php foreach($dataBarang as $barang):?>
			<div id="<?php echo $barang->kode ?>" class="lookUp-item">
				<div id="<?php echo $barang->kode?>-nama" class="lookUp-row-item-nama">
					<?php echo $barang->nama?>
				</div>
				<div class="lookUp-row-item-kode-harga">
					<div id="<?php echo $barang->kode?>-kode" class="lookUp-col-item-kode">
						<?php echo $barang->kode?>
					</div>
					<div id="<?php echo $barang->kode?>-harga" class="lookUp-col-item-harga col-currency">
						<?php echo $barang->harga_jual?>
					</div>								
				</div>
			</div>
		<?php endforeach?>	
	</div>
</div>
