<?php
session_start();
require "connection.php";

 
$message = '';
 
//error_reporting(0);

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$password = substr( str_shuffle( $chars ), 0, 20);
    

    $sql = "INSERT INTO employer (username,forename, surname, password, staffId, email, companyName) VALUES (:username, :forename, :surname, :password, :staffId, :email, :companyName)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':forename', $_POST['forename']);
    $stmt->bindParam(':surname', $_POST['surname']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':staffId', $_SESSION['staffId']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':companyName', $_POST['companyName']);

    $sthandler = $conn->prepare("SELECT username FROM employer WHERE username = :username");
    $sthandler->bindParam(':username', $_POST['username']);
    $sthandler->execute();

    if($sthandler->rowCount() > 0)
    {
        $message = 'Account already exist! Please sign in';
    }
    else
    {

     if( $stmt->execute() )
      {
        $message = 'Success! Your account has been created!';
      }
      else
      {
        $message = 'Error making the account! Please Try Again!';
      }

    }

if (isset($_SESSION['staff_id'])) 
{

?>
<html>
<head>
<meta charset="utf-8">
<title>Add Employer</title>
<style type="text/css">
#specify {
	margin: 10px;
	height: 220px;
	width: 960px;
	background-color: #062134;
	float: left;
}
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">

<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #062134;
}
</style>
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>

<div id="header">Kingston Uni</div>
<br>
<br>
<div id="navbar">
  <div id="links">

  <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="logout.php">Log out</a></li>
</ul>
   

<p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>

</div>
<div id="container1">
<div id="back"><button onClick="goBack()">Back</button></div>
  <div id="specify">
 <h1>Add Employer</h1>
 
<form action = "addemployer.php" method = "POST">
<table align="center">              
<tr>
<td>Username:</td>  
<td><input type="text" placeholder="Username" name="username" Required="True"></td>
</tr>
 
<tr>
<td>Forename:</td>
<td><input type="text" placeholder="Forename" name="forename" Required="True"></td>
</tr>
 
<tr>
<td>Surname:</td>
<td><input type="text" placeholder="Surname" name="surname" Required="True"></td>
</tr>

<tr>
<td>Company Name:</td>
<td><input type="text" placeholder="Company Name" name="companyName" Required="True"></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" placeholder="Email" name="email" Required="True"></td>
</tr>
 
<tr>
<td>Password:</td>
<td><input type="text" placeholder="Password" id="password" name="password" value=<?= $password ?> ></td>
</tr>



 
</table>
<br>
<input type="submit" name="submit" value="Create">

</form>

<script type="text/javascript">
var password = document.getElementById("password")
  , password2 = document.getElementById("password2");

function validatePassword(){
  if(password.value != password2.value) {
    password2.setCustomValidity("Passwords Don't Match");
  } else {
    password2.setCustomValidity('');
  }
}

password.onchange = validatePassword;
password2.onkeyup = validatePassword;
</script>
<?php if (!empty($message)): ?>
              <p><?= $message ?> </p>
              <?php endif ?>
</div>


  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>

<button onclick="copy()">Copy Password</button>

<script type="text/javascript">
  
  function copy()
  {
    var yo = document.getElementById("password")
    var range = document.createRange();

    range.selectNode(yo);
    window.getSelection().addRange(range);
    document.execCommand('copy');
  }



</script>

</body>
</html>

<?php

}
else
{
  header("Location: staffLogin.php");
}

?>