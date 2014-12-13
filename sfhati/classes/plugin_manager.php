<?php

function install_plugin() {
    mysql_query("DELETE FROM `table3` where  md5='plugin_active'");

    $doc = new DOMDocument();
    $doc->load(Main_Domain . '?read_XML=' . time());

    $plugins = $doc->getElementsByTagName("plugin");
    foreach ($plugins as $plugin) {

        $plugin_name = $plugin->getElementsByTagName("plugin_name");
        $plugin_name = $plugin_name->item(0)->nodeValue;

        $plugin_discription = $plugin->getElementsByTagName("plugin_discription");
        $plugin_discription = $plugin_discription->item(0)->nodeValue;

        $plugin_virsun = $plugin->getElementsByTagName("plugin_virsun");
        $plugin_virsun = $plugin_virsun->item(0)->nodeValue;

        $downloads = $plugin->getElementsByTagName("downloads");
        $downloads = $downloads->item(0)->nodeValue;

        $plugin_file = $plugin->getElementsByTagName("plugin_file");
        $plugin_file = $plugin_file->item(0)->nodeValue;

        $id_plugin = $plugin->getElementsByTagName("id");
        $id_plugin = $id_plugin->item(0)->nodeValue;

        mysql_query("INSERT INTO `table3` SET  string1 = '$plugin_name',string4 = '" . base64_decode($plugin_discription) . "',number1='$id_plugin',number2='$downloads',number3='$plugin_virsun',md5='plugin_active'");
        $pl = mysql_fetch_array(mysql_query("select `id` from table1 where md5='PLUGIN_S' and string1='$plugin_name'"));
        if ($pl[id]) {
            mysql_query("UPDATE `table1` SET  string4 = '" . base64_decode($plugin_discription) . "',number1='$id_plugin',number2='$downloads',number3='$plugin_virsun',bool3='1' where string1 = '$plugin_name' and md5='PLUGIN_S'");
        } else {
            mysql_query("INSERT INTO `table1` SET  string1 = '$plugin_name' ,md5='PLUGIN_S',string4 = '" . base64_decode($plugin_discription) . "',number1='$id_plugin',number2='$downloads',number3='$plugin_virsun',bool3='1'");
        }
    }
    $dir = PLUGIN_PATH;
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..' && $file != '.svn' && filetype($dir . $file) == 'dir') {
                mysql_query("delete  from table3 where md5='plugin_active' and string1='$file'");
                $pl = mysql_fetch_array(mysql_query("select `id` from table1 where md5='PLUGIN_S' and string1='$file'"));
                if (!$pl[0]) {
                    mysql_query("INSERT INTO `table1` (  `md5`,`string1` , `bool1`, `bool2`)VALUES ('PLUGIN_S', '$file', '1','0')");
                } else {
                    mysql_query("UPDATE `table1` set bool3='0' where md5='PLUGIN_S' and string1='$file'");
                }

                if (file_exists($dir . $file . '/HIDE'))
                    mysql_query("UPDATE `table1` set bool4='1',bool1='1' where md5='PLUGIN_S' and string1='$file'");
                if (file_exists($dir . $file . '/LOCK'))
                    mysql_query("UPDATE `table1` set bool2='1',bool1='1' where md5='PLUGIN_S' and string1='$file'");
            }
        }
        mysql_query("delete  from table1 where md5='PLUGIN_S' and bool3='1'");


        closedir($dh);
    }
// delete all plugin exist in db and not exist in local file!
    $qry = mysql_query("Select * From table1 where md5='PLUGIN_S'");
    while ($res = @mysql_fetch_array($qry)) {
        if (!is_dir($dir . $res[string1])) {
            mysql_query("delete  from table1 where md5='PLUGIN_S' and id='$res[id]'");
        }
    }
// for index page get plugins
    $xplg = '';
    $qry = mysql_query("select `string1` from table1 where md5='PLUGIN_S' and bool1='1' group by string1 ORDER BY string1  ASC");
    while ($res = @mysql_fetch_array($qry)) {
        $xplg.=$res[string1] . ';';
    }
    set_cache('plugin_index_run', $xplg);
}

function check_update($e = 0) {
    $doc = new DOMDocument();
    $site_exp = mysql_query("select * FROM `table1` where md5='PLUGIN_S'");
    while ($field = mysql_fetch_array($site_exp, MYSQL_BOTH)) {
        $doc->load(Main_Domain . '?check_update=' . $field[string1]);
        $files = $doc->getElementsByTagName("file");
        foreach ($files as $file) {
            $file_name = $file->getElementsByTagName("file_name");
            $file_name = $file_name->item(0)->nodeValue;
            $file_md5 = $file->getElementsByTagName("file_md5");
            $file_md5 = $file_md5->item(0)->nodeValue;
            $listserverfile[$file_name] = $file_name;
            if (file_exists(SITE_PATH . $file_name)) {
                if (md5_file((SITE_PATH . $file_name)) != $file_md5) {
                    if (!$e) {
                        $arr.= "<span style='color:Orange'>UPDATE - </span>$file_name<br>";
                    } elseif ($e == 2) {
                        exec("wget -O" . SITE_PATH . "$file_name " . Main_Domain . '?doupdatefile=' . base64_encode($file_name));
                    }
                }
            } else {
                if (!$e) {
                    $arr.= "<span style='color:green'>NEW - </span>$file_name<br>";
                } elseif ($e == 2) {
                    exec("wget -O" . SITE_PATH . "$file_name " . Main_Domain . '?doupdatefile=' . base64_encode($file_name));
                }
            }
        }
    }
    // for remove files from server 
    $doc->load(Main_Domain . '?check_update=remove');
    $files = $doc->getElementsByTagName("file");
    foreach ($files as $file) {
        $file_name = $file->getElementsByTagName("file_name");
        $file_name = $file_name->item(0)->nodeValue;
        if (file_exists(SITE_PATH . $file_name)) {
            if (!$e) {
                $arr.= "<span style='color:red'>REMOVE - </span>$file_name<br>";
            } elseif ($e == 2) {
                unlink(SITE_PATH . $file_name);
            }
        }
    }


    if (!$e) {
        if (!$arr) {
            $noupdatetext = '<span style="color:green">[your site up to date]</span> <br>';
        } else {
            $noupdatetext = '<span onclick="window.top.location=\''. SITE_LINK .'?updatenowplease=1\'" style="cursor: pointer;color:green">[Update Now] </span><span style="color:red">[Note:you must save all work before update,page will be refrish]</span> <br>';
        }
        $arr.="<br><br>$noupdatetext<br><br><hr><h4 onclick='$(\"#clicktoseeyourfile\").toggle()' style='cursor: pointer;'>[Click to see your files]</h4><br><div id='clicktoseeyourfile' style='display:none'>";
    }
    $dirs[] = PLUGIN_PATH ;
    $dirs[] = TEMPLATE_PATH;
    $dirs[] = CLASSES_PATH;
    foreach ($dirs as $dir) {
        foreach (LIST_Filse($dir) as $files) {
            $file = str_replace(SITE_PATH, '', $files);
            $listmyfile[$file] = $file;
        }
    }
    $result = array_diff($listmyfile, $listserverfile);

    foreach ($result as $x) {
        if ($e == 1)
            $arr[] = $x;
        else
            $arr.= "<div id='" . md5($x) . "'><span style='cursor: pointer;padding: 5px;' onclick='if(confirm(\"Do you really want to delete " . end(explode('/', $x)) . "?\"))$(\"#" . md5($x) . "\").load(\"". SITE_LINK ."?deletefile=" . base64_encode($x) . "\")'>X</span>$x</div>";
    }
    if (!$e){
        $arr.="</div>";
        $arr=  CHNG_LANGUAGE($arr);
    }
    if ($e == 2) {
        set_cache('resultupdates', date('d-m-Y H:i'));
        redirect('/');
    }
    return $arr;
}
