<div class="item-jual">
	<div class="item-jual-row-nama-hapus">
		<div class="item-jual-col-nama"><?php echo $dataBarang[0]->nama ?></div>
		<div class="item-jual-col-hapus">Hapus</div>
	</div>
	<div class="item-jual-row-qty-harga">
		<div class="item-jual-col-qty">Qty : 1</div>
		<div class="item-jual-col-harga">Harga : <span class="col-currency"><?php echo $dataBarang[0]->harga_jual ?></span></div>				      
	</div>
	<div class="item-jual-row-subTotal">
		Subtotal : <span class="col-currency"><?php echo $dataBarang[0]->harga_jual ?></span>
	</div>
</div>