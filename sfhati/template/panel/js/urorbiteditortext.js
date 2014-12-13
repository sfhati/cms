/* Sfhati Editor Text - Micro Inline WYSIWYG
 * Copyright 2012 Bassam al-Essawi
 * Sfhati Editor Text is distributed under the terms of the MIT license
 * For more information visit http://editor-text.sfhati.com/
 * Do not remove this copyright message
 */
function onloadloop(xet) {
    // Clear evints
    createUploader_sfhatieditor('createUploader_sfhatieditor');
    createUploader_sfhatieditor('createUploader_sfhatieditormp3');
    createUploader_sfhatieditor('createUploader_sfhatieditorswf');
    createUploader_sfhatieditor('createUploader_sfhatieditorflv');
    if (xet == 'image' || xet == 'x') {
        $('#insertimage_sfhatiPanel').simpleslide({
            divslide: "sfhatisliderdiv",
            number_slide: 6,
            elementslide: "img"
        });
    }
    if (xet == 'mp3' || xet == 'x') {
        $('#insertmp3_sfhatiPanel').simpleslide({
            divslide: "sfhatisliderdiv",
            number_slide: 6,
            elementslide: "img"
        });
    }
    if (xet == 'swf' || xet == 'x') {
        $('#insertswf_sfhatiPanel').simpleslide({
            divslide: "sfhatisliderdiv",
            number_slide: 6,
            elementslide: "img"
        });
    }
    if (xet == 'flv' || xet == 'x') {
        $('#insertflv_sfhatiPanel').simpleslide({
            divslide: "sfhatisliderdiv",
            number_slide: 6,
            elementslide: "img"
        });
    }



}

function createUploader_sfhatieditor(idx) {
    var uploader = new qq.FileUploader({
        element: document.getElementById(idx),
        action: SITE_LINK +'?sfhatieditor=2',
        allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'swf', 'flv', 'mp3'],
        sizeLimit: 300000000,
        debug: false,
        onProgress: function(id, fileName, loaded, total) {
            jQuery('.too_image_preloader').show();
            var x = parseInt((loaded / total) * 100) + " % ";
            $("#result_theme_panel").text("Uploading " + x);
        },
        onComplete: function(id, fileName, responseJSON) {
            jQuery('.too_image_preloader').fadeOut('fast');
            $('#insert' + responseJSON['xet'] + '_sfhatiPanel').text('[Loading...]');
            $('#insert' + responseJSON['xet'] + '_sfhatiPanel').load(SITE_LINK +'?getimagesfromfolderer=1&ext=' + responseJSON['xet'], function() {
                onloadloop(responseJSON['xet']);




                var values = responseJSON['filename'];
                if (responseJSON['xet'] == 'image') {
                    document.execCommand('insertimage', false, values);
                } else {
                    document.execCommand('inserthtml', false, values);
                }

                $('.sfhatiPanel').hide();
                $('#mainsfhatiPanel').hide();

            });

        }

    });
    $("#" + idx).find(".qq-upload-button").append('<span class="icon icon_upload"></span>');
    $("#" + idx + ' input').css('position', 'static');
    $("#" + idx + ' input').css('width', '70px');
    $("#" + idx + ' input').css('height', '70px');
}

function addsavecontrolbar(e) {
    if (e == 1) {
        $("#addsavecontrolbar").attr('locked', '1');
        $("#saveeditorsfhati").show();
        $("#cancelsaveeditorsfhati").show();

    } else {
        $("#addsavecontrolbar").attr('locked', '0');
        $("#columcontrolbar").attr('locked', '0');
        $("#saveeditorsfhati").hide();
        $("#cancelsaveeditorsfhati").hide();
        $("#Sfhati_panel").hide();
        $('#mainsfhatiPanel').hide();
        $('.sfhatiPanel').hide();
        $('.column').attr("contentEditable", "false");
        $('#SfhatiELEMENTSelected').removeAttr('id');
    }
}
/**************on load page do this******************************************************************/
$(function() {
    var SfhatiSelectedE = '';
    var SfhatiSelectedtopE = 0;
    var SfhatiSelectedText = '';

    /**edit title in line**/
    $('.post_title,.SfhatiTypoTxt').focusin(function() {
        $(this).attr('oldtitle', $(this).text());
    }).focusout(function() {
        if ($(this).attr('oldtitle') != $(this).text()) {
            if ($(this).attr('typotxt')) {
                result_theme_panel_load(SITE_LINK +'?thisidtag=' + $(this).attr('id') + '&typotxt=' + $(this).attr('typotxt') + '&id=' + $('#id_thispage').val() + '&renderer_jax=' + $(this).attr('field') + '&value_jax=' + Base64.encode($(this).text()));
            } else {
                result_theme_panel_load(SITE_LINK +'?update_widget=' + $(this).attr('widt') + '&id=' + $('#id_thispage').val() + '&fildk[]=string3&fildv[]=' + Base64.encode($(this).text()));
            }
            $(this).html($(this).text());
        }
    }).attr('contentEditable', 'true');
 
    /**********add control bar to boxes********/
    $(".boxes").live('mouseenter', function() {
        if($(this).find('.sfhati_paragraph_editor').length){
        if ($("#addsavecontrolbar").attr('locked') == '1')
            return false;
        $(".addnewcolum").prependTo($(this)).show();
        $(this).find('.entry_post').sortable({
            handle: ".icon-move",
        change: function(){ 
            addsavecontrolbar(1);  
        }
        });
        $(this).find('.entry_post').sortable("refresh");
    }
    }).live('mouseleave', function() {
        if ($("#addsavecontrolbar").attr('locked') == '1')
            return false;
        $(".addnewcolum").prependTo('body').hide();
    });

    /**********add colum***********/
    $(".addnewcolum .icon-plus-sign").live('click', function() {
        $(this).parent().parent().parent().parent().parent().find('.entry_post').find("br:last").remove();
        $(this).parent().parent().parent().parent().parent().find('.entry_post').append('<div class="col_12 column">[lorem lipsum]</div><br clear="all"/>');
        addsavecontrolbar(1);
    });

    /**********remove colum************/
    $(".resizecolum .icon-remove").live('click', function() {
        var ths = $(this).closest('.column');
        setTimeout(function() {
            $('.resizecolum').prependTo('body').hide();
            ths.remove();
        }, 300);
        addsavecontrolbar(1);
    });

    /******* add control bar to colum*******/
    $(".boxes").find(".sfhati_paragraph_editor").live('mouseenter', function() {
        if ($("#columcontrolbar").attr('locked') == '1')
            return false;
        if ($("#addsavecontrolbar").attr('locked') == '1' && !($(this).parent().parent().parent().parent().find('.addnewcolum').length))
            return false;
        $('.resizecolum').prependTo($(this)).show();
    }).live('mouseleave', function() {
        if ($("#columcontrolbar").attr('locked') == '1')
            return false;
        $('.resizecolum').prependTo('body').hide();
    });


    /*************resize colum*****************/
    $(".resizecolum .icon-resize-full").live('click', function() {
        var ths = $(this).closest('.column');
        if (ths.hasClass('col_12')) {
            return false;
        }
        addsavecontrolbar(1);

        if (ths.hasClass('col_1')) {
            ths.removeClass('col_1').addClass('col_2');
            return false;
        }
        if (ths.hasClass('col_2')) {
            ths.removeClass('col_2').addClass('col_3');
            return false;
        }
        if (ths.hasClass('col_3')) {
            ths.removeClass('col_3').addClass('col_4');
            return false;
        }
        if (ths.hasClass('col_4')) {
            ths.removeClass('col_4').addClass('col_5');
            return false;
        }
        if (ths.hasClass('col_5')) {
            ths.removeClass('col_5').addClass('col_6');
            return false;
        }
        if (ths.hasClass('col_6')) {
            ths.removeClass('col_6').addClass('col_7');
            return false;
        }
        if (ths.hasClass('col_7')) {
            ths.removeClass('col_7').addClass('col_8');
            return false;
        }
        if (ths.hasClass('col_8')) {
            ths.removeClass('col_8').addClass('col_9');
            return false;
        }
        if (ths.hasClass('col_9')) {
            ths.removeClass('col_9').addClass('col_10');
            return false;
        }
        if (ths.hasClass('col_10')) {
            ths.removeClass('col_10').addClass('col_11');
            return false;
        }
        if (ths.hasClass('col_11')) {
            ths.removeClass('col_11').addClass('col_12');
            return false;
        }

    });

    $(".resizecolum .icon-resize-small").live('click', function() {
        var ths = $(this).closest('.column');
        if (ths.hasClass('col_1')) {
            return false;
        }
        addsavecontrolbar(1);
        if (ths.hasClass('col_2')) {
            ths.removeClass('col_2').addClass('col_1');
            return false;
        }
        if (ths.hasClass('col_3')) {
            ths.removeClass('col_3').addClass('col_2');
            return false;
        }
        if (ths.hasClass('col_4')) {
            ths.removeClass('col_4').addClass('col_3');
            return false;
        }
        if (ths.hasClass('col_5')) {
            ths.removeClass('col_5').addClass('col_4');
            return false;
        }
        if (ths.hasClass('col_6')) {
            ths.removeClass('col_6').addClass('col_5');
            return false;
        }
        if (ths.hasClass('col_7')) {
            ths.removeClass('col_7').addClass('col_6');
            return false;
        }
        if (ths.hasClass('col_8')) {
            ths.removeClass('col_8').addClass('col_7');
            return false;
        }
        if (ths.hasClass('col_9')) {
            ths.removeClass('col_9').addClass('col_8');
            return false;
        }
        if (ths.hasClass('col_10')) {
            ths.removeClass('col_10').addClass('col_9');
            return false;
        }
        if (ths.hasClass('col_11')) {
            ths.removeClass('col_11').addClass('col_10');
            return false;
        }
        if (ths.hasClass('col_12')) {
            ths.removeClass('col_12').addClass('col_11');
            return false;
        }

    });

    /*********edit content colum************/
    $(".resizecolum .icon-pencil").live('click', function(e) {
        alert('fff');
        var ths = $(this).closest('.column');
        onloadloop('x'); //uploader load img mp3 flv other        
        $('.resizecolum').prependTo('body').hide();
        ths.attr("contentEditable", "true").focus().attr('id', 'SfhatiELEMENTSelected');
        $("#columcontrolbar").attr('locked', '1');
        addsavecontrolbar(1);
        var l = e.pageX - 300;
        var t = e.pageY - 120;
        $("#Sfhati_panel").show().css({
            'left': l,
            'top': t
        });
        enabledesableeditor(0);
    });

    /**********save content as html for colums*********/
    $("#saveeditorsfhati").live('click', function() {
        $(this).attr('locked', '0');
        $('.column').attr("contentEditable", "false");
        addsavecontrolbar(0);
        $('a[href="SfhatiLink"]').replaceWith($('a[href="SfhatiLink"]').text());
        $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').remove();
        enabledesableeditor(1);
        var field = $(this).parent().parent().parent();
        var savetext = Base64.encode(field.find('.entry_post').html());
        $("#result_theme_panel").text('[saving...]');
        $('.too_image_preloader').show();
        $.post("/index.php", {
            id: $('#id_thispage').val(),
            renderer_jax: 's',
            thisidtag: field.attr('tmpltcode'),
            noecho: $('#id_thispage').val(),
            TYPOGRAHICALIZER: "paragraph",
            base64: '2',
            value_jax: savetext
        }).done(function() {
            $("#result_theme_panel").text('[done...]');
            $('.too_image_preloader').fadeOut('fast');
        });
    });

    /**********cancel save************/
    $("#cancelsaveeditorsfhati").live('click', function() {
        var field = $(this).parent().parent().parent();
        addsavecontrolbar(0);
        field.find('.entry_post').text('[Loading...]').load(getaddressURL + 'chng_tpl=plugin_preview&plgn=' + field.attr('tmpltcode') + '&plgn_sid=' + field.attr('inb') + '&' + field.attr('tmpltcode') + '=' + field.attr('inb'));
    });

    /**********selected element in editor*****************/
    var sfhatiselected;
    $('div[contenteditable="true"]').mouseup(function(event) {
        sfhatiselected = event.target;
        $('#sfhatiselected').removeAttr('id');
        $(sfhatiselected).attr('id', 'sfhatiselected');
    });

    /*Insert HTML Code*/
    $('.SfhatiFixClickhtm').live('click', function() {
        var command = 'inserthtml';
        var values = $(this).attr('namevalue');
        document.execCommand(command, false, values);
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();
    });


    /*color code*/
    $('.colortable td').click(function() {
        var command = $(this).parent().parent().parent().parent().attr('fork').replace('_sfhatiPanel', '');
        var values = $(this).css('background-color');
        //  alert(command + ':' + values);
        document.execCommand(command, false, values);
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();
        $("#SfhatiELEMENTSelected").find('font').each(function() {
            $(this).replaceWith('<span style="color:' + $(this).attr('color') + '">' + $(this).html() + '</span>');
        });

    });

    /*Font family code*/
    $('.SfhatiFixClick').live('click', function() {
        var command = 'fontname';

        var values = $(this).attr('tooltip');
        //  alert(command + ':' + values);
        document.execCommand(command, false, values);
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();
        $("#SfhatiELEMENTSelected").find('font').each(function() {
            $(this).replaceWith('<span style="font-family:' + $(this).attr('face') + '">' + $(this).html() + '</span>');
        });

    });


    /*all command code*/
    $('.Sfhati-button').click(function() {
        if ($("#Sfhati_panel").attr("isfocuce") == 'false')
            return;
        // 	$(this).parent().focus();
        var command = $(this).attr('id').replace('Orbit_', '');
        $('.sfhatiPanel').hide();
        if ($(this).attr('menu') == 'yes') {
            if (command == 'hilitecolor' || command == 'forecolor') {
                $('#color_sfhatiPanel').attr('fork', command + '_sfhatiPanel').show().css('top', '0');
                SfhatiSelectedE = '#color_sfhatiPanel';
            } else if (command == 'createLink') {
                document.execCommand(command, false, 'SfhatiLink');
                SfhatiSelectedE = '#' + command + '_sfhatiPanel';
                $('#' + command + '_sfhatiPanel').show();
            } else if (command == 'inserthtmlx') {
                SfhatiSelectedE = '#' + command + '_sfhatiPanel';
                $('#' + command + '_sfhatiPanel textarea').val($("#SfhatiELEMENTSelected").html()).change(function() {
                    $("#SfhatiELEMENTSelected").html($(this).val());
                });
                $('#' + command + '_sfhatiPanel').show();
            } else if (command == 'youtube') {
                if ($('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]')[0]) {
                    $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').remove();
                }
                document.execCommand('insertimage', false,  SITE_LINK +'template/library/images/sfhati_editor_insert.gif');
                SfhatiSelectedE = '#' + command + '_sfhatiPanel';
                $('#' + command + '_sfhatiPanel').show();
            } else if (command == 'insertimage' || command == 'insertflv' || command == 'insertmp3' || command == 'insertswf') {
                if ($('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]')[0]) {
                    $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').remove();
                }
                document.execCommand('insertimage', false,  SITE_LINK +'template/library/images/sfhati_editor_insert.gif');
                SfhatiSelectedE = '#' + command + '_sfhatiPanel';
                $('#' + command + '_sfhatiPanel').show();
                SfhatiSelectedtopE = 0;
                $(SfhatiSelectedE).css('top', '-28px');
            } else {
                SfhatiSelectedE = '#' + command + '_sfhatiPanel';
                $('#' + command + '_sfhatiPanel').show();
                SfhatiSelectedtopE = 0;
                $(SfhatiSelectedE).css('top', '-28px');
            }

            $('#mainsfhatiPanel').show();
            return;
        }
        if (command == 'save') {
            $('#SfhatiELEMENTSelected').removeAttr('id');
            $("#columcontrolbar").attr('locked', '0');
            $("#Sfhati_panel").hide();
            $('#mainsfhatiPanel').hide();
            $('.sfhatiPanel').hide();
            $('.column').attr("contentEditable", "false");
            $('#SfhatiELEMENTSelected').removeAttr('id');
        }
        document.execCommand(command, false, null);
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();
    });


    $('#Sfhati_panel').draggable();
    /*Create link href a */
    $('#saveurlchange').click(function() {
        $('a[href="SfhatiLink"]').attr('href', $('#createlinkpath').val()).attr('target', $('#urlchangeselect').val());
        $('#createlinkpath').attr('href', 'http://');
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();

    });
    /*Create youtube code*/
    $('#saveyoutubechange').click(function() {
        var media = testUrlForMedia($("#youtubelinkpath").val());

        if (media.id != null) {
            $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').replaceWith('<img mediatype="' + media.type + '" video="' + media.id + '" ' + $('#youtubechangeselect').val() + ' src="http://i1.ytimg.com/vi/' + media.id + '/hqdefault.jpg" />');
            $('.sfhatiPanel').hide();
            $('#mainsfhatiPanel').hide();
            $("#youtubelinkpath").val('');
        } else {
            alert('[please insert a valid url]');
        }
    });

    $("#Sfhati_panel").mouseenter(function() {
        $("#Sfhati_panel").attr('mouse', '1');
    }).mouseleave(function() {
        $("#Sfhati_panel").attr('mouse', '0');
    });



    /*inseart image code*/
    $('.SfhatiFixClickimg').live('click', function() {

        var command = $(this).parent().parent().attr('id').replace('_sfhatiPanel', '');
        var values = $(this).attr('namevalue');
        if (command == 'insertimage') {
            $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').replaceWith('<img src="' + values + '" />');
        } else {
            $('img[src="'+ SITE_LINK +'template/library/images/sfhati_editor_insert.gif"]').replaceWith('<img mediatype="' + command + '" width="200" height="200" video="' + values + '" src="'+ SITE_LINK +'template/library/images/' + command + '.jpg" />');
        }
        $('.sfhatiPanel').hide();
        $('#mainsfhatiPanel').hide();
    });

    $('.SfhatiFixClickfolder').live('click', function() {
        var command = $(this).parent().parent().attr('id');
        var thisext = $(this).attr('ext');
        $('#' + command).text('[Loading...]');
        $('#' + command).load(SITE_LINK +'?getimagesfromfolder=' + $(this).attr('namevalue') + '&ext=' + thisext, function(responseTxt, statusTxt, xhr) {
            if (statusTxt == "success") {
                onloadloop(thisext);
            }
            // reloadfunction();           
        });
    });
    /**********************sfhati slider*****************************************/
    $('#insertparagraph_sfhatiPanel').simpleslide({
        divslide: "sfhatisliderdiv",
        number_slide: 7,
        elementslide: "img"
    });
    $('#fontname_sfhatiPanel').simpleslide({
        divslide: "sfhatisliderdiv",
        number_slide: 7,
        elementslide: "div"
    });
});


function enabledesableeditor(e) {
    if (e == 1) {
        // convert text to code style
        $('.prettyprint,code').each(function() {
            $(this).text($(this).find('textarea').val());
        });
        prettyPrint();


        //youtube convert img to object 
        $('img[mediatype="youtube"]').each(function() {
            $(this).replaceWith('<object mediatype="youtube" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" video="' + $(this).attr('video') + '"><param name="movie" value="http://www.youtube.com/v/' + $(this).attr('video') + '?version=3&amp;hl=ar_EG&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' + $(this).attr('video') + '?version=3&amp;hl=ar_EG&amp;rel=0" type="application/x-shockwave-flash"    width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '"  allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object>');
        });
        // SWF convert img to object 
        $('img[mediatype="insertswf"]').each(function() {
            $(this).replaceWith('<object mediatype="insertswf" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" video="' + $(this).attr('video') + '"><embed src="' + $(this).attr('video') + '" type="application/x-shockwave-flash"    width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '"  allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object>');
        });

        // MP3 convert img to object 
        var colorbasebg_1 = $('#colorbasebg_1').attr('backgroundcolor');
        var colorbasebg_4 = $('#colorbasebg_4').attr('backgroundcolor');
        var colorbase1bg_1 = $('#colorbase1bg_1').attr('backgroundcolor');
        var colorbase1bg_4 = $('#colorbase1bg_4').attr('backgroundcolor');
        var colorbasebg5 = $('#colorbasebg5').attr('backgroundcolor');
        var colorbase1bg = $('#colorbase1bg').attr('backgroundcolor');
        var colorbasebg = $('#colorbasebg').attr('backgroundcolor');
        var colorbase1bg2 = $('#colorbase1bg2').attr('backgroundcolor');

        $('img[mediatype="insertmp3"]').each(function() {
            $(this).replaceWith('<object mediatype="insertmp3" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" video="' + $(this).attr('video') + '"><embed src="'+ SITE_LINK +'template/editor_styles/swf/player1.swf" FlashVars="playerID=1&amp;soundFile=' + $(this).attr('video') + '&bg=0x' + colorbasebg_1 + '&amp;leftbg=0x' + colorbasebg + '&amp;lefticon=0x' + colorbasebg_4 + '&amp;rightbg=0x' + colorbase1bg + '&amp;rightbghover=0x' + colorbase1bg2 + '&amp;righticon=0x' + colorbase1bg_1 + '&amp;righticonhover=0x' + colorbase1bg_4 + '&amp;text=0x' + colorbasebg5 + ' type="application/x-shockwave-flash"    width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '"  allowscriptaccess="always" wmode="transparent" allowfullscreen="false"></embed></object>');
        });

        // FLV convert img to object 
        $('img[mediatype="insertflv"]').each(function() {
            var file = encodeURIComponent($(this).attr('video'));
            var image = encodeURIComponent($(this).attr('video') + '.jpg');
            $(this).replaceWith('<object  mediatype="insertflv" video="' + $(this).attr('video') + '" wmode="transparent" type="application/x-shockwave-flash" data="'+ SITE_LINK +'template/editor_styles/swf/player.swf" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" bgcolor="#000000" id="player1" name="player1" tabindex="0"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="seamlesstabbing" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="netstreambasepath=' + file + '&amp;id=player1&amp;skin=http%3A%2F%2Fs0-www.ltvimg.com%2Fv3_6_12%2Fcontent%2Fassets%2Fskins%2Fglow%2Fglow.zip&amp;stretching=fill&amp;image=' + image + '&amp;levels=%5B%5BJSON%5D%5D%5B%7B%22file%22%3A%22' + file + '%22%7D%2c%7B%22file%22%3A%22' + file + '%22%7D%5D&amp;controlbar.position=over"></object>');
        });

    } else {
        //youtube convert object to img
        $('object[mediatype="youtube"]').each(function() {
            $(this).replaceWith('<img mediatype="youtube" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" video="' + $(this).attr('video') + '" src="http://i1.ytimg.com/vi/' + $(this).attr('video') + '/hqdefault.jpg"/>');
        });
        // MP3,SWF,FLV convert object to img
        $('object[mediatype="insertmp3"],object[mediatype="insertflv"],object[mediatype="insertswf"]').each(function() {
            $(this).replaceWith('<img mediatype="' + $(this).attr('mediatype') + '" width="' + $(this).attr('width') + '" height="' + $(this).attr('height') + '" video="' + $(this).attr('video') + '" src="'+ SITE_LINK +'template/library/images/' + $(this).attr('mediatype') + '.jpg"/>');
        });
        //convert code style to plant text
        $('.prettyprint,code').each(function() {
            $(this).html('<textarea style="width:' + $(this).css('width') + ' ;height:' + $(this).css('height') + '">' + $(this).text() + '</textarea>');
        });

    }

}



(function($) {
    $.fn.SfhatiTextEditor = function(options) {
        if (options == false)
        {
            return this.each(function() {
                this.contentEditable = "false";
            });
        }
        else
        {
            return this.each(function() {
                this.contentEditable = "true";
            });
        }
    };
})(jQuery);

function testUrlForMedia(pastedData) {
    var success = false;
    var media = {};
    if (pastedData.match('http://(www.)?youtube|youtu\.be')) {
        if (pastedData.match('embed')) {
            youtube_id = pastedData.split(/embed\//)[1].split('"')[0];
        }
        else {
            youtube_id = pastedData.split(/v\/|v=|youtu\.be\//)[1].split(/[?&]/)[0];
        }
        media.type = "youtube";
        media.id = youtube_id;
        success = true;
    }
    else if (pastedData.match('http://(player.)?vimeo\.com')) {
        vimeo_id = pastedData.split(/video\/|http:\/\/vimeo\.com\//)[1].split(/[?&]/)[0];
        media.type = "vimeo";
        media.id = vimeo_id;
        success = true;
    }
    else if (pastedData.match('http://player\.soundcloud\.com')) {
        soundcloud_url = unescape(pastedData.split(/value="/)[1].split(/["]/)[0]);
        soundcloud_id = soundcloud_url.split(/tracks\//)[1].split(/[&"]/)[0];
        media.type = "soundcloud";
        media.id = soundcloud_id;
        success = true;
    }
    if (success) {
        return media;
    }

    return false;
}





 