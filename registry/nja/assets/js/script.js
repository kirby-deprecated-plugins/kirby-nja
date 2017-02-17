(function($) {
	$.fn.nja = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'nja';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			var root = $(this).attr('data-root');

			$('.nja-reset').on('click', function() {
				$('.nja-message-delete').hide();
				$('.nja-message-reset').show();
			});

			$('.nja-delete').on('click', function() {
				$('.nja-message-reset').hide();
				$('.nja-message-delete').show();
			});

			$('.nja-abort').on('click', function() {
				$(this).parent().parent().hide();
			});
		});
	};
})(jQuery);