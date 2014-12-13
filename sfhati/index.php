<?php
session_start();
define('YOUCANINCLUDE', 'Yes');
include "conf.php";

takeTime('Starting init');
/* * *************include init.php plugin**************** */

$plugin_rowx = explode(';', get_cache('plugin_index_run'));
//print_r($plugin_rowx);
if ($plugin_rowx[1]) {
    foreach ($plugin_rowx as $plugin_row) {
        $file_plugin[$plugin_row] = $plugin_row;
        if (file_exists( PLUGIN_PATH . $plugin_row . "/init.php") && trim($plugin_row)) {
            takeTime('Start Plugin ' . $plugin_row);
            include( PLUGIN_PATH . $plugin_row . "/init.php");             
            takeTime('End Plugin ' . $plugin_row);
        }
    }
} else {
   install_plugin();exit();
       
}

/* * *************include index.php plugin**************** */
if (is_array($file_plugin)) {
    foreach ($file_plugin as $kplugin) {
        if (file_exists( PLUGIN_PATH . $kplugin . "/index.php")) {
            takeTime('Starting index plugin' . $kplugin);
            include(PLUGIN_PATH . $kplugin . "/index.php");
            takeTime('Ending index plugin' . $kplugin);
        }
    }
}

/* * ************(if)set template file to [chng_tpl]***************** */
$my_simple_tmplt = include_file_template($chng_tpl); 

/* * ********** Get content PAGE form id ****************** */
$PAGE_NOT_ALLOW = 1; // For error pages
$THIS__result_index = @end(getResults("Select * From pages where id='$id' and page_active=1 $_SESSION[memarea] limit 1"));
if ($THIS__result_index[id]) {
    if ($my_simple_tmplt)
        $THIS__result_index[template] = $my_simple_tmplt; // change template from url.
    else {
        $my_simple_tmplt = include_file_template($THIS__result_index[template]);
    }
    $PAGE_NOT_ALLOW = 0;
    $THIS__result_index['image'] = "?image_thump=" . $THIS__result_index[id];
}
// Error pages here ...
if ($PAGE_NOT_ALLOW == 1) {
    $my_simple_tmplt = include_file_template('ERROR.inc');
    $PAGE_NOT_ALLOW_result = @end(getResults("Select * From pages where id=$id limit 1"));
    if ($PAGE_NOT_ALLOW_result[id]) {
        if ($PAGE_NOT_ALLOW_result[page_active] == 0)
            $ERROR['PAGE_NOT_ACTIVE'] = 1;
        else
            $ERROR['PAGE_NOT_PERMISSION'] = 1;
    }else {
        $ERROR['PAGE_NOT_FOUND'] = 1;
    }
}

takeTime('Ending get page');

/* * *************include footer.php plugin**************** */
if (is_array($file_plugin))
    foreach ($file_plugin as $kplugin)
        if (file_exists( PLUGIN_PATH . $kplugin . "/footer.php")) {
            takeTime('Starting footer plugin' . $kplugin);
            include( PLUGIN_PATH . $kplugin . "/footer.php");
            takeTime('Ending footer plugin' . $kplugin);
        }

/* * *****************process html code by FUNCTION_AT_END() ******************** */
takeTime('Starting Syntax');
$my_simple_tmplt = FUNCTION_AT_END($my_simple_tmplt);
$my_simple_tmplt = str_replace($_SESSION['SYNTAX_VAR']['OLD'], $_SESSION['SYNTAX_VAR']['NEW'], $my_simple_tmplt);

/* * *************include term.php plugin**************** */

if (is_array($file_plugin))
    foreach ($file_plugin as $kplugin)
        if (file_exists( PLUGIN_PATH . $kplugin . "/term.php")) {
            takeTime('Starting term plugin' . $kplugin);
            include( PLUGIN_PATH . $kplugin . "/term.php");            
            takeTime('Ending term plugin' . $kplugin);
        }

/******echo html code******/        
echo $my_simple_tmplt;
takeTime('Ending Syntax');

// cache all page
if ($_SESSION['CachePageTime'] != 1 && !$_SESSION['USER_ID'] && !IS_POST) {    
    filewrite(CACHE_MD5, $my_simple_tmplt);
}

/*****debog time*******/
if ($taketimex){
    takeTime('Page load', 1);
}
?>