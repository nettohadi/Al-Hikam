<div id='on-progress-modal' class="my-plain-modal on-progress" style="display: none;" closeAble="yes"></div>

<div id='fail-modal' class="my-plain-modal on-fail" style="display: none;" closeAble="yes"></div>

<div id='success-modal' class="my-plain-modal on-success" style="display: none;" closeAble="yes"></div>

<div id='popUp-modal' class="my-plain-modal my-popUp" style="display: none;" closeAble="yes"></div>

<div id="confirm-modal" class="my-plain-modal" style="display: none;background-color: white;height:50px;padding:50px;" closeAble="no">
	<div id="confirm-modal-content">
	Yakin ingin menghapus ?
	</div>
	<div id="confirm-modal-footer">
		<button id="confirm-button-ya" type="button" onclick="" class="con-button" style="display: inline-block;">Ya</button>
		<button id="confirm-button-no" style="display: inline-block;" type="button" onclick="" class="con-button">Tidak</button>
	</div>
</div>



<!-- Script Section -->
<script type="text/javascript">      

    $.plainModal_prepare = function(){
        $('.my-plain-modal').on('plainmodalbeforeclose', function(event) {
            if ($(this).attr('closeAble') == 'no') {           
                event.preventDefault(); // Stay opening             
            }
        });               
    }

    $.currency_number_format = function(){
        $('.con-currency').priceFormat({
            prefix: '',
            centsLimit: 0,
            thousandsSeparator: '.'
        });

        $('.col-currency').priceFormat({
            prefix: 'Rp ',
            centsLimit: 0,
            thousandsSeparator: '.'
        });

        $('.con-number').priceFormat({
            prefix: '',
            centsLimit: 0,
            thousandsSeparator: '.'
        });                
        
        $('.con-percent').priceFormat({
            prefix: '',                    
            centsLimit: 0,
            thousandsSeparator: '.'
        });                                
    }

        $.show_search = function(){
            $('#search-input').show('fast');
            $('#title-bar').hide('fast');
            $('.con-search').focus();
        }

        $.hide_search = function(){
            $('#search-input').hide('fast');
            $('#title-bar').show('fast');
        }

		$.show_menu_modal = function($modal){
			$modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}});
			$modal.plainModal('open');
		}

		$.show_confirm = function (message, yesFunc, noFunc){      			
			var $confirm = $('#confirm-modal');
			$confirm.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});
			$('#confirm-modal-content').html(message);
			$('#confirm-button-ya').attr('onClick', yesFunc);
			$('#confirm-button-no').attr('onClick', noFunc);
			$confirm.attr('closeAble','no');
			$confirm.plainModal('open');
		}

		$.close_confirm = function (){
			var $confirm = $('#confirm-modal');
			$confirm.attr('closeAble','yes');
			$confirm.plainModal('close');
		}

        $.show_popUp = function (htmlContent){               
            var $popUp = $('#popUp-modal');
            $popUp.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});
            $popUp.html(htmlContent);            
            $popUp.attr('closeAble','no');
            $popUp.plainModal('open');
        }

        $.close_popUp = function (){
            var $popUp = $('#popUp-modal');
            $popUp.attr('closeAble','yes');
            $popUp.plainModal('close');
        }

		$.show_on_progress = function (message){	 				 	
        var $modal = $('#on-progress-modal');
        $modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});                
        $modal.html(message);                    
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');
        $modal.attr('closeAble','no');                      
    }

    

    $.show_error = function (message){
        var $modal = $('#fail-modal');     
        $modal.html(message);    
        $modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});       
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');                                  
        setTimeout(function (){$.close_modal($modal);}, 2000);                  
    }

    $.show_success = function (message){
        var $modal = $('#success-modal');
        $modal.html(message);    
        $modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});       
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');                                  
        setTimeout(function (){$.close_modal($modal);}, 1000);
    }

    $.close_modal = function ($me){                          
        $me.attr('closeAble', 'yes');          
        $me.plainModal('close');     
    }



</script>
<!--  -->    

</body>
</html>