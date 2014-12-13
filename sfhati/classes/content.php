<?php
function makeClickableLinks($text) {
    $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '<a href="\\1">\\1</a>', $text);
    $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a href="http://\\2">\\2</a>', $text);
    $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
        '<a href="mailto:\\1">\\1</a>', $text);
    return $text;
}

function convetHTML40toHtml($html){
    $search  = array('&lsquo;', 
                 '&rsquo;', 
                 '&ldquo;', 
                 '&rdquo;', 
                 '&mdash;'); 
    $replace = array("'", 
                     "'", 
                     '"', 
                     '"', 
                     '-'); 
 
   return html_entity_decode(str_replace($search, $replace, $html)); 
}

function nicetime($date)
{
    $periods         = array("Xsecond", "Xminute", "Xhour", "Xday", "Xweek", "Xmonth", "Xyear", "Xdecade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    $tense         = "ago";
    $difference     = time() - $date;
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1) {
        $period= "s";
    }
    if($_SESSION['lng_CH']=='ar')
     return "[$tense] $difference [$periods[$j]] ";       
        else
    return "$difference $periods[$j]$period {$tense}";
}

function bbcode($text) {    
    
    $text=str_replace("\n","[n]",$text);
    $pattern = "/\[code\](.*?)\[\/code\]/is";
    preg_match_all($pattern, $text, $matches);
    foreach($matches[1] as $var_k => $var_v)
        $text = str_replace($matches[0][$var_k], "<pre class='brush: php;'>".str_replace("[n]","\n",htmlspecialchars ($matches[1][$var_k]))."</pre>" , $text);


    $bbcode = array(
        "/\[b\](.*?)\[\/b\]/is" => "<b>$1</b>",
        "/\[u\](.*?)\[\/u\]/is" => "<u>$1</u>",
        "/\[i\](.*?)\[\/i\]/is" => "<i>$1</i>",
        "/\[left\](.*?)\[\/left\]/is" => "<div class='divleftarea'>$1</div>",
        "/\[right\](.*?)\[\/right\]/is" => "<div class='divrightarea'>$1</div>",
        "/\[center\](.*?)\[\/center\]/is" => "<div class='divcenterarea'>$1</div>",
        "/\[n\]/is" => "<br>",
        "/\[quote\](.*?)\[\/quote\]/is" => "<blockquote><span class='bqstart'>&#8220;</span>$1<span class='bqend'>&#8221;</span></blockquote>",
        "/\[youtube\](.*?)\[\/youtube\]/is" => "<iframe width='727' height='480' src='$1' frameborder='0' allowfullscreen></iframe>",
        "/\[img\](.*?)\[\/img\]/is" => "<a href='$1' class='articalimg' rel='gallery1'><img src='$1' style='max-width: 100%; cursor: pointer;'/></a>",
        "/\[attach:(.*?)\]/is" => "<a href='". SITE_LINK ."?art_img=$1' class='articalimg' rel='gallery1'><img src='". SITE_LINK ."?art_img=$1' style='max-width: 100%; cursor: pointer;'/></a>",
        "/\#432431\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-smile.png">',
        "/\#432432\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-wink.png">',
        "/\#432433\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-tongue.png">',
        "/\#432434\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-surprised.png">',
        "/\#432435\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-unhappy.png">',
        "/\#432436\#/is" => '<img src="'.TEMPLATE_LINK.'markitup/images/emoticon-happy.png">',
        "/\[url\=(.*?)\](.*?)\[\/url\]/is" => "<a href='$1' target='blank'>$2</a>"
    );
    
    $bbcode=  preg_replace(array_keys($bbcode), array_values($bbcode), $text);
    $bbcode= str_replace('watch?v=', 'embed/', $bbcode);
    return $bbcode;
}

function unbbcode($text) {    
    
    $text=str_replace("<br>","\n",$text);
    $text=str_replace("<pre class='brush: php;'>","[code]",$text);
    $text=str_replace("</pre>","[/code]",$text);
    

    $bbcode = array(
        "/\<b\>(.*?)\<\/b\>/is" => "[b]$1[/b]",
        "/\<u\>(.*?)\<\/u\>/is" => "[u]$1[/u]",
        "/\<i\>(.*?)\<\/i\>/is" => "[i]$1[/i]",
        "/\<div class\=\'divleftarea\'\>(.*?)\<\/div\>/is" => "[left]$1[/left]",
        "/\<div class\=\'divrightarea\'\>(.*?)\<\/div\>/is" => "[right]$1[/right]",
        "/\<div class\=\'divcenterarea\'\>(.*?)\<\/div\>/is" => "[center]$1[/center]",
        "/\<blockquote\>\<span class\=\'bqstart\'\>\&\#8220\;\<\/span\>(.*?)\<span class\=\'bqend\'\>\&\#8221\;\<\/span\>\<\/blockquote\>/is" => "[quote]$1[/quote]",
        "/\<img src\=\'(.*?)\' style\=\'max\-width\: 100%\; cursor\: pointer\;\' class\=\'articalimg\'\/\>/is" => "[img]$1[/img]",
        "/\<a href\=\'(.*?)\' target\=\'blank\'\>(.*?)\<\/a\>/is" => "[url=$1]$2[/url]",
        "/\<iframe width\=\'727\' height\=\'480\' src\=\'(.*?)\' frameborder\=\'0\' allowfullscreen\>\<\/iframe\>/is" => "[youtube]$1[/youtube]"
    );
    
    $bbcode=  preg_replace(array_keys($bbcode), array_values($bbcode), $text);
    return $bbcode;
}

function show_filet($show_filet = 0,$file_name='',$wh='') {
    if ($show_filet) {
        $filedirtmp = TMP_PATH . 'form_builder_files/';
        if (!is_dir($filedirtmp))
            mkdir($filedirtmp);

        $mainfile = $filedirtmp . md5($show_filet);
        $mainfilelink = 'tmp/form_builder_files/' . md5($show_filet);
        if (!file_exists($mainfile) || !filesize($mainfile)) {
            if ($show_filet == 'path') { //image in folder not in database
                if (file_exists($file_name))
                    exec("cp $file_name $mainfile");
            }else { // file in database
                $content = mysql_fetch_array(mysql_query("Select string1,file1 From files where id=$show_filet limit 1"));
                $handle = fopen($mainfile, 'a');
                fwrite($handle, $content[1]);
                fclose($handle);
            }            
        }


        if (!file_exists($mainfile) || !filesize($mainfile)) {
            return '';
        }

        if (file_exists($mainfile) && $wh) {
            $resizefile = 'form_builder_files/' . md5($mainfile . $wh) . '_' . $wh;
            if (!file_exists(TMP_PATH . $resizefile)) {
                $xx = explode('x', $wh);
                exec(_CONVERT_PATH . "convert $mainfile -resize $xx[0]x$xx[1] ".TMP_PATH." $resizefile");
            }

            return $resizefile;
        } else {
           return $mainfilelink;
        }

        return '';
    }
}



function fullescape($in) 
{ 
  $out = ''; 
  for ($i=0;$i<strlen($in);$i++) 
  { 
    $hex = dechex(ord($in[$i])); 
    if ($hex=='') 
       $out = $out.urlencode($in[$i]); 
    else 
       $out = $out .'%'.((strlen($hex)==1) ? ('0'.strtoupper($hex)):(strtoupper($hex))); 
  } 
  $out = str_replace('+','%20',$out); 
  $out = str_replace('_','%5F',$out); 
  $out = str_replace('.','%2E',$out); 
  $out = str_replace('-','%2D',$out); 
  return $out; 
 } 
 
 
 
 function strposa($haystack, $needle, $offset=0) {
    if(!is_array($needle)) $needle = array($needle);
    foreach($needle as $query) {
        if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
    }
    return false;
}