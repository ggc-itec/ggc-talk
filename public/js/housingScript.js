$(document).ready(function() {
	
	// toggles src url of main pic on viewListing.blade.php and previewPost.blade.php
	$('.housingPic').click(function() {
		var url = $(this).attr('src');
		
		$('#mainPic').attr('src', url);
	});
});
