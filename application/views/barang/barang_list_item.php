<?php foreach($daftarBarang as $barang):?>                        
          <div class="item-row" id="<?php echo $barang->kode ?>" deleteUrl="<?php echo site_url('barang/delete.html')?>">
            <div class="item-row-nama">
                <?php echo $barang->nama ?>
            </div>
            <div class="item-row-kode-supplier-qty-jenis">
              <div class="item-col-kode-supplier">
                <div class="item-row-kode">
                  <div class="item-col-kode-ico">
                      <span class="kode-ico"></span>    
                  </div>
                  <div class="item-col-kode">
                      <?php echo $barang->kode ?>
                  </div>
                </div>
                <div class="item-row-supplier">
                  <div class="item-col-supplier-ico">
                    <span class="supplier-ico"></span>
                  </div>
                  <div class="item-col-supplier">
                      <?php echo $barang->nama_supplier ?>
                  </div>
                </div>
              </div>
              <div class="item-col-qty-jenis">
                <div class="item-row-qty">
                  <div class="item-col-qty-ico">
                      <span class="qty-ico"></span>    
                  </div>
                  <div class="item-col-qty">
                      <?php echo $barang->qty.' '.$barang->nama_satuan ?>
                  </div>
                </div>
                <div class="item-row-jenis">
                  <div class="item-col-jenis-ico">
                    <span class="jenis-ico"></span>
                  </div>
                  <div class="item-col-jenis">
                      <?php echo $barang->nama_jenis ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-row-edit-hapus-harga">                
              <div class="item-col-harga-me">
                <div class="item-col-harga-ico">
                  <span class="harga-ico"></span>
                </div>
                <div class="item-col-harga">
                  <span class="col-currency">
                      <?php echo $barang->harga_jual ?>
                  </span>                  
                </div>
              </div>
              <div class="item-col-edit-hapus">                
                <div class="edit-menu" onclick="goTo('<?php echo site_url('barang/edit/').$barang->kode?>.html')">                  
                  <span class="edit-ico">
                    
                  </span>
                </div>
                <div class="delete-menu" itemId="<?php echo $barang->kode ?>">
                  <span class="delete-ico">
                    
                  </span>
                </div>
                <div class="detail-menu" onclick="goTo('<?php echo site_url('barang/edit/').$barang->kode?>')">                  
                  <span class="detail-ico">
                    
                  </span>
                </div>
              </div>  
            </div>
        </div>    
            
<?php endforeach; ?>    


<script>

$(document).ready(function()
    {     

      $('.menu-item').hide();
      $('#search-menu').show();

       $('#title-bar').html('BARANG');

       $.plainModal_prepare();
       $.currency_number_format();

       $('.delete-menu').unbind('click');
       $('.delete-menu').click(function(){
        $('#' + $(this).attr('itemId')).toggleClass('selected-row');
          $.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
       });


       $('#search-menu').unbind('click');
       $('#search-menu').click(function(){                    
          $.show_on_progress();
          $.get( '<?php echo site_url('Barang_controller/getBarangFormSearch')?>',function( data ) {
              $.close_modal();                             
              $.show_popUp(data);              
          });
          
       });


    });

  function hapus(me){      
      $.show_confirm('yakin ingin menghapus data ini ?', 'hapus_ajax()', 'batal()');
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
      setTimeout(function ()
        {
          selectedRow.hide('fast', function(){selectedRow.remove();});
        }, 500);                                    
    }).fail(function(data) {
      $.show_error('gagal menghapus');
    }); 
  
  }


  function batal(){
    $('.selected-row').removeClass('selected-row');
    $.close_confirm();
  }

  

  

</script>
