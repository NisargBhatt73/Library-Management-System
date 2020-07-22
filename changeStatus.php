<?php
	  session_start();
	  $host = "localhost";
	  $user = "root";
	  $password = "";
	  $db = "librarydatabase";

	  $conn1 = mysqli_connect($host,$user,$password);
	  mysqli_select_db($conn1,$db);

	  if(isset($_POST['submit']))
	  {

	  	$id  = $_POST['id'];
	  	$cond = $_POST['conditionbook'];
	  	echo "HERE ".$cond;
	  	$sql="update  books set conditionbook = '".$cond."' where id = ".$id;

		if (mysqli_query($conn1, $sql)) {
			
               echo "<script>alert('MOdified successfully');</script>";
            } else {
               echo "alert('Error: " . $sql . "" . mysqli_error($conn1)."');";
            }
            $conn1->close();
	  }
	 
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/new.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

	function goToLogin()
	{
		window.location.replace("loginf.php");
	}
	</script>
	

	

</head>
<body background="back.jpg">
	<div class = "heading" align="center">
			PARAMOUNT LIBRARY
		</div>
	<?php
		if(!isset($_SESSION['uname'])){
			echo "<script>alert('You need to be logged in to access this Page, Press OK to Login');</script>";
			echo "<script>goToLogin();</script>";
		}
		?>
	
	 <div class="main">
	 	<ul>
			  
			  <li >
    		
    		<?php
				  	echo "<a>Welcome <u>".$_SESSION['uname']."</u></a>";
			?>
 
				</li>
				<li><a href="midHome.php">Home</a></li>
			 
			  <li>
			  	
				  	<a href = 'addBook.php'>Add Books</a>;

			  </li>
			  <li>
			  	
				  	<a href = 'changeStatus.php'>Change Book Status</a>;

			  </li>
				<li>
					<?php
		    		if(isset($_SESSION['uname']))
						  {
						  	echo "<a href = 'logout.php'>LOGOUT</a>";
						  }
				 ?>
				</li>

    		<li>
			  	
			</ul>
			<p class="sign" align="center">Modify Book Condition</p>
			<div align="center">
		    <form class="form1" method="POST" action = "#">
		    	<input class="un " type="text" align="center" name = "id" placeholder="Enter ID of book to modify" required><br>
		      <input class="un " type="text" align="center" name = "conditionbook" placeholder="Enter condition" required><br>
		  </div>
		      <div style="padding-left: 190px;">
		      	<input type = "submit" class = "submit" name = "submit" value = "Modify"></div>
				</form>

    	
      
            
                
    </div>


	
	
			
</body>
</html>