<?php
/*************Clear cache files old than x day************************/
if($clearchachedayly=='21' || ($_SESSION['IDUSER_ADMIN'] && !$_SESSION['clearchache'])){
$dontdeletearrayfiles['Visitors']='Visitors';   //Visitors files counter
$dontdeletearrayfiles[get_cache('jshash1')]=get_cache('jshash1');   //main js admin file
$dontdeletearrayfiles[get_cache('jshash2')]=get_cache('jshash2');   //main js user file
$dontdeletearrayfiles[get_cache('csshash')]=get_cache('csshash');   //main css file

$dir = CACHE_PATH;
if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
        if ($file != '.' && $file != '..' && $file != '.svn' && filetype($dir . $file) != 'dir') {
            $GFR++;
            $d1 = filemtime($dir . $file);
            $d2 = time() - $d1;
            $time_cache = 60 * 60 * 24 * 1;
            if ($d2 > $time_cache) {
                if (!strposa($file, $dontdeletearrayfiles)) {
                    unlink($dir . $file);
                    $GBR++;
                } 
            }
        }
    }
    closedir($dh);
}
$_SESSION['clearchache']=1;
if($clearchachedayly=='21'){
echo "There are $GFR file in cache folder and we deleted $GBR files.";
exit();
}
}
