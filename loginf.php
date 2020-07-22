<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "librarydatabase";


$good = 1;

if(isset($_SESSION['uname']))
{
	
	header("Location: midHome.php");
}


$conn1 = mysqli_connect($host,$user,$password);
mysqli_select_db($conn1,$db);
if (mysqli_connect_errno($conn1)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

if(isset($_POST['username']))
{
	$uname = $_POST['username'];
	$pwd = $_POST['pass'];
	

	$sql = "select (pwd) from  logincredentials where username='".$uname."'";
	#echo $sql;
	$result = mysqli_query($conn1,$sql);
	$pas = mysqli_fetch_assoc($result);
	//echo "<a1>".$pas['pwd']."</a1>";
	$pass_hash = $pas['pwd'];
	
	if(password_verify($pwd, $pass_hash) && $good == 1)
	{
		$_SESSION['uname'] = $uname;
		//echo " Logged in successfully  USER ".$_SESSION['uname'];

		//echo "<script>window.location.href='index.php';</script>";
		//exit;

		header("Location: midHome.php");
		die(0);
	//exit;
	}
	else
	{
	//echo "Incorrect Username/Password";
		$good = 0;
		$_SESSION['err'] = "Invalid Username/Password";

	}

}



?>
<html>

<head>
  <link rel="stylesheet" href="css/new.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
  <style type="text/css">
  	
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    .main{
            background-color: #F0F8FF;
            
            display: block;
        width: 400px;
        height: 400px;
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
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" method="POST" action = "#">
      <input class="un " type="text" align="center" name = "username" placeholder="Username" required="required">
      <input class="pass" type="password" align="center" name = "pass" placeholder="Password" required="required">
      <div class = "err" align = "center" style="color:red;">
      	<?php
      			if($good == 0){
      			
      			echo $_SESSION['err'].'<br>';
      		
      		}
      	?>

      </div>
      <button class="submit" id = "submit">
				Login
			</button>
		</form>
      
      
            
                
    </div>

     
</body>

</html>