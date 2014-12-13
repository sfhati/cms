<style>
    .box,.bxox {
        margin-top: 10px;
        color: #292929;
        border: 1px solid #BABABA;
        background-color: #fff;
        padding: 10px;
        margin: 10px;
        -o-border-radius: 10px;
        -moz-border-radius: 12px;
        -webkit-border-radius: 10px;
        -webkit-box-shadow: 0px 3px 7px #adadad;
        border-radius: 10px;
        -moz-box-sizing: border-box;
        -opera-sizing: border-box;
        -webkit-box-sizing: border-box;
        -khtml-box-sizing: border-box;
        box-sizing: border-box;
        overflow: hidden;
    }   

    .ajaxframeplg H1{ font-size:16px;}
    .ajaxframeplg{ font-size:14px;}

    p.fileformp,.ahoverm{display: block; clear:both;padding: 10px;}
    p.fileformp:hover,.ahoverm:hover{  background-color: #EEEEEE;
                                       border: 1px solid #DDDDDD;}


    p.fileformp input,select,label{display: block}
    .iconpos {
        float: right;
        margin: 5px;
    }
    .ui-widget input, .ui-widget select {
        width: 179px;
        margin-bottom: 15px;
    }  
    #sittingpluginsd .ui-accordion .ui-accordion-content{padding: 10px;}
</style>



<div id="sittingpluginsd" dir='[rtl_ltr]'>
    [IF:"[var:"dotempltoption"end var]","
    <script>
        $(function(){
        [IF:"[var:"dynamicwidget"end var]","

                $('#ctemplate').prepend('<option value="addnew">[create new template]</option>').val('addnew');
                $('#ctemplate option:eq(addnew)').prop('selected', true);
                $('#ctemplate').change(function(){
        if ($(this).val() == 'addnew'){
        $('#newtemplate').show('fast');
        } else{
        $('#newtemplate').hide('fast');
        }
        });
                [ELSE]
                $('#newtemplate').hide();
                "end IF]    
        });    </script>   

    [accordion:"accn","collapsible","
    [[var:"dotempltoption"end var]]->

    [select template]
    <div id="result_tpl_tab1"></div>
    <div id='all_widgets'> 
        <select id="ctemplate">                            
            [SQL:"widget_sql","Select * From table3 where md5='widget' and string1='[var:"dotempltoption"end var]' ","100","                       
            <option template="%widget_sql:string3%" value="%widget_sql:id%">%widget_sql:string2%</option>
            "end SQL]
        </select>

        <div id="newtemplate">
            [name new template]<br>
            <input id="newtemplatecaption"/>
        </div>          
        [run in]
        <select id="crunin">
            <option value="i">[This Page only]</option>
            <option value="t">[This layout only]</option>
            <option value="All">[All]</option>
        </select>

        [show Powers]
        <select id="cpowers">
            <option value="1">[admin]</option>
            <option value="4">[moderator]</option>
            <option value="2">[user]</option>
            <option value="3">[guest]</option>
            <option value="0">[public]</option>
        </select>
        <div onclick="createwidget('[var:"side"end var]',$('#ctemplate').val(),$('#crunin').val(),$('#cpowers').val(),Base64.encode($('#newtemplatecaption').val()),'[var:"dotempltoption"end var]');" class="corner-all buttonTheme"><span class="icon ui-icon-plusthick"></span>[Create]</div>
        </ul>
    </div>

    "end accordion]

    "end IF]




    [IF:"[var:"showtempltoption"end var]","
    [accordion:"accn","collapsible","
    [[var:"showtempltoption"end var]]->
    <span style="width:200px;display: block;">
    [pick template and select action]
    </span>
    <div id="result_tpl_tab1"></div>
    <div id='all_widgets' > 
        <select id="optionwidgetn">
            [SQL:"widget_sql","Select * From table3 where md5='widget' and string1='[var:"showtempltoption"end var]' ","100","                       
            <option template="%widget_sql:string3%" value="%widget_sql:id%">%widget_sql:string2%</option>
            "end SQL]
        </select>

        <div onclick="window.open('[constant:"SITE_LINK"end constant]?EFT=' + $('#optionwidgetn option[value=' + $('#optionwidgetn').val() + ']').attr('template'), '_blank')" class="corner-all buttonTheme"><span class="icon ui-icon-pencil"></span>[Edit advance]</div>
        <div onclick="if (confirm('[you well delete this template and all widget use it, are you sure?]')) $('#result_tpl_tab1').text('[Loading...]').load('[constant:"SITE_LINK"end constant]?deletetemplatew=' + $('#optionwidgetn').val());" class="corner-all buttonTheme"><span class="icon ui-icon-trash"></span>[Delete]</div>
        </ul>
    </div>

    "end accordion]
    "end IF]






















    [IF:"[var:"iswidgetcode"end var]","



    <div id="ajaxframeplg3221" class="ajaxframeplg">

        [include:"plugin/[var:"plgn"end var]/widget.inc"end include]
    </div>
    "end IF]

</div>










<span id="result_image"></span>

<!-- 
ThisPlugin_id : [var:"ThisPlugin_id"end var]
<br>
ThisPlugin_caption : [var:"ThisPlugin_caption"end var]
<br>
ThisPlugin_template : [var:"ThisPlugin_template"end var]
<br>
ThisPlugin_main : [var:"ThisPlugin_main"end var]
<br>
showtempltoption : [var:"showtempltoption"end var]
<br>

<form action="" id="formslide" enctype="multipart/form-data" method="post" target="x_form">
[input:"text","adsurl:[slideurl]","http://","","inplutsize_midiom",""end input]
[input:"submit","1198h","[Send]","","style:"end input]
 <input type="hidden" name="uploadimagepluginxads" id="uploadimagepluginxads" value="[var:"iswidgetcode"end var]">
</form>
-->



