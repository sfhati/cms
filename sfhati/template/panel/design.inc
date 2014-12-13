[IF:"[session_var:"IDUSER_ADMIN"end session_var]","<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Themeroller Developer Tool</title>
        <script type='text/javascript' src='[var:"js_compressionx"end var]'></script>
        <link media="screen" href="[constant:"TEMPLATE_LINK"end constant]panel/css/app_screen.d" type="text/css" rel="stylesheet"/>
        <link media="screen" href="[constant:"TEMPLATE_LINK"end constant]library/css/jquery.mCustomScrollbar.css" type="text/css" rel="stylesheet"/>
        <style type="text/css">
            html, body{ padding: 0; margin: 0; background: none; }
            #themeRoller { padding: 0 !important; margin: 0 6px; border:0;background: none; }
            #rollYourOwn, #themeGallery {padding-bottom: 0;}
            #themeConfig {
                height: 305px;
                width: 230px;
            }
            .mCustomScrollBox>.mCSB_scrollTools{right:8px;}
            .ui-tabs .ui-tabs-panel {padding:0;}
        </style>
<style id="panelthemecss">
       @import url("[constant:"TEMPLATE_LINK"end constant][setting:"filechangepaneltheme"end setting]");
</style>    
    </head>
    <body id="designbodywidget">

        <div style="display:none">
            <textarea id="old_style_code"  ></textarea>
            <form method="post" id="form_elemant_css" target="iframe_css">
                <input name="CSS_theme_save" id="code_elemant_css"/>
                <input name="CSS_theme_val" id="title_elemant_css"/>
                <input type="submit"/>
            </form>
            <iframe id="iframe_css" name="iframe_css"></iframe>
        </div>
        <div class="clearfix" id="themeRoller">

            <div id="rollerTabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                <ul class="clearfix corner-top ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" id="rollerTabsNav">
                    <li rel="template_tab" class="state-default corner-top ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a class="themeGallery cc_tab_sfhati" href="javascript:">[Designer]</a></li>
                    <li rel="gellary_tab" class="state-default corner-top ui-state-default ui-corner-top"><a class="themeGallery cc_tab_sfhati" href="javascript:" onclick="make_cssxxxx()">[Developer]</a></li>
                </ul>





                <div id="gellary_tab"  class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none">
                    <script>
                        function make_cssxxxx(){ 
                            var oldcss=window.top.$("#"+$('#all-styles').attr("title")).text();
                            $('#old_style_codexxx').val(oldcss);
                            return false;
    
                        }
                        $(function(){
                            $('#old_style_codexxx').bind('input propertychange', function() {
                                window.top.$("#"+$('#all-styles').attr("title")).text($(this).val());
                            });
    $('#styletypepos').click(function(){
        $('#label_div').text($('#all-styles').val()+$(this).val());
    });
                        });
                        
                    </script>    
                    <div id="save_cssadv" class="corner-all buttonTheme" style="width: 174px;"><span class="icon icon_apply"></span>[Save Changes Style]</div>                    
                    <br/><textarea id="old_style_codexxx" style="width: 211px; height: 312px;"  ></textarea>

                </div>



                <div id="template_tab" class="ui-tabs-panel ui-widget-content ui-corner-bottom">

 
                    <select id="styletypepos" style="width: 210px;float: none">
                        <option value="">Normal</option>
                        <option value=":hover">Hover</option>
                        <option value=":focus">Focus</option>
                        <option value=":link">Link</option>
                        <option value=":visited">Visited</option>
                        <option value=":active">Active</option>
                        <option value=":first-letter">First Letter</option>
                        <option value=":first-line">First Line</option>
                        <option value=":first-child">First Child</option>
                        
                    </select>
                    <span style="display:none" id="label_div">theme</span>
                    <select id="all-styles" title="none" style="width: 210px;float: none">

                    </select> <br/>                    
                    <div id="oktheme" style="clear:both;">
                        <div id="restore_css" class=" corner-all buttonTheme"><span class="icon icon_restore"></span>[Restore Orginal Style]</div>
                        <div id="save_css" class="corner-all buttonTheme"><span class="icon icon_apply"></span>[Save Changes Style]</div>

                    </div>



                    <form id="themeConfig" class="contentbarscroll" action="/" method="get">                                                                                   
                        <div id="global-font" class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">Font Settings</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="field-group clearfix">
                                    <label for="font-family">Family</label>
                                    <select class="sfhati_css" id="font-family">
                                        [var:"SetMoreFont"end var]
                                        <option>serif</option>
                                        <option>sans-serif</option>
                                        <option>cursive</option>
                                        <option>fantasy</option>
                                        <option>monospace</option>
                                    </select>
                                </div>
                                <div class="field-group clearfix">
                                    <label for="font-weight">Weight</label>
                                    <select class="sfhati_css" id="font-weight">
                                        <option>normal</option>
                                        <option>bold</option>
                                        <option>600</option>
                                        <option>900</option>
                                    </select>
                                </div>
                                <div class="field-group clearfix">
                                    <label for="font-size">Size</label>
                                    <select class="sfhati_css" id="font-size">
                                        <option value="12px">9pt</option>
                                        <option value="14px">12pt</option>
                                        <option value="16px">14pt</option>
                                        <option value="18px">16pt</option>
                                        <option value="20px">xx-small</option>
                                        <option value="22px">x-small</option>
                                        <option value="24px">small</option>
                                        <option value="26px">large</option>
                                        <option value="30px">x-large</option>
                                        <option value="32px">xx-large</option>
                                    </select>
                                </div>
                                <div class="field-group clearfix">
                                    <label for="font-style">Style</label>
                                    <select class="sfhati_css" id="font-style">
                                        <option>normal</option>
                                        <option>italic</option>
                                        <option>oblique</option>
                                    </select>
                                </div>
                                <div class="field-group clearfix">
                                    <label for="font-variant">Weight</label>
                                    <select class="sfhati_css" id="font-variant">
                                        <option>normal</option>
                                        <option>small-caps</option>
                                    </select>
                                </div>

                                <div class="field-group clearfix">
                                    <label for="color">Color</label>
                                    <input size="8" class="hex sfhati_css" id="color" type="text">
                                </div>


                            </div><!-- /theme group content -->
                        </div><!-- /theme group -->
                        <div id="global-font" class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">Text Settings</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="clearfix">
                                    <label for="font-family">Align</label>
                                    <select class="sfhati_css" id="font-family">
                                        <option>left</option>
                                        <option>right</option>
                                        <option>center</option>
                                        <option>justify</option>
                                    </select>
                                </div>
                                <div class="clearfix">
                                    <label for="vertical-align">Aertical align</label>
                                    <select class="sfhati_css" id="vertical-align">
                                        <option>baseline</option>
                                        <option>top</option>
                                        <option>middle</option>
                                        <option>bottom</option>
                                        <option>text-top</option>
                                        <option>text-bottom</option>
                                        <option>super</option>
                                        <option>sub</option>
                                        <option>3em</option>
                                        <option>30%</option>
                                    </select>
                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="text-decoration">Decoration</label>
                                    <select class="sfhati_css" id="text-decoration">
                                        <option>underline</option>
                                        <option>bold</option>
                                        <option>overline</option>
                                        <option>underline overline</option>
                                        <option>line-through</option>
                                        <option>blink</option>
                                    </select>
                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="text-indent">Indent</label>
                                    <input size="8" class="sfhati_css sfhati_counter" id="text-indent" type="text">
                                </div>
                                <div class="MargenTop10px clearfix">
                                    <label for="letter-spacing">Letter spacing</label>
                                    <input size="8" class="sfhati_css sfhati_counter" id="letter-spacing" type="text">
                                </div>
                                <div class="MargenTop10px clearfix">
                                    <label for="word-spacing">Word spacing</label>
                                    <input size="8" class="sfhati_css sfhati_counter" id="word-spacing" type="text">
                                </div>


                                <div class="MargenTop10px clearfix">
                                    <label for="text-transform">Transform</label>
                                    <select class="sfhati_css" id="text-transform">
                                        <option>none</option>
                                        <option>capitalize</option>
                                        <option>lowercase</option>
                                        <option>uppercase</option>
                                    </select>
                                </div>
                                <div class="MargenTop10px clearfix">
                                    <label for="font-style">Style</label>
                                    <select class="sfhati_css" id="font-style">
                                        <option>normal</option>
                                        <option>italic</option>
                                        <option>oblique</option>
                                    </select>
                                </div>
                                <div class="MargenTop10px clearfix">
                                    <label for="font-variant">Weight</label>
                                    <select class="sfhati_css" id="font-variant">
                                        <option>normal</option>
                                        <option>small-caps</option>
                                    </select>
                                </div>
                            </div><!-- /theme group content -->
                        </div><!-- /theme group -->



                        <div class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">Background</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="field-group field-group-background clearfix">
                                    <label for="background-color">Background color &amp; texture</label>
                                    <input size="8" class="hex sfhati_css" id="background-color" type="text"/>
                                    <input id="background-image" type="hidden"/>

                                    <div class="texturePicker focus" style="background-image: none; position: static;">
                                        <a href="#"></a>
                                        <ul style="display: none;">
                                            <li nocolor="nobackgroundandcolor" class='texturePickerli' style="background: url([constant:"TEMPLATE_LINK"end constant]panel/images/bg.jpg) repeat scroll 50% 50% rgb(85, 85, 85);" alt="none"><a title="No background and color" href="javascript:">No background and color</a></li>                                                                   
                                            [var:"Texture_sfhati"end var]
                                        </ul>
                                    </div>

                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="background-repeat">Repeat</label>
                                    <select class="sfhati_css" id="background-repeat">
                                        <option>repeat</option>
                                        <option>no-repeat</option>
                                        <option>repeat-y</option>
                                        <option>repeat-x</option>
                                    </select>
                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="background-attachment">Attachment</label>
                                    <select class="sfhati_css" id="background-attachment">
                                        <option>scroll</option>
                                        <option>fixed</option>
                                    </select>
                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="background-position">Position</label>
                                    <select class="sfhati_css" id="background-position">
                                        <option>top</option>
                                        <option>left</option>
                                        <option>right</option>
                                        <option>bottom</option>
                                        <option>center</option>
                                    </select>
                                </div>
                            </div><!-- /theme group content -->
                        </div><!-- /theme group-->

                        <div class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">Size &amp; Place</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="field-group field-group-background clearfix">
                                    <label for="width"> Width </label>
                                    <input value="100" class="sfhati_counter sfhati_css" id="width" type="text"/>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label for="height"> Height </label>
                                    <input value="100" class="sfhati_counter sfhati_css" id="height" type="text"/>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label for="position">position</label>
                                    <select class="sfhati_css" id="position">
                                        <option>static</option>
                                        <option>relative</option>
                                        <option>absolute</option>
                                        <option>fixed</option>
                                    </select>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label>Place</label>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="top">top </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="top" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="left">left </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="left" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">right </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="right" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="bottom">bottom </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="bottom" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="z-index">z-index</label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="z-index" type="text"/>
                                    </div>

                                </div>

                                <div class="field-group field-group-background clearfix">
                                    <label>Margin</label>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">top </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="margin-top" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">right </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="margin-left" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">left </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="margin-right" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">bottom </label>
                                        <input value="1" class="sfhati_counter sfhati_css" id="margin-bottom" type="text"/>
                                    </div>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label>Padding</label>
                                    <div class="field-group field-group-background clearfix">

                                        <label for="right">top </label>

                                        <input value="1" class="sfhati_counter sfhati_css" id="padding-top" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">left </label>

                                        <input value="1" class="sfhati_counter sfhati_css" id="padding-left" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">right </label>

                                        <input value="1" class="sfhati_counter sfhati_css" id="padding-right" type="text"/>
                                    </div>
                                    <div class="field-group field-group-background clearfix">
                                        <label for="right">bottom </label>

                                        <input value="1" class="sfhati_counter sfhati_css" id="padding-bottom" type="text"/>
                                    </div>
                                </div>


                                <div class="field-group field-group-background clearfix">
                                    <label>Float </label>
                                    <select class="sfhati_css" id="float">
                                        <option>left</option>
                                        <option>right</option>
                                        <option>none</option>
                                    </select>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label>clear </label>

                                    <select class="sfhati_css" id="clear">
                                        <option>left</option>
                                        <option>right</option>
                                        <option>both</option>
                                        <option>none</option>
                                    </select>
                                </div>
                            </div><!-- /theme group content -->
                        </div><!-- /theme group -->

                        <div class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">Border</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="field-group field-group-background clearfix">
                                    <label for="border-top-color">Border top color &amp; style</label>
                                    <input size="8" value="#" class="hex sfhati_css" id="border-top-color" type="text"/>
                                    <select class="sfhati_css" id="border-top-style">
                                        <option>none</option>
                                        <option>solid</option>
                                        <option>double</option>
                                        <option>groove</option>
                                        <option>ridge</option>
                                        <option>inset</option>
                                        <option>outset</option>
                                        <option>dashed</option>
                                        <option>dotted</option>
                                    </select>
                                    <input value="1" class="sfhati_counter sfhati_css" id="border-top-width" type="text"/>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label for="border-right-color">Border right color &amp; style</label>
                                    <input size="8" value="#" class="hex sfhati_css" id="border-right-color" type="text"/>
                                    <select class="sfhati_css" id="border-right-style">
                                        <option>none</option>
                                        <option>solid</option>
                                        <option>double</option>
                                        <option>groove</option>
                                        <option>ridge</option>
                                        <option>inset</option>
                                        <option>outset</option>
                                        <option>dashed</option>
                                        <option>dotted</option>
                                    </select>
                                    <input value="1" class="sfhati_counter sfhati_css" id="border-right-width" type="text"/>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label for="border-left-color">Border left color &amp; style</label>
                                    <input size="8" value="#" class="hex sfhati_css" id="border-left-color" type="text"/>
                                    <select class="sfhati_css" id="border-left-style">
                                        <option>none</option>
                                        <option>solid</option>
                                        <option>double</option>
                                        <option>groove</option>
                                        <option>ridge</option>
                                        <option>inset</option>
                                        <option>outset</option>
                                        <option>dashed</option>
                                        <option>dotted</option>
                                    </select>
                                    <input value="1" class="sfhati_counter sfhati_css" id="border-left-width" type="text"/>
                                </div>
                                <div class="field-group field-group-background clearfix">
                                    <label for="border-bottom-color">Border bottom color &amp; style</label>
                                    <input size="8" value="#" class="hex sfhati_css" id="border-bottom-color" type="text"/>
                                    <select class="sfhati_css" id="border-bottom-style">
                                        <option>none</option>
                                        <option>solid</option>
                                        <option>double</option>
                                        <option>groove</option>
                                        <option>ridge</option>
                                        <option>inset</option>
                                        <option>outset</option>
                                        <option>dashed</option>
                                        <option>dotted</option>
                                    </select>
                                    <input value="1" class="sfhati_counter sfhati_css" id="border-bottom-width" type="text"/>
                                </div>
                            </div><!-- /theme group content -->
                        </div><!-- /theme group -->

                        <div id="global-font" class="theme-group clearfix">
                            <div class="theme-group-header state-default corner-all">
                                <span class="icon icon-triangle-1-e">Collapse</span>
                                <a href="#">More Settings</a>
                            </div><!-- /theme group header -->
                            <div class="theme-group-content corner-bottom clearfix" style="display: block;">
                                <div class="clearfix">
                                    <label for="font-family">Cursor</label>
                                    <select class="sfhati_css" id="cursor">
                                        <option>crosshair</option>
                                        <option>default</option>
                                        <option>pointer</option>
                                        <option>move</option>
                                        <option>text</option>
                                        <option>wait</option>
                                        <option>help</option>
                                        <option>n-resize</option>
                                        <option>s-resize</option>
                                        <option>w-resize</option>
                                        <option>e-resize</option>
                                        <option>ne-resize</option>
                                        <option>nw-resize</option>
                                        <option>se-resize</option>
                                        <option>sw-resize</option>
                                    </select>
                                </div>
                                <div class="clearfix">
                                    <label for="font-family">Display</label>
                                    <select class="sfhati_css" id="display">
                                        <option>none</option>
                                        <option>block</option>
                                        <option>inline</option>
                                        <option>run-in</option>
                                        <option>compact</option>
                                        <option>list-item</option>
                                        <option>marker</option>
                                    </select>
                                </div>

                                <div class="MargenTop10px clearfix">
                                    <label for="font-weight">Visibility</label>
                                    <select class="sfhati_css" id="visibility">
                                        <option>visible</option>
                                        <option>hidden</option>
                                    </select>
                                </div>
                                <div class="MargenTop10px clearfix">
                                    <label for="font-size">Overflow</label>
                                    <select class="sfhati_css" id="overflow">
                                        <option>visible</option>
                                        <option>hidden</option>
                                        <option>scroll</option>
                                        <option>auto</option>
                                    </select>
                                </div>
                            </div><!-- /theme group content -->
                        </div><!-- /theme group -->

                    </form>

                </div>

                <div id="gellary_tab" style="display:none" class="ui-tabs-panel ui-widget-content ui-corner-bottom">

                </div><!-- /help -->
            </div>
        </div>
        <style>
            .mCSB_scrollTools .mCSB_buttonUp, .mCSB_scrollTools .mCSB_buttonDown, .mCSB_scrollTools .mCSB_buttonLeft, .mCSB_scrollTools .mCSB_buttonRight{
                background-image: url("[constant:"TEMPLATE_LINK"end constant]library/images/mCSB_buttons.png");
            }
            .mCSB_container {
                margin-right: 15px;

            }
        </style>
    </body>
</html>
"end IF]