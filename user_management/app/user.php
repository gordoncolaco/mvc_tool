<?php

$userobj = new User();

if($action == 'login')
{
	if(isset($post_variables['formAction']) && $post_variables['formAction'] == 'userlogin')
	{
		$email = trim($post_variables['email']);
		$password = $post_variables['password'];
		$redirectto = $ctg.'/login';

		$validation = true;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
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

		$login_result = $userobj->login($email, $password);

		if($login_result == "success")
		{
			$redirectto = '';
		}
		else if($login_result == "inactive")
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Your account has been blocked";
		}
		else if($login_result == "passwordmismatch")
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Password you entered is incorrect";
		}
		else if($login_result == "usernotfound")
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "There is no user registered with this email";
		}
		else
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "Email address or password you entered is incorrect";
		}

		Tools::redirectTo($redirectto);
	}
	$view_page = "login";
	include(_VIEW_PATH_."login.php");
}
else if($action == 'register')
{
	if(isset($post_variables['formAction']) && $post_variables['formAction'] == 'userRegister')
	{
		$email = trim($post_variables['email']);
		$name = trim($post_variables['name']);
		$password = $post_variables['password'];
		$redirectto = $ctg.'/regsiter';

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
								'passwd' => $passwd
								);
								
		$login_result = $userobj->register($register_fields);
		if($login_result == "success")
		{
			$redirectto = $ctg.'/regsiter';
		}
		else
		{
			$sessionobj['msgtype'] = 'error';
			$sessionobj['msg'] = "There was an issue while registering";
		}

		Tools::redirectTo($redirectto);
	}
	$view_page = "register";
	include(_VIEW_PATH_."register.php");
}
else if($action == 'checkemail')
{
		$email = trim($post_variables['email']);
		$checkemail = $userobj->checkemail($email);
		echo  $checkemail;
		die;
}
else
	Tools::redirectTo('404');
