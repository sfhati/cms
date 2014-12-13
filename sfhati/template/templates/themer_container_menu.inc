                <div class="container_menu">
                    <div class="menu-wtg-container">
                        <ul class="menu" id="menu-wtg">
                            [menu:"header_menu_horisantal"end menu]                            
                        </ul>                            
                 </div>                        
                </div>

					


<script>
jQuery(function() {
    jQuery(".container_menu ul:first").menuslide({
    fx: "linear", //backout 
    speed: 300,
    click: function(event, menuItem) {
        return true;
    }
    });
});
</script>


