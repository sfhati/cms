<?php
//[tabs:"id","tab1","tab2","tab.."end tabs]
/*
id     : if you want know it
tab : used like > title->content or title->url:path to load ajax
Example: [tabs:"mytab","tab1->content tab1","tab2->url:?get_tab=1","tab3->url:?get_tab=2"end tabs]
 */
function SYNTAX_tabs($template) {
    $tm=time();
    $tabs=chk_var($template);
    if(!$tabs[0]) {
        $tabs[0]=substr(md5(rand(10000, 1000000)),0,8);
    }
    $i=0;
    foreach($tabs as $k=>$v) {
        if($k>0) {
            $x=explode("->",$v);
            if(strpos($x[1],'url:')!==false){
                $x[1]=str_replace('url:', '', $x[1]);
                $id_tab.='<li><a href="'.$x[1].'">'.$x[0].'</a></li>';
            }else{
                $i++;
                $id_tab.='<li><a href="#tab-'.$tabs[0].'-'.$i.'">'.$x[0].'</a></li>';
                $tab_content.='<div id="tab-'.$tabs[0].'-'.$i.'"><p>'.$x[1].'</p></div>';
            }            
        }
    }
    $fld="<div id=\"$tabs[0]\" class=\"tabs_box\"><ul> $id_tab </ul> $tab_content</div>";
    return  $fld ;
}


