<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');


if ($colorcreate) {
    $changepaneltheme = $colorcreate;
    if ($colorcreate == 'red')
        $colorcreate = 'F00';
    if ($colorcreate == 'cream')
        $colorcreate = 'FFA300';
    if ($colorcreate == 'green')
        $colorcreate = '00FF5C';
    if ($colorcreate == 'light')
        $colorcreate = 'FFF';
    if ($colorcreate == 'dark')
        $colorcreate = '333';
    if ($colorcreate == 'blue')
        $colorcreate = '001FFF';
    if ($colorcreate == 'rand')
        $colorcreate = rgb2hex(mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));

    $base = new CSS_Color($colorcreate);
    $pcolor1 = $base->bg['+1'];
    $pcolor2 = $base->bg['+2'];
    $pcolor3 = $base->bg['+3'];
    $pcolor4 = $base->bg['+4'];
    $pcolor5 = $base->bg['+5'];
    $mcolor1 = $base->bg['-1'];
    $mcolor2 = $base->bg['-2'];
    $mcolor3 = $base->bg['-3'];
    $mcolor4 = $base->bg['-4'];
    $mcolor5 = $base->bg['-5'];


    foreach ($base->bg as $kk => $ck) {
        $coloroutput1.= "<a href='". SITE_LINK ."?colorcreate=$ck&v=3' class='csscolor' style='background:#$ck;color:#" . $base->fg[$kk] . "'>$kk</a>";

        $rgb = closecolor($ck, 0);
        $hexlist.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hcsscolor' style='background:#$rgb;'></a>";
        $rgb = closecolor($ck, 1);
        $hexlist.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hcsscolor' style='background:#$rgb;'></a>";
        $hexlist1.='<div class="groupdiv">';

        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$ck&v=3' class='hncsscolor' style='background:#$ck;'></a>";
        $rgb = closecolor($ck, 1, 1, 30);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";
        $rgb = closecolor($ck, 1, 2, 30);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";
        $rgb = closecolor($ck, 1, 3, 30);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";


        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$ck&v=3' class='hncsscolor' style='background:#$ck;'></a>";
        $rgb = closecolor($ck, 0, 1, 50);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";
        $rgb = closecolor($ck, 0, 2, 50);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";
        $rgb = closecolor($ck, 0, 3, 50);
        $hexlist1.= "<a href='". SITE_LINK ."?colorcreate=$rgb&v=3' class='hncsscolor' style='background:#$rgb;'></a>";
        $hexlist1.='</div>';
    }

    $coloroutput1.="  <br clear='all'/>
      $hexlist 
 <br clear='all'/>
        $hexlist1 

<style>
.csscolor {
width: 100px;
height: 100px;
float: left;
}
.groupdiv {
width: 100px;
height: 66px;
float: left;
}
.hcsscolor {
width: 50px;
height: 50px;
float: left;
}
.hncsscolor{
width: 25px;
height: 33px;
float: left;
}

.heapBox {
float:left;
margin: 35px;
width: 313px;
padding: 11px;
}
.heapBox .holder {
width: 185px;
overflow: hidden;
background: url(". TEMPLATE_LINK ."library/images/heapbox_bg.png) repeat-x;
text-indent: 39px;
border: 1px solid rgba(255, 255, 255, 0.25);
border-right: none;
height: 27px;
float: left;
}
.heapBox .handler {
width: 25px;
background: url(". TEMPLATE_LINK ."library/images/heapbox_handler_bg.png) no-repeat;
height: 27px;
border: 1px solid rgba(255, 255, 255, 0.25);
float: left;
}
#panel{width: 1100px;font-family: sans-serif;
font-size: 75%;}
</style>
";

    $htmlcode = ' 
        
  <br clear="all"/>
  
        <div id="panel" class="ui-slider-handle">
        <form>
write color hex or rand to create random color <br>#<input value="' . $colorcreate . '" name="colorcreate"/>       
<input name="v" value="3" type="hidden"/>
<input type="submit" value="Go"/>
</form>
  Lorem Ipsum is simply dummy text of the printing and <a href="#"> typesetting </a>industry. Lorem Ipsum 
  <h1>has been the industrys standard dummy</h1>
  text ever since the 1500s, <a href="#">when an unknown printer</a> took a galley of type and scrambled it to make a type specimen book. It has survived not onl      
  <h4>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h4>

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?

                <br>
                <div class="heapBox">
                    dictionary of over 200 <a href="javascript:">Latin words</a>
                    <div class="holder">those interested</div>
                    <div class="handler"></div>
                     <br clear="all"/>  
                     <br>
                   <div class="holder">exact original form</div>
                    <div class="handler"></div>
                     <br clear="all"/>  
                   <div class="holder">many variations</div>
                    <div class="handler"></div>
                     <br clear="all"/>  
                    anything embarrassing hidden in the middle of text. <a href="javascript:">All the Lorem Ipsum</a> generators on the Internet tend to repeat predefined chunks as necessary, making this the first true gen
                </div>                    
<br><br>
                 <div class="heapBox ui-slider-handle">
                    dictionary of over 200 <a href="javascript:">Latin words</a>
                    <h3>are many variations</h3>
                    anything embarrassing hidden in the middle of text. <a href="javascript:">All the Lorem Ipsum</a> generators on the Internet tend to repeat predefined chunks as necessary, making this the first true gen
                </div>                    
          <br clear="all"/>    

<h5>1914 translation by H. Rackham</h5>

But I must explain to you <a href="javascript:">how all this mistaken idea of</a> denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure<a href="javascript:"> rationally encounter consequences</a> that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?        
</div>
<br clear="all"/>
';


    $coloroutput = " 
#panel ,.tab ul.login li.right,.tab ul.login li.left,.tab ul.login li,div#color_selector
,#accn .ui-accordion-header,#accn .ui-state-active,#accn .ui-widget-header 
,#designbodywidget,#themeRoller input, #themeRoller select,#inline_themeroller,
#themeRoller .ui-tabs-selected.ui-state-active,#Urorbit_panel,.urorbitPanel,.Urorbit-button,#mini

{
    color: #$pcolor3;
    background-color: #$mcolor3;
}

#box_DX_3 .ui-slider-handle,#panel h1, #urorbit_widget h1,#Urorbit_panel,
.urorbitPanelBox:hover,.UrOrbitFixClickimg,#handDrag:hover{
    border-color: 1px solid #$pcolor5;
}
#Urorbit_panel{
    box-shadow: 4px 5px 7px #$pcolor5;
}
#box_DX_3 .ui-slider-horizontal{
   background: #$pcolor3; 
}
.boxcoption a,#panel a ,#urorbit_widget a,#accn a:link,#themeRoller a{    
   color: #$pcolor4 !important;
}
.bordercpanel{
    border:2px solid #$pcolor4 !important;
}
.colorcpanel,#panel a:hover{
color:#$pcolor5 !important;
    }
     
#panel{ 
background-image: url(".Main_Domain."uploaded/element/shines/shine_0" . rand(10, 50) . ".png) !important;
background-repeat: repeat-x;
}

.boxcoption,.heapBox,#accn .ui-widget-content,#themeRoller .ui-state-active,
#themeRoller .theme-group .theme-group-header.state-active,
#themeRoller .theme-group .theme-group-content,.buttonTheme{
    background-color: #$mcolor4 !important;
    color:#$pcolor3 !important;
}
.boxcoption a:hover,.heapBox a:hover,#accn .ui-widget-content a:hover,#themeRoller .ui-state-active a:hover,
#themeRoller .theme-group .theme-group-header.state-active a:hover,
#themeRoller .theme-group .theme-group-content a:hover,.buttonTheme a:hover{
    background-color: #$mcolor4 !important;
    color:#$pcolor3 !important;
}

#accn .ui-widget-content,#accn .ui-state-active,#accn .ui-state-active,#accn .ui-widget-header,#accn .ui-state-default{
background-image:none !important;
}
"
    ;

    if ($v) {
        echo $coloroutput1 . $htmlcode . '<style>' . $coloroutput . '</style>';
        exit();
    }

    if ($v1) {
        $filechangepaneltheme = 'panel/themes/' . $v1 . '.css';
        @unlink(TEMPLATE_PATH . get_cache('filechangepaneltheme'));
        set_cache('filechangepaneltheme', $filechangepaneltheme);
        set_cache('changepaneltheme1', '#' . $pcolor2);
        set_cache('changepaneltheme2', '#' . $mcolor4);

        filewrite (TEMPLATE_PATH . $filechangepaneltheme, $coloroutput);

        echo $coloroutput;
        exit();
    }
}
if ($_SESSION['IDUSER_ADMIN']) {
    AddPluginTemplate('themer', 'themer_logo');
    AddPluginTemplate('themer', 'themer_search');
    AddPluginTemplate('themer', 'themer_icon_socials', 1);
    AddPluginTemplate('themer', 'themer_container_menu');


    if ($sosaly) {
        $ic_facebooki = ($ic_facebook) ? 1 : 0;
        $ic_twitteri = ($ic_twitter) ? 1 : 0;
        $ic_rssi = ($ic_rss) ? 1 : 0;
        $ic_maili = ($ic_mail) ? 1 : 0;
        $ic_plusi = ($ic_plus) ? 1 : 0;
        $ic_linkedini = ($ic_linkedin) ? 1 : 0;
        $ic_rssmaili = ($ic_rssmail) ? 1 : 0;
        $ic_skypei = ($ic_skype) ? 1 : 0;
        mysql_query("UPDATE table3 SET  `string20`='$ic_facebook',
                `string21`='$ic_twitter', 
                `string22`='$ic_rss', 
                `string23`='$ic_mail', 
                `string24`='$ic_plus', 
                `string25`='$ic_linkedin', 
                `string26`='$ic_rssmail', 
                `string27`='$ic_skype' ,   
                `string40`='$ic_facebooki',
                `string41`='$ic_twitteri', 
                `string42`='$ic_rssi', 
                `string43`='$ic_maili', 
                `string44`='$ic_plusi', 
                `string45`='$ic_linkedini', 
                `string46`='$ic_rssmaili', 
                `string47`='$ic_skypei'                 
                where `md5`='plugin_show' and string1='$sosaly' limit 1");
        echo '<script>window.top.window.msgplgn(1,"' . CHNG_LANGUAGE('[done]') . ' ");</script>';
        exit();
    }
}
