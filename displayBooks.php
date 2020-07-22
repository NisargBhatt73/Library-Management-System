<?php
	  session_start();
 
	
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

			<ol class="lst">
				
		    <?php
			$host = "localhost";
			  $user = "root";
			  $password = "";
			  $db = "librarydatabase";

		  $conn1 = mysqli_connect($host,$user,$password);
		  mysqli_select_db($conn1,$db);

		  	$issued = array();
		    $sql="select * from books where conditionbook not in ('torn','lost')";
		    $sql1 = "select * from issue ";
		    $res = mysqli_query($conn1,$sql1);
		    while($row = mysqli_fetch_assoc($res))
		    {
		    	array_push($issued,$row['id']);
		    }
		    
		    #print_r($issued);
		    $result = mysqli_query($conn1,$sql);
			 while ($row = mysqli_fetch_assoc($result)) {
			 	if(in_array($row['ID'],$issued)) continue;
			 		//if($row['ID'] in_array($issued))continue;
			 		echo "<li>Book Id = ".$row['ID']."   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book Name  = ".$row['bookname'];
			 		echo '</li><br>';
			 	}
	            
		    ?>
		</ol>
		</div>
    	
      
            
                
    </div>


	
	
			
</body>
</html>