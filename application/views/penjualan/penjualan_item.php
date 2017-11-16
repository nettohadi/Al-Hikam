<div class="item-jual">
	<div class="item-jual-row-nama-hapus row-item">
		<div class="item-jual-col-nama col-item"><?php echo $dataBarang[0]->nama; echo input_text_hidden('nama[]', $dataBarang[0]->nama); ?></div>
		<div class="item-jual-col-hapus">Hapus</div>
	</div>
	<div class="item-jual-row-kode-diskon row-item">
		<div class="item-jual-col-kode col-item">Kode : <?php echo $dataBarang[0]->kode; echo input_text_hidden('kode[]', $dataBarang[0]->kode); ?></div>
		<div class="item-jual-col-diskon col-item">Diskon : <input type="tel" name="diskon[]"  class="con-item-jual-text con-percent2" style="display: inline-block;" value="0"></input>%</div>		
	</div>
	<div class="item-jual-row-qty-harga row-item">
		<div class="item-jual-col-qty col-item">Qty : 
			<input type="tel" name="qty[]"  class="qty-input con-item-jual-text con-percent2" style="display: inline-block;" value="1" harga="<?php echo $dataBarang[0]->harga_jual; ?>" subTotal="<?php echo $dataBarang[0]->kode;?>-sub-total" >
			</input>
		</div>
		<div class="item-jual-col-harga col-item">Harga : <span class="col-currency"><?php echo $dataBarang[0]->harga_jual; ?></span><?php echo input_text_hidden('harga_jual[]', $dataBarang[0]->harga_jual); echo input_text_hidden('harga_beli[]', $dataBarang[0]->harga_beli); ?></div>				      
	</div>
	<div class="item-jual-row-subTotal">
		Subtotal : <span id="<?php echo $dataBarang[0]->kode;?>-sub-total" class="sub-total col-currency"><?php echo $dataBarang[0]->harga_jual?></span>
		<input type="text" name="subTotal[]" id="text-<?php echo $dataBarang[0]->kode;?>-sub-total" class="text-sub-total" style="display: none" value="<?php echo $dataBarang[0]->harga_jual?>"></input>
	</div>
</div>