/** jquery.lavalamp.js */
(function($){
	$.fn.menuslide = function(o){
		o = $.extend({fx: "linear", speed: 500, click: function(){}}, o || {});
		return this.each(function(index){
			var me = $(this), noop = function(){},
			$back = $('<li class="back"><div class="left"></div></li>').appendTo(me),
			$li = $(">li", this), curr = $("li.current", this)[0] || $($li[0]).addClass("current")[0];
			$li.not(".back").hover(function(){
				move(this);
			}, noop);
			$(this).hover(noop, function(){
					move(curr);
			});
			$li.click(function(e){
					setCurr(this);
					return o.click.apply(this, [e, this]);
			});
			setCurr(curr);
			function setCurr(el){
					$back.css({"left": el.offsetLeft+"px", "width": el.offsetWidth+"px"});
					curr = el;
			};
			function move(el){
				$back.each(function(){
					$.dequeue(this, "fx");
				}).animate({
					width: el.offsetWidth,
					left: el.offsetLeft
					}, o.speed, o.fx);
				};
				if (index == 0){
				$(window).resize(function(){
					$back.css({
						width: curr.offsetWidth,
						left: curr.offsetLeft
					});
				});
			} 
		});
	};
})(jQuery);

jQuery(function(){
	jQuery('div.container_menu > div > ul:eq(0) > li', this).each(function(i){
		$width = jQuery('div.container_menu > div > ul:eq(0) > li:eq('+i+')').width();
		$height = jQuery('div.container_menu > div > ul:eq(0) > li:eq('+i+')').height();
		$f_width = $width/2;
		$f_height = $height/2;
		jQuery('.container_menu ul:first-child > li:eq('+i+') > ul').css({'left': -62+$f_width, 'top': $f_height+20});
	});                 
});

jQuery(function ($sub) {
	$sub("div.container_menu li").parents('div.container_menu ul li').addClass('with_submenu');
	$sub('div.container_menu ul.children').add('div.container_menu .sub-menu').each(function () { 	
		$sub(this).parent().eq(0).hover(function () {
			$sub('ul.children:eq(0)', this).add('.sub-menu:eq(0)', this).stop(true, true).fadeIn('fast');
			$sub('ul.children:eq(0) li:first', this).add('.sub-menu:eq(0) li:first', this).addClass('li_first');
			}, function () {
			$sub('ul.children:eq(0)', this).add('.sub-menu:eq(0)', this).stop(true, true).delay(150).fadeOut('fast');
		});
	});
});
jQuery(function($elem){
	$elem('.container_meu ul > li.current-menu-ancestor').addClass("current");
	var url = location.href;
	$elem("div.container_menu li a").each(function(i){
		var bus = this.href;
		if(url==bus){
			$elem("div.container_menu a:eq("+i+")").addClass("current");
			$elem("div.container_menu li:eq("+i+")").addClass("current");
		}
	});
	$elem(".current").parents('div.container_menu ul li').addClass('current_active').add().addClass('current');
});
