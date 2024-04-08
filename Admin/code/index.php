<?php
if(isset($_POST['sub']))
{
	$email=$_POST['email'];
	$pas=$_POST['pas'];
	$emailerr=$paserr="";
	$f=1;
	if(isset($_POST['email']))
	{
		if(empty($_POST['email']))
		{
			$f=0;
			$emailerr="*Fill this";
		}
		else
		{
			$pattern=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
			if(!$pattern)
		    {
			   $f=0;
			    $emailerr="Invalid";
		    }
		}
		
	}
	if(isset($_POST['pas']))
	{
		if(empty($_POST['pas']))
		{
			$f=0;
			$paserr="*Fill this";
		}
		else
		{
			$pattern="/^[A-Z][A-Z a-z 0-9]+/";
			$check=preg_match_all($pattern,$_POST['pas']);
			if(!$check)
		    {
			   $f=0;
			  $paserr="Invalid";
		    }
		}
	}
	
	if($f=1)
	{
		if($_POST['email']=="admin@gmail.com" AND $_POST['pas']=="Admin123")
		    header("location:interface.php");
	
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>The Login Form</title>
<link rel="stylesheet" type="text/css" href="../style/login.css"></link>
</head>
<body>
	<div class="wrap">
		<form class="login-form" action="" method="POST">
			<div class="form-header">
				<h3>Login Form</h3>
			</div>
			<div class="form-group">
				Email:
				<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" class="form-input" placeholder="email">
				<span class="err"><?php if(isset($_POST['email']) )echo"$emailerr"; ?></span>
			</div>
			<div class="form-group">
				Password:
				<input type="password" name="pas" class="form-input" placeholder="password" value="<?php if(isset($_POST['pas'])) echo $_POST['pas'];?>" >
				<span class="err"><?php if(isset($_POST['pas'])) echo"$paserr"; ?></span>
			</div>
			<div class="form-group">
				<button class="form-button" name='sub' >Login</button>
			</div>
			</form>
		</div>
</body>
<script>
	if(window.history.replaceState)
	  window.history.replaceState(null,null,window.location.history);
</script>
</html>

