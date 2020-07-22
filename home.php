<?php
	  session_start();
	  $host = "localhost";
	  $user = "root";
	  $password = "";
	  $db = "librarydatabase";

	  $conn1 = mysqli_connect($host,$user,$password);
	  mysqli_select_db($conn1,$db);
	 
	
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
	
	

</head>
<body>
	
	<div class = "heading" align="center">
			PARAMOUNT LIBRARY
		</div>
	 <div class="main">
	 	<ul>
			  
			  <li >
    		
    		<?php
    			if(!isset($_SESSION['uname']))
				  {
				  	echo "<a href = 'loginf.php'>LOGIN</a>";
				  }
				  else
				  {
				  	$uname = $_SESSION['uname'];
				  	
				  	echo "<a>Welcome <u>".$uname."</u></a>";

				  }
				 ?>
				</li>
				<li><a href="midHome.php">Home</a></li>

				<li>
    			<a href="displayBooks.php">Display Available Books</a>
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
    		
    		<?php
    			if(!isset($_SESSION['uname']))
				  {
				  	echo "<a href = 'signupf.php'>SIGNUP</a>";
				  }
				 ?>
				</li>

			  	
			</ul>
			<div class = "sign" align="center">New Arrivals</div>
	<div class="row">

  <div class="column">
    <div class ="tile"><img src="images//books/1.jpg"></div>
    <div class ="tile"><img src="images//books/2.jpg"></div>
    <div class ="tile"><img src="images//books/3.jpg"></div>
    <div class ="tile"><img src="images//books/4.jpg"></div>
    <div class ="tile"><img src="images//books/5.jpg"></div>
  </div>
  
  <div class="column">
  	<div class = "sign" align="center">Most Issued</div>
    <div class ="tile"><img src="images//books/6.jpg"></div>
    <div class ="tile"><img src="images//books/7.jpg"></div>
    <div class ="tile"><img src="images//books/8.jpg"></div>
    <div class ="tile"><img src="images//books/9.jpg"></div>
    <div class ="tile"><img src="images//books/10.jpg"></div>
  </div>
  <div class="column">
    
  </div>
  <div class="column">
    
  </div>
</div>
            
                
    </div>


	
	
			
</body>
</html>