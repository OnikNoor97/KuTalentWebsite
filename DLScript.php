<?php
$servername = "kunet.kingston.ac.uk";
$dbusername = "k1517267";
$dbpassword = "password";
$dbname = "db_k1517267";
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
$id = $_GET['file'];
$query = 'select pathName from cvs where id = '.$id.'';
$stmt = $pdo->prepare($query);
$stmt->execute();
$pathName = $stmt->fetch();
$path = $pathName['pathName'] ;
$path_parts = pathinfo($path);
$file_name  = $path_parts['basename'];
$file_path  = 'kunet.kingston.ac.uk/~k1517267/upload/'.$file_name;
$file_size = filesize($file_path);
echo $path;
echo $file_name;
echo $file_path;
header('Content-Type: application/octet-stream');
header("Content-Length: ".$file_size);
header('Content-Disposition: attachment; filename = '.$file_name);
header("Cache-Control: no-cache");
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
ob_clean();
flush();
readfile($file_path);
exit();


