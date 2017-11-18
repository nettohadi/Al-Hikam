
<div class="item-jual">
	<div class="item-jual-col-left">
		<div class="item-jual-row-kode">
			<?php 
				echo $dataBarang[0]->kode; 
				echo input_text_hidden('kode[]', $dataBarang[0]->kode); 
			?>
		</div>
		<div class="item-jual-row-nama">
			<?php 
				echo $dataBarang[0]->nama; 
				echo input_text_hidden('nama[]', $dataBarang[0]->nama); 
			?>
		</div>
		<div class="item-jual-row-qty-harga-diskon">
			<input autocomplete="off" type="text" name="qty[]"  class="qty-input con-item-jual-text con-percent2" style="display: inline-block;" value="1" harga="<?php echo $dataBarang[0]->harga_jual; ?>" subTotal="<?php echo $dataBarang[0]->kode;?>-sub-total" >
			</input>
			X (<span class="col-currency"><?php echo $dataBarang[0]->harga_jual; ?></span> - 
			<input autocomplete="off" type="tel" name="diskon[]"  class="con-item-jual-text con-percent2" style="display: inline-block;" placeholder="Disc" value=""></input>
			 )
			 <?php echo input_text_hidden('harga_beli[]', $dataBarang[0]->harga_beli); ?>
		</div>
	</div>
	<div class="item-jual-col-right">
		<div class="item-jual-row-subTotal-caption">
			Sub Total
		</div>
		<div class="item-jual-row-subTotal"> = 
			<span id="<?php echo $dataBarang[0]->kode;?>-sub-total" class="sub-total col-currency"><?php echo $dataBarang[0]->harga_jual?></span>
		<input type="text" name="subTotal[]" id="text-<?php echo $dataBarang[0]->kode;?>-sub-total" class="text-sub-total" style="display: none" value="<?php echo $dataBarang[0]->harga_jual?>"></input>	
		</div>
	</div>
</div>