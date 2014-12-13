<?php
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');
if ($_SESSION['IDUSER_ADMIN']) {
    $mypageplace=explode(',',$THIS__result_index[page_place]);
    $button_place_option='';
    if (is_array($file_button_place))
    foreach ($file_button_place as $k) {
        $k_arr = explode(';', $k);      
        if(in_array($k_arr[0],$mypageplace)) $chko='check';else $chko='';
        $button_place_option.="<div class='palceholderbutno $chko'  type='$k_arr[0]'>$k_arr[1]</div>";
    }
}