var globalNavi = {
	currentBtn : undefined
};

/* -----------------------------------------------------
 * Global navigation
 */
globalNavi.init = function(){

	// preload
	$('.naviBtn img').each(
		function(){
			var src = $(this).attr('src').replace('_current', '');
			$(this).clone().attr('src', src.replace('.png', '_rollover.png'));
		}
	);

	$('.main ul .nondropdown').hover(
	function(){
        $(this).addClass('rollover');
	}, function(){
        $(this).removeClass('rollover');
	}
	);

	$('.main ul .dropdown').bind('mouseenter', function(){
		globalNavi.rollOver($(this));
	});

	$('.main ul .dropdown').bind('mouseleave', function(){
		globalNavi.rollOut($(this));
	});

	$('.main').bind('mouseleave', function(e){
		globalNavi.rollOut(globalNavi.currentBtn);
	});

	$('.main ul .searchBox').bind('mouseenter', function(){
		globalNavi.rollOut(globalNavi.currentBtn);
	});
};

globalNavi.rollOver = function($t){
	if($t == undefined) return;

	$t.addClass('rollover');

	var menu = $t.find('.rolloverMenu');
	if(menu != undefined) menu.show();

	var src = $t.find('.naviBtn img').attr('src');
	if(src != undefined){
		if(src.indexOf('_rollover.png') == -1){
			if(src.indexOf('_current.png') == -1){
				$t.find('.naviBtn img').attr('src', src.replace('.png', '_rollover.png'));
			}
            else {
                src = src.replace('_current', '');
                $t.find('.naviBtn img').attr('src', src.replace('.png', '_rollover.png'));
            }
		}
	}
	globalNavi.currentBtn = $t;
};

globalNavi.rollOut = function($t){
	if($t == undefined) return;

	var menu = $t.find('.rolloverMenu');
	if(menu != undefined) menu.hide();

	$t.removeClass('rollover');

	var src = $t.find('.naviBtn img').attr('src');
	if(src != undefined){
		if(src.indexOf('_rollover.png') > 0){
            if($t.hasClass('current')){
                $t.find('.naviBtn img').attr('src', src.replace('_rollover.png', '_current.png'));
            }
            else {
                $t.find('.naviBtn img').attr('src', src.replace('_rollover.png', '.png'));
            }
		}
	}
};

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
	globalNavi.init();


	// Language selector - 2012/06/11 ãƒªãƒ³ã‚¯ã«å¤‰æ›´
	
	/* 
	$('#pagetop .language dt').click(function(){
        $(this).next().slideToggle(80);
    }).css('cursor', 'pointer');


    var langList = $('#pagetop .language dl');
    langList.bind('selectstart', function(){return false;});
    langList.mousedown(function(){return false;});
    langList.css('-moz-user-select', 'none').css('-khtml-user-select', 'none').css('user-select', 'none');
    */

	if(langAlt == ''){
    	$('#pagetop .testlist a').attr('href', function(i, val){return location.href.replace(/\/[a-z]+?.\//, val );});
	}
	else {
		$('#pagetop .testlist a').attr('href', function(i, val){
			if(langAlt.charAt(0) == '/'){
				langAlt = langAlt.substring(1);
			}
			return val + langAlt;
		});
	}
    

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
});