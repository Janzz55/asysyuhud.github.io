(function($){
	jQuery(document).ready(function($) {
    //Popup video
    $(document).on('show.bs.modal', '.modal', function () {
		  $(this).appendTo('body');
		});
	});
})(jQuery);