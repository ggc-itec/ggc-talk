$(document).ready(function() {

	// toggles src url of main pic when viewing/previewing a housing listing
	$('.housingPic').hover(function() {
		var url = $(this).attr('src');
		
		$('#mainPic').attr('src', url);
	});
});
