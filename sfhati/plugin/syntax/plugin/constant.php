<?php
function SYNTAX_constant($template) {
    $template=SYNTAX_EASY($template);

    if (defined($template)) eval('$x1='.$template.';');
    return $x1;
}
