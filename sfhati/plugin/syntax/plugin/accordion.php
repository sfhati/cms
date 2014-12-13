<?php
//[accordion:"id","option","tab1","tab2","tab.."end accordion]
/*
id     : if you want know it
option : like fillSpace, autoHeight, navigation, collapsible
tab : used like > title->content
Example: [accordion:"accn","collapsible,fillSpace","title1->content1","title2->content2"end accordion]
 */
function SYNTAX_accordion($template) {
    $custom['fillspace']='fillSpace';
    $custom['autoheight']='autoHeight';
    $custom['navigation']='navigation';
    $custom['collapsible']='collapsible';
    $tm=time();
    $accordion=chk_var($template);
    if(!$accordion[0]) {
        $accordion[0]=substr(md5(rand(10000, 1000000)),0,8);
    }
    $_accordion_box[$accordion[0]]['id']=$accordion[0];


    $accordion[1]=strtolower($accordion[1]);
    foreach($custom as $k=>$v)
        if(strpos($accordion[1],$k)!==false)
            $_accordion_box[$accordion[0]]['option'][$v]='true';
        else
            $_accordion_box[$accordion[0]]['option'][$v]='false';
            
    foreach($accordion as $k=>$v) {
        if($k>1) {
            $x=explode("->",$v);
            $accn_html.="<h3><a href=\"javascript:\">$x[0]</a></h3><div><p>$x[1]</p></div>";
        }
    }
    $fld="<div id=\"$accordion[0]\">$accn_html</div>";

/*Generate JS code*/
    if(is_array($_accordion_box)) {
        foreach($_accordion_box as $k=>$v) {
            $accord_i++;
            if(!trim($v['id'])) $accord_id=time()."accord".$accord_i; else $accord_id=$v['id'];
            $accord_option='';
            if(is_array($v['option'])) {
                $coma='';
                foreach($v['option'] as $opt_k => $opt_v) {
                    $accord_option.= $coma.$opt_k.': '.$opt_v;
                    $coma=',';
                }
            }
            if($accord_button) $accord_button=",buttons: { $accord_button }";
            $js_validate_document.='$( "#'.$accord_id.'" ).accordion({ '.$accord_option.'});';
        }
    }

    return  $fld.'<script>$(document).ready(function() {'.$js_validate_document.'});</script>' ;
}


