<?php
try
{
	$servername = "kunet.kingston.ac.uk";
	$dbusername = "k1517267";
	$dbpassword = "password";
	$dbname = "db_k1517267";
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

	 //echo "I am here, all good.";

}

catch(PDOException $e)
{
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}



?>