<?php
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

if ($_SESSION['IDUSER_ADMIN']) {
    createcssfile();
    $js_compressionx = SITE_LINK . "cache/1" . get_cache('jshash1') . ".js";
} else {
    $js_compressionx = SITE_LINK . "cache/2" . get_cache('jshash2') . ".js";
}


$css_compression = SITE_LINK . "cache/" . get_cache('csshash') . ".css";
