<html>
<head>
<meta charset="utf-8">
<title>CV Upload</title>
<style type="text/css">
#specify {
	margin-top: 10px;
	width: 980px;
	background-color: #062134;
	float: left;
}


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
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
    </div>

<p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>

</div>
<div id="container1">
<div id="back"><button onClick="goBack()">Back</button></div>
  <div id="specify">
<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th> Category Number </th>
		<th> Category Name </th>
		 
	</tr>
</thead>
<tbody>
	<?php
		include('connectionDiana.php');
		$query = 'SELECT roleCategoryId, roleName FROM roleCategory';
		$result = $pdo->prepare($query);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['roleCategoryId']; ?></td>
		<td><?php echo $row['roleName']; ?></td>
		
		
	</tr>
	<?php
		}
	?>
</tbody>
</table>

<br>
<?php
require_once "connectionDiana.php";

if ( isset($_POST['role']))
{
	$sql = "INSERT INTO roleCategory (roleName) 
              VALUES (:roleName)";
    $stmt = $pdo->prepare($sql);
    if (empty($_POST['role']) || ctype_space($_POST['role']))
    {
    	
    }
    else
    {
    	$stmt->execute(array(':roleName' => $_POST['role']));
		header("Location: addrolecategory.php");

	}
}	
?>			
<form action="addrolecategory.php" method="post">
 Add a new role category: <input type="text" name="role" /><br><br>
 <input type="submit" value="Add New"/>
</form>




</div>


  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>