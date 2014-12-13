body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    font-family: "Arial", "Helvetica", "Verdana", "sans-serif";
    font-size: 10px;
}
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Verdana,Arial,sans-serif; font-size: 1em; }
/*ui site overrides for TR*/
.content {
    overflow: visible;
}
#content-wrapper {
    background: none;
}
.expt-checkbox{float: right; margin: 0px;}
.content-top {
    background-image: url(../images/app/content_top_bg_trFix.gif);
}
#application-content {
    background: #fff;
    padding: 5px;
    margin: 0 -1px;
}

/*TR application styles*/

/*hide elements if js is avail*/
.js .theme-group-content, .js #submitBtn, .js select.texture, .js #themeGallery, .js #help {
    display: none;
}



#themeRoller  {
    font-family: Verdana, Arial, sans-serif;
    margin: 0;
    background: #000;
    width: 214px;
    padding: 0 4px 4px 4px;
    color: #fff;
    border: 1px solid #222;
    position: relative;
}
.content #themeRoller  {/*tr within ui site (not bookmarklet) */
                        float: left;
}
#themeRoller a:focus, div.content * {
    outline: 0 !important;
}
#themeHeader h1 { /*logo*/
                  font-size: 1.5em;
                  color: #fff;
                  font-weight: normal;
                  width: 213;
                  height: 46px;
                  margin: 0 0 -1px 0;
                  padding: 0;
                  text-indent: -999999px;
                  overflow: hidden;
                  background: transparent url(../images/app/logo_themeRoller_sml.gif) -5px 0 no-repeat;
}
/*corner radius in TR app elements*/
#themeRoller, #themeRoller .corner-all, #themeRoller input, #themeRoller select, #themeGallery a.download, #themeGallery a.edit, .texturePicker, .farbtastic, #getBookmarklet  {-moz-border-radius: 4px !important; -webkit-border-radius: 4px !important;  border-radius: 4px !important; }
#themeRoller .corner-bottom {-moz-border-radius-bottomleft: 4px !important; -webkit-border-bottom-left-radius: 4px !important;  border-bottom-left-radius: 4px !important; -moz-border-radius-bottomright: 4px !important; -webkit-border-bottom-right-radius: 4px !important;  border-bottom-right-radius: 4px !important; }
#themeRoller .corner-top {
border-bottom: 1px solid #fff;
direction: rtl;
}

#themeRoller form {
    margin: 10px 0;
    clear: both;
height:250px;
overflow: auto;
}

#themeRoller .icon, #getBookmarklet .icon { width: 16px; height: 16px; display: block; text-indent: -999999px; overflow: hidden; }


/*tabs colors, texture*/
#themeRoller #rollerTabsNav li { 
float: left;
border: 1px solid #fff;
padding: 5px;
border-bottom: 0;
margin-left: 5px;
list-style: none;
}


/*TR Tabs structure*/
#rollerTabs {padding: 2px; margin: 0; font-size: 1em !important; background: none; border: none; font-weight: normal; font-family: Verdana, Arial, sans-serif; }
#css_tab { clear:left; padding: 20px 0;  display: block;  }
#rollerTabs .ui-tabs-panel { display: block ;color: #fff; border: 0 !important; background: none !important; }
#rollerTabs .ui-tabs-hide { display: none; }


/*DOWNLOAD THEME button*/
.buttonTheme  {
    background: rgba(255, 255, 255, 0.13);
    color:#fff;
    border: 1px solid rgba(255, 255, 255, 0.25);
    padding: 3px 5px 3px 5px;
    position: relative;
    text-decoration: none;
    clear: both;
    margin: 0;
    cursor:pointer;
width: 178px;
padding-left: 25px;    
margin-top: 5px;
}

.buttonTheme span.icon {
    background-image: url(../images/app/tr_icons_white.png);
    position: absolute;
    top: 50%;
    left: .5em;
    margin-top: -8px;
}
.buttonTheme:hover {
    color: #FFF;
    border-color: #FFF;
}
.icon_upload{ background-position: -160px -192px;}
.icon_apply{background-position: -208px -192px;}
.icon_editor{background-position:-176px -112px;}
.icon_cancel{background-position: -32px -192px;}
.icon_restore{background-position: -64px -80px;}

#legacyMsg {
    margin: 20px 0;
    font-size: 1em;
}
#downloadLegacyTheme {
    color: #666;
}

/*THEME GROUP SPINDOWNS*/
#themeRoller .theme-group {
    margin: 1px 0;
    width: 210px;
}
#themeRoller .theme-group-header {
    cursor: pointer;

    padding: .4em 0;

}
/*header states*/
#themeRoller .theme-group .theme-group-header.state-default {  }
#themeRoller a { color:#fff; text-decoration: none; }
#themeRoller .theme-group .theme-group-header.state-active { border: 1px solid #fff; }
#themeRoller .theme-group .theme-group-header.state-active a {  text-decoration: none; }
#themeRoller .theme-group .theme-group-content { border: 1px solid #fff; }
#themeRoller .theme-group .theme-group-header.state-hover { border: 1px solid #fff; }
#themeRoller .theme-group .theme-group-header.state-hover a {  text-decoration:underline; }
#themeRoller .theme-group .theme-group-header span.icon {
    float: left;
    margin: -2px 3px 0 0;
    background-image: url(../images/app/tr_icons_white.png);
}
#themeRoller .state-active span.icon {
    margin: -1px 2px 0 1px !important;
}
#themeRoller .theme-group .theme-group-header span.icon-triangle-1-e { background-position: -32px -16px; }
#themeRoller .theme-group .theme-group-header span.icon-triangle-1-s { background-position: -64px -16px; }
#themeRoller .theme-group .theme-group-header div.state-preview {
    float: right;
    padding: 1px 2px 2px;
    font-size: 9px !important;
    font-weight: normal !important;
    margin: -2px 3px 0 0;
}





/*THEME GROUP CONTENT*/
#themeRoller .theme-group-content {
    padding: 10px 5px 10px 5px;
    border-top: 0 !important;
}
#themeRoller .theme-group-collapsed .theme-group-content {
    display: none;
}
#themeRoller .theme-group h3 {
    font-size: .8em;
    font-weight: bold;
    text-transform: uppercase;
}

/*form field groups*/
#themeRoller .field-group {
    float: left;
    width: 53px;
    margin: 10px 4px 0 0;
}
#global-font .field-group, 
#global-corners .field-group, 
#themeRoller .field-group-background, 
#themeRoller .field-group-opacity,
#Shadow .field-group {
    margin: 4px 0 0;
    clear: both;
    float: none;
    width: auto;
}
#themeRoller .field-group-border, #themeRoller .field-group-opacity, #themeRoller .field-group-corners {
    clear: left;
}

/*form labels*/
#themeRoller .field-group label {
    font-size: 1em;
    margin: 6px 0 5px;
    display: block;
    float: left;
}
#global-font .field-group label, 
#global-corners .field-group label, 
#themeRoller .field-group-opacity label,
#Shadow .field-group label, 
#Shadow .field-group-opacity label,.sfhati_counter {
    /*	float: left;*/
    width: 50px;
    margin: 0;
    text-align: center;
}


#global-font .field-group label {
    width: 35px;
}
#Shadow .field-group label {
    width: 100px;
}
#themeRoller .field-group-opacity label {
    width: auto;
    text-align: left;
}
#Shadow .field-group-background label {
    float: none;
    width: auto;
    text-align: left;
    padding-bottom: 5px;
}

#themeRoller .ui-state-active{
position: relative;
top: 1px;
}
/*form inputs/selects */
#themeRoller input, #themeRoller select {
    border: 1px solid #fff;
    color: #fff;
    font-size: 1em;
    padding: 2px;
    float: right;
}
#themeRoller select {
    padding: 1px;
}
input.opacity, input.offset {
    width: 20px;
    float: none;
}
span.opacity-per {
    float: left;
    padding: 0 .2em;
}
#themeRoller input.hex {
    width: 70px;
    outline: 0;
}
input#ffDefault, select#fwDefault {
    width: 120px;
}
input.cornerRadius {
    width: 20px;
}
#curs_hand{
    background-image: url(../images/app/tr_icons_white.png);
    background-position: -98px -13px;
    width:16px;
    height:16px;
    position: fixed;
    left:210px;
}
#scroll_tap{
    position: fixed;
    background-color:transparent;
    height: 100%;
    width:10px;
    top:75px;
    right: 0;
    opacity:0.4;filter:alpha(opacity=40) ;
}
#scroll_tap:hover{
    background-color:#222;
    width:30px;
}


/*Custom form elements */
#themeRoller div.hasPicker {
    position: static;
    padding: 1px;
    margin: -2px 0 0 -2px;
    border: 1px solid #333;
    float: right;
}
#themeRoller div.picker-on {
    background: #666;
    border-color: #aaa;
    border-bottom: #666;
}
/*pickers*/
#picker {
    position: absolute;
    left: 0;
    top: auto;
    width: 200px;
}
/*Texture Picker menus*/
.texturePicker {
    width: 16px;
    height: 16px;
    float: left;
    margin: 0 4px 0;
    border: 1px solid #666;
}
.texturePicker a {
    width: 18px;
    height: 18px;
    display: block;
    cursor: pointer;
}
.texturePicker ul {
    width: 80px;
    margin: 0;
    padding: .5em 5px;
    list-style: none;
    position: absolute;
    top: 1.6em;    
    background: #222;
    z-index: 999999;
    border: 1px solid #444;
    border-top: 0;
}
.texturePicker ul li {
    float: left;
    width: 20px;
}
.texturePicker ul li a {
    color: #eee;
    text-decoration: none;
    display: block;
    text-indent: -99999px;
    border: 1px solid #222;
    height: 1.5em;
}
.texturePicker ul li a:hover {
    border: 1px solid #ccc;
}
.texturePicker ul li a:active {
    border: 1px solid #eeeeee;
    outline: 0 !important;
}




/*rounded corner warnings*/
a.cornerWarning { color: red !important; text-decoration: none; }
#cornerWarning {font-size: .9em; margin: 5px 0;}

/*Farbtastic styles*/
.farbtastic {
    display: none;
    position: fixed;
    background: #555;
    border: 1px solid #aaa;
    top: 1px;
    left: 15px;
    z-index: 99999999;
}
.farbtastic * {
    position: absolute;
    cursor: crosshair;
}
.farbtastic, .farbtastic .wheel {
    width: 195px;
    height: 195px;
}
.farbtastic .color, .farbtastic .overlay {
    top: 47px;
    left: 47px;
    width: 101px;
    height: 101px;
}
.farbtastic .wheel {
    background: url(../images/app/wheel.png) no-repeat;
    width: 195px;
    height: 195px;
}
.farbtastic .overlay {
    background: url(../images/app/mask.png) no-repeat;
}
.farbtastic .marker {
    width: 17px;
    height: 17px;
    margin: -8px 0 0 -8px;
    overflow: hidden;
    background: url(../images/app/marker.png) no-repeat;
}



/*NON_JS Submit Button*/
#submitBtn {
    background: #000000;
    color: #fff;
    text-decoration: none;
    border: 1px solid #444;
    font-weight: bold;
    cursor: pointer;
    font-size: 1.1em;
    padding: .4em 10px;
    font-family: Verdana, Arial, sans-serif;
}
#submitBtn:hover {
    background: #0D0D0D;
}






#themeGallery ul {
    margin: 0;
    padding: 0;
}
#themeGallery li {
    float: left;
    width: 96px;
    color: #fff;
    font-size: 1em;
    margin: .8em 5px .8em 0;
    list-style: none;
}
#themeGallery li a {
    color: #888;
    text-decoration: none;
    position: relative;
}
#themeGallery li a:hover {
    color: #fff;

}
#themeGallery li img {
    width: 90px;
    height: auto;
    display: block;
    padding-top:3px;
    border:0;
    border-top: 2px solid #000;
    position: relative;
}
#themeGallery li a:hover img {
    border-top: 2px solid #ccc;
}
#themeGallery li a:active img {
    border-top: 2px solid #f58809;
}
#themeGallery li span {
    display: block;
    margin: .1em 4px;
}
#themeGallery li span.themeName {
    font-weight: normal;
}
#themeGallery li span.themeDesiger {
    font-size: .9em;
}
#themeGallery a.download, #themeGallery a.edit {
    font-size: .9em;
    text-decoration: none !important;
    float: left;
    background: #333 url(../images/app/bg_sml_download_edit_btn.png) repeat-x scroll 50% 50% ;
    margin: 3px 4px 0 0;
    padding: 2px 4px;
    border: 1px solid #222;
    color: #ccc;

}
#themeGallery a.download:hover, #themeGallery a.edit:hover {
    background: #444 url(../images/app/bg_sml_download_edit_btn_hover.png) repeat-x scroll 50% 50%;
    color: #ddd;
}


/*help tab*/
#help h2 {
    font-size: 1.2em;
    margin: 1em 0 .3em;
}
#help a {
    color: #fa9300;
}
#help span.icon {
    float: left;
    background-image: url(../images/app/tr_icons_orange.png);
    height: 13px;
    width: 14px;
    margin: -1px 4px 0 0;
}
#help p {
    font-size: 1.1em;
}

/*bookmarklet notice */
#getBookmarklet {
    border: 1px solid #fcefa1;
    background: #fbf9ee url(../images/app/ui-bg_glass_55_fbf9ee_1x400.png) 50% 50% repeat-x;
    color: #363636;
    font-size: 1.3em;
    padding: 0 10px;
    float: right;
    margin: -30px -25px 0 0;
    -moz-border-radius: 6px !important; -webkit-border-radius: 6px !important;  border-radius: 6px !important;
}
#getBookmarklet p {
    margin: .7em 0;
    padding: 0;

}
.MargenTop10px{
    margin-top: 10px;
}


#getBookmarklet a {
    color: #297ED3;
}
#getBookmarklet a:hover {
    color: #1667B7;
}
#getBookmarklet span.icon {
    float: left;
    background: url(../images/app/tr_icons_orange.png) -224px -112px no-repeat;
    margin: -2px 4px 0 0;
}

/*COMPONENTS COLUMN*/
#components {
    background: #fff;
    padding: 15px;
    float: right;
    width: 680px;
}

#versionNotice {
    margin: 20px 0;
    border: 1px solid #333;
    padding: 20px;
    font-size: 1.2em;
    background: #eee;
}
#compGroupA {
    float: left;
    width: 58%;
}

#compGroupB {
    float: right;
    width: 38%;
}
.demoHeaders {
    font-size: 1.3em;
    font-weight: normal;
    margin: 2em 0 1em;
    clear: both;
}
.demoHeaders span {
    font-size: .8em;
}


#components #dialog_link {
    padding: .4em 1em .4em 20px;
    text-decoration: none;
    position: relative;
}
#components #dialog_link span.ui-icon {
    margin: 0 5px 0 0;
    position: absolute;
    left: .2em;
    top: 50%;
    margin-top: -8px;
    zoom: 1;
}




ul#icons {margin: 0; padding: 0;}
ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
ul#icons span.ui-icon {float: left; margin: 0 4px;}

/* ---------------------------------------------------------------
Clearfix
--------------------------------------------------------------- */
.clearfix:after {
    content: "."; 
    display: block; 
    height: 0; 
    clear: both; 
    visibility: hidden;
}

.clearfix {display: inline-block;}

/* Hides from IE-mac \*/
* html .clearfix {height: 1%;}
.clearfix {display: block;}

