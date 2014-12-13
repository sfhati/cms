<?php
function SYNTAX_function($template) {
    $template = SYNTAX_EASY($template);
    if ($template) {
$e= explode('(', $template);
if(function_exists($e[0]))
       @eval('$value=' . $template . ';');
    }
    return $value;
}