<?php
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

if ($_SESSION['IDUSER_ADMIN']) {
    $file_button_place = file(TEMPLATE_PATH . 'sfhati/button_place.inc');
    if (is_array($file_button_place))
        foreach ($file_button_place as $k) {
            $k_arr = explode(';', $k);
            $button_place[$k_arr[0]] = $k_arr[1];
            $button_place_reflect[$k_arr[0]] = $k_arr[0];
        }
 if($savecontentpage){
         mysql_query("UPDATE `pages` SET `page_cont` = '" . mysql_escape_string(base64_decode($value_contpage)) . "' WHERE `pages`.`id` =$idpg LIMIT 1 ;");
exit();    
 }
    if ($rendererpagepalce) {
        $oldidpg = $idpg;
        $vcx = get_root_page($idpg);
        if ($vcx[0][0])
            $idpg = $vcx[0][0];
        $value = mysql_fetch_array(mysql_query("select page_place from pages where id=$idpg limit 1"));
        $button_place_arr = explode(",", $value[0]);
        foreach ($button_place_arr as $k)
            if ($k) {
                if (trim($k) == trim($rendererpagepalce))
                    $dl = 1; else
                if (in_array(trim($k), $button_place_reflect))
                    $button_place_echo.=trim($k) . ",";
            }
        if (!$dl)
            $button_place_echo.= $rendererpagepalce;

        mysql_query("UPDATE `pages` SET `page_place` = '" . mysql_escape_string($button_place_echo) . "' WHERE `pages`.`id` =$idpg LIMIT 1 ;");
        $jscode = "if($('#$rendererpagepalce').parent().attr('plg') == 'menu'){" .
                " $('#$rendererpagepalce').parent().load('". SITE_LINK ."?id=$oldidpg&chng_tpl=plugin_preview&plgn='+$('#$rendererpagepalce').parent().attr('tmpltcode')); " .
                "}else { " .
                " $('#$rendererpagepalce').parent().load('". SITE_LINK ."?id=$oldidpg&chng_tpl=plugin_preview&plgn='+$('#$rendererpagepalce').parent().parent().parent().attr('tmpltcode')); }"; //// 
        echo CHNG_LANGUAGE('[done...]') . '<script>' . $jscode . '</script>';
        exit();
    }

    if ($p == 'page' || $plgn == 'pages') {
        if (isset($changepagepremistion) && $pageisd) {

            mysql_query("UPDATE `pages` SET `powers` = '$changepagepremistion' WHERE `pages`.`id` =$pageisd LIMIT 1 ;");
            echo CHNG_LANGUAGE('[done...]');
            exit();
        }
        if (isset($changeusersquare_box) && $pageisd) {

            mysql_query("UPDATE `pages` SET `template` = '$changeusersquare_box' WHERE `pages`.`id` =$pageisd LIMIT 1 ;");
            echo CHNG_LANGUAGE('[done...]');
            exit();
        }

        if ($makehome_page) {
            set_cache('home_page', $makehome_page);
            echo CHNG_LANGUAGE('[done...]');
            exit();
        }
        if ($delete_page) {
            $deletearray = get_pages_under_page_id($delete_page);
            foreach ($deletearray as $del)
                if ($del)
                    mysql_query("delete from pages where id=$del");
            mysql_query("delete from pages where id=$delete_page");
            //slave
            $error_msg = "Deleted done!";
            if ($aj)
                exit(); else
                header('Location: ' . SITE_LINK);
        }



        if (isset($addnewpage)) {
            if (!$newpagesitletitle) {
                $newpagesitletitle = '[Click to edit...]';
            }
            if ($newpagetreechangeselect) {
                ////copy from page
                $result = mysql_fetch_array(mysql_query("Select * From pages where id='$newpagetreechangeselect' LIMIT 1"));
                mysql_query("INSERT INTO `pages` SET powers='$result[powers]', page_place='$result[page_place]', page_sort='$result[page_sort]', page_active='$result[page_active]', template='$result[template]', page_name = '$newpagesitletitle',page_key = '$result[page_cont]',description = '$result[description]',`slave`='" . $addnewpage . "', last_update='" . time() . "'");
                $mysql_insert_id=mysql_insert_id();
//copy side css
                set_cache('pagesidecss' . $mysql_insert_id, get_cache('pagesidecss' . $newpagetreechangeselect));
                //copy side visible
                $all_side[1] = 'top1';
                $all_side[2] = 'top2';
                $all_side[3] = 'left1';
                $all_side[4] = 'left2';
                $all_side[5] = 'right1';
                $all_side[6] = 'right2';
                $all_side[7] = 'down1';
                $all_side[8] = 'down2';
                foreach ($all_side as $jjhv){
                    if (get_cache('side_view_' . $jjhv . '_' . $newpagetreechangeselect) == 'true'){
                        set_cache('side_view_' . $jjhv . '_' . $mysql_insert_id,'true') ;
                    }
                }
            }else {
                mysql_query("INSERT INTO `pages` SET page_active='1', template='green', page_name = '$newpagesitletitle',page_cont = 'Click to edit...',description = 'Click to edit...',`slave`='" . $addnewpage . "', last_update='" . time() . "'");
                $mysql_insert_id=mysql_insert_id();
            }
            if ($relo)
                header('Location: '. SITE_LINK .'?id=' . $mysql_insert_id);
        }
        if ($page_auto) {
            $result = mysql_query("Select * From pages where BINARY page_name like '%" . utf8_encode($page_auto) . "%' LIMIT 10");
            while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                echo utf8_encode("<li onclick=\"fill('?id=" . $row[0] . "','" . $row[1] . "');\">" . $row[1] . "</li>");
            }
            exit();
        }
        $file_button_place = file( TEMPLATE_PATH . 'sfhati/template.inc');
        foreach ($file_button_place as $k) {
            $k_arr = explode(';', $k);
            $sel_t[$k_arr[0]] = $k_arr[1];
        }
        if (is_array($button_place))
            foreach ($button_place as $k => $v) {
                $template_page_scriptx.="$coma'" . trim($v) . "':'" . trim($v) . "'";
                $coma = ',';
            }
        if (is_array($sel_t))
            foreach ($sel_t as $v => $k) {
                $template_page_scriptxx.="$coma1'" . trim($v) . "':'" . trim($k) . "'";
                $coma1 = ',';
            }
        if (is_array($sel_p))
            foreach ($sel_p as $v => $k) {
                $template_page_scriptxxx.="$coma2'" . trim($v) . "':'" . trim($k) . "'";
                $coma2 = ',';
            }
        /*         * **************Search page title*************** */
        if ($get_PG) {
            echo ("<option value='n'>Create new page</option>");
            $result = mysql_query("Select * From pages  LIMIT 300");
            while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                echo ("<option value='$row[0]'>$row[1]</option>");
            }
            exit();
        }
        if (!$show_sub)
            $show_sub = 0;
        /*         * **************************AJAX Prossess****************************************** */

        if ($aj) {
            /* pages edit */
            if ($renderer) {
                if ($renderer == "page_place") {
                    $button_place_arr = explode(",", $value);
                    foreach ($button_place_arr as $k) {
                        if ($k) {
                            foreach ($button_place as $key => $val) {
                                if (trim(CHNG_LANGUAGE($val)) == trim($k))
                                    $button_place_echo.=$key . ",";
                            }
                        }
                    } //id   : 'pageelementid',
                    mysql_query("UPDATE `pages` SET `$renderer` = '" . mysql_escape_string($button_place_echo) . "' WHERE id =$pageelementid LIMIT 1 ;");
                    echo CHNG_LANGUAGE($value);
                }else {
                    if ($base64)
                        $value = base64_decode($value);
                    $value = str_replace('&quot;', '"', $value);
                    mysql_query("UPDATE `pages` SET `$renderer` = '" . mysql_escape_string($value) . "' WHERE `id` =$pageelementid LIMIT 1 ;");
                    if ($renderer == "template") {
                        echo CHNG_LANGUAGE($sel_t[$value]);
                    } elseif ($renderer == "powers") {
                        echo CHNG_LANGUAGE($sel_p[$value]);
                    } elseif (!$noecho) {
                        echo CHNG_LANGUAGE($value);
                    }
                }
            }

            /*             * ****************sort pages*************** */
            if ($_GET[listItem]) {
                foreach ($_GET[listItem] as $key => $value) {
                    $value = addslashes($value);
                    mysql_query("UPDATE pages SET page_sort = '$key' WHERE ID = '$value'");
                }
                echo CHNG_LANGUAGE("[sort done!]<br>");
            }
            /*             * **************active page*************** */
            if ($page_act) {
                $row_active = mysql_fetch_array(mysql_query("select page_active,page_name from pages where id=$page_act"));
                $page_acti = ($row_active[0] == 1) ? 0 : 1;
                $pageacti = ($row_active[0] == 1) ? 'not active' : 'active';
                mysql_query("UPDATE `pages` set page_active='$page_acti' where id=$page_act");
                echo ("page $row_active[1] is $pageacti");
                exit();
            }

            exit();
        }
    }
}


$epath = (get_root_page($id));
if (is_array($epath)) foreach ($epath as $kepath) {
    if ($kepath[0])
        $more_title.= " | $kepath[1]";
    //$more_title.= "<a href='/?id=$kepath[0]'>$kepath[1]</a>  &gt; ";
    //$more_title.= "<a href='/'>[home]</a> ";
}