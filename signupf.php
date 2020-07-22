<?PHP
	session_start();

	  $host = "localhost";
	  $user = "root";
	  $password = "";
	  $db = "librarydatabase";

// Create connection

	  $passerr="";
$usererr="";
$err = "";
$good = 1;
$_SESSION['good'] = 1;

function valid($password,$user)
{
	
	$passerr="";
	$usererr="";
	$err = "";
	$good = 1;
	$uppercase = !preg_match('@[A-Z]@', $password);
	$lowercase = !preg_match('@[a-z]@', $password);
	$number    = !preg_match('@[0-9]@', $password);
	$specialChars = !preg_match('@[^\w]@', $password);
	if(strlen($password) < 8)
		$passerr = "Password must be of atleast 8 characters.";
	else if($uppercase)
		$passerr = "Password must contain an uppercase letter.";
	else if($lowercase)
		$passerr = "Password must contain a lowercase letter.";
	else if($number)
		$passerr = "Password must contain a number.";
	else if($specialChars)
		$passerr = "Password must contain a special character.";
	
	
	if(strlen($user) < 3){
		$usererr = "Username should be  of atleast 3 charcters";
	}
	
	if($passerr!="" || $usererr!="")$good = 0;

	$_SESSION['passerr'] = $passerr;
	$_SESSION['usererr'] = $usererr;
	$_SESSION['err'] = $err;
	$_SESSION['good'] = $good;
	
	

}
$conn = new mysqli($host, $user, $password,$db);
if($conn->connect_error)
{
	die("connection not established" . $conn->connect_error);
}
if(isset($_POST['submit'])){
	valid($_POST['pass'],$_POST['username']);

	if($_SESSION['good'] == 1){
	$pwd=password_hash($_POST['pass'],PASSWORD_BCRYPT);
	#echo $pwd . "<br> " . strlen($pwd);

	$sql="insert into logincredentials(username,pwd) values('".$_POST['username'].
	"','".$pwd."')";
	if($conn->query($sql)===TRUE)
	{
		$_SESSION['uname'] = $_POST['username'];
		header('Location: home.php');
	}
	else
	{
		echo $conn->error;
	}
}
}

$conn->close();
?>
<html>

<head>
  <link rel="stylesheet" href="css/new.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign-Up</title>
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

<body background="back.jpg">
	<div class = "heading" align="center">
			PARAMOUNT LIBRARY
		</div>
  <div class="main">
    <p class="sign" align="center">Sign Up</p>
    <form class="form1" method="POST" action = "#">
      <input class="un " type="text" align="center" name = "username" placeholder="Username">
      <input class="pass" type="password" align="center" name = "pass" placeholder="Password">
      <div class = "err" align = "center" style="color:red;">
      	<?php
      	
      	$good = $_SESSION['good'];
      			while($good == 0){

      			
      			echo $_SESSION['usererr'].'<br>';
      			if($_SESSION['usererr'] != "")break;
      			
      		    echo $_SESSION['passerr'].'<br>';
      		    if($_SESSION['passerr'] != "")break;
      			
      			echo $_SESSION['err'].'<br>';
      			break;
      		}
      	?>

      </div>
      <input type = "submit" class="submit" name = "submit">
			
      
      
                
    </div>

     
</body>

</html>