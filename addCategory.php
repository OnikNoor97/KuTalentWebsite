<html>
<body>
<h1> Add a Role Category</h1>
<?php
require_once "connectionDiana.php";

if ( isset($_POST['role']))
{
	$sql = "INSERT INTO roleCategory (roleName) 
              VALUES (:roleName)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':roleName' => $_POST['role']));
		$message = 'Role Category Added Successfully!';
}	
?>	
		
<form action="addCategory.php" method="post">
 Add a new role category: <input type="text" name="role" /><br><br>
 <input type="submit" value="Add New"/>
</form>


<?php if (!empty($message)): ?>
              <p><?= $message ?> </p>
              <?php endif ?>
 




</body>
</html>
