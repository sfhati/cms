[include:"header.inc"end include]
<div class="main"> 
		<article id="contentxc" class="content-inner">
            <div class="maincontent">
            	<div class="headercont">
                	
                </div>
				<h3 class="margintop marginbottomnum">Error Page</h3>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" align="left"><div id="wn1">
				    <div id="lyr1">
                                        
                                        <div id="content" class="widget_droppable">  <p>
   
[IF:"[array:"ERROR","PAGE_NOT_FOUND"end array]","
page not found! <br>

"end IF]
[IF:"[array:"ERROR","PAGE_NOT_ACTIVE"end array]","
page not active!<br>
"end IF]
[IF:"[array:"ERROR","PAGE_NOT_PERMISSION"end array]","
you dont have permission!<br>
<br>


"end IF]  
                                            </p>      
</div>  
                                  
                                    </div>
                </div> </td>
                    <td valign="top" align="right"><div id="scrollbar1"></div></td>
                  </tr>
                </table>


            </div>
            
		</article>
     </div>







[include:"footer.inc","x"end include]
