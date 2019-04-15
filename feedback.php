<?php 

session_start();
require 'connection.php';

if (isset($_SESSION['staff_id']))
{

?>



<html>
<head>
<meta charset="utf-8">
<title>Login</title>
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
</div>

<p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>

</div>
<div id="container">
  <div id="specify">
  <h1>FEEDBACK</h1>
  				<form action="feedback.php" method="post" enctype="multipart/form-data" class="dark-matter">
		
		<table width="795px" align="center" >
			
			
				<tr>
					<td align="right"> Name :</td>
					<td><input type="text" name="username"size="60"/></td>
				</tr>	
                
				<tr>
					<td align="right">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>		
					<tr>
					<td align="right">ID Number  :</td>
					<td><input type="text" name="id_number"size="60"/></td>
				</tr>		


				<tr>
					<td align="right"><p>Message:</p></td>
					<td><p>&nbsp;
					  </p>
					  <p>
					    <textarea > </textarea>
				      </p>
				    <p>&nbsp;</p></td>
				</tr>	

				<tr>
					
					<td colspan="6" align="center"><input type="submit" name="submit" value="Submit"/></td>
				</tr>
				
			</table>
		</form>
 

</div>
 

  
</div>



</body>
</html>

<?php 

}
else
{
	header("Location: staffLogin.php");
}


?>