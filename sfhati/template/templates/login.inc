<style>
    #login_overlayxx{ display: table;width: 100%;}
    #notmember,#member
    {float:left;}
    DIV#login_overlayxx DIV.form_temp1
    {color:#555;padding:2% 4% 3%;}
    INPUT.signup, INPUT.login
    {width:63px;height:25px;}
    DIV#login_overlayxx DIV.form_temp1 INPUT[type="text"], DIV#login_overlayxx DIV.form_temp1 INPUT[type="password"]
    {border:1px solid #D1D1D1;padding:4px;width:210px;font-weight:bold;color:#252525;}
    DIV#login_overlayxx DIV.form_temp1 P
    {margin-top:5px;margin-bottom:10px;position:relative;}
    DIV#login_overlayxx DIV.form_temp1 P.copysm
    {font-size:10px;}
    DIV#login_overlayxx DIV.form_temp1 P.copysm A
    {color:#555;}DIV#login_overlayxx DIV.form_temp1 P LABEL
    {display:block;font-size:11px;color:#555;}
</style>
<script language="javascript">

        jQuery(document).ready(function($) {
            $("#form_register").validationEngine();
            $("#form_login").validationEngine();
            $("#form_forget").validationEngine();
        });
        function checkInformation(i)
        {
            if($("#"+i).validationEngine({returnIsValid:true})){
                $("#"+i).submit();
            }
        }
      
</script>
<div id="comment_formm" ></div>
[IF:"[session_var:"USER_ID"end session_var]","
[function:"get_cache('you_are_login_alredy')"end function]
[ELSE]
<div id="login_overlayxx" >

    <div class="form_temp1" id="notmember">
        <p class="f14">[Not currently a member]</p>
        <form method="POST" id="form_register">
            <p>
                [input:"text","user:[Create a Username]:","","required,ajax,length[6,11]"end input]</p>
            <p><label>[Create a Password]:</label>

                <input type="password" name="pass"  id="userpass" class="validate[required,length[6,11]]"></p>
            <p><label>[Re-enter Password]:</label>
                <input type="password" name="password2" id="repass" class="validate[required,confirm[userpass]]"></p>
            <p>
                [input:"text","email:[E-mail Address]:","","required,ajax,email"end input]</p>
            <input type="hidden" name="submit_mem" value="dd">
            [input:"submit","f4f5r54365465634t","[Sign Up]","","style:"end input]
        </form>
    </div>

    <div class="form_temp1" id="member">
        <p class="f14">[Already a member]</p>
        <form method="POST" id="form_login">
            <p><label>[Create a Username]:</label>
                <input type="text" name="user" id="nam"  class="validate[required,length[6,11]]"></p>
            <p><label>[Create a Password]:</label>
                <input type="password" name="pass" id="passa"  class="validate[required,length[6,11]]"></p>
            <input type="hidden" name="submit_lgn" value="dd">
            [input:"submit","f4f5r54365465634t1","[Login]","","style:"end input]
        </form>
    </div>
    <div class="form_temp1" id="member">
        <p class="f14">[Forgot account]</p>
        <form method="POST" id="form_forget">
            <p><label>[E-mail Address]:</label>
                <input type="text" id="emixl" value="" name="forget" class="validate[required,custom[email]]"></p>
            [input:"submit","f4f5r54365465634t2","[Send]","","style:"end input]
        </form>
    </div>



    <div class="pgclear"></div>
</div>
"end IF]