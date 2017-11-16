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

    //<function untuk mencegah popUp ditutup tanpa sengaja>
    $.plainModal_prepare = function(){
        $('.my-plain-modal').on('plainmodalbeforeclose', function(event) {
            if ($(this).attr('closeAble') == 'no') {           
                event.preventDefault(); // Stay opening             
            }
        });               
    }

    //<function untuk memformat nominal harga>
    $.col_currency_format = function(){
        $('.col-currency').priceFormat({
            prefix: 'Rp ',
            centsLimit: 0,
            thousandsSeparator: '.'
        });  

        $('.con-percent2').priceFormat({
            prefix: '',                    
            centsLimit: 0,
            limit: 0,
            thousandsSeparator: '.'
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

  //       $.show_search = function(){
  //           $('#search-input').show('fast');
  //           $('#title-bar').hide('fast');
  //           $('.con-search').focus();
  //       }

  //       $.hide_search = function(){
  //           $('#search-input').hide('fast');
  //           $('#title-bar').show('fast');
  //       }

		// $.show_menu_modal = function($modal){
		// 	$modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}});
		// 	$modal.plainModal('open');
		// }

    //<function untuk memunculkan popUp dialog box konfirmasi/>
    $.show_confirm = function (message, yesFunc, noFunc){      			
    	var $confirm = $('#confirm-modal');
    	$confirm.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});
    	$('#confirm-modal-content').html(message);
    	$('#confirm-button-ya').attr('onClick', yesFunc);
    	$('#confirm-button-no').attr('onClick', noFunc);
    	$confirm.attr('closeAble','no');
    	$confirm.plainModal('open');
    }

    //<function untuk menutup popUp dialog box konfirmasi/>
    $.close_confirm = function (){
    	var $confirm = $('#confirm-modal');
    	$confirm.attr('closeAble','yes');
    	$confirm.plainModal('close');
    }

    //<function untuk memunculkan dialog popUp dengan content custom/>
    $.show_popUp = function (htmlContent){               
        var $popUp = $('#popUp-modal');
        $popUp.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});
        $popUp.html(htmlContent);            
        $popUp.attr('closeAble','yes');
        $.close_modal();
        $popUp.plainModal('open');
    }

    //<function untuk menutup dialog popUp />
    // $.close_popUp = function (){
    //     var $popUp = $('#popUp-modal');
    //     $popUp.attr('closeAble','yes');
    //     $popUp.plainModal('close');
    // }

    //<function untuk memunculkan popUp loading box (info proses sedang berjalan)/>
	$.show_on_progress = function (message){	 				 	
        var $modal = $('#on-progress-modal');
        $modal.plainModal({overlay: {fillColor: 'white', opacity: 0.5}, force: true});                
        $modal.html(message);                    
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');
        $modal.attr('closeAble','no');                      
    }

    
    //<function untuk memunculkan popUp pesan error/>
    $.show_error = function (message){
        var $modal = $('#fail-modal');     
        $modal.html(message);    
        $modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});       
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');                                  
        setTimeout(function (){$.close_modal();}, 2000);                  
    }

    //<function untuk memunculkan popUp pesan sukses/>
    $.show_success = function (message){
        var $modal = $('#success-modal');
        $modal.html(message);    
        $modal.plainModal({overlay: {fillColor: '#000', opacity: 0.5}, force: true});       
        $('.my-plain-modal').attr('closeAble','yes');
        $modal.plainModal('open');                                  
        setTimeout(function (){$.close_modal();}, 1000);
    }

    //<function untuk menutup semua popUp/>
    $.close_modal = function (){                          

        $('.my-plain-modal').attr('closeAble', 'yes');          
        setTimeout(function (){
            
            $('.my-plain-modal').plainModal('close');
            // $('.my-plain-modal').hide();
            // $('.plainmodal-overlay').hide();
        }, 190);
             
    }

    function select_menu(me){
        $('.menu-child').css('background-color','transparent');
        $(me).css('background-color','#009999');
        var link = $(me).attr('linkMenu');
        $('#menu-bar-wrapper').fadeOut('fast');          
        $('.close-left').animate({ width: '0px' }, 600, 'easeOutQuad', function(){
            $('#main-container').css('white-space','normal');    
            goTo(link,true);
            $(this).removeClass().addClass('open-left');
        });                    
    }

    function goTo(link,push=true){        
        // window.location.href = link + '.html';
          $.show_on_progress();
          $('#content').html('');   
          $.get( link + '?partial=true',function(page) {
        
              setTimeout(function (){
                $.close_modal();

                }, 50);

             $('#content').html(page);   
             if(push){history.pushState(null, '', link);}                      
              window.scrollTo(0,0);
              
          });
    }

    window.addEventListener("popstate", function(e) {
        goTo(location.href,false);
    });

    function toggleBar(me){
        var menuBarWrapper = $('#menu-bar-wrapper');
        var leftBar = $('#left-bar')
        if (leftBar.attr('class') == 'open-left') {            
            $('#main-container').css('white-space','nowrap');

            leftBar.animate({ width: '280px' }, 600, 'easeOutQuad',function(){
                menuBarWrapper.fadeIn('fast');                
            });            
            leftBar.removeClass().addClass('close-left');   
        }else{              
            menuBarWrapper.fadeOut('fast');          
            leftBar.animate({ width: '0px' }, 600, 'easeOutQuad', function(){
                $('#main-container').css('white-space','normal');    
            });            
            leftBar.removeClass().addClass('open-left');
        }
    }

    function toggleSideBar(me){
        var all_menu_child = $('.menu-child-wrapper');
        var target_menu_child = '#' + $(me).attr('id') + '-child-wrapper';
        all_menu_child.hide(600,'easeOutQuad');     
        $('.open-child').not(target_menu_child)
        .toggleClass('open-child');

        $(target_menu_child).toggleClass('open-child');
        $('.open-child').show(600,'easeOutQuad');
        //menu_child.removeClass('open-child');        
           
       
    }





</script>
<!--  -->    

</body>
</html>