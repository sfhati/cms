<?php

//     [SQL:"id","sql","show rows number","content","style"end SQL]

function SYNTAX_SQL($template) {
    $SQL_x = chk_var($template);
    $sql_id = SYNTAX_EASY($SQL_x[0]);
    $sql = SYNTAX_EASY($SQL_x[1]);

    $pattern = '/\%' . $sql_id . '\:[^\%]*\%/';
    preg_match_all($pattern, $SQL_x[3], $matches);
    $matche = array_unique($matches[0]);
    $matche = str_replace('%' . $sql_id . ':#%', '', $matche);
    $matche = str_replace('%' . $sql_id . ':', '', $matche);
    $matche = array_filter(str_replace('%', '', $matche));
    $sql = str_ireplace('select * from', 'SELECT ' . implode(',', $matche) . ' FROM', $sql);

    $count_nu = SYNTAX_EASY($SQL_x[2]);
    $style = explode(':', SYNTAX_EASY($SQL_x[4]));
    if (!$style[0])
        $style[0] = 0;
    if (!$style[1])
        $style[1] = 1;
    $sql_template = trim($SQL_x[3]);

    if ($count_nu) { //for multy page number
        $show_pages = "page_" . $sql_id;
        if (!$_REQUEST[$show_pages])
            $page_number = 0; else
            $page_number = ($_REQUEST[$show_pages] - 1) * $count_nu;
        $total_pages = @mysql_num_rows(mysql_query($sql));
        $admin_page_num = page_counter($_REQUEST[$show_pages], $total_pages, $count_nu, getAddress(), $sql_id, $style);
        $limit = " LIMIT $page_number , $count_nu ";
    }

    $memp = getResults($sql . $limit);
    if (is_array($memp))
        foreach ($memp as $row) {
            $row_x = ($row_x == $style[1]) ? $style[0] : $style[1];
            $row_counter++;
            unset($old);
            unset($new);
            $old[] = "%" . $sql_id . ":%";
            $new[] = $row_x;
            $old[] = "%" . $sql_id . ":#%";
            $new[] = $row_counter + $page_number;
            foreach ($row as $k => $v) {
                if (strlen($v) < 50000) {
                    $old[] = "%" . $sql_id . ":" . $k . "%";
                    $new[] = $v;
                    $old[] = "" . $sql_id . "_selected_" . $k . "=\"" . $v . "\"";
                    $new[] = ' selected="selected" ';
                    $old[] = "" . $sql_id . "_checked_" . $k . "=\"" . $v . "\"";
                    $new[] = ' checked="checked" ';
                }
            }
            $result.=str_replace($old, $new, $sql_template);
        }
    $_SESSION['SYNTAX_VAR']['OLD'][] = '%' . $sql_id . ':COUNT%';
    $_SESSION['SYNTAX_VAR']['NEW'][] = $total_pages;
    $_SESSION['SYNTAX_VAR']['OLD'][] = '%' . $sql_id . ':COUNTER%';
    $_SESSION['SYNTAX_VAR']['NEW'][] = $admin_page_num;
    return $result;
}

//page counter for mem_sql function *you can use it in other way
function page_counter($page, $total_pages, $limit, $path, $pn = '', $style = array()) {
    if (!$style[3])
        $style[3] = 'current ui-state-default ui-state-highlight';
    if (!$style[4])
        $style[4] = 'pagination';
    if (!$style[2])
        $style[2] = 'ui-state-default';
    $pattern = '/page_' . $pn . '=(.*?)[\&]/';
    $path = preg_replace($pattern, "", $path);

    if ($total_pages >= $limit) {

        $adjacents = "2";
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if ($page == 0)
            $page = 1;
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages / $limit);
        $lpm1 = $lastpage - 1;


        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class='$style[4]'>";
            if ($page > 1)
                $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$prev'> &#171; </a>";
            else
                $pagination.= "<span class='disabled'> &#171; </span>";

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                    else
                        $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                }
            }
            elseif ($lastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lastpage'>$lastpage</a>";
                }
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                    $pagination.= "..";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page=$lastpage'>$lastpage</a>";
                }
                else {
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "..";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                }
            }

            if ($page < $counter - 1)
                $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$next'> &#187; </a>";
            else
                $pagination.= "<span class='disabled'> &#187; </span>";
            $pagination.= "</div>\n";
        }
        return $pagination;
    }
}

