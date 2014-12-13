[IF:"[session_var:"IDUSER_ADMIN2"end session_var]","
<div id="opensetting" class="tooltip-[right_left]" title="[managment option for css and widget]"></div>
<div id="footerpanel" class="contentbarscroll" >
   
</div>
<div id="footerpanel2"></div>
"end IF]   

<style>
    #opensetting{
        background: url([constant:"TEMPLATE_LINK"end constant]panel/images/setting.png);
        width: 32px;
        height: 32px;
        bottom: 5px;
        z-index: 99999999999;
        position: fixed;
        
        cursor: pointer;
        opacity: 0.4;
  transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;
   [right_left]: 10px;      
    }
    #opensetting:hover{opacity: 1;}
    #footerpanel {
    background: none repeat scroll 0 0 #272727;
    border: 0px;
    border-top: 1px solid #FFFFFF;
    color: #999999;
    overflow: auto;
    position: fixed;
    width: 100%;
    z-index: 999;
    bottom: 0px;
    height: 200px;
    display: none;
}
    #footerpanel2 {
    overflow: hidden;
    position: relative;
    width: 100%;
    z-index: 1;
    bottom: 0px;
    height: 200px;
    display: none;
}
.screencss{
    height: 20px;
    color:#aaa;
}    
.screencss:hover{
    background: #aaa;
    color:#333;
}    
</style>

<script>
$(function(){
    var isopensetting=0;
$('#opensetting').click(function(){
    $('#footerpanel,#footerpanel2').slideToggle("fast");
    if(!isopensetting){
    $.ajax( "[constant:"SITE_LINK"end constant]?loadlinkcsssetting=1" )
  .done(function(data) {    
    $("#css_compressionall").before(data);
  })    
       $('#footerpanel').text('Loading').load('[constant:"SITE_LINK"end constant]?loadopensetting=1',function(){ 
           
          $('header').append() 
          $('#css_compressionall').removeAttr('href');
          isopensetting=1;
       }); 
    }
});
$('.screencss').live("click",function(){
$('#'+$(this).attr('idfor')).removeAttr('href');
$(this).append('#'+$(this).attr('idfor')+'[x]');
});


/*    $("#footerpanel").text('dddd');
    
        $(window).scroll(function () {
            
        
        var x= $(window).scrollTop();
        $("#footerpanel").css({
            "bottom": x+"px"
        }).text(x+' | '+$(this).height());
    });
*/
    
});
</script>