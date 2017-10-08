<div id="content"> 
	<div id="btn_reset"><span class="btn_reset_ico"></span>Reset All</div>
</div>

<script type="text/javascript">
	$('#btn_reset').click(function () {
	        $.show_on_progress();
	        url = '<?php echo site_url('Reset_all_controller/reset_all')?>';
	        $.post(url, '')
	        .done(function(data){
	        $.show_success('berhasil mereset');

	        })
	        .fail(function(data){           
	            $.show_error(data);
	        });
	});

</script>