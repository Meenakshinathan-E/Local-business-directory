<?php
include('../connection/connect.php');
$emailerr=$paserr=$fnameerr=$lnameerr=$unameerr=$confirmerr="";
$f=1;
if(isset($_GET['id']))
	{
	    $id=(int)$_GET['id'];
        $qry="select * from user WHERE u_id=$id";
        $sel=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($sel))
        {
           $id=$row[0];
		   $un=$row[1];
		   $em=$row[2];
		   $pas=$row[3];
		   $fn=$row[4];
		   $ln=$row[5];
		}
             
	}
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
		if($con)
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$uname=$_POST['uname'];
			$email=$_POST['email'];
			$pas=$_POST['pas'];
			$qry="update user set username='$uname',email='$email',password='$pas',fname='$fname',lname='$lname' where u_id=$id";
			$res=mysqli_query($con,$qry);
			if($res==FALSE)
			  {
				echo"<script>alert('Error')</script>";
			  }
			else
			{
				echo"<script>alert('updated Successfully');
				window.location.href='interface.php?view_user'</script>";
			}	
		}
	}	
}
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
				<h3>Update USER Detail</h3>
			</div>
			<div class="form-group">
				First Name:
				<input type="text" class="form-input" placeholder="First name" name='fname'value="<?php echo $fn;?>">
				<span class='err'><?php if(isset($_POST['fname'])) echo "$fnameerr"  ?></span>
			</div>
			<div class="form-group">
				Last Name:
				<input type="text" class="form-input" placeholder="Last Name" name='lname'value="<?php echo $ln;?>">
				<span class='err'><?php if(isset($_POST['lname'])) echo "$lnameerr"?></span>
			</div>
			<div class="form-group">
				User Name:
				<input type="text" class="form-input" placeholder="User Name" name='uname'value="<?php echo $un;?>">
				<span class='err'><?php if(isset($_POST['uname'])) echo "$unameerr"?></span>
			</div>
			<div class="form-group">
				Email:
				<input type="text" class="form-input" placeholder="email" name='email'value="<?php echo $em;?>">
				<span class='err'><?php if(isset($_POST['email'])) echo "$emailerr"?></span>
			</div>
			<div class="form-group">
				Password:
				<input type="text" class="form-input" placeholder="password" name='pas'value="<?php echo $pas;?>">
				<span class='err'><?php if(isset($_POST['pas'])) echo "$paserr"?></span>
			</div>
			<div class="form-group">
				Confirm Password:
				<input type="text" class="form-input" placeholder="confirmpassword" name='confirm'value="<?php echo $pas;?>">
				<span class='err'><?php if(isset($_POST['confirm'])) echo "$confirmerr"?></span>
			</div>
			<div class="form group">
				<button class="form-button" type="submit" name='sub'>Update </button>
			</div>
			
			</form>
		</div>
</body>
</html>

