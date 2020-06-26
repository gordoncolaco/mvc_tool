<?php

$roleobj = new Role();
$menu =  ${$sessionobj['user_code']."_role_array"};
if($action == 'view')
{
	$roles = $roleobj->getAllRoles();
	$view_page = "manage_role";
	include(_VIEW_PATH_."default.php");
}
else if($action == 'add')
{
	if(isset($post_variables['formAction']) && $post_variables['formAction'] == 'addrole')
	{
		$name = trim($post_variables['name']);
		$redirectto = $ctg.'/view';
	
		$validation = true;
		if(strlen($name) == 0)
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Name is not valid";
			$validation = false;
		}
		if(!$validation)
			Tools::redirectTo($redirectto);

		$code = strtolower(str_replace(' ', '', $name));
		$role_fields = array('name' => $name,
								 'code' => $code,
								 
								);
								
		$register = $roleobj->addRole($role_fields);
		if($register == "success")
		{
			$redirectto = $ctg.'/view';
		}
		else
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "There was an issue while adding the role";
		}

		Tools::redirectTo($redirectto);
	}
	$view_page = "add_role";
	include(_VIEW_PATH_."default.php");
}

else if($action == 'logout')
{
	$sessionobj->destroy();
	$redirectto = $ctg.'/login';
	Tools::redirectTo($redirectto);
}
else
	Tools::redirectTo('404');
