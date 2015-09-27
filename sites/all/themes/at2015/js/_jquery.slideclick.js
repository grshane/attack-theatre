jQuery(function($) {

		// jQuery 1.9 > Toggle Event dep 1.8
		$('#slideClick').click(function() {
			var it = $(this).data('it') || 1;
			switch ( it ) {
				case 1 :
					$(this).parent().animate({left:'0px'}, {queue:false, duration: 500});
					break;
				case 2 :
					$(this).parent().animate({left:'-400px'}, {queue: false, duration: 500});
					break;
			}
			it++;
			if(it > 2) it = 1;
			$(this).data('it', it);
		})

		// jQUery < 1.9
		$('#slideClick').toggle(function() {
			$(this).parent().animate({left:'0px'}, {queue:false, duration: 500});
		}, function() {
			$(this).parent().animate({left:'-400px'}, {queue:false, duration: 500});
		});	
	});