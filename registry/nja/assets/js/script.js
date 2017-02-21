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
				if(!$(this).hasClass('nja-active')) {
					$(this).addClass('nja-active');
					$('.nja-message-delete').hide();
					$('.nja-message-reset').show();
				} else {
					$(this).removeClass('nja-active');
					$('.nja-message-delete').hide();
					$('.nja-message-reset').hide();
				}
			});

			$('.nja-delete').on('click', function() {
				if(!$(this).hasClass('nja-active')) {
					$(this).addClass('nja-active');
					$('.nja-message-delete').show();
					$('.nja-message-reset').hide();
				} else {
					$(this).removeClass('nja-active');
					$('.nja-message-delete').hide();
					$('.nja-message-reset').hide();
				}
			});

			$('.nja-abort').on('click', function() {
				$(this).parent().parent().hide();
				$('.nja-reset, .nja-delete').removeClass('nja-active');
			});
		});
	};
})(jQuery);