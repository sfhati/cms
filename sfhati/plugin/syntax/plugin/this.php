<?php
function SYNTAX_this($template) {
global $THIS__result_index;
$template=SYNTAX_EASY($template);
return $THIS__result_index[$template];
}

