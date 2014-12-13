<?php

/*
 * md5= plugin_active(not install), PLUGIN_S(installed)
 * number1=plugin id in main domain
 * number2=download timer for this plugin
 * number3 = virseon number
 * string1=une_name
 * string4= abount plugin (url)
 * bool1= active or not active plugin in your system
 * bool2=lock plugin in controlpanel
 * bool3=is exist plugin or new one
 * bool4=hide plugin from control panel
 * 
 */
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');




if ($_SESSION['IDUSER_ADMIN']) {
    if ($usesmartchice)
        mysql_query("delete from `table1` where md5='jsfiles'");

    // active & unactive js file for user
    if ($jsfilesact) {
        $new_plugin = mysql_fetch_array(mysql_query("select bool1,string2 FROM `table1` where id='$jsfilesact'"));
        $page_acti = ($new_plugin['bool1'] == 1) ? 0 : 1;
        $pageacti = ($new_plugin['bool1'] == 1) ? 'not active' : 'active';
        mysql_query("UPDATE `table1` set bool1='$page_acti' where id='$jsfilesact' limit 1");
        echo ("file $new_plugin[string2] is $pageacti");
        exit();
    }

    /*     * **************** JAVASCRIPT MANAGMENT ************************************************************************* */
    if ($chng_tpl == 'system_setting' && $plgn == 'plugin_manager') {
        $_SESSION['LOADTHEME'] = '';
        $_SESSION['LOADALLWidget'] = '';
        $_SESSION['LOADALLsetting'] = '';
        mysql_query("delete from `table3` where `md5`='widget'");
        $tm = time();
        mysql_query("UPDATE `table1` set string4='$tm' where md5='jsfiles'");
        $dir = TEMPLATE_PATH;
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if (is_dir($dir . $file . '/js/')) {
                    if ($dh1 = opendir($dir . $file . '/js/')) {
                        while (($file1 = readdir($dh1)) !== false) {
                            $file_extension = strtolower(substr(strrchr($file1, "."), 1));
                            if ($file_extension == 'js') {
                                $p2 = mysql_fetch_array(mysql_query("select id,bool1 from table1 where md5='jsfiles' and string1='$file/js/$file1' limit 1"));
                                if ($p2[id])
                                    mysql_query("UPDATE `table1` set string4='' where id='$p2[id]' limit 1");
                                else
                                    mysql_query("INSERT INTO `table1` (  `md5`,`string1` ,`string2`, `string3`, `string4`, `bool1`)VALUES ('jsfiles', '$file/js/$file1','$file1','$file', '', '1')");
                            }
                        }
                        closedir($dh1);
                    }
                }
            }
        }
        closedir($dh);

        // forec delete controlpanel files   
        mysql_query("DELETE from `table1` where string4='$tm' and md5='jsfiles'");
        mysql_query("DELETE from `table1` where md5='jsfiles' and string3='panel'");

// force use plugin used file
        $qry = mysql_query("SELECT string5 FROM `table3` where md5='plugin_show' group by string5");
        while ($res = @mysql_fetch_array($qry)) {
            mysql_query("UPDATE `table1` set bool1='1' where md5='jsfiles' and string3='$res[string5]'");
        }
    }



    /*     * **************** CREATE JAVASCRIPT FILE ************************************************************************* */


    if ($createjsfile)
        set_cache('compressjs', $compressjs);
    createjsfile(get_cache('compressjs'));

    /*     * **************** PLUGIN MANAGMENT ************************************************************************* */
# Install plugin
    if ($install_plugin_X) {
        $t = TMP_PATH . 'plugin_tmp.zip';
        @unlink($t);
        copy(Main_Domain . "?install_plugin_X=" . $install_plugin_X, $t);

        exec("unzip -o $t  -d " . SITE_PATH, $f);
        install_plugin();
        echo '<a href="javascript:" class="ui-icon ui-icon-check"></a>';
        exit();
    }

#delete plugin    
    if ($delete_plugin) {
        $doc = new DOMDocument();
        $new_plugin = mysql_fetch_array(mysql_query("select * FROM `table1` where md5='PLUGIN_S' and string1='$delete_plugin'"));
        $doc->load(Main_Domain . '?check_update=' . $delete_plugin);
        $files = $doc->getElementsByTagName("file");
        foreach ($files as $file) {
            $file_name = $file->getElementsByTagName("file_name");
            $file_name = $file_name->item(0)->nodeValue;
            $file_md5 = $file->getElementsByTagName("file_md5");
            $file_md5 = $file_md5->item(0)->nodeValue;
            $listserverfile[$file_name] = $file_name;
            if (file_exists(SITE_PATH . $file_name)) {
                @unlink(SITE_PATH . $file_name);
            }
        }

        rmdir_empty(SITE_PATH); // rm all empty dir!
        //delete all widget from this plugin
        mysql_query("delete from `table3` where md5='plugin_show' and string5='$delete_plugin' ");
        mysql_query("delete from `table3` where `string1`='$delete_plugin' and `md5`='widget'");
        install_plugin();

        exit();
    }

    /*     * **************active plugin*************** */
    if ($plugin_act) {
        $new_plugin = mysql_fetch_array(mysql_query("select * FROM `table1` where md5='PLUGIN_S' and id='$plugin_act'"));
        $page_acti = ($new_plugin['bool1'] == 1) ? 0 : 1;
        $widget_acti = ($new_plugin['bool1'] == 1) ? 1 : 0;
        $pageacti = ($new_plugin['bool1'] == 1) ? 'not active' : 'active';
        mysql_query("UPDATE `table1` set bool1='$page_acti' where id=$plugin_act");
        mysql_query("UPDATE `table3` set number6='$widget_acti' where md5='plugin_show' and string5='$new_plugin[string1]' ");
        echo ("Plugin $new_plugin[string1] is $pageacti");
        install_plugin();
        exit();
    }

    /*     * ************Check for update files*************************** */
    if ($check_update) {
        echo check_update();

        exit();
    }
    
    if($updatenowplease){
        check_update(2);
        exit();
    }
    if ($deletefile) {
        $deletefile = base64_decode($deletefile);
        if (file_exists(SITE_PATH . $deletefile)) {
            unlink(SITE_PATH . $deletefile);
        }
        exit();
    }


    /*     * **************** PLUGIN MANAGMENT ************************************************************************* */
    if ($refresh_plugins)
        install_plugin();
}