<div id="topNav">
	<div id="menu" style="float: left;"><a href="<?php echo site_url('home.html');?>" title="data-barang" ><span class="home"></span></a></div>	
	<div id="title-bar"></div>
	<div id="search-menu" ><span class="search-ico" onclick="$.show_search()"></span></div>	
	<div id="search-input">
		<form action="<?php echo site_url("barang/getData.html") ?>" method="post" class="search-ajax-post" enctype="multipart/form-data">
			<input placeholder="Telusuri" autocomplete="off" type="text" class="con-search"></input><span  onclick="$.hide_search()" class="close-search-ico"></span>
		</form>
	</div>
	
	<div id="save-menu" class="hide-menu" style="float: right;"><a href="#" title="add" ><span class="save-ico"></a></span></div>		
</div>
<div style="margin-bottom: 60px"></div>

