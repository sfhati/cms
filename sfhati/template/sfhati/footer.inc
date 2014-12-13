                <div class="wrapper_footer">
                    <div class="lay_base footer_pattern"></div>
                    <div class="bar_separate footer_separate"></div>
                    <div class="lay_base footer_shadow"></div>
                    <div id="footer"> 
                        <div id="object_wedget_footer_mod" class="widget_droppable" style="position: absolute;width:0px;height:0px;">                                        
                                [function:"get_widget(10)"end function]
                        </div>                
                    </div>
                </div>                                
            </div>
        </div>     
             
    
[IF:"[var:"ismobile"end var]=1","
<style>
    .navbar-inner{
        min-height: 80px !important;
    }
    .navbar .btn-navbar {
    padding: 5px 10px;
    }
   .navbar .btn-navbar .icon-bar {
width: 50px;
height: 8px;
margin-top: 11px;
   }
</style>
"end IF]
<script> 
    jQuery(document).ready(function($) {
[IF:"[var:"ismobile"end var]=1","


        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate({
            width: "100%"
        });
        $('#left1,#left2,#right1,#right2').css({
            'float':'none','width':'100%','margin':'0'
        });
        $('.wrapper_header,.wrapper_footer').slideUp('slow');
        $('#mobile_wrapper_header').slideDown('slow');
        $('*').css('font-size','30px');
        $('h1,h2,h3,h4,h5,h6').css('font-size','50px');
        
  


[ELSE]
    /**change width size for mobile browser***/
    $(window).resize(function(){
        var windowsize = $(this).width();
        if (windowsize < 600) {
        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate({
            width: "100%"
        });
        $('#left1,#left2,#right1,#right2').css({
            'float':'none','width':'100%','margin':'0'
        });
        $('.wrapper_header,.wrapper_footer').slideUp('slow');
        $('#mobile_wrapper_header').slideDown('slow');
            
        }else{
        $('.global_wrapper,.wrapper_header,.wrapper_content,.wrapper_footer').animate().removeAttr('style'); 
        $('#right1,#right2').css({
            'float':'right'
        });
        $('#left1,#left2').css({
            'float':'left'
        });
        $('#left1,#left2,#right1,#right2').removeAttr('style');
        $('.wrapper_header,.wrapper_footer').slideDown('slow');
        $('#mobile_wrapper_header').slideUp('slow');
            
        }
    });


"end IF]
});
</script>

                         [IF:"[session_var:"IDUSER_ADMIN"end session_var]","
                          <link id="theme_css" media="screen"  type="text/css" rel="stylesheet"/>
                          [include:"template/panel/cssmanagment.inc"end include] 
                        "end IF]   
</body>
</html>
