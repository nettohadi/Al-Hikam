<div id="topNav" class="nav">
	<div id="menu" onClick="toggleBar(this)"></div>	
	<div id="title-bar"></div>
	<div id="search-menu" class="menu-item" ><span class="search-ico"></span></div>	
	<div id="search-input">
		<form action="<?php echo site_url("barang/getData.html") ?>" method="post" class="search-ajax-post" enctype="multipart/form-data">
			<input placeholder="Telusuri" autocomplete="off" type="text" class="con-search"></input><span  onclick="$.hide_search()" class="close-search-ico"></span>
		</form>
	</div>
	
	<div id="save-menu" class="menu-item" style="float: right;"><span class="save-ico"></a></span></div>	
	<div id="jual-menu" class="menu-item" style="float: right;"><span class="uang-ico"></a></span></div>	

	<!-- <div id="jual-menu" class="hide-menu" style="float: right;"><span class="jual-ico"></a></span></div>	 -->

	<div id="add-menu" class="menu-item" onclick="goTo('<?php echo site_url('barang/add')?>')">
  	<span class="add-ico"></span></div>	
</div>
<!-- <div style="margin-bottom: 60px"></div> -->

