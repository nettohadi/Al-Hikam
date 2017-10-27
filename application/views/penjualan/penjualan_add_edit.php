<div id="div-barang-lookUp" class="nav">
	<div class="div-con-plain">
		<input class="con-lookUp" id="txt-kode-nama" placeholder="ketikkan kode atau nama ..."  type="text"></input><div class="quick-add" id="cari-kode-nama"><span class="quick-add-ico"></span></div>

	</div>
</div>
<div id="div-total-transaksi" class="nav">
	<div id="total-transaksi-info">Grand Total : 40.000</div>
</div>

<div id="div-keranjang">

</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#extra-nav').show();
		$('#status-bar').show();
		$('#title-bar').html('JUAL BARANG');

		$('#cari-kode-nama').click(function(){
          $.show_on_progress();
          var itemId = $('#txt-kode-nama').val();
          $.get( '<?php echo site_url('jual/getItem/')?>' + itemId, function( data ) {
              $.close_modal();
              var temp = $('#div-keranjang').html();
              $('#div-keranjang').html(data);
              $('#div-keranjang').append(temp);                             
                  
          });
		});
	});	      	
</script>