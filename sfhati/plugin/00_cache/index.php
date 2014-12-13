<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

if ($show_filet) {
    show_filet($show_filet, $file_name, $wh);
    downloadFile(show_filet($show_filet, $file_name, $wh));
    exit();
}


$rowwidgets[] = 'null';

if ($_SESSION['IDUSER_ADMIN']) {
    if ($CachePageTime) {
        set_cache('CachePageTime', $CachePageTime);
        set_cache('CacheSQLTime', $CacheSQLTime);
        set_cache('CacheFileTime', $CacheFileTime);
        set_cache('CachePluginTime1', $CachePluginTime1);
        set_cache('CachePluginTime2', $CachePluginTime2);
        set_cache('CachePluginTime3', $CachePluginTime3);
        set_cache('CachePluginTime4', $CachePluginTime4);
    }
    createlangfile();
    /*     * cache for plugin widget */
    $resultwidget = getResults("Select string1 From table3 where md5='widget' group by string1 ORDER BY `string1` ASC");
    if (is_array($resultwidget))
        foreach ($resultwidget as $rowwidget) {
            $rowwidgets[$rowwidget[string1]] = $rowwidget[string1];
        }
}

