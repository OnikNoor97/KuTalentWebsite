<html>
<body>
 

<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th>  Name </th>
		<th> Surname </th>
		 <th> Email </th>
		 <th> Cv File </th>
		 <th> Download </th>
	</tr>
</thead>
<tbody>
	<?php
		include('connectionDiana.php');
		$query = 'SELECT student.forename, student.surname, student.email, cvs.pathName, cvs.permission FROM cvs INNER JOIN student ON cvs.studentId=student.studentId ';
		$result = $pdo->prepare($query);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		
		<td><?php echo $row['forename']; ?></td>
		<td><?php echo $row['surname']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['pathName']; ?></td>
	    <td><?php echo ?> <a href="download.php?dow=$filePath">download</a>?></td>
		
		
	</tr>
	<?php
		}
	?>
</tbody>
</table>
</body>
</html>