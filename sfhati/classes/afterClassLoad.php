<?php
$_EXTRA_HEADER='';
$_EXTRA_BODY='';
// if(check_user_agent('mobile')) $_REQUEST[ismobile]=1;
/* * ******************************** request vars****************************************** */
foreach ($_REQUEST as $KEy => $VAl) {
    // remove vars from url ! 
    $rm['_MSG']='_MSG';
    if(in_array($KEy,$rm) ) {
        unset($_REQUEST[$KEy]);
        unset($KEy);
    }
    if (is_array($_REQUEST[$KEy])) {
        foreach ($_REQUEST[$KEy] as $KEy1 => $VAl1) {
            if (is_array($$KEy)) {
                $$KEy = array_merge($$KEy, array($KEy1 => filter_vars($VAl1)));
            } else {
                $$KEy = array($KEy1 => filter_vars($VAl1));
            }
        }
    } else {
        $$KEy = filter_vars($VAl);
    }
}

/* * *************Visitors Number****************************** */
$client_addr = filter_var((!empty($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] :
                (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :
                        (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN', FILTER_SANITIZE_STRING);

if(!$_SESSION['yesyouareanewvisitor']){
    $_SESSION['yesyouareanewvisitor']=1;
    $fileVisitors = CACHE_PATH . 'Visitors' . date('d_m_Y', time()) . '.x';
    $country=  file_get_contents(Main_Domain.'?checkip='.$client_addr);
    $thisVisitor = time() . ';' . $client_addr . ';' . $country ."\n";
    //save a new visits
    $handle = fopen($fileVisitors, 'a');
    fwrite($handle, $thisVisitor);
    fclose($handle);
}


/* complete conf language, site title and site email*/
$_SESSION['lng_CH'] = get_cache('language');
define('SITE_NAME', get_cache('title'));
if (get_cache('site_email'))
    define('SITE_EMAIL', get_cache('site_email'));

if (!$_GET[id]) {
    $_REQUEST[id] = get_cache('home_page');
    $_GET[id] = get_cache('home_page');
    $id = get_cache('home_page');
}


$ox = '';
foreach ($_GET as $gk => $gv)
    $ox.="$gk=$gv;";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    define('IS_POST',  1);
}else{
    define('IS_POST',  0);
}
  

// for cache files



/* * *******restore Cache full Page if exist************************ */
if($_GET[setcacheas]){
    define('CACHE_MD5', CACHE_PATH . 'cachePage_' . md5($_GET[setcacheas]));
/*}else if (is_bot()) {   
    define('CACHE_MD5', $ox.'print');
    echocachefile();
    $chng_tpl='print';*/
}else{
    define('CACHE_MD5', CACHE_PATH . 'cachePage_' . md5($ox . $_SESSION['IDUSER_ADMIN']));
}





/* * ****Set cache time if not setting*** */
if (!$_SESSION['CachePageTime']) {
    $_SESSION['CachePageTime'] = get_cache('CachePageTime');
    $_SESSION['CacheSQLTime'] = get_cache('CacheSQLTime');
    $_SESSION['CacheFileTime'] = get_cache('CacheFileTime');
    $_SESSION['CachePluginTime0']= $_SESSION['CachePageTime'];
    $_SESSION['CachePluginTime1'] = get_cache('CachePluginTime1');
    $_SESSION['CachePluginTime2'] = get_cache('CachePluginTime2');
    $_SESSION['CachePluginTime3'] = get_cache('CachePluginTime3');
    $_SESSION['CachePluginTime4'] = get_cache('CachePluginTime4');
    if (!$_SESSION['CachePageTime']) {
        $_SESSION['CachePageTime'] = 60;
        $_SESSION['CacheSQLTime'] = 300;
        $_SESSION['CacheFileTime'] = 1;
    }
}

//restore Cache full Page if exist
if (!IS_POST && !$_SESSION['USER_ID'] && $_SESSION['CachePageTime'] != 1 && file_exists(CACHE_MD5)) {
    if ((time() - $_SESSION['CachePageTime']) < filemtime(CACHE_MD5)) {
        echocachefile(CACHE_MD5);
    }    
}
/* * ********Connebt to mysql database************************ */

$link = mysql_connect(db_host, db_user, db_pass) or die('<meta http-equiv="refresh" content="5"> Please wait ... ');
$db_selected = mysql_select_db(db_name, $link);


/* check setting file */
if (!filesize(TMP_PATH . 'setting')) {
    set_cache('x', 'x');
}
