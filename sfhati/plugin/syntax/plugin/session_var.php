<?php
$_SESSION[SYNTAX_WORD][]="var";
$_SESSION[SYNTAX_WORD][]="array";
$_SESSION[SYNTAX_WORD][]="session_array";
//$_SESSION[SYNTAX_WORD][]="help";
//$_SESSION[SYNTAX_WORD][]="MSG";


function SYNTAX_session_var($template) {
    $template=SYNTAX_EASY($template);
    $SQL_x=chk_var($template);
    if($_SESSION[$SQL_x[0]])
        return $_SESSION[$SQL_x[0]];
}
function SYNTAX_var($template) {
    $template=SYNTAX_EASY($template);
    if(isset($_REQUEST[$template]))
        return $_REQUEST[$template];

    global $$template;
    return $$template;
}
function SYNTAX_array($template) {
    $template=SYNTAX_EASY($template);
    $SQL_x=chk_var($template);
    global $$SQL_x[0];
    $ary=&$$SQL_x[0];
    return $ary[$SQL_x[1]];
}
function SYNTAX_session_array($template) {
    $template=SYNTAX_EASY($template);
    $SQL_x=chk_var($template);
    return $_SESSION[$SQL_x[0]][$SQL_x[1]];
}
?>