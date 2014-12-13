function make_css(id){ 
    var csstag=$("#label_div").text();
    var idval=$("#"+id).val();
    var csstn=csstag+"{"+id+":"+idval+";}";
    var oldcss=window.top.$("#"+$('#all-styles').attr("title")).text();
    csstag=csstag.replace (/\./g, '\\.') ;
    csstag=csstag.replace (/\#/g, '\\#') ;
    var re= new RegExp (csstag+"{"+id+":[a-zA-Z0-9-_:#.()/ ]+;}","\g");
    oldcss=oldcss.replace(re,'');
    window.top.$("#"+$('#all-styles').attr("title")).text(oldcss+" "+csstn);
}
var setmytime;
function result_theme_panel_load(link){
    var returnx='';
  //  $('#allsavedactionssteps').text($('#allsavedactionssteps').text()+"\n"+link);
    jQuery('.too_image_preloader').show();
    $('#result_theme_panel').load(link,function(){
        returnx=$('#result_theme_panel').text();
        jQuery('.too_image_preloader').fadeOut('fast');
        
    clearTimeout(setmytime);
    setmytime=setTimeout("$('#result_theme_panel').text('...');",1500);    
    
    });
    return returnx;
}
 

//set up spindowns	
$.fn.spinDown = function() {
	
    return this.click(function() {
        if($(this).hasClass('state-active')){
 	$(".theme-group-header").removeClass('corner-top').removeClass('state-active').addClass('corner-all').find(".icon").removeClass('icon-triangle-1-s');
        $(".theme-group-content").hide();
           return false; 
        }
	$(".theme-group-header").removeClass('corner-top').removeClass('state-active').addClass('corner-all').find(".icon").removeClass('icon-triangle-1-s');
        $(".theme-group-content").hide();
 	
        var $this = $(this);
		
        $this.next().slideToggle(100);
        $this.find('.icon').toggleClass('icon-triangle-1-s').end().toggleClass('state-active');

        if($this.is('.corner-all')) {
            $this.removeClass('corner-all').addClass('corner-top');
        }
        else if($this.is('.corner-top')) {
            $this.removeClass('corner-top').addClass('corner-all');
        }
	
        return false;
		
    });

};

// validation for hex inputs
$.fn.validHex = function() {
	
    return this.each(function() {
		
        var value = $(this).val();
        value = value.replace(/[^#a-fA-F0-9]/g, ''); // non [#a-f0-9]
        value = value.toLowerCase();
        if(value.match(/#/g) && value.match(/#/g).length > 1) value = value.replace(/#/g, ''); // ##
        if(value.indexOf('#') == -1) value = '#'+value; // no #
        if(value.length > 7) value = value.substr(0,7); // too many chars
        $(this).val(value);
    });

};





// events within the 'roll your own' tab
function rollYourOwnBehaviors() {
	
    // hover class toggles in app panel
    $('li.state-default, div.state-default').hover(
        function(){
            $(this).addClass('state-hover');
        },
        function(){
            $(this).removeClass('state-hover');
        }
        );

    // hex inputs
    $('input.hex')
    .validHex()
    .keyup(function() {
        $(this).validHex();
    })
    .click(function(){
       // $(this).addClass('focus');
        $('#picker').remove();
        $('div.picker-on').removeClass('picker-on');
        $('div.texturePicker ul:visible').hide(0).parent().css('position', 'static');
        $(this).after('<div id="picker"></div>').parent().addClass('picker-on');
        $('#picker').farbtastic(this);
        return false;
    })
    .wrap('<div class="hasPicker"></div>');

    // focus and blur classes in form
    $('input, select')
    .focus(function() {
        $('input.focus, select.focus').removeClass('focus');
        $(this).addClass('focus');
    })
    .blur(function() {
        $(this).removeClass('focus');
    });

    // texture pickers from select menus
		
    $('.texturePickerli').click(function() {
        $(this).parents(".texturePicker").attr('title',$(this).text()).css('background', '#555555 url('+$(this).attr('alt')+') 50% 50% repeat');
        if($(this).attr('nocolor')=='nobackgroundandcolor'){
        $("#background-image").val('none');
        $("#background-color").val('transparent').css('background-color','transparent');
        make_css('background-color');
        }else{           
        $("#background-image").val('url('+$(this).attr('alt')+')');
        }
        make_css('background-image');

        //ul.fadeOut(100);
        $('.texturePicker ul:visible').hide().parent().css('position', 'static');
        return false;
    });
		
    // hide the menu and select el
    $('.texturePicker ul').hide();
		
    // show/hide of menus
    $('.texturePicker').click(function() {
			
        $(this).addClass('focus');
        $('#picker').remove();
        var showIt;
        if($('.texturePicker ul').is(':hidden')){
            showIt = true;
        }
        $('.texturePicker ul:visible').hide().parent().css('position', 'static');
        if(showIt == true){
            $('.texturePicker').css('position', 'relative');
            $('.texturePicker ul').show();
        }
			
        return false;
			
    });
		
   
    /*************************************************/
    // spindowns in TR panel

    $('div.theme-group .theme-group-header').addClass('corner-all').spinDown();

}




// dom ready event
$(function() {
    /*chick box */


    /*
      $("#themeConfig label").toggle(
        function ()
        {
            $("#"+$(this).attr("for")).attr('disabled', true);
            $("#"+$(this).attr("for")).css('background-color', '#333');
        },
        function ()
        {
            $("#"+$(this).attr("for")).removeAttr("disabled");
            $("#"+$(this).attr("for")).css('background-color', '#AAAAAA');
        });
*/


 
    

    $("#uploadfile_div_loadingx").hide();
    
    /*************************/

    /*tab change*/
    $('.cc_tab_sfhati').click(function(){
        window.top.css_div($("#all-styles").val());
    });

    /**********Cancel & save CSS*************/
    $('#cancel_css').click(function(){

        });

    $('#save_css,#save_cssadv').click(function(){
        var xstr= $("#all-styles").attr("title");
        var cstr = window.top.$("#"+$("#all-styles").attr("title")).text();
        $("#title_elemant_css").val(xstr);       
        $("#code_elemant_css").val(cstr);
        $("#form_elemant_css").submit();
        window.top.$('#inline_themeroller').fadeOut();
        window.top.$("#blockall").hide();
    });



    $("#restore_css").click(function() {
        var xstr= $("#all-styles").attr("title");
        window.top.$("#"+xstr).text(" ");
        $("#title_elemant_css").val(xstr);       
        $("#code_elemant_css").val("none");
        $("#form_elemant_css").submit();
        window.top.$('#inline_themeroller').fadeOut();
        window.top.$("#blockall").hide();
    });





    //events and behaviors for rollyourown
    rollYourOwnBehaviors();

    $('#rollerTabsNav li').click(function() {
        $('#rollerTabsNav li').removeClass('ui-tabs-selected ui-state-active');
        $('.ui-tabs-panel').hide();
        $(this).addClass('ui-tabs-selected ui-state-active');
        var x=$(this).attr('rel');
        $('#'+x).show();
    });
    $('#all-styles').change(function() {
        window.top.css_div($(this).val());
    });
                

    $(".theme-group-content").hide();


    $('.sfhati_css').click(function() {
        make_css($(this).attr("id"));
    });
    $('.sfhati_css').change(function() {
        make_css($(this).attr("id"));
    });
    $('.sfhati_counter').keydown(function(event) {
        var v=parseInt($(this).val());
        if(isNaN(v)) v=0;
        if(event.keyCode==38 || event.keyCode==39){
            v=v+1;
        }
        else if(event.keyCode==40 || event.keyCode==37){
            v=v-1;
        }
        $(this).val(v+'px');
        make_css($(this).attr("id"));
    });

    $('.hex').click(function() {
        $('.farbtastic').show();
    });

    $('#themeRoller').click(function(e) {
        if($(e.target).is('.farbtastic') || $(e.target).is('.farbtastic div')){
            return false;
        }
        $('.farbtastic').hide();
        $('div.picker-on').removeClass('picker-on');
    });
});









// $Id: farbtastic.js,v 1.2 2007/01/08 22:53:01 unconed Exp $
// Farbtastic 1.2

jQuery.fn.farbtastic = function (callback) {
    $.farbtastic(this, callback);
    return this;
};

jQuery.farbtastic = function (container, callback) {
    var container = $(container).get(0);
    return container.farbtastic || (container.farbtastic = new jQuery._farbtastic(container, callback));
};

jQuery._farbtastic = function (container, callback) {
    // Store farbtastic object
    var fb = this;

    // Insert markup
    $(container).html('<div class="farbtastic"><div class="color"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker"></div><div class="sl-marker marker"></div></div>');
    var e = $('.farbtastic', container);
    fb.wheel = $('.wheel', container).get(0);
    // Dimensions
    fb.radius = 84;
    fb.square = 100;
    fb.width = 194;



    /**
* Link to the given element(s) or callback.
*/
    fb.linkTo = function (callback) {
        // Unbind previous nodes
        if (typeof fb.callback == 'object') {
            $(fb.callback).unbind('keyup', fb.updateValue);
        }

        // Reset color
        fb.color = null;

        // Bind callback or elements
        if (typeof callback == 'function') {
            fb.callback = callback;
        }
        else if (typeof callback == 'object' || typeof callback == 'string') {
            fb.callback = $(callback);
            fb.callback.bind('keyup', fb.updateValue);
            if (fb.callback.get(0).value) {
                fb.setColor(fb.callback.get(0).value);
            }
        }
        return this;
    };
    fb.updateValue = function (event) {
        if (this.value && this.value != fb.color) {
            fb.setColor(this.value);
        }
    };

    /**
* Change color with HTML syntax #123456
*/
    fb.setColor = function (color) {
        var unpack = fb.unpack(color);
        if (fb.color != color && unpack) {
            fb.color = color;
            fb.rgb = unpack;
            fb.hsl = fb.RGBToHSL(fb.rgb);
            fb.updateDisplay();
        }
        return this;
    };

    /**
* Change color with HSL triplet [0..1, 0..1, 0..1]
*/
    fb.setHSL = function (hsl) {
        fb.hsl = hsl;
        fb.rgb = fb.HSLToRGB(hsl);
        fb.color = fb.pack(fb.rgb);
        fb.updateDisplay();
        return this;
    };

    /////////////////////////////////////////////////////

    /**
* Retrieve the coordinates of the given event relative to the center
* of the widget.
*/
    fb.widgetCoords = function (event) {
        var x, y;
        var el = event.target || event.srcElement;
        var reference = fb.wheel;

        if (typeof event.offsetX != 'undefined') {
            // Use offset coordinates and find common offsetParent
            var pos = {
                x: event.offsetX,
                y: event.offsetY
            };

            // Send the coordinates upwards through the offsetParent chain.
            var e = el;
            while (e) {
                e.mouseX = pos.x;
                e.mouseY = pos.y;
                pos.x += e.offsetLeft;
                pos.y += e.offsetTop;
                e = e.offsetParent;
            }

            // Look for the coordinates starting from the wheel widget.
            var e = reference;
            var offset = {
                x: 0,
                y: 0
            };
            while (e) {
                if (typeof e.mouseX != 'undefined') {
                    x = e.mouseX - offset.x;
                    y = e.mouseY - offset.y;
                    break;
                }
                offset.x += e.offsetLeft;
                offset.y += e.offsetTop;
                e = e.offsetParent;
            }

            // Reset stored coordinates
            e = el;
            while (e) {
                e.mouseX = undefined;
                e.mouseY = undefined;
                e = e.offsetParent;
            }
        }
        else {
            // Use absolute coordinates
            var pos = fb.absolutePosition(reference);
            x = (event.pageX || 0*(event.clientX + $('html').get(0).scrollLeft)) - pos.x;
            y = (event.pageY || 0*(event.clientY + $('html').get(0).scrollTop)) - pos.y;
        }
        // Subtract distance to middle
        return {
            x: x - fb.width / 2,
            y: y - fb.width / 2
        };
    };

    /**
* Mousedown handler
*/
    fb.mousedown = function (event) {
        // Capture mouse
        if (!document.dragging) {
            $(document).bind('mousemove', fb.mousemove).bind('mouseup', fb.mouseup);
            document.dragging = true;
        }

        // Check which area is being dragged
        var pos = fb.widgetCoords(event);
        fb.circleDrag = Math.max(Math.abs(pos.x), Math.abs(pos.y)) * 2 > fb.square;

        // Process
        fb.mousemove(event);
        return false;
    };

    /**
* Mousemove handler
*/
    fb.mousemove = function (event) {
        // Get coordinates relative to color picker center
        var pos = fb.widgetCoords(event);

        // Set new HSL parameters
        if (fb.circleDrag) {
            var hue = Math.atan2(pos.x, -pos.y) / 6.28;
            if (hue < 0) hue += 1;
            fb.setHSL([hue, fb.hsl[1], fb.hsl[2]]);
        }
        else {
            var sat = Math.max(0, Math.min(1, -(pos.x / fb.square) + .5));
            var lum = Math.max(0, Math.min(1, -(pos.y / fb.square) + .5));
            fb.setHSL([fb.hsl[0], sat, lum]);
        }
        return false;
    };

    /**
* Mouseup handler
*/
    fb.mouseup = function () {
        // Uncapture mouse
        $(document).unbind('mousemove', fb.mousemove);
        $(document).unbind('mouseup', fb.mouseup);
        document.dragging = false;
    };

    /**
* Update the markers and styles
*/
    fb.updateDisplay = function () {
        // Markers
        var angle = fb.hsl[0] * 6.28;
        $('.h-marker', e).css({
            left: Math.round(Math.sin(angle) * fb.radius + fb.width / 2) + 'px',
            top: Math.round(-Math.cos(angle) * fb.radius + fb.width / 2) + 'px'
        });

        $('.sl-marker', e).css({
            left: Math.round(fb.square * (.5 - fb.hsl[1]) + fb.width / 2) + 'px',
            top: Math.round(fb.square * (.5 - fb.hsl[2]) + fb.width / 2) + 'px'
        });

        // Saturation/Luminance gradient
        $('.color', e).css('backgroundColor', fb.pack(fb.HSLToRGB([fb.hsl[0], 1, 0.5])));

        // Linked elements or callback
        if (typeof fb.callback == 'object') {
            // Set background/foreground color
            $(fb.callback).css({
                backgroundColor: fb.color,
                color: fb.hsl[2] > 0.5 ? '#000' : '#fff'
            });
            var sfhati_classname;
            var sfhati_attr;
            sfhati_classname= $("#label_div").html();
            sfhati_attr= $(fb.callback).attr("id");
            //window.top.$(sfhati_classname).css(sfhati_attr,fb.color);
            $(sfhati_classname).val(sfhati_attr+":"+$(fb.callback).val());
           
            // Change linked value
            $(fb.callback).each(function() {
                if (this.value && this.value != fb.color) {
                    this.value = fb.color;
                }
            });
            make_css(sfhati_attr);
        }
        else if (typeof fb.callback == 'function') {
            fb.callback.call(fb, fb.color);
        }
    };

    /**
* Get absolute position of element
*/
    fb.absolutePosition = function (el) {
        var r = {
            x: el.offsetLeft,
            y: el.offsetTop
        };
        // Resolve relative to offsetParent
        if (el.offsetParent) {
            var tmp = fb.absolutePosition(el.offsetParent);
            r.x += tmp.x;
            r.y += tmp.y;
        }
        return r;
    };

    /* Various color utility functions */
    fb.pack = function (rgb) {
        var r = Math.round(rgb[0] * 255);
        var g = Math.round(rgb[1] * 255);
        var b = Math.round(rgb[2] * 255);
        return '#' + (r < 16 ? '0' : '') + r.toString(16) +
        (g < 16 ? '0' : '') + g.toString(16) +
        (b < 16 ? '0' : '') + b.toString(16);
    };

    fb.unpack = function (color) {
        if (color.length == 7) {
            return [parseInt('0x' + color.substring(1, 3)) / 255,
            parseInt('0x' + color.substring(3, 5)) / 255,
            parseInt('0x' + color.substring(5, 7)) / 255];
        }
        else if (color.length == 4) {
            return [parseInt('0x' + color.substring(1, 2)) / 15,
            parseInt('0x' + color.substring(2, 3)) / 15,
            parseInt('0x' + color.substring(3, 4)) / 15];
        }
    };

    fb.HSLToRGB = function (hsl) {
        var m1, m2, r, g, b;
        var h = hsl[0], s = hsl[1], l = hsl[2];
        m2 = (l <= 0.5) ? l * (s + 1) : l + s - l*s;
        m1 = l * 2 - m2;
        return [this.hueToRGB(m1, m2, h+0.33333),
        this.hueToRGB(m1, m2, h),
        this.hueToRGB(m1, m2, h-0.33333)];
    };

    fb.hueToRGB = function (m1, m2, h) {
        h = (h < 0) ? h + 1 : ((h > 1) ? h - 1 : h);
        if (h * 6 < 1) return m1 + (m2 - m1) * h * 6;
        if (h * 2 < 1) return m2;
        if (h * 3 < 2) return m1 + (m2 - m1) * (0.66666 - h) * 6;
        return m1;
    };

    fb.RGBToHSL = function (rgb) {
        var min, max, delta, h, s, l;
        var r = rgb[0], g = rgb[1], b = rgb[2];
        min = Math.min(r, Math.min(g, b));
        max = Math.max(r, Math.max(g, b));
        delta = max - min;
        l = (min + max) / 2;
        s = 0;
        if (l > 0 && l < 1) {
            s = delta / (l < 0.5 ? (2 * l) : (2 - 2 * l));
        }
        h = 0;
        if (delta > 0) {
            if (max == r && max != g) h += (g - b) / delta;
            if (max == g && max != b) h += (2 + (b - r) / delta);
            if (max == b && max != r) h += (4 + (r - g) / delta);
            h /= 6;
        }
        return [h, s, l];
    };

    // Install mousedown handler (the others are set on the document on-demand)
    $('*', e).mousedown(fb.mousedown);

    // Init color
    fb.setColor('#000000');

    // Set linked elements/callback
    if (callback) {
        fb.linkTo(callback);
    }
};


