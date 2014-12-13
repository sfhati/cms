<?php

//$_SESSION['main_news_sfhati']=0;
if ($_SESSION['IDUSER_ADMIN']) {
    /* check if file widget exist and delete if not! */
    $dir = TEMPLATE_PATH . "templates/";
    $site_exp = mysql_query("select id,string2 FROM `table3` where  md5='plugin_show'");
    while ($field = mysql_fetch_array($site_exp, MYSQL_BOTH)) {
        if (!file_exists($dir . $field[1])) {
            mysql_query("DELETE FROM `table3` where  string2= '$field[1]' and md5='plugin_show'");
        }
    }

    if ($_SESSION['languagenews'] != $_SESSION['lng_CH']) {
        $_SESSION['information_cpanel_sfhati']['Main Domain'] = SITE_DOMAIN;
        exec('du -sh ' . SITE_PATH, $rf);
        $_SESSION['information_cpanel_sfhati']['Home Space'] = str_replace(SITE_PATH, '', $rf[0]);

        $site_exp = mysql_query('SELECT table_schema "Database-Name", SUM( data_length + index_length) "Data Base Size in MB" FROM information_schema.TABLES GROUP BY table_schema;');
        while ($field = mysql_fetch_array($site_exp, MYSQL_BOTH)) {
            $s+= $field[1];
        }
        $_SESSION['information_cpanel_sfhati']['MySQL Space'] = convert_mb($s);


        $_SESSION['information_cpanel_sfhati']['Site IP'] = SITE_IP;
        $_SESSION['information_cpanel_sfhati']['site ID'] = cpanel_user;

        $_SESSION['information_cpanel_sfhati']['licenType'] = '[' . file_get_contents(Main_Domain . '?licenType=' . cpanel_user) . ']';


         $_SESSION['information_cpanel_sfhati']['Version'] = Version;





   

        $news = explode('[[News]]', file_get_contents(Main_Domain . '?news_xml=1&lang=' . $_SESSION['lng_CH']));
        foreach ($news as $news_v) {
            $on_news = explode('[[NOD]]', $news_v);
            if ($on_news[0])
                $news_main_page.='
           <div class="newsinformation">  <h1> <span class="gray">' . date("d M Y", $on_news[2]) . ' </span> &raquo;  ' . $on_news[0] . ' </h1>
      ' . $on_news[1] . '</div>
        

';
        }

        $_SESSION['languagenews'] = $_SESSION['lng_CH'];
        $_SESSION['main_news_sfhati'] = $news_main_page;
    }
    $news_main_page = $_SESSION['main_news_sfhati'];
    $information_cpanel = &$_SESSION['information_cpanel_sfhati'];



    $dir = PLUGIN_PATH . "panel/lang/";
    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE) {
            $flx = explode('.', $sub);
            if ($flx[1] == 'gif') {
                if ($_SESSION['lng_CH'] == $flx[0]) {
                    $selectedoption = "class='selected'";
                } else
                    $selectedoption = '';
                $get_all_language_flag.=" <li class=\"heapOption\"><a href='". SITE_LINK ."?langx=$flx[0]' $selectedoption><img src='".PLUGIN_LINK."panel/lang/$sub'><span>" . strtoupper($flx[0]) . "</span></a></li>";
            }
        }
        closedir($handler);
    }


    if ($_REQUEST['langx']) {
        $_SESSION['lng_CH'] = $_REQUEST['langx'];
        set_cache('language', $_SESSION['lng_CH']);
        header('Location: ' . SITE_LINK);
        exit();
    }

   $expired_x = $_SESSION['setting_Sfhati']['expired_x'];
    if ($expired_x < 0)
        $dosuspend = 0;
    else
        $dosuspend = 0;

    $expired_x = $_SESSION['setting_Sfhati']['expired_x'];
    $created_x = $_SESSION['setting_Sfhati']['created_x'];

    if ($iswidgetcode) {
        $widget_pro = mysql_fetch_array(mysql_query("Select * From table3 where string1='$iswidgetcode' limit 1"));
    }
}

