<?php

// Youtube functions for link
function getPatternFromUrl($url) {
    $url = $url.'&';
    $pattern = '/v=(.+?)&+/';
    preg_match($pattern, $url, $matches);
    return ($matches[1]);
}

function check_if_freind($id) {
    if($id==$_SESSION[USER]) return "1"; else
        return mysql_num_rows(mysql_query("select * from ".REF_TABLE."table2 where  (number1=".$_SESSION[USER]." or type=".$_SESSION[USER].") and (number1=$id or type=$id) and md5='Friend'"));
}
function get_membername($id) {
    $m= @end(getResults("select * from members where  id=$id"));
    if($m[info10]) $n=$m[info10]; else $n=$m[name];
    return $n ;
}

    //hack resize images
function hack_image_width($text) {
    $pattern = '/<img.*src=[\"\'](.*)[\"\']/';
    preg_match_all($pattern, $text, $matches);
    foreach($matches[0] as $var_v) {
        $var_eval = preg_replace($pattern, "$1" , $var_v);
        if(strpos($var_eval, "http://")===false) $var_eval="http://cms.sfhati.com/".$var_eval;
        $list=getimagesize($var_eval);
        if($list[0]>550)
          $text=str_replace($var_v,$var_v.' style="max-width: 450px; cursor: pointer;&quot; onclick="window.open(this.src)"' ,$text );
    }
    return $text;
}

function attach($id) {
    $memp=getResults("select * from table2  where number1=$id and md5='files'" );
    if(is_array($memp)) foreach ($memp as  $row) {
        $return.="<a href='?art_img=$row[id]'>$row[string1]</a><br>";
    }
    return $return;
}

function str_len_cut($text,$to=500) {
   $text= strip_tags($text,"<b><u><i><br>");
    if(strlen($text)>$to) {
        $text=substr($text,0,$to);
        $text=trim($text);
        $lines = explode(" ", $text);
        $lines[count($lines)-1]=" ... ";
        $text= implode(" ", $lines);
    }
    return $text;
}


function can_edit($id,$tm){
    if(($_SESSION['USER']==$id && ((time() - $tm) < 1000))|| $_SESSION['MODERATOR']) return '1'; else return '';
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $img = true, $atts = array(),$d = 'mm', $r = 'g' ) {
	$url = 'http://www.gravatar.com/avatar/';
	$url .= md5( strtolower( trim( $email ) ) );
	$url .= "?s=$s&d=$d&r=$r";
	if ( $img ) {
		$url = '<img src="' . $url . '"';
		foreach ( $atts as $key => $val )
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= ' />';
	}
	return $url;
}

