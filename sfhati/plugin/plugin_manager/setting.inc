<script>
$(document).ready(function() {

});
function changeclass(id){
var className = $('#plugin_act'+id).attr('class');
if(className=='ui-icon ui-icon-locked'){
$('#plugin_act'+id).attr('class','ui-icon ui-icon-unlocked');
}else{
$('#plugin_act'+id).attr('class','ui-icon ui-icon-locked');
}
}

</script>
<style>
.ui-state-default.ui-corner-all.dispelicons{
    background: #aaa;
    cursor: default;    
} 
.dispelicons{
    cursor: default;    
} 
.box a{color:#333;}
</style>
[tabs:"member_tabs"," [Plugin manage] ->


 
  



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
        <button aria-disabled="false" type="submit" style="float: none" name="show_by"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[GO]</span></button>
        <button aria-disabled="false" type="submit" value="11" style="float: none" name="refresh_plugins"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[refresh_plugins]</span></button>
    </form></div>

<div class = 'bxox' dir='[rtl_ltr]'>
    <br clear="all">

    <br clear="all"><div id='info'>...</div>
    <div id='all_pages'>

        <form method='POST'>
            <table class='table-list' width='100%' ><thead>
                    <tr class='ui-widget-header' style='height:35px;'>
                        <td width="10px">[Nu].</td>
                        <td>[Plugin name]</td>
                        <td>[version]</td>
                        <td width="100px">[Options]</td>
                    </tr></thead>
                [SQL:"pages_sql","Select * From table1 where md5='PLUGIN_S' and bool4=0","[session_var:"count_nu"end session_var]","
                <tbody id='listItem_%pages_sql:id%'>
                    <tr class="t_bg_color%pages_sql:%" id='R%pages_sql:id%'  onclick="$('.abitplgn').hide();$('#about%pages_sql:id%').toggle()" >
                        <td>%pages_sql:#%</td>                                
                        <td><b class='pointer' id='%pages_sql:id%'>[%pages_sql:string1%] </b></td>
                        <td>%pages_sql:number3%</td>
                        <td>
                            <ul id="icons" class="ui-widget ui-helper-clearfix">
                                [IF:"%pages_sql:bool2%"," 
                                 <li class="ui-state-default ui-corner-all dispelicons" title=""><a href="javascript:"  title='[Uninstall]'><span class="ui-icon ui-icon-trash dispelicons"></span></a></li>
                                <li class="ui-state-default ui-corner-all dispelicons" title=""><a href="javascript:" title='[Active/Deactive]' class="ui-icon ui-icon-unlocked dispelicons"></a></li>
                               [ELSE]
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:"  title='[Uninstall]' onclick="if(confirm('Do you really want to uninstall this plugin?')) $('#listItem_%pages_sql:id%').load('[constant:"SITE_LINK"end constant]?p=plugin&aj=1&delete_plugin=%pages_sql:string1%');"><span class="ui-icon ui-icon-trash"></span></a></li>
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[Active/Deactive]' onclick='$("#info").load("[constant:"SITE_LINK"end constant]?p=plugin&aj=1&plugin_act=%pages_sql:id%");changeclass(%pages_sql:id%)' id="plugin_act%pages_sql:id%"  class="ui-icon ui-icon-[IF:"%pages_sql:bool1%","unlocked[ELSE]locked"end IF]"></a></li>
                              "end IF]
                             </ul>

                        </td>
                    </tr>
                    <tr style="display: none" class="abitplgn" id='about%pages_sql:id%' >
                        <td colspan="4"><h2>[About] [%pages_sql:string1%]</h2><br/>
                            <img src="[constant:"PLUGIN_LINK"end constant]%pages_sql:string1%/thumb.jpg"/><br/>
                            %pages_sql:string4%</td>
 
                    </tr>
                </tbody> 

                "end SQL]
            </table><br></form>
        <div class="pagination"> <a href="javascript:"> [all plugins] %pages_sql:COUNT% </a></div>
        <br>
        %pages_sql:COUNTER%
    </div>
</div>


"," [Install] ->



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
        <button aria-disabled="false" type="submit" style="float: none" name="show_by"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[GO]</span></button>
    </form></div>

<div class = 'bxox' dir='[rtl_ltr]'>
    <br clear="all">

    <br clear="all"><div id='info1'>...</div>
    <div id='all_pages'>

        <form method='POST'>
            <table class='table-list' width='100%' ><thead>
                    <tr class='ui-widget-header' style='height:35px;'>
                        <td width="10px">[Nu].</td>
                        <td>[Plugin name]</td>
                        <td>[version]</td>
                        <td>[Downloads]</td>
                        <td width="100px">[Options]</td>
                    </tr></thead>
                [SQL:"pages_sql_install","Select * From table3 where md5='plugin_active'","[session_var:"count_nu"end session_var]","
                <tbody id='listItem_%pages_sql_install:id%'>
                    <tr class="t_bg_color%pages_sql_install:%" id='R%pages_sql_install:id%'  onclick="$('.abitplgn').hide();$('#about%pages_sql_install:id%').toggle()">
                        <td>%pages_sql_install:#%</td>                                
                        <td><b class='pointer' id='%pages_sql_install:id%'>[%pages_sql_install:string1%]</b></td>
                        <td>%pages_sql_install:string3%</b></td>
                        <td>%pages_sql_install:number2%</b></td>
                        <td>
                            <ul id="icons" class="ui-widget ui-helper-clearfix">
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:"  title='[install]' onclick="if(confirm('Do you really want to install this plugin?')) $('#listItem_%pages_sql_install:id%').load('?p=plugin&aj=1&install_plugin_X=%pages_sql_install:number1%');"><span class="ui-icon ui-icon-circle-arrow-s"></span></a></li>
                            </ul>

                        </td>
                    </tr>
                    <tr style="display: none" class="abitplgn" id='about%pages_sql_install:id%' >
                        <td colspan="3"><h2>About %pages_sql_install:string1%</h2><br/>
                            <img src="[constant:"Main_Domain"end constant]uploaded/plugin/plugin/%pages_sql_install:string1%/thumb.jpg"/><br/>
                            %pages_sql_install:string4%</td>

                    </tr>
                </tbody>

                "end SQL]
            </table><br></form>
        <div class="pagination"> <a href="javascript:"> [all plugins] %pages_sql_install:COUNT% </a></div>
        <br>
        %pages_sql_install:COUNTER%
    </div>
</div>



"," [jsfiles] ->


<div class = "box" dir="[rtl_ltr]" style="">
    [js file you dont load in user session]
    <form method="post" action="#tab_member_tabs-3"> 
        <label for="compressjs">[None Compress]</label><input type="radio" name="compressjs" id="compressjs" value="0"/><br/>
        <label for="compressjs">[Numeric Compress]</label><input checked="checked" type="radio" name="compressjs" id="compressjs" value="10"/><br/>
        <label for="compressjs">[Normal Compress]</label><input type="radio" name="compressjs" id="compressjs" value="62"/><br/>
        <label for="compressjs">[High ASCII Compress]</label><input type="radio" name="compressjs" id="compressjs" value="95"/><br/>
        <button aria-disabled="false" type="submit" style="float: none" name="createjsfile" value="createjs"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[createjsfile]</span></button>
        <button aria-disabled="false" type="submit" style="float: none" name="usesmartchice" value="u"  role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="button"><span class="ui-button-text">[use smart choice]</span></button>
    
    </form>
    <div id='info2'>[var:"echoresultjs"end var]...</div>
</div>


<div class = "box" dir="[rtl_ltr]" style="">
    <form method="POST"  action="?p=plugin#tabs-3">
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
    <br clear="all">

    <div id='all_pages'>

        <form method='POST'>
                [SQL:"jsfilesmain","select string3 from table1 where md5='jsfiles' GROUP BY string3 ORDER BY `string3` ASC","[session_var:"count_nu"end session_var]","
                <div onclick="$('.abitplgn').hide();$('.jsmainsction').removeClass('ui-state-active');$('#js_%jsfilesmain:string3%').show();$(this).addClass('ui-state-active')" style="padding: 10px;cursor: pointer" class="ui-widget-header jsmainsction">[%jsfilesmain:string3%]</div>
            <table style="display: none" id='js_%jsfilesmain:string3%' class='table-list abitplgn' width='100%' ><thead>
                    <tr class='ui-widget-header' style='height:35px;'>
                        <td width="10px">[Nu].</td>
                        <td>[js name]</td>
                        <td>[pathjs]</td>
                        <td width="100px">[Options]</td>
                    </tr></thead>
                [SQL:"jsfiles","select id,string1,string2,string3,string4,bool1 from table1 where md5='jsfiles' and string3='%jsfilesmain:string3%' ORDER BY `table1`.`string3` ASC","100","
                <tbody id='listItem_%jsfiles:id%'>
                    <tr class="t_bg_color%jsfiles:%">
                        <td>%jsfiles:#%</td>                                
                        <td><b class='pointer' id='%jsfiles:id%'>[%jsfiles:string2%]</b></td>
                        <td>%jsfiles:string1%</b></td>
                        <td>
                            <ul id="icons" class="ui-widget ui-helper-clearfix">
                                <li class="ui-state-default ui-corner-all" title=""><a href="javascript:" title='[Active/Deactive]' onclick='$("#info2").load("[constant:"SITE_LINK"end constant]?jsfilesact=%jsfiles:id%");changeclass("js%jsfiles:id%")' id="plugin_actjs%jsfiles:id%"  class="ui-icon ui-icon-[IF:"%jsfiles:bool1%","unlocked[ELSE]locked"end IF]"></a></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
                "end SQL]
            </table>
           "end SQL]      
                <br></form>
        <div class="pagination"> <a href="javascript:"> [all plugins] %jsfilesmain:COUNT% </a></div>
        <br>
        %jsfilesmain:COUNTER%
    </div>
</div>
 
"," [update] -> 
<div class = "box" dir="[rtl_ltr]" style="">
    <a  href="javascript:" onclick="$('#resultupdates').text('[Loading...]').load('[constant:"SITE_LINK"end constant]?check_update=1')">[check fo updates]</a><br>
    <div id="resultupdates" style="direction: ltr;"></div><br>
    [last update in] [setting:"resultupdates"end setting]<br>
    <a href="javascript:" onclick="$('#readmorelastupdae').toggle('fast')">[read more]</a>
    <div id="readmorelastupdae" style="display: none">
        gfdsgdf
    </div>
    
</div>

"end tabs]
