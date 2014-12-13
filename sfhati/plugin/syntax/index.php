<?php

/* * *********************************************************** /\
  /\* sfhati frame work                                         /\/\
  \/* Author : bassam essawi [bastr3]                          /\/\/\
  /\* @sfhati.com[at]gmail                                    /\/\/\/\
  \/* Site : sfhati.com                                      /\BASTR3/\
  /\* Date : 16-02-2011                                     /\/\/\/\/\/\
  \/* Virsion : 1.2                                        /\/\/\/\/\/\/\
  \****************************************************** */
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

unset($_SESSION[arr_xsynk]);
unset($_SESSION[arr_xsynv]);
$_SESSION[arr_xsynk][] = '^|^';
$_SESSION[arr_xsynv][] = '","';

$dir = dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'plugin' . DIRECTORY_SEPARATOR;
if ($dh = opendir($dir)) {
    
    while (($file = readdir($dh)) !== false) {
        if ($file != '.' && $file != '..' && $file != '.svn' && filetype($dir . $file) != 'dir') {
            include($dir . $file);
            $_SESSION[SYNTAX_WORD][] = basename($file, ".php");
        }
    }
    closedir($dh);
}
?>