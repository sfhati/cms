(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{
                            "required":{
                                    "regex":"none",
                                    "alertText":"* [This field is required]",
                                    "alertTextCheckboxMultiple":"* [Please select an option]",
                                    "alertTextCheckboxe":"* [This checkbox is required]"},
                            "length":{
                                    "regex":"none",
                                    "alertText":"*[Between] ",
                                    "alertText2":" [and] ",
                                    "alertText3": " [characters allowed]"},
                            "maxCheckbox":{
                                    "regex":"none",
                                    "alertText":"* [Checks allowed Exceeded]"},
                            "minCheckbox":{
                                    "regex":"none",
                                    "alertText":"* [Please select] ",
                                    "alertText2":" [U_options]"},
                            "confirm":{
                                    "regex":"none",
                                    "alertText":"* [Your field is not matching]"},
                            "telephone":{
                                    "regex":"/^[0-9\-\(\)\ ]+$/",
                                    "alertText":"* [Invalid phone number]"},
                             "email":{
                                    "regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
                                    "alertText":"* [Invalid email address]"},
                            "date":{
                                    "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                                    "alertText":"* [Invalid date, must be in YYYY-MM-DD format]"},
                            "onlyNumber":{
                                    "regex":"/^[0-9\ ]+$/",
                                    "alertText":"* [Numbers only]"},
                            "ByajaxValidate":{
                                    "file":"index.php",
                                    "extraData":"",
                                    "alertTextOk":"* Available",
                                    "alertTextLoad":"* Loading, please wait",
                                    "alertText":"* not Available"},
                            "noSpecialCaracters":{
                                    "regex":"/^[0-9a-zA-Z]+$/",
                                    "alertText":"* [No special caracters allowed]"},
                            "onlyLetter":{
                                    "regex":"/^[a-zA-Z\ \']+$/",
                                    "alertText":"* [Letters only]"}
                        }
		}
	}
})(jQuery);

$(document).ready(function() {
	$.validationEngineLanguage.newLang();
                $(".showtooltip").append('<div class="formError sfhati_tooltip" style="opacity: 0.87;"><div class="formErrorContent"></div><div class="formErrorArrow"><div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div></div></div>');
                $(".sfhati_tooltip").hide();
                $(".showtooltip").mouseover(function() {

                    callerTopPosition = $(this).offset().top -16 ;
                    callerleftPosition = $(this).offset().left -200; 

                    $(".sfhati_tooltip .formErrorContent").html($(this).attr("rel"));
                    var wi= parseInt($(this).find(".sfhati_tooltip").css("width"));
                    var he= parseInt($(this).find(".sfhati_tooltip").css("height"));
                    callerTopPosition=callerTopPosition-he;
                    $(".sfhati_tooltip").css({
                        top:callerTopPosition,
                        left:callerleftPosition
                    });
                    $(".sfhati_tooltip .formErrorContent,.sfhati_tooltip .formErrorArrow div").css({background: "#000"});

                    $(this).find(".sfhati_tooltip").show();

                });
                $(".showtooltip").mouseout(function() {
                    $(".sfhati_tooltip").hide();
                });

$("select[rel*=combobox]").combobox();

$("input[rel*=datepicker]").datepicker({changeMonth: true,changeYear: true});
$(".ui-datepicker").hide();
$(".tabs_box").tabs();
});

function field_autocomplete(id){
var cache = {},lastXhr;
$("#"+id).autocomplete({
        source: function( request, response ) {
                var term = request.term;
                if ( term in cache ) {
                        response( cache[ term ] );
                        return;
                }
                lastXhr = $.getJSON( SITE_LINK +"?autocomplete="+id, request, function( data, status, xhr ) {
                        cache[ term ] = data;
                        if ( xhr === lastXhr ) {
                                response( data );
                        }
                });
        },
        minLength: 1,
        select: function( event, ui ) {
                $(this).val(ui.item.value);
        }
});
} 
