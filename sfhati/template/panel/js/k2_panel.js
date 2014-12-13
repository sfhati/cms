var themecssname = '';
function call_after_setting_close(p) {
    p = p.replace(SITE_LINK +'?chng_tpl=system_setting&plgn=', '');
    if (p == 'pages') {
        //reload all menus
        $('.boxes[plg="menu"]').each(function() {
            $(this).find('.entry_post').load(SITE_LINK +'?id=' + $('#id_thispage').val() + '&chng_tpl=plugin_preview&plgn=' + $(this).attr('tmpltcode'));
        });
        $('.movement[plg="menu"]').each(function() {
            $(this).load(SITE_LINK +'?id=' + $('#id_thispage').val() + '&chng_tpl=plugin_preview&plgn=' + $(this).attr('tmpltcode'));
        });

    }
}

function changepaneltheme(theme) {
    var randomnumber = Math.floor((Math.random() * 100) + 1);
    $('#panelthemecss').load( SITE_LINK + '?colorcreate=' + theme + '&v1=' + randomnumber);
}

function createsnapimage() {
    $('.fancybox-desktop').html('<h1>Please wait...</h1>');
    jQuery('.too_image_preloader').show();
    html2canvas($('.global_wrapper'), {
        onrendered: function(canvas) {
            var extra_canvas = document.createElement("canvas");
            var ctx = extra_canvas.getContext('2d');
            var wctx, hctx;
            wctx = canvas.width / 4;
            hctx = canvas.height / 4;
            extra_canvas.setAttribute('width', wctx);
            extra_canvas.setAttribute('height', hctx);

            ctx.drawImage(canvas, 0, 0, canvas.width, canvas.height, 0, 0, wctx, hctx);
            try {
                var img = extra_canvas.toDataURL('image/jpeg', 0.9).split(',')[1];
            } catch (e) {
                var img = extra_canvas.toDataURL().split(',')[1];
            }

            $.ajax({
                url: '/',
                type: 'POST',
                data: {
                    type: 'base64',
                    html2canvas: 'base64',
                    image: img
                },
                dataType: 'json',
                complete: function(data) {
                    jQuery('.too_image_preloader').fadeOut('fast');
                    window.location.href = SITE_LINK +"?packegstyle=1";
                }
            });
        },
    });
}


function hidebeforobenbox(box) {
    $(".boxcoption").each(function() {
        if ($(this).attr('id') != box)
            $(this).hide('fast');
    });
}


$(function() {
    $('.holder,.handler').click(function() {
        $(this).parent().find('.heap').slideToggle('fast');
    });
    $('.heapOption').click(function() {
        $('.heap').hide('fast');
    });
    $(document).mouseup(function(e)
    {
        var container = $(".heap");
        if (!$(e.target).is('.heap'))
            container.hide();
    });

    $('#body_theme').mouseup(function() {
        $("div#panel").slideUp("slow");
        $("#close").show();
    });
//    $("#panel select").heapbox({"heapsize":"100px",'speed': 'fast'});
    /*view mode mobile desktop tablet*/
    $('.mobile').click(function() {
        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate({
            width: "480px"
        });
        $('#left1,#left2,#right1,#right2').css({
            'float': 'none',
            'width': '100%',
            'margin': '0'
        });
        $('.wrapper_header,.wrapper_footer').slideUp('slow');
        $('#mobile_wrapper_header').slideDown('slow');
    });
    $('.tablet').click(function() {
        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate({
            width: "600px"
        });
        $('#left1,#left2,#right1,#right2').css({
            'float': 'none',
            'width': '100%',
            'margin': '0'
        });
        $('.wrapper_header,.wrapper_footer').slideUp('slow');
        $('#mobile_wrapper_header').slideDown('slow');
    });
    $('.desktop').click(function() {
        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate().removeAttr('style');
        $('#right1,#right2').css({
            'float': 'right'
        });
        $('#left1,#left2,#right1,#right2').removeAttr('style');
        $('#left1,#left2').css({
            'float': 'left'
        });
        $('.wrapper_header,.wrapper_footer').slideDown('slow');
        $('#mobile_wrapper_header').slideUp('slow');
    });
  
    /*side width for pages*/
    $(".sidespinner").slider({
        range: "max",
        min: 10,
        max: 100,
        value: 20,
        slide: function(event, ui) {
            $("#" + $(this).attr('trg')).text($(this).attr('cap') + ' %' + ui.value);
            $("#" + $("#" + $(this).attr('trg')).attr('valu')).css('width', ui.value + '%').attr('pris', ui.value);
        }
    });

    $(".sidespinner").each(function() {
        var t = $("#" + $("#" + $(this).attr('trg')).attr('valu'));
        var width = t.width();
        var parentWidth = t.offsetParent().width();
        var percent = Math.round(100 * width / parentWidth);
        $("#" + $(this).attr('trg')).text($(this).attr('cap') + ' %' + percent);
        $(this).slider('value', percent);
        t.attr('pris', percent);
    });


    $("#margensidex").slider({
        range: "max",
        min: 0,
        max: 100,
        value: 5,
        slide: function(event, ui) {
            $("#margenside").text('[margenside] ' + ui.value + 'px');
            $(".sidebar_left,.sidebar_right").css('margin', ui.value + 'px');
        }
    });

    $('#savesidepagechange,#savesidepagechangex').click(function() {
        var plusd = '';
        var pagesidecss = ('#right1{width:' + $('#right1').attr('pris') + '%}#right2{width:' + $('#right2').attr('pris') + '%}#left1{width:' + $('#left1').attr('pris') + '%}#left2{width:' + $('#left2').attr('pris') + '%}.sidebar_left,.sidebar_right{margin:' + $('.sidebar_left').css('margin-left') + '}');
        if ($(this).attr('id') == 'savesidepagechangex')
            plusd = '&xdefult=1';
        $.post(SITE_LINK +'?pagesidecss=' + Base64.encode(pagesidecss) + '&id=' + $('#id_thispage').val() + plusd);
        $('#page_sideh').hide('fast');
    });
    $('#erazeidepagechange,#erazeidepagechangex').click(function() {
        var allplusd = '';
        if ($(this).attr('id') == 'erazeidepagechangex')
            allplusd = '&xdefult=1';
        $("#dialog-confirm").dialog({            
            modal: true,
            buttons: {
                "[Delete]": function() {
                    $('#right1').css('width', 'auto');
                    $('#right2').css('width', 'auto');
                    $('#left1').css('width', 'auto');
                    $('#left2').css('width', 'auto');
                    result_theme_panel_load(SITE_LINK +'?erazeidepagechangex=1&id=' + $('#id_thispage').val() + allplusd);
                    $(this).dialog("close");
                    $('#page_sideh').hide('fast');
                },
                "[Cancel]": function() {
                    $(this).dialog("close");
                }
            }
        });
    });
    /*page tree */
    $("#pagetreechange").click(function() {
        $('#pagetreechangeselect option').removeAttr('selected');
        $('#pagetreechangeselect option[value="' + $('#pagetreechangeinput').val() + '"]').attr('selected', 'selected');
        $('#pagetreechangeselect').val($('#pagetreechangeselect option[selected]').attr('value'));
        hidebeforobenbox('pagetreechange1');
        $('#pagetreechange1').toggle('fast');

    });
    $("#savepagetreechange").click(function() {
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=slave&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pagetreechangeselect').val());
        $('#pagetreechangeinput').val($('#pagetreechangeselect').val());
        hidebeforobenbox('pagetreechange1');
        $('#pagetreechange1').toggle('fast');
    });


    $("#savesiteiconchnger").click(function() {
        $.post(SITE_LINK +'?saveanewtitle=' + $('#sitletitle').val());
        $('#sitetitlechngers').hide('fast');
        var string = $('title').text();
        var oldtitle1 = string.toString().split('|'.toString());
        $('title').text(string.replace(oldtitle1[0], $('#sitletitle').val()));
    });
    $("#savepagetitlechange1").click(function() {
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=page_name&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pagesitletitle').val());
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=page_key&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pagesitlepage_cont').val());
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=description&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pagesitledescription').val());
        $('#pagetitlechange1').hide('fast');
        var string = $('title').text();
        var oldtitle1 = string.toString().split('|'.toString());
        $('title').text(string.replace(oldtitle1[1], $('#pagesitletitle').val()));
        $('.menu_page_id_' + $('#id_thispage').val()).text($('#pagesitletitle').val());
    });
    $("#savepageaddnewin1").click(function() {
        //#newpagesitletitle , #newpagetreechangeselect , 
        window.open(SITE_LINK +'?plgn=pages&newpagetreechangeselect=' + $('#newpagetreechangeselect').val() + '&addnewpage=' + $('#newpageundertreechangeselect').val() + '&newpagesitletitle=' + $('#newpagesitletitle').val() + '&relo=1', '_self');
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=page_name&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pagesitletitle').val());
        $('#pageaddnewin1').hide('fast');
    });
    $("#savepageurlchange").click(function() {
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=url&id=' + $('#id_thispage').val() + '&base64=1&value_jax=' + Base64.encode($('#pageurlchangeinput').val()));
        $.post(SITE_LINK +'?TYPOGRAHICALIZER=page&renderer_jax=linklabel&id=' + $('#id_thispage').val() + '&value_jax=' + $('#pageurlchangeselect').val());
        $('#pageurlchange1').hide('fast');

    });
    $('.userpremissins').click(function() {
        result_theme_panel_load(SITE_LINK +'?changepagepremistion=' + $(this).attr('for') + '&p=page&pageisd=' + $('#id_thispage').val());
        $('#userpremissins').attr('src', SITE_LINK + 'template/panel/images/user' + $(this).attr('for') + '.png');
        $('#permissions').hide('fast');
    });
    $('.usersquare_box').click(function() {
        result_theme_panel_load(SITE_LINK +'?changeusersquare_box=' + $(this).attr('for') + '&p=page&pageisd=' + $('#id_thispage').val());
        $('#usersquare_box').attr('src', SITE_LINK + 'template/panel/images/isquare_' + $(this).attr('for') + '.png');
        $('#square_box').hide('fast');
        $('div[square*="green"]').hide('fast');
        $('div[square*="red"]').hide('fast');
        $('div[square*="blue"]').hide('fast');
        $('div[square*="orange"]').hide('fast');
        $('div[square*="' + $(this).attr('for') + '"]').show('fast');
        square_thispage = $(this).attr('for');
    });
    $('.palceholderbutno').click(function() {
        $(this).toggleClass('check');
        result_theme_panel_load(SITE_LINK +'?rendererpagepalce=' + $(this).attr('type') + '&idpg=' + $('#id_thispage').val());
    });
    /* window widget control tap */
    $('.tab_sfhati').click(function() {
        $('.tab_sfhati').removeClass("ui-tabs-selected");
        $(this).addClass("ui-tabs-selected");
        $(".cont_sfhati_tab").hide();
        $("#" + $(this).attr("rel")).show();
    });
    /**********************************Page Option**********************************************/
//radio
    $(".layoutpinner").slider({
        range: "max",
        min: 0,
        max: 100,
        value: 20,
        slide: function(event, ui) {
            $('#saveslay,#erazelay').show('fast');
            var valu = '';
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + ui.value + ' px');
            if ($(this).attr('trg') == '.wrapper_content') {
                valu = ui.value + 'px ';
                //$($(this).attr('trg')).css('border-radius', valu);
               // if ($('#paddinguse').hasClass('icon-check'))
                   // Filter_CSS('lay', $(this).attr('trg'), 'padding', valu + ' 0');
            } else if ($(this).attr('trg') == '.wrapper_header') {
                valu = ui.value + 'px ' + ui.value + 'px 0 0';
                //$($(this).attr('trg')).css('border-radius', valu);
            } else if ($(this).attr('trg') == '.wrapper_footer') {
                valu = '0 0 ' + ui.value + 'px ' + ui.value + 'px';
                //$($(this).attr('trg')).css('border-radius', valu);
            } else if ($(this).attr('trg') == '.global_wrapper') {
                valu = ui.value + 'px ';
                //$($(this).attr('trg')).css('border-radius', valu);
                //if ($('#paddinguse').hasClass('icon-check'))
                 //   Filter_CSS('lay', $(this).attr('trg'), 'padding', valu + ' 0');
            }

            Filter_CSS('lay', $(this).attr('trg'), 'border-radius', valu);

        }
    });
   $('#siteradiochnger').click(function() {
        var t;
        $(".layoutpinner").each(function() {
            t = $($(this).attr('trg'));
            var width = t.css('border-radius').match(/(-?\d+px)/g);
            if ($(this).attr('trg') == '.wrapper_footer') {
                $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + width[2] );
                $(this).slider('value', width[2].replace('px', ''));
            }else{
                $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + width[0] ); 
                $(this).slider('value', width[0].replace('px', ''));
            }
            
            
          
            
        });
        
        if($('.global_wrapper').css('overflow')== 'hidden'){
            $('.checkoptionxo').removeClass('icon-option').addClass('icon-check');
             $('#paddinguse').removeClass('icon-check').addClass('icon-option');
        }else{
             $('.checkoptionxo').removeClass('icon-check').addClass('icon-option');
             $('#paddinguse').removeClass('icon-option').addClass('icon-check');
        }
        //$('#colorpickersborder .color_picker').css('background-color', t.css('border-bottom-color'));
    });

    //border
    $(".layoutpinnerborder").slider({
        range: "max",
        min: 0,
        max: 10,
        value: 1,
        slide: function(event, ui) {
            $('#saveslay,#erazelay').show('fast');
            var valu = '';
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + ui.value + ' px');
            valu = ui.value + 'px solid';
            // $($(this).attr('trg')).css('border', valu).css('border-color', $('#colorpickersborder').val());
            Filter_CSS('lay', $(this).attr('trg'), 'border', valu);
            Filter_CSS('lay', $(this).attr('trg'), 'border-color', $('#colorpickersborder').val());
        }
    });

    $('#siteborderchnger').click(function() {
        var t;
        $(".layoutpinnerborder").each(function() {
            t = $($(this).attr('trg'));
            var width = (t.css('border-bottom-width')).replace('px', '');
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + width + ' px');
            $(this).slider('value', width);
        });
        //$('#colorpickersborder .color_picker').css('background-color', t.css('border-bottom-color'));
    });
    //shadow
    $(".layoutpinnershadow").slider({
        range: "max",
        min: 0,
        max: 10,
        value: 1,
        slide: function(event, ui) {
            $('#saveslay,#erazelay').show('fast');
            var valu = '';
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + ui.value + ' px');
            valu = '0 0 ' + (ui.value * 5) + 'px ' + ui.value + 'px ' + $('#colorpickersshadow').val();
            // $($(this).attr('trg')).css('box-shadow', valu);
            Filter_CSS('lay', $(this).attr('trg'), 'box-shadow', valu);
        }
    });
    $('#sitechadowchnger').click(function() {
        var t;
        $(".layoutpinnershadow").each(function() {
            t = $($(this).attr('trg'));
            var width = (t.css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g));
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + width[4].replace('px', '') + ' px');
            $(this).slider('value', width[4].replace('px', ''));
            //    $('#colorpickersshadow .color_picker').css('background-color', t.css('box-shadow',width[0]));
        });

    });
 
    //stritch chnger
    $(".layoutpinnerstritchchnger").slider({
        range: "max",
        min: 0,
        max: 100, 
        value: 1,
        slide: function(event, ui) {
            $('#saveslay,#erazelay').show('fast');
            var valu = '';
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + ui.value + ' px');
            valu = ui.value + 'px';
            if ($(this).attr('trg') == '.global_wrapper' || $(this).attr('trg') == '.wrapper_content' || $(this).attr('trg') == '.wrapper_footer') {
                //   $($(this).attr('trg')).css('margin-bottom', valu);
                Filter_CSS('lay', $(this).attr('trg'), 'margin-bottom', valu);
            }
            if ($(this).attr('trg') == '.global_wrapper' || $(this).attr('trg') == '.wrapper_content' || $(this).attr('trg') == '.wrapper_header') {
                //   $($(this).attr('trg')).css('margin-top', valu);
                Filter_CSS('lay', $(this).attr('trg'), 'margin-top', valu);
            }
        }
    });
    $('#sitemargenstritchchnger').click(function() {
        var t;
        $(".layoutpinnerstritchchnger").each(function() {
            var width;
            t = $($(this).attr('trg'));
            if ($(this).attr('trg') == '.global_wrapper' || $(this).attr('trg') == '.wrapper_content' || $(this).attr('trg') == '.wrapper_footer') {
                width = (t.css('margin-bottom')).replace('px', '');
            } else {
                width = (t.css('margin-top')).replace('px', '');
            }
            $("#" + $(this).attr('spantrg')).text($(this).attr('cap') + ' ' + width + ' px');
            $(this).slider('value', width);
            //    $('#colorpickersshadow .color_picker').css('background-color', t.css('box-shadow',width[0]));
        });
$('.checkoptionx').removeClass('icon-check').addClass('icon-option');        
$('.checkoptionx[trg="'+ $('.wrapper_header').css('float') +'"]').removeClass('icon-option').addClass('icon-check');        
$('.checkoption').each(function(){
    if($($(this).attr('trg')).css('width')=='1020px')
    $(this).removeClass('icon-check').addClass('icon-option');
else
  $(this).removeClass('icon-option').addClass('icon-check');  
});
    });

//icon-option icon-check checkoption
    $('.checkoption').click(function() {
        $('#saveslay,#erazelay').show('fast');
        var valu = '';
        if ($(this).hasClass('icon-check')) {
            valu = '1020px';
            $(this).removeClass('icon-check').addClass('icon-option');
        } else {
            valu = '100%';
            $(this).removeClass('icon-option').addClass('icon-check');
        }
        Filter_CSS('lay', $(this).attr('trg'), 'width', valu);
    });
//checkoptionx .wrapper_header float: right;
    $('.checkoptionx').click(function() {
        $('#saveslay,#erazelay').show('fast');
        if ($(this).hasClass('icon-check')) {
            return true;

        } else {
            $('.checkoptionx').removeClass('icon-check').addClass('icon-option');
            $(this).removeClass('icon-option').addClass('icon-check');
            Filter_CSS('lay', '.wrapper_header', 'float', $(this).attr('trg'));
            Filter_CSS('lay', '.wrapper_content', 'float', $(this).attr('trg'));
            Filter_CSS('lay', '.wrapper_footer', 'float', $(this).attr('trg'));
            Filter_CSS('lay', '.global_wrapper', 'float', $(this).attr('trg'));
        }

    });
//checkoptionxo all overflow or padding;
    $('.checkoptionxo').click(function() {
        $('#saveslay,#erazelay').show('fast');
        if ($(this).hasClass('icon-check')) {
            return true;

        } else {
            $('.checkoptionxo').removeClass('icon-check').addClass('icon-option');
            $(this).removeClass('icon-option').addClass('icon-check');
            if ($(this).attr('trg') == 'padding') {
                Filter_CSS('lay', '.wrapper_header,.wrapper_content,.wrapper_footer,.global_wrapper', 'padding', '0');
                Filter_CSS('lay', '.wrapper_header,.wrapper_content,.wrapper_footer,.global_wrapper', 'overflow', 'visible');
            } else {
                Filter_CSS('lay', '.wrapper_header,.wrapper_content,.wrapper_footer,.global_wrapper', 'padding', '0');
                Filter_CSS('lay', '.wrapper_header,.wrapper_content,.wrapper_footer,.global_wrapper', 'overflow', 'hidden');
            }
        }

    });
    
//save or cancel layuot
    $('#saveslay').click(function() {
        $('#saveslay,#erazelay,.boxcoption').hide('fast');
        $('#oldlay').val($('#groupCSS_lay').text());
        saveCSSinDatabase('lay');
    });
    $('#erazelay').click(function() {
        $('#saveslay,#erazelay,.boxcoption').hide('fast');
        $('#groupCSS_lay').text($('#oldlay').val());
    });

    //layout
    $(".postion_view").click(function() {
        var newclass = $(this).attr("vlu");
        var myorginallay = "groupCSS_lay";
        if ($('#' + myorginallay).length == 0) {
            $("#DIVgroupCSS").append("<style id='" + myorginallay + "'></style>");
        }

        if (newclass == "1")
            $('#' + myorginallay).text('.wrapper_header{width:100%;} .wrapper_footer{width:100%;}.wrapper_content{margin-bottom:44px;} .wrapper_content{margin-top:44px;}.wrapper_content{padding:18px  0;} .wrapper_content{border-radius:18px ;}');
        if (newclass == "2")
            $('#' + myorginallay).text('.wrapper_content{width:1020px;}.wrapper_footer{width:1020px;}.global_wrapper{width:100%;}.wrapper_header{width:100%;}.wrapper_content{margin-bottom:0px;} .wrapper_content{margin-top:0px;}  .global_wrapper{margin-bottom:0px;} .global_wrapper{margin-top:0px;}.global_wrapper{padding:0px  0;} .global_wrapper{border-radius:0px ;}.wrapper_footer{border-radius:0 0 21px 21px;}.wrapper_footer{margin-bottom:20px;}');
        if (newclass == "3")
            $('#' + myorginallay).text('.wrapper_footer{width:100%;}  .global_wrapper{width:100%;} .wrapper_header{float:none;} .wrapper_content{float:none;} .wrapper_footer{float:none;} .global_wrapper{float:none;}');
        if (newclass == "4")
            $('#' + myorginallay).text('.global_wrapper{width:100%;}');
        if (newclass == "5")
            $('#' + myorginallay).text('.global_wrapper{width:1020px;}.wrapper_header{float:right;} .wrapper_content{float:right;} .wrapper_footer{float:right;} .global_wrapper{float:right;}');
        if (newclass == "6")
            $('#' + myorginallay).text('.global_wrapper{width:1020px;}.wrapper_header{float:left;} .wrapper_content{float:left;} .wrapper_footer{float:left;} .global_wrapper{float:left;}');
        if (newclass == "7")
            $('#' + myorginallay).text('.global_wrapper{width:100%;}.wrapper_header{width:100%;} .wrapper_content{width:100%;} .wrapper_footer{width:100%;} .wrapper_header{float:none;} .wrapper_content{float:none;} .wrapper_footer{float:none;} .global_wrapper{float:none;}');
        if (newclass == "8")
            $('#' + myorginallay).text('.global_wrapper{width:100%;}.wrapper_header{width:100%;}  .wrapper_footer{width:100%;} .wrapper_header{float:none;} .wrapper_content{float:none;} .wrapper_footer{float:none;} .global_wrapper{float:none;} .wrapper_content{width:1020px;}');
        $('#saveslay,#erazelay').show('fast');
        $('.boxcoption').hide('fast');
    });
    $("img.side_view").click(function() {
        $('#' + $(this).attr("side")).toggle();
        var isv = $('#' + $(this).attr("side")).is(":visible");
        result_theme_panel_load(SITE_LINK +'?id=' + $('#id_thispage').val() + "&side_view=" + $(this).attr("side") + "&isequal=" + isv);
        var allback = '';
        $("img.side_view").each(function() {
            var isv1 = $('#' + $(this).attr("side")).is(":visible");
            if (isv1 == false) {
                $(this).css('opacity', '0.4');
                $(this).attr('src', SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '.png');
                $(".applyotheroptionbutton[fork='"+ $(this).attr("side") +"']").hide();
            } else {
                $(this).css('opacity', '1');
                $(this).attr('src', SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '_1.png');
                if (allback != '')
                    allback = allback + ',';
                allback = allback + 'url('+ SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '_1i.png)';
                $(".applyotheroptionbutton[fork='"+ $(this).attr("side") +"']").show();
            }
        });
        $('#blank').attr('style', 'background-image:' + allback + ';background-repeat: no-repeat;background-color: #fff; width: 38px; height: 47px;');
    });
    
    $('.applyotheroptionbutton,.side_view').mouseover(function(){
        $('#'+ $(this).attr('fork')).addClass('borderback');
        $('#'+ $(this).attr('side')).addClass('borderback');
        
    }).mouseout(function(){
        $('#'+ $(this).attr('fork')).removeClass('borderback');
        $('#'+ $(this).attr('side')).removeClass('borderback');
    });
    /*   $("img.layout_view").click(function(){        
     var newclass=$(this).attr("id");       
     result_theme_panel_load("/?id="+$('#id_thispage').val()+"&layout_view="+newclass);
     $(".componentheading").attr("templt" , newclass) ;
     });
     */

    /****************************************For themes section**************************************/
    $("#cancel_theme").click(function() {
        $('#STYLEgroupCSS').attr('href', $('#STYLEgroupCSS').attr('nhref'));
        $('#DIVgroupCSS').html($('#textareagroupCSS').val());
        $("#oktheme").hide();
        $('#slides .animationpos').removeClass('styleborder');
        $('#theme_css').removeAttr('href');
    });
    $('#apply_theme').click(function() {
        //result_theme_panel_load("/?apply_theme=" + themecssname);
        themecssname = Base64.encode($('#theme_css').attr('href'));
        window.location.href = SITE_LINK +'?apply_theme=' + themecssname;
        $("#oktheme").hide();
        $('#slides .animationpos').removeClass('styleborder');
    });
    $('#slides .animationpos').click(function() {
        if ($(this).hasClass('styleborder')) {
            $('#STYLEgroupCSS').attr('href', $('#STYLEgroupCSS').attr('nhref'));
            $('#DIVgroupCSS').html($('#textareagroupCSS').val());
            $('#slides .animationpos').removeClass('styleborder');
            $("#oktheme").hide();
            $('#theme_css').removeAttr('href');
            return false;
        }
        $('#STYLEgroupCSS').removeAttr('href');
        $('#textareagroupCSS').val($('#DIVgroupCSS').html());
        $('#DIVgroupCSS').html(' ');
        $('#slides .animationpos').removeClass('styleborder');
        $(this).addClass('styleborder');
        themecssname = $(this).attr('title');
        if ($(this).attr('for') == 'my_theme')
            $('#theme_css').attr('href', SITE_LINK + 'template/my_theme/' + $(this).attr('title') + '/css/theme.css');
        else
            $('#theme_css').attr('href', Main_Domain + 'uploaded/themes/' + $(this).attr('title') + '/theme.css');
        $("#oktheme").show();
    });



    $(window).scroll(function() {
        var x = $(window).scrollTop();
        $("#toppanel").css({
            "top": x + "px"
        });
    });
    $("#toppanel").show();

    /*can drag panel ***/
    $("div.tab").draggable({
        axis: "x",
        handle: "#result_theme_panel"
    });
    //

    $(".tabbd").click(function() {
        $("div#panel").slideDown("slow");
        $("#close").hide();
        $(".tabbd").removeClass('colorcpanel');
        $(this).addClass('colorcpanel');
        $(".boxDX").hide();
        $("#box_" + $(this).attr("id")).show();
    });


});


/*Edit in place pages********************************************************************/
function editor_submit() {
    //     $('#page_cont').load("/admin/?p=page&aj=1&renderer=page_cont&value="+descriptiontxt+"&id="+idd);

    $("#description_code_form").submit();
    $('#page_cont').text("[Saving...]");
}
function editor_cancel(t) {
    $('#page_cont').html(Base64.decode(t));
}
/****************sfhati simple slide******************************/

(function($) {
    $.fn.simpleslide = function(options) {
        var settings = $.extend({
            divslide: "divslide",
            number_slide: 8,
            elementslide: "img"
        }, options);
        this.each(function() {
            var ele = '#' + $(this).attr('id');
            var loop = 0;
            var loopcountele = 0;
            var countele = Math.floor(($(ele).find(settings.elementslide).length) / (settings.number_slide));
            var remainder = ($(ele).find(settings.elementslide).length) % (settings.number_slide);
            if (remainder > 0)
                countele++;


            $(ele).find(settings.elementslide).each(function() {
                loop++;

                if (loop == 1) {
                    loopcountele++;
                    $(ele).append("<div id='sfhati_slider_" + loopcountele + "' class='" + settings.divslide + "'></div>");
                } else if (loop == settings.number_slide) {
                    loop = 0;
                }
                $(this).appendTo($(ele).find('#sfhati_slider_' + loopcountele));
            });

            $(ele).append('<span class="prev"></span>')
                    .append('<span class="next"></span>');



            settings.divslide = '.' + settings.divslide;
            $(ele).find(settings.divslide).hide();
            $(ele).find(settings.divslide).first().show();

            $(ele).find('.next').click(function() {
                if ($(ele).find(settings.divslide).is(':animated'))
                    return;
                if ($(ele).find(settings.divslide).last().is(':visible'))
                    return true;
                $(ele).find(settings.divslide + ':visible').slideToggle().next().slideToggle();
                if (!$(ele).find(settings.divslide + ':visible').length) {
                    $(ele).find(settings.divslide).first().slideToggle();
                }

            });


            $(ele).find('.prev').click(function() {
                if ($(ele).find(settings.divslide).is(':animated'))
                    return;
                if ($(ele).find(settings.divslide).first().is(':visible'))
                    return true;
                $(ele).find(settings.divslide + ':visible').slideToggle().prev().slideToggle();
                if (!$(ele).find(settings.divslide + ':visible').length) {
                    $(ele).find(settings.divslide).last().slideToggle();
                }

            });

        });
    };
}(jQuery));

$(function() {
    $('#slides-setting').simpleslide({
        divslide: "ALLWidget",
        number_slide: 8,
        elementslide: "a"
    });
    $('#slides-widget').simpleslide({
        divslide: "ALLWidget",
        number_slide: 8,
        elementslide: "img"
    });
    $('#slides').simpleslide({
        divslide: "ALLTHEME",
        number_slide: 5,
        elementslide: "div"
    });
});
$(window).bind("load", function() {
    $('#oldlay').val($('#groupCSS_lay').text());
    var allback = '';
    $("img.side_view").each(function() {
        var isv1 = $('#' + $(this).attr("side")).is(":visible");
        if (isv1 == false) {
            $(this).css('opacity', '0.4');
            $(this).attr('src', SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '.png');
            $(".applyotheroptionbutton[fork='"+ $(this).attr("side") +"']").hide();
        } else {
            $(this).css('opacity', '1');
            $(this).attr('src', SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '_1.png');
            if (allback != '')
                allback = allback + ',';
            allback = allback + 'url(' + SITE_LINK + 'template/panel/images/' + $(this).attr("side") + '_1i.png)';
            $(".applyotheroptionbutton[fork='"+ $(this).attr("side") +"']").show();
        }
    });
    $('#blank').attr('style', 'background-image:' + allback + ';background-repeat: no-repeat;background-color: #fff; width: 38px; height: 47px;');
    
});