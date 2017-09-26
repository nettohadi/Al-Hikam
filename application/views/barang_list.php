<div id="add-menu" onclick="goTo('<?php echo site_url('barang/add')?>')"><span class="add-ico"></span></div> 
<div id="content">    
    <!-- <div style="margin:auto;width:100%;">
    	<?php echo link_button_style('Input Data Barang',site_url("barang/add.html"),'60%')?>
    	<?php echo normal_button('btn-hapus','Hapus', '39%')?>    	
    </div> -->

			<?php foreach($daftarBarang as $barang):?>                        
          <div class="item-row" id="<?php echo $barang->kode ?>" deleteUrl="<?php echo site_url('barang/delete.html')?>">
            <div class="item-col-left"onclick="goTo('<?php echo site_url('barang/edit/').$barang->kode?>')" >        
              <div class="item-row-kode-harga">
                <div class="item-col-kode">
                    <span class="kode-ico"></span>
                    <?php echo $barang->kode ?>
                </div>
                <div class="item-col-harga">
                    <span class="harga-ico"></span>                    
                    <span class="col-currency ">
                      <?php echo $barang->harga_jual ?>
                    </span>
                </div>
              </div>
              <div class="item-row-nama">
                <?php echo $barang->nama ?>
              </div>
              <div class="item-row-supplier-jenis-qty">
                <div class="item-col-supplier-jenis">
                    <div class="item-col-supplier">
                        <span class="supplier-ico"></span>
                        <?php echo $barang->supplier ?>  
                    </div>
                    <div class="item-col-jenis">
                        <span class="jenis-ico"></span>
                        <?php echo $barang->nama_jenis ?>  
                    </div>                    
                </div>
                <div class="item-col-qty">
                    <span class="qty-ico"></span>         
                      <?php echo $barang->qty.' '.$barang->nama_satuan ?>
                </div>
              </div>
            </div>  
            <div class="item-col-right" onclick="hapus(this)">
              <span class="delete-ico"></span>         
            </div>
          </div>
			<?php endforeach; ?>    
                             
</div>	

<div id="optionDialog" style="display:none">
	<div class="div-underline"><a id="link-detil" class="link-menu-style" href="#">Lebih Detil ...</a></div>	
	<div class="div-underline"><a id="link-edit" class="link-menu-style" href="#">Edit</a></div>	
</div>



<script>

  $(document).ready(function()
    {    	


       $('#title-bar').html('Barang');

       $.plainModal_prepare();
       $.currency_number_format();

       $('#delete-menu').click(function(){
       		$.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
       })

    });

  function hapus(me){
      $(me).parent().toggleClass('selected-row');
      $.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
  }

  function checkThis(rowId, me){  	
  	if ($(me).prop('checked') == true) {
  		$('#'+rowId).addClass('selected-row');			
  	}  	
  	else{
  		$('#'+rowId).removeClass('selected-row');			
  	}
  }

  function hapus_ajax(){  

      $.close_confirm();

   		var selectedRow = $('.selected-row');	
   		//var url = $table.attr('deleteUrl');       		
   		$.ajax({
  		url: selectedRow.attr('deleteUrl'),
      method: "POST", 
      data: { "kode": selectedRow.attr('id')},
      dataType: "text"
    }).done(function(data) {		  		    
      //$.show_success('berhasil menghapus');	          	      
      setTimeout(function (){selectedRow.hide('slow');}, 1000);                  		              
    }).fail(function(data) {
      $.show_error('gagal menghapus');
    }); 
  
  }


  function batal(){
  	$('.selected-row').removeClass('selected-row');
  	$.close_confirm();
  }

  function goTo(link){  			
  			window.location.href = link + '.html';
       }

	

</script>

