<?php
$fnameerr=$lnameerr=$unameerr=$emailerr=$paserr=$confirmerr="";
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
			$emailerr="*Fill this";
		}
		else
		{
			$pattern=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
			if(!$check)
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
	if($f==1)
	{
		include('../connection/connect.php');
		if($con)
		{
		   $fname=$_POST['fname'];
	       $lname=$_POST['lname'];
	       $uname=$_POST['uname'];
	       $email=$_POST['email'];
	       $pas=$_POST['pas'];
	       $confirm=$_POST['confirm'];
		   $qry="insert into user values('$uname','$email','$pas','$fname','$lname')";
           $res=mysqli_query($con,$qry);
           if($res)
		   {
			   echo"<script>alert('Inserted Successfully')</script>";
			   header("location:interface.php");
		   }
	   }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>The signing Form</title>

<link rel="stylesheet" type="text/css" href="../style/signup.css"></link>

</head>
<body>
	<div class="wrap">
		<form class="login-form"action=""method="POST">
			<div class="form-header">
				<h3>ADD USER</h3>
			</div>
			<div class="form-group">
				First Name:
				<input type="text" class="form-input" placeholder="First name" name='fname'>
				<span class='err'><?php if(isset($_POST['fname'])) echo "$fnameerr"  ?></span>
			</div>
			<div class="form-group">
				Last Name:
				<input type="text" class="form-input" placeholder="Last Name" name='lname'>
				<span class='err'><?php if(isset($_POST['lname'])) echo "$lnameerr"?></span>
			</div>
			<div class="form-group">
				User Name:
				<input type="text" class="form-input" placeholder="User Name" name='uname'>
				<span class='err'><?php if(isset($_POST['uname'])) echo "$unameerr"?></span>
			</div>
			<div class="form-group">
				Email:
				<input type="text" class="form-input" placeholder="email" name='email'>
				<span class='err'><?php if(isset($_POST['email'])) echo "$emailerr"?></span>
			</div>
			<div class="form-group">
				Password:
				<input type="text" class="form-input" placeholder="password" name='pas'>
				<span class='err'><?php if(isset($_POST['pas'])) echo "$paserr"?></span>
			</div>
			<div class="form-group">
				Confirm Password:
				<input type="text" class="form-input" placeholder="confirmpassword" name='confirm'>
				<span class='err'><?php if(isset($_POST['confirm'])) echo "$confirmerr"?></span>
			</div>
			<div class="form group">
				<button class="form-button" name="sub"type="submit">Login </button>
			</div>
			
			</form>
		</div>
</body>
</html>

