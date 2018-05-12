(function ($) {
    $(function () { 
		
		if (!$.cookie('was_')) {
			$('.cookie-modal').css('display', 'block');
		}

		$('.cookie-modal-btn').click(function () {
			$('.cookie-modal').css('display', 'none');
			document.location.reload();
		});

		$.cookie('was_', true, {
			expires: 365,
			path: '/'
		});
		
		$('.carousel').each(function () {
            $(this).carousel({
                interval: 2000
            })
        });
        $('.jobs-item').each(function(){
            var item = $(this);
            item.on('click', '.form-trigger .button', function(ev){
                ev.preventDefault();
                item.find('.form-trigger').addClass('hide');
                item.find('.form-vacancy').removeClass('hide');
            }).on('click', '.form-vacancy .button.cancel', function(ev){
                ev.preventDefault();
                item.find('.form-trigger').removeClass('hide');
                item.find('.form-vacancy').addClass('hide');
            });
        });
	});
})(jQuery);

jQuery(document).ready(function(){

	jQuery('.mobile_menu').click(function(){
		jQuery(this).toggleClass('expanded_menu');
		jQuery('.menu-main-container-wrap').toggleClass('expanded_menu');
	});
});
