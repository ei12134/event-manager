$(document).ready(function(){
	$(".error").click(function(){
		$(this).hide();
	});

	$("#dialog-confirm").dialog({
		resizable: false,
		height: 250,
		width: 500,
		modal: true,
		autoOpen: false,
		buttons: {
			'Delete event': function() {
				$(this).dialog('close');
				currentForm.submit();
			},
			'Cancel': function() {
				$(this).dialog('close');
			}
		}
	});

	$(".delete").click(function() {
		currentForm = $(this).closest('form');
		$("#dialog-confirm").dialog('open');
		return false;
	});

	$( "#date" ).datepicker();
}); 
