<?php

//[row:"select * from table1 where id=1","row(id) this field = row(field1)"]
function SYNTAX_row($template) {
    $SQL_x = chk_var($template);
    $SQL_x[0] = SYNTAX_EASY($SQL_x[0]);
    $rowx = @end(getResults($SQL_x[0]));
    if(is_array($rowx)) foreach ($rowx as $k => $v)
        $SQL_x[1] = str_replace("row($k)", $v, $SQL_x[1]);
    else 
    $SQL_x[1] = preg_replace('/row\((.*)\)/', '', $SQL_x[1]);   
    return $SQL_x[1];
}