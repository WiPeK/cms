$(function() {
    $(document).on('mouseenter.collapse', '[data-toggle=collapse]', function(e) {
        var $this = $(this),
            href, target = $this.attr('data-target') || e.preventDefault() || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
            ,
            option = $(target).hasClass('in') ? 'hide' : "show";
            $('.panel-collapse').not(target).collapse("hide");
            $(target).collapse(option);
    });
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

jQuery(function($) {
	if($(window).width()>769){
		$('.navbar .dropdown').hover(function() {
			$(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

		}, function() {
			$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

		});

		$('.navbar .dropdown > a').click(function(){
			location.href = this.href;
		});

	});
};
