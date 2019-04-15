<?php  

session_start();
//require 'connection.php';

//die($_SESSION['studentId']);

if (isset($_SESSION['student_id']))
{
	?>

		<!DOCTYPE html>
		<html>
		<head>
			<title>CV History</title>
		</head>
		<body>
		<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th> File Name </th>
		<th> Role Category </th>
		<th> Time Upload</th>
		<th> Permission </th>
		 
	</tr>
</thead>
<tbody>
	<?php
		include('connectionDiana.php');
		$query = 'SELECT cvs.pathName, cvs.timeUpload, cvs.permission, studentId, roleCategory.roleName FROM cvs, roleCategory WHERE roleCategory.roleCategoryId=cvs.roleCategoryId AND studentId ='.$_SESSION['studentId'];
		$result = $pdo->prepare($query);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo substr($row['pathName'], 7 , -5); ?></td>
		<td><?php echo $row['roleName']; ?></td>
		<td><?php echo $row['timeUpload']; ?></td>
		<td><?php echo $row['permission']; ?></td>

		
	</tr>
	<?php
		}
	?>
</tbody>
</table>
		
		</body>
		</html>

	<?php
}
else
{
	header("Location: studentLogin.php");
}


?>