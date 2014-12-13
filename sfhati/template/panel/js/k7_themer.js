function too_image_preloader($appl_bkg){
    jQuery('.too_image_preloader').show();
    jQuery('.too_image_preloader img').attr('src', $appl_bkg).load(function(){
        jQuery('.too_image_preloader').fadeOut('fast');
    });
}

function createUploader_theme(idx){
    var uploader = new qq.FileUploader({
        element: document.getElementById(idx),
        action: SITE_LINK +'?do_uploadtheme=1&idxx='+idx,
        params: {
            fortheme:idx
        },
        allowedExtensions: ['jpg', 'jpeg', 'png', 'gif' , 'zip'],
        sizeLimit: 3000000,
        debug: false,
        onSubmit: function(id, fileName){
            jQuery('.too_image_preloader').show();
        },
        onProgress: function(id, fileName, loaded, total){
            var x= parseInt((loaded / total )*100) +" % ";
            $("#result_theme_panel").text("Uploading "+ x);
        },
        onComplete: function(id, fileName, responseJSON){
            jQuery('.too_image_preloader').fadeOut('fast');
            var filenameServer = responseJSON['filename'];
            var height_i=responseJSON['height'];
            var width_i=responseJSON['width'];
            var $split_this_src1 = fileName.replace('.png', '').replace(  SITE_LINK + 'template/sfhati/images/', '');
            var parent_i = $("#changeoMstyle .selected").attr("fork");       
            if($('#changeoMstyle .selected').attr('value')=='set_header_bar'){
                Filter_CSS('font_theme_save','.fullheader_menu_bar','height', (height_i)+'px');	
                Filter_CSS('font_theme_save','.header_menu_bar','background', 'url('+filenameServer+')');	
                Filter_CSS('font_theme_save','.header_menu_bar','height', height_i+'px');	                
            }else if($('#changeoMstyle .selected').attr('value')=='set_header_bkgimage'){
                Filter_CSS('font_theme_save','.clipart','background-image', ' url('+filenameServer+')');
                Filter_CSS('font_theme_save','.clipart','background-position', 'center bottom');                
            }else if($('#changeoMstyle .selected').attr('value')=='set_logo'){
                Filter_CSS('font_theme_save','#site_logo','background-image', ' url('+filenameServer+')');
                Filter_CSS('font_theme_save','#site_logo','height', height_i+'px');	                
                Filter_CSS('font_theme_save','#site_logo','width', width_i+'px');	                
            }else if($('#changeoMstyle .selected').attr('value')=='set_header_shines'){
                Filter_CSS('font_theme_save','.header_shine','background-image',' url('+filenameServer+')');
            }else if($('#changeoMstyle .selected').attr('value')=='set_general_divisors'){
                Filter_CSS('font_theme_save',parent_i,'background', ' url('+filenameServer+')');
                Filter_CSS('font_theme_save',parent_i,'display', 'block');
                Filter_CSS('font_theme_save',parent_i,'height', height_i +'px');
                Filter_CSS('font_theme_save',parent_i,'bottom', (-(height_i/2).toFixed(0)) +'px');
            }else if($('#changeoMstyle .selected').attr('value')=='set_shadows'){
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_shadow','display', 'block');
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_shadow','background-image', ' url('+filenameServer+')');
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_shadow','height', height_i +'px');
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_shadow','bottom', height_i+'px');
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_shadow','background-repeat', 'repeat');
            }else if($('#changeoMstyle .selected').attr('value')=='set_gral_patterns'){
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_pattern','display', 'block');
                Filter_CSS('font_theme_save','body .'+parent_i.toLowerCase()+'_pattern','background', ' url('+filenameServer+')');
            }else if($('#changeoMstyle .selected').attr('value')=='set_jquery_ui'){
                $('#jquery_ui').attr('href',filenameServer);              
            }else if($('#changeoMstyle .selected').attr('value')=='set_header_search'){
                //wtext_101-wsubm_46-color_028541-padd_9_13_7_13.png
                $flip = 'left';
                $split_this_src = $split_this_src1.split('-');
                jQuery.each($split_this_src, function(i, e){
                    if(e.indexOf('wtext_') > -1)$input_text_width = e.replace('wtext_', '');
                    if(e.indexOf('wsubm_') > -1)$input_subm_width = e.replace('wsubm_', '');
                    if(e.indexOf('color_') > -1)  $input_text_color = e.replace('color_', '#');
                    if(e.indexOf('padd_') > -1) $search_padding = e.replace('padd_', '');
                    if(e.indexOf('flip') > -1) $flip = e?'left':'right';
                });
                $split_search_padding = $search_padding.split('_');
                var $p = [] ; 
                jQuery.each($split_search_padding, function(i,e){
                    $p.push(e);
                });
        
                Filter_CSS('font_theme_save','.search_area','background-image', ' url('+filenameServer+')');
                Filter_CSS('font_theme_save','.search_area','height', (height_i-$p[0]-$p[2])+'px');
                Filter_CSS('font_theme_save','.search_area','width', (width_i-$p[1]-$p[3])+'px');
                Filter_CSS('font_theme_save','.search_area','padding-top', $p[0]+'px');
                Filter_CSS('font_theme_save','.search_area','padding-right', $p[1]+'px');
                Filter_CSS('font_theme_save','.search_area','padding-bottom', $p[2]+'px');
                Filter_CSS('font_theme_save','.search_area','padding-left', $p[3]+'px');
                Filter_CSS('font_theme_save','.search_area','margin', ''+(40-height_i+(height_i/2))+'px 0 0');
                Filter_CSS('font_theme_save','.search_area input','height', (height_i-$p[0]-$p[2])+'px');
                Filter_CSS('font_theme_save','.search_area input','float', $flip);
                Filter_CSS('font_theme_save','.search_area #text_search','width', ($input_text_width-20)+'px');
                Filter_CSS('font_theme_save','.search_area #text_search','color', $input_text_color);
                Filter_CSS('font_theme_save','.search_area #submit_search','width', $input_subm_width+'px');
                
            }else if($('#changeoMstyle .selected').attr('value')=='set_header_menu'){
                //menubg-color_303030-padd_1_3_6_3-fsize_14-ffamy_arial.png
                $split_this_src = $split_this_src1.split('-');
                $isbackmenu = 0;
                jQuery.each($split_this_src, function(i, e){
                    if(e.indexOf('menubg') > -1)$isbackmenu = 1;
                    if(e.indexOf('ffamy_') > -1)$menu_ffamy = e.replace('wtext_', '');
                    if(e.indexOf('fsize_') > -1)$menu_fsize = e.replace('wsubm_', '');
                    if(e.indexOf('color_') > -1)  $menu_text_color = e.replace('color_', '#');
                    if(e.indexOf('colorhover_') > -1)  $menu_text_colorhover = e.replace('colorhover_', '#');
                    if(e.indexOf('padd_') > -1) $menu_padding = e.replace('padd_', '');
                });
                if($isbackmenu==1){
                    $split_menu_padding = $menu_padding.split('_');
                    var $p = [] ; 
                    jQuery.each($split_menu_padding, function(i,e){
                        $p.push(e);
                    });
                
                
                    Filter_CSS('font_theme_save','.container_menu','background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.container_menu','height', height_i+'px');
                    Filter_CSS('font_theme_save','.container_menu','width', width_i+'px');  
                    Filter_CSS('font_theme_save','.container_menu ul li a','color', $menu_text_color);
                    //Filter_CSS('font_theme_save','.container_menu ul li a:hover','color', $menu_text_colorhover);
                    Filter_CSS('font_theme_save','.container_menu ul li a','font-size', parseInt($menu_fsize)+'px');
                    Filter_CSS('font_theme_save','.container_menu ul li a','font-family', $menu_ffamy);
                    Filter_CSS('font_theme_save','.container_menu ul','padding-top', $p[0]+'px');
                    Filter_CSS('font_theme_save','.container_menu ul','padding-right', $p[1]+'px');
                    Filter_CSS('font_theme_save','.container_menu ul','padding-bottom', $p[2]+'px');
                    Filter_CSS('font_theme_save','.container_menu ul','padding-left', $p[3]+'px');
                }else if($split_this_src1=='menuhover'){
                    Filter_CSS('font_theme_save','.container_menu ul li.back','top', '0px');
                    Filter_CSS('font_theme_save','.container_menu ul li.back .left','background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.container_menu ul li.back .left','height', parseInt((height_i/2))+'px');
                    Filter_CSS('font_theme_save','.container_menu ul li.back','background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.container_menu ul li.back','height', parseInt(height_i/2)+'px');                    
                }
            /***************************************************************************
        Filter_CSS('font_theme_save','.container_menu','background-image', 'url('+$menu_bkg_ct+')');
        Filter_CSS('font_theme_save','.container_menu','height', $menu_height+'px');
        Filter_CSS('font_theme_save','.container_menu','width', $menu_width+'px');
        Filter_CSS('font_theme_save','.container_menu ul ul','top', (($line_height/2)+20)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','line-height', $line_height+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','color', $font_color);
        Filter_CSS('font_theme_save','.container_menu ul li a','font-size', parseInt($font_size)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','font-family', $font_family);
        Filter_CSS('font_theme_save','.container_menu ul li.back','top', parseInt($current_top)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','background-image', $menu_bkg_current);
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','height', parseInt($current_height/2)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back','background-image', $menu_bkg_current);
        Filter_CSS('font_theme_save','.container_menu ul li.back','height', parseInt($current_height/2)+'px');
        Filter_CSS('font_theme_save','.container_menu ul ul','top', parseInt($current_height)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','margin-right', parseInt($current_margin)+'px');     
        jQuery('.container_menu ul ul').css('top', ($line_height/2)+20);
           */     
            }else if($('#changeoMstyle .selected').attr('value')=='set_slider'){     
                //slider-w_500-h_220-padd_13_25_25_10.png
                $split_this_src = $split_this_src1.split('-');
                $isbackmenu = 0;
                jQuery.each($split_this_src, function(i, e){
                    if(e.indexOf('slider') > -1)$isbackmenu = 1;
                    if(e.indexOf('w_') > -1)width_i = e.replace('w_', '');
                    if(e.indexOf('h_') > -1)height_i = e.replace('h_', '');
                    if(e.indexOf('padd_') > -1) $menu_padding = e.replace('padd_', '');
                });
                if($isbackmenu==1){
                    $split_menu_padding = $menu_padding.split('_');
                    var $p = [] ; 
                    jQuery.each($split_menu_padding, function(i,e){
                        $p.push(e);
                    });
                    Filter_CSS('font_theme_save','.slider_area','background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.slider_area','height', height_i+'px');
                    Filter_CSS('font_theme_save','.slider_area','width', width_i+'px');  
                    
                    Filter_CSS('font_theme_save','.slider_area','padding-top', $p[0]+'px');
                    Filter_CSS('font_theme_save','.slider_area','padding-right', $p[1]+'px');
                    Filter_CSS('font_theme_save','.slider_area','padding-bottom', $p[2]+'px');
                    Filter_CSS('font_theme_save','.slider_area','padding-left', $p[3]+'px');
                    
                }                                              
                
            }else if($('#changeoMstyle .selected').attr('value')=='set_blog_boxes'){

                $element_parent = $("#changeoMstyle .selected").attr("fork");
                $split_boxs = $split_this_src1.split('_');
                
                if($split_boxs[1]=='tk'){     
                    var xtkheight =$('.width_boxes_'+$element_parent+' .post_topbottom').css('height');
                    //Filter_CSS('font_theme_save','.width_boxes_'+$element_parent,'margin-bottom', height_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'height', height_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'top', xtkheight);
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'background-image', ' url('+filenameServer+')');
                }else if($split_boxs[1]=='cr'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'background-image', ' url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'height', (height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'width', (width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_left', 'bottom',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_left', 'left',  '-' +(width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_right', 'bottom',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_right', 'right',  '-' +(width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_right', 'top',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_right', 'right',  '-' +(width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_left', 'top',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_left', 'left',  '-' +(width_i/2)+'px');
                }else if($split_boxs[1]=='tb'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_topbottom', 'background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_center', 'top',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_center', 'bottom',  '-' +(height_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_topbottom', 'height',  (height_i/2)+'px');
                }else if($split_boxs[1]=='ss'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_sides', 'background-image', 'url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_sides', 'width', (width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_middle_left', 'left',  '-' +(width_i/2)+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_middle_right', 'right',  '-' +(width_i/2)+'px');
                }else if($split_boxs[1]=='cb'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .container_posts_pieces', 'background-image', 'url('+filenameServer+')');  
                }else if($split_boxs[1]=='r'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right', 'background-image', ' url('+filenameServer+')');  
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right', 'height', height_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right', 'width', width_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right', 'display', 'block');
                    
                }else if($split_boxs[1]=='l'){
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'background-image', ' url('+filenameServer+')');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'height', height_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'width', width_i+'px');
                    Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'display', 'block');
                }              
       
            }
            $("#"+idx).find(".qq-upload-button input").attr("style" , 'opacity: 0;overflow: hidden; position: relative; width: 50px; height: 50px;');
        },
        onCancel: function(id, fileName){
            jQuery('.too_image_preloader').fadeOut('fast');
        }
    });
    $("#"+idx).find(".qq-upload-button input").attr("style" , 'opacity: 0;overflow: hidden; position: relative; width: 50px; height: 50px;');
}


jQuery(window).load(function(){
    jQuery('img.lazy').asynchImageLoader({
        callback : function(){
            jQuery('ul.get_thumb_list li a img').each(function(){
                jQuery(this).load(function(){
                    jQuery(this).parent('a').css('background-image', 'none');
                });
            });
 			
        }
    });
    $(".switcher li").bind("click",function(){				
        var act = $(this);		
        $(act).parent().children('li').removeClass("active").end();
        $(act).addClass("active");		
    });
    $('.addimageuploader').each(function(){    
        createUploader_theme($(this).attr('id'));
    });
      
});



$(function(){

    /*header and footer height*/
    $( "#header-slider-range" ).slider({
        range: "max",
        min: 1,
        max: 600,
        value: $('#header').height(),
        slide: function( event, ui ) {
            Filter_CSS('font_theme_save','#header','height',ui.value+'px' );
        }
    });
    $( "#footer-slider-range" ).slider({
        range: "max",
        min: 1,
        max: 600,
        value:  $('#footer').height(),
        slide: function( event, ui ) {
            Filter_CSS('font_theme_save','#footer','height',ui.value+'px' );
        }
    });

$('#changeoMstyle').find('.heapOption').hide();
    $('#changeoMstylex .heapOption a').click(function(){        
        $('.'+$(this).attr('value')+' .get_thumb_list #addimageuploader').remove();
        $('#changeoMstylex').find('.heapOption a').removeClass('selected');
        $(this).addClass('selected');
        
     //   $('#addimageuploader').appendTo('.'+$('#changeoMstyle .selected').attr('value')+' .get_thumb_list');
        $('.set_panel').hide();
        $('#changeoMstyle').find('.heapOption').hide();
        $('#changeoMstyle').find('a[isin="'+$(this).attr('value')+'"]').parent().show();
        $('#changeoMstyle').find('.holder').html('<span>[Select proprtis]</span>');       
        $('#changeoMstylex').find('.holder').html('<span>'+$(this).html()+'</span>');       
    });
    $('#changeoMstyle .heapOption a').click(function(){        
        $('.set_panel').hide();
        $('.'+$(this).attr('value')).show(); 
        $('#changeoMstyle').find('.holder').html('<span>'+$(this).html()+'</span>');    
        $('#changeoMstyle').find('.heapOption a').removeClass('selected');
        $(this).addClass('selected');
        if($(this).attr('value')=='set_font_style'){
            var fork=$(this).attr("fork");
            $("#changefontstyle").attr('value',fork);
            changefontstyle(fork);
        }else{
            if($.trim($('.'+$(this).attr('value') + ' .get_thumb_list').text())=='ready'){
                $('.'+$(this).attr('value') + ' .get_thumb_list').html('[Loading]').load(SITE_LINK +'?getelementstyle='+$('.'+$(this).attr('value') + ' .get_thumb_list').attr('elemento'),function(){
                    jQuery('img.lazy').asynchImageLoader({
                        event : 'load',
                        callback : function(){
                            jQuery('ul.get_thumb_list li a img').each(function(){
                                jQuery(this).load(function(){
                                    jQuery(this).parent('a').css('background-image', 'none');
                                });
                            });
 			
                        } 
                    });
                });            
            } 
        }
    });
    
    // Set Shines //
    jQuery('.set_header_shines ul li a').live("click",function(){
        $header_shine = jQuery('img', this).attr('src');
        $header_shine_bkg = $header_shine.replace(/\_thumb(.*?)png/g, ".png");
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.header_shine','background-image', 'none');            
        }else{
            Filter_CSS('font_theme_save','.header_shine','background-image',' url('+$header_shine_bkg+')');
        }
        too_image_preloader($header_shine_bkg);
    });
        
    // Search Box background-image
    jQuery('.set_header_search ul li a').live("click",function(){
        $search_width = jQuery(this).attr('data-header-search-width');
        $search_height = jQuery(this).attr('data-header-search-height');
        $search_margin = 40-$search_height+($search_height/2);
        $this_src = jQuery('img', this).attr('src');
        $flip = null;
        $split_this_src = $this_src.split('-');
        jQuery.each($split_this_src, function(i, e){
            //$arr = ['wtext_', 'wsubm_', 'color_', 'padd_'];
            if(e.indexOf('wtext_') > -1){
                $input_text_width = e.replace('wtext_', ''); /*alert($input_text_width)*/
            };
            if(e.indexOf('wsubm_') > -1){
                $input_subm_width = e.replace('wsubm_', ''); /*alert($input_subm_width)*/
            };
            if(e.indexOf('color_') > -1){
                $input_text_color = e.replace('color_', '#'); /*alert($input_text_color)*/
            };
            if(e.indexOf('padd_') > -1){
                $search_padding = e.replace('padd_', '').replace('.png', ''); /*alert($search_padding)*/
            };
            if(e.indexOf('flip') > -1){
                $flip = e?'flip':null;
            };
        });
        $this_src_ct = $this_src.replace(/\_thumb(.*?)png/g, ".png");
        $split_search_padding = $search_padding.split('_');
        var $p = [];
        jQuery.each($split_search_padding, function(i,e){
            $p.push(e);
        });
        $p[3] = $p[3].replace('.png', '');
        Filter_CSS('font_theme_save','.search_area','background-image', ' url('+$this_src_ct+')');
        Filter_CSS('font_theme_save','.search_area','height', ($search_height-$p[0]-$p[2])+'px');
        Filter_CSS('font_theme_save','.search_area','width', ($search_width-$p[1]-$p[3])+'px');
        Filter_CSS('font_theme_save','.search_area','padding-top', $p[0]+'px');
        Filter_CSS('font_theme_save','.search_area','padding-right', $p[1]+'px');
        Filter_CSS('font_theme_save','.search_area','padding-bottom', $p[2]+'px');
        Filter_CSS('font_theme_save','.search_area','padding-left', $p[3]+'px');
        Filter_CSS('font_theme_save','.search_area','margin', ''+$search_margin+'px 0 0');
        switch($flip){
            case 'flip':
                Filter_CSS('font_theme_save','.search_area input','height', ($search_height-$p[0]-$p[2])+'px');
                Filter_CSS('font_theme_save','.search_area input','float', 'right');
                break;
            case null:
                Filter_CSS('font_theme_save','.search_area input','height',($search_height-$p[0]-$p[2])+'px');
                Filter_CSS('font_theme_save','.search_area input','float', 'left');
                break;
        };

        Filter_CSS('font_theme_save','.search_area #text_search','width', $input_text_width+'px');
        Filter_CSS('font_theme_save','.search_area #text_search','color', $input_text_color);
        Filter_CSS('font_theme_save','.search_area #submit_search','width', $input_subm_width+'px');
        too_image_preloader($this_src_ct);
    });
	
    // Socials
    jQuery('.set_header_socials ul li a').live("click",function(){
        $header_social_width = jQuery(this).attr('data-header-social-width');
        $header_social_height = jQuery(this).attr('data-header-social-height');
        $header_social_bkg = jQuery('img', this).attr('src');
        $header_social_bkg = $header_social_bkg.replace('_thumb' ,'');
        $header_social_margin = 40-$header_social_height+($header_social_height/2);
        
        $item_each = ($header_social_width/8);
             
            
        $item_bkg_pos = 0;
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_facebook','background-position', '0 '+ 0);               
        $item_bkg_pos = ($item_each*1);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_twitter','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*2);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_rss','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*3);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_mail','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*4);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_plus','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*5);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_linkedin','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*6);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_rssmail','background-position', '-'+$item_bkg_pos+'px '+ 0);
        $item_bkg_pos = ($item_each*7);
        Filter_CSS('font_theme_save','ul.icon_socials li.ic_skype','background-position', '-'+$item_bkg_pos+'px '+ 0);
            

             
        Filter_CSS('font_theme_save','ul.icon_socials li', 'background-image','url('+$header_social_bkg+')');
        Filter_CSS('font_theme_save','ul.icon_socials li','height',$header_social_height+'px');
        Filter_CSS('font_theme_save','ul.icon_socials li','width',$item_each+'px');
        too_image_preloader($header_social_bkg);
    });
        
    // Menu
    jQuery.fn.menu = function(element) {
        $menu_width = jQuery(element).attr('data-header-menu-width');
        $menu_middle_width = ($menu_width/2);
        $menu_height = jQuery(element).attr('data-header-menu-height');
        $font_color = jQuery(element).attr('data-font_color');
        $line_height = jQuery(element).attr('data-line_height');
        $font_size = jQuery(element).attr('data-font_size');
        $current_margin = jQuery(element).attr('data-current_margin');
        $current_top = jQuery(element).attr('data-current_top');
        $current_height = jQuery(element).attr('data-current_height');
        $font_family = jQuery(element).attr('data-font_family');
        $hover_menu = jQuery(element).attr('data-hover_menu');
        $menu_bkg = jQuery('img', element).attr('src');
        if(jQuery(element).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.container_menu','background', 'none');         
            Filter_CSS('font_theme_save','.container_menu ul li.back','background', 'none');         
            Filter_CSS('font_theme_save','.container_menu ul li.back .left','background', 'none');  
            return false;
        }        
        //$menu_bkg_ct = $menu_bkg.split("-");
        $menu_bkg_ct = $menu_bkg.replace(/\_thumb(.*?)png/g, ".png");
        if($hover_menu == 'true'){
            $menu_bkg_current = $menu_bkg_ct.replace('.png', '_current.png');
            $menu_bkg_current =  'url('+$menu_bkg_current+')';
        }else{
            $menu_bkg_current = 'none';
        }

        Filter_CSS('font_theme_save','.container_menu','background-image', 'url('+$menu_bkg_ct+')');
        Filter_CSS('font_theme_save','.container_menu','height', $menu_height+'px');
        Filter_CSS('font_theme_save','.container_menu','width', $menu_width+'px');
        Filter_CSS('font_theme_save','.container_menu ul ul','top', (($line_height/2)+20)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','line-height', $line_height+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','color', $font_color);
        Filter_CSS('font_theme_save','.container_menu ul li a','font-size', parseInt($font_size)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li a','font-family', $font_family);
        Filter_CSS('font_theme_save','.container_menu ul li.back','top', parseInt($current_top)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','background-image', $menu_bkg_current);
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','height', parseInt($current_height/2)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back','background-image', $menu_bkg_current);
        Filter_CSS('font_theme_save','.container_menu ul li.back','height', parseInt($current_height/2)+'px');
        Filter_CSS('font_theme_save','.container_menu ul ul','top', parseInt($current_height)+'px');
        Filter_CSS('font_theme_save','.container_menu ul li.back .left','margin-right', parseInt($current_margin)+'px');     
        jQuery('.container_menu ul ul').css('top', ($line_height/2)+20);
        too_image_preloader($menu_bkg_ct);
    };
  
    //Optional Menu
    $display_topbar = jQuery('.fullheader_menu_bar').css('display');
    if($display_topbar == 'block'){
        jQuery('.set_header_bar #menu_bar_show').addClass("active");
    }
    jQuery('#menu_bar_show').click(function(){
        jQuery('.fullheader_menu_bar').show();	
        Filter_CSS('font_theme_save','.fullheader_menu_bar','display', 'block');	
    });
    jQuery('#menu_bar_hide').click(function(){
        jQuery('.fullheader_menu_bar').hide();	
        Filter_CSS('font_theme_save','.fullheader_menu_bar','display', 'none');		
    });
    jQuery('.set_header_bar ul li a').live("click",function(){
        $menu_bar_width = jQuery(this).attr('data-menu-bar-width');
        $menu_bar_height = jQuery(this).attr('data-menu-bar-height');
        $menu_bar_bkg = jQuery('img', this).attr('src');
        $menu_bar_bkg = $menu_bar_bkg.replace('_thumb', '');
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.header_menu_bar','background-image', 'none');            
        }else{
 
            Filter_CSS('font_theme_save','.fullheader_menu_bar','height', ($menu_bar_height)+'px');	
            Filter_CSS('font_theme_save','.header_menu_bar','background-image', 'url('+$menu_bar_bkg+')');	
            Filter_CSS('font_theme_save','.header_menu_bar','height', $menu_bar_height+'px');	
        }
        too_image_preloader($menu_bar_bkg);
    });
    //set_logo
    jQuery('.set_logo ul li a').live("click",function(){
        $menu_bar_bkg = jQuery('img', this).attr('src');
        $menu_bar_bkg = $menu_bar_bkg.replace('_thumb', '');
        $menu_bar_width = jQuery(this).attr('width');
        $menu_bar_height = jQuery(this).attr('height');
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.logo img','background-image', 'none');         
        }
        jQuery('.logo img').attr('src',$menu_bar_bkg);
        Filter_CSS('font_theme_save','#site_logo','background-image', ' url('+$menu_bar_bkg+')');
        Filter_CSS('font_theme_save','#site_logo','height', $menu_bar_height+'px');	                
        Filter_CSS('font_theme_save','#site_logo','width', $menu_bar_width+'px');	                
        too_image_preloader($menu_bar_bkg);
    });
    // color
    $('.set_color td').live("click",function(){
            
        $palette_parent = $("#changeoMstyle .selected").attr("fork");  
        $palette_color = jQuery(this).css('background-color');
        $split_this_src = $palette_parent.split(',');
        jQuery.each($split_this_src, function(i, e){
            if(e.indexOf(';') > -1){
                $scound_split=e.split(';');  
                var om=$scound_split[1];
                $($scound_split[0]).animate({
                    om: $palette_color
                },500);               
                Filter_CSS('font_theme_save',$scound_split[0],$scound_split[1], $palette_color);                                            
            }else{
                $(e).animate({
                    backgroundColor: $palette_color
                },500);
                setTimeout(function(){
                    Filter_CSS('font_theme_save',e,'background-color', $palette_color);
                },500);                            
            }        
        });
    });
    // Divisor 
    $('.set_general_divisors ul li a').live("click",function(){

        $divisor_parent = $("#changeoMstyle .selected").attr("fork");              
        $divisor_width = jQuery(this).attr('data-header-divisors-width');
        $divisor_height = jQuery(this).attr('data-header-divisors-height');
        $divisor_bkg = jQuery('img', this).attr('src');
        $divisor_bkg = $divisor_bkg.replace('_thumb', '');
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save',$divisor_parent,'background-image', 'none');            
            Filter_CSS('font_theme_save',$divisor_parent,'display', 'none');            
        }else{
            Filter_CSS('font_theme_save',$divisor_parent,'background-image', ' url('+$divisor_bkg+')');
            Filter_CSS('font_theme_save',$divisor_parent,'display', 'block');
            Filter_CSS('font_theme_save',$divisor_parent,'height', $divisor_height +'px');
            Filter_CSS('font_theme_save',$divisor_parent,'bottom', (-($divisor_height/2).toFixed(0)) +'px');
        }
        too_image_preloader($divisor_bkg);
    }); 


    // jquery_ui
    $('.set_jquery_ui ul li a').live("click",function(){
        jQuery('.too_image_preloader').show();                    
        $jquery_ui_cssfile = jQuery(this).attr('css');
        $('#jquery_ui').attr('href',$jquery_ui_cssfile).load(function(){
            jQuery('.too_image_preloader').fadeOut('fast');            
        }); 
    });       
    
    


    //shadows
    jQuery.fn.shadows = function(element) {
        $shadow_parent = $("#changeoMstyle .selected").attr("fork"); 
        $this_src = jQuery('img', element).attr('src');
        if($this_src.indexOf('repeat')){}
        $shadow_bkg = $this_src.replace(/\_thumb(.*?)png/g, ".png");
        $shadow_height = jQuery(element).attr('data-header-divisors-height');
        $data_repeat = jQuery(element).attr('data-repeat');
        if($(element).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','background-image', ' none'); 
            return false;
        }else{
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','display', 'block');
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','background-image', ' url('+$shadow_bkg+')');
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','height', $shadow_height +'px');
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','bottom', $shadow_height+'px');
            Filter_CSS('font_theme_save','body .'+$shadow_parent.toLowerCase()+'_shadow','background-repeat', $data_repeat);
        }
        too_image_preloader($shadow_bkg);
        return false;
    };	

    // Patterns //
    jQuery.fn.pattern = function(element) {

        $element_parent = $("#changeoMstyle .selected").attr("fork"); 
		
        $this_parents_div = jQuery('.'+$element_parent.toLowerCase()+'_pattern').parent('div').attr('class');
        $path_pattern = jQuery('img', element).attr('src');
        $path_pattern = $path_pattern.replace('_thumb', '');

        if($(element).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','body .'+$element_parent.toLowerCase()+'_pattern','background-image', 'none');    
            return false;
        }else{    
            Filter_CSS('font_theme_save','body .'+$element_parent.toLowerCase()+'_pattern','display', 'block');
            Filter_CSS('font_theme_save','body .'+$element_parent.toLowerCase()+'_pattern','background-image', ' url('+$path_pattern+')');
        }
        too_image_preloader($path_pattern);
        return false;			 
    };

    // Set clipart bkg //	
    jQuery.fn.clipart = function(element) {
        $header_bkgimage = jQuery('img', element).attr('src');
        jQuery('img[src*="top"]', element).addClass('pos_bkgtop');
        $position_bkg = jQuery('img', element).hasClass("pos_bkgtop");        

        $bkg_position = 'center bottom';
        $header_bkgimage_real = $header_bkgimage.replace(/\_thumb(.*?)png/g, ".png");
        if($(element).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.clipart','background-image', 'none');       
            return false;
        }else{    
            Filter_CSS('font_theme_save','.clipart','background-image', ' url('+$header_bkgimage_real+')');
            Filter_CSS('font_theme_save','.clipart','background-position', $bkg_position);
        }
        too_image_preloader($header_bkgimage_real);
        return false;
    };
        
    //Blog Box	
    jQuery('.set_blog_boxes ul li a').live("click",function(e){
        $element_parent = $("#changeoMstyle .selected").attr("fork");
        $data_token_right = jQuery(this).attr('data-token_right');
        $data_token_left = jQuery(this).attr('data-token_left');
        $data_token_bottom_post = jQuery(this).attr('data-token_bottom_post');
        $data_size_height = jQuery(this).attr('data-size_height');
        $post_thumb = jQuery('img', this).attr('src');
        $boxes_corner_bkg = $post_thumb.replace('_thumb', '_cr');
        $boxes_sides_bkg = $post_thumb.replace('_thumb', '_ss');
        $boxes_topbottom_bkg = $post_thumb.replace('_thumb', '_tb');
        $boxes_center_bkg = $post_thumb.replace('_thumb', '_ct');
        $boxes_token_right_bkg = $post_thumb.replace('_thumb', '_token_right');
        
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left','display', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right','display', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_sides','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_topbottom','background-image', 'none');         
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .container_posts_pieces','background-image', 'none');  
            return false;
        }
        
        if($data_token_right == 'true'){
            $data_token_right = 'url('+$post_thumb.replace('_thumb', '_token_right')+')';
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right','display', 'block');         
        }else{
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right','display', 'none');  
        }
        if($data_token_left == 'true'){
            $data_token_left = 'url('+$post_thumb.replace('_thumb', '_token_left')+')';
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left','display', 'block');  
        }else{
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left','display', 'none');  
        }
        if($data_token_bottom_post == 'true'){
            $data_token_bottom_post = 'url('+$post_thumb.replace('_thumb', '_token_bottom-bpost')+')';
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom','display', 'block');  
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'top', '20px');
        }else{
            Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom','display', 'none');  
        }
        /*  Filter_CSS('font_theme_save','.width_boxes_'+$element_parent,'margin-bottom', '0px');*/
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'background-image', 'url('+$boxes_corner_bkg+')');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'background-image', $data_token_left);
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_right', 'background-image', $data_token_right);
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'background-image', $data_token_bottom_post);
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_bottom', 'height', $data_size_height+'px');

        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_sides', 'background-image', 'url('+$boxes_sides_bkg+')');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_topbottom', 'background-image', 'url('+$boxes_topbottom_bkg+')');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .container_posts_pieces', 'background-image', 'url('+$boxes_center_bkg+')');

        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'height', '20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_corner', 'width', '20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_left', 'bottom',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_left', 'left',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_right', 'bottom',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_right', 'right',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_right', 'top',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_right', 'right',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_left', 'top',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_left', 'left',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_top_center', 'top',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_bottom_center', 'bottom',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_topbottom', 'height', '20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_sides', 'width', '20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_middle_left', 'left',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_middle_right', 'right',  '-' +'20px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'height','70px');
        Filter_CSS('font_theme_save','.width_boxes_'+$element_parent+' .post_token_left', 'width', '40px');
                    

        too_image_preloader($boxes_corner_bkg);
    });

    //Read More
    jQuery('.set_read_more ul li a').live("click",function(e){
        $readmore_width = jQuery(this).attr('data-read_more-width');
        $readmore_middle_width = ($readmore_width/2);
        $readmore_height = jQuery(this).attr('data-read_more-height');
        $rm_color = jQuery(this).attr('data-rm_color');
        $line_height = jQuery(this).attr('data-line_height');
        $font_size = jQuery(this).attr('data-font_size');
        $readmore_bkg = jQuery('img', this).attr('src');
        $readmore_ct_bkg = $readmore_bkg.replace(/\_thumb(.*?)png/g, "_ct.png");
        $readmore_ss_bkg = $readmore_ct_bkg.replace('ct', 'ss');
        if($(this).attr('class') == 'no_item'){
            Filter_CSS('font_theme_save','.more-link','background-image', 'none');         
            Filter_CSS('font_theme_save','.more-link_left','background-image', 'none');         
            Filter_CSS('font_theme_save','.more-link_right','background-image', 'none'); 
            return false;
        }
        Filter_CSS('font_theme_save','.more-link', 'font-size', parseInt($font_size)+'px' );
        Filter_CSS('font_theme_save','.more-link','text-decoration', 'none' );
        Filter_CSS('font_theme_save','.more-link', 'padding', '0 15px');
        Filter_CSS('font_theme_save','.more-link','line-height', ''+$line_height+'px' );
        Filter_CSS('font_theme_save','.more-link',  'height', $readmore_height+'px');
        Filter_CSS('font_theme_save','.more-link',  'background-image', 'url('+$readmore_ct_bkg+')' );
        Filter_CSS('font_theme_save','.more-link','margin', '20px '+$readmore_middle_width+'px 0' );
        Filter_CSS('font_theme_save','.more-link', 'color', $rm_color );
        Filter_CSS('font_theme_save','.more-link_left', 'background-image', 'url('+$readmore_ss_bkg+')');
        Filter_CSS('font_theme_save','.more-link_left', 'width', $readmore_middle_width+'px' );
        Filter_CSS('font_theme_save','.more-link_left', 'display', 'block' );
        Filter_CSS('font_theme_save','.more-link_left', 'left', (-$readmore_middle_width)+'px' );
        Filter_CSS('font_theme_save','.more-link_right', 'background-image', 'url('+$readmore_ss_bkg+')');
        Filter_CSS('font_theme_save','.more-link_right', 'width', $readmore_middle_width+'px' );
        Filter_CSS('font_theme_save','.more-link_right', 'display', 'block' );
        Filter_CSS('font_theme_save','.more-link_right', 'right', (-$readmore_middle_width)+'px');
 
        too_image_preloader($readmore_ss_bkg);	
    });

    //fix hr tag insert from editor
    fix_HR();
    
    
    /********************ANY NEW PLUGIN  HERE*************************************************************************************************/
    $('.set_slider ul li a').click(function(){
        $slider_frame = jQuery('img', this).attr('src');
        $slider_frame_bkg = $slider_frame.replace(/\_thumb(.*?)png/g, "_frm.png");
        $slider_arr_bkg = $slider_frame.replace(/\_thumb(.*?)png/g, "_arr.png");
        $slider_frame_width = jQuery(this).attr('data-slider-frame-width');
        $slider_frame_height = jQuery(this).attr('data-slider-frame-height');
        $slider_arrows_width = jQuery(this).attr('data-slider_arrows_width');
        $slider_arrows_height = jQuery(this).attr('data-slider_arrows_height');
        $slider_arrows_top = jQuery(this).attr('data-slider_arrows_top');
        $slider_arrows_leftright = jQuery(this).attr('data-slider_arrows_leftright');
        $slider_imgsize = $slider_frame.split('-');
        jQuery.each($slider_imgsize,function(i, e){
            if(e.indexOf('padd_') > -1){
                $slider_padd = e.replace('padd_', '').replace('.png', '')
                }
        });
        $padding = $slider_padd.split('_');
        jQuery.each($padding,function(i){});
        Filter_CSS('font_theme_save',".nivo-directionNav a, span.arrow a",'background-image', ' url('+$slider_arr_bkg+')');
        Filter_CSS('font_theme_save',".nivo-directionNav a, span.arrow a",'width', $slider_arrows_width/2+'px');
        Filter_CSS('font_theme_save',".nivo-directionNav a, span.arrow a",'height', $slider_arrows_height+'px');
        Filter_CSS('font_theme_save','.slider_area','background-image', ' url('+$slider_frame_bkg+')');
        Filter_CSS('font_theme_save','.slider_area','width', ($slider_frame_width-(parseInt($padding[0]*2)))+'px');
        Filter_CSS('font_theme_save','.slider_area','height', $slider_frame_height-parseInt($padding[1]) +'px');
        Filter_CSS('font_theme_save','.slider_area','padding', parseInt($padding[0])+'px '+parseInt($padding[1])+'px 0');
        Filter_CSS('font_theme_save',".nivo-directionNav a, div.anythingSlider .arrow", 'top' , $slider_arrows_top+'px');
        Filter_CSS('font_theme_save','.nivo-prevNav, div.anythingSlider .back','left', -$slider_arrows_leftright+'px');
        Filter_CSS('font_theme_save','.nivo-nextNav, div.anythingSlider .forward','right', -$slider_arrows_leftright+'px');

        Filter_CSS('font_theme_save','.slider_area img ','width', '900px');
        Filter_CSS('font_theme_save','.slider_area img','height', '346px');

        too_image_preloader($slider_frame_bkg);

    });    
});

function fix_HR(){
    $('#content HR').attr('style','border:0;');
}