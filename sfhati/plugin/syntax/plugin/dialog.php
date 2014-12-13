<?php
//[dialog:"id","title","content","option","button1","button2","button.."end dialog]
/*
id     : if you want use it by click in link or button
option : like resizable , modal
button : used like > title button:action
         action: close() to close this dialog
                 any_js_function() call any js function
Example: [dialog:"delete_item","Error","Are you sure want delete all files?","modal,resizable","Yes:deleteallfile()","No:close()"end dialog]
         <span onclick="$('#delete_item').dialog('open');">Delete all files!</span>
 */
function SYNTAX_dialog($template) {
    $custom['resizable']='resizable';
    $custom['modal']='modal';
    $custom['autoopen']='autoOpen';
    $tm=time();
    $dialog=chk_var($template);
    $dialog[0]=SYNTAX_EASY($dialog[0]);
    $dialog[1]=SYNTAX_EASY($dialog[1]);
    $dialog[2]=SYNTAX_EASY($dialog[2]);
    $dialog[3]=SYNTAX_EASY($dialog[3]);
    if(!$dialog[0]) {
        $dialog[0]=substr(md5(rand(10000, 1000000)),0,8);
        $dialog[3]=$dialog[3].'autoOpen';
    }
    $dialog[3]=','.$dialog[3];
    $_dialog_box['id']=$dialog[0];


    $dialog[3]=strtolower($dialog[3]);
    
    foreach($custom as $k=>$v)
        if(strpos($dialog[3],$k))
            $_dialog_box['option'][$v]='true';
        else
            $_dialog_box['option'][$v]='false';

    foreach($dialog as $k=>$v) {
        if($k>3) {
            $x=explode(":",$v);
            if(strtolower($x[1])==strtolower("close()")) $x[1]='$( this ).dialog( "close" )';
            $_dialog_box['button'][$x[0]]=$x[1];
        }
    }
    $fld="<div id=\"$dialog[0]\" class=\"dialog_box\" title=\"$dialog[1]\"><p>$dialog[2]</p></div>";

/*Generate js code*/
    if(is_array($_dialog_box)) {            
            $dialog_option='';$dialog_button='';
            if(is_array($_dialog_box['option'])) {
                $coma='';
                foreach($_dialog_box['option'] as $opt_k => $opt_v) {
                    $dialog_option.= $coma.$opt_k.': '.$opt_v;
                    $coma=',';
                }
            }
            if(is_array($_dialog_box['button'])) {
                $coma='';
                foreach($_dialog_box['button'] as $btn_k =>$btn_v) {
                    $dialog_button.= $coma.'"'.$btn_k.'": function() {'.$btn_v.';}';
                    $coma=',';
                }
            }
            if($dialog_button) $dialog_button=",buttons: { $dialog_button }";
            $js_validate_document.='$( "#'.$_dialog_box['id'].'" ).dialog({ '.$dialog_option.$dialog_button.'});';
        }

    return  $fld.'<script>$(document).ready(function() {'.$js_validate_document.'});</script>';

}

