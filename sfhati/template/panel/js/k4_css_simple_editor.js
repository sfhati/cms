/*
 *sample editor content css
 *drag and resite widget 
 **/

/*        funcxres_CSS(el,"z-index")
        $("#CSS_theme_save").val($("#"+widgetNID).text());
        $("#CSS_theme_val").val(widgetNID);
        $("#save_font_form").submit();
*/

function funcxres(x,e){    
    if(e)
        setTimeout('funcxres_CSS("'+x+'","width");funcxres_CSS("'+x+'","height");$("#CSS_theme_save").val($("#groupCSS_'+x.replace(/[^a-zA-Z 0-9]+/g,'')+'").text());$("#CSS_theme_val").val("groupCSS_'+x.replace(/[^a-zA-Z 0-9]+/g,'')+'");$("#save_font_form").submit();$("#'+x+'").attr("style","cursor:move");', 1000);
    else
        setTimeout('funcxres_CSS("'+x+'","top");funcxres_CSS("'+x+'","left");$("#CSS_theme_save").val($("#groupCSS_'+x.replace(/[^a-zA-Z 0-9]+/g,'')+'").text());$("#CSS_theme_val").val("groupCSS_'+x.replace(/[^a-zA-Z 0-9]+/g,'')+'");$("#save_font_form").submit();$("#'+x+'").attr("style","cursor:move");', 1000);
}
function saveCSSinDatabase(x){
        jQuery('.too_image_preloader').show();
        var xstr=$("#groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,'')).text();
        $("#CSS_theme_save").val(xstr);
        $("#CSS_theme_val").val("groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,''));
        $("#save_font_form").submit();
}
function funcxres_CSS(x,proptiz,hashdot){    
    if(hashdot!='.') hashdot='#';
    if($("#groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,'')).length==0){
        $("#DIVgroupCSS").append("<style id='"+"groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,'')+"'></style>");
    }
    var csstag=hashdot+x;
    var oldcss=$("#groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,'')).text();
    var csstn=csstag+"{"+proptiz+":"+$(csstag).css(proptiz)+";}";
    csstag=csstag.replace (/\./g, '\\.') ;
    csstag=csstag.replace (/\#/g, '\\#') ;
    var re= new RegExp (csstag+"{"+proptiz+":[a-zA-Z0-9-_:#.() ]+;}","\g");
    oldcss=oldcss.replace(re,'');
    $("#groupCSS_"+x.replace(/[^a-zA-Z 0-9]+/g,'')).text(oldcss+" "+csstn);
}

  function changefontstyle(styl) {
        var font_weight =  $(styl).css("font-weight");
        var text_decoration = $(styl).css("text-decoration");
        var font_style = $(styl).css("font-style");
        var text_align = $(styl).css("text-align");
        var background_color = converttohex($(styl).css("color"));
        var fontsize = $(styl).css("font-size");
        var fontfamily = $(styl).css("font-family");
        if($("#groupCSS_font_theme_save").length==0){
            $("#DIVgroupCSS").append("<style id='groupCSS_font_theme_save'></style>");
        }
        $(".css_s_t").hide();$(".css_s_t1").hide();$(".css_s_t2").hide();
        if(font_weight==400) $(".css_s_t[alt='bold']").show(); else $(".css_s_t[alt='normal']").show();
        if(text_decoration=='underline') $(".css_s_t1[alt='none']").show(); else $(".css_s_t1[alt='underline']").show();
        if(font_style=='normal') $(".css_s_t2[alt='italic']").show(); else $(".css_s_t2[alt='normal']").show();
        $("#text-alignx1").html('<img src="'+$("#text-alignx1").attr("x1")+'">');
        $("#text-alignx2").html('<img src="'+$("#text-alignx2").attr("x1")+'">');
        $("#text-alignx3").html('<img src="'+$("#text-alignx3").attr("x1")+'">');                 
        $("#text-alignx4").html('<img src="'+$("#text-alignx4").attr("x1")+'">');
        $(".css_s_t3[alt='"+text_align+"']").html('<img src="'+$(".css_s_t3[alt='"+text_align+"']").attr("x2")+'">');
        $("#colorpickers").val(background_color);
        $("#colorpickers").change();
        $("#css_s_fontfamily").val(fontfamily);
        $("#css_s_fontsize").val(fontsize);
    }

function Filter_CSS(groupCSS,target,proptiz,valu){   
    
    valu = typeof valu !== 'undefined' ? valu : $(target).css(proptiz);
    groupCSS='groupCSS_' + groupCSS.replace(/[^a-zA-Z_0-9]+/g,'');
    if($("#"+groupCSS).length==0){
        $("#DIVgroupCSS").append("<style id='"+groupCSS+"'></style>");
    }    
    //alert(groupCSS+','+target+','+proptiz+','+valu);
    var oldcss=$("#"+groupCSS).text();
    var csstn=target+"{"+proptiz+":"+valu+";}";
    target=target.replace (/\./g, '\\.') ;
    target=target.replace (/\#/g, '\\#') ;
    var re= new RegExp (target+"{"+proptiz+":[a-zA-Z0-9-_:,%#.()/ ]+;}","\g");
    oldcss=oldcss.replace(re,'');
    $("#"+groupCSS).text(oldcss+" "+csstn);
}
$(function(){
    /*Font simple editor CSS********************************************************************/

    $(".css_s_t").click(function() {
        $('.css_s_t').show();
        $(this).hide();
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("ext")+";}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}",""));
        $("#groupCSS_font_theme_save").append($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}");
    });
    $(".css_s_t1").click(function() {
        $('.css_s_t1').show();
        $(this).hide();
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("ext")+";}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}",""));
        $("#groupCSS_font_theme_save").append($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}");
    });
    $(".css_s_t2").click(function() {
        $('.css_s_t2').show();
        $(this).hide();
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("ext")+";}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}",""));
        $("#groupCSS_font_theme_save").append($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}");
    });
    $(".css_s_t3").click(function() {
        $("#text-alignx1").html('<img src="'+$("#text-alignx1").attr("x1")+'">');
        $("#text-alignx2").html('<img src="'+$("#text-alignx2").attr("x1")+'">');
        $("#text-alignx3").html('<img src="'+$("#text-alignx3").attr("x1")+'">');
        $("#text-alignx4").html('<img src="'+$("#text-alignx4").attr("x1")+'">');
        $(this).html('<img src="'+$(this).attr("x2")+'">');
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":center;}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":right;}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":left;}",""));
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":justify;}",""));
        $("#groupCSS_font_theme_save").append($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("alt")+";}");
    });
    $("#colorpickers,#css_s_fontsize,#css_s_fontfamily").change(function(){
        //use this method to add new colors to pallete
        //$.fn.colorPicker.addColors(['000', '000', 'fff', 'fff']);
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).attr("ext")+";}",""));
        $(this).attr("ext",$(this).val());
        xstr=$("#groupCSS_font_theme_save").text();
        $("#groupCSS_font_theme_save").text(xstr.replace($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).val()+";}",""));
        $("#groupCSS_font_theme_save").append($("#changefontstyle").val()+"{"+$(this).attr("title")+":"+$(this).val()+";}");
    });

    $("#save_css_efitor").click(function() {
        jQuery('.too_image_preloader').show();
        var xstr=$("#groupCSS_font_theme_save").text();
        $("#CSS_theme_save").val(xstr);
        $("#CSS_theme_val").val("groupCSS_font_theme_save");
        $("#save_font_form").submit();
        result_theme_panel_load(SITE_LINK +'?savejqueryui='+$('#jquery_ui').attr('href'));
    });
    $("#restore_css_efitor1").click(function() {
        if(confirm('[These items will be permanently deleted and cannot be recovered]')){
        $("#groupCSS_font_theme_save").text("");alert('ggg');
        }
    });


});