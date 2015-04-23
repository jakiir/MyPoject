
	$('.pagetopLink').hide(); 
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();		
		if (scroll >= 150) {    
			$('.pagetopLink').show(); 			 
		}
		if (scroll <= 150) {    
			$('.pagetopLink').hide();  
		}
		
	});



/* -----------------------------------------------------
 * Fontsize
 */

var currentSize;

function switchFontsize(size){
	if(currentSize){
		$("body").removeClass(currentSize);
        $('.selectTextsize[data-size='+currentSize+']').removeClass('current');
	}

	$("body").addClass(size);

    $('.selectTextsize[data-size='+size+']').addClass('current');

	currentSize = size;

	if($.cookie) $.cookie('fontSize', size, {expires: 7, path: '/'});
}

/* -----------------------------------------------------
 * jquery
 */
$(function(){
	// Constructor	
	/* 
	$('#pagetop .language dt').click(function(){
        $(this).next().slideToggle(80);
    }).css('cursor', 'pointer');


    var langList = $('#pagetop .language dl');
    langList.bind('selectstart', function(){return false;});
    langList.mousedown(function(){return false;});
    langList.css('-moz-user-select', 'none').css('-khtml-user-select', 'none').css('user-select', 'none');
    */

	//if(langAlt == ''){
    	//$('#pagetop .testlist a').attr('href', function(i, val){return location.href.replace(/\/[a-z]+?.\//, val );});
	//}
	//else {
		$('#pagetop .testlist a').attr('href', function(i, val){
			if(langAlt.charAt(0) == '/'){
				langAlt = langAlt.substring(1);
			}
			return val + langAlt;
		});
	//}
    

    // Textsize selector
	var fontSize;
	if($.cookie) {
		fontSize = $.cookie('fontSize');
	}

	if (fontSize){
		switchFontsize(fontSize);
	}
	else {
		switchFontsize('small');
	}

	$('.selectTextsize').click(function(e){
		e.preventDefault();
		switchFontsize($(this).attr('data-size'));
	});
	
	// Laboratory tab
	
	$(".tabs").each(function(){

		$(this).find(".tab-menu a").click(function(e) {
				e.preventDefault();
				$(this).parent().parent().find("a").removeClass("active");
				$(this).addClass("active");
				$(this).parent().parent().parent().parent().find(".tab").hide();
				var activeTab = $(this).attr("href");
				$(activeTab).fadeIn();
				return false;

		});

});
	
	
});

jQuery(document).ready(function() {
    jQuery(".content5454").hide();
    jQuery(".heading0223").click(function() {
        jQuery(this)
            .nextAll(".content5454:first").slideToggle(500)
            .siblings(".content5454").slideUp(500);
    });
});