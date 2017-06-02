jQuery(document).ready(function() {
	$(".popup").hide();
	$(".popup_body").hide();
	
	$(".popup_close").click(function() {
		$(".popup").fadeOut(300, function() {
			$(".popup_body").fadeOut(100);
			
			var date = new Date();
			var time_n = date.getTime();
			$.cookie("popup",time_n);
		});
	
	});
	
	function show_popup() {
		
		var date = new Date();
		var time_n = date.getTime();
		var time_c = $.cookie("popup");
		
		if(time_c == null || time_c < (time_n - 30 * 24 * 60 * 60 * 1000)) {
			var popup_w = $(".popup").width();
			var popup_h = $(".popup").height();
			
			var window_w = $(window).width();
			var window_h = $(window).height();
			
			var margin_l = parseInt((window_w/2) - (popup_w/2));
			var margin_t = parseInt((window_h/2) - (popup_h/2));
			
			$(".popup_body").fadeIn(100,function () {
				$(".popup").
					css({'margin-left':margin_l,'margin-top':margin_t}).
					fadeIn(500);
			});
		}
	}
	
setTimeout(show_popup,3000)	

});