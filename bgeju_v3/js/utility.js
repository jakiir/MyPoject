$(function(){

	/* -----------------------------------------------------
	 * jQuery Tools - Overlay
	 */
	$("img[rel]").overlay({fixed:false});


	/* -----------------------------------------------------
	 * Inpagelink
	 */	
	$("a[href^='#']").bind('click', function(event){
		if(event){
			event.preventDefault();
		}
		else if(window.event){
			window.event.returnValue = false;
		}
		var targetId = $(this).attr('href');
		var pos = $(targetId).offset();
		if (!pos) return;
		var ty = Math.min(pos.top, ($(document).height() - $(window).height()));
		$('html,body').animate({ scrollTop: ty }, 500, 'swing');
	});
});