<?php
function SYNTAX_EACH($template) {
    $SQL_x=chk_var($template);
    if($SQL_x[1]=="session") {  // SESSION variable
        $each_var=&$_SESSION[$SQL_x[0]];
    }else {
        global $$SQL_x[0];
        $SQL_x[2]=$SQL_x[1];
        $each_var=&$$SQL_x[0];
    }
    if(is_array($each_var))foreach($each_var as $each_key => $each_val) {
            unset($old);unset($new);
            $row_x = ($row_x == 1) ? 0 : 1;
            $t++;
            $old[]="%".$SQL_x[0].":key%";$new[]=$each_key;
            $old[]="%".$SQL_x[0].":val%";$new[]=$each_val;
            $old[]="%".$SQL_x[0].":#%";$new[]=$t;
            $old[]="%".$SQL_x[0].":%";$new[]=$row_x;
            $result.=str_replace($old, $new, $SQL_x[2]);
        }
    return $result;
}

