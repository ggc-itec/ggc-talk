$(document).ready(function() {

	// toggles src url of main pic when viewing/previewing a housing listing
	$('.housingPic').click(function() {
		var url = $(this).attr('src');

		$('#mainPic').attr('src', url);
	});
	
	// opens a new window for a post reply email
	$('#reply').click(function() {
		var width = 800;
		var height = 500;
		var left = (screen.width / 2) - (width / 2);
		var top = (screen.height / 2) - (height / 2);
		window.open(this.rel, '_blank', 'height=' + height + ',width=' + width + ', top=' + top + ', left=' + left);
	});
});
