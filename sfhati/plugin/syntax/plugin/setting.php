<?php

function SYNTAX_setting($template) {
    $template=SYNTAX_EASY($template);
    return get_cache($template);
}