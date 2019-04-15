    <?php

session_start();
 
require 'connection.php';
 
if (!empty($_POST['k_number']) && !empty($_POST['password']) )
{
    $blah = "SELECT k_number, forename, surname, password FROM student WHERE k_number = :k_number";
    $records = $conn->prepare($blah);
    $records->bindParam(':k_number', $_POST['k_number']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

$message = '';

if (count($results) > 0 && password_verify($_POST['password'], $results['password']) )
    {
        $query = 'SELECT studentId, forename, surname FROM student WHERE k_number = :k_number';
        $onik = $conn->prepare($query);
        $onik->bindParam(':k_number', $_POST['k_number']);
        $onik->execute();
        $row = $onik->fetch();

        $_SESSION['studentId'] = $row['studentId'];
        $_SESSION['studentName'] = $row['forename'];
        $_SESSION['studentSurname'] = $row['surname'];

        $_SESSION['student_id'] = results['id'];
        header("Location: index.php"); //You need to change this for the server!
    }
        else
    {
        $message = "Username/Password does not match! Please try again!";
    }
}
 
?>
<html>
<head>
<meta charset="utf-8">
<title>Student Login</title>
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
 <?php if (!empty($message)): ?>
    <p><?= $message ?> </p>
    <?php endif ?>
 
 
<h1>Student Login</h1>
<form action="studentLogin.php" method="POST">
<input type="text" name="k_number" placeholder="K Number" Required="True">
<input type="password" name="password" placeholder ="Password" Required="True">
<input type="submit" name="submit" value="Sign in">
             
 
</form>
</div>


  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>