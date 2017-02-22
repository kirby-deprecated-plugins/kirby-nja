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
				$('.nja-reset, .nja-delete').removeClass('nja-active');
				$('.nja-message-delete, .nja-message-reset').hide();
				if(!$(this).hasClass('nja-active')) {
					$(this).addClass('nja-active');
					$('.nja-message-reset').show();
				}
			});

			$('.nja-delete').on('click', function() {
				$('.nja-reset, .nja-delete').removeClass('nja-active');
				$('.nja-message-delete, .nja-message-reset').hide();
				if(!$(this).hasClass('nja-active')) {
					$(this).addClass('nja-active');
					$('.nja-message-delete').show();
				}
			});

			$('.nja-abort').on('click', function() {
				$(this).parent().parent().hide();
				$('.nja-reset, .nja-delete').removeClass('nja-active');
			});
		});
	};
})(jQuery);