<?php
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');
$_SESSION['SITE_PATH']=SITE_PATH;
$_SESSION['SITE_LINK']=SITE_LINK;
 $_SESSION['filemanagersfhati']= TEMPLATE_PATH.'sfhati'.DIRECTORY_SEPARATOR;
  $_SESSION['filemanagertemplates']= TEMPLATE_PATH.'templates/'.DIRECTORY_SEPARATOR;
   $_SESSION['filemanageruploaded']= UPLOADED_PATH;
if($dir_tmplt=='filemanagert'){
        $_SESSION['uploaded']= TEMPLATE_PATH.'sfhati/';
    }else if($dir_tmplt=='filemanagertmp'){
        $_SESSION['uploaded']= TEMPLATE_PATH.'templates/';
    }else{
        $_SESSION['uploaded']= UPLOADED_PATH;
    }
    if($dirtmplajx) exit();
?>