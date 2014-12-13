<?php

$time = explode(' ', microtime());
$_SESSION[taketime] = '';
$_SESSION[alltaketime] = 0;
$_SESSION[start_taketime] = $time[1] + $time[0]; // page and plugin take time to load use takeTime($label);
  
function echocachefile($cachefile) {
    if (file_exists($cachefile)) {
        header('Content-Type: text/html; charset=UTF-8');
        echo implode(file($cachefile), '');
        exit();
    }
}
 
//==== Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
function redirect($url) {
    if (!headers_sent()) {    //If headers not sent yet... then do php redirect
        header('Location: ' . $url);
        exit();
    } else {                    //If headers are sent... do java redirect... if java disabled, do html redirect.
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit();
    }
}

/* * *******************cache sql result**************************************** */
/*
 * For while result
  $res =getResults(sql);
  if(is_array($res)) foreach ($res as  $row) {

  for get last record
  $res = @end(getResults(sql));

 */

function getResults($query) {
    $D = 0;
    if ($_SESSION['USER_ID']) {
        $cacheTime = 5;
    } else {
        if (!$_SESSION['CacheSQLTime'] || $_SESSION['CacheSQLTime'] == 1)
            $_SESSION['CacheSQLTime'] = 5;
        $cacheTime = $_SESSION['CacheSQLTime'];
    }

    // $query: mysql query word  $cacheTime: seconds
    $cachefile = CACHE_PATH . 'cacheSQLfile_' . md5($query);

    if (file_exists($cachefile)) {
        if ((time() - $cacheTime) < filemtime($cachefile) && $cacheTime != 1) {
            $checkCache = implode(file($cachefile), '');
            $returntextx = explode('((***^|^***))', $checkCache);
            foreach ($returntextx as $v) {
                $returntext = explode('((-****-))', $v);
                $D++;
                foreach ($returntext as $v1) {
                    if ($v1) {
                        $returntex = explode('***^|^***', $v1);
                        $allreturntext[$D][$returntex[0]] = $returntex[1];
                    }
                }
            }
            return $allreturntext;
        }
    }

    if (!mysql_ping()) {
        $link = mysql_connect(db_host, db_user, db_pass) or die('<meta http-equiv="refresh" content="5"> Please wait ... ');
        $db_selected = mysql_select_db(db_name, $link);
    }
    $qry = mysql_query($query);
    while ($res = @mysql_fetch_assoc($qry)) {
        $returntext = '';
        foreach ($res as $k => $v) {
            if ($k != 'image' && $k != 'file1' && $k != 'file2' && $k != 'file3' && $k != 'file4' && $k != 'file5' && $k != 'file')
                $returntext.=$k . '***^|^***' . $v . '((-****-))';
        }
        $returntextx.=$returntext . '((***^|^***))';
    }
    filewrite($cachefile, $returntextx);
    return getResults($query);
}

function Syntax_cache($t, $c = 'SyntaxCode') {
    $_SESSION[lastSyntaxMD5] = 0;
    $t = Syntax($t, $c);
    while ($_SESSION[$c]) {
        if ($_SESSION[lastSyntaxMD5] == 10) {
            return Syntax($t);
        }
        $t = $_SESSION[$c];
        $_SESSION[$c] = '';
        $t = Syntax($t, $c);
    }
    $t = filter_output(CHNG_LANGUAGE($t));
    $_SESSION[$c] = '';
    return $t;
}

function jsUA($ua, $js_array = array(), $compressjs = 10) {    
    ksort($js_array);
    $jsau = '';

    foreach ($js_array as $createjsfile_row)
        $jsau.= addslashes(file_get_contents(TEMPLATE_PATH . $createjsfile_row));

    $jsau = CHNG_LANGUAGE(stripslashes($jsau));
    $packer = new JavaScriptPacker($jsau, $compressjs, true, false);
    $jsau = $packer->pack();


    /* create a new file */
    $handle = fopen(CACHE_PATH . $ua . get_cache('jshash' . $ua) . ".js", 'w');
    fwrite($handle, $jsau);
    fclose($handle);

    return '';
}

function createjsfile($compressjs = 0) {
    $dir = TEMPLATE_PATH;
    // javascript file for user creatore
    $qry = mysql_query("SELECT id,string1,string2 FROM `table1` where md5='jsfiles' and bool1='1'");
    while ($res = @mysql_fetch_array($qry)) {
        if (file_exists("{$dir}{$res[string1]}")) {
            $dhash2.=hash_file('md5', "{$dir}{$res[string1]}"); // hash code admin
            $js_array2[$res[string2]] = $res[string1];
        } else {
            mysql_query("delete FROM `table1` where md5='jsfiles'  and id=$res[id]");
        }
    }
    $jshash2 = md5($dhash2 . get_cache('language') . get_cache('compressjs'));
    if ($jshash2 == get_cache('jshash2') && file_exists(CACHE_PATH . "2{$jshash2}.js")) {
        $jshash2 = '';
    } else {
        @unlink(CACHE_PATH . "2" . get_cache('jshash2') . ".js");
        set_cache('jshash2', $jshash2);
        jsUA(2, $js_array2, $compressjs);
    }



    // javascript file for admin creatore
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (is_dir($dir . $file . '/js/')) {
                if ($dh1 = opendir($dir . $file . '/js/')) {
                    while (($file1 = readdir($dh1)) !== false) {
                        $file_extension = strtolower(substr(strrchr($file1, "."), 1));
                        if ($file_extension == 'js') {
                            $dhash1.=hash_file('md5', "{$dir}$file/js/$file1"); // hash code admin
                            $js_array1[$file1] = $file . '/js/' . $file1;
                        }
                    }
                    closedir($dh1);
                }
            }
        }
    }
    closedir($dh);

    $jshash1 = md5($dhash1 . get_cache('language') . get_cache('compressjs'));
    if ($jshash1 == get_cache('jshash1') && file_exists(CACHE_PATH . "1{$jshash1}.js")) {
        $jshash1 = '';
    } else {
        @unlink(SITE_LINK . "cache/1" . get_cache('jshash1') . ".js");
        set_cache('jshash1', $jshash1);
        jsUA(1, $js_array1);
    }


    return 'your js file is created successfully ';
}
/************CSS TOOLS*****************************************/
function FlipCSS($css_data) {
    preg_match_all('/[\h|\n|\{|;]((float|padding|margin|background|text-align|left|right|direction|border).*):((.+)(\}|;))/i', $css_data, $css_arr);
    foreach ($css_arr[1] as $k => $x) {
        $css_new = $css_arr[0][$k];
        $css_new = str_ireplace('left', 'XXLEXFTLXX', $css_new);
        $css_new = str_ireplace('right', 'left', $css_new);
        $css_new = str_ireplace('XXLEXFTLXX', 'right', $css_new);

 
        if($css_arr[1][$k]=='direction'){        
        $css_new = str_ireplace('ltr', 'XXLEXFTLXX', $css_new);
        $css_new = str_ireplace('rtl', 'ltr', $css_new);
        $css_new = str_ireplace('XXLEXFTLXX', 'rtl', $css_new);            
        }
        $dx=  explode(' ', trim($css_arr[4][$k]));
        if(count($dx)==4){
           $css_new = str_replace($css_arr[4][$k],$dx[0].' '.$dx[3].' '.$dx[2].' '.$dx[1],$css_new);
        }
        $css_data=  str_replace($css_arr[0][$k], $css_new, $css_data);
        
    }
     return $css_data;
}


function compress_css($file_name) {
    $cssx = file_get_contents($file_name);
    $cssx = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', ' ', $cssx);
    preg_match_all('/\@import[^\;]*\;/', $cssx, $p);
    $cssx = preg_replace('/\@import[^\;]*\;/', '', $cssx);  
    $_SESSION['@import_media'].= implode("\n", $p[0]);    
    preg_match("|".addslashes(TEMPLATE_PATH)."(.*)/css|U", $file_name, $x);
    $_FCSSILE = $x[1];
$ltrrtl=get_cache('language');
/*if($ltrrtl!='ar'){
    $cssx = FlipCSS($cssx);
}*/
    
    
    return str_ireplace('imagedata', 'url(data:', str_ireplace('url('. TEMPLATE_LINK  . $_FCSSILE . '/images/http://', 'url(http://', str_ireplace('{}', '{ }', str_ireplace('url(', 'url('. TEMPLATE_LINK . $_FCSSILE .'/images/', str_ireplace('url(data:', 'imagedata', str_ireplace(array('; ', ' }', '{ ', ': ', ' {', '  '), array(';', '}', '{', ':', '{', ' '), str_ireplace(array("\r\n", "\r", "\n", "\t", '  '), ' ', $cssx)))))));
}

function createcssfile($e = 0) {
    $css = '';
    $dir = TEMPLATE_PATH;
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (is_dir($dir . $file . '/css/')) {
                if ($dh1 = opendir($dir . $file . '/css/')) {
                    while (($file1 = readdir($dh1)) !== false) {
                        $file_extension = strtolower(substr(strrchr($file1, "."), 1));
                        if ($file_extension == 'css') {
                            $dhash.=hash_file('md5', "{$dir}$file/css/$file1");
                            $ARRAY_CSS[$file1] = $dir . $file . '/css/' . $file1;
                            $_FCSSILE[$file1] = $file;
                        }
                    }
                    closedir($dh1);
                }
            }
        }
        closedir($dh);
    }
    ksort($ARRAY_CSS);
    if ($e == 1)
        return $ARRAY_CSS;
    $csshash = md5($dhash . get_cache('language'));
    if ($csshash == get_cache('csshash') && file_exists(CACHE_PATH . "{$csshash}.css")) {
        return '';
    }

    set_cache('csshash', $csshash);
    $_SESSION['@import_media'] = '';

    foreach ($ARRAY_CSS as $k => $v) {
        $css.=compress_css($v);
    }
/*
    preg_match_all("|(.*){[^}]+}(.*)|U", $css, $outx);
    $css = str_replace($outx[0], '', $css);

    if (is_array($outx[0]))
        foreach ($outx[0] as $k => $v) {
            preg_match_all("|{(.*)}|U", $v, $c1);
            $xsscx[trim($outx[1][$k])].=trim($c1[1][0]) . ';';
        }
    if (is_array($xsscx))
        foreach ($xsscx as $kx => $vx) {
            $cssus.= $kx . '{' . $vx . '}';
        }
*/
    $cssdone = str_ireplace(';}', '}', str_ireplace(';;', ';', $css));
    $handle = fopen(CACHE_PATH . "{$csshash}.css", 'w');
    fwrite($handle, '@charset "utf-8";' . "\n" . $_SESSION['@import_media'] . CHNG_LANGUAGE($cssdone));
    fclose($handle);
}

function getcsselements() {

    $css_compression = file_get_contents(SITE_LINK . "cache/" . get_cache('csshash') . ".css");
    preg_match_all("|(.*){[^}]+}(.*)|U", $css_compression, $outx);


    if (is_array($outx[0]))
        foreach ($outx[0] as $k => $v) {
            preg_match_all("|{(.*)}|U", $v, $c1);
            $propertiz = explode(';', $c1[1][0]);
            $echo.= $outx[1][$k] . "{\n";
            foreach ($propertiz as $kvalue) {
                $echo.= '    ' . $kvalue . "\n";
            }
            $echo.="}\n\n";
        }
    echo $echo;
}

/* language file create */

function createlangfile() {
    if (!$_SESSION['IDUSER_ADMIN'])
        return '';
    $dir = PLUGIN_PATH;
    //check if there are any new change in all lang files
    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE)
            if ($sub != "." && $sub != ".." && $sub != '.svn')
                if (file_exists($dir . $sub . "/lang/" . $_SESSION['lng_CH'])) {
                    $dhash.=hash_file('md5', $dir . $sub . "/lang/" . $_SESSION['lng_CH']);
                }
        closedir($handler);
    }
    $tmp_lang = TMP_PATH . 'LANGUAGE_' . $_SESSION['lng_CH'] . '.txt';

    if (get_cache('langhash') == md5($dhash) && file_exists($tmp_lang)) {
        return '';
    }


    $tmp_lang = TMP_PATH . 'LANGUAGE_' . $_SESSION['lng_CH'] . '.txt';

    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE)
            if ($sub != "." && $sub != ".." && $sub != '.svn')
                if (file_exists($dir . $sub . "/lang/" . $_SESSION['lng_CH']))
                    $_LANGUAGE_X.= "\n" . file_get_contents($dir . $sub . "/lang/" . $_SESSION['lng_CH']);
        closedir($handler);
    }
    @unlink($tmp_lang);
    $handle = fopen($tmp_lang, 'a');
    fwrite($handle, $_LANGUAGE_X);
    fclose($handle);
    set_cache('langhash', md5($dhash));
    return 'done';
}
