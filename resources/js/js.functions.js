var netCall = null;

(function($) {
$.fn.serializeFormJSON = function() {

   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};
})(jQuery);

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

	$(document).scroll(function(){

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

	});

	$(document).on('click', '.faq-form input[type=submit], .contact-us-form input[type=submit], .main-register-form input[type=submit], #home-register, .signin-form input[type=submit], .profiledit-form input[type=submit]', function(){

		var cls = $(this).closest('form').attr('class');
		var action = $(this).closest('form').attr("action");
		var inputs = $(this).closest('form').serializeFormJSON();
			inputs.submit = cls.substring(0, cls.length - 5);

		___form_d_submit(action, inputs, $(this));

		return false;
	});
	
	___img_gen_code();


	$("#upload_photo").ajaxForm();
	
	$(document).on('change', '#input-file', function(){
		$options = {
			success : function(response){
				console.log(response);
				response = JSON.parse(response);
				console.log(response.url);
				$("#profile-pic-image").attr('src', response.url);				
			}
		};					
		$('#upload_photo').ajaxSubmit($options);
	});
});

function ___img_gen_code() {
    
    if ( netCall == null ) {

    	$('.captcha .captcha-refresh').addClass('fa-spin');

	    netCall = $.ajax({
			        type: "post",
			        url: 'captcha/get_code',
			        success: function(response) {
				    	$('.captcha .captcha-code').attr('src', 'captcha/set_code/?id=' + response);
			        }			        
			    }).done(function(response){
			    	$('.captcha .captcha-refresh').removeClass('fa-spin');
		        	netCall = null;
		        });

	}
}

function ___form_d_submit(des, d, trigger)
{    
    if ( netCall == null ) {
    	
    	netCall = $.ajax({
			        url: des,
			        type: "post",
			        data: d,
			        dataType: 'json',
			        async: true,
			        cache: false,
			        success: function(res) {
						___form_show_res(res.message);
						
						if(res.success == true){
							trigger.closest('form')[0].reset();
							
							if(res.redirect !== 'undefined'){
								window.location = res.redirect;	
							}

						}

		        		netCall = null;
					},
					error: function(res){
						console.log("Error: " + res);
		        		netCall = null;
					}
			    }).done(function(res){
			    	console.log("Done: " + res);
		        	netCall = null;
		        });

    }
    else
    {
    	console.log("working...");
    }
}

function ___form_show_res(msg){
	console.log(msg)
	var msg_temp = "";

	if (msg instanceof Array) 
	{
		$(msg).each(function(i){
			msg_temp += '<p>' +  msg[i] + '<p>';
		});
	}
	else
	{
		msg_temp = '<p>' + msg + '</p>'
	}

	$(".form-results").html(msg_temp);
	$(".form-results").slideDown();
	setTimeout(function(){
		$(".form-results").slideUp();	
	}, 2500)
}

