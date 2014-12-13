//function below added by logan (cailongqun [at] yahoo [dot] com [dot] cn) from www.phpletter.com
function selectFile()
{
	var selectedFileRowNum = $('#selectedFileRowNum').val();
  if(selectedFileRowNum != '' && $('#row' + selectedFileRowNum))
  {

var url = '';
    // insert information now
$('input:checkbox').each(function(){
var checked = $(this).attr('checked');
if(checked){
url=$(this).val();
return false;
}
}); 	  
         window.top.insertAtCursor('<img src="'+url+'"/>');   
             
  }else
  {
  	alert(noFileSelected);
  }
  

}



function cancelSelectFile()
{
	window.top.$.fancybox.close();  
}