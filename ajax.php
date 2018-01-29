<?php
	$title = "AJAX Request";
	require("header_footer/header.php");

?>

<button id = "ajaxButton" type = "button">Make a request</button>
<p id = "tobefilled"></p>
<script>

document.getElementById("ajaxButton").addEventListener("click",Things);
function Things()
{
	setInterval(function()
	{
		var httpReq = new XMLHttpRequest();
		if(!httpReq)
		{
			alert("Cannot create XMLHttpRequest object.");
			return;
		}
		httpReq.addEventListener("readystatechange",Main);
		httpReq.open('GET','random.txt');
		httpReq.send();
		function Main()
		{
			//console.log(arguments);
			if(httpReq.readyState == 4)
			{
				if(httpReq.status == 200)
				{
					document.getElementById("tobefilled").innerHTML = httpReq.response;
				}
			}
		}

	},150);
}

</script>




<?php
	require($footer_path);
?>