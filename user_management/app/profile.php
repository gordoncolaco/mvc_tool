<?php

$employeeobj = new Employee();
$menu =  ${$sessionobj['user_code']."_role_array"};
$user = $employeeobj->getUserbyId($sessionobj['user_id']);


if($action == 'view')
{
	$view_page = "profile";
	include(_VIEW_PATH_."default.php");
}
else if($action == 'update')
{
	if(isset($post_variables['formAction']) && $post_variables['formAction'] == 'updateProfile')
		{
			$name = trim($post_variables['name']);
			$password = $post_variables['password'];
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
				
			$register_fields = array('name' => $name
									);
									
			if(strlen($password) != 0)
			{
				$passwd = md5($password);
				$register_fields['passwd'] = $passwd;
			}
			
			$register = $employeeobj->update($register_fields,$sessionobj['user_id']);
			if($register == "success")
			{
				$redirectto = $ctg.'/view';
			}
			else
			{
				$sessionobj['msgtype'] = 'error';
				$sessionobj['msg'] = "There was an issue while updating";
			}
		}
		
		$view_page = "profile";
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
