<?php
	  session_start();
	  session_destroy();
	 // header("Location : home.php");
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

	function goToHome()
	{
		window.location.replace("midHome.php");
	}
	</script>

</head>
<body onload = "goToHome()">
	
	<a1> LOADING</a1>
	
	
			
</body>
</html>

