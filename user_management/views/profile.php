

<h3 class="page-heading mb-4">Welcome <?php echo $sessionobj['user_name']; ?> - Edit Profile</h3>

<?php
$sessionMsg = $sessionobj['msg'];
$sessionMsgtype = $sessionobj['msgtype'];

$sessionobj['msg'] = '';
$sessionobj['msgtype'] = '';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo _SITE_NAME_; ?></title>
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<base href="<?php echo _WEB_PATH_; ?>">

	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<script src="<?php echo _VIEW_WEB_PATH_; ?>js/jquery-1.10.2.min.js"></script>
<!-- css -->
	
	<style>
	body{background-color: #F2F7F8 !important;}
	.login-form {
		width: 340px !important;;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
	.errormsg{
		color:red;
	}
	</style>
</head>
<body>

	<div class="login-form">
    <form id="loginform" action="<?php echo Tools::getPageLink($ctg."/update"); ?>" method="post" name="register" onsubmit="return false" autocomplete="off" class="form_section">
        <h2 class="text-center">Update Profile</h2>      
		<div class="form-group">
			<input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" placeholder="Name" />
        </div>
        <div class="form-group">
			<input type="text" class="form-control" id ="email" name="email" value="<?php echo $user['email']; ?>" disabled />
        </div>
        <div class="form-group">
			<input type="password" class="form-control" name="password" value="" placeholder="Password" />
			Leave Blank if you do not want to change password
        </div>
        <div class="form-group">
			<input type="button" id="button" onclick="return userRegister()" value="Register" class="btn btn-primary btn-block" >
        </div>   
		<div class='errormsg errormsg_bg'><span class='<?php echo $sessionMsgtype?>'><?php echo $sessionMsg; ?></span></div>
		<input type="hidden" name="formAction" value="updateProfile" />
    </form>
</div>
<!--   -->
	<script>
	
	function userRegister()
	{
		var frm = document.forms["register"];

		if(frm.name.value.trim() == "")
		{
			$('.errormsg').html('Please enter your name');
			frm.name.focus();
			return false;
		}
		else
			frm.submit();
	}
	</script>

</body>
</html>

