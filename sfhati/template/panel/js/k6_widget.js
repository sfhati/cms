var arr_classes_not_show = ["ui-resizable-handle", "ui-resizable-n", "ui-resizable-e", "ui-resizable-s", "ui-resizable-w", "ui-resizable-ne", "ui-resizable-se", "ui-resizable-sw", "ui-resizable-nw", "ui-icon", "ui-icon-gripsmall-diagonal-se", "ui-resizable-autohide", "rightclick", "tooltip-right", "tooltip-left"];
function boxwithoutbox(clss, v) {
    $("#" + clss).attr('boxin', 'widget_' + v);
    if (v == 1) {
        $("#" + clss + " .post_token_bottom,#" + clss + " .post_corner,#" + clss + " .post_sides,#" + clss + " .post_topbottom").show('fast');
    } else {
        $("#" + clss + " .post_token_bottom,#" + clss + " .post_corner,#" + clss + " .post_sides,#" + clss + " .post_topbottom").hide('fast');
    }
}
function msgplgn(t, m) {
    if (t)
        t = 'accept';
    else
        t = 'alert';
    $("#msgplgn").text(m).removeClass('accept').removeClass('alert').addClass(t).show('fast').delay(3000).hide('fast');

}
function makewidgetmove() {
    var disabled = $("#testdragin").attr("dis");
    if (disabled == '1') {
        $(".movement").draggable("disable").resizable("disable").css('opacity', '1');
        $("#testdragin").attr("dis", '0');
        $(".sortable").sortable("destroy").css("cursor", "");
        $('.entry_post').show('fast');
        $('.qtip-content').each(function() {
            if ($(this).html() == '[Drag and drop this box]') {
                $(this).html('[Right click to show menu option]');
            }
        });
    } else {
        $('.qtip-content').each(function() {
            if ($(this).html() == '[Right click to show menu option]') {
                $(this).html('[Drag and drop this box]');
            }
        });

        $(".movement").draggable("enable").resizable("enable");
        $(".movement").unbind('draggable').unbind('resizable').draggable({
            stop: function() {
                funcxres($(this).attr('id'), 0);
            }
        }).resizable({
            handles: 'n, e, s, w, ne, se, sw, nw',
            ghost: true,
            animate: true,
            autoHide: true,
            stop: function() {
                funcxres($(this).attr('id'), 1);
            }
        }).css('cursor', 'move');
        $("#testdragin").attr("dis", '1');

        /*********widgets**************/
        $('.entry_post').hide('fast');
        $(".sortable").sortable("destroy").sortable({
            revert: true,
            //   handle:".post_corner,.post_sides,.post_topbottom" ,        
            update: function() {
                var order = $(this).sortable("serialize");
                result_theme_panel_load(SITE_LINK +"?Order_plugin=" + $(this).attr('sidename') + "&" + order);
            }
        }).css("cursor", "move");

    }
}

function contextMenuOnStart(i) {
    var clss = '';

    if ($("#" + i).attr("ismove") == 'true') {
        $('li.icon-boxwidth,li.boxin,li.icon-side,li.withbox,li.withtitle').hide();
        $('li.icon-postion').show();
        clss = "#" + i;
    } else {
        $('li.icon-boxwidth,li.boxin,li.icon-side,li.withbox,li.withtitle').show();
        $('li.icon-postion').hide();
        clss = "#" + i;
    }


    // reset all option to not selected
    $('li.icon-check').removeClass('icon-check').addClass('icon-option');

    //  for selected templates
    var tmpltcode = $(clss).attr('tmpltcode');
    tmpltcode = tmpltcode.substring(0, tmpltcode.length - 4);
    $('li.selecttemplatex').hide(); //  
    $('li.selecttemplate_' + $(clss).attr('plg')).show().removeClass('icon-check').addClass('icon-option');
    $('li.selecttemplates_' + tmpltcode).show().addClass('icon-check').removeClass('icon-option');

    //if($(clss).attr('withbox')=='1') $('li.withbox').removeClass('icon-option').addClass('icon-check'); 
    if ($(clss).attr('withtitle') == '1')
        $('li.withtitle').removeClass('icon-option').addClass('icon-check');
    if ($(clss).attr('withajax') == '1')
        $('li.withajax').removeClass('icon-option').addClass('icon-check');
    if ($(clss).attr('withdynamic_static') == '1')
        $('li.withdynamic_static').removeClass('icon-option').addClass('icon-check');

    $('li.' + $(clss).attr('boxwidth')).removeClass('icon-option').addClass('icon-check');
    $('li.' + $(clss).attr('loadoption')).removeClass('icon-option').addClass('icon-check');

    $('li.' + $(clss).attr('showin')).removeClass('icon-option').addClass('icon-check');
    if ($(clss).hasClass('opacityoption') && $(clss).attr('showin') != "showin_i")
        $('li.showin_nsitp').removeClass('icon-option').addClass('icon-check');
    $('li.' + $(clss).attr('powerin')).removeClass('icon-option').addClass('icon-check');
    $('li.' + $(clss).attr('sidein')).removeClass('icon-option').addClass('icon-check');
//  $('li.GetAllTemplateFromPlugin').find('ul').load(SITE_LINK +'?GetAllTemplateFromPlugin='+$(clss).attr('plg')).css("overflowx","hidden");
}
function tooltipcode(e) {
    /***********************tooltip function***********************/
    var qtipstyle1 = $('#qtipstyle1').val();
    var qtipstyle2 = $('#qtipstyle2').val();
    $(e + '.tooltip-up').each(function()
    {

        $(this).qtip({
            show: {
                delay: 500
            },
            content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
            style: {
                tip: true, // Create speech bubble tip at the set tooltip corner above
                textAlign: 'center',
                background: qtipstyle1,
                color: qtipstyle2,
                border: {
                    width: 2,
                    radius: 2,
                    color: qtipstyle2
                }
            },
            position: {
                corner: {
                    tooltip: 'bottomMiddle', // Use the corner...
                    target: 'topMiddle' // ...and opposite corner
                }
            }// Give it a crea mstyle to make it stand out
        });
    });

    $(e + '.tooltip-down').each(function()
    {
        $(this).qtip({
            show: {
                delay: 500
            },
            content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
            style: {
                tip: true, // Create speech bubble tip at the set tooltip corner above
                textAlign: 'center',
                background: qtipstyle1,
                color: qtipstyle2,
                border: {
                    width: 2,
                    radius: 2,
                    color: qtipstyle2
                }
            },
            position: {
                corner: {
                    tooltip: 'topMiddle', // Use the corner...
                    target: 'bottomMiddle' // ...and opposite corner
                }
            }// Give it a crea mstyle to make it stand out
        });
    });
    $(e + '.tooltip-left').each(function()
    {
        $(this).qtip({
            show: {
                delay: 500
            },
            content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
            style: {
                tip: true, // Create speech bubble tip at the set tooltip corner above
                textAlign: 'center',
                background: qtipstyle1,
                color: qtipstyle2,
                border: {
                    width: 2,
                    radius: 2,
                    color: qtipstyle2
                }
            },
            position: {
                corner: {
                    tooltip: 'leftMiddle', // Use the corner...
                    target: 'rightMiddle' // ...and opposite corner
                }
            }// Give it a crea mstyle to make it stand out
        });
    });
    $(e + '.tooltip-right').each(function()
    {
        $(this).qtip({
            show: {
                delay: 500
            },
            content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
            style: {
                tip: true, // Create speech bubble tip at the set tooltip corner above
                textAlign: 'center',
                background: qtipstyle1,
                color: qtipstyle2,
                border: {
                    width: 2,
                    radius: 2,
                    color: qtipstyle2
                }
            },
            position: {
                corner: {
                    tooltip: 'rightMiddle', // Use the corner...
                    target: 'leftMiddle' // ...and opposite corner
                }
            }// Give it a crea mstyle to make it stand out
        });
    });

}

function scrolltoleft1(x){
         $('html, body').animate({
                scrollTop: ($('#'+x).offset().top)-150
            }, 1000);    
}

function createwidget(this_id, ctemplate, crunin, cpowers, newcaption, pluginname) {
    $.fancybox.close();
    var randomnumber = Math.floor(Math.random() * 999999);
    jQuery('.too_image_preloader').show();
    $('#result_theme_panel').load(SITE_LINK +"?add_widget=" + randomnumber + "&side=" + this_id + '&id=' + $('#id_thispage').val() + '&ctemplate=' + ctemplate + '&crunin=' + crunin + '&cpowers=' + cpowers + '&newcaption=' + newcaption + '&pluginname=' + pluginname, function() {
        $.get(SITE_LINK +'?getWidgetById=' + addedwidgetid, function(data) {
            var widgetnew = '';
            if (this_id == 'header' || this_id == 'footer') {
                $('#object_wedget_' + this_id + '_mod').append(data);
            } else {
                $('#' + this_id).append(data);
                widgetnew = ' .entry_post';
            }
            $('#widget_' + randomnumber).css('opacity', '0.2');
            $('html, body').animate({
                scrollTop: $('#widget_' + randomnumber).offset().top
            }, 1000);
            $('#widget_' + randomnumber + widgetnew).load(SITE_LINK +'?chng_tpl=plugin_preview&plgn=' + tmpltcodename + '&plgn_sid=' + randomnumber + '&' + tmpltcodename + '=' + randomnumber + '&id=' + $('#id_thispage').val(), function() {
                $('#widget_' + randomnumber).hide().css('opacity', '1').fadeIn('fast');
                makewidgetmove();
                makewidgetmove();
                jQuery('.too_image_preloader').fadeOut('fast');
            });
        });

        /*if forec unit control open*/
        if (forcecontrolunit == 1) {
            $.fancybox.open(SITE_LINK +"?chng_tpl=plugin_setting&iswidgetcode=" + randomnumber + "&file=widget&plgn=" + pluginname, {
                autoSize: false,
                width: '50%',
                height: '50%',
                type: 'ajax'
            });
        }

    });
    $("#otheroptionbutton").hide();
    $('.widget_draggable').attr('style', 'position: relative;');


    tooltipcode(' #widget_' + randomnumber + ' ');



}

function doaction(xthis) {
    // alert(xthis+' | '+ ); 
    // selector_menu_trigger

    var clss = "#" + $('#widget_menu').attr('for');

    // check if widget is box or floten div
    var selector;
    if ($(clss).attr("ismove") == 'true') {
        selector = $(clss);
    } else {
        selector = $(clss).find('.entry_post');
    }
    /*********************************/
    var action = $(xthis).attr('action');
    if (action == 'delete') {
        $("#dialog-confirm").dialog({
            resizable: false,
            height: 140,
            modal: true,
            buttons: {
                "[Delete]": function() {
                    result_theme_panel_load(SITE_LINK +"?delete_widget=" + $(clss).attr('id'));
                    $(clss).hide('fast');
                    $(clss).remove();
                    $(this).dialog("close");
                },
                "[Cancel]": function() {
                    $(this).dialog("close");
                }
            }
        });

        //refresh="";
    } else if (action == 'refresh') {
        selector.text('[Loading...]').load(getaddressURL + 'chng_tpl=plugin_preview&plgn=' + $(clss).attr('tmpltcode') + '&plgn_sid=' + $(clss).attr('inb') + '&' + $(clss).attr('tmpltcode') + '=' + $(clss).attr('inb'), function() {
            $('.CALENDAR').show().css('width', 'auto');
        });
    } else if (action == 'selecttemplates') {
        $(clss).attr('tmpltcode', $(xthis).attr('vlu') + '.inc');
        selector.text('[Loading...]').load(getaddressURL + 'chng_tpl=plugin_preview&plgn=' + $(clss).attr('tmpltcode') + '&plgn_sid=' + $(clss).attr('inb') + '&' + $(clss).attr('tmpltcode') + '=' + $(clss).attr('inb'), function() {
            result_theme_panel_load(SITE_LINK +"?changetemplate=" + $(clss).attr('inb') + '&templatenamed=' + $(xthis).attr('vlu'));
        });
    } else if (action == 'edit_css') {
        var option_html = "<option>" + clss + "</option>";
        var arr = new Array();
        var b = 0;
        $(clss).find('*').each(function(e) {
            b++;
            if (jQuery.inArray(this.tagName, arr) == -1) {
                arr[b] = this.tagName;
                if (this.tagName != 'STYLE' && this.tagName != 'SCRIPT')
                    option_html = option_html + "<option>" + clss + " " + this.tagName + "</option>";
            }
            var lines = this.className.split(" ");
            $.each(lines, function(e) {
                b++;
                if (jQuery.inArray(lines[e], arr) == -1 && jQuery.inArray(lines[e], arr_classes_not_show) == -1) {
                    arr[b] = lines[e];
                    if (lines[e])
                        option_html = option_html + "<option>" + clss + " ." + lines[e] + "</option>";
                }
            });
            if (jQuery.inArray($(this).attr('id'), arr) == -1) {
                arr[b] = $(this).attr('id');
                if ($(this).attr('id'))
                    option_html = option_html + "<option>" + clss + " #" + $(this).attr('id') + "</option>";
            }
        });
        $("#sfhati_iframe").contents().find("#all-styles").attr("title", "groupCSS_" + clss.replace(/[^a-zA-Z 0-9]+/g, ''));
        $("#sfhati_iframe").contents().find("#all-styles").html(option_html);
        $("#sfhati_iframe").contents().find("#all-styles").val(clss);

        css_div(clss);

    } else if (action == 'edit') {
        $.fancybox.open(SITE_LINK +"?chng_tpl=plugin_setting&iswidgetcode=" + $(clss).attr('inb') + "&file=widget&plgn=" + $(clss).attr('plg'), {
            autoSize: false,
            width: '50%',
            height: '50%',
            type: 'ajax'
        });

    } else if (action == 'withbox') {
        var xmoin;

        if ($(clss).attr('withbox') == 1) {
            xmoin = '0';
        } else {
            xmoin = '1';
        }
        $(clss).attr('withbox', xmoin);
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number3&fildv[]=' + xmoin);
        $("#" + $(clss).attr('id') + " .post_token_bottom,#" + $(clss).attr('id') + " .post_corner,#" + $(clss).attr('id') + " .post_sides,#" + $(clss).attr('id') + " .post_topbottom").toggle('fast');
        $("#" + $(clss).attr('id') + ' > div:first').toggleClass('container_posts_pieces');
        $(clss).toggleClass('widthout_boxesfixwidth_' + $(clss).attr('boxwidth'));

    } else if (action == 'withtitle') {
        var xmoin0;
        if ($(clss).attr('withtitle') == 1)
            xmoin0 = '0';
        else
            xmoin0 = '1';
        $(clss).attr('withtitle', xmoin0);
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=bool1&fildv[]=' + xmoin0);
        $("#" + $(clss).attr('id') + " .head_post").toggle('fast');

    } else if (action == 'withdynamic_static') {
        var xmoin0;
        if ($(clss).attr('withdynamic_static') == 1)
            xmoin0 = '0';
        else
            xmoin0 = '1';
        $(clss).attr('withdynamic_static', xmoin0);
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number8&fildv[]=' + xmoin0);
    } else if (action == 'withajax') {
        var xmoin0;
        if ($(clss).attr('withajax') == 1)
            xmoin0 = '0';
        else
            xmoin0 = '1';
        $(clss).attr('withajax', xmoin0);
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number7&fildv[]=' + xmoin0);
    } else if (action == 'boxwidth') {
        $(clss).attr('boxwidth', action + '_' + $(xthis).attr('vlu'));
        if($(xthis).attr('vlu')=='0')
            $(clss).find('.post_token_bottom').hide();
        else
            $(clss).find('.post_token_bottom').show();
        $(clss).removeClass('width_boxes_0').removeClass('width_boxes_1').removeClass('width_boxes_2').removeClass('width_boxes_3').removeClass('width_boxes_4').removeClass('width_boxes_34').removeClass('width_boxes_23').addClass('width_boxes_' + $(xthis).attr('vlu'));
        $(clss).removeClass('widthout_boxesfixwidth_boxwidth_1').removeClass('widthout_boxesfixwidth_boxwidth_2').removeClass('widthout_boxesfixwidth_boxwidth_3').removeClass('widthout_boxesfixwidth_boxwidth_4').removeClass('widthout_boxesfixwidth_boxwidth_34').removeClass('widthout_boxesfixwidth_boxwidth_23').addClass('widthout_boxesfixwidth_boxwidth_' + $(xthis).attr('vlu'));
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number5&fildv[]=' + $(xthis).attr('vlu'));
    } else if (action == 'loadoption') {
        $(clss).attr('loadoption', action + '_' + $(xthis).attr('vlu'));
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number9&fildv[]=' + $(xthis).attr('vlu'));
    } else if (action == 'side') {
        $('.rightclick').contextMenu(false);
        $(clss).attr('sidein', action + '_' + $(xthis).attr('vlu'));
        $(clss).appendTo('div[sidename="' + $(xthis).attr('vlu') + '"]');
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number1&fildv[]=' + $(xthis).attr('vlu'));
        $('.rightclick').contextMenu(true);
    } else if (action == 'openoption') {
        $.fancybox.open(SITE_LINK +"?showin=2&chng_tpl=plugin_whereis&iswidgetcode=" + $(clss).attr('inb') + "&file=widget&plgn=" + $(clss).attr('plg'), {
            autoSize: false,
            width: '50%',
            height: '50%',
            type: 'ajax'
        });
    } else if (action == 'showin') {
        $(clss).attr('showin', action + '_' + $(xthis).attr('vlu'));
        if ($(clss).attr('showin') == 'showin_t')
            $(clss).attr('square', square_thispage);
        else
            $(clss).attr('square', '');
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=string4&fildv[]=' + $(xthis).attr('vlu') + '_' + $('#id_thispage').val());
        $(clss).removeClass('opacityoption').attr("canvis", "no");

    } else if (action == 'showinwidget_nsitp') {
        if ($(clss).hasClass('opacityoption')) {
            result_theme_panel_load(SITE_LINK +'?removethisi=1&update_widget=' + $(clss).attr('id') + '&fildk[]=string8&fildv[]=-' + $('#id_thispage').val() + '-');
            $(clss).attr("canvis", "no").removeClass('opacityoption').show('fast');
        } else {
            result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=string8&fildv[]=-' + $('#id_thispage').val() + '-');
            if ($('#showhideotherwidget').hasClass('opacityoption')) {
                $(clss).attr("canvis", "yes").addClass('opacityoption').hide('fast');
            } else {
                $(clss).attr("canvis", "yes").addClass('opacityoption');
            }
        }

    } else if (action == 'bring_to_front' || action == 'send_to_back' || action == 'bring_forward' || action == 'send_backward') {
        $.post(SITE_LINK +"index.php", {
            z_indexSort: action,
            id_widget: $(clss).attr("inb")
        }, function(data) {
            eval(data);
        }).complete(function() {
            $("#result_theme_panel").text('[done...]');

        });

    } else if (action == 'perm') {
        $(clss).attr('powerin', 'powerin_' + $(xthis).attr('vlu'));
        result_theme_panel_load(SITE_LINK +'?update_widget=' + $(clss).attr('id') + '&fildk[]=number4&fildv[]=' + $(xthis).attr('vlu'));
    } else if (action == 'codeedit') {
        window.open(SITE_LINK +'?EFT=' + $(clss).attr('tmpltcode'), '_blank');
    }

    $("#context-menu-layer,.context-menu-list").hide();
}
$(function() {

    tooltipcode('');

    /**********************Right Click********************************/
    $.contextMenu({
        selector: '.rightclick',
        items: $.contextMenu.fromMenu($('#widget_menu')),
        events: {
            show: function(opt) {
                selector_menu_trigger = $(opt.$trigger).attr('id');
                $('#widget_menu').attr('for', selector_menu_trigger);
                contextMenuOnStart(selector_menu_trigger);


            }
        }
    });




    /*
     $( "#Prewiew_RecycleBin" ).droppable({
     accept: ".movement",
     activeClass: "Prewiew_RecycleBin-active",
     hoverClass: "Prewiew_RecycleBin-hover",
     drop: function( event, ui ) {
     result_theme_panel_load(SITE_LINK +"?delete_widget="+ui.draggable.attr('id'));
     ui.draggable.hide('fast');
     ui.draggable.remove();
     
     }
     });
     $( ".widget_draggable" ).draggable({
     start: function() {
     $("#panel").css("overflow-x","visible");
     $("#panel").css("overflow-y","visible");
     $(".slides_container").css("overflow-x","visible");
     $(".slides_container").css("overflow-y","visible");
     },
     stop: function() {
     $("#panel").css("overflow-x","hidden");
     $("#panel").css("overflow-y","hidden");
     $(".slides_container").css("overflow-x","hidden");
     $(".slides_container").css("overflow-y","hidden");
     $('.selectedd').remove();
     },
     revert: true
     })*/

    $(".widget_draggable").click(function() {
        if ($(this).hasClass('bordercpanel')) {
            $("#otheroptionbutton").hide();
            $('.widget_draggable').removeClass('bordercpanel');
            return false;
        }
        $("#otheroptionbutton").attr('rel', $(this).attr("rel"));
        createUploader_template('createUploader_template');
        $("#otheroptionbutton").css("display", "inline-block");
        $('.widget_draggable').removeClass('bordercpanel');
        $(this).addClass('bordercpanel');
    });

    $(".applyotheroptionbutton").click(function() {
        var plugin_name = $("#otheroptionbutton").attr('rel');
        var this_id = $(this).attr("fork");
        if (this_id == 'addtplt') {

        } else if (this_id == 'settingtplt') {
            $.fancybox.open(SITE_LINK +"?chng_tpl=plugin_setting&showtempltoption=" + plugin_name, {
                autoSize: true,
                type: 'ajax'
            });

        } else {
            $.fancybox.open(SITE_LINK +"?chng_tpl=plugin_setting&dotempltoption=" + plugin_name + '&side=' + this_id, {
                autoSize: true,
                 type: 'ajax'
            });
        }
    });


    $('.optionsforwidget').click(function() {
        $('#Sfhati_panel').hide('fast');
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();

        $(this).toggleClass('opacityoption');
        if ($(this).attr('fork') == 'enabelddisapyldmoveresize') {
            makewidgetmove();
        } else if ($(this).attr('fork') == 'showhideotherwidget') {
            $('.boxes[canvis="yes"],.fixdrag[canvis="yes"]').toggle().toggleClass('opacityoption');
        }
    });

    /*widget dragable make
     var selected_for_widget = ["#header","#footer",".sortable"];
     $("#header,#footer,.sortable").droppable({
     accept: ".widget_draggable",
     activeClass: function(){
     $('.selectedd').css("background-color","red");
     if ($('.selectedd').length == 0) {
     $.each(selected_for_widget, function(index, value) {
     $(value).prepend("<div class='selectedd' style='width:"+$(value).css("width")+";height:"+$(value).css("height")+"'></div>")
     });
     }            
     },
     hoverClass: function(){
     $('.selectedd').css("background-color","red");
     $(this).find('.selectedd').css("background-color","green");
     },
     drop: function( event, ui ) {
     var plugin_name=$(ui.draggable).attr("rel");
     var this_id=$(this).attr("id");
     var randomnumber=Math.floor(Math.random()*999999);
     
     result_theme_panel_load(SITE_LINK +"?add_widget="+randomnumber+"&plgn="+plugin_name+"&side="+this_id);
     //window.open(SITE_LINK +"?add_widget="+randomnumber+"&plgn="+plugin_name+"&side="+this_id,'_self');
     }
     });*/

});