<div id="div-barang-lookUp" class="nav">
	<div class="div-con-plain">
		<input class="con-lookUp" id="txt-kode-nama" placeholder="ketikkan kode atau nama ..."  type="text"></input><div class="quick-add" id="cari-kode-nama"><span class="search-ico"></span></div>
		<!-- </input><div id="bayar">Bayar</div> -->
	</div>

	<div id="lookUp-parent" style="display: none"></div>
</div>

<form action="<?php echo site_url("penjualan_controller/insert") ?>" method="post" class="form-ajax-post" enctype="multipart/form-data">
	<div id="div-total-transaksi" class="nav">
		<div id="info-bar-caption">Total : </div>
		<div id="info-bar-val">
				<span id="total-transaksi-info" class="col-currency">Rp.0</span>

				<input id="text-total-trans"  name="total-trans" value="" style="display: none">					
				</input>
				<input id="text-total-bayar"  name="total-bayar" value="" style="display: none">					
				</input>
				<input id="text-jenis-bayar"  name="jenis-bayar" value="" style="display: none">					
				</input>
				<input id="text-sisa-bayar"  name="sisa-bayar" value="" style="display: none">					
				</input>
		</div>		
	</div>

	<div id="div-keranjang">
	<div style="min-height: 50px"></div>
	</div>
</form>	

<div id="bayar-form-temp" style="display: none">
	<div id="bayar-form" style="background-color: white" class="popUp-container">
		<div id="bayar-form-titel" class="popUp-title" style="padding: 5px">Pembayaran<span class="x-modal-button" onclick="$.close_modal()"></span></div>
		<div style="background-color: white; padding: 10px">
			<div>Total : <span id="total-bill-popUp" class="col-currency"></span></div>
			<div class="div-label">
				<label class="con-label">Jumlah Pembayaran</label>
			</div>
			<div class="div-con">
				<input autocomplete="off" style="width: 100%" class="con-text col-currency text-total-bayar-popUp" value="" type="text">
			</div>
			<div style="margin-top: 10px;">
				Kembalian : 
				<span class="kembalian col-currency">0</span>
			</div>
			<div class="div-button">
				<button id="simpan-bayar" class="con-button" style="width:100px">			Simpan
				</button>
			</div>
		</div>
	</div>	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#extra-nav').show();
		$('#status-bar').show();
		$('.menu-item').hide();
		$('#jual-menu').show();
		$('#title-bar').html('JUAL BARANG');

		$('#jual-menu').click(function(){			
			$('#total-bill-popUp').html($('#total-transaksi-info').html());
			$.show_popUp($('#bayar-form-temp').html());   
			$('.kembalian').html('0');
			$.col_currency_format();	


			$('.text-total-bayar-popUp').on('input',function(){
				var bayar = parseInt($(this).unmask());
				var totalBill = parseInt($('#text-total-trans').val());
				if (bayar >= totalBill) {
					//alert(parseInt(bayar) > parseInt(totalBill));
					$('#text-total-bayar').val(totalBill);
					$('#text-jenis-bayar').val('tunai');
					$('#text-sisa-bayar').val('0');
					$('.kembalian').html( bayar - totalBill );
					$.col_currency_format();	
				}else{
					$('#text-total-bayar').val(bayar);
					$('#text-jenis-bayar').val('kredit');
					$('#text-sisa-bayar').val(totalBill - bayar);
				}				
			});	
		});
		

 		$('.simpan-bayar').click(function(){
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


		$('#cari-kode-nama').click(function(){
			var strFilter = $('#txt-kode-nama').val();
			if (strFilter!='') {
				fillKeranjang(strFilter);				
			}else{
				$.show_error('anda belum mengisi kode / nama');
			}
         	
		});

	});	      	

	function closeLookUp(){
		var lookUpParent = $('#lookUp-parent');
		lookUpParent.hide();
		lookUpParent.html('');

	}

	function cek_bayar(){		

		
	}

	function hitungTotal(){
		var grandTotal = 0;
		$('.text-sub-total').each(function(index){
			grandTotal = grandTotal + parseInt($(this).val());
		});
		$('#total-transaksi-info').html(grandTotal);
		$('#text-total-trans').val(grandTotal);
	}

	function fillKeranjang(strFilter){          
			$.show_on_progress();
          //cek apakah user memasukkan kode atau tidak
			$.getJSON( '<?php echo site_url('jual/getItem/')?>' + strFilter, function( result ) {
				
			  	$.close_modal();
		    	if (result.jmlData == 0) {
		    		// alert('tidak ditemukan');
		    		$.show_error('data tidak ditemukan');
		    	}

		    	if (result.jmlData == 1) {		    		
					$.close_modal();
					var temp = $('#div-keranjang').html();
					$('#div-keranjang').html(result.html);
					//alert(temp);
					$('#div-keranjang').append(temp);   
					//$('#div-keranjang').append(result.html);
					hitungTotal();

					$('.qty-input').off();					
					$('.qty-input').on('input',function(){						
						var me = $(this);
						var qty = me.val();
						me.attr('value',qty);
						var harga = me.attr('harga');
						var subtotal = qty * harga;						
						$('#' + me.attr('subTotal')).html(subtotal);
						$('#text-' + me.attr('subTotal')).attr('value',subtotal);
						hitungTotal();
						$.col_currency_format();
					});                          
					
		    	}			    				  

		    	if (result.jmlData > 1) {
		    		// alert('ditemukan lebih dari satu');		    		
		   // 		$.close_modal();
		   			var lookUpParent = $('#lookUp-parent');
		    		lookUpParent.show();
		    		lookUpParent.html(result.html);
		   //  		var temp = $('#div-keranjang').html();
					// $('#div-keranjang').html(result.html);
					// $('#div-keranjang').append(temp);					
					$('.lookUp-item').click(function(){						
						var id = $(this).attr('id');						
						fillKeranjang(id);
						closeLookUp();
						
					});

					$('#lookUp-overlay').click(function(){
						closeLookUp();
					});

					$('.close-lookUp').click(function(){closeLookUp();});

					
		    		
		    	}
			 $.col_currency_format();
			});          
	}


</script>