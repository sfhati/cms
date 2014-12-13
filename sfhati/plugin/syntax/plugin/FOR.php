<?php
function SYNTAX_FOR($template) {
    $SQL_x=chk_var($template);
    $SQL_x[1]= SYNTAX_EASY($SQL_x[1]);
    $SQL_x[2]= SYNTAX_EASY($SQL_x[2]);
    if(is_numeric($SQL_x[1]) && is_numeric($SQL_x[2])) {
        for($i=$SQL_x[1] ; $i<= $SQL_x[2]; $i++) {
            unset($old);unset($new);
            $old[]="%".$SQL_x[0]."%";$new[]=$i;
            $result.=str_replace($old, $new, $SQL_x[3]);
        }
    }
    return $result;
}


