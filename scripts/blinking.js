var now = document.getElementById("blink");

function blinktext()
{
	var f = document.getElementById("blink");
	setInterval(function() 
	{
		f.style.color = (f.style.color == 'white' ? 'green' : 'white');
	}, 150);
}

now.addEventListener("load",blinktext());