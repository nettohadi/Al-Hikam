<?php $this->load->view('includes/header'); ?>
<div id="main-container">
	<div id="left-bar" class="open-left" >
		<?php $this->load->view('includes/side_bar'); ?>
	</div>
	<div id="right-bar">
		<?php $this->load->view('includes/top_menu'); ?>
		<div id="content">
			<?php $this->load->view($page); ?>
		</div>		
	</div>	
</div>


<?php $this->load->view('includes/footer'); ?>