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
    <form id="loginform" action="<?php echo Tools::getPageLink($ctg."/register"); ?>" method="post" name="login" onsubmit="return false" autocomplete="off" class="form_section">
        <h2 class="text-center">Register</h2>      
		<div class="form-group">
			<input type="text" class="form-control" name="name" value="" placeholder="Name" />
        </div>
        <div class="form-group">
			<input type="text" class="form-control" id ="email" name="email" value="" placeholder="Email Address" onblur="checkemail();" /><span id="email_status"></span>
        </div>
        <div class="form-group">
			<input type="password" class="form-control" name="password" value="" placeholder="Password" />
        </div>
        <div class="form-group">
			<input type="button" id="button" onclick="return userRegister()" value="Register" class="btn btn-primary btn-block" >
        </div>   
		<div class='errormsg errormsg_bg'><span class='<?php echo $sessionMsgtype?>'><?php echo $sessionMsg; ?></span></div>
		<input type="hidden" name="formAction" value="userRegister" />
    </form>
	<p class="text-center"><a href="<?php echo Tools::getPageLink($ctg."/login"); ?>">Back to Login</a></p>
</div>

	<script>
	
	function checkemail()
	{
	 var email=document.getElementById( "email" ).value;
		url = "<?php echo $ctg.'/checkemail';?>";
	 if(email)
	 {
		  $.ajax({
		  type: 'post',
		  url: url,
		  data: {
		   email:email,
		  },
		  success: function (response) {
			  alert(response);
			  
		   
		   if(response=="success")	
		   {
			   $( '#email_status' ).html(response);
			   document.getElementById("button").disabled = false;
			return true;	
		   }
		   else
		   {
			   $( '#email_status' ).html(response);
			   document.getElementById("button").disabled = true;
			return false;	
		   }
		  }
		  });
		 }
		 else
		 {
		  $( '#email_status' ).html("");
		  return false;
		}
	}


	function userRegister()
	{
		var frm = document.forms["login"];
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,10})$/;
		var emailaddress = frm.email.value.trim();

		if(frm.name.value.trim() == "")
		{
			$('.errormsg').html('Please enter your name');
			frm.email.focus();
			return false;
		}
		else if(emailaddress == "")
		{
			$('.errormsg').html('Please enter email address');
			frm.email.focus();
			return false;
		}
		else if(reg.test(emailaddress) == false)
		{
			$('.errormsg').html('Please enter a valid email address')
			frm.email.focus();
			return false;
		}
		else if(frm.password.value.trim() == "")
		{
			$('.errormsg').html('Please enter your password');
			frm.password.focus();
			return false;
		}
		else
			frm.submit();
	}
	</script>

</body>
</html>
