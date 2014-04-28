$(document).ready(function() {
	$('.housingPic').click(function() {
		var url = $(this).attr('src');
		
		$('#mainPic').attr('src', url);
	});
});
