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
	  	$sql="insert into books(bookname,authorname,isbn,publishername,booktype,pages,conditionbook,edition,seller,language) values('".$_POST['bookname'].
		"','".$_POST['authorname'].
		"','".$_POST['isbn'].
		"','".$_POST['publishername'].
		"','".$_POST['booktype'].
		"','".$_POST['pages'].
		"','".$_POST['conditionbook'].
		"','".$_POST['edition'].
		"','".$_POST['seller'].
		"','".$_POST['language'].
		"')";

		if (mysqli_query($conn1, $sql)) {
               echo "<script>alert('New record created successfully');</script>";
            } else {
            	echo mysqli_error($conn1);
               echo "<script>alert('Error: ');</script>";
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
	<style type="text/css">
		.main{
            background-color: #F0F8FF;
            
            display: block;
        width: 1050px;
        height: 950px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
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

			<p class="sign" align="center">Add Book</p>
		    <form class="form1"  method="POST" action = "#">
		    	<div align = "center">
		      <input class="un " type="text" align="center" name = "bookname" placeholder="Enter Book Name here" required><br>

		      <input class="un " type="text" align="center" name = "language" placeholder="Enter Language " required><br>

		      <input class="un " type="text" align="center" name = "authorname" placeholder="Enter Author Name here" required="required"><br>

		      <input class="un " type="text" align="center" name = "isbn" placeholder="Enter book's ISBN here" required><br>

		      <input class="un " type="text" align="center" name = "publishername" placeholder="Enter Publisher Name here" required><br>

		      <input class="un " type="text" align="center" name = "booktype" placeholder="Enter Book Types here" required><br>

		      <input class="un " type="number" align="center" name = "pages" placeholder="Enter No of Pages here" required><br>

		      <input class="un " type="text" align="center" name = "conditionbook" placeholder="Enter Book condition here" required><br>

		      <input class="un " type="text" align="center" name = "edition" placeholder="Enter Book Edition Name here " required><br>

		      <input class="un " type="text" align="center" name = "seller" placeholder="Enter Seller Name here" required><br>

		      </div>

		      <div style="padding-left: 190px;"><input type = "submit" class = "submit" name = "submit" value = "Add Book"></div>
				</form>
    	
      
            
                
    </div>


	
	
			
</body>
</html>