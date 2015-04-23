var facultyExplorer = {
	boxWidth		: 520,
	boxAppended		: false,
	windowWidth		: 0,
	rightMax		: 0,
	rightMargin		: 0,
	ha				: null
};

 
/* -----------------------------------------------------
 * Faculty
 */
facultyExplorer.init = function(){
};


/* -----------------------------------------------------
 * jquery 
 */
$(function(){
	// Constructor
	facultyExplorer.init();
	facultyExplorer.bindRollOver($('#fixingLayout li'));
	facultyExplorer.bindRollOver($('#randomLayout li'));
	facultyExplorer.bindMouseDown($('#fixingLayout li'));
	facultyExplorer.bindMouseDown($('#randomLayout li'));
	facultyExplorer.ha = $(document.createElement('span'));
	$('body').append(facultyExplorer.ha);
	facultyExplorer.ha.css({'width' : '1px', 'height' : '1px', 'position' : 'absolute'});
	$('body').bind('mousemove', function(e){
		facultyExplorer.ha.css({'left' : e.pageX - 2, 'top' : e.pageY - 2});
	});
});

facultyExplorer.bindRollOver = function($t){
	$t.hover(function(){
		$(this).find('.img').stop().css({'opacity' : 0.6}).animate({'opacity' : 1, 'duration' : 400, 'easing' : 'easeOutSine'});
		
		var url = $(this).find('a').attr('href');
		var me = $(this);
		var haWidth = $(this).width(); 
		var haHeight = $(this).height();

		var $mainContents = $('#mainContents');
		var o = $mainContents.offset();
		facultyExplorer.windowWidth = $(window).width();
		facultyExplorer.rightMax = (o.left + $('#mainContents').width());
		facultyExplorer.rightMargin = facultyExplorer.windowWidth - facultyExplorer.rightMax;
		
		// facultyExplorer.rightMargin の値は
		// IE6, 7, 8, 9 でおよそ問題のない数字
		var box = $(document.createElement('div'));
		box.addClass('overlayBoxWrapper');
		box.html(facultyExplorer.getBoxInCode($(this).attr('id')));
		var off = $(this).offset();
		var currentBoxLeft = off.left + facultyExplorer.boxWidth;

		// すでにBoxがAppendされていれば削除してからAppend
		if(facultyExplorer.boxAppended){
			$('.overlayBoxWrapper').remove();
			$('body').append(box);
		}else{
			$('body').append(box);
			facultyExplorer.boxAppended = true;
		}
		
		box.find('a').attr('href', url);
		
		
		var originalHeight = box.find('.overlayBoxInner').height();
		
		var boxImgWidth = box.find('.img .b img').width();
		var boxImgHeight = box.find('.img .b img').height();

		if(facultyExplorer.windowWidth - currentBoxLeft > facultyExplorer.rightMargin){
			//	LEFT
			box.find('.overlayBox').addClass('type1');
			originalHeight = box.find('.overlayBoxWrapperInner').height();
			var p = Math.round(off.top + haHeight / 2) - Math.floor(originalHeight / 2);
			box.css({'left' : Math.ceil((off.left - (boxImgHeight - haWidth) / 2) - 16) + 'px', 'top' : p + 'px'});
		}else{
			//	RIGHT
			box.find('.overlayBox').addClass('type2');
			originalHeight = box.find('.overlayBoxWrapperInner').height();
			var p = Math.round(off.top + haHeight / 2) - Math.floor(originalHeight / 2);
			box.css({'left' : Math.round(off.left - facultyExplorer.boxWidth + haWidth / 2 + 235 / 2 + 16) + 'px', 'top' : p + 'px'});
		}
		
		box.find('.overlayBoxWrapperInner').css({'width' : '520px', 'height' : originalHeight + 'px'});
		var orgW = box.find('.overlayBox').width();
		var orgH = box.find('.overlayBox').height();
		box.find('.img .b img').css({'width' : '220px', 'height' : '220px'});
		
//		mcount = 0;
//		bMouseEnter = false; 
//		$('body').bind('mousemove', function(){
//			if(!bMouseEnter){
//				if(++mcount > 4){
//					$('body').unbind('mousemove');
//					box.find('.overlayBoxInner').unbind('mouseenter');
//					box.find('.overlayBoxInner').unbind('mouseleave');
//					facultyExplorer.boxAppended = false;
//					box.animate({'opacity' : 0}, 150, 'linear', function(){
//						$(this).remove();
//					});
//				}
//			}
//		});
		
		box.find('.overlayBoxInner').bind('mouseenter', function(){
			$(this).unbind('mouseenter');
			bMouseEnter = true;
		});

		// Box MouseLeave
		box.find('.overlayBoxInner').bind('mouseleave', function(){
			$(this).unbind('mouseleave');
			facultyExplorer.boxAppended = false;
			box.animate({'opacity' : 0}, 150, 'linear', function(){
				$(this).remove();
			});
		});
		
		// アニメーション
		var boxPhoto = box.find('.img .b img').hide();
		var boxText = box.find('.txtWrap').hide();
		// jquery.easingを利用する場合は以下の書式で書かないとエラー吐いた
		box.find('.overlayBox').css({'width' : '220px', 'height' : '20px', 'opacity' : 0}).
		animate({'width' : orgW + 'px', 'height' : orgH + 'px', 'opacity' : 1},{duration : 250, easing : 'easeOutExpo', complete : function(){
			boxText.show();
			boxText.find('.name').css({'opacity' : 0}).animate({'opacity' : 1}, 400, 'linear');
			boxText.find('.lab').css({'opacity' : 0}).animate({'opacity' : 1}, 400, 'linear');
			boxText.find('.txt').css({'opacity' : 0}).delay(100).animate({'opacity' : 1}, 400, 'linear');
		}});
		boxPhoto.css({'opacity' : 0}).delay(100).show().
		animate({'width' : '235px', 'height' : '235px', 'opacity' : 1}, {duration : 150, easing : 'easeOutSine', complete : function(){
			
		if(!boxPhoto._hittest(facultyExplorer.ha)){
			$(this).unbind('mouseleave');
			facultyExplorer.boxAppended = false;
			box.animate({'opacity' : 0}, 150, 'linear', function(){
				$(this).remove();
			});
		}
		
		}});
		
	}, function(){
		// out
		$(this).css({'opacity' : 1});
	});
};

facultyExplorer.bindMouseDown = function($t){
	// $t.find('a').bind('click mousedown', function(e){
	$t.find('a').bind('click', function(e){
		e.preventDefault();
	});
	$t.bind('mousedown', function(e){
		var url = $(this).find('a').attr('href');
		var me = $(this);
		var haWidth = $(this).width(); 
		var haHeight = $(this).height();

		var $mainContents = $('#mainContents');
		var o = $mainContents.offset();
		facultyExplorer.windowWidth = $(window).width();
		facultyExplorer.rightMax = (o.left + $('#mainContents').width());
		facultyExplorer.rightMargin = facultyExplorer.windowWidth - facultyExplorer.rightMax;
		
		// facultyExplorer.rightMargin の値は
		// IE6, 7, 8, 9 でおよそ問題のない数字
		var box = $(document.createElement('div'));
		box.addClass('overlayBoxWrapper');
		box.html(facultyExplorer.getBoxInCode($(this).attr('id')));
		var off = $(this).offset();
		var currentBoxLeft = off.left + facultyExplorer.boxWidth;

		// すでにBoxがAppendされていれば削除してからAppend
		if(facultyExplorer.boxAppended){
			$('.overlayBoxWrapper').remove();
			$('body').append(box);
		}else{
			$('body').append(box);
			facultyExplorer.boxAppended = true;
		}
		
		box.find('a').attr('href', url);
		
		// Box表示座標と寸法
		var originalHeight = box.find('.overlayBoxInner').height();
		
		var boxImgWidth = box.find('.img .b img').width();
		var boxImgHeight = box.find('.img .b img').height();

		if(facultyExplorer.windowWidth - currentBoxLeft > facultyExplorer.rightMargin){
			//	LEFT
			box.find('.overlayBox').addClass('type1');
			originalHeight = box.find('.overlayBoxWrapperInner').height();
			var p = Math.round(off.top + haHeight / 2) - Math.round(originalHeight / 2);
			box.css({'left' : Math.round((off.left - (boxImgHeight - haWidth) / 2) - 16) + 'px', 'top' : p + 'px'});
		}else{
			//	RIGHT
			box.find('.overlayBox').addClass('type2');
			originalHeight = box.find('.overlayBoxWrapperInner').height();
			var p = Math.round(off.top + haHeight / 2) - Math.round(originalHeight / 2);
			box.css({'left' : Math.round(off.left - facultyExplorer.boxWidth + haWidth / 2 + 235 / 2 + 16) + 'px', 'top' : p + 'px'});
		}
		
		box.find('.overlayBoxWrapperInner').css({'width' : '520px', 'height' : originalHeight + 'px'});
		var orgW = box.find('.overlayBox').width();
		var orgH = box.find('.overlayBox').height();
		box.find('.img .b img').css({'width' : '220px', 'height' : '220px'});		
		mcount = 0;
		bMouseEnter = false; 
		$('body').bind('mousemove', function(){
			if(!bMouseEnter){
				if(++mcount > 10){
					$('body').unbind('mousemove');
					box.find('.overlayBoxInner').unbind('mouseenter');
					box.find('.overlayBoxInner').unbind('mouseleave');
					facultyExplorer.boxAppended = false;
					box.animate({'opacity' : 0}, 150, 'linear', function(){
						$(this).remove();
					});
				}
			}
		});
		
		box.find('.overlayBoxInner').bind('mouseenter', function(){
			$(this).unbind('mouseenter');
			bMouseEnter = true;
		});

		// Box MouseLeave
		box.find('.overlayBoxInner').bind('mouseleave', function(){
			$(this).unbind('mouseleave');
			facultyExplorer.boxAppended = false;
			box.animate({'opacity' : 0}, 150, 'linear', function(){
				$(this).remove();
			});
		});
		
		
		var boxPhoto = box.find('.img .b img').hide();
		var boxText = box.find('.txtWrap').hide();		
		box.find('.overlayBox').css({'width' : '220px', 'height' : '20px', 'opacity' : 0}).
		animate({'width' : orgW + 'px', 'height' : orgH + 'px', 'opacity' : 1},{duration : 250, easing : 'easeOutExpo', complete : function(){
			boxText.show();
			boxText.find('.name').css({'opacity' : 0}).animate({'opacity' : 1}, 400, 'linear');
			boxText.find('.lab').css({'opacity' : 0}).animate({'opacity' : 1}, 400, 'linear');
			boxText.find('.txt').css({'opacity' : 0}).delay(100).animate({'opacity' : 1}, 400, 'linear');
			
		}});
		boxPhoto.css({'opacity' : 0}).delay(100).show().
		animate({'width' : '235px', 'height' : '235px', 'opacity' : 1}, {duration : 150, easing : 'easeOutSine'});
	});
}

facultyExplorer.getBoxInCode = function(id){
	var returnStr = 
	'<div class="overlayBoxWrapperInner">' +
	'<div class="overlayBox">' +
	'<a href="#">' + 
	' <div class="overlayBoxInner">' +
	'<div class="imgWrapper">' +
	'<div class="img">' +
	'<span class="a">' +
	'<img src="../images/blank.png" alt="">' +
	'</span>' +
	'<span class="b">' +
	'<img src="../images/upload/user/' + piList[id]['image_faculty_finder'] + '.jpg" alt="' + piList[id]['fullname_' + CURRENT_LANGUAGE] + ', ' + piList[id]['piTitle'] + '" width="235" height="235">' +
	'</span>' +
	'</div>' +
	'</div>' +
	'<div class="txtWrap">' +
	'<p class="name">' + piList[id]['fullname_' + CURRENT_LANGUAGE] + ', ' + piList[id]['piTitle'] + '</p>' +
	'<p class="lab">' + piList[id]['full_lab_name_' + CURRENT_LANGUAGE] + '<p>' +
	'<div class="txt">' +
	'<p>' + piList[id]['goal_objectives_' + CURRENT_LANGUAGE] + '</p>' +
	'</div>' +
	'</div>' +
	'</div>' +
	'</a>' +
	'</div>' +
	'</div>';
	return returnStr;
	
}
