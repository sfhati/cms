[IF:"[session_var:"IDUSER_ADMIN"end session_var]","
<div id="statuseditorclick1" class="jqtecontrol icon-pencil"></div>
<div id="statuseditorclick2" class="jqtecontrol icon-save"></div>
<div id="statuseditorclick3" class="jqtecontrol icon-check"></div>
<div name="span" class="jqte-test">
"end IF]

[this:"page_cont"end this]

[IF:"[session_var:"IDUSER_ADMIN"end session_var]","
</div>

<script>
	

		
		$(".jqtecontrol") .hide();
		$('#statuseditorclick3').show();

	$('.jqte-test').jqte();
	$(".editor").jqte({button: "SEND"});
		$("#statuseditorclick1").click(function(){
		$(".jqtecontrol") .hide();
		$('#statuseditorclick3').show();
		$('.jqte-test').jqte({"status" : true});
	});
	
	$("#statuseditorclick2").click(function(){
		$(".jqtecontrol") .hide();
		$('#statuseditorclick1').show();		
		var savetext=Base64.encode($('.jqte-test').html());
		$('.too_image_preloader').show();
       $.post(SITE_LINK, {
       	    savecontentpage: 1, 
            idpg: [this:"id"end this],            
            value_contpage: savetext
        }).done(function() {
            $("#result_theme_panel").text('[done...]');
            $('.too_image_preloader').fadeOut('fast');
        });
		
		
	});
	
	$("#statuseditorclick3").click(function(){
		$(".jqtecontrol") .hide();
		$('#statuseditorclick1').show();
		$('#statuseditorclick2').show();
		$('.jqte-test').jqte({"status" : false});
	});
	setTimeout(function(){
            $(".jqtecontrol") .hide();
            $('#statuseditorclick1').show();
            $('.jqte-test').jqte({"status" : false});    
        },3000);
	
		

</script>
"end IF]