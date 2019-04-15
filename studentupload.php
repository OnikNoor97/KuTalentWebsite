<?php 

session_start();

if (isset($_SESSION['student_id']))
{

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
.permission {
	font-size: 16px;
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
<div id="back">
  <button onClick="goBack()">Back</button></div>
  <div id="specify">
<?php
// If GET method request
//if ($_SERVER['REQUEST_METHOD'] == 'GET')
	require_once "connectionDiana.php";
//{ 
// lay out form
?>
<form method="POST" action="<?php
	echo $_SERVER['SCRIPT_NAME'] ?>"
      enctype="multipart/form-data">



<span class="permission">
<input type="file" name="document"/><br>
Choose a category <select name = "List">

<?php 

$stmt = $pdo->prepare('select roleCategoryId, roleName from roleCategory');
$stmt->execute();
$roleNames = $stmt->fetchAll(); 

foreach($roleNames as $rCat): ?>
<option value="<?= $rCat['roleCategoryId']; ?>"><?= $rCat['roleName']; ?></option>
<?php endforeach; ?>
  
</select>
<br>
<br>
<input type="checkbox" name="Share" value="Yes">
I give permission for KU Talent to share my CV with employers once it is “completed”<br>
<br>
<input type="submit" value="Send File"/></span>


</form>


<?php
//}
//else
//{
// Entry point after the script calls itself


	if (isset($_FILES['document']) && ($_FILES['document']['error'] == UPLOAD_ERR_OK))
	{
		$newPath = 'upload/' . basename($_FILES['document']['name']);
		if (isset($_POST['List'])){
			$list = $_POST['List'];
			
		}
			
		if(isset($_POST['Share'])){
    //$share is checked and value = 1
    // this checks if the user has given sharing permission and sets the value that will be added to the database
    $Share = $_POST['Share'];
}
else{
    //$shareis not checked and value=0
    $Share= "No";
}  

date_default_timezone_set('GB');
$timings = date('Y-m-d H:i:s');

  $extn = substr($newPath, -4);

     if( ($extn == "doc") || ($extn == "docx") ) 
     {  
		if (move_uploaded_file($_FILES['document']['tmp_name'], $newPath))
		{
			print "CV has been uploaded";
			$number = $_SESSION['studentId'];
			$sql = "INSERT INTO cvs (pathName, studentId, roleCategoryId, permission, timeUpload) VALUES (:pathName, :studentId, :roleCategoryId, :permission, :timeUpload)";
    
			$stmt = $pdo->prepare($sql);
		    $stmt->execute(array(
		        ':pathName' =>$newPath,
				':studentId' =>$number,
				':permission' =>$Share, 
				':roleCategoryId' =>$list,
		    	'timeUpload' =>$timings));

        
		}
		else
		{
			print "Couldn't move file to $newPath";
		}
	}
		else
		{
			print "Word Documents Only!";
		}
	}
	else
	{
		print "No valid file uploaded.";
	}
}

else
{
	header("Location: studentLogin.php");
}
	
	
	
	
	
	//$stmt = $pdo->prepare('select roleCategoryId, roleName from roleCategory');
	//$stmt->execute();
	//$roleNames = $stmt->fetchAll(); 
	


/* 

Uploaded files appear in the $_FILES array. For each file element in the form, 
an array is created in $_FILES whose key is the file element's name. E.g., the form has 
a file element named document, so $_FILES['document'] contains the information about the 
uploaded file. Each of these per-file arrays has five elements:

name: the name of the uploaded file. Supplied by the browser so it could be a full 
pathname or just a filename.

type: the MIME type of the file, as supplied by the browser.

size: the size of the file in bytes, as calculated by the server.

tmp_name: the location in which the file is temporarily stored on the server.

error: An error code with defined meanings

UPLOAD_ERR_OK(0) means success

*/

/*
You need to check for type of file - only pdf or .docx

Store $newPath in the appropriate database table

When the need arises to download the file, you can download it from there.
*/

/* 
To download - one possibility
# http://stackoverflow.com/Questions/5595485/php-file-download
if (file_exists($file))
{
    if (FALSE!== ($handler = fopen($file, 'r')))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: chunked'); //changed to chunked
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        //header('Content-Length: ' . filesize($file)); //Remove

        //Send the content in chunks
        while(false !== ($chunk = fread($handler,4096)))
        {
            echo $chunk;
        }
    }
    exit;
}
echo "<h1>Content error</h1><p>The file does not exist!</p>";

*/

	?>

</div>


  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>



























































<?php

error_reporting(0);

?>