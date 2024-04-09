<?php   
$emailerr=$paserr="";
$f=1;
 if(isset($_POST['sub']))
 {
	
	if(isset($_POST['email']))
	{
		
	  	 if(empty($_POST['email']))
	      {
            $f=0;
	  	    $emailerr="This field is required";
	      }
	      else
	      {
	  	   $pattern=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
	  	   if(!$pattern)
		   {
			$f=0;
	  	   $emailerr="Inavalid format";
		   }
	     }
	}
	
	if(isset($_POST['pas']))
	{
		if(empty($_POST['pas']))
	   {
        $f=0;
		$paserr="This field is required";
	   }
	   else
	   {
		$pattern="/^[A-Z][A-z a-z 0-9]+/";
		$check=preg_match_all($pattern,$_POST['pas']);
        if(!$check)
		{
			$f=0;
		    $paserr="Inavalid format";
		}
	   }
	}
	if($f)
	{
		$mail=$_POST['email'];
        $pas=$_POST['pas'];
		include('../connection/connect.php');
		$qry="Select * from user where email='$mail' AND password='$pas'";
		$res=mysqli_query($con,$qry);
		if(mysqli_num_rows($res) == 1){
		  session_start();
		  $qry="Select * from user where email='$mail' AND password='$pas'";
		  $res=mysqli_query($con,$qry);
		  while($row=mysqli_fetch_assoc($res))
             {
                 $id=$row['username'];
				 $uid=$row['u_id'];
			 }
		 
		$_SESSION['user']=$id;
        $_SESSION['u_id']=$uid;
		header('location:index.php');
		}
		else if(mysqli_num_rows($res) == 0)
		  {
			echo"<script>alert('Username or password incorrect')</script>";
		  }
	}
	

 }
?>
<html>
   <head>
       <title>Login form</title>
	   <link rel="stylesheet" type="text/css" href="../style/log.css"></link>
	   
	   <script>
		   if(window.history.replaceState)
		       window.history.replaceState(null,null,window.location.href);
	   </script>
   </head>
   <body>
      <div class="wrap">
	     <form class="login-form" action="" method="POST">
				<div class="form-header">
					<h3>Login Form</h3>
				</div>
				<div class="form-group">
					<input type="text" class="form-input" placeholder="email" id='email'name='email' value="<?php  if(isset($_POST['email'])) echo $_POST['email'];?>" autofocus>
					<span class="err"><?php echo"$emailerr" ?></span>
				</div>
				<div class="form-group">
					<input type="text" class="form-input" placeholder="password" name='pas'  value="<?php  if(isset($_POST['pas'])) echo $_POST['pas'];?>">
					<span class="err"><?php echo"$paserr" ?></span>
				</div>
				<div class="form-group">
					<button type="submit" class="form-button" name='sub'>Login</button>
				</div>
				<div class="form-footer">
				   <p>Don't have an account</p><a href="signup.php">Sign up</a>
				</div>
		 </form>
	  </div>
   </body>
   <!-- <script src="../script/login.js"></script> -->
<html>
