<?php

/* Syntax : include template get postion command and sort it , start from first to last with call function cut code */

function Syntax($t,$c, $opt = 0) {
    $_SESSION[$c] ='';
    if (memory_get_usage() > 11757152 && !$opt) {    
        return $t;
    }
    $t = str_replace($_SESSION['SYNTAX_VAR']['OLD'], $_SESSION['SYNTAX_VAR']['NEW'], $t);
    if (is_array($_SESSION[SYNTAX_WORD]))
        foreach ($_SESSION[SYNTAX_WORD] as $v) {
            if (($x_pos[$v] = strpos($t, '[' . $v . ':')) === false) {
                unset($x_pos[$v]);
            }
        }

    if (!count($x_pos))
        return $t;
    asort($x_pos);
    $x_pos = array_keys($x_pos); // get feirst command
    if ($opt == 1)
        $t = parse_coma($t, $x_pos[0]); // just parse coma from syntax
    else
        $t = START_SYNTAX($t, $x_pos[0]); // Do and run code
    return Syntax($t,'', $opt);
}

function SYNTAX_EASY($template) {
    if (strpos($template, ']')) {
        return trim(Syntax_cache($template,'SyntaxCode'.time()));
    }
    return trim($template);
}

// Do and run code
function START_SYNTAX($text, $WORD) {
    $start = "[{$WORD}:";
    $end = "end {$WORD}]";
    $x = extractBetweenDelimetersx($text, $start, $end);
    $x1 = str_replace('","', "^|^", $x);
    $eval = "SYNTAX_$WORD";
    if(function_exists($eval)){
    $x1 = $eval(reverse_strrchr(reverse_strrchr($x1, '"', 1), '"'));
    }else{
         die ('This Function Not Exist! '.$eval);
      //  redirect(getAddress());
    }
    $text = str_replace($start . $x . $end, $x1, $text);
    return $text;
}

// Cut string between tow words !
function extractBetweenDelimetersx($inputstr, $delimeterLeft, $delimeterRight, $i = 1) {
    $posLeft = strpos($inputstr, $delimeterLeft);
    $posRight = strnpos($inputstr, $delimeterRight, $i);
    if ($posLeft === false || $posRight === false)
        if ($posLeft === false)
            die("Error:<br> near $delimeterLeft  _ !$posLeft || !$posRight _ <hr> $inputstr ");
        else
            die("Error:<br> near $delimeterRight _ !$posLeft || !$posRight _<hr> $inputstr ");
    $cut_text = substr($inputstr, $posLeft + strlen($delimeterLeft), $posRight - ($posLeft + strlen($delimeterLeft)));
    $i++;
    if ($i == 1000)
        exit();
    if (strnpos($cut_text, $delimeterLeft, $i - 1) > 0)
        return extractBetweenDelimetersx($inputstr, $delimeterLeft, $delimeterRight, $i); else
        return $cut_text;
}

// help function extractBetweenDelimetersx to find a strpos
function strnpos($haystack, $needle, $nth, $offset = 0) {
    if (!$haystack)
        return ""; else {
        for ($retOffs = $offset - 1; ($nth > 0) && ($retOffs !== FALSE); $nth--)
            $retOffs = strpos($haystack, $needle, $retOffs + 1);
        return $retOffs;
    }
}

function reverse_strrchr($haystack, $needle, $trail = 0) {
    if ($trail)
        return substr($haystack, 0, strrpos($haystack, $needle));
    else
        return substr($haystack, strpos($haystack, $needle) + 1);
}

function parse_coma($text, $WORD) {
    $t = rand(10000, 99999999);
    $start = "[{$WORD}:";
    $end = "end {$WORD}]";
    $xsyn = extractBetweenDelimetersx($text, $start, $end);
    if (is_array($_SESSION[arr_xsynv])) {
        if (in_array($start . $xsyn . $end, $_SESSION[arr_xsynv])) {
            $key = array_search($start . $xsyn . $end, $_SESSION[arr_xsynv]);
            $text = str_replace($start . $xsyn . $end, $_SESSION[arr_xsynk][$key], $text);
        } else {
            $text = str_replace($start . $xsyn . $end, '<<' . $t . '>>', $text);
            $_SESSION[arr_xsynk][] = '<<' . $t . '>>';
            $_SESSION[arr_xsynv][] = $start . $xsyn . $end;
        }
    } else {
        $text = str_replace($start . $xsyn . $end, '<<' . $t . '>>', $text);
        $_SESSION[arr_xsynk][] = '<<' . $t . '>>';
        $_SESSION[arr_xsynv][] = $start . $xsyn . $end;
    }
    return $text;
}

function chk_var($text, $haf = '') {
    $text = Syntax($text,'', 1);
    if ($haf)
        $text = str_replace($haf, '[[[__' . $haf . '__]]]', $text);
    $return_arr = explode('^|^', $text);
    foreach ($return_arr as $z1 => $z)
        for ($i = 0; $i < 100; $i++)
            $return_arr[$z1] = str_replace($_SESSION[arr_xsynk], $_SESSION[arr_xsynv], $return_arr[$z1]);
    unset($_SESSION[arr_xsynk]);
    unset($_SESSION[arr_xsynv]);
    return $return_arr;
}
