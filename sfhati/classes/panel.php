<?php

function getallpagesandtemplatefromwidget($id, $s = 1) {
    $cx_I_T1 = mysql_fetch_array(mysql_query("select * from table3 where string1=$id limit 1"));
    if ($s) {
        $cx_I_T2 = explode('-', $cx_I_T1[string4]);
        if ($cx_I_T1[string7] == 'i') {
            $return.='[this widget show in pages]<br>';

            foreach ($cx_I_T2 as $c) {
                if ($c) {
                    $return.="<a class='ahoverm' href='javascript:void(0)' onclick='$(this).load(\"". SITE_LINK ."?update_widget=$id&fildk[]=string4r&fildv[]=i_$c\");'><span class='ui-icon ui-icon-closethick iconpos'></span> " . getnamepage($c) . " : $c </a>";
                }
            }
        } else if ($cx_I_T1[string7] == 't') {
            $return.='[this widget show in template]<br>';
            foreach ($cx_I_T2 as $c) {
                if ($c) {
                    $return.="<a class='ahoverm' href='javascript:void(0)' onclick='$(this).load(\"". SITE_LINK ."?update_widget=$id&fildk[]=string4r&fildv[]=i_$c\");'><span class='ui-icon ui-icon-closethick iconpos'></span>  [$c] </a>";
                }
            }
        } else {
            $return.='[this widget show in all]';
        }
    } else {
        $cx_I_T2 = explode('-', $cx_I_T1[string8]);

        foreach ($cx_I_T2 as $c) {
            if ($c) {
                $return.="<a class='ahoverm' href='javascript:void(0)' onclick='$(this).load(\"". SITE_LINK ."?update_widget=$id&fildk[]=string4rm&fildv[]=i_$c\");'><span class='ui-icon ui-icon-closethick iconpos'></span> " . getnamepage($c) . " : $c </a>";
            }
        }
    }
    return $return;
}

function openwebpage($url) {
    $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    $header = file_get_contents($url, false, $context);
    return $header;
//filewrite($file, $content)
}

function openpluginfile($FilePath, $StsticDynamic, $cacheTime = 0, $vars = array(), $ajax = 0) {    
    foreach ($vars as $k => $v) {
        $k = str_replace('.inc', '_inc', $k);
        global $$k;
        $$k = $v;
    }
    //echo $k.' | '.$$k.'<br>';
    if ($StsticDynamic) {
        $requset_var = md5($FilePath . serialize($vars)) . $_SESSION['USER_ID'];
    } else {
        $requset_var = md5($FilePath . serialize($_GET) . serialize($vars)) . $_SESSION['USER_ID'];
    }
    $cachefile = CACHE_PATH . 'cachePlugin_' . $requset_var;
    $ajaxfile = CACHE_PATH . 'cachePlugin_' . $requset_var;

    if (file_exists($cachefile) && !IS_POST) {
        if ((time() - $_SESSION['CachePluginTime' . $cacheTime]) < filemtime($cachefile)) { // cache time plugin  
            if ($ajax)
                return $ajaxfile;
            return file_get_contents($cachefile);
        }
    }

    if (file_exists(TEMPLATE_PATH . 'templates/' . $FilePath)) {
        $t = Syntax_cache(file_get_contents(TEMPLATE_PATH . 'templates/' . $FilePath), time() . $requset_var);
    } else {
        $t = 'Error : File Widget Not Found!';
    }

     if (!IS_POST)
        filewrite($cachefile, $t);
    if ($ajax)
        return $ajaxfile;
    return $t;
}


function get_widget($AHF = 0) {
    global $THIS__result_index;     
    $template = $THIS__result_index[template];
    $id = filter_vars($_GET[id]);

    if ($AHF == 9) {
        $all_side[9] = 'header';
    } else if ($AHF == 10) {
        $all_side[10] = 'footer';
    } else {
        $all_side[1] = 'top1';
        $all_side[2] = 'top2';
        $all_side[3] = 'left1';
        $all_side[4] = 'left2';
        $all_side[5] = 'right1';
        $all_side[6] = 'right2';
        $all_side[7] = 'down1';
        $all_side[8] = 'down2';
    }
    foreach ($all_side as $k => $v) {
        if ($k == 1 || $k == 2 || $k == 7 || $k == 8)
            $brclearallx = ''; else
            $brclearallx = '';
        if ($_SESSION['IDUSER_ADMIN']) {
            if (get_cache('side_view_' . $v . '_' . $id) == 'true') {
                $display = 'style=""';
                $load_content = 1;
            } else {
                $display = 'style="display: none;"';
                $load_content = 0;
            }
            if ($k != 9 && $k != 10)
                $r.="<div $display sidename=\"$k\"  id=\"$v\" class=\"sidebar_" . substr($v, 0, -1) . " sortable\"><span class='nothingno'>.</span>";
            $memp = mysql_query("select * from table3 where md5='plugin_show'  and number6='0' and number1=$k $_SESSION[memarea_widget] ORDER BY `number2` ASC");
            while ($row = @mysql_fetch_array($memp, MYSQL_BOTH)) {
                if (strpos($row['string4'], "-$template-") !== false || $row['string4'] == '' || strpos($row['string4'], "-$id-") !== false) {
                    $display = ' square="' . $row['string4'] . '"';
                    $load_content = 1;
                } else {
                    $display = 'style="display: none;" canvis="yes" square="' . $row['string4'] . '"';
                    $load_content = 0;
                }
                if (strpos($row['string8'], "-$id-") !== false) {
                    $display = 'style="display: none;" canvis="yes" square="' . $row['string4'] . '"';
                    $load_content = 0;
                }

                if ($load_content) {
                    if ($row[number7]) {
                        $ajaxcnt = openpluginfile($row[string2], $row[number8], $row[number9], array($row[string2] => $row[string1]), $row[number7]);
                        $ajaxul = "ajaxload=\"$ajaxcnt\"";
                        $ajaxcls = " ajaxloadwid";
                        $load_content = '';
                    } else {
                        $ajaxcnt = openpluginfile($row[string2], $row[number8], $row[number9], array($row[string2] => $row[string1]), $row[number7]);
                        $load_content = $ajaxcnt;
                        $ajaxul = "";
                        $ajaxcls = "";
                        $ajaxcnt = '';
                    }
                } else {
                    $load_content = "<img src='".PLUGIN_LINK."plugin_manager/thumb.jpg' alt='$row[string2]=$row[string1]' title='$row[string2]=$row[string1]' style='width:25px;height:25px' />";
                    $displayHF = 'style="display: none;" canvis="yes"';
                    $ajaxul = '';
                    $ajaxcls = '';
                }
                if (!$row[string3])
                    $row[string3] = '---';
                if($row[number5]) $disptokn=''; else $disptokn='style="display:none"';
                if ($k != 9 && $k != 10)
                    $r.= "                
                <div $display class=\"rightclick boxes width_boxes_$row[number5] tooltip-up\" tooltip=\"[Right click to show menu option]\" id=\"widget_$row[string1]\" inb=\"$row[string1]\" plg=\"$row[string5]\" sidein=\"side_$row[number1]\" showin=\"showin_$row[string7]\" boxwidth=\"boxwidth_$row[number5]\" loadoption=\"loadoption_$row[number9]\" withbox=\"$row[number3]\" withdynamic_static=\"$row[number8]\"  withajax=\"$row[number7]\" withtitle=\"$row[bool1]\" powerin=\"powerin_$row[number4]\"  tmpltcode=\"$row[string2]\">
                <div class=\"container_posts_pieces\" >
                    <div class=\"post_corner post_top_left\"><div class=\"post_token_left\" ></div></div>
                    <div class=\"post_topbottom post_top_center\"></div>
                    <div class=\"post_corner post_top_right\"><div class=\"post_token_right\"></div></div>
                    <div class=\"post_sides post_middle_left\"></div>
                    <div class=\"post_center post_content\">
                        <div class=\"head_post\" [IF:\"$row[bool1]\",\"[ELSE]style='display:none'\"end IF]>
                             <h2 widt=\"$row[string1]\" oldtitle=\"$row[string3]\" class=\"post_title\">$row[string3]</h2>
                        </div><!-- head_post -->
                        <div $ajaxul style=\"min-height: 20px\" class=\"entry_post  {$ajaxcls}\">
                            $load_content                               
                        </div><!-- end entry -->                                    
                    </div>  
                    <div class=\"post_sides post_middle_right\"></div>
                    <div class=\"post_corner post_bottom_left\"></div>
                    <div class=\"post_topbottom post_bottom_center\"></div>
                    <div class=\"post_corner post_bottom_right\"></div>
                </div><!-- end container_posts_pieces -->
                <div class=\"post_token_bottom\" $disptokn></div>
            </div>";
                if ($k == 9 || $k == 10) {
                    if ($k == 10)
                        $tooltipdf = 'up'; else
                        $tooltipdf = 'down';
                    $HH.="
        <div $displayHF class=\"fixdrag\">
        <div  $ajaxul ismove=\"true\" style=\"position: relative;\" id=\"widget_$row[string1]\" inb=\"$row[string1]\" plg=\"$row[string5]\" class=\"movement rightclick tooltip-{$tooltipdf}{$ajaxcls}\" tooltip=\"[Right click to show menu option]\" withajax=\"$row[number7]\" showin=\"showin_$row[string7]\" loadoption=\"loadoption_$row[number9]\" powerin=\"powerin_$row[number4]\"  withdynamic_static=\"$row[number8]\" tmpltcode=\"$row[string2]\">
        $load_content
        </div>       
        </div>
        ";
                }
            }
            if ($k != 9 && $k != 10)
                $r.="</div>$brclearallx";
        } else {
            if (get_cache('side_view_' . $v . '_' . $id) == 'true' || $k == 9 || $k == 10) {
                if ($k != 9 && $k != 10)
                    $r.="<div id=\"$v\" class=\"sidebar_" . substr($v, 0, -1) . "\">";
                $memp = getResults("select * from table3 where md5='plugin_show' and number6='0' and string8 not like '%-$id-%' and number1=$k $_SESSION[memarea_widget] and (string4='' or string4 like '%-$template-%' or string4 like '%-$id-%') ORDER BY `number2` ASC");
                if (is_array($memp))
                    foreach ($memp as $row) {
                        $ajaxcnt = openpluginfile($row[string2], $row[number8], $row[number9], array($row[string2] => $row[string1]), $row[number7]);

                        if ($row[number7]) { //load ajax
                            $ajaxul = "ajaxload=\"$ajaxcnt\"";
                            $ajaxcnt = "";
                            $ajaxcls = " ajaxloadwid";
                        } else {

                            $ajaxul = "";
                            $ajaxcls = "";
                        }
                        
                        if ($k != 9 && $k != 10){
if($row[number5]){ 
    $bosid1='
  <div class=\"container_posts_pieces\" >
    <div class=\"post_corner post_top_left\">
    <div class=\"post_token_left\" ></div></div>
    <div class=\"post_topbottom post_top_center\"></div>
    <div class=\"post_corner post_top_right\"><div class=\"post_token_right\"></div></div>
    <div class=\"post_sides post_middle_left\"></div>
    <div class=\"post_center post_content\">
    ';
$bosid2=' 
    </div> 
    <div class=\"post_sides post_middle_right\"></div>
    <div class=\"post_corner post_bottom_left\"></div>
    <div class=\"post_topbottom post_bottom_center\"></div>
    <div class=\"post_corner post_bottom_right\"></div>
  </div>
  <div class=\"post_token_bottom\"></div>';
}else{
    $bosid1='';
 $bosid2='';   
}                            
                            $r.= "                
                <div id=\"widget_$row[string1]\" class=\"boxes width_boxes_$row[number5]\" style='$floatx'>
                
                    $bosid1
                    
                        <div class=\"head_post\" [IF:\"$row[bool1]\",\"[ELSE]style='display:none'\"end IF]>
                             <h2 class=\"post_title\">$row[string3]</h2>
                        </div><!-- head_post -->
                        <div $ajaxul style=\"min-height: 20px\" class=\"entry_post{$ajaxcls}\"  id=\"idget_$row[string1]\">
                             $ajaxcnt                             
                        </div><!-- end entry -->                                    
                     
                    $bosid2
            </div>";
                        }else if ($k == 9 || $k == 10) {
                            $HH.="
        <div $displayHF class=\"fixdrag\">
        <div class=\"$ajaxcls\" $ajaxul style=\"position: relative;\" id=\"widget_$row[string1]\">
        $ajaxcnt
        </div>       
        </div>
        ";
                        }
                    }
                if ($k != 9 && $k != 10)
                    $r.="</div>$brclearallx";
            }
        }
    }
    if ($k == 9 || $k == 10)
        return $HH;
    else
        return $r;
}

function admin_getWidgetById($WidgetId) {

    $row = mysql_fetch_array(mysql_query("select * from table3 where md5='plugin_show'  and id='$WidgetId'"));
    if ($row[number1] == '9' || $row[number1] == '10') {
        $cssresult = mysql_fetch_array(mysql_query("select string1,string2 from table3 where string1='groupCSS_widget{$row[string1]}' and md5='CSS_GROUP'"));
        if ($row[number1] == 10)
            $tooltipdf = 'up'; else
            $tooltipdf = 'down';

        return CHNG_LANGUAGE("
        <div class=\"fixdrag\">
            <div  ismove=\"true\" style=\"position: relative;\" id=\"widget_$row[string1]\" inb=\"$row[string1]\" plg=\"$row[string5]\" class=\"movement rightclick tooltip-{$tooltipdf}\" tooltip=\"[Right click to show menu option]\" withajax=\"$row[number7]\" showin=\"showin_$row[string7]\" loadoption=\"loadoption_$row[number9]\" powerin=\"powerin_$row[number4]\"  withdynamic_static=\"$row[number8]\" tmpltcode=\"$row[string2]\">
            [Loading...]
            </div>       
        </div>
            <style id=\"$cssresult[string1]\"> $cssresult[string2] </style>
        ");
    }else {
if($row[number5]){ $bosid1='<div class=\"post_corner post_top_left\"><div class=\"post_token_left\" ></div></div>
            <div class=\"post_topbottom post_top_center\"></div>
            <div class=\"post_corner post_top_right\"><div class=\"post_token_right\"></div></div>
            <div class=\"post_sides post_middle_left\"></div>';
$bosid2=' <div class=\"post_sides post_middle_right\"></div>
            <div class=\"post_corner post_bottom_left\"></div>
            <div class=\"post_topbottom post_bottom_center\"></div>
            <div class=\"post_corner post_bottom_right\"></div>
        </div>
        <div class=\"post_token_bottom\"></div>';
}else{
    $bosid1='';
 $bosid2='</div>';   
}
$ajaxcnt = openpluginfile($row[string2], $row[number8], $row[number9], array($row[string2] => $row[string1]), $row[number7]);

return CHNG_LANGUAGE("                
        <div square=\"$row[string4]\" class=\"rightclick boxes width_boxes_$row[number5] tooltip-up\" tooltip=\"[Right click to show menu option]\" id=\"widget_$row[string1]\" inb=\"$row[string1]\" plg=\"$row[string5]\" sidein=\"side_$row[number1]\" showin=\"showin_$row[string7]\" boxwidth=\"boxwidth_$row[number5]\" loadoption=\"loadoption_$row[number9]\" withbox=\"$row[number3]\" withdynamic_static=\"$row[number8]\"  withajax=\"$row[number7]\" withtitle=\"$row[bool1]\" powerin=\"powerin_$row[number4]\"  tmpltcode=\"$row[string2]\">
        <div class=\"container_posts_pieces\" >
            $bosid1
            <div class=\"post_center post_content\">
                <div class=\"head_post\" [IF:\"$row[bool1]\",\"[ELSE]style='display:none'\"end IF]>
                        <h2 widt=\"$row[string1]\" oldtitle=\"$row[string3]\" class=\"post_title\">$row[string3]</h2>
                </div><!-- head_post -->
                <div style=\"min-height: 20px\" class=\"entry_post\">
                    $ajaxcnt                       
                </div><!-- end entry -->                                    
            </div>  
            $bosid2
    </div>");
    }
}