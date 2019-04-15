
<html>
<body>
 

<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th>  Category Number </th>
		<th> Category Name </th>
		 
	</tr>
</thead>
<tbody>
	<?php
		include('connectionDiana.php');
		$query = 'SELECT roleCategoryId, roleName FROM roleCategory';
		$result = $pdo->prepare($query);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['roleCategoryId']; ?></td>
		<td><?php echo $row['roleName']; ?></td>
		
		
	</tr>
	<?php
		}
	?>
</tbody>
</table>
</body>
</html>