var sfhati_css_map = ["color","font-family","font-size","font-style","font-variant","font-weight"
,"text-align","text-decoration","text-indent","letter-spacing","word-spacing","text-transform","vertical-align"
,"background-color","background-image","background-repeat","background-attachment","background-position"
,"border-top-color","border-top-style","border-top-width","border-left-color","border-left-style","border-left-width","border-right-color","border-right-style","border-right-width","border-bottom-color","border-bottom-style","border-bottom-width"
,"width","height","position","top","left","right","bottom","z-index","float","clear","margin-top","margin-left","margin-right","margin-bottom","padding-top","padding-left","padding-right","padding-bottom"
,"cursor","display","visibility","overflow"] ;

function css_div(clss){
    if($("#"+$("#sfhati_iframe").contents().find('#all-styles').attr("title")).length==0){
        $("#DIVgroupCSS").append("<style id='"+$("#sfhati_iframe").contents().find('#all-styles').attr("title")+"'></style>");
    }else{
        $("#sfhati_iframe").contents().find("#old_style_code").val($("#"+$("#sfhati_iframe").contents().find('#all-styles').attr("title")).text());
    }

    $(clss).animate({
        opacity: 0.50
    }, 250, function() {
        $(clss).animate({
            opacity: 1
        }, 250);
    });
    $("#sfhati_iframe").contents().find("#styletypepos").val( '' );;
    $("#sfhati_iframe").contents().find("#label_div").html(clss);
    $("#sfhati_iframe").contents().find('li[rel="gellary_tab"]').removeClass('ui-tabs-selected').removeClass('ui-state-active');
    $("#sfhati_iframe").contents().find('li[rel="template_tab"]').addClass('ui-tabs-selected').addClass('ui-state-active');
    $("#sfhati_iframe").contents().find('#gellary_tab').hide();
    $("#sfhati_iframe").contents().find('#template_tab').show();
    
    var css_ths='';
    var css_ths1='';
    $.each(sfhati_css_map, function() {
        // alert(this);
        var x=String(this);
        css_ths1 = $(clss).css(x)  ;
        css_ths = css_ths + x + ":" + css_ths1 + ";\n";
        if(x.indexOf("color") > -1 && css_ths1 != undefined){
            css_ths1=converttohex(css_ths1);
            $("#sfhati_iframe").contents().find("#"+x).css("background-color",css_ths1);
        }
        $("#sfhati_iframe").contents().find("#"+x).val(css_ths1);
        $("#sfhati_iframe").contents().find( "#"+x+'-p').css(x,css_ths1);
    });
    $("#sfhati_iframe").contents().find(".theme-group-content").hide();
    $("#sfhati_iframe").contents().find(".theme-group-header").removeClass('corner-top').removeClass('state-active').addClass('corner-all').find(".icon").removeClass('icon-triangle-1-s');
    $("#sfhati_iframe").contents().find(".farbtastic").hide();
    $("#inline_themeroller").css('top','192px').fadeIn();
    $("#blockall").show();
}

function converttohex(rgbString){
    if (rgbString.length < 1 ) rgbString="rgb(0,0,0)";

    var parts = rgbString.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    // parts now should be ["rgb(0, 70, 255", "0", "70", "255"]
    if(parts != null){
        delete (parts[0]);
        for (var i = 1; i <= 3; ++i) {
            parts[i] = parseInt(parts[i]).toString(16);
            if (parts[i].length == 1) parts[i] = '0' + parts[i];
        }

        return "#"+parts.join('');
    }else return "transparent";
}


$(function(){
 
    $('#inline_themeroller')
    .draggable({
        start: function(){
            $('<div id="div_cover" />').appendTo('#inline_themeroller').css({
                width: $(this).width(),
                height: $(this).height(),
                position: 'absolute',
                top: 0,
                left:0
            });
        },
        stop: function(){
            $('#div_cover').remove();
        },
        opacity: 0.6,
        cursor: 'move'
    }).find('a.closeTR').click(function(){
        $("#"+$("#sfhati_iframe").contents().find('#all-styles').attr("title")).text($("#sfhati_iframe").contents().find("#old_style_code").val())  ;
        $('#inline_themeroller').fadeOut();
        $("#blockall").hide();
    });

    $('#window_x')
    .draggable({
        opacity: 0.6,
        cursor: 'move',
        handle: '#rollerTabsNav'
    }).find('a.closeTR').click(function(){
        $('#window_x').fadeOut();
        $("#blockall").hide();
    });

    // main css live editor window
    $("#close").click(function(){
        $("div#panel").slideUp("slow", function() {
            $('#toppanel .login').slideUp("slow", function() {
                $('#toppanel #mini').slideDown('slow');
                $("#close").hide();
            });
        });
        
        
        $( ".tabbd" ).removeClass('colorcpanel');
        
    });
    $("#mini").click(function(){
        $('#toppanel #mini').slideUp('slow'); 
        $('#toppanel .login').slideDown("slow");
        $("#close").show();
    });

    // click in live style editor from panel
    $("#show_css_efitor .heapOption a").click(function() {
        var clss= $(this).attr('value');
        var option_html="";
        var lines = clss.split(";");
        $.each(lines, function(e) {
            option_html=option_html+"<option>" + lines[e] + "</option>";
        });
        $("#sfhati_iframe").contents().find('#all-styles').attr("title",$(this).attr("ms"));
        $("#sfhati_iframe").contents().find("#all-styles").html(option_html);
        $("#sfhati_iframe").contents().find("#all-styles").val(lines[0]);

        css_div(lines[0]);
    });
    
    // click in advancecssfont
    $("#advancecssfont").click(function() {
        $("#sfhati_iframe").contents().find('#all-styles').attr("title",'groupCSS_font_theme_save');
        $("#sfhati_iframe").contents().find("#all-styles").html("<option>" + $('#changefontstyle').val() + "</option>");
        $("#sfhati_iframe").contents().find("#all-styles").val($('#changefontstyle').val());
        css_div($('#changefontstyle').val());
    });    

});

$(window).bind("load", function() {
   $("#sfhati_iframe").attr('src',SITE_LINK +"?chng_tpl=../panel/design");
});