<?php
//[read_rss:"url","template","show item number"end read_rss]


function SYNTAX_read_rss($template) {
    $read_rss=chk_var($template);
    
    if(file_exists(TEMPLATE_PATH.'templates/'.$read_rss[1].'.inc')){  $file=implode(file(TEMPLATE_PATH.'templates/'.$read_rss[1].'.inc'));} else $file=$read_rss[1];
    
$item_template = cut_str($file,'{start_item}','{end_item}');
$doc = new DOMDocument();
  $doc->load($read_rss[0]);
  $arrFeeds = array();
  foreach ($doc->getElementsByTagName('image') as $node) {
      $content_search[0]='{logo_title}';
      $content_replace[0]= $node->getElementsByTagName('title')->item(0)->nodeValue;
      $content_search[1]='{logo_description}' ;
      $content_replace[1]= $node->getElementsByTagName('description')->item(0)->nodeValue;
      $content_search[2]='{logo_link}' ;
      $content_replace[2]= $node->getElementsByTagName('link')->item(0)->nodeValue;
      $content_search[3]='{logo_image}' ;
      $content_replace[3]= $node->getElementsByTagName('url')->item(0)->nodeValue;
      $file =str_replace($content_search, $content_replace, $file ) ;

  }
  $i=0;
  foreach ($doc->getElementsByTagName('item') as $node) {
      $i++;
      if($read_rss[2]) {
          if($read_rss[2]>$i ){
    
      $content_search[0]='{item_title}';
      $content_replace[0]= $node->getElementsByTagName('title')->item(0)->nodeValue;
      $content_search[1]='{item_desc}' ;
      $content_replace[1]= $node->getElementsByTagName('description')->item(0)->nodeValue;
      $content_search[2]='{item_link}' ;
      $content_replace[2]= $node->getElementsByTagName('link')->item(0)->nodeValue;
      $content_search[3]='{item_date}' ;
      $content_replace[3]= $node->getElementsByTagName('pubDate')->item(0)->nodeValue;
      $items.=str_replace($content_search, $content_replace, $item_template ) ;
          }
      }else{
      $content_search[0]='{item_title}';
      $content_replace[0]= $node->getElementsByTagName('title')->item(0)->nodeValue;
      $content_search[1]='{item_desc}' ;
      $content_replace[1]= $node->getElementsByTagName('description')->item(0)->nodeValue;
      $content_search[2]='{item_link}' ;
      $content_replace[2]= $node->getElementsByTagName('link')->item(0)->nodeValue;
      $content_search[3]='{item_date}' ;
      $content_replace[3]= $node->getElementsByTagName('pubDate')->item(0)->nodeValue;
      $items.=str_replace($content_search, $content_replace, $item_template ) ;


      }
  }
 




    return  str_replace('{start_item}'.$item_template.'{end_item}', $items, $file ) ;
}
?>