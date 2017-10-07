<div id="add-menu" onclick="goTo('<?php echo site_url('barang/add')?>')">
  <span class="add-ico"></span></div>
<div id="content"> 

   <?php if ($daftarBarang != NULL): ?>
        <?php $this->load->view('barang/barang_list_item'); ?>          
    <?php else :?>
        <div class="no-data">Tidak Ada Data</div>
    <?php endif ?> 		
    
</div>


