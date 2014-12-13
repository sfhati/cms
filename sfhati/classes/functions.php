<?php

function AddPluginTemplate($plugin_name, $template_file, $sethavecontrol = 0,$template_name='', $cant_delete = 1) {
    /* md5=widget ***********************
      type='1' cant delete
      string1=plugin folder name
      string2=template name or caption
      string3= template file name without .inc 
      bool2=set have control           
     */
    if(!$template_name)$template_name="[$template_file]";
    $isin = @mysql_fetch_array(mysql_query("select id from table3 where `string1`='$plugin_name' and `string3`='$template_file'  and `md5`='widget' limit 1"));
    if (!$isin[id])
        mysql_query("INSERT INTO table3 SET  type='$cant_delete', `string1`='$plugin_name' , `string2`='$template_name' , `string3`='$template_file',bool2='$sethavecontrol' ,`md5`='widget'");
    return mysql_insert_id();
}
//get url with var`s and return it with ? or & in last to set other var`s
function getAddress() {
    /*** check for https ***/
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    /*** return the full address ***/
    $return =$protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($return, "?")) $return.="&"; else $return.="?";
    return $return;
}

// var check
function filter_vars($var) {
    
    $search = array('%', '[', ']', '"', "'", '\\', '<', '>');
    $replace = array('&#37;', '&#91;', '&#93;', '&quot;', '&lsquo;', '&#92;', '&#60;', '&#62;');
/*    if (!$_SESSION['IDUSER_ADMIN']) {
   $var = mysql_real_escape_string($var);   
    }
 /*    if (get_magic_quotes_gpc())
        $var = stripslashes($var);
 * 
 */
    $var = str_replace($search, $replace, $var);
    return $var;
}

function filter_output($var) {
    $search = array('&#37;', '&#91;', '&#93;', '&amp;#37;', '&amp;#91;', '&amp;#93;');
    $replace = array('%', '[', ']', '%', '[', ']');
    $var = str_replace($search, $replace, $var);
    $var = stripslashes($var);
    return $var;
}

function filewrite($file, $content) {
    @unlink($file);
    $fp = fopen($file, 'w');
    if (flock($fp, LOCK_EX | LOCK_NB)) {
        fwrite($fp, $content);
        fflush($fp);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

//get setting for any title from list setting
function sett_site($word, $vlu = 0, $tim = 0) {
    $x = get_cache($word);

    if ($vlu && !$x) {        
        set_cache($word, $vlu);
        return $vlu;
    }else
        return $x;
}

function set_cache($var, $val, $time = 0) {
    if ($time)
        $time+=time();
    mysql_query("DELETE from table3 where `string1`='$var' and `md5`='SETTING'");
    mysql_query("INSERT INTO table3 SET  `string1`='$var' ,`string2`='$val' ,`number1`='$time' ,`md5`='SETTING'");
    $qry = mysql_query("select string1,string2 from table3 where `md5`='SETTING'");
    while ($res = @mysql_fetch_array($qry)) {
        $content.= base64_encode($res[string1]) . '|#|' . base64_encode($res[string2]) . "\n";
    }
    filewrite(TMP_PATH . 'setting', $content);
}

function get_cache($var) {
    //set_cache('', '', 1);
    $_F = TMP_PATH . 'setting';
    if (!file_exists($_F)) {
        $x = @end(getResults("select string1,string2 from table3 where string1='$var' and `md5`='SETTING' limit 1"));
        if ($x[string1]) {
            return $x[string2];
        }
    } else {
        $_SETT = file($_F);
        foreach ($_SETT as $_SETT_V) {
            $_SETT_K = explode("|#|", $_SETT_V);
            if (base64_decode($_SETT_K[0]) == $var) {

                return base64_decode($_SETT_K[1]);
            }
        }
    }
    return false;
}

function getnamepage($i) {
    $d = @end(getResults('select page_name from pages where id=' . $i));
    return $d[page_name];
}

function get_root_page($id, $return = array()) {
    $row = @end(getResults("Select id,page_name,slave From pages where id='$id'"));
    if ($row[slave] == 0) {
        $return[] = array(0 => 0, 1 => "[main menu]");
    } else {
        $row1 = @end(getResults("Select id,page_name From pages where id='$row[slave]'"));
        $return[] = $row1;
        $return = get_root_page($row1[id], $return);
    }
    return $return;
}

function get_pages_under_page_id($id, $return = array(), $opt = '') {
    $result = getResults("Select id,slave From pages where slave='$id' $opt");
    if (is_array($result))
        foreach ($result as $row) {
            $return[] = $row[id];
            $return = get_pages_under_page_id($row[id], $return, $opt);
        }
    return $return;
}

/* Translate function */

function CHNG_LANGUAGE($text_TR) {
    $lin_rpl_frm[] = "\n";
    $lin_rpl_frm[] = "\r";
    $_LANGUAGE_X = array();
    $tmp_lang = TMP_PATH . 'LANGUAGE_' . $_SESSION['lng_CH'] . '.txt';

    $_LANGUAGE_X = file($tmp_lang);
    foreach ($_LANGUAGE_X as $_LANGUAGE_V) {
        $_LANGUAGE_K = explode("=", $_LANGUAGE_V);
        $_LANGUAGE_V = str_replace($_LANGUAGE_K[0] . '=', '', $_LANGUAGE_V);
        $text_TR = str_replace('[' . $_LANGUAGE_K[0] . ']', str_replace($lin_rpl_frm, '', $_LANGUAGE_V), $text_TR);
    }
    return $text_TR;
}

/* * **********Download any  file**************** */

function downloadFile($fullPath,$file_name='') {

    // Must be fresh start
    if (headers_sent())
        die('Headers Sent');

    // Required for some browsers
    if (ini_get('zlib.output_compression'))
        ini_set('zlib.output_compression', 'Off');

    // File Exists?
    if (file_exists(SITE_PATH . $fullPath)) {

        // Parse Info / Get Extension
        $fsize = filesize(SITE_PATH . $fullPath);
        $path_parts = pathinfo(SITE_PATH . $fullPath);
        $ext = strtolower(end(explode(".",$file_name)));

        // Determine Content Type
        switch ($ext) {
            case "pdf": $ctype = "application/pdf";
                break;
            case "exe": $ctype = "application/octet-stream";
                break;
            case "zip": $ctype = "application/zip";
                break;
            case "doc": $ctype = "application/msword";
                break;
            case "xls": $ctype = "application/vnd.ms-excel";
                break;
            case "ppt": $ctype = "application/vnd.ms-powerpoint";
                break;
            case "gif": $ctype = "image/gif";
                break;
            case "png": $ctype = "image/png";
                break;
            case "jpeg":
            case "jpg": $ctype = "image/jpg";
                break;
            default: $ctype = "application/force-download";
        }

        header("Pragma: public"); // required
        header("Expires: 100000");
        //header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false); // required for certain browsers
        header("Content-Type: $ctype");
        header("Content-Disposition: attachment; filename=\"" . basename($file_name) . "\";");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fsize);
        ob_clean();
        flush();
        readfile(SITE_PATH . $fullPath);
    } else
        die('File Not Found');
}

/* * *************include templates**************** */

function include_file_template($template_name) {
    $p = TEMPLATE_PATH . 'sfhati' . DIRECTORY_SEPARATOR;

    if (end(explode('.', $template_name)) != 'inc')
        $template_name = $template_name . '.inc';
    if (file_exists($p . $template_name)) {

        return implode(file($p . $template_name), '');
    }
}

/* * *****list dir******** */

function LIST_DIR($dir,$listDir='') {
    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE) {
            if ($sub != "." && $sub != ".." && $sub != '.svn') {
                if (is_file($dir . $sub)) {
                    $listDir[$dir][] = $sub;
                } else if (is_dir($dir . $sub . '/')) {
                    $listDir[$dir][] = $sub;
                    $listDir=&LIST_DIR($dir . $sub . '/',$listDir);
                }
            }
        }
        closedir($handler);
    }
    return $listDir;
}

function LIST_Filse($dir) {
    $listDir = array();
    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE) {
            if ($sub != "." && $sub != ".." && $sub != '.svn') {
                if (is_file($dir . $sub)) {
                    $listDir[] = $dir . $sub;
                } else if (is_dir($dir . $sub . '/')) {                   
                    
                   $listDir = array_merge_recursive($listDir,LIST_Filse($dir . $sub . '/'));
                }
            }
        }
        closedir($handler);
    } 
    return $listDir; 
}

function make_path($path){
   if (is_dir($path))
        return true;
    $prev_path = substr($path, 0, strrpos($path, DIRECTORY_SEPARATOR, -2) + 1);
    $return = make_path($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

/* this function for other plugin */

function cut_str($inputstr, $delimeterLeft, $delimeterRight) {
    $posLeft = strpos($inputstr, $delimeterLeft);
    $posRight = strpos($inputstr, $delimeterRight);
    if ($posLeft !== false || $posRight !== false) {
        $cut_text = substr($inputstr, $posLeft + strlen($delimeterLeft), $posRight - ($posLeft + strlen($delimeterLeft)));
        return $cut_text;
    }else
        return $inputstr;
}

function objectToArray($object) {
    if (!is_object($object) && !is_array($object))
        return $object;

    $array = array();
    foreach ($object as $member => $data) {
        $array[$member] = objectToArray($data);
    }
    return $array;
}

function rmdir_empty($dir) {
    if(substr($dir,  strlen($dir)-1,1)!='/') $dir.='/';
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {            
            if (is_dir($dir.$entry)) {                
                if (rmdir_empty($dir.$entry)) {
                    if((count(scandir($dir.$entry)) == 2)){
                    rmdir($dir.$entry);
                    }
                } 
            } 
        }
    }    
    return TRUE;
}

/* take time */

function takeTime($label = '', $e = 0) {
    $time = explode(' ', microtime());
    $end_page = $time[1] + $time[0];
    $tm = round(($end_page - $_SESSION[start_taketime]), 2);
    if ($tm) {
        $return = "<br>\n<b>$label:</b> $tm";
        $_SESSION[alltaketime]+=$tm;
    }
    $_SESSION[start_taketime] = $end_page;
    $_SESSION[taketime].=$return;

    if ($e) {
        echo $_SESSION[taketime] . "<br>\n<b>$label:</b> $_SESSION[alltaketime]";
    }
}

/* Convert bite to any unit */

function convert_mb($size) {
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

//*************** this functions run in index page
// on the last :
function FUNCTION_AT_END($t) {    
    while(preg_match('/\[(.*)\:\"(.*)\"end (.*)\]/',$t)){$t = Syntax_cache($t);}   
    /*   if (function_exists('changeurlsmart')){
      //$t = changeurlsmart($t);
      }else{
      } */
    //-------------------    
    return $t;
}
make_path(TEMPLATE_PATH.'sfhati'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
make_path(TEMPLATE_PATH.'sfhati'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR);
make_path(TEMPLATE_PATH.'sfhati'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR);
make_path(TEMPLATE_PATH.'my_theme'.DIRECTORY_SEPARATOR);
make_path(TEMPLATE_PATH.'panel'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR);
