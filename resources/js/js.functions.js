var netCall = null;

$(document).ready(function(){
  
	$(document).on('click', '.main-content-menu li a', function(){

		var offset = $($(this).attr('href')).offset().top;
		$('html, body').stop().animate({ scrollTop : offset-30 }, 800);
		$(".main-content-menu li").removeClass('active');
		$(this).closest('li').addClass('active');
		return false;

	});

	$(document).on('click', '.captcha .captcha-refresh', function(){

		___img_gen_code();
	
	});

/*	$(document).scroll(function(){

		if($('.main-content-menu').length > 0){

			if( $('.main-content-menu').height() < window.innerHeight-80 ) {

				if ( $(document).scrollTop() < $('.main-content-menu').offset().top ) {

					$('.main-content-menu').removeClass('sticy-main-content-menu');

				}

				if ( $(document).scrollTop() > $('.main-content-menu').offset().top ) {
				
					$('.main-content-menu').addClass('sticy-main-content-menu');
				
				}

				if ( $(document).scrollTop() > ( ( $("body").prop('scrollHeight') - window.innerHeight) - $('.site-footer').height() ) ) {
				
					var top = $(document).scrollTop() - ( ( $("body").prop('scrollHeight') - window.innerHeight) - $('.site-footer').height() )
					$('.main-content-menu').addClass('big-sticy-main-content-menu');	
					$('.main-content-menu').addClass('sticy-main-content-menu');
					$('.big-sticy-main-content-menu').css('top', '-' + top + 'px');
				
				} else {

					$('.big-sticy-main-content-menu').css('top', '20px');
					$('.big-sticy-main-content-menu').removeClass('big-sticy-main-content-menu');

				}

			}

		}

	});*/
	
	___img_gen_code();

});

function ___img_gen_code() {
    
    if ( netCall == null ) {

    	$('.captcha .captcha-refresh').addClass('fa-spin');

	    netCall = $.ajax({
			        type: "post",
			        url: 'contactus/get_code',
			        success: function(response) {
			            $('.captcha .captcha-key').attr('value', response);
				    	$('.captcha .captcha-code').attr('src', 'contactus/set_code/?id=' + response);
			        }			        
			    }).done(function(response){
			    	$('.captcha .captcha-refresh').removeClass('fa-spin');
		        	netCall = null;
		        });

	}
}