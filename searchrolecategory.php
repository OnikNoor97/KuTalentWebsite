<?php

mysql_connect("localhost","k1517267","password") or die ("could not connect");
mysql_select_db("db_k1517267") or die ("could not find db");
$output='';
//collect
if(isset($_POST['search'])){
	$searchq= $_POST ['search'];
$searchq= preg_replace("#[^0-9a-z]#i","",$searchq);
$query= mysql_query("SELECT * FROM roleCategory WHERE rolCategory LIKE '%$searchq%' OR faculty LIKE '%$searchq%'") or die ("could not search!");
$count = mysql_num_rows($query);
if($count==0){
	$output='there was no search results!';
}else{
	while($row = mysql_fetch_array($query)){
		
		$r=$row['rolCategory'];
		$f=$row['faculty'];
		$roleCategoryId=$row['roleCategoryId'];
		
		$output .= '<div>'.$r.' '.$f.'</div>';
		
	}
	
}

}

?>


<html>
<head>
<meta charset="utf-8">
<title>CV Upload</title>
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
    </div>

<p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>

</div>
<div id="container1">
<div id="back"><button onClick="goBack()">Back</button></div>
  <div id="specify">
<form action="search.php" method="post">
<input type="text" name="search" placeholder="search role category"/>
<input type = "submit" value = ">>" />

</form>

<?php print("$output");?>

</div>


  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>