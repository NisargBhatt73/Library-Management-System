<?php
	  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/stylehome.css">
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
	<link rel="stylesheet" type="text/css" href="css/new.css">
	<style>
			ol.lst{
	  
	  font-size: 24px;
	  text-align: center;
	  
	  background-color: #f1f1f1;
	}

	</style>

	

</head>
<body>
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

			<p class="sign" align="center">Issued Books</p>
			<div class = "list">
				<ol class = "lst">
				
		    <?php
			$host = "localhost";
			  $user = "root";
			  $password = "";
			  $db = "librarydatabase";

		  $conn1 = mysqli_connect($host,$user,$password);
		  mysqli_select_db($conn1,$db);

		  	$allbooks = array();

		    $sql="select * from books where conditionbook not in ('torn','lost')";
		    $result = mysqli_query($conn1,$sql);
			 while ($row = mysqli_fetch_assoc($result)) {
			 	$allbooks[$row['ID']] = $row['bookname'];
			 	}

			 	//print_r($allbooks);


		    $sql1 = "select * from issue ";
		    $res = mysqli_query($conn1,$sql1);
		    
		    while($row = mysqli_fetch_assoc($res))
		    {
		    	foreach ($allbooks as $key => $value) {
		    		if($key == $row['id'])
		    		{

		    			echo '<li>'.$value." Issued to ".$row['username'].'</li><br><br>';
		    			
		    			break;
		    		}
		    	}
		    	
		    }
		    
		    #print_r($issued);
		    
	            
		    ?>
		
		</div>
    	
      
            
                
    </div>


	
	
			
</body>
</html>