$(document).ready(function(){
	$("input:radio[name=himpunan]").change(function () {
	if ($(this).attr("checked") == "checked") {
	    $.cookie('himpunan', $(this).val());
	}
	   
	window.location.reload();
	});
});