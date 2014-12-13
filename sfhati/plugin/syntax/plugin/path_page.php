<?php

function SYNTAX_path_page($template) {
    $template = SYNTAX_EASY($template);
    if ($template == 'O') {
        if ((get_cache('home_page') != $_GET[id]) && (get_root_page_id($_GET[id]) != get_cache('home_page')))
            $admin_page_text = "<a href='/'>" . getnamepage(get_cache('home_page')) . "</a> &#9658; ";  // for rtl &#9668;
        $epath = (get_root_page($_GET[id]));
        foreach ($epath as $kepath) {
            if ($kepath[id])
                $admin_page_text.= "<a href='". SITE_LINK ."?id=$kepath[id]'>$kepath[page_name]</a> &#9658; ";
        }
    }else {
        $path_page = get_root_page($template);
        if ($template)
            $path_page[] = @end(getResults("Select id,page_name From pages where id='$template'"));
        foreach ($path_page as $path_page_v) {
            $admin_page_text.="<a href='?chng_tpl=system_setting&plgn=pages&p=page&show_sub=$path_page_v[id]'>$path_page_v[page_name]</a> &gt;  ";
        }
    }
    return $admin_page_text;
}