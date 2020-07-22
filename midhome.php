<?php
	 session_start();
	 if($_SESSION['uname'] == 'admin') 
		header("Location: admin_home.php");
	else
		header("Location: home.php");
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

	
	</script>

</head>
<body >

	
	
			
</body>
</html>

