<?php
function SYNTAX_page($template) {
    $SQL_x=chk_var($template);
    $r=@end(getResults('Select page_cont From pages where  id='.$SQL_x[0]));
    return  $r[page_cont];
}

