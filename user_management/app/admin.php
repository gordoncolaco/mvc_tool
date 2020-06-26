<?php

$adminobj = new Admin();
$roleobj = new Role();
$menu =  ${$sessionobj['user_code']."_role_array"};
if($action == 'view')
{
	$admins = $adminobj->getAllAdmin();
	$view_page = "manage_admin";
	include(_VIEW_PATH_."default.php");
}
else if($action == 'add')
{
	if(isset($post_variables['formAction']) && $post_variables['formAction'] == 'adminRegister')
	{
		$email = trim($post_variables['email']);
		$name = trim($post_variables['name']);
		$password = $post_variables['password'];
		$redirectto = $ctg.'/view';
		
		$role = "admin";
		$rolecode = $roleobj->getAllRolesByCode($role);

		$validation = true;
		if(strlen($name) == 0)
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Name is not valid";
			$validation = false;
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Email address is not valid";
			$validation = false;
		}
		else if(strlen($password) == 0)
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Password is not valid";
			$validation = false;
		}
		if(!$validation)
			Tools::redirectTo($redirectto);

		$passwd = md5($password);
		$register_fields = array('name' => $name,
								 'email' => $email,
								 'passwd' => $passwd,
								'id_user_role' => $rolecode
								);
								
		$register = $adminobj->register($register_fields);
		if($register == "success")
		{
			$redirectto = $ctg.'/view';
		}
		else
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "There was an issue while registering";
		}

		Tools::redirectTo($redirectto);
	}
	$view_page = "add_admin";
	include(_VIEW_PATH_."default.php");
}
else if($action == 'checkemail')
{
		$email = trim($post_variables['email']);
		$checkemail = $adminobj->checkemail($email);
		echo  $checkemail;
		die;
}
else if($action == 'logout')
{
	$sessionobj->destroy();
	$redirectto = $ctg.'/login';
	Tools::redirectTo($redirectto);
}
else
	Tools::redirectTo('404');
