<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
<form method="POST" action="<?php
	echo $_SERVER['SCRIPT_NAME'] ?>"
     >
<select name = "List">

<?php 

$stmt = $pdo->prepare('select roleCategoryId, roleName from roleCategory');
$stmt->execute();
$roleNames = $stmt->fetchAll(); 

foreach($roleNames as $rCat): ?>
<option value="<?= $rCat['roleCategoryId']; ?>"><?= $rCat['roleName']; ?></option>
<?php endforeach; ?>
  
</select>
    <input type="submit" value="Choose Role Category"/>
</form>

        
<?php
if (isset($_POST['List'])) :?>

<?php
    $RoleCategory = $_POST['List'];
    $query= 'select * from view_cvs where roleCategoryId = '.$RoleCategory.' ';
 $sql = $pdo->prepare($query) ; 
 $sql->execute() ;
    ?>
   <table>
    <thead>
        <tr>
            <th>K Number</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>File Name</th>
            <th>Share Permission</th>
            <th>Role Category</th>
        </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php while( $row = $sql->fetch()) : ?>
        <?php $fileid = $row['id'];?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['k_number']; ?></td>
            <td><?php echo $row['forename']; ?></td>
            <td><?php echo $row['surname']; ?></td>
            <td><?php echo substr($row['FileName'],0,-5); ?></td>
            <td><?php echo $row['permission']; ?></td>
            <td><?php echo $row['roleName']; ?></td>
            <td><?php echo "<a href='DLScript.php?file=$fileid'> Download File </a>"; ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>  
<?php endif; ?>

       

    

        
 
    </body>
</html>

