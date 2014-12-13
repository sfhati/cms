<?php
function SYNTAX_include($template) {
    global $var_include;
    $include_x = chk_var($template);
    $template = SYNTAX_EASY($include_x[0]);
    $template = str_replace('template/', TEMPLATE_PATH, $template);
    $template = str_replace('plugin/', PLUGIN_PATH, $template);
    if (strpos($template, '/') === false)
        $template = TEMPLATE_PATH . 'sfhati/' . $template;
    $template_a = explode('?', $template);
    if (file_exists($template_a[0]) && !is_dir($template_a[0])) {
        $vars = explode('&', $template_a[1]);
        foreach ($vars as $var) {
            $setvars = explode('=', $var);
            $var_include[$setvars[0]] = $setvars[1];
        }
      
        return file_get_contents($template_a[0]);
    }else
        $_SESSION['SYNTAX_DEBUG'][] = 'Function: SYNTAX_include <br> Error: File ' . $template . ' Not found!<hr>';
}

