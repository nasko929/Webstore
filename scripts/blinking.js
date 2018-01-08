function blinktext () {
	var f = document.getElementById('announcement');
	setInterval(function() {
		f.style.visibility = (f.style.visibility == 'hidden' ? '' : 'hidden');
	}, 1000);
}