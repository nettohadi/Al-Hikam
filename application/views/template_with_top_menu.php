<?php
if ($this->input->get('partial') == 'true') {
	$this->load->view($page);
}else{
	$this->load->view('includes/full_page');
}

?>