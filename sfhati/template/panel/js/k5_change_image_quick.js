function createUploader_x(idx,dou){
    var oldt=$("#"+idx).text();
    var uploader = new qq.FileUploader({
        element: document.getElementById(idx),
        action: SITE_LINK +'?idxx='+idx+'&id='+$('#id_thispage').val(),
        params: {
            do_upload: '1'
        },
        allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
        sizeLimit: 1000000,
        debug: false,
        onSubmit: function(id, fileName){jQuery('.too_image_preloader').show();},
        onProgress: function(id, fileName, loaded, total){
            var x= parseInt((loaded / total )*100) +" % ";
            $("#result_theme_panel").text("Uploading "+ x);
        },
        onComplete: function(id, fileName, responseJSON){
            jQuery('.too_image_preloader').fadeOut('fast');
            var filenameServer = responseJSON['filename'];
            var xd=$("#"+idx).attr("md");
            if($("#"+xd).length==0){
                $("#DIVgroupCSS").append("<style id='"+xd+"'></style>");
            }
            var csstag =  "#"+dou;
            var oldcss = $("#"+xd).text();
            var csstn="#"+dou+"{background-image:url("+ SITE_LINK +"template/sfhati/images/"+filenameServer+");}";
            csstag=csstag.replace (/\./g, '\\.') ;
            csstag=csstag.replace (/\#/g, '\\#') ;
            var re= new RegExp (csstag+"{background-image:[a-zA-Z0-9-_:#.()/ ]+;}" , "\g");
            oldcss=oldcss.replace(re,'');
            if(idx!=dou){
                oldcss = oldcss+" "+csstn;
                csstn="#"+dou+"{height:"+responseJSON['height']+"px;}";
                csstag=csstag.replace (/\./g, '\\.') ;
                csstag=csstag.replace (/\#/g, '\\#') ;
                re= new RegExp (csstag+"{height:[a-zA-Z0-9-_:#.()/ ]+;}" , "\g");
                oldcss=oldcss.replace(re,'');
            }
            $("#"+xd).text(oldcss+" "+csstn);            
            $("#CSS_theme_save").val(oldcss+" "+csstn);
            $("#CSS_theme_val").val(xd);
            $("#save_font_form").submit();
            $("#"+idx+' input').css('position' , 'absolute');
            $('.siteiconchnger input').css('position' , 'static');
        },
        onCancel: function(id, fileName){jQuery('.too_image_preloader').fadeOut('fast');}
    });
    $("#"+idx).find(".qq-upload-button").append('<span class="icon icon_upload"></span>'+oldt);
    $(".qq-upload-list").hide();
    $("#"+idx+' input').css('position' , 'absolute');
    $('.siteiconchnger input').css('position' , 'static');
    
}

function createUploader_zip(idx){
    var oldt=$("#"+idx).text();
    var uploader = new qq.FileUploader({
        element: document.getElementById(idx),
        action: SITE_LINK +'?idxx='+idx,
        params: {
            do_upload: '1'
        },
        allowedExtensions: ['zip'],
        sizeLimit: 3000000,
        debug: false,        
        onProgress: function(id, fileName, loaded, total){
            jQuery('.too_image_preloader').show();
            var x= parseInt((loaded / total )*100) +" % ";
            $("#result_theme_panel").text("Uploading "+ x);
        },
        onComplete: function(id, fileName, responseJSON){
            jQuery('.too_image_preloader').fadeOut('fast');
        }

    });
    $("#"+idx).find(".qq-upload-button").append('<span class="icon icon_upload"></span>'+oldt);
}



function createUploader_template(idx){
    var uploader = new qq.FileUploader({
        element: document.getElementById(idx),
        action: SITE_LINK +'?sfhatieditortemp='+$("#otheroptionbutton").attr('rel'),
         allowedExtensions: ['inc'],
        sizeLimit: 300000000,
        debug: false,        
        onProgress: function(id, fileName, loaded, total){
            jQuery('.too_image_preloader').show();
            var x= parseInt((loaded / total )*100) +" % ";
            $("#result_theme_panel").text("Uploading "+ x);
        },
        onComplete: function(id, fileName, responseJSON){
            jQuery('.too_image_preloader').fadeOut('fast');   
             createUploader_template(idx);
        }

    });
 
    $(".qq-upload-list").hide();
    $("#"+idx+' input').css('position' , 'static');
    $("#"+idx).css('background' , 'url("'+ SITE_LINK +'template/panel/images/templtadd.png")');
    $("#"+idx).css('width' , '20px');
    $("#"+idx).css('height' , '25px');
    $("#"+idx).css('margin-left' , '5px');
   
  //  $('.siteiconchnger input').css('position' , '');

}


/*for drop image in herader to change it*/
/*function createDropZone(selector){
    var element = $(selector)[0];

    new qq.UploadDropZone({
        element: element,
        onEnter: function(){
            $(element).css('background', 'green');
        },
        onLeave: function(){
            $(element).css('background', 'black');
        },
        onLeaveNotDescendants: function(){
            $(element).css('background', 'gray');
        },
        onDrop: function(e){
            $(element).css('background', 'red');
        }
    });
}
*/

$(function(){
    /*
    where we can drop image
    createDropZone('#header');
    createDropZone('#footer');
    createDropZone('#bg');
    createDropZone('#container');
    */
    $('.addimg').each(function(){
        createUploader_gallery($(this).attr('id'));
    });  

    createUploader_x('Background_pic_img_css','bg');
    createUploader_x('Header_pic_img_css','header');
    createUploader_x('Footer_pic_img_css','footer');
    createUploader_x('siteiconchnger','siteiconchnger');
    createUploader_x('pageimagechanger');
    
  //  createUploader_x('generate_css_efitor','generate_css_efitor');
    createUploader_template('createUploader_template'); 
//    createUploader_zip('ui_jquery_zip_css');
});