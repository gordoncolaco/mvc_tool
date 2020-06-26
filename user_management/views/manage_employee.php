

<h3 class="page-heading mb-4">Welcome <?php echo $sessionobj['user_name']; ?> - User Page</h3>
<?php
	if($sessionobj['user_code'] == "admin")
	{
		?>
		<p class="text-center"><a href="<?php echo Tools::getPageLink($ctg."/add"); ?>">Create new User</a></p>
	<?php
	}
?>
<table width=100%, border= 1>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
	</tr>
	<?php

	if(count($employees) > 0)
	{
		foreach($employees as $employee)
		{
			echo "<tr>";
		echo "<td>".$employee['name']."</td>";
		echo "<td>".$employee['email']."</td>";
		if($employee['status'] == 1)
			$status = "active";
		else
			$status = "inactive";
		echo "<td>".$status."</td>";
		echo "</tr>";
			
		}
		
	}
	else
		echo "<tr><td colspan= 3>No employee Found </td></tr>";
	?>
</table>