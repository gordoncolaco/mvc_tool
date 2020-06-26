

<h3 class="page-heading mb-4">Welcome <?php echo $sessionobj['user_name']; ?> - Home Page</h3>
<p class="text-center"><a href="<?php echo Tools::getPageLink($ctg."/add"); ?>">Create new admin</a></p>
<table width=100%, border= 1>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
	</tr>
	<?php
	if(count($admins) > 0)
	{
		foreach($admins as $admin)
		{
			echo "<tr>";
		echo "<td>".$admin['name']."</td>";
		echo "<td>".$admin['email']."</td>";
		if($admin['status'] == 1)
			$status = "active";
		else
			$status = "inactive";
		echo "<td>".$status."</td>";
	echo "</tr>";
			
		}
		
	}
	else
		echo "<tr><td colspan= 3>No admin Found </td></tr>";
	?>
</table>