<style>
body {

    background: -moz-linear-gradient(#0EACC5, #fff 900px);
background:linear-gradient(#0EACC5, #FFF 900px);
background-repeat: repeat-x;
    background-size: 100% 900px;
    font-family: helvetica,arial,sans-serif;
}
#login-wrapper {
    margin: 50px auto;
}
.login-whisp {
    min-height: 330px;
}
#login-container {
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px 10px 10px 10px;
    height: 330px;
    margin: 0 auto;
    position: relative;
    width: 356px;
}
#login-sub-container {
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0 0 10px #000000 inset;
    height: 318px;
    left: 5px;
    position: absolute;
    top: 5px;
    width: 345px;
}
#login-sub-header {
 background-color: rgba(0, 0, 0, 0.44);
border-bottom: 1px solid #40DDF7;
    border-radius: 5px 5px 0 0;
    height: 65px;
    padding: 10px 0 0;
    text-align: center;
}
#login-sub, #security-sub {
    background-color: rgba(10, 110, 126, 0.72);
    border-radius: 0 0 5px 5px;
    border-top: 1px solid #0D7291;
    color: white;
    font-size: 12px;
    height: 212px;
    padding-left: 30px;
    padding-right: 5px;
    padding-top: 30px;
}
.copyright,.copyright a {
    color: #063A46;
    font-family: verdana;
    font-size: 7pt;
    margin: 10px 0 0;
    padding-top: 30px;
    text-align: center;
    text-decoration: none;
}

#login-sub-header img {
    margin-left: 7px;
}
#forms {
    left: 30px;
    position: absolute;
    top: 0;
}
#login_form, #reset_form {
    left: 0;
    position: absolute;
    top: 100px;
}
#login-sub, #security-sub {
    color: white;
    font-size: 12px;
}
.input-req-login {
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding-bottom: 8px;
    padding-left: 4px;
    width: 100%;
}
.input-field-login.icon {
    background-color: #FFFFFF;
    background-position: 6px 6px;
    background-repeat: no-repeat;
    border: 2px solid #0F6079;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 10px 10px rgba(15, 96, 121, 0.46) inset;
    height: 32px;
}
.clear {
    clear: both;
}
div.icon input.std_textbox {
    background: none repeat scroll 0 0 transparent;
    border: medium none;
    border-radius: 0 0 0 0;
    box-shadow: none;
    margin-left: 26px;
    outline: medium none;
    padding-top: 10px;
}
input:-moz-placeholder {
    color: #666666;
    font-family: Georgia,serif;
    font-style: italic;
}
input.std_textbox {
    font-size: 13px;
    height: 22px;
    width: 254px;
}
.login-btn, .reset-pass-btn {
    float: left;
    padding-top: 22px;
}
button, button[disabled]:active, input[type="submit"], input[type="submit"][disabled]:active, input[type="button"], input[type="button"][disabled]:active, .login-btn a.loginbtn {
background: linear-gradient(#0EACC5, #096472) repeat scroll 0 0 #0EACC5;
border: 1px solid #0F6079;
border-radius: 3px 3px 3px 3px;
box-shadow: 0 0 2px 2px #0F6079;
color: #FFF;
cursor: pointer;
font-size: 12px;
font-weight: bold;
overflow: visible;
padding: 4px 10px;
text-shadow: 0 1px 0 #063A46;
width: auto;
}
div.username-container, div.reset-pass-container {
    background-image: url("[constant:"TEMPLATE_LINK"end constant]panel/images/icon-username.png");
}
div.password-container {
    background-image: url("[constant:"TEMPLATE_LINK"end constant]panel/images/icon-password.png");
}
</style>
<div class="login-whisp" id="login-wrapper" style="opacity: 1; visibility: visible;">


    

    <div id="content-container">
        <div id="login-container">
            <div id="login-sub-container">
                <div id="login-sub-header">
                    <img alt="logo" src="[constant:"TEMPLATE_LINK"end constant]admin/images/logo.png">
                </div>
                <div id="login-sub">
                    <div id="forms">

                        [IF:"[session_var:"USER_ID"end session_var]"," 
                        <meta http-equiv="refresh" content="0; url=[constant:"SITE_LINK"end constant]" />  
                        <div style="width: 300px; padding-top: 100px; font-size: 20px;">you are login alredy!</div>
                        [ELSE]           
                        <form target="_top" method="post" id="login_form">
                            <div class="input-req-login"><label for="user">Username</label></div>
                            <div class="input-field-login icon username-container">
                                <input type="text" required="" tabindex="1" class="std_textbox" placeholder="Enter your username." value="" autofocus="autofocus" id="user" name="user">
                            </div>
                            <div class="input-req-login" style="margin-top:30px;"><label for="pass">Password</label></div>
                            <div class="input-field-login icon password-container">
                                <input type="password" required="" tabindex="2" class="std_textbox" placeholder="Enter your account password." id="pass" name="pass">
                            </div>
                            <div style="width: 285px;">
                                <div class="login-btn">
                                    <button tabindex="3" value="1" id="login_submit" type="submit" name="submit_lgn">Log in</button>
                                </div>

                                                            </div>
                            <div id="push" class="clear"></div>
                        </form>
  "end IF]
                    <!--CLOSE forms -->
                    </div>

                <!--CLOSE login-sub -->
                </div>
            <!--CLOSE login-sub-container -->
            </div>
        <!--CLOSE login-container -->
        </div>

    </div>
<!--Close login-wrapper -->
</div>
<div class="copyright">Copyright &copy; 2012 <a href="http://sfhati.com/">Sfhati</a>, Inc.</div>



    



