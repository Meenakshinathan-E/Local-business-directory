<?php
$emailerr=$paserr=$fnameerr=$lnameerr=$unameerr=$confirmerr="";
$f=1;
if(isset($_POST['sub']))
{
	if(isset($_POST['fname']))
	{
		if(empty($_POST['fname']))
		{
			
			$f=0;
			$fnameerr="*This Field is required";
		}
		else
		{
			$pattern="/^[A-Z][A-Z a-z]+$/";
			$check=preg_match_all($pattern,$_POST['fname']);
			if(!$check)
		    {
			   $f=0;
			    $fnameerr="Invalid format";
		    }
		}
	}
	if(isset($_POST['lname']))
	{
		if(empty($_POST['lname']))
		{
			$f=0;
			$lnameerr="*This field is required";
		}
		else
		{
			$pattern="/^[A-Z a-z]+/";
			$check=preg_match_all($pattern,$_POST['lname']);
			if(!$check)
		    {
			   $f=0;
			   $lnameerr="Invalid format";
		    }
		}
	}
	if(isset($_POST['uname']))
	{
		if(empty($_POST['uname']))
		{
			$f=0;
			$unameerr="*This Field is required";
		}
		else
		{
			$pattern="/^[A-Z][A-Z a-z]+/";
			$check=preg_match_all($pattern,$_POST['uname']);
			if(!$check)
		    {
			   $f=0;
			   $unameerr="Invalid format";
		    }
		}
	}
	if(isset($_POST['email']))
	{
		if(empty($_POST['email']))
		{
			$f=0;
			$emailerr="*This Field is required";
		}
		else
		{
			
			$check=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
			if(!$check)
		    {
			   $f=0;
			   $emailerr="Invalid format";
		    }
		}
	}
	if(isset($_POST['pas']))
	{
		
		if(empty($_POST['pas']))
		{
			$f=0;
			$paserr="*This Field is required";
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
	if(isset($_POST['confirm']))
	{
		if(empty($_POST['confirm']))
		{
			$f=0;
			$confirmerr="*This field is required";
		}
		else
		{
			if(isset($_POST['pas']))
			{
				if(!($_POST['pas']==$_POST['confirm']))
		        {
			       $f=0;
			       $confirmerr="Password mismatch";
		        }
			}
		}
	}
	if($f)
	{
		include('../connection/connect.php');
		if($con)
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$uname=$_POST['uname'];
			$email=$_POST['email'];
			$pas=$_POST['pas'];
			$qry="insert into user(username,email,password,fname,lname) values('$uname','$email','$pas','$fname','$lname')";
			$res=mysqli_query($con,$qry);
			if($res==FALSE)
			  {
				echo"<script>alert('Error')</script>";
			  }
			else
			{
				echo"<script>alert('Inserted Successfully');
				window.location.href='interface.php?view_user'</script>";
			}
			
		}
	}
}
if(isset($_GET['id']))
?>
<!DOCTYPE html>
<html>
<head>
<title>The Login Form</title>

<link rel="stylesheet" type="text/css" href="../style/signup.css"></link>

</head>
<body>
	<div class="wrap">
		<form class="login-form" action="" method="POST">
			<div class="form-header">
				<h3>Add User</h3>
			</div>
			<div class="form-group">
				First Name:
				<input type="text" class="form-input" placeholder="First name" name='fname'value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
				<span class='err'><?php if(isset($_POST['fname'])) echo "$fnameerr"  ?></span>
			</div>
			<div class="form-group">
				Last Name:
				<input type="text" class="form-input" placeholder="Last Name" name='lname'value="<?php if(isset($_POST['lname'])) echo $_POST['lname'];?>">
				<span class='err'><?php if(isset($_POST['lname'])) echo "$lnameerr"?></span>
			</div>
			<div class="form-group">
				User Name:
				<input type="text" class="form-input" placeholder="User Name" name='uname'value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>">
				<span class='err'><?php if(isset($_POST['uname'])) echo "$unameerr"?></span>
			</div>
			<div class="form-group">
				Email:
				<input type="text" class="form-input" placeholder="email" name='email'value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" >
				<span class='err'><?php if(isset($_POST['email'])) echo "$emailerr"?></span>
			</div>
			<div class="form-group">
				Password:
				<input type="text" class="form-input" placeholder="password" name='pas'value="<?php if(isset($_POST['pas'])) echo $_POST['pas'];?>">
				<span class='err'><?php if(isset($_POST['pas'])) echo "$paserr"?></span>
			</div>
			<div class="form-group">
				Confirm Password:
				<input type="text" class="form-input" placeholder="confirmpassword" name='confirm'value="<?php if(isset($_POST['confirm'])) echo $_POST['confirm'];?>">
				<span class='err'><?php if(isset($_POST['confirm'])) echo "$confirmerr"?></span>
			</div>
			<div class="form group">
				<button class="form-button" type="submit" name='sub'>Add</button>
			</div>
			</form>
		</div>
</body>
</html>
<script>
	if(window.history.replaceState)
	  window.history.replaceState(null,null,window.location.history);
</script>

