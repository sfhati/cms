<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
ini_set("session.gc_maxlifetime", '2592000'); // 30 days
set_time_limit('30');
ini_set('memory_limit', '80M');
date_default_timezone_set('Asia/Amman');

define('SITE_DOMAIN','localhost/sfhati/');
 
#database mysql
    define('db_host', 'localhost');
    define('db_name', 'sfhati');
    define('db_user', 'root');
    define('db_pass', '');


define('SITE_PATH', dirname( __FILE__ ) . DIRECTORY_SEPARATOR);
define('SITE_IP', $_SERVER['SERVER_ADDR']);
define('QUERY_STRING', $_SERVER['QUERY_STRING']);
define('SITE_LINK', 'http://' . SITE_DOMAIN );

define('TEMPLATE_FOLDER', 'template');
define('UPLOADED_FOLDER', 'uploaded');
define('CLASSES_FOLDER', 'classes');
define('CACHE_FOLDER', 'cache');
define('TMP_FOLDER', 'tmp');
define('PLUGIN_FOLDER', 'plugin');

define('TEMPLATE_PATH', SITE_PATH . TEMPLATE_FOLDER . DIRECTORY_SEPARATOR);
define('UPLOADED_PATH', SITE_PATH . UPLOADED_FOLDER . DIRECTORY_SEPARATOR);
define('CLASSES_PATH', SITE_PATH . CLASSES_FOLDER . DIRECTORY_SEPARATOR);
define('CACHE_PATH', SITE_PATH . CACHE_FOLDER . DIRECTORY_SEPARATOR);
define('TMP_PATH', SITE_PATH . TMP_FOLDER . DIRECTORY_SEPARATOR);
define('PLUGIN_PATH', SITE_PATH . PLUGIN_FOLDER . DIRECTORY_SEPARATOR);

define('TEMPLATE_LINK', SITE_LINK . TEMPLATE_FOLDER .'/');
define('UPLOADED_LINK', SITE_LINK . UPLOADED_FOLDER .'/');
define('CLASSES_LINK',  SITE_LINK . CLASSES_FOLDER .'/');
define('CACHE_LINK',  SITE_LINK . CACHE_FOLDER .'/');
define('TMP_LINK', SITE_LINK . TMP_FOLDER .'/');
define('PLUGIN_LINK', SITE_LINK . PLUGIN_FOLDER .'/');

define('SITE_EMAIL', 'info@' . SITE_DOMAIN);
define('Main_Domain', 'http://server.sfhati.com/');
define('Version', '4.07');
define('_CONVERT_PATH', '/usr/local/bin/');

//define('_CONVERT_PATH', '');
/* * *************include Classes**************** */
if ($dh = opendir(CLASSES_PATH)) {
    while (($file = readdir($dh)) !== false) {
        //echo "$dir . $file :";
        if ($file != '.' && $file != '..' && $file != '.svn' && filetype(CLASSES_PATH . $file) != 'dir' && $file != 'afterClassLoad.php') {
            include(CLASSES_PATH . $file);
         //   echo "$dir . $file<br/>";
        }
        //echo "<br/>";
    }
    closedir($dh);
}

/******afterClassLoad*******/
include(CLASSES_PATH . 'afterClassLoad.php');



