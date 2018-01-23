<?php
	$title = "AJAX Request";
	require("header_footer/header.php");

?>

<button id = "ajaxButton" type = "button">Make a request</button>
<p id = "tobefilled"></p>
<script>

( function()
{
	var httpRequest;
	document.getElementById("ajaxButton").addEventListener("click",makeRequest);
	function makeRequest()
	{
		httpRequest = new XMLHttpRequest();

		if (!httpRequest)
		{
			alert('Giving up :( Cannot create an XMLHTTP instance');
			return false;
		}
		httpRequest.onreadystatechange = alertContents;
		httpRequest.open('GET', 'random.txt');
		httpRequest.send();
	}

	function alertContents()
	{
		if (httpRequest.readyState === XMLHttpRequest.DONE)
		{
			if (httpRequest.status === 200)
			{
				document.getElementById("tobefilled").innerHTML = httpRequest.responseText;
			}
			else
			{
				alert('There was a problem with the request.');
			}
		}
	}
})();

</script>




<?php
	require($footer_path);
?>