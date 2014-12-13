<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');
$sitelinkthispage=getAddress();
$sitelinkthispageencoding=urlencode($sitelinkthispage);
/* checkinternetconnection */
if ($checkinternetconnection) {
    if (!$_SESSION['IDUSER_ADMIN'])
        echo 'logu';
    exit();
}
/* echo CSS code from database */
if ($uploadimageNiceEditor)
    include('upload_niceEditor.php');


if($image_thump) {
    $content= mysql_fetch_array(mysql_query("Select * From pages where id=$image_thump"));
    header("Content-Type: image/gif");
    if($content[image]) echo $content[image];
    else echo base64_decode('R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=='); //spacer gif image
    exit();
}

if ($_SESSION['IDUSER_ADMIN']) {
    include ('my_account.php');
    
     /*     * **********************option setting css******************************* */
    if ($loadopensetting) {
        $allcssfiles = createcssfile(1);
        foreach ($allcssfiles as $k => $v) {
            $filepathcss = '/' . str_replace(SITE_PATH, '', $v);
            $tmpfilepathcss =  TMP_FOLDER . "/" . md5($filepathcss) . ".css";
            echo "<div idfor='" . md5($k) . "' class='screencss' >$filepathcss</div>\n";
        }
        exit();
    }
    if ($loadlinkcsssetting) {


        $allcssfiles = createcssfile(1);
        foreach ($allcssfiles as $k => $v) {
            $filepathcss = '/' . str_replace(SITE_PATH, '', $v);
            $tmpfilepathcss = TMP_FOLDER . "/" . md5($filepathcss) . ".css";
            $handle = fopen(SITE_PATH . $tmpfilepathcss, 'w');
            fwrite($handle, CHNG_LANGUAGE(compress_css($v)));
            fclose($handle);
            echo "<link id='" . md5($k) . "' media='screen' href='".SITE_LINK."$tmpfilepathcss?" . time() . "' type='text/css' rel='stylesheet'/>\n";
        }

        exit();
    }
    /*     * ***********Get element style*************************** */
    if ($getelementstyle) {
        $extra = "onclick='return jQuery(this).{$getelementstyle}(this);'";
        echo '<li><a href="javascript:" ' . $extra . ' class="no_item"><img src="'. TEMPLATE_LINK .'panel/images/thumb_none.png" /></a></li>';
        echo implode('', file(Main_Domain . "?get_element=$getelementstyle"));
        exit();
    }

    /*     * **********************Get templates for plugins********************* */
    //

    //Select * From table3 where md5='widget' order by string1
    $selectwidget = mysql_query("Select string1,string2,string3 From table3 where md5='widget' group by string3 ORDER BY `string1` ASC");
    while ($rowselectwidget = mysql_fetch_array($selectwidget, MYSQL_BOTH)) {
        $titlewidj = mysql_fetch_array(mysql_query("Select string3 From table3 where md5='plugin_show' and string2='$rowselectwidget[string3].inc' limit 1"));
        if (!trim($titlewidj[string3]))
            $titlewidj[string3] = $rowselectwidget[string3];
        $selecttemplates.="<command action=\"selecttemplates\" onclick=\"doaction(this)\" vlu=\"$rowselectwidget[string3]\" icon=\"option selecttemplatex selecttemplate_$rowselectwidget[string1] selecttemplates_$rowselectwidget[string3]\" label=\"$rowselectwidget[string2]\"></command>";
    }
   



 
    /* Get all pages name */
    $resultp = mysql_query("Select * From pages where slave=0 ORDER BY page_sort  ASC");
    while ($rowp = mysql_fetch_array($resultp, MYSQL_BOTH)) {
        $allpagescode.=" <option value='$rowp[id]'> $rowp[page_name]</option>";
        $underpages = get_pages_under_page_id($rowp[0]);
        if (is_array($underpages)) {
            foreach ($underpages as $unk) {
                $ipage = str_replace('&gt; ', '', $unk);
                $allpagescode.=" <option value='$ipage' $selectedp> " . getnamepage($ipage) . "</option>";
            }
        }
    }





    /* Get ALL STYLES FOR EDITOR allSfhatistyles */


    /*     * ******************Editor get images**************************** */
    if(!is_dir(TMP_PATH.'thumb/'))
            mkdir(TMP_PATH.'thumb/');
    $dir =  UPLOADED_PATH;
    $allSfhatifolderstart = '   <div counter="0" id="createUploader_sfhatieditor"    class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
    $allSfhatifolderstartswf = '<div counter="0" id="createUploader_sfhatieditorswf" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
    $allSfhatifolderstartflv = '<div counter="0" id="createUploader_sfhatieditorflv" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
    $allSfhatifolderstartmp3 = '<div counter="0" id="createUploader_sfhatieditormp3" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
    if ($dh = opendir($dir)) {
        while (($dirfile = readdir($dh)) !== false) {
            if ($dirfile != '.' && $dirfile != '..' && $dirfile != '.svn') {
                if (filetype($dir . $dirfile) == 'dir') {
                    $allSfhatifolders.='<img namevalue="' . $dirfile . '" tooltip=" ' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  ext="image" class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/folder.png"/>';
                    $allSfhatifoldersflv.='<img namevalue="' . $dirfile . '" tooltip=" ' . $dirfile . '" title=" ' . $dirfile . '" alt=" ' . $dirfile . '"  ext="flv" class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/folder.png"/>';
                    $allSfhatifoldersmp3.='<img namevalue="' . $dirfile . '" tooltip=" ' . $dirfile . '" title=" ' . $dirfile . '" alt=" ' . $dirfile . '"  ext="mp3" class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/folder.png"/>';
                    $allSfhatifoldersswf.='<img namevalue="' . $dirfile . '" tooltip=" ' . $dirfile . '" title=" ' . $dirfile . '" alt=" ' . $dirfile . '"  ext="swf" class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/folder.png"/>';
                }
                $mintyp = strtolower(end(explode('.', $dirfile)));
                if ($mintyp == 'jpg' || $mintyp == 'png' || $mintyp == 'gif' || $mintyp == 'jpge' || $mintyp == 'bmp') {
       if (!file_exists(TMP_PATH.'thumb/'.$dirfile))
            exec(_CONVERT_PATH . "convert " . UPLOADED_PATH . $dirfile . " -resize 100x100 " . TMP_PATH.'thumb/'.$dirfile);
                     
                    $allSfhatiimagesx.='<img namevalue="' . UPLOADED_LINK . $dirfile . '" ext="image" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '" class="SfhatiFixClickimg" src="' . TMP_LINK.'thumb/'.$dirfile . '"/>';
                } else if ($mintyp == 'flv') {
                    $allSfhatiimagesxflv.='<img namevalue="' . UPLOADED_LINK . $dirfile . '" ext="flv" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/flv70.png"/>';
                } else if ($mintyp == 'mp3') {
                    $allSfhatiimagesxmp3.='<img namevalue="' . UPLOADED_LINK . $dirfile . '" ext="mp3" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/mp370.png"/>';
                } else if ($mintyp == 'swf') {
                    $allSfhatiimagesxswf.='<img namevalue="' . UPLOADED_LINK . $dirfile . '" ext="swf" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/swf70.png"/>';
                }
            }
        }
        closedir($dh);
    }
    $allSfhatiimages = $allSfhatifolderstart . $allSfhatifolders . $allSfhatiimagesx;
    $allSfhatiflv = $allSfhatifolderstartflv . $allSfhatifoldersflv . $allSfhatiimagesxflv;
    $allSfhatimp3 = $allSfhatifolderstartmp3 . $allSfhatifoldersmp3 . $allSfhatiimagesxmp3;
    $allSfhatiswf = $allSfhatifolderstartswf . $allSfhatifoldersswf . $allSfhatiimagesxswf;
    $allSfhatifolders = '';
    $allSfhatiimagesx = '';
    $allSfhatifoldersflv = '';
    $allSfhatiimagesxflv = '';
    $allSfhatifoldersmp3 = '';
    $allSfhatiimagesxmp3 = '';
    $allSfhatifoldersswf = '';
    $allSfhatiimagesxswf = '';

    if ($getimagesfromfolderer) {
        header('Location: '. SITE_LINK .'?getimagesfromfolder=' . $_SESSION['uploadsfhatieditorfolder'] . "&ext=$ext");
        exit();
    }
    if ($getimagesfromfolder) {
        if ($getimagesfromfolder != '.') {

            $allSfhatifolderstart = '<div counter="0" id="createUploader_sfhatieditor" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
            $allSfhatifolderstartswf = '<div counter="0" id="createUploader_sfhatieditorswf" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
            $allSfhatifolderstartflv = '<div counter="0" id="createUploader_sfhatieditorflv" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';
            $allSfhatifolderstartmp3 = '<div counter="0" id="createUploader_sfhatieditormp3" class="tooltip-down" style="top:27px;float: left;height: 70px;width: 70px;background: url('. TEMPLATE_LINK .'panel/images/image_add_a70.png)" tooltip="[upload your file]"></div>';

            $allSfhatifolders = '<img ext="' . $ext . '" namevalue="' . dirname($getimagesfromfolder) . '" tooltip="Go To  UP" class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/upfolder.png"/>';

            $dir = UPLOADED_PATH . $getimagesfromfolder . '/';
            if ($dh = opendir($dir)) {
                while (($dirfile = readdir($dh)) !== false) {
                    if ($dirfile != '.' && $dirfile != '..' && $dirfile != '.svn') {
                        if (filetype($dir . $dirfile) == 'dir') {
                            $allSfhatifolders.='<img ext="' . $ext . '" namevalue="' . $getimagesfromfolder . '/' . $dirfile . '" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickfolder" src="'. TEMPLATE_LINK .'panel/images/folder.png"/>';
                        }

                        $mintyp = strtolower(end(explode('.', $dirfile)));
                        if ($mintyp == 'jpg' || $mintyp == 'png' || $mintyp == 'gif' || $mintyp == 'jpge' || $mintyp == 'bmp') {
                            $allSfhatiimagesx.='<img ext="' . $ext . '" namevalue="' . UPLOADED_LINK . $getimagesfromfolder . '/' . $dirfile . '" tooltip=" ' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="' . UPLOADED_LINK . $getimagesfromfolder . '/' . $dirfile . '"/>';
                        }
                        if ($mintyp == 'flv') {
                            $allSfhatiimagesxflv.='<img ext="' . $ext . '" namevalue="' . UPLOADED_LINK . $getimagesfromfolder . '/' . $dirfile . '" tooltip="' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/flv70.png"/>';
                        }
                        if ($mintyp == 'swf') {
                            $allSfhatiimagesxswf.='<img ext="' . $ext . '" namevalue="' . UPLOADED_LINK . $getimagesfromfolder . '/' . $dirfile . '" tooltip=" ' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/swf70.png"/>';
                        }
                        if ($mintyp == 'mp3') {
                            $allSfhatiimagesxmp3.='<img ext="' . $ext . '" namevalue="' . UPLOADED_LINK . $getimagesfromfolder . '/' . $dirfile . '" tooltip=" ' . $dirfile . '" title="' . $dirfile . '" alt="' . $dirfile . '"  class="SfhatiFixClickimg" src="'. TEMPLATE_LINK .'library/images/mp370.png"/>';
                        }
                    }
                }
                closedir($dh);
            }
            $allSfhatiimages = $allSfhatifolders . $allSfhatiimagesx;
            $allSfhatiimages = $allSfhatifolderstart . $allSfhatifolders . $allSfhatiimagesx;
            $allSfhatiflv = $allSfhatifolderstartflv . $allSfhatifolders . $allSfhatiimagesxflv;
            $allSfhatimp3 = $allSfhatifolderstartmp3 . $allSfhatifolders . $allSfhatiimagesxmp3;
            $allSfhatiswf = $allSfhatifolderstartswf . $allSfhatifolders . $allSfhatiimagesxswf;
        }
        $_SESSION['uploadsfhatieditorfolder'] = $getimagesfromfolder;
        if ($ext == 'image')
            echo $allSfhatiimages;
        if ($ext == 'mp3')
            echo $allSfhatimp3;
        if ($ext == 'swf')
            echo $allSfhatiswf;
        if ($ext == 'flv')
            echo $allSfhatiflv;
        exit();
    }
    //upload sfhati editor 
    if ($sfhatieditor) {
        if (!$_SESSION['uploadsfhatieditorfolder'])
            $_SESSION['uploadsfhatieditorfolder'] = '.';
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'swf', 'flv', 'mp3');
        $sizeLimit = 300000000;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $dir = UPLOADED_PATH . $_SESSION['uploadsfhatieditorfolder'] . '/';
        $result = $uploader->handleUpload($dir);
        $myfilename = preg_replace("/[^a-zA-Z0-9.-]+/", '_', $_GET['qqfile']);
        $widthXheight = @getimagesize($dir . $myfilename);
        $arr = array('success' => true, 'xet' => 'image', 'filename' => UPLOADED_LINK . $_SESSION['uploadsfhatieditorfolder'] . '/' . $myfilename, 'width' => $widthXheight[0], 'height' => $widthXheight[1]);
        echo htmlspecialchars(json_encode($arr), ENT_NOQUOTES);

        exit();
    }
    //upload template inc
    if ($sfhatieditortemp) {
        $allowedExtensions = array('inc');
        $sizeLimit = 300000000;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

        $dir = TEMPLATE_PATH . 'templates/';
        $result = $uploader->handleUpload($dir);
        $myfilename = preg_replace("/[^a-zA-Z0-9.-]+/", '_', $_GET['qqfile']);
        $myfilenamex = $sfhatieditortemp . "_" . time();
        rename($dir . $myfilename, $dir . $myfilenamex . '.inc');

        $arr = array('success' => true);
        echo htmlspecialchars(json_encode($arr), ENT_NOQUOTES);
        AddPluginTemplate($sfhatieditortemp, $myfilenamex,0, basename($_GET['qqfile'], '.inc'), 0);

        exit();
    }
    /*     * ************************************************************************** */
    if ($GetAllTemplateFromPlugin) {
        $presult = mysql_query("Select * From table3 where md5='widget' and string1='$GetAllTemplateFromPlugin'");
        while ($prow = mysql_fetch_array($presult, MYSQL_BOTH)) {
            echo "<li onclick=\"alert('$prow[string3]: $prow[id]')\" class=\"context-menu-item  icon icon-option\"><span>$prow[string2]</span></li>";
        }exit();
    }
    if ($saveanewtitle) {
        set_cache('title', $saveanewtitle);
        echo CHNG_LANGUAGE('[done...]');
        exit();
    }
    if ($pagesidecss) {
        set_cache('pagesidecss' . $id, base64_decode($pagesidecss));
        if ($xdefult)
            set_cache('pagesidecssdefult', base64_decode($pagesidecss));
        echo CHNG_LANGUAGE('[done...]');
        exit();
    }
    if ($erazeidepagechangex) {
        set_cache('pagesidecss' . $id, '');
        if ($xdefult) {
            mysql_query("delete FROM `table3` where md5='SETTING' and string1 like 'pagesidecss%'");
        }
        exit();
    }
    if ($renderer_jax && $TYPOGRAHICALIZER == 'page') {
        if ($base64)
            $value_jax = base64_decode($value_jax);
        $value_jax = str_replace('&quot;', '"', $value_jax);
        mysql_query("UPDATE `pages` SET `$renderer_jax` = '" . mysql_escape_string($value_jax) . "' WHERE `id` =$id LIMIT 1 ;");
        if ($noecho)
            echo CHNG_LANGUAGE('[' . $noecho . ']');
        else
            echo CHNG_LANGUAGE($value_jax);

        exit();
    }
    if ($by_count_nu)
        $_SESSION['count_nu'] = $by_count_nu;
    /* delete templates */
    if ($deletetemplatew) {
        $this_widget = mysql_fetch_array(mysql_query("select * from table3 where id='$deletetemplatew' and md5='widget' limit 1"));
        if ($this_widget[type] == 1) {
            echo CHNG_LANGUAGE('[you cant Delete the defult template!]');
        } else {
            mysql_query("delete from table3 where id='$deletetemplatew' and md5='widget' limit 1");

            $widgetD = mysql_query("select string1 from table3 where string2='$this_widget[string3].inc' and md5='plugin_show'");
            while ($widgetDrow = mysql_fetch_array($widgetD, MYSQL_BOTH)) {
                $widgetDscrpt.="$(\"#widget_$widgetDrow[string1]\").remove();";
            }

            mysql_query("delete from table3 where string2='$this_widget[string3].inc' and md5='plugin_show'");
            @unlink(TEMPLATE_PATH . 'templates/' . $this_widget[string3] . '.inc');
            if (function_exists('WIDGET_Delete_' . $this_widget['string1']))
                eval('WIDGET_Delete_' . $this_widget['string1'] . '(' . $this_widget['string3'] . ');');
            echo "<script>$(\"#optionwidgetn option[value='$deletetemplatew']\").remove();$widgetDscrpt</script>" . CHNG_LANGUAGE('[Delete done]');
        }
        exit();
    }

    /* change template for widgets */
    if ($changetemplate && $templatenamed) {
        $this_widget = mysql_fetch_array(mysql_query("select * from table3 where string1='$changetemplate' and md5='plugin_show' limit 1"));
        mysql_query("UPDATE table3 set string2='$templatenamed.inc' where string1='$changetemplate' and md5='plugin_show' limit 1");
        exit();
    }

    if ($EFT) {
        $_SESSION['uploaded'] = TEMPLATE_PATH . 'templates/';
        if (end(explode('.', $EFT)) != 'inc')
            $EFT = $EFT . '.inc';
        header('Location: ' . PLUGIN_LINK . 'filemanager/ajax_text_editor.php?path=' . TEMPLATE_PATH . 'templates/' . $EFT);
        exit();
    }
    $cssresult = mysql_query("select string1,string2 from table3 where md5='CSS_GROUP'");
    while ($cssrow = mysql_fetch_array($cssresult, MYSQL_BOTH)) {
        $groupCSS.="<style id='{$cssrow[string1]}'> {$cssrow[string2]} </style>";
    }

    /*     * *********Svae z-index sorting************************************************* */
    if ($z_indexSort && $id_widget) {
        $result_wed = mysql_query("select `string1`,`string2`,`number2` from table3 where md5='plugin_show' and number1 !='1' and number1 !='2' ORDER BY number2  ASC");
        while ($plugin_row_wed = mysql_fetch_array($result_wed, MYSQL_BOTH)) {
            $ksort[] = $plugin_row_wed[string1];
        }
        //|| $z_indexSort=='send_to_back' || $z_indexSort=='bring_forward' || $z_indexSort=='send_backward'){

        if ($z_indexSort == 'bring_to_front') {
            krsort($ksort);
            $oldkey = array_search($id_widget, $ksort);
            $newkey = array_search(array_shift(array_values($ksort)), $ksort) + 1;
            $ksort[$newkey] = $ksort[$oldkey];
            unset($ksort[$oldkey]);
            $n = 0;
        } elseif ($z_indexSort == 'send_to_back') {
            $oldkey = array_search($id_widget, $ksort);
            $newkey = array_search(array_shift(array_values($ksort)), $ksort) - 1;
            $ksort[$newkey] = $ksort[$oldkey];
            unset($ksort[$oldkey]);
            $n = 1;
        } elseif ($z_indexSort == 'bring_forward') {
            $n = 0;
            $nn = 0;
            foreach ($ksort as $k => $v) {
                if ($ksort[$k] == $id_widget) {
                    $asort[$nn + 1] = $v;
                    $n = 1;
                } else {
                    if ($n == 1) {
                        $asort[$nn - 1] = $v;
                        $n = 0;
                    }else
                        $asort[$nn] = $v;
                }
                $nn++;
            }
            $ksort = &$asort;
            $n = 0;
        }elseif ($z_indexSort == 'send_backward') {
            $n = 0;
            $nn = 0;
            foreach ($ksort as $k => $v) {

                if ($ksort[$k] == $id_widget) {
                    $asort[$nn - 1] = $v;
                    $n = 1;
                } else {
                    if ($n == 1) {
                        $asort[$nn] = $v;
                        $n = 0;
                    }else
                        $asort[$nn + 1] = $v;
                }
                $nn++;
            }
            $ksort = &$asort;
            $n = 0;
        }

        //groupCSS_widget592811



        foreach ($ksort as $k => $v) {
            $k = $k + $n;
            mysql_query("UPDATE `table3` SET `number2` = '$k' WHERE string1 = $v and md5='plugin_show' LIMIT 1 ;");
            $oldcsscode = mysql_fetch_array(mysql_query("select string2 from table3 where string1 = 'groupCSS_widget$v' and md5='CSS_GROUP' limit 1"));
            $oldcsscode = preg_replace('/\#widget_' . $v . '{z-index:[a-zA-Z0-9-_:#.() ]+;}/i', '', $oldcsscode[string2]) . "#widget_$v{z-index:$k;}";
            mysql_query("UPDATE `table3` SET `string2` = '$oldcsscode' WHERE string1 = 'groupCSS_widget$v' and md5='CSS_GROUP' LIMIT 1 ;");
            $scriptEX.="$('#groupCSS_widget$v').append('#widget_$v{z-index:$k;}');";
        }
        echo $scriptEX;
        exit();
    }
    /* CSS_theme_save = css code
     * CSS_theme_val = key for groub style
     */
    if (isset($CSS_theme_save)) {
        if ($CSS_theme_save == 'dontsavejustecho') {
            echo "<script>window.top.window.$('.too_image_preloader').fadeOut('fast'); window.top.$('#result_theme_panel').text('" . CHNG_LANGUAGE("[Saved style Success]") . "');window.top.window.$('#iframe_css').attr('src',''); </script>";
            exit();
        }
        if ($CSS_theme_save == 'none'){
            $CSS_theme_save = '';
        }
        
            $CSS_theme_save=convetHTML40toHtml($CSS_theme_save);
        
        mysql_query("delete from table3 where md5='CSS_GROUP' and string1='$CSS_theme_val'");
        mysql_query("insert into table3 set md5='CSS_GROUP',string1='$CSS_theme_val',string2='".mysql_real_escape_string($CSS_theme_save)."'");
        createcssfile();
        header('Location: ' . SITE_LINK . '?CSS_theme_save=dontsavejustecho');
        exit();
    }
    if (isset($savejqueryui)) {
        set_cache('savejqueryui', $savejqueryui);
        exit();
    }
    if ($unsavejqueryui) {
        set_cache('savejqueryui', '..');
        exit();
    }

    if ($side_view) {
        set_cache('side_view_' . $side_view . '_' . $id, $isequal);
        echo CHNG_LANGUAGE("[Done Update side View]");
        exit();
    }

    /* load themes from main domain */
    $ALLWidget='';
    $_SESSION['LOADTHEME']='';
    if (!$_SESSION['LOADTHEME']) {
        $alltememcoc = 0;
        $themearray = @file(Main_Domain . '?get_list_files');

        /* load local theme */
        $mythemedir = TEMPLATE_PATH . 'my_theme/';
        if ($dh = opendir($mythemedir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..' && $file != '.svn' && is_dir($mythemedir . $file)) {
                    $themearray[] = 'mytheme_' . $file;
                }
            }
            closedir($dh);
        }

        if (is_array($themearray)) {
            foreach ($themearray as $y) {
                if (strpos(trim($y), 'theme_')) {
                    $y = str_replace('mytheme_', '', $y);
                    $ALLTheme.="<div class='animationpos' for='my_theme' title=\"" . trim($y) . "\" style=\"background-image: url(". TEMPLATE_LINK ."my_theme/" . trim($y) . "/thumb.jpg)\"></div>";
                } else {
                    $ALLTheme.="<div class='animationpos' title=\"" . trim($y) . "\" style=\"background-image: url(" . Main_Domain . "uploaded/themes/" . trim($y) . "/thumb.jpg)\"></div>";
                }
            }
            $_SESSION['LOADTHEME'] = $ALLTheme;
        }

        // loop template plugin box & widget
        $content_select_box = '';
        $result_indexZ = mysql_query("Select * From table1 where md5='PLUGIN_S' and bool1=1 group by string1 ORDER BY string1  ASC");
        while ($plugin_rowZ = mysql_fetch_array($result_indexZ, MYSQL_BOTH)) {
            if (file_exists(PLUGIN_PATH . trim($plugin_rowZ[string1]) . "/widget.inc")) {
                if (function_exists('WIDGET' . trim($plugin_rowZ[string1]))) $dynamicplugin=1; else $dynamicplugin=0;
                if (file_exists(PLUGIN_PATH . trim($plugin_rowZ[string1]) . "/thumb.jpg"))
                    $ALLWidget.="<img class='tooltip-down widget_draggable' dynamic='$dynamicplugin' rel=\"" . trim($plugin_rowZ[string1]) . "\" tooltip=\"[" . str_replace('.inc', '', $plugin_rowZ[string1]) . "]\" src=\"". PLUGIN_LINK . trim($plugin_rowZ[string1]) . "/thumb.jpg\"/>";
                else
                    $ALLWidget.="<img class='tooltip-down widget_draggable' dynamic='$dynamicplugin' rel=\"" . trim($plugin_rowZ[string1]) . "\" tooltip=\"[" . str_replace('.inc', '', $plugin_rowZ[string1]) . "]\" src=\"". TEMPLATE_LINK ."panel/images/default_widget.jpg\"/>";
            }
        }
        $_SESSION['LOADALLWidget'] = $ALLWidget;

// loop template plugin setting    
        $result_indexZ = mysql_query("Select * From table1 where md5='PLUGIN_S' and bool1=1 group by string1 ORDER BY string1  ASC");
        while ($plugin_rowZ = mysql_fetch_array($result_indexZ, MYSQL_BOTH)) {
            if (file_exists(PLUGIN_PATH . trim($plugin_rowZ[string1]) . "/setting.inc")) {
                if (file_exists(PLUGIN_PATH . trim($plugin_rowZ[string1]) . "/thumb.jpg"))
                    $ALLsetting.="<a for='" . trim($plugin_rowZ[string1]) . "' href='". SITE_LINK ."?chng_tpl=system_setting&plgn=" . trim($plugin_rowZ[string1]) . "' class='iframe'><img class='tooltip-down' rel=\"" . trim($plugin_rowZ[string1]) . "\" tooltip=\"[" . str_replace('.inc', '', $plugin_rowZ[string1]) . "]\" src=\"". PLUGIN_LINK . trim($plugin_rowZ[string1]) . "/thumb.jpg\"/></a>";
                else
                    $ALLsetting.="<a for='" . trim($plugin_rowZ[string1]) . "' href='". SITE_LINK ."?chng_tpl=system_setting&plgn=" . trim($plugin_rowZ[string1]) . "' class='iframe'><img class='tooltip-down' rel=\"" . trim($plugin_rowZ[string1]) . "\" tooltip=\"[" . str_replace('.inc', '', $plugin_rowZ[string1]) . "]\" src=\"". TEMPLATE_LINK ."panel/images/default_widget.jpg\"/></a>";
            }
        }
        $_SESSION['LOADALLsetting'] = $ALLsetting;
    }else {
        $ALLTheme = $_SESSION['LOADTHEME'];
        $ALLWidget = $_SESSION['LOADALLWidget'];
        $ALLsetting = $_SESSION['LOADALLsetting'];
    }


 

/**********open plugin setting**************/
    if($chng_tpl=='plugin_setting' && $iswidgetcode){     
        $thispluginsetting = mysql_fetch_array(mysql_query("select * from table3 where md5='plugin_show' and string1='$iswidgetcode' LIMIT 1") , MYSQL_ASSOC );
            $ThisPlugin_id = $thispluginsetting[string1];
            $ThisPlugin_caption = $thispluginsetting[string3];
            $ThisPlugin_template = $thispluginsetting[string2];
            $ThisPlugin_main = $thispluginsetting[string5];
    }
    if($dotempltoption){
if (function_exists('WIDGET' . $dotempltoption)){
    $dynamicwidget=1;
}
    }
    /* md5=widget ***********************
      type='1' cant delete
      string1=plugin folder name
      string2=template name or caption
      string3= template file name without .inc 
      bool2=set have control           
     */
    
    
    /* md5=plugin_show*******************************
     * String1 : id or time widget create
     * String2 : template plugin name .inc in templates folder
     * String3 : Title for boxs
     * String4 : name of template show this widget, all mean '' 
     * String5 : main plugin name
     * String7 : i,t,all
     * string8 : Dont show in this pages (	-1--114--id page-	)
     * number1 : widget side with(top1,top2,left1,left2,right1,right2,down1,down2,header,footer)
     * number2 : sort for boxs & z-index
     * number3 : withbox or not 1 or 0 (canceld)
     * number4 : premission box for
     * number5 : widget style 1,2,3,4,23,34
     * number6 : active plugin (0/1)
     * number7 : ajax load plugin (0/1)
     * number8 : Static or dynamic plugin (1/0)
     * number9 : cache time type plugin (1/2/3/4)
     * bool1 : Show title
     */
    if ($add_widget) {
        $sort = mysql_fetch_array(mysql_query("select `number2` from table3 where md5='plugin_show' ORDER BY `number2` DESC LIMIT 1"));
        $sort[0]++;
        $all_side[1] = 'top1';
        $all_side[2] = 'top2';
        $all_side[3] = 'left1';
        $all_side[4] = 'left2';
        $all_side[5] = 'right1';
        $all_side[6] = 'right2';
        $all_side[7] = 'down1';
        $all_side[8] = 'down2';
        $all_side[9] = 'header';
        $all_side[10] = 'footer';
     //   ctemplate,crunin,cpowers
        $sideis = array_search($side, $all_side);
        if ($sideis == 9 || $sideis == 10)
            $CSSGROUP = ' #widget_' . $add_widget . '{z-index:99;}  #widget_' . $add_widget . '{width:100px;} #widget_' . $add_widget . '{height:100px;}';
        
        if($ctemplate=='addnew'){//create new template widget newcaption
            $newcaption=  base64_decode($newcaption);
            $function='WIDGET' . $pluginname;
        if (function_exists($function))
           $ctemplate= $function( $newcaption );            
        }        
        
        
        $WIDGET_S = mysql_fetch_array(mysql_query("Select * From table3 where md5='widget' and id='$ctemplate' limit 1"));
        if($WIDGET_S[bool2]) $forcecontrolunit='1'; else $forcecontrolunit='0';
        if ($crunin=='i') {
            $showinpg = "-$id-";
        } else {
            $showinpg = '';
        }
  
        mysql_query("INSERT INTO `table3` SET "
                . "string1= '$add_widget',"
                . "string2 = '$WIDGET_S[string3].inc', "
                . "string3 = '" . CHNG_LANGUAGE($WIDGET_S[string2]) . "',"
                . "string4='$showinpg',"
                . "string5 = '$WIDGET_S[string1]',"
                . "string7 = '$crunin',"
                . "number1='$sideis',"
                . "number2='$sort[0]',"
                . "number3='1',"
                . "number4='$cpowers',"
                . "number5='1',"
                . "bool1='1',"
                . "md5='plugin_show'");
        $widget_id = mysql_insert_id();
     
        
        mysql_query("INSERT INTO `table3` SET string1= 'groupCSS_widget$add_widget',string2 = '$CSSGROUP',md5='CSS_GROUP'");
        $WIDGET_S = mysql_fetch_array(mysql_query('select * from table3 where md5="plugin_show" and id="' . $widget_id . '" ORDER BY `table3`.`id`  DESC limit 5 '));
         //       echo '<script>window.top.window.document.getElementById("formslide").reset(); window.top.window.msgplgn(1,"' . CHNG_LANGUAGE('[done add slide]') . ' ");</script>';
 
        echo CHNG_LANGUAGE("[Add widget done]...<script> forcecontrolunit=$forcecontrolunit; addedwidgetid=$widget_id; sidesnumber=$sideis; titlewedgitnew='$WIDGET_S[string3]'; tmpltcodename='$WIDGET_S[string2]';</script>");
        //header('Location: '.$_SERVER[HTTP_REFERER]);
        exit();
    }
    
    //Update Box save it to database

    if ($update_widget) { // update_widget=widget string1 
        $x = '';
        $update_widget = str_replace('widget_', '', $update_widget);
        $WdGiN = mysql_fetch_array(mysql_query("select * from table3 where md5='plugin_show' and string1='$update_widget' limit 1")); // get wedgit information
        foreach ($_GET[fildk] as $k => $v) {
            if ($_GET[fildk][$k] == 'string3') {
                $_GET[fildv][$k] = base64_decode($_GET[fildv][$k]); //title decode
                if ($WdGiN[string5] == 'dynamic_paragraph_editor') { // if dynamic paragraph title
                    mysql_query("UPDATE `table3` SET string1= '" . $_GET[fildv][$k] . "'  where md5='dynamictext' and type='$id' and number1='$update_widget' LIMIT 1");
                    echo CHNG_LANGUAGE("[Update widget done]");
                    exit();
                }
            } else
            if ($_GET[fildk][$k] == 'string4r') {
                $cx_I_T = explode('_', $_GET[fildv][$k]);
                $cx_I_T[1] = str_replace("-{$cx_I_T[1]}-", "", $WdGiN[string4]);
                $_GET[fildk][$k] = 'string4';
                $_GET[fildv][$k] = $cx_I_T[1];
            } else
            if ($_GET[fildk][$k] == 'string4rm') {
                $cx_I_T = explode('_', $_GET[fildv][$k]);
                $cx_I_T[1] = str_replace("-{$cx_I_T[1]}-", "", $WdGiN[string8]);
                $_GET[fildk][$k] = 'string8';
                $_GET[fildv][$k] = $cx_I_T[1];
            } else
            if ($_GET[fildk][$k] == 'string4') { //showin or run in , fildv[k]=val_idpage (All_3,t_3,i_3)
                $cx_I_T = explode('_', $_GET[fildv][$k]);
                if ($cx_I_T[0] == 'All') { // show in all pages
                    $_GET[fildv][$k] = '';
                    $x.="string7='All',string8='',";
                } else if ($cx_I_T[0] == 'i') { // show in page id
                    if ($WdGiN[string7] != $cx_I_T[0])
                        $WdGiN[string4] = '';
                    $cx_I_T[1] = str_replace("-{$cx_I_T[1]}-", "", $WdGiN[string4]) . "-{$cx_I_T[1]}-";
                    $x8 = str_replace("-{$cx_I_T[1]}-", "", $WdGiN[string8]);
                    $_GET[fildv][$k] = $cx_I_T[1];
                    $x.="string7='$cx_I_T[0]',string8='$x8',";
                } else if ($cx_I_T[0] == 't') { // show in template name
                    if ($WdGiN[string7] != $cx_I_T[0])
                        $WdGiN[string4] = '';
                    $x.="string7='t',";
                    $xc_TMPL = mysql_fetch_array(mysql_query("select template from pages where id = $cx_I_T[1] limit 1"));
                    $c4 = str_replace("-{$xc_TMPL['template']}-", "", $WdGiN[string4]) . "-{$xc_TMPL['template']}-";
                    $_GET[fildv][$k] = $c4;
                }
            }else
            if ($_GET[fildk][$k] == 'string8') {

                $cx_I_T = $_GET[fildv][$k];

                if (strpos('**' . $WdGiN[string8], $cx_I_T)) {
                    $_GET[fildv][$k] = str_replace($cx_I_T, "", $WdGiN[string8]);
                } else {
                    $_GET[fildv][$k] = $WdGiN[string8] . $cx_I_T;
                }
            }
            $x.=$_GET[fildk][$k] . "='" . $_GET[fildv][$k] . "',";
        }
        mysql_query("UPDATE `table3` SET  $x string1= '$update_widget' where md5='plugin_show' and string1= '$update_widget'");
        // echo "<script>alert(\"UPDATE `table3` SET  $x string1= '$update_widget' where md5='plugin_show' and string1= '$update_widget'\")</script>";
        echo CHNG_LANGUAGE("[Update widget done]");
        exit();
    }
    if ($wedgetdefault) {
        mysql_query("update table3 SET  bool2='0' where `string1`='$wedgetdefaultname' and `md5`='widget'");
        mysql_query("update table3 SET  bool2='1' where `id`='$wedgetdefault'");
        echo '<script>msgplgn(1,"' . CHNG_LANGUAGE('[Update widget done]') . ' ");</script>';
        exit();
    }
    if ($delete_widget) {
        $delete_widget = str_replace('widget_', '', $delete_widget);
        mysql_query("DELETE FROM `table3` where  string1= '$delete_widget' and md5='plugin_show'");
        echo CHNG_LANGUAGE("[Delete done]");
        exit();
    }
    /*     * ****************sort plugin*************** */
    if ($Order_plugin) {
        if (is_array($_GET['widget']))
            foreach ($_GET['widget'] as $key => $value) {
                mysql_query("UPDATE `table3` set number2='$key' where md5='plugin_show' and string1= '$value'");
            }
        echo CHNG_LANGUAGE("[Done sort]");
        exit();
    }

 
    /*     * ***********************CSS**************************** */
    /* upload image file */
    if ($do_uploadtheme) {
        $allowedExtensions = array("jpeg", "gif", "png", "jpg", "zip");
        $sizeLimit = 1000000;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $dir = TEMPLATE_PATH . 'sfhati/images/';
        $result = $uploader->handleUpload($dir);
        $myfilename = preg_replace("/[^a-zA-Z0-9.-]+/", '_', $_GET['qqfile']);
        $widthXheight = @getimagesize($dir . $myfilename);
        if ($idxx == 'ui_jquery_zip_css') {
            exec("unzip " . $dir . $myfilename . " -d " . $dir);
            @unlink($dir . $myfilename);
            $myfilename = time();
            $dir = TEMPLATE_LINK .'sfhati/images/jquery-ui-custom.css?';
        } else {
            $dir = TEMPLATE_LINK .'sfhati/images/';
        }
        $arr = array('success' => true, 'filename' => $dir . $myfilename, 'width' => $widthXheight[0], 'height' => $widthXheight[1]);
        echo htmlspecialchars(json_encode($arr), ENT_NOQUOTES);
        exit();
    }
    if ($do_upload) {
        $allowedExtensions = array("jpeg", "gif", "png", "jpg", "zip");
        $sizeLimit = 1000000;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        if ($idxx == 'pageimagechanger' || $idxx == 'siteiconchnger') {
            $dir = TMP_PATH ;
        } else {
            $dir = TEMPLATE_PATH . 'sfhati/images/';
        }
        $result = $uploader->handleUpload($dir);
        $myfilename = preg_replace("/[^a-zA-Z0-9.-]+/", '_', $_GET['qqfile']);
        $widthXheight = @getimagesize($dir . $myfilename);
        $arr = array('success' => true, 'filename' => $myfilename, 'width' => $widthXheight[0], 'height' => $widthXheight[1]);
        if ($idxx == 'siteiconchnger') {
            $dir = $dir . $myfilename;
            exec(_CONVERT_PATH . 'convert ' . $dir . ' -scale 24x24! ' . TEMPLATE_PATH . 'sfhati/images/favicon.png');
            exec(_CONVERT_PATH . 'convert ' . $dir . ' -scale 32x32! ' . $dir);
            exec(_CONVERT_PATH . 'convert ' . $dir . ' -scale 16x16! ' . SITE_PATH . 'favicon.ico');
            @unlink($dir);
        }
        if ($idxx == 'pageimagechanger') {
            //mysql_query("delete FROM `table3` where string2 like '%#pageimagechanger%' and md5='CSS_GROUP' ");
            $image1 = addslashes(fread(fopen($dir . $myfilename, 'r'), filesize($dir . $myfilename)));
            mysql_query("UPDATE `pages` SET `image` = '$image1', `image_name`='$myfilename' WHERE `id` =$id LIMIT 1 ;");
            @unlink($dir . $myfilename);
            exit();
        }
        echo htmlspecialchars(json_encode($arr), ENT_NOQUOTES);
        createcssfile();
        exit();
    }
    /* list image for background */
    $yextension = array("gif", "jpg", "png", "jpeg");
    $dir = TEMPLATE_PATH . 'sfhati/images/';

    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $file_extension = strtolower(substr(strrchr($file, "."), 1));
            if (in_array($file_extension, $yextension)) {
                $Texture_sfhati.="
                    <li class='texturePickerli' style=\"background: url(&quot;". TEMPLATE_LINK ."sfhati/images/$file&quot;) repeat scroll 50% 50% rgb(85, 85, 85);\" alt=\"". TEMPLATE_LINK ."sfhati/images/$file\"><a title=\"$file\" href=\"javascript:\">$file</a></li>
                    ";
            }
        }
        closedir($dh);
    }

    if ($html && $cssx) {
        $search = array('"', "'", '\\', '&quot;');
        $replace = array('', '', '', '');
        $cssx = str_replace($search, $replace, $_REQUEST['cssx']);
        $html = $_REQUEST['html'];
        $filename = TMP_PATH . session_id() . '_css.css';
        $handle = fopen($filename, 'w+');
        fwrite($handle, $cssx);
        fclose($handle);
        $filename = TMP_PATH . session_id() . '_html.html';
        $handle = fopen($filename, 'w+');
        fwrite($handle, $html);
        fclose($handle);
    }

    function get_file_css($file) {
        if (file_exists(TMP_PATH . session_id() . "_$file.$file")) {
            return "tmp/" . session_id() . "_$file.$file";
        } else {
            return "uploaded/$file.$file";
        }
    }

    if ($xml) {
        $filex = file("uploaded/$xml");
        foreach ($filex as $ln) {
            echo trim($ln);
            preg_match_all('/\s[^\s]*/', $ln, $out);
            print_r($out[0]);
            foreach ($out[0] as $x) {
                if (trim($x)) {
                    if (strpos($x, '<') !== FALSE) {
                        $last_tag_close = str_replace('<', '', $x);
                        echo $last_tag_close;
                    }
                    if (strpos($x, '=') !== FALSE) {
                        $xx = explode('=', $x);
                        $xx[0] = trim($xx[0]);
                        $xx[1] = trim($xx[1]);
                        if (strpos($xx[1], '/>') !== FALSE) {
                            $xx[1] = str_replace('/>', '', $xx[1]);
                            $xxx = "\n" . $last_tag_close;
                            //$last_tag_close='';
                        }else
                            $xxx = '';
                        $x = '<' . $xx[0] . '>' . $xx[1] . '</' . $xx[0] . '>' . $last_tag_close;
                        $x = str_replace('"', '', $x);
                    }
                    $xp.=$x . "\n";
                }
            }
        }
        $xp = str_replace('>>', '>', $xp);
        echo str_replace('><', '<', $xp);
        exit();
    }
}else {
    if ($chng_tpl == 'system_setting')
        $chng_tpl = ''; // &plgn=
}

    if($getWidgetById){
        echo admin_getWidgetById($getWidgetById);
        exit();
    }
