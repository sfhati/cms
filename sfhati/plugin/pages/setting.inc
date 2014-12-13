    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-3">


        <script type="text/javascript">
            $(document).ready(function() {
                $(".table-list").sortable({
                    handle : ".handle",
                    update : function () {
                        var order = $(".table-list").sortable("serialize");
                        $("#info").html("[Loading...]");
                        $("#info").load("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&"+order);
                    }
                });
                $(".editable_textile").editable("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&renderer=page_name", {
                    indicator : "[saving...]",
                    submit    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Save'><span class='ui-icon ui-icon-circle-check'></span></li></ul>",
                    cancel    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Cancel'><span class='ui-icon ui-icon-circle-close'></span></li></ul>",
                    style  : "inherit",
                    id   : 'pageelementid',
                    tooltip   : "[Click to edit...]"
                });


                $(".editable_place").editable("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&renderer=page_place", {
                    indicator : "[saving...]",
                    data   : "{[var:"template_page_scriptx"end var]}",
                    type   : "checked",
                    id   : 'pageelementid',
                    submit    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Save'><span class='ui-icon ui-icon-circle-check'></span></li></ul>",
                    cancel    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Cancel'><span class='ui-icon ui-icon-circle-close'></span></li></ul>",
                    style  : "inherit",
                    tooltip   : "[Click to edit...]"
                });
                $(".editable_template").editable("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&renderer=template", {
                    indicator : "[saving...]",
                    data   : "{[var:"template_page_scriptxx"end var]}",
                    type   : "select",
                    submit    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Save'><span class='ui-icon ui-icon-circle-check'></span></li></ul>",
                    cancel    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Cancel'><span class='ui-icon ui-icon-circle-close'></span></li></ul>",
                    style  : "inherit",
                    id   : 'pageelementid',
                    tooltip   : "[Click to edit...]"
                });
                $(".editable_power").editable("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&renderer=powers", {
                    indicator : "[saving...]",
                    data   : "{[var:"template_page_scriptxxx"end var]}",
                    type   : "select",
                    id   : 'pageelementid',
                    submit    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Save'><span class='ui-icon ui-icon-circle-check'></span></li></ul>",
                    cancel    : "<ul id='icons' class='ui-widget ui-helper-clearfix' style='float: left'><li class='ui-state-default ui-corner-all' title='Cancel'><span class='ui-icon ui-icon-circle-close'></span></li></ul>",
                    style  : "inherit",
                    tooltip   : "[Click to edit...]"
                });



            });
            function changeclass(id){
                var className = $('#page_act'+id).attr('class');
                if(className=='ui-icon ui-icon-locked'){
                    $('#page_act'+id).attr('class','ui-icon ui-icon-unlocked');
                }else{
                    $('#page_act'+id).attr('class','ui-icon ui-icon-locked');
                }
            }
        </script>

        <div class = "box" dir="[rtl_ltr]" style="">
            <form method="POST"  action="?chng_tpl=system_setting&plgn=pages&p=page&show_sub=[var:"show_sub"end var]">
                 [Rows Nu].
                <select name="by_count_nu">
                    <option [IF:"[session_var:"count_nu"end session_var]=5"," selected="selected""end IF]>5</option>
                    <option [IF:"[session_var:"count_nu"end session_var]=10","selected="selected""end IF]>10</option>
                    <option [IF:"[session_var:"count_nu"end session_var]=30","selected="selected""end IF]>30</option>
                    <option [IF:"[session_var:"count_nu"end session_var]=50","selected="selected""end IF]>50</option>
                    <option [IF:"[session_var:"count_nu"end session_var]=100","selected="selected""end IF]>100</option>
                </select>
                <button aria-disabled="false" type="submit" style="float: none" name="show_by"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[GO]</span></button>
            </form></div>

        <div class = 'bxox' dir='[rtl_ltr]'>
<div id='info'>...</div>
            <div id='all_pages'>
                [path_page:"[var:"show_sub"end var]"end path_page]
                <br>
                <form method='POST'>
                    <table class='table-list' width='100%' ><thead>
                            <tr class='ui-widget-header' style='height:35px;'>
                                <td width="10px">[Nu].</td>
                                <td width="10px"> ... </td>
                                <td>[Page title]</td>
                                <td width="10px">[Sort]</td>
                                <td>[Place]</td>
                                <td>[Template]</td>
                                <td>[Powers]</td>
                                <td width="120px">[Options]</td>
                            </tr></thead>
                        [SQL:"pages_sql","Select * From pages where slave='[var:"show_sub"end var]' [session_var:"SQL_pages"end session_var] ORDER BY page_sort ASC","[session_var:"count_nu"end session_var]","
                        <tbody id='listItem_%pages_sql:id%'>
                            <tr class="t_bg_color%pages_sql:%" id='R%pages_sql:id%' >
                                <td>%pages_sql:id%</td>
                                <td>
                                    [IF:"[sub_menu:"%pages_sql:id%"end sub_menu]","<ul id="icons" class="ui-widget ui-helper-clearfix"><li class="ui-state-default ui-corner-all" title=""><a title='[Show sub]' href='?chng_tpl=system_setting&plgn=pages&p=page&show_sub=%pages_sql:id%'><span class="ui-icon ui-icon-folder-open"></span></a></li></ul>"end IF]
                               

                                </td>
                                <td><b class='editable_textile pointer' id='%pages_sql:id%'>%pages_sql:page_name%</b></td>
                                <td><ul id="icons" class="ui-widget ui-helper-clearfix"><li class="ui-state-default ui-corner-all handle" title=""><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></li></ul></td>
                                <td><b class='editable_place pointer' id='%pages_sql:id%'>[button_place:"%pages_sql:page_place%"end button_place]
                                    </b></td>
                                <td><b class='editable_template pointer' id='%pages_sql:id%'>[array:"sel_t","%pages_sql:template%"end array]
                                    </b></td>
                                <td><b class='editable_power pointer' id='%pages_sql:id%'>[array:"sel_p","%pages_sql:powers%"end array]
                                    </b>
                                </td>
                                <td>
                                    <ul id="icons" class="ui-widget ui-helper-clearfix">
                                        <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[Delete]' onclick="if(confirm('Do you really want to delete this record?')) $('#R%pages_sql:id%').load('?chng_tpl=system_setting&plgn=pages&p=page&aj=1&delete_page=%pages_sql:id%');"><span class="ui-icon ui-icon-trash"></span></a></li>
                                        <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[Active/Deactive]' onclick='$("#info").load("?chng_tpl=system_setting&plgn=pages&p=page&aj=1&page_act=%pages_sql:id%");changeclass(%pages_sql:id%)' id="page_act%pages_sql:id%"  class="ui-icon ui-icon-[IF:"%pages_sql:page_active%","unlocked[ELSE]locked"end IF]"></a></li>
                                        <li class="ui-state-default ui-corner-all" title=""><a href='javascript:' title='[Edit]' onclick="window.top.window.open('[constant:"SITE_LINK"end constant]?id=%pages_sql:id%')"><span class="ui-icon ui-icon-pencil"></span></a></li>
                                        <li class="ui-state-default ui-corner-all" title=""><a title='[Add sub]' href='?chng_tpl=system_setting&plgn=pages&p=page&show_sub=%pages_sql:id%&addnewpage=%pages_sql:id%'><span class="ui-icon ui-icon-newwin"></span></a></li>
                                    </ul>

                                </td>
                            </tr></tbody>

                        "end SQL]
                    </table><br></form>
            <div class="pagination"> [all pages] %pages_sql:COUNT% </div>
                <br>
                %pages_sql:COUNTER%
            </div>
        </div>
    </div>

