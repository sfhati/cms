[IF:"[var:"dosuspend"end var]=1","
<style>
    body{
        margin:0;padding:0;
    }
    #susbind{
        background:#000;
        color: #fff;
        font-size: 72px;
        height: 100%;
        position: fixed;
        text-align: center;
        width: 100%;
        z-index: 999999;
        opacity: 0.5;
    }
</style>
 

<div id="susbind">
    You have to purchase!
</div>
"end IF]

[IF:"[session_var:"IDUSER_ADMIN"end session_var]","
<style>
    /*Costom jquery UI*/
    .ui-resizable { position: relative;}
    .ui-resizable-handle { position: absolute;font-size: 0.1px;z-index: 999; display: block; background: red;}
    .ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle { display: none; }
    .ui-resizable-n { height: 10px; width: 100%; top: -4px; left: 0; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle-n.png')}
    .ui-resizable-s { height: 10px; width: 100%; bottom: -4px; left: 0; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle-s.png') }
    .ui-resizable-e { width: 10px; right: -4px; top: 0; height: 100%; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle-e.png')}
    .ui-resizable-w { width: 10px; left: -4px; top: 0; height: 100%; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle-w.png')}

    .ui-resizable-se { cursor: se-resize; width: 17px; height: 17px; right: -8px; bottom: -9px; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle.png') }
    .ui-resizable-sw { cursor: sw-resize; width: 17px; height: 17px; left: -8px; bottom: -9px; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle.png')}
    .ui-resizable-nw { cursor: nw-resize; width: 17px; height: 17px; left: -8px; top: -9px; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle.png')}
    .ui-resizable-ne { cursor: ne-resize; width: 17px; height: 17px; right: -8px; top: -9px; background:url('[constant:"TEMPLATE_LINK"end constant]panel/images/drag-handle.png')}
</style>
<style id="panelthemecss">
       @import url("[constant:"TEMPLATE_LINK"end constant][setting:"filechangepaneltheme"end setting]");
</style>
<script>
    var Main_Domain = '[constant:"Main_Domain"end constant]';
    var SITE_LINK = '[constant:"SITE_LINK"end constant]';
    var id_thispage = '[this:"id"end this]';
    var selector_menu_trigger = '';
    var getaddressURL = '[function:"getAddress()"end function]';
    var square_thispage = '[this:"template"end this]';
</script>
<input id="id_thispage" value="[this:"id"end this]" type="hidden" />
<input id="qtipstyle1" value="[setting:"changepaneltheme1"end setting]" type="hidden" />
<input id="qtipstyle2" value="[setting:"changepaneltheme2"end setting]" type="hidden" />

       <menu id="widget_menu" for="n" type="context" style="display: none;">
    <command action="edit" onclick="doaction(this)" icon="control_panel" label="[controlplugin]"></command>
    <command action="edit_css" icon="cssedit" onclick="doaction(this)" label="[Edit CSS]"></command>
    <command action="refresh" icon="refresh" onclick="doaction(this)" label="[refresh]"></command>    
    <command action="withtitle" onclick="doaction(this)" icon="option withtitle " label="[withtitle]"></command>

    <menu icon="loadoption context-menu-separator" label="[load options]">
        <command action="withajax" onclick="doaction(this)" icon="option withajax " label="[withajax]"></command>
        <command action="withdynamic_static" onclick="doaction(this)" icon="option withdynamic_static" label="[dynamic_static]"></command>
        <command action="loadoption" onclick="doaction(this)" vlu="1" icon="option loadoption_1 context-menu-separator" label="[cachetype1]"></command>
        <command action="loadoption" onclick="doaction(this)" vlu="2" icon="option loadoption_2 " label="[cachetype2]"></command>
        <command action="loadoption" onclick="doaction(this)" vlu="3" icon="option loadoption_3 " label="[cachetype3]"></command>
        <command action="loadoption" onclick="doaction(this)" vlu="4" icon="option loadoption_4 " label="[cachetype4]"></command>
    </menu>

    <menu icon="boxwidth" label="[wdthbox]">
        <command action="boxwidth" onclick="doaction(this)" vlu="0" icon="option boxwidth_0" label="[withbox]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="1" icon="option boxwidth_1" label="[100 Box]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="2" icon="option boxwidth_2" label="[50 Box]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="3" icon="option boxwidth_3" label="[33 Box]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="23" icon="option boxwidth_23" label="[25 Box]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="4" icon="option boxwidth_4" label="[66 Box]"></command>
        <command action="boxwidth" onclick="doaction(this)" vlu="34" icon="option boxwidth_34" label="[75 Box]"></command>
    </menu>
    <menu icon="postion" label="[postion]">
        <command id="bring_to_front" onclick="doaction(this)" icon="bring_to_front" action="bring_to_front" label="[bring_to_front]"></command>
        <command id="send_to_back" onclick="doaction(this)" icon="send_to_back " action="send_to_back" label="[send_to_back]"></command>
        <command id="bring_forward" onclick="doaction(this)" icon="bring_forward " action="bring_forward" label="[bring_forward]"></command>
        <command id="send_backward" onclick="doaction(this)" icon="send_backward " action="send_backward" label="[send_backward]"></command>
    </menu>
    <menu icon="selecttemplate" label="[template]">
        [var:"selecttemplates"end var]
    </menu>
    <menu icon="showin" label="[run in]">
        <command action="openoption" onclick="doaction(this)" vlu="openoption" icon="question" label="[where is show]"></command>        
        <command action="showin" onclick="doaction(this)" vlu="i" icon="option showin_i context-menu-separator" label="[This Page only]"></command>
        <command action="showin" onclick="doaction(this)" vlu="t" icon="option showin_t" label="[This layout only]"></command>
        <command action="showin" onclick="doaction(this)" vlu="All" icon="option showin_All" label="[All]"></command>
        <command action="showinwidget_nsitp" onclick="doaction(this)" vlu="nsitp" icon="option showin_nsitp" label="[dont run in this page]"></command>
    </menu>
    <menu icon="side" label="[show side]">
        <command action="side" onclick="doaction(this)" vlu="1" icon="option side_1 context-menu-separator" label="[top1]"></command>
        <command action="side" onclick="doaction(this)" vlu="2" icon="option side_2" label="[top2]"></command>
        <command action="side" onclick="doaction(this)" vlu="3" icon="option side_3" label="[left1]"></command>
        <command action="side" onclick="doaction(this)" vlu="4" icon="option side_4" label="[left2]"></command>
        <command action="side" onclick="doaction(this)" vlu="5" icon="option side_5" label="[right1]"></command>
        <command action="side" onclick="doaction(this)" vlu="6" icon="option side_6" label="[right2]"></command>
        <command action="side" onclick="doaction(this)" vlu="7" icon="option side_7" label="[down1]"></command>
        <command action="side" onclick="doaction(this)" vlu="8" icon="option side_8" label="[down2]"></command>
    </menu>
    <menu icon="perm" label="[show Powers]">
        <command action="perm" onclick="doaction(this)" vlu="1" icon="check powerin_1  context-menu-separator" label="[admin]"></command>
        <command action="perm" onclick="doaction(this)" vlu="4" icon="check powerin_4" label="[moderator]"></command>
        <command action="perm" onclick="doaction(this)" vlu="2" icon="check powerin_2" label="[user]"></command>
        <command action="perm" onclick="doaction(this)" vlu="3" icon="option powerin_3" label="[guest]"></command>
        <command action="perm" onclick="doaction(this)" vlu="0" icon="option powerin_0" label="[public]"></command>
    </menu>
    <command id="codeedit" onclick="doaction(this)" action="codeedit" label="[code edit]" icon="codeedit context-menu-separator"></command>
    <command  onclick="doaction(this)"  action="delete" label="[Delete]" icon="delete"></command>
</menu>
<div id="hidedivx"></div>
<div id="blockall" style="display:none;z-index:1000;height: 100%;position: fixed;width: 100%;top:0;left:0"></div>
<div id="inline_themeroller" class="ui-draggable ui-resizable" style="z-index:1001">
    <a   tooltip="[cancel and Close]" class="closeTR tooltip-left" href="javascript:"></a>
    <iframe id="sfhati_iframe" frameborder="0" class="sfhati-iframe" name="trApp"></iframe>
</div>

<div id="window_x" style="display:none;">
    <a title="[Close]" style="left: 677px;position: relative;top: -13px;z-index: 3;" class="closeTR" href="javascript:"></a>
    <div id="sfhati_widget" class="content">
        <ul id="rollerTabsNav" class="clearfix corner-top ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
            <li class="state-default corner-top ui-state-default ui-corner-top ui-tabs-selected" ><a class="tab_sfhati" rel="tpl_tab" href="javascript:">[widget controls]</a></li>
            <li class="state-default corner-top ui-state-default ui-corner-top" ><a class="tab_sfhati" rel="tpl_tab1" href="javascript:">[templates]</a></li>
        </ul>
        <div id = 'sfhati_widgetload'  dir='[rtl_ltr]'></div>
    </div>
</div>
<div class="Prewiew_RecycleBin" id="Prewiew_RecycleBin"></div>
<!-- Panel -->
<div id="toppanel" style="display:none;">
    <div id="mini" style="display:none;"></div>
    <div id="panel">




        <!--    -----------------------------------Widget---------------------------------------------------- -->
        <div class="content clearfix boxDX" id="box_DX_4">

            <div id="otheroptionbuttonhn" style=" display: none; width: 100%;" rel="none">               
                <div class="buttonTheme applyotheroptionbutton" alt="header" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[Header]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="footer" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[Footer]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="top1" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[top1]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="top2" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[top2]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="left1" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[left1]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="left2" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[left2]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="right1" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[right1]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="right2" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[right2]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="down1" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[down1]</strong></div>
                <div class="buttonTheme applyotheroptionbutton" alt="down2" style="width:70px; float: right;  clear: none;"><span class="icon ui-icon-plusthick"></span><strong>[down2]</strong></div>
                <div class="buttonTheme" id="cancelotheroptionbutton" style="width:70px; float: right;  clear: none;"><span class="icon icon_cancel"></span><strong>[Cancel]</strong></div>
            </div>

            <div id="slides-widget">

                [var:"ALLWidget"end var]

            </div>            

            <div id="optionsforwidgets" style=" float:right">                
                <img class="optionsforwidget opacityoption tooltip-down" tooltip="[enabel disapld move resize]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/moveresize.png" fork="enabelddisapyldmoveresize" />
                <img class="optionsforwidget opacityoption tooltip-down" tooltip="[show hide other widget]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/showhideotherwidget.png" id="showhideotherwidget" fork="showhideotherwidget" />
            </div>
            <div id="otheroptionbutton" style=" display: none; float:left;width:455px" rel="none">                
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [Header]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay2.png" fork="header" style="margin-[left_right]: 30px;" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [Footer]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay3.png" fork="footer" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [top1]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/top1.png" fork="top1" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [top2]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/top2.png" fork="top2" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [left1]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/left1.png" fork="left1" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [left2]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/left2.png" fork="left2" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [right1]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/right1.png" fork="right1" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [right2]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/right2.png" fork="right2" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [down1]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/down1.png" fork="down1" />
                <img class="applyotheroptionbutton tooltip-down" tooltip="[add this widget to] [down2]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/down2.png" fork="down2" />
                <div class="applyotht">
                    <img class="applyotheroptionbutton tooltip-[left_right]" tooltip="[setting up this widget]" src="[constant:"TEMPLATE_LINK"end constant]panel/images/templtsettings.png" fork="settingtplt" />
                    <div class="applyotheroptionbutton tooltip-[left_right]" id="createUploader_template" tooltip="[add template to this widget]" fork="addtplt" ></div>                  
                </div>
            </div>

        </div>



        <!--    -----------------------------------Setting---------------------------------------------------- -->

        <div class="content clearfix boxDX" id="box_DX_1">


            <div id="slides-setting">

                [var:"ALLsetting"end var]

            </div>
        </div>


        <!--   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Page option~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="content clearfix boxDX" id="box_DX_3">
            <div class="[right_left]">
                <h1 id="title_left">[Page option]</h1>

                <div id="Success_page" style="width: 423px;">
                    <label for="page_title" class="grey">[side setting]</label>


                    <div class="side_view" style="float: left; margin-right: 3px; padding-right: 3px;">
                        <div style="background: url(&quot;[constant:"TEMPLATE_LINK"end constant]panel/images/l00.png&quot;) no-repeat scroll 0px 0%, url(&quot;[constant:"TEMPLATE_LINK"end constant]panel/images/l1.png&quot;) no-repeat scroll 0px 0%, url(&quot;[constant:"TEMPLATE_LINK"end constant]panel/images/l2.png&quot;) no-repeat scroll 0px 0px rgb(255, 255, 255); padding: 0px; margin-left: -1px; margin-top: -1px;" class="side_view tooltip-down" tooltip="فارغ" id="blank"></div>
                    </div>


                   <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/top1.png" onclick="scrolltoleft1('top1')" tooltip="[top1]" side="top1" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/top2.png" onclick="scrolltoleft1('top2')" tooltip="[top2]" side="top2" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/left1.png" onclick="scrolltoleft1('left1')" tooltip="[left1]" side="left1" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/left2.png" onclick="scrolltoleft1('left2')" tooltip="[left2]" side="left2" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/right1.png" onclick="scrolltoleft1('right1')" tooltip="[right1]" side="right1" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/right2.png" onclick="scrolltoleft1('right2')" tooltip="[right2]" side="right2" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/down1.png" onclick="scrolltoleft1('down1')" tooltip="[down1]" side="down1" class="side_view tooltip-down"/>
                    <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/down2.png" onclick="scrolltoleft1('down2')" tooltip="[down2]" side="down2" class="side_view tooltip-down"/>
                </div><br/>

                <img id="usersquare_box" tooltip="[square box]" class="tooltip-up pointr" onclick="hidebeforobenbox('square_box');
                        $('#square_box').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/isquare_[this:"template"end this].png"/>
                     <img id="bpasgerpaste" tooltip="[control place page]" class="tooltip-up pointr" onclick="hidebeforobenbox('pasgerpaste');
                             $('#pasgerpaste').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/menu_page.png"/>
                <img id="userpremissins" tooltip="[permition_page[this:"powers"end this]]" class="tooltip-up pointr" onclick="hidebeforobenbox('permissions');$('#permissions').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user[this:"powers"end this].png"/>
                     [IF:"[var:"id"end var]=[setting:"home_page"end setting]"," [ELSE]
                     <img tooltip="[delete_page]" class="tooltip-up pointr removeafterhome" onclick="if (confirm('Do you really want to delete this record?'))
                                 window.open('[constant:"SITE_LINK"end constant]?plgn=pages&delete_page=' + $('#id_thispage').val(), '_self')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/delete_page.png"/>
                <img tooltip="[makehome_page]" class="tooltip-up pointr removeafterhome" onclick="result_theme_panel_load('[constant:"SITE_LINK"end constant]?plgn=pages&makehome_page=' + $('#id_thispage').val());
                        $('.removeafterhome').hide('fast');" src="[constant:"TEMPLATE_LINK"end constant]panel/images/home_page.png"/>
                ",end IF]
                <img id="pageaddnewin" tooltip="[Add new Page]" class="tooltip-up pointr" onclick="hidebeforobenbox('pageaddnewin1');
                        $('#pageaddnewin1').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/new_page.png"/>
                <div id="pageimagechanger" tooltip="[Edit image for this page]" class="tooltip-up pointr siteiconchnger" ></div>
                <img id="pagetitlechange" tooltip="[Edit title for this page]" class="tooltip-up pointr" onclick="hidebeforobenbox('pagetitlechange1');
                        $('#pagetitlechange1').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/edit_page.png"/>
                <img id="pageurlchange" tooltip="[Edit url for this page]" class="tooltip-up pointr" onclick="hidebeforobenbox('pageurlchange1');
                        $('#pageurlchange1').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/url_page.png"/>
                <img id="pagetreechange" tooltip="[Edit tree for this page]" class="tooltip-up pointr" src="[constant:"TEMPLATE_LINK"end constant]panel/images/tree_page.png"/>
                <img id="bpage_sideh" tooltip="[control side page]" class="tooltip-up pointr" onclick="hidebeforobenbox('page_sideh');
                        $('#page_sideh').toggle('fast');scrolltoleft1('right2')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/side_page.png"/>
                
                <div id="permissions" class="boxcoption" >
                    <img tooltip="[make] [permition_page0]" for="0" class="tooltip-down pointr userpremissins" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user0.png"/>
                    <img tooltip="[make] [permition_page1]" for="1" class="tooltip-down pointr userpremissins" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user1.png"/>
                    <img tooltip="[make] [permition_page2]" for="2" class="tooltip-down pointr userpremissins" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user2.png"/>
                    <img tooltip="[make] [permition_page3]" for="3" class="tooltip-down pointr userpremissins" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user3.png"/>               
                    <img tooltip="[make] [permition_page4]" for="4" class="tooltip-down pointr userpremissins" src="[constant:"TEMPLATE_LINK"end constant]panel/images/user4.png"/>               
                </div>
                <div id="square_box" class="boxcoption" >
                    <img tooltip="[green]" for="green" class="tooltip-down pointr usersquare_box" onclick="" src="[constant:"TEMPLATE_LINK"end constant]panel/images/square_green.png"/>
                    <img tooltip="[blue]" for="blue" class="tooltip-down pointr usersquare_box" onclick="" src="[constant:"TEMPLATE_LINK"end constant]panel/images/square_blue.png"/>
                    <img tooltip="[red]" for="red" class="tooltip-down pointr usersquare_box" onclick="" src="[constant:"TEMPLATE_LINK"end constant]panel/images/square_red.png"/>
                    <img tooltip="[orange]" for="orange" class="tooltip-down pointr usersquare_box" onclick="" src="[constant:"TEMPLATE_LINK"end constant]panel/images/square_orange.png"/>               
                </div>
                <div id="page_sideh" class="boxcoption">
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner1" valu="right1" >[right1]</span> <div cap="[right1]" class="sidespinner" valu="10" trg="spinner1"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner2" valu="right2" >[right2]</span> <div cap="[right2]" class="sidespinner" valu="10" trg="spinner2"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner3" valu="left1" >[left1]</span> <div cap="[left1]" class="sidespinner" valu="10" trg="spinner3"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner4" valu="left2" >[left2]</span> <div cap="[left2]" class="sidespinner" valu="10" trg="spinner4"></div> 
                    <br clear="all"/>
                    <span class="spinerslide" id="margenside" >[margenside]</span> <div id="margensidex"></div>   
                    <br clear="all"/>
                    <img id="savesidepagechange" tooltip="[Save Changes Style]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>
                    <img id="savesidepagechangex" tooltip="[Save Changes Style as defult]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/saveall.png"/>
                    <img id="erazeidepagechange" tooltip="[delete Changes Style]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/unsave.png"/>
                    <img id="erazeidepagechangex" tooltip="[delete all Changes Style]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/unsaveall.png"/>
                    <br clear="all"/>
                </div>  

                <div id="pasgerpaste" class="boxcoption">  

                    [var:"button_place_option"end var]

                </div>   
                <div id="pageurlchange1" class="boxcoption">  

                    <label class="grey">[URL]</label>
                    <input id="pageurlchangeinput" style="width: 400px;margin:0" value="[this:"url"end this]"/>   <br>            
                    <select id="pageurlchangeselect" style="width: 400px;margin:0">
                        <option value="_self">[url_self]</option>
                        <option value="_block">[url_block]</option>
                        <option value="_ajax">[url_ajax]</option>
                    </select> 
                    <br clear="all">    
                    <img id="savepageurlchange" tooltip="[save change url page]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>
                    <br clear="all"> 
                </div><br clear="all"> 
                <div id="pagetreechange1" class="boxcoption">  
                    <input id="pagetreechangeinput" type="hidden" value="[this:"slave"end this]"/>
                           <select id="pagetreechangeselect">
                        <option value='0'>[root page tree]</option>
                        [var:"allpagescode"end var]
                    </select>
                    <img id="savepagetreechange" tooltip="[save change tree page]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>

                </div>
                <div id="pagetitlechange1" class="boxcoption">  
                    <label class="grey">[change title page]</label>
                    <input id="pagesitletitle" style="width: 400px;margin:0" value="[this:"page_name"end this]"/>
                           <br>
                    <label class="grey">[keywords]</label>
                    <input id="pagesitlepage_cont" style="width: 400px;margin:0" value="[this:"page_key"end this]"/>
                           <br>
                    <label class="grey">[discription for this page]</label>
                    <input id="pagesitledescription" style="width: 400px;margin:0" value="[this:"description"end this]"/>
                           <br>      
                    <img id="savepagetitlechange1" tooltip="[Save]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>
                    <br clear="all">      
                </div>
                <div id="pageaddnewin1" class="boxcoption">  


                    [copy from]<br>
                    <select id="newpagetreechangeselect" style="width: 400px;margin:0">
                        <option value='0'>[blank]</option>
                        [var:"allpagescode"end var]
                    </select>       <br>
                    [slave to]<br>
                    <select id="newpageundertreechangeselect" style="width: 400px;margin:0">
                        <option value='0'>[root page tree]</option>
                        [var:"allpagescode"end var]
                    </select> <br>
                    [Title page]  <br>    <input id="newpagesitletitle" style="width: 400px;margin:0" value=""/>  <br>      
                    <img id="savepageaddnewin1" tooltip="[Create]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>
                    <br clear="all">      

                </div>                

                <br/>           
            </div>
            <div class="[right_left]">

                <h1 id="title_left">[Site option]</h1>
                <label for="Site_Postion" class="grey">[Layout setting]</label>
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay1.png" vlu="1" tooltip="[lay1]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay2.png" vlu="2" tooltip="[lay2]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay3.png" vlu="3" tooltip="[lay3]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay4.png" vlu="4" tooltip="[lay4]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay5.png" vlu="5" tooltip="[lay5]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay6.png" vlu="6" tooltip="[lay6]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay7.png" vlu="7" tooltip="[lay7]" class="postion_view tooltip-down">
                <img src="[constant:"TEMPLATE_LINK"end constant]panel/images/lay8.png" vlu="8" tooltip="[lay8]" class="postion_view tooltip-down">
                <br/>
<img id="saveslay" tooltip="[Save Changes Style]" class="tooltip-up pointr left" src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png">
<img id="erazelay" tooltip="[cancel update]" class="tooltip-up pointr left" src="[constant:"TEMPLATE_LINK"end constant]panel/images/unsave.png">
                <img id="siteradiochnger" tooltip="[change site radio]" class="tooltip-up pointr left" onclick="hidebeforobenbox('siteradiochngers');
                        $('#siteradiochngers').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/radio.png"/>
                <img id="siteborderchnger" tooltip="[change site border]" class="tooltip-up pointr left" onclick="hidebeforobenbox('siteborderchngers');
                        $('#siteborderchngers').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/border.png"/>
                <img id="sitechadowchnger" tooltip="[change site chadow]" class="tooltip-up pointr left" onclick="hidebeforobenbox('sitechadowchngers');
                        $('#sitechadowchngers').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/chadow.png"/>
                <img id="sitemargenstritchchnger" tooltip="[change site margenstritch]" class="tooltip-up pointr left" onclick="hidebeforobenbox('sitemargenstritchchngers');
                        $('#sitemargenstritchchngers').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/margenstritch.png"/>
                <img id="sitetitlechnger" tooltip="[change site title]" class="tooltip-up pointr left" onclick="hidebeforobenbox('sitetitlechngers');
                        $('#sitetitlechngers').toggle('fast')" src="[constant:"TEMPLATE_LINK"end constant]panel/images/title.png"/>
                <div id="siteiconchnger" tooltip="[change icon site]" class="tooltip-up pointr siteiconchnger left"  ></div>
                <br clear="all"/>
                <div id="sitetitlechngers" class="boxcoption" >
                    <input id="sitletitle" value="[setting:"title"end setting]"/>
                           <img id="savesiteiconchnger" tooltip="[save change title site]" class="tooltip-down pointr saveinputpage"  src="[constant:"TEMPLATE_LINK"end constant]panel/images/save.png"/>
                </div> 
                <input type="hidden" id="oldlay"/>
                <div id="siteradiochngers" class="boxcoption" >
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner05">[header]</span> <div cap="[header]" class="layoutpinner" valu="10" trg=".wrapper_header" spantrg="spinner05"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner06">[Content]</span> <div cap="[Content]" class="layoutpinner" valu="10" trg=".wrapper_content" spantrg="spinner06"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner07">[Footer]</span> <div cap="[Footer]" class="layoutpinner" valu="10" trg=".wrapper_footer" spantrg="spinner07"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner08">[template]</span> <div cap="[template]" class="layoutpinner" valu="10" trg=".global_wrapper" spantrg="spinner08"></div>  
                    <br clear="all"/> 
                    <div tooltip="[overflowhide]" class="tooltip-down icon icon-option checkoptionxo" trg="overflow"></div>
                    <div id="paddinguse" tooltip="[padding use]" class="tooltip-down icon icon-option checkoptionxo" trg="padding"></div>
                    <br clear="all"/> 
                </div>

                <div id="siteborderchngers" class="boxcoption" >

                    <br clear="all"/>
                    <span class="spinerslide">[Color]</span>
                    <input class="colorpickers" id="colorpickersborder" title="color" ext="#333399" type="text" value="#000" />  
                    <br clear="all"/>                  
                    <span class="spinerslide" id="spinner09">[header]</span> <div cap="[header]" class="layoutpinnerborder" valu="10" trg=".wrapper_header" spantrg="spinner09"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner010">[Content]</span> <div cap="[Content]" class="layoutpinnerborder" valu="10" trg=".wrapper_content" spantrg="spinner010"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner011">[Footer]</span> <div cap="[Footer]" class="layoutpinnerborder" valu="10" trg=".wrapper_footer" spantrg="spinner011"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner012">[template]</span> <div cap="[template]" class="layoutpinnerborder" valu="10" trg=".global_wrapper" spantrg="spinner012"></div>  
                    <br clear="all"/>                  
                </div>

                <div id="sitechadowchngers" class="boxcoption" >
                    <br clear="all"/>
                    <span class="spinerslide">[Color]</span>
                    <input class="colorpickers" id="colorpickersshadow" title="color" ext="#333399" type="text" value="#000" />  
                    <br clear="all"/>                  
                    <span class="spinerslide" id="spinner013">[header]</span> <div cap="[header]" class="layoutpinnershadow" valu="10" trg=".wrapper_header" spantrg="spinner013"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner014">[Content]</span> <div cap="[Content]" class="layoutpinnershadow" valu="10" trg=".wrapper_content" spantrg="spinner014"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner015">[Footer]</span> <div cap="[Footer]" class="layoutpinnershadow" valu="10" trg=".wrapper_footer" spantrg="spinner015"></div>  
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner016">[template]</span> <div cap="[template]" class="layoutpinnershadow" valu="10" trg=".global_wrapper" spantrg="spinner016"></div>  
                    <br clear="all"/>                                        
                </div>


                <div id="sitemargenstritchchngers" class="boxcoption" >
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner017">[header]</span> <div cap="[header]" class="layoutpinnerstritchchnger" valu="10" trg=".wrapper_header" spantrg="spinner017"></div>  
                    <div tooltip="[width_size_full]" class="tooltip-down icon icon-option checkoption" trg=".wrapper_header"></div>
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner018">[Content]</span> <div cap="[Content]" class="layoutpinnerstritchchnger" valu="10" trg=".wrapper_content" spantrg="spinner018"></div>  
                    <div tooltip="[width_size_full]" class="tooltip-down icon icon-option checkoption" trg=".wrapper_content"></div>
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner019">[Footer]</span> <div cap="[Footer]" class="layoutpinnerstritchchnger" valu="10" trg=".wrapper_footer" spantrg="spinner019"></div>  
                    <div tooltip="[width_size_full]" class="tooltip-down icon icon-option checkoption" trg=".wrapper_footer"></div>
                    <br clear="all"/>
                    <span class="spinerslide" id="spinner020">[template]</span> <div cap="[template]" class="layoutpinnerstritchchnger" valu="10" trg=".global_wrapper" spantrg="spinner020"></div>  
                    <div tooltip="[width_size_full]" class="tooltip-down icon icon-option checkoption" trg=".global_wrapper"></div>
                    <br clear="all"/>
                    <div tooltip="[postion_right]" class="tooltip-down icon icon-option checkoptionx" trg="right"></div>
                    <div tooltip="[postion_center]" class="tooltip-down icon icon-option checkoptionx" trg="none"></div>
                    <div tooltip="[postion_left]" class="tooltip-down icon icon-option checkoptionx" trg="left"></div>
                    <br clear="all"/>
                </div>
<br clear="all"/>

            </div>  
        </div>

        <!--   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~themes~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <div class="content clearfix boxDX" id="box_DX_2">
            <div id="slides">
                [var:"ALLTheme"end var]
            </div>
            <div id="oktheme" style="padding-[right_left]: 18px; display: none;">
                <div style="margin-[left_right]: 10px;float:[right_left];clear:none;" class="corner-all buttonTheme" id="apply_theme"><span class="icon icon_apply"></span><strong>[apply]</strong></div>
                <div id="cancel_theme" class="corner-all buttonTheme" style="margin-[left_right]: 10px;float:right;clear:none;"><span class="icon icon_cancel"></span><strong>[Cancel]</strong></div>
            </div>
        </div>

        <!--   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~my account~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <div class="content clearfix boxDX" id="box_DX_6">
            <div dir="[rtl_ltr]">
                &nbsp;[Welcome] [session_array:"INFO_USER","name"end session_array] [Last login] [function:"date('d M Y','[session_array:"INFO_USER","date1"end session_array]')"end function] &nbsp;&nbsp;&nbsp;<a href="?out=1">
                    [Logout]</a>
            </div>    
            [var:"panner_x"end var]          

            <h1>[my account setting] </h1>
            <div class="[right_left]">               
                <br/>
                <div id="heapbox_5532211" class="heapBox">
                    <a href="javascript:" class="holder"><span>[Language choose]</span></a>
                    <a href="javascript:" class="handler"></a>

                    <div class="heap">
                        <ul class="heapOptions">
                            [var:"get_all_language_flag"end var]
                        </ul>
                    </div>

                </div>                    








                <div id="heapbox_55322211" class="heapBox">
                    <a href="javascript:" class="holder"><span>[Account Information]</span></a>
                    <a href="javascript:" class="handler"></a>

                    <div class="heap">
                        <ul class="heapOptions">
                            [EACH:"information_cpanel","
                            <li class="heapOption"  title="%information_cpanel:val%">
                                <a href='javascript:'>
                                    <p>[%information_cpanel:key%]</p>
                                    <span>%information_cpanel:val%</span>
                                </a>
                            </li>

                            "end EACH]
                        </ul>
                    </div>

                </div>                   

                
               <div id="heapbox_5532211x" class="heapBox">
                    <a href="javascript:" class="holder"><span>[changepaneltheme]</span></a>
                    <a href="javascript:" class="handler"></a>

                    <div class="heap">
                        <ul class="heapOptions">
<li class="heapOption">    <a onclick="changepaneltheme('cream')">[xcream]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('dark')">[xdark]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('green')">[xgreen]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('light')">[xlight]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('red')">[xred]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('blue')">[xblue]</a></li> 
<li class="heapOption">    <a onclick="changepaneltheme('rand')">[random]</a></li> 
                           
                        </ul>
                    </div>

                </div>                    
                
            </div>  
            <div class="[right_left]"> 
                <div class="contentbarscroll information_news">
                    [var:"news_main_page"end var]
                </div>
            </div>            
            <div style="clear: both"> [Developed on &copy; Sfhati. All rights reserved] </div>
        </div>



        <!--   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Style~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <div class="content clearfix boxDX" id="box_DX_5">

            <div>
                <div class="[right_left]" style="width: 640px;" >

                    <div>  
                        <div style="float: [left_right];padding-top: 2px;">

                            <div id="save_css_efitor" class="corner-all buttonTheme"><span class="icon icon_apply"></span>[Save Changes Style]</div>
                            <!--div id="restore_css_efitor1" class="corner-all buttonTheme" style="margin-top: 3px;"><span class="icon icon_restore"></span>[Restore Orginal Style]</div-->
                            <form style="display:none" method="post" id="save_font_form" target="x_form">
                                <input id="CSS_theme_save" name="CSS_theme_save" value=""/>
                                <input id="CSS_theme_val" name="CSS_theme_val" value="" />
                                <input type="submit">
                            </form>  
                        </div>
                        <div style="float: [right_left];">
                            <h1>[Quick change image & color]</h1>     
                            <label class="grey" for="changeoMstyle">[Select section and modify font]</label>                
                        </div>                    
                    </div>



                    <div id="choz_combo">

                        <div class="heapBox" id="changeoMstylex">
                            <a class="holder" href="javascript:"><span>[Select section]</span></a>
                            <a class="handler" href="javascript:"></a>

                            <div class="heap" style="display: none;">
                                <ul class="heapOptions">                            
                                    <li class="heapOption"><a href="javascript:" value="choz_color">[color]</a></li> 
                                    <li class="heapOption"><a href="javascript:" value="choz_header">[header]</a></li> 
                                    <li class="heapOption"><a href="javascript:" value="choz_Divisors">[Divisors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" value="choz_shadows">[shadows]</a></li> 
                                    <li class="heapOption"><a href="javascript:" value="choz_patterns">[patterns]</a></li> 
                                    <li class="heapOption"><a href="javascript:" value="choz_boxs">[boxs]</a></li>     
                                    <li class="heapOption"><a href="javascript:" value="choz_widget">[Widget]</a></li>     
                                    <li class="heapOption"><a href="javascript:" value="choz_font">[Font Style]</a></li> 
                                </ul>
                            </div>
                        </div>


                        <div class="heapBox" id="changeoMstyle">
                            <a class="holder" href="javascript:"><span>[Select proprtis]</span></a>
                            <a class="handler" href="javascript:"></a>

                            <div class="heap" style="display: none;">
                                <ul class="heapOptions">                            
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_bar">[Top Bar]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_bkgimage">[Background]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_logo">[Logo]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_shines">[Top Shine]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_search">[Search box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_menu">[Menu]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_socials">[Social Icons]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_header" value="set_header_height">[header-footer-height]</a></li> 


                                    <li class="heapOption"><a href="javascript:" isin="choz_color" value="set_color" fork=".wrapper_content">[Content Colors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_color" value="set_color" fork="body">[body Colors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_color" value="set_color" fork=".wrapper_footer">[Footer Colors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_color" value="set_color" fork=".wrapper_header">[Header Colors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_color" value="set_color" fork=".global_wrapper">[container Colors]</a></li> 

                                    <li class="heapOption"><a href="javascript:" isin="choz_Divisors" value="set_general_divisors" fork="body .header_separate">[Header Divisors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_Divisors" value="set_general_divisors" fork="body .content_separate">[Content Divisors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_Divisors" value="set_general_divisors" fork="body .footer_separate">[Footer Divisors]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_Divisors" value="set_general_divisors" fork="body #content HR">[line Divisors]</a></li> 

                                    <li class="heapOption"><a href="javascript:" isin="choz_shadows" value="set_shadows" fork="header">[Header shadows]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_shadows" value="set_shadows" fork="content">[Content shadows]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_shadows" value="set_shadows" fork="footer">[Footer shadows]</a></li> 

                                    <li class="heapOption"><a href="javascript:" isin="choz_patterns" value="set_gral_patterns" fork="Body">[Body patterns]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_patterns" value="set_gral_patterns" fork="Header">[Header patterns]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_patterns" value="set_gral_patterns" fork="Content">[Content patterns]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_patterns" value="set_gral_patterns" fork="Footer">[Footer patterns]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_patterns" value="set_gral_patterns" fork="Wrapper">[Wrapper patterns]</a></li> 


                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="1">[100 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="2">[50 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="3">[33 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="4">[25 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="23">[66 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_blog_boxes" fork="34">[75 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_read_more" >[Bottons]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_boxs" value="set_jquery_ui" >jquery ui</a></li> 


                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme ">[body]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme a">[link]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme a:hover">[link hover]</a></li>                             

                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h1">H1</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h2">H2</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h3">H3</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h4">H4</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h5">H5</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h6">H6</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".body_theme h7">H7</a></li>                             

                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".header_menu_bar ul li a">[Top Bar]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".container_menu ul li a">[Menu]</a></li>                             



                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_1 .head_post h2,.head_post h2 a">[boxtitle] [100 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_1 .entry_post">[boxContent] [100 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_1 .entry_post a">[boxLinks] [100 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_2 .head_post h2,.head_post h2 a">[boxtitle] [50 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_2 .entry_post">[boxContent] [50 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_2 .entry_post a">[boxLinks] [50 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_3 .head_post h2,.head_post h2 a">[boxtitle] [33 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_3 .entry_post">[boxContent] [33 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_3 .entry_post a">[boxLinks] [33 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_4 .head_post h2,.head_post h2 a">[boxtitle] [25 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_4 .entry_post">[boxContent] [25 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_4 .entry_post a">[boxLinks] [25 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_23 .head_post h2,.head_post h2 a">[boxtitle] [66 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_23 .entry_post">[boxContent] [66 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_23 .entry_post a">[boxLinks] [66 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_34 .head_post h2,.head_post h2 a">[boxtitle] [75 Box]</a></li> 
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_34 .entry_post">[boxContent] [75 Box]</a></li>                             
                                    <li class="heapOption"><a href="javascript:" isin="choz_font" value="set_font_style" fork=".width_boxes_34 .entry_post a">[boxLinks] [75 Box]</a></li> 
                                    [var:"widget_themerstyle"end var]

                                </ul>
                            </div>                          

                        </div>
                    </div>
                    <br clear="all"/>                    
                    <div id="main_settings" style="float:[right_left]">

                        [var:"widget_themerset_panel"end var]
                        <div class="set_panel set_color">

                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tbody><tr><td style="background-color:transparent;background-image: url([constant:"TEMPLATE_LINK"end constant]panel/images/no-color.png)"></td><td style="background-color:#FBF2EF"></td><td style="background-color:#FBF5EF"></td><td style="background-color:#FBF8EF"></td><td style="background-color:#FBFBEF"></td><td style="background-color:#F8FBEF"></td><td style="background-color:#F5FBEF"></td><td style="background-color:#F2FBEF"></td><td style="background-color:#EFFBEF"></td><td style="background-color:#EFFBF2"></td><td style="background-color:#EFFBF5"></td><td style="background-color:#EFFBF8"></td><td style="background-color:#EFFBFB"></td><td style="background-color:#EFF8FB"></td><td style="background-color:#EFF5FB"></td><td style="background-color:#EFF2FB"></td><td style="background-color:#EFEFFB"></td><td style="background-color:#F2EFFB"></td><td style="background-color:#F5EFFB"></td><td style="background-color:#F8EFFB"></td><td style="background-color:#FBEFFB"></td><td style="background-color:#FBEFF8"></td><td style="background-color:#FBEFF5"></td><td style="background-color:#FBEFF2"></td><td style="background-color:#FFFFFF"></td></tr>
                                    <tr><td style="background-color:#F8E0E0"></td><td style="background-color:#F8E6E0"></td><td style="background-color:#F8ECE0"></td><td style="background-color:#F7F2E0"></td><td style="background-color:#F7F8E0"></td><td style="background-color:#F1F8E0"></td><td style="background-color:#ECF8E0"></td><td style="background-color:#E6F8E0"></td><td style="background-color:#E0F8E0"></td><td style="background-color:#E0F8E6"></td><td style="background-color:#E0F8EC"></td><td style="background-color:#E0F8F1"></td><td style="background-color:#E0F8F7"></td><td style="background-color:#E0F2F7"></td><td style="background-color:#E0ECF8"></td><td style="background-color:#E0E6F8"></td><td style="background-color:#E0E0F8"></td><td style="background-color:#E6E0F8"></td><td style="background-color:#ECE0F8"></td><td style="background-color:#F2E0F7"></td><td style="background-color:#F8E0F7"></td><td style="background-color:#F8E0F1"></td><td style="background-color:#F8E0EC"></td><td style="background-color:#F8E0E6"></td><td style="background-color:#FAFAFA"></td></tr>
                                    <tr><td style="background-color:#F6CECE"></td><td style="background-color:#F6D8CE"></td><td style="background-color:#F6E3CE"></td><td style="background-color:#F5ECCE"></td><td style="background-color:#F5F6CE"></td><td style="background-color:#ECF6CE"></td><td style="background-color:#E3F6CE"></td><td style="background-color:#D8F6CE"></td><td style="background-color:#CEF6CE"></td><td style="background-color:#CEF6D8"></td><td style="background-color:#CEF6E3"></td><td style="background-color:#CEF6EC"></td><td style="background-color:#CEF6F5"></td><td style="background-color:#CEECF5"></td><td style="background-color:#CEE3F6"></td><td style="background-color:#CED8F6"></td><td style="background-color:#CECEF6"></td><td style="background-color:#D8CEF6"></td><td style="background-color:#E3CEF6"></td><td style="background-color:#ECCEF5"></td><td style="background-color:#F6CEF5"></td><td style="background-color:#F6CEEC"></td><td style="background-color:#F6CEE3"></td><td style="background-color:#F6CED8"></td><td style="background-color:#F2F2F2"></td></tr>
                                    <tr><td style="background-color:#F5A9A9"></td><td style="background-color:#F5BCA9"></td><td style="background-color:#F5D0A9"></td><td style="background-color:#F3E2A9"></td><td style="background-color:#F2F5A9"></td><td style="background-color:#E1F5A9"></td><td style="background-color:#D0F5A9"></td><td style="background-color:#BCF5A9"></td><td style="background-color:#A9F5A9"></td><td style="background-color:#A9F5BC"></td><td style="background-color:#A9F5D0"></td><td style="background-color:#A9F5E1"></td><td style="background-color:#A9F5F2"></td><td style="background-color:#A9E2F3"></td><td style="background-color:#A9D0F5"></td><td style="background-color:#A9BCF5"></td><td style="background-color:#A9A9F5"></td><td style="background-color:#BCA9F5"></td><td style="background-color:#D0A9F5"></td><td style="background-color:#E2A9F3"></td><td style="background-color:#F5A9F2"></td><td style="background-color:#F5A9E1"></td><td style="background-color:#F5A9D0"></td><td style="background-color:#F5A9BC"></td><td style="background-color:#E6E6E6"></td></tr>
                                    <tr><td style="background-color:#F78181"></td><td style="background-color:#F79F81"></td><td style="background-color:#F7BE81"></td><td style="background-color:#F5DA81"></td><td style="background-color:#F3F781"></td><td style="background-color:#D8F781"></td><td style="background-color:#BEF781"></td><td style="background-color:#9FF781"></td><td style="background-color:#81F781"></td><td style="background-color:#81F79F"></td><td style="background-color:#81F7BE"></td><td style="background-color:#81F7D8"></td><td style="background-color:#81F7F3"></td><td style="background-color:#81DAF5"></td><td style="background-color:#81BEF7"></td><td style="background-color:#819FF7"></td><td style="background-color:#8181F7"></td><td style="background-color:#9F81F7"></td><td style="background-color:#BE81F7"></td><td style="background-color:#DA81F5"></td><td style="background-color:#F781F3"></td><td style="background-color:#F781D8"></td><td style="background-color:#F781BE"></td><td style="background-color:#F7819F"></td><td style="background-color:#D8D8D8"></td></tr>
                                    <tr><td style="background-color:#FA5858"></td><td style="background-color:#FA8258"></td><td style="background-color:#FAAC58"></td><td style="background-color:#F7D358"></td><td style="background-color:#F4FA58"></td><td style="background-color:#D0FA58"></td><td style="background-color:#ACFA58"></td><td style="background-color:#82FA58"></td><td style="background-color:#58FA58"></td><td style="background-color:#58FA82"></td><td style="background-color:#58FAAC"></td><td style="background-color:#58FAD0"></td><td style="background-color:#58FAF4"></td><td style="background-color:#58D3F7"></td><td style="background-color:#58ACFA"></td><td style="background-color:#5882FA"></td><td style="background-color:#5858FA"></td><td style="background-color:#8258FA"></td><td style="background-color:#AC58FA"></td><td style="background-color:#D358F7"></td><td style="background-color:#FA58F4"></td><td style="background-color:#FA58D0"></td><td style="background-color:#FA58AC"></td><td style="background-color:#FA5882"></td><td style="background-color:#BDBDBD"></td></tr>
                                    <tr><td style="background-color:#FE2E2E"></td><td style="background-color:#FE642E"></td><td style="background-color:#FE9A2E"></td><td style="background-color:#FACC2E"></td><td style="background-color:#F7FE2E"></td><td style="background-color:#C8FE2E"></td><td style="background-color:#9AFE2E"></td><td style="background-color:#64FE2E"></td><td style="background-color:#2EFE2E"></td><td style="background-color:#2EFE64"></td><td style="background-color:#2EFE9A"></td><td style="background-color:#2EFEC8"></td><td style="background-color:#2EFEF7"></td><td style="background-color:#2ECCFA"></td><td style="background-color:#2E9AFE"></td><td style="background-color:#2E64FE"></td><td style="background-color:#2E2EFE"></td><td style="background-color:#642EFE"></td><td style="background-color:#9A2EFE"></td><td style="background-color:#CC2EFA"></td><td style="background-color:#FE2EF7"></td><td style="background-color:#FE2EC8"></td><td style="background-color:#FE2E9A"></td><td style="background-color:#FE2E64"></td><td style="background-color:#A4A4A4"></td></tr>
                                    <tr><td style="background-color:#FF0000"></td><td style="background-color:#FF4000"></td><td style="background-color:#FF8000"></td><td style="background-color:#FFBF00"></td><td style="background-color:#FFFF00"></td><td style="background-color:#BFFF00"></td><td style="background-color:#80FF00"></td><td style="background-color:#40FF00"></td><td style="background-color:#00FF00"></td><td style="background-color:#00FF40"></td><td style="background-color:#00FF80"></td><td style="background-color:#00FFBF"></td><td style="background-color:#00FFFF"></td><td style="background-color:#00BFFF"></td><td style="background-color:#0080FF"></td><td style="background-color:#0040FF"></td><td style="background-color:#0000FF"></td><td style="background-color:#4000FF"></td><td style="background-color:#8000FF"></td><td style="background-color:#BF00FF"></td><td style="background-color:#FF00FF"></td><td style="background-color:#FF00BF"></td><td style="background-color:#FF0080"></td><td style="background-color:#FF0040"></td><td style="background-color:#848484"></td></tr>
                                    <tr><td style="background-color:#DF0101"></td><td style="background-color:#DF3A01"></td><td style="background-color:#DF7401"></td><td style="background-color:#DBA901"></td><td style="background-color:#D7DF01"></td><td style="background-color:#A5DF00"></td><td style="background-color:#74DF00"></td><td style="background-color:#3ADF00"></td><td style="background-color:#01DF01"></td><td style="background-color:#01DF3A"></td><td style="background-color:#01DF74"></td><td style="background-color:#01DFA5"></td><td style="background-color:#01DFD7"></td><td style="background-color:#01A9DB"></td><td style="background-color:#0174DF"></td><td style="background-color:#013ADF"></td><td style="background-color:#0101DF"></td><td style="background-color:#3A01DF"></td><td style="background-color:#7401DF"></td><td style="background-color:#A901DB"></td><td style="background-color:#DF01D7"></td><td style="background-color:#DF01A5"></td><td style="background-color:#DF0174"></td><td style="background-color:#DF013A"></td><td style="background-color:#6E6E6E"></td></tr>
                                    <tr><td style="background-color:#B40404"></td><td style="background-color:#B43104"></td><td style="background-color:#B45F04"></td><td style="background-color:#B18904"></td><td style="background-color:#AEB404"></td><td style="background-color:#86B404"></td><td style="background-color:#5FB404"></td><td style="background-color:#31B404"></td><td style="background-color:#04B404"></td><td style="background-color:#04B431"></td><td style="background-color:#04B45F"></td><td style="background-color:#04B486"></td><td style="background-color:#04B4AE"></td><td style="background-color:#0489B1"></td><td style="background-color:#045FB4"></td><td style="background-color:#0431B4"></td><td style="background-color:#0404B4"></td><td style="background-color:#3104B4"></td><td style="background-color:#5F04B4"></td><td style="background-color:#8904B1"></td><td style="background-color:#B404AE"></td><td style="background-color:#B40486"></td><td style="background-color:#B4045F"></td><td style="background-color:#B40431"></td><td style="background-color:#585858"></td></tr>
                                    <tr><td style="background-color:#8A0808"></td><td style="background-color:#8A2908"></td><td style="background-color:#8A4B08"></td><td style="background-color:#886A08"></td><td style="background-color:#868A08"></td><td style="background-color:#688A08"></td><td style="background-color:#4B8A08"></td><td style="background-color:#298A08"></td><td style="background-color:#088A08"></td><td style="background-color:#088A29"></td><td style="background-color:#088A4B"></td><td style="background-color:#088A68"></td><td style="background-color:#088A85"></td><td style="background-color:#086A87"></td><td style="background-color:#084B8A"></td><td style="background-color:#08298A"></td><td style="background-color:#08088A"></td><td style="background-color:#29088A"></td><td style="background-color:#4B088A"></td><td style="background-color:#6A0888"></td><td style="background-color:#8A0886"></td><td style="background-color:#8A0868"></td><td style="background-color:#8A084B"></td><td style="background-color:#8A0829"></td><td style="background-color:#424242"></td></tr>
                                    <tr><td style="background-color:#610B0B"></td><td style="background-color:#61210B"></td><td style="background-color:#61380B"></td><td style="background-color:#5F4C0B"></td><td style="background-color:#5E610B"></td><td style="background-color:#4B610B"></td><td style="background-color:#38610B"></td><td style="background-color:#21610B"></td><td style="background-color:#0B610B"></td><td style="background-color:#0B6121"></td><td style="background-color:#0B6138"></td><td style="background-color:#0B614B"></td><td style="background-color:#0B615E"></td><td style="background-color:#0B4C5F"></td><td style="background-color:#0B3861"></td><td style="background-color:#0B2161"></td><td style="background-color:#0B0B61"></td><td style="background-color:#210B61"></td><td style="background-color:#380B61"></td><td style="background-color:#4C0B5F"></td><td style="background-color:#610B5E"></td><td style="background-color:#610B4B"></td><td style="background-color:#610B38"></td><td style="background-color:#610B21"></td><td style="background-color:#2E2E2E"></td></tr>
                                    <tr><td style="background-color:#3B0B0B"></td><td style="background-color:#3B170B"></td><td style="background-color:#3B240B"></td><td style="background-color:#3A2F0B"></td><td style="background-color:#393B0B"></td><td style="background-color:#2E3B0B"></td><td style="background-color:#243B0B"></td><td style="background-color:#173B0B"></td><td style="background-color:#0B3B0B"></td><td style="background-color:#0B3B17"></td><td style="background-color:#0B3B24"></td><td style="background-color:#0B3B2E"></td><td style="background-color:#0B3B39"></td><td style="background-color:#0B2F3A"></td><td style="background-color:#0B243B"></td><td style="background-color:#0B173B"></td><td style="background-color:#0B0B3B"></td><td style="background-color:#170B3B"></td><td style="background-color:#240B3B"></td><td style="background-color:#2F0B3A"></td><td style="background-color:#3B0B39"></td><td style="background-color:#3B0B2E"></td><td style="background-color:#3B0B24"></td><td style="background-color:#3B0B17"></td><td style="background-color:#1C1C1C"></td></tr>
                                    <tr><td style="background-color:#2A0A0A"></td><td style="background-color:#2A120A"></td><td style="background-color:#2A1B0A"></td><td style="background-color:#29220A"></td><td style="background-color:#292A0A"></td><td style="background-color:#222A0A"></td><td style="background-color:#1B2A0A"></td><td style="background-color:#122A0A"></td><td style="background-color:#0A2A0A"></td><td style="background-color:#0A2A12"></td><td style="background-color:#0A2A1B"></td><td style="background-color:#0A2A22"></td><td style="background-color:#0A2A29"></td><td style="background-color:#0A2229"></td><td style="background-color:#0A1B2A"></td><td style="background-color:#0A122A"></td><td style="background-color:#0A0A2A"></td><td style="background-color:#120A2A"></td><td style="background-color:#1B0A2A"></td><td style="background-color:#220A29"></td><td style="background-color:#2A0A29"></td><td style="background-color:#2A0A22"></td><td style="background-color:#2A0A1B"></td><td style="background-color:#2A0A12"></td><td style="background-color:#151515"></td></tr>
                                    <tr><td style="background-color:#190707"></td><td style="background-color:#190B07"></td><td style="background-color:#191007"></td><td style="background-color:#181407"></td><td style="background-color:#181907"></td><td style="background-color:#141907"></td><td style="background-color:#101907"></td><td style="background-color:#0B1907"></td><td style="background-color:#071907"></td><td style="background-color:#07190B"></td><td style="background-color:#071910"></td><td style="background-color:#071914"></td><td style="background-color:#071918"></td><td style="background-color:#071418"></td><td style="background-color:#071019"></td><td style="background-color:#070B19"></td><td style="background-color:#070719"></td><td style="background-color:#0B0719"></td><td style="background-color:#100719"></td><td style="background-color:#140718"></td><td style="background-color:#190718"></td><td style="background-color:#190714"></td><td style="background-color:#190710"></td><td style="background-color:#19070B"></td><td style="background-color:#000000"></td></tr>
                                </tbody></table>                            

                        </div>

                        <div class="set_panel set_header_bar">

                            <ul class="switcher">
                                <li id="menu_bar_show"><a href="javascript:" title="On">Show</a></li>
                                <li id="menu_bar_hide"><a href="javascript:" title="OFF">Hide</a></li>
                            </ul>	
                            <br clear="all"/><br/>


                            <ul class="get_thumb_list" elemento="optional-menu">ready</ul>
                            <div id="addimageuploader1" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_logo">
                            <ul class="get_thumb_list" elemento="logo">ready</ul>
                            <div id="addimageuploader03" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>                                
                        </div>

                        <div class="set_panel set_header_height">
                            <br/>
                            <h1>[header-height]</h1>
                            <div id="header-slider-range"></div><br/><br/>
                            <h1>[footer-height]</h1>
                            <div id="footer-slider-range"></div>                            
                        </div>

                        <div class="set_panel set_jquery_ui">
                            <ul class="get_thumb_list" elemento="jquery_ui">ready</ul>
                            <div id="ui_jquery_zip_css" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>                                
                        </div>


                        <div class="set_panel set_header_shines">
                            <ul class="get_thumb_list" elemento="shines">ready</ul>
                            <div id="addimageuploader3" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>                                
                        </div>
                        <div class="set_panel set_header_search">
                            <ul class="get_thumb_list" elemento="search">ready</ul>
                            <div id="addimageuploader4" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>
                        <div class="set_panel set_header_socials">
                            <ul class="get_thumb_list" elemento="social-network">ready</ul>
                            <div id="addimageuploader5" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>
                        <div class="set_panel set_header_menu">
                            <ul class="get_thumb_list" elemento="menu">ready</ul>
                            <div id="addimageuploader6" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>                     

                        <div class="set_panel set_general_divisors">
                            <ul class="get_thumb_list" elemento="divisors">ready</ul>
                            <div id="addimageuploader7" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_shadows">
                            <ul class="get_thumb_list" elemento="shadows">ready</ul>
                            <div id="addimageuploader8" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_gral_patterns">
                            <ul class="get_thumb_list" elemento="pattern">ready</ul>
                            <div id="addimageuploader9" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>                        

                        <div class="set_panel set_header_bkgimage">
                            <ul class="get_thumb_list" elemento="clipart">ready</ul>
                            <div id="addimageuploader10" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_blog_boxes">
                            <ul class="get_thumb_list" elemento="boxes">ready</ul>
                            <div id="addimageuploader11" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_read_more">
                            <ul class="get_thumb_list" elemento="read-more">ready</ul>
                            <div id="addimageuploader12" class="addimageuploader" style="float: left;height: 50px;width: 50px;background: url([constant:"TEMPLATE_LINK"end constant]panel/images/image_add_a50.png)"></div>
                        </div>

                        <div class="set_panel set_font_style" style="  overflow: hidden;">
                            <input type="hidden" id="changefontstyle"/>
                            <img style="display:none" src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyleftx.png">
                            <img style="display:none" src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifycenterx.png">
                            <img style="display:none" src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyrightx.png">
                            <img style="display:none" src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyfullx.png">

                            <div id="simple_editor">
                                <div id="toolbar_css_editor">
                                    <ul>
                                        <li class="css_s_t" title="font-weight" alt="bold" ext="normal"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/bold.png"> </li>
                                        <li class="css_s_t" style="display:none;" title="font-weight" alt="normal" ext="bold"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/boldx.png"> </li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t1" title="text-decoration" alt="underline" ext="none"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/underline.png"></li>
                                        <li class="css_s_t1" style="display:none;" title="text-decoration" ext="underline" alt="none"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/underlinex.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t2" style="display:none;" title="font-style" ext="italic" alt="normal"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/italicx.png"></li>
                                        <li class="css_s_t2"  title="font-style" alt="italic" ext="normal"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/italic.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t3" id="text-alignx1" title="text-align" alt="left" x1="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyleft.png" x2="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyleftx.png" ><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyleft.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t3" id="text-alignx2"  title="text-align" alt="center" x1="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifycenter.png" x2="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifycenterx.png" ><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifycenter.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t3" id="text-alignx3"  title="text-align" alt="right" x1="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyright.png" x2="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyrightx.png" ><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyright.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li class="css_s_t3" id="text-alignx4"  title="text-align" alt="justify" x1="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyfull.png" x2="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyfullx.png" ><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/justifyfull.png"></li>
                                        <li class="css_s_sep"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/css_editor/sep.png"></li>
                                        <li>
                                            <input class="colorpickers" id="colorpickers" title="color" ext="#333399" type="text" name="colorpickers" value="#333399" />
                                        </li>
                                    </ul>

                                    <select id="css_s_fontfamily" ext="" title="font-family">
                                        [var:"SetMoreFont"end var]
                                        <option value="Arial, Helvetica, sans-serif">Arial</option>
                                        <option value="Verdana, Geneva, sans-serif">Verdana</option>
                                        <option value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                        <option value="'Trebuchet MS', Arial, Helvetica, sans-serif">Trebuchet MS</option>
                                    </select>

                                    <select id="css_s_fontsize" ext="" title="font-size">
                                        <option value="9px">xx-small</option>
                                        <option value="10px">x-small</option>
                                        <option value="13px">small</option>
                                        <option value="18px">large</option>
                                        <option value="24px">x-large</option>
                                        <option value="32px">xx-large</option>
                                    </select>

                                    <div id="advancecssfont" style="clear: both; float: [right_left];margin-[right_left]: 5px;" class="corner-all buttonTheme"><span class="icon"></span>[Edit advance]</div>


                                </div>

                            </div>                     
                        </div>
                    </div>
                </div>






                <!--    -----------------------------------live style editor---------------------------------------------------- -->



                <div class="[right_left]" style="width: 310px;" >
                    <h1>[Advance Editor CSS Theme] </h1>
                    <div id="okcsseditor" >

                        <div class="heapBox" id="show_css_efitor">
                            <a class="holder" href="javascript:"><span>[Select section to modify]</span></a>
                            <a class="handler" href="javascript:"></a>

                            <div class="heap" style="display: none;">
                                <ul class="heapOptions">                            
                                    <li class="heapOption"><a href="javascript:" value="body;#body_theme;.body_pattern;.global_wrapper;.wrapper_pattern;.fullheader_menu_bar" ms="livestyle_background">[Background]</a></li>  
                                    <li class="heapOption"><a href="javascript:" value=".wrapper_header;.clipart;.header_shine;.header_pattern;.header_shadow;#header" ms="livestyle_Header">[Header]</a></li>  
                                    <li class="heapOption"><a href="javascript:" value=".wrapper_content;.content_separate;.content_pattern;.content_shadow;#content;#top1;#top2;#left1;#left2;#right1;#right2;#down1;#down2" ms="livestyle_Content">[Content]</a></li>  
                                    <li class="heapOption"><a href="javascript:" value=".wrapper_footer;.footer_separate;.footer_pattern;.footer_shadow;#footer" ms="livestyle_Footer">[Footer]</a></li>  
                                </ul>
                            </div>
                        </div>








                    </div>

                </div>
            </div>
        </div>


    </div>

    <!-- The tab on top -->
    <div class="tab">
        <ul class="login">
            <li class="right">&nbsp;</li>

            <li class="tabbd tooltip-down" id="DX_6" tooltip="[my account setting]">[my account]</a></li>
            <li class="sep">|</li>
            <li class="tabbd tooltip-down" id="DX_3" tooltip="[this page option]">[Page]</li>

            <li class="sep">|</li>
            <li class="tabbd tooltip-down" id="DX_2" tooltip="[chnage your site theme]">[Themes]</li>
            <li class="sep">|</li>
            <li class="tabbd tooltip-down" id="DX_5" tooltip="[Style or css live editor]">[Style]</li>

            <li class="sep">|</li>
            <li class="tabbd tooltip-down" id="DX_1" tooltip="[control setting your site]">[settings]</li>
            <li class="sep">|</li>
            <li class="tabbd tooltip-down" id="DX_4" tooltip="[add or delete or edit widget in header or footer] , [add or delete or edit box in right or left colmuns]">[Widget]</li>
            <li class="sep">|</li>
            <li>
                <span class="mobile-view mobile tooltip-down" tooltip="[view as mobile mode]"></span>
                <span class="mobile-view tablet tooltip-down" tooltip="[view as tablet mode]"></span>
                <span class="mobile-view desktop tooltip-down" tooltip="[view as desktop mode]"></span>
            </li>
            <li class="sep">|</li>
            <li id="result_theme_panel" style="cursor: e-resize;" class="tooltip-down" tooltip="[Result show here for any change]">...</li>
            <li class="sep">|</li>
            <li id="close" style="display: none;" class="tooltip-down" tooltip="[Close this front panel]"><span class="close"></span></li>
            <li class="left">&nbsp;</li>
        </ul>
    </div>
    <!-- / top -->
    <iframe name="x_form" style="border: 0; display: none;"></iframe>
    <div id="DIVgroupCSS">
    [var:"groupCSS"end var]
    </div>
    <textarea id="textareagroupCSS" style="display: none"></textarea>
</div> <!--panel -->

<div class="too_image_preloader"><img src="[constant:"TEMPLATE_LINK"end constant]panel/images/thumbs_preloader.gif" /></div>    
<div id="dialog-confirm" title="[Are you sure?]" style="display: none">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>[These items will be permanently deleted and cannot be recovered]</p>
</div>
<div style="display:none;">
    <div id="colorx1mp3" class="ui-widget-header"></div>
    <div id="colorx2mp3" class="ui-state-default"></div>

    <div id="testdragin" dis="0"></div>
    [dialog:"error_cantdothisaction","[Error]","[sorry u cant do this action]","modal","Ok:close()"end dialog]

    <div id="PanleNice_NiceTable">

        Rows :
        <select id="ROWSNice_NiceTable"  >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>30</option>
            <option>50</option>
            <option>100</option>
        </select>

        <br />
        Colum :
        <select id="COLUMNice_NiceTable"  >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>30</option>
            <option>50</option>
            <option>100</option>
        </select>
        <br />
        <button id="Nice_TableAction">Insert</button>   


    </div>




</div>

<div id="msgplgn" class="note">    </div>

[include:"template/editor_styles/editor.inc"end include]


"end IF]