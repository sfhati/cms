<?php
//[table:"id","head","body"end table]
/*
id     : if you want know it
head : like field1,field2,field3,field4
body : used like > body:row(x1,x2,x3,x4),row(x1,x2,x3,x4) OR sql:select * form table->number rows optional
Example1: [table:"id","field1,field2,field3,field4","body:row(x1,x2,x3,x4),row(x1,x2,x3,x4)"end table]
Example2: [table:"id","field1,field2,field3,field4","sql:select * form table->10"end table]
Example3: [table:"id","field1,field2,field3,field4","sql:select field1,field2,field3,field4 form table"end table]
 */
function SYNTAX_table($template) {
    $tm=time();
    $table=chk_var($template);
    if(!$table[0]) {
        $table[0]=substr(md5(rand(10000, 1000000)),0,8);
    }
    $_SESSION['table_box'][$table[0]]['id']=$table[0];


        $table_head=explode(',',$table[1]);
        foreach($table_head as $k=>$v){
                $head_html.='<th>'.$v.'</th>';
                $content.="<td>%$table[0]:$k%</td>";
        }

preg_match_all("/row\([^\)]*\)/",$table[2],$out);
if($out[0][0]){
    foreach($out[0] as $out_v){
        $u++;
        $out_v=str_replace('row(', '', $out_v);
        $out_v=str_replace(')', '', $out_v);
        $td=explode(',', $out_v);
        $table_body.=($u%2) ? '<tr class="ui-helper-reset ui-state-default">' : '<tr class="ui-helper-reset ui-state-focus">';
        foreach($td as $td_v)
            $table_body.="<td>$td_v</td>";
        $table_body.='</tr>';
    }
}else{
        $out_v=str_replace('sql:', '', $table[2]);
          $td=explode('->', $out_v);
          $table_body='[SQL:"'.$table[0].'","'.$td[0].'","'.$td[1].'","<tr class="ui-helper-reset ui-state-%'.$table[0].':%">'.$content.'</tr>","default:focus:ui-state-default counter_mp:ui-state-highlight counter_mp:ui-widget-content div_counter_mp"end SQL]';
$table_counter='%'.$table[0].':COUNTER%';

}
    $fld='
<table id="'.$table[0].'" class="ui-widget ui-widget-content" style="width: 100%;">
		<thead class="ui-widget-header" style="height: 25px;">
			<tr>
'.$head_html.'
			</tr>
		</thead>
		<tbody>
'.$table_body.'
		</tbody>
	</table>

'.$table_counter;
    return  $fld ;
}

