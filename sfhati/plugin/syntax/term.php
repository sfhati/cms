<?php
/************codecss**********************/

$_SESSION[syntax_CSS]= get_cache('pagesidecssdefult').get_cache('pagesidecss' . $id).$_SESSION[syntax_CSS];
    $cssresult = getResults("select string1,string2 from table3 where md5='CSS_GROUP'");
    if (is_array($cssresult))
        foreach ($cssresult as $cssrow) {
                $_SESSION[syntax_CSS].= $cssrow['string2'];
        }


$codecss='codecss' . md5($_SESSION[syntax_CSS]). '.css';
$filecodecss = CACHE_PATH .$codecss ;     
if(!file_exists($filecodecss)) {
    filewrite($filecodecss, $_SESSION[syntax_CSS]);
}

$my_simple_tmplt=str_replace('stylecsscode.css', CACHE_LINK.$codecss, $my_simple_tmplt);