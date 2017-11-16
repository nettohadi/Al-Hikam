<div id="div-barang-lookUp" class="nav">
	<div class="div-con-plain">
		<input class="con-lookUp" id="txt-kode-nama" placeholder="ketikkan kode atau nama ..."  type="text"></input><div class="quick-add" id="cari-kode-nama"><span class="quick-add-ico"></span></div>
		</input><div id="bayar">Bayar</div>
	</div>

	<div id="lookUp-parent" style="display: none"></div>
</div>

<form action="<?php echo site_url("penjualan_controller/insert") ?>" method="post" class="form-ajax-post" enctype="multipart/form-data">
	<div id="div-total-transaksi" class="nav">
		<div  class="info-bar">Grand Total : <span id="total-transaksi-info" class="col-currency">Rp.0</span><input id="text-total-trans" name="text-total-trans" value="" style="display: none"></input></div>
	</div>

	<div id="div-keranjang">

	</div>
</form>	


<script type="text/javascript">
	$(document).ready(function(){
		$('#extra-nav').show();
		$('#status-bar').show();
		$('#add-menu').hide();
		$('#title-bar').html('JUAL BARANG');


 		$('#bayar').click(function(){
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
					$('#div-keranjang').append(temp);   

					hitungTotal();

					$('.qty-input').off();					
					$('.qty-input').on('input',function(){						
						var me = $(this);
						var qty = me.val();
						var harga = me.attr('harga');
						var subtotal = qty * harga;						
						$('#' + me.attr('subTotal')).html(subtotal);
						$('#text-' + me.attr('subTotal')).val(subtotal);
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