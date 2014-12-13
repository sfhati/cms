<script>

function changeclass(id){
var className = $('#member_act'+id).attr('class');
if(className=='ui-icon ui-icon-locked'){
$('#member_act'+id).attr('class','ui-icon ui-icon-unlocked');
}else{
$('#member_act'+id).attr('class','ui-icon ui-icon-locked');
}
}
function changeclass1(id){
var className = $('#member_typ'+id).attr('class');
if(className=='ui-icon ui-icon-person'){
$('#member_typ'+id).attr('class','ui-icon ui-icon-key');
}else if(className=='ui-icon ui-icon-key'){
$('#member_typ'+id).attr('class','ui-icon ui-icon-suitcase');
}else if(className=='ui-icon ui-icon-suitcase'){
$('#member_typ'+id).attr('class','ui-icon ui-icon-person');
}
}

</script>
[var:"$_MSGTITLE"end var]
[var:"$_MSG"end var]
[tabs:"member_tabs"," [Members] ->
<div class = "box" dir="[rtl_ltr]" style="">
    <form method="POST">
        [Rows Nu].
        <select name="by_count_nu">
            <option [IF:"[session_var:"count_nu"end session_var]=5"," selected="selected""end IF]>5</option>
            <option [IF:"[session_var:"count_nu"end session_var]=10","selected="selected""end IF]>10</option>
            <option [IF:"[session_var:"count_nu"end session_var]=30","selected="selected""end IF]>30</option>
            <option [IF:"[session_var:"count_nu"end session_var]=50","selected="selected""end IF]>50</option>
            <option [IF:"[session_var:"count_nu"end session_var]=100","selected="selected""end IF]>100</option>
        </select>
        <input name="p" value="member" type="hidden"/>
        <button aria-disabled="false" type="submit" style="float: none" name="show_by"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[GO]</span></button>
    </form></div>

<div class = 'bxox' dir='[rtl_ltr]'>
    <div id='info'>...</div>
    <div id='all_members'>

        <form method='POST'>
            <input name="p" value="member" type="hidden"/>
            <table class='table-list' width='100%' ><thead>
                    <tr class='ui-widget-header' style='height:35px;'>
                        <td width="10px">[Nu].</td>
                        <td>[Name]</td>
                        <td>[Email]</td>                        
                        <td width="120px">[Options]</td>
                    </tr></thead>
                [SQL:"member_sql","Select * From members ","[session_var:"count_nu"end session_var]","
                <tbody id='listItem_%member_sql:id%'>
                    <tr class="t_bg_color%member_sql:%" id='R%member_sql:id%' >
                        <td>%member_sql:#%</td>
                        <td>%member_sql:name%</td>
                        <td>%member_sql:email%</td>                        
                        <td>
                            <ul id="icons" class="ui-widget ui-helper-clearfix">
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:"  title='[Delete]' onclick="if(confirm('Do you really want to delete member %member_sql:name%?')) $('#R%member_sql:id%').load('?p=member&aj=1&delete_member=%member_sql:id%&nammember=%member_sql:name%');"><span class="ui-icon ui-icon-trash"></span></a></li>
                                <li class="ui-state-default ui-corner-all" title=""><a title='[Edit]' href='[constant:"SITE_LINK"end constant]?chng_tpl=system_setting&plgn=member&p=member&Edit=%member_sql:id%#tab-member_tabs-2'><span class="ui-icon ui-icon-pencil"></span></a></li>
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[Active/Deactive]' onclick='$("#info").load("?p=member&aj=1&member_act=%member_sql:id%");changeclass(%member_sql:id%)' id="member_act%member_sql:id%"  class="ui-icon ui-icon-[IF:"%member_sql:active%","unlocked[ELSE]locked"end IF]"></a></li>
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[admin/user]' onclick='$("#info").load("?p=member&aj=1&member_typ=%member_sql:id%");changeclass1(%member_sql:id%)' id="member_typ%member_sql:id%"  class="ui-icon ui-icon-[IF:"%member_sql:type%=1","key[ELSE][IF:"%member_sql:type%=2","person[ELSE]suitcase"end IF]"end IF]"></a></li>
                            </ul>
                        </td>
                    </tr></tbody>

                "end SQL]
            </table><br></form>
        [all members] %member_sql:COUNT%
        <br>
        %member_sql:COUNTER%
    </div>
</div>

"," [Add new member] ->
<div class = "box" dir="[rtl_ltr]" style="">

    <div align="left">
        <form method="POST" enctype="multipart/form-data" action="?chng_tpl=system_setting&plgn=member&p=member">
            
            [Name]  <br />
            <input name="user" value="[var:"mem_name"end var]" >  <br /><br />
            [Password]  <br />
            <input name="pass" value="[var:"mem_pass"end var]" >  <br /><br />

            [Email]  <br />
            <input name="email" value="[var:"mem_email"end var]" >  <br /><br />
            
            
               [privileges] <br />
            <select name="type">
                <option value="1" [var:"select_type_1"end var]>[admin_full]</option>
                <option value="2" [var:"select_type_2"end var]>[member]</option>
                <option value="4" [var:"select_type_4"end var]>[moderator]</option>
            </select><br /><br />
            <input name="idmemupdate" value="[var:"Edit"end var]" type="hidden">
                   <input name="p" value="member" type="hidden"/>
            <input name="active" value="1" type="hidden"/>
            <button aria-disabled="false" type="submit" value="1" name="submit_mem"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[Create]</span></button>

        </form></div> </div>

"," [Setting] -> 
<div class = "box" dir="[rtl_ltr]" style="">
    <form enctype="multipart/form-data" method="POST">
        <input name="p" value="member" type="hidden"/>
        <label>[msg_name_alredy_register]</label><br>
        <input style="width:880px" name="msg_name_alredy_register" value="[function:"sett_site('msg_name_alredy_register' , '[msg_name_alredy_register]')"end function]"><br><br>
        <label>[msg_email_alredy_register]</label><br>
        <input style="width:880px" name="msg_email_alredy_register" value="[function:"sett_site('msg_email_alredy_register' , '[msg_email_alredy_register]')"end function]"><br><br>
        <label>[msg_must_fill_name]</label><br>
        <input style="width:880px" name="msg_must_fill_name" value="[function:"sett_site('msg_must_fill_name' , '[msg_must_fill_name]')"end function]"><br><br>
        <label>[msg_must_fill_pass]</label><br>
        <input style="width:880px" name="msg_must_fill_pass" value="[function:"sett_site('msg_must_fill_pass' , '[msg_must_fill_pass]')"end function]"><br><br>
        <label>[msg_must_fill_valid_email]</label><br>
        <input style="width:880px" name="msg_must_fill_valid_email" value="[function:"sett_site('msg_must_fill_valid_email' , '[msg_must_fill_valid_email]')"end function]"><br><br>
        <label>[msg_register_done]</label><br>
        <input style="width:880px" name="msg_register_done" value="[function:"sett_site('msg_register_done' , '[msg_register_done]')"end function]"><br><br>
        <label>[subject email active your account]</label><br>
        <input style="width:880px" name="subject_email_active_your_account" value="[function:"sett_site('subject email active your account' , '[subject email active your account]')"end function]"><br><br>
        <label>[content email active your account]</label><br>
        <textarea style="width:880px" name="content_email_active_your_account">[function:"sett_site('content email active your account' , '[content email active your account]')"end function]</textarea><br><br>             
        <label>[invaled_password]</label><br>
        <input style="width:880px" name="invaled_password" value="[function:"sett_site('invaled_password' , '[invaled_password]')"end function]"><br><br>
        <label>[changed_password_done]</label><br>
        <input style="width:880px" name="changed_password_done" value="[function:"sett_site('changed_password_done' , '[changed_password_done]')"end function]"><br><br>
        <label>[changed image done]</label><br>
        <input style="width:880px" name="changed_image_done" value="[function:"sett_site('changed_image_done' , '[changed image done]')"end function]"><br><br>
        <label>[image file invaled]</label><br>
        <input style="width:880px" name="image_file_invaled" value="[function:"sett_site('image_file_invaled' , '[image file invaled]')"end function]"><br><br>
        <label>[Active user message]</label><br>
        <input style="width:880px" name="Active_user_message" value="[function:"sett_site('Active_user_message' , '[Active user message]')"end function]"><br><br>
        <label>[After active user message]</label><br>
        <input style="width:880px" name="After_Active_user_message" value="[function:"sett_site('After_Active_user_message' , '[After active user message]')"end function]"><br><br>
        <label>[changed information done]</label><br>
        <input style="width:880px" name="changed_information_done" value="[function:"sett_site('changed_information_done' , '[changed information done]')"end function]"><br><br>
        <label>[send by email information done]</label><br>
        <input style="width:880px" name="send_by_email_information_done" value="[function:"sett_site('send_by_email_information_done' , '[send by email information done]')"end function]"><br><br>
        <label>[email not in our data]</label><br>
        <input style="width:880px" name="email_not_in_our_data" value="[function:"sett_site('email_not_in_our_data' , '[email not in our data]')"end function]"><br><br>
        <label>[user not active]</label><br>
        <input style="width:880px" name="user_not_active" value="[function:"sett_site('user_not_active' , '[user not active]')"end function]"><br><br>
        <label>[login error]</label><br>
        <input style="width:880px" name="login_error" value="[function:"sett_site('login_error' , '[login error]')"end function]"><br><br>
        <label>[you are login alredy]</label><br>
        <input style="width:880px" name="you_are_login_alredy" value="[function:"sett_site('you_are_login_alredy' , '[you are login alredy]')"end function]"><br><br>


        <button aria-disabled="false" type="submit" value="1" name="savesettmem"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[Save]</span></button>



    </form>
</div> 

"end tabs]
