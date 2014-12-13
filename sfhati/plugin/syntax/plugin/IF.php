<?php
function SYNTAX_IF($template) {
    $mark['=']=1;
    $mark['!']=2;
    $mark['>']=3;
    $mark['<']=4;
    $IF=chk_var($template,'[ELSE]');
    $IF[0]=SYNTAX_EASY($IF[0]);
    $ifelse=explode("[[[__[ELSE]__]]]",$IF[1]);
    if( preg_match('/^.*([\=|\!|\>|\<]).*$/',$IF[0],$c)) { // "bassam=me" or "bassam!ali"
        $tmp_if=explode($c[1],$IF[0] );
        $nit=$mark[$c[1]];
        
        $var_k= SYNTAX_EASY($tmp_if[0]);
        $var_v= SYNTAX_EASY($tmp_if[1]);
    }else {
        $var_k= SYNTAX_EASY($IF[0]);
        $nit=50;
    }
    if($nit==1) {
        if($var_k==$var_v) {
            $result=$ifelse[0];
        }else {
            $result=$ifelse[1];
        }
    }elseif($nit==2) {
        if($var_k!=$var_v) {
            $result=$ifelse[0];
        }else {
            $result=$ifelse[1];
        }
    }elseif($nit==3) {
        if($var_k > $var_v) {
            $result=$ifelse[0];
        }else {
            $result=$ifelse[1];
        }
    }elseif($nit==4) {
        if($var_k < $var_v) {
            $result=$ifelse[0];
        }else {
            $result=$ifelse[1];
        }
    }else {
        if($var_k) {
            $result=$ifelse[0];
        }else {
            $result=$ifelse[1];
        }
    }
    return $result;
}



