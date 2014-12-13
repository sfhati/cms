<?php
//[input:"tyle","name","action","method","content form"end input]
//[input:"text","name","value","validate","class1","other"end input]
/*
 type     : form,text,autocomplete,date,password,submit,button,reset,radio,checkbox,textarea,select
 name     : name use as name and id , if you wont add label you can use name:label caption , also you can use label for array like name:label1,label2,...
 value    : use php var like $x or just value type , with array value1,value2 , to select use value:on , with form type this value = action
 validate : type validate like required,length[0,100],...  , in form type this = method
 class1   : name of class or use ui style like  style:left icon,right icon , in form type this = content
 other    : to insert code in same tag like onclick="alert('hi!')"

-----------------------------------------validate option----------------------------------------------
              _________________________________________________________________________
optional: Only validate when the field is not empty *Please call optional first
required: Field is required
length[0,100] : Between x and x characters allowed
maxCheckbox[7] : Set the maximum checkbox autorized for a group
minCheckbox[7] : Set the minimum checkbox autorized for a group
confirm[fieldID] : Match the other field (ie:confirm password)
telephone : Match telephone regEx rule.
email : Match email regEx rule.
number : Numbers only
nospecialcaracters : No special characters allowed
letter : Letters only
exemptString : Will not validate if the string match
date : Invalid date, must be in YYYY-MM-DD format
funcCall : Validate custom functions out
rege: regular expression use like rege:^[a-z\ \']+$msg:your massege here
jsfunction: call js function from your page to validate use like jsfunction:myfunction;msg:your msg here
ajax: mean check value from php code 
 */
function SYNTAX_input($template) {
    $custom['telephone']='custom[telephone]';
    $custom['email']='custom[email]';
    $custom['number']='custom[onlyNumber]';
    $custom['nospecialcaracters']='custom[noSpecialCaracters]';
    $custom['letter']='custom[onlyLetter]';
    $custom['date']='custom[date]';
    $tm=str_replace('.','_',str_replace(' ','_',microtime()));  
    $input=chk_var($template);
    $input[0]=strtolower($input[0]);
    if(!$input[0]) $input[0]='text';
    $x=explode(":",$input[1]);
    $label_caption=explode(',',str_replace($x[0].":", '', $input[1]));
    $input[1]=$x[0];
    if(!$input[1])
        $input[1]=str_replace('.','_',str_replace(' ','_',microtime()));

    // create form :
    if($input[0]=='form') {
        $fld="<form name=\"$input[1]\" $input[5] id=\"$input[1]\" action=\"$input[2]\" method=\"$input[3]\">\n$input[4]\n</form>";
        $_Validate_forms[]=$input[1];
    }else { // if field

    //Check value
        if(strpos($input[2],'$')!==false) { //is variable
            $valu=substr( $input[2] , 1);
            global $$valu;
            $valu = &$$valu;
        }else { //print as it
            if(strpos($input[2],',')!==false)
                $valu=explode(',', $input[2]);
            else $valu=$input[2];
        }

        if($input[3]) { // if Validate
            $validate=explode(',', $input[3]);
            foreach($validate as $v) {
                if(in_array(strtolower($v), $custom)) {
                    $v=$custom[strtolower($v)];
                }elseif(strpos($v,"rege:")!==false) { // regular expression
                    $v=str_replace('rege:', '', $v);
                    $msg_ereg=explode("msg:",$v);
                    $_Validate_forms_ereg[strtolower($input[1])]=$msg_ereg[0];
                    $_Validate_forms_ereg_msg[strtolower($input[1])]=$msg_ereg[1];
                    $v='custom['.strtolower($input[1]).']';
                }elseif(strtolower($v)=='ajax') { // ajax validate
                    $v='ajax[ByajaxValidate]';
                }elseif(strpos($v,"jsfunction:")!==false) { // js function

                    $v=str_replace('jsfunction:', '', $v);
                    $msg_ereg=explode(";msg:",$v);
                    $_Validate_forms_ereg[$msg_ereg[0]]=$msg_ereg[0];
                    $_Validate_forms_ereg_msg[$msg_ereg[0]]=$msg_ereg[1];
                    $v='funcCall['.$msg_ereg[0].']';
                }else $v=strtolower(str_replace(':', ',', $v));

                $valid.= $coma.$v;
                $coma=',';
            }
            $valid="validate[$valid]";
        }

        if($input[0]=='autocomplete') { // auto complete field
            $input[0]='text';
            $_Validate_forms_autocomplete[$input[1]]=$input[1];
        }

        if($input[0]=="date") { // date picker field
            $input[0]='text';
            $autoc='rel="datepicker"';
        }

        $i1=0;
        if($input[0]=='text' || $input[0]=='password' || $input[0]=="file") {
            if(is_array($valu)) {
                foreach($valu as $k=>$v) {
                    $lable='<label for="'.$input[1].$i1.'">'.$label_caption[$i1].'</label>';
                    $fld.="<p class='fileformp'>$lable<input type=\"$input[0]\" id=\"".$input[1].$i1."\" name=\"".$input[1]."[$i1]\" $autoc value=\"$v\" class=\"#c$tm#\" #o$tm# /></p>";
                    $i1++;
                }
            }else {
                $lable='<label for="'.$input[1].'">'.$label_caption[0].'</label>';
                $fld.="<p class='fileformp'>$lable<input type=\"$input[0]\" id=\"".$input[1]."\" name=\"".$input[1]."\" $autoc value=\"$valu\" class=\"#c$tm#\" #o$tm# /></p>";
            }
        }elseif($input[0]=='submit'  || $input[0]=='button'  || $input[0]=='reset') {
            if(strpos($input[4],'style:')!==false) { // style ui
                $input[4]= str_replace("style:", '', $input[4]);
                $icon_option=explode(',', $input[4]);
                $input[4]='';
                $is_style=1;
            }
            if(is_array($valu)) {
                foreach($valu as $k=>$v) {
                    if($is_style) $_Validate_forms_style[$input[1].$i1]='$("#'.$input[1].$i1.'").button({icons: {primary: "'.$icon_option[0].'",secondary: "'.$icon_option[1].'"}});';
                    $fld.="<p class='fileformp'>$lable<button type=\"$input[0]\" id=\"".$input[1].$i1."\" name=\"".$input[1]."[$i1]\" $autoc value=\"$v\" class=\"$input[4]\" #o$tm# >$v</button></p>";
                    $i1++;
                }
            }else {
                if($is_style) $_Validate_forms_style[$input[1]]='$("#'.$input[1].'").button({icons: {primary: "'.$icon_option[0].'",secondary: "'.$icon_option[1].'"}});';
                $fld.="<p class='fileformp'>$lable<button type=\"$input[0]\" id=\"".$input[1]."\" name=\"".$input[1]."\" value=\"$valu\" class=\"$input[4]\" #o$tm# >$valu</button></p>";
            }

        }elseif($input[0]=='radio' || $input[0]=='checkbox') {
            if(strpos($input[4],'style:')!==false) { // style ui
                $input[4]= str_replace("style:", '', $input[4]);
                $icon_option=explode(',', $input[4]);
                $input[4]='';
                $is_style=1;
            }
            if(is_array($valu)) {
                foreach($valu as $k=>$v) {
                    $v=str_replace(':on', '" checked="checked', $v);
                    if($is_style) $_Validate_forms_style[$input[1].$i1]='$("#'.$input[1].$i1.'").button({icons: {primary: "'.$icon_option[0].'",secondary: "'.$icon_option[1].'"}});';
                    $lable='<label for="'.$input[1].$i1.'">'.$label_caption[$i1].'</label>';
                    if($input[0]=='checkbox') $addToName="[$i1]";
                    $fld.="<p class='fileformp'>$lable<input type=\"$input[0]\" id=\"".$input[1].$i1."\" name=\"".$input[1].$addToName."\" $autoc value=\"$v\" class=\"$input[4]\" #o$tm# /></p>";
                    $i1++;
                }
            }else {
                if($is_style) $_Validate_forms_style[$input[1]]='$("#'.$input[1].'").button({icons: {primary: "'.$icon_option[0].'",secondary: "'.$icon_option[1].'"}});';
                $lable='<label for="'.$input[1].'">'.$label_caption[0].'</label>';
                $fld.="<p class='fileformp'>$lable<input type=\"$input[0]\" id=\"".$input[1]."\" name=\"".$input[1]."\" value=\"$valu\" class=\"$input[4]\" #o$tm# /></p>";
            }

        }elseif($input[0]=='select') {
            if(strpos($input[4],'style:')!==false) { // style ui $( "#combobox" ).combobox();
                $input[4]= str_replace("style:", '', $input[4]);
                $icon_option=explode(',', $input[4]);
                $input[4]='';
                $stselect='rel="combobox"';
            }
            $lable='<label for="'.$input[1].$i1.'">'.$label_caption[$i1].'</label>';
            if(is_array($valu)) {
                $arr_val='';
                foreach($valu as $k=>$v) {
                    $exv=explode("~",$v);
                    if($exv[1]){$v=$exv[0]; $nv=$exv[1];}else{$nv=$v;}
                    if(strpos($v,':on')!==false) {
                        
                    //$v1=str_replace(':on', '" selected="selected', $v);
                    $onvalue=str_replace(':on', '', $v);
                    $nv=str_replace(':on', '', $nv);
                    $v=$onvalue;
                    }
                    if($arr_val[$v])unset($arr_val[$v]);
                    $arr_val[$v]=$nv;
                    
                    
                }
                foreach ($arr_val as $kzv => $vzv){
                    $szv='';
                    if($onvalue == $kzv) $szv='" selected="selected';
                    $optn.='<option value="'.$kzv.$szv.'">'.$vzv.'</option>';
                }
            }else {
                    $exv=explode("~",$valu);
                    if($exv[1]){$valu=$exv[0]; $nv=$exv[1];}else{$nv=$v;}
                
                $v1=str_replace(':on', '" selected="selected', $valu);
                $nv=str_replace(':on', '', $valu);
                $optn.='<option value="'.$v1.'">'.$nv.'</option>';
            }
            $fld.="<p class='fileformp'>$lable<select id=\"".$input[1]."\" $stselect name=\"".$input[1]."\" class=\"$input[4]\" #o$tm# >$optn</select></p>";

        }else {
            $lable='<label for="'.$input[1].'">'.$label_caption[0].'</label>';
            $fld="<p class='fileformp'>$lable<$input[0] name=\"$input[1]\" id=\"$input[1]\" class=\"$input[4]\" #o$tm#>$valu</$input[0]></p>";
        }

        if($input[4]) $valid=$valid.' '.$input[4];  // add class
        $fld= str_replace("#o$tm#", $input[5], $fld); // add other code like onclick="javascript:"
        $fld= str_replace("#c$tm#", $valid, $fld); // add validate
    }// end if field

/*Generate JS code */
    if(is_array($_Validate_forms_ereg))foreach($_Validate_forms_ereg as $k=>$v)
            if($k==$v)
                $_SESSION['Validate_forms_ereg'].=','."\n".'"'.$k.'":{"nname":"'.$v.'","alertText":"* '.$_Validate_forms_ereg_msg[$k].'"}';
            else
                $_SESSION['Validate_forms_ereg'].=','."\n".'"'.$k.'":{"regex":"/'.$v.'/","alertText":"* '.$_Validate_forms_ereg_msg[$k].'"}';

    if(is_array($_Validate_forms))foreach($_Validate_forms as $v)
            $js_validate_document.="\$('#$v').validationEngine();\n";
    if(is_array($_Validate_forms_autocomplete))foreach($_Validate_forms_autocomplete as $v)
            $js_validate_document.="field_autocomplete('$v');\n";



    if(is_array($_Validate_forms_style))
        foreach($_Validate_forms_style as $k=>$v)
            $js_validate_document.=$v;


    return  $fld.'<script>$(document).ready(function() {'.$js_validate_document.'});</script>' ;
}

