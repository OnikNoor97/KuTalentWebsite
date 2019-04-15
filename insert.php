<html>
<body>
 
<?php
$con = mysql_connect("localhost","k1517267","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("db_k1517267", $con);
 
$sql="INSERT INTO roleCategory(rolCategory,faculty)
VALUES
    ('$_POST[role]','$_POST[faculty]')";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "you have successfully added a  role category";
 
mysql_close($con)
?>
</body>
</html>