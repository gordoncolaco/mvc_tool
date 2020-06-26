
<p class="text-center"><a href="<?php echo Tools::getPageLink($ctg."/add"); ?>">Create new Role</a></p>
<table width=100%, border= 1>
	<tr>
		<th>Role Name</th>
		<th>Role Code</th>
	</tr>
	<?php
	if(count($roles) > 0)
	{
		foreach($roles as $role)
		{
			echo "<tr>";
		echo "<td>".$role['name']."</td>";
		echo "<td>".$role['code']."</td>";
	echo "</tr>";
			
		}
		
	}
	else
		echo "<tr><td colspan= 2>No roles found </td></tr>";
	?>
</table>