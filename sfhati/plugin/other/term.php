<?php

//check if there is a new template not recode in db 
    $dir = TEMPLATE_PATH . 'templates/';
    if ($dh = opendir($dir)) {
        while (($dirfile = readdir($dh)) !== false) {
            if ($dirfile != is_dir($dir . $dirfile)) {
                $titlewidj = @mysql_fetch_array(mysql_query("Select string3 From table3 where string3='" . basename($dirfile, '.inc') . "' and  md5='widget' limit 1"));
                if (!$titlewidj[string3]) {
                    $nd = explode('_', $dirfile);
                    if (!$nd[0] || !is_dir(PLUGIN_PATH . $nd[0]))
                        $nd[0] = 'other';
                    AddPluginTemplate($nd[0], basename($dirfile, '.inc'),0,'',0);
                }
            }
        }
    }