<?php
require "connection.php";

die(phpversion()); 
$message = '';
 
error_reporting(0);

   
if(!empty($_POST['k_number']) && !empty($_POST['forename']) && !empty($_POST['surname']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['email']))
{
  if ($_POST['password'] == $_POST['password2'])
  {
    $sql = "INSERT INTO student (k_number, forename, surname, password, email) VALUES (:k_number, :forename, :surname, :password, :email)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':k_number', $_POST['k_number']);
    $stmt->bindParam(':forename', $_POST['forename']);
    $stmt->bindParam(':surname', $_POST['surname']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

    $sthandler = $conn->prepare("SELECT k_number FROM student WHERE k_number = :k_number");
    $sthandler->bindParam(':k_number', $_POST['k_number']);
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
 
  }
  else
  {
    $message = "Password does not match!";
  }
}
else
{
  $message = "Please enter all information!";
}
 
?>
<html>
<head>
<meta charset="utf-8">
<title>Student Registration</title>
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
    <li><a href="login.php">Login</a></li>
   
    
    <li><a href="register.php">Register</a></li>
</ul>
</div>

<p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>

</div>
<div id="container1">
<div id="back"><button onClick="goBack()">Back</button></div>
  <div id="specify">
 <h1>Student Registration</h1>
 
<form id = "myForm" action = "studentRegistration.php" method = "POST">
<table align="center">              
<tr>
<td>K Number:</td>  
<td><input type="text" placeholder="K Number" name="k_number" required></td>
</tr>
 
<tr>
<td>Forename:</td>
<td><input type="text" placeholder="Forename" name="forename" required></td>
</tr>
 
<tr>
<td>Surname:</td>
<td><input type="text" placeholder="Surname" name="surname" required></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" placeholder="Email" name="email" required></td>
</tr>
 
<tr>
<td>Password:</td>
<td><input type="password" placeholder="Password" id="password" name="password" required></td>
</tr>
 
<tr>
<td>Confirm Password:</td>
<td><input type="password" placeholder = "Confirm password" id ="password2" name="password2" required></td>
</tr>
 
</table>
<br>
<input type="submit" name="submit" value="Sign up">
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
</body>
</html>