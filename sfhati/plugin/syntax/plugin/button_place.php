<?php
function SYNTAX_button_place($template) {
$file_button_place = file(TEMPLATE_PATH.'sfhati/button_place.inc');
foreach($file_button_place as $k) {
    $k_arr=explode(';', $k);
    $button_place[$k_arr[0]]=$k_arr[1];
}
    $template=SYNTAX_EASY($template);
    $button_place_arr=explode(",",$template);
    foreach($button_place_arr as $k) if($k) {$button_place_echo.=trim($button_place[$k]).",";}
    return $button_place_echo;
}
