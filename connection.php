<?php
try
{
              $servername = "kunet.kingston.ac.uk";
              $dbusername = "k1517267";
              $dbpassword = "password";
              $dbname = "db_k1517267";
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
 
              //echo "Successful Connection";
 
}
 
catch(PDOException $e)
{
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
} 
?>