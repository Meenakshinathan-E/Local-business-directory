<?php
include('../connection/connect.php');
session_start();
$bnameerr=$nameerr=$mobileerr=$pinerr=$cityerr='';
$f=1;
if(isset($_GET['id']))
{
	$id=(int)$_GET['id'];
    $qry="select * from business WHERE b_id=$id";
    $sel=mysqli_query($con,$qry);
    while($row=mysqli_fetch_row($sel))
    {
	    $u_id=$row[1];
		$_SESSION["u_id"]=$u_id;
        $bname=$row[2];
		$name=$row[3];
		$mobile=$row[4];
		$pin=$row[5];
		$city=$row[6];
	}      
}
 if(isset($_POST['sub']))
 {
	if(isset($_POST['bname']))
	{
		if(empty($_POST['bname']))
	   {
        $f=0;
		$bnameerr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[A-Z][A-z a-z]+$/";
		$check=preg_match_all($pattern,$_POST['bname']);
		
        if(!$check)
		{
			
			$f=0;
		    $bnameerr="Inavalid format";
		}
	   }
	}
	if(isset($_POST['name']))
	{
		if(empty($_POST['name']))
	   {
        $f=0;
		$nameerr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[A-Z a-z]+/";
		$check=preg_match_all($pattern,$_POST['name']);
        if(!$check)
		{
			$f=0;
		    $nameerr="Inavalid format";
		}
	   }
	}
	if(isset($_POST['mobile']))
	{
		if(empty($_POST['mobile']))
	   {
        $f=0;
		$mobileerr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[0-9]{10}$/";
		$check=preg_match_all($pattern,$_POST['mobile']);
        if(!$check)
		{
			$f=0;
		    $mobileerr="Inavalid format";
		}
	   }
	}
    if(isset($_POST['pin']))
	{
		if(empty($_POST['pin']))
	   {
        $f=0;
		$pinerr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[0-9]{6}$/";
		$check=preg_match_all($pattern,$_POST['pin']);
        if(!$check)
		{
			$f=0;
		    $pinerr="Inavalid format";
		}
	   }
	}
    if(isset($_POST['city']))
	{
		if(empty($_POST['city']))
	   {
        $f=0;
		$cityerr="*This field is required";
	   }
	   else
	   {
		$pattern="/[A-Z][a-z]+/";
		$check=preg_match_all($pattern,$_POST['city']);
        if(!$check)
		{
			$f=0;
		    $cityerr="Inavalid format";
		}
	   }
	}
	if($f)
	{
		if($con)
		{
			$id=$_POST['id'];
			$bname=$_POST['bname'];
			$name=$_POST['name'];
			$mobile=$_POST['mobile'];
			$pin=$_POST['pin'];
			$city=$_POST['city'];
		     $_SESSION["bname"]=$_POST["bname"];
		     $_SESSION["name"]=$_POST["name"];
		     $_SESSION["mobile"]=$_POST["mobile"];
		     $_SESSION["pin"]=$_POST["pin"];
		     $_SESSION["city"]=$_POST["city"];
		     header("location:updatedescription.php?id=$id");
			
	}	
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Business</title>
    <link rel="stylesheet" type="text/css" href="../style/business.css"></link>
</head>
<body>
   
   
    <div class="container">
        <form action="" id="form" method="POST">
            <h1>Register</h1>
            <div class="input-control">
                <label for="bn">Business name</label>
                <input type="text" id="bn"name="bname" value="<?php echo $bname;?>">
                <div class="error"><?php echo $bnameerr ;?></div>
            </div>
			<input type='hidden' name='id' value="<?php echo $id ?>">
            <div class="input-control">
                <label for="name">Contact Person</label>
                <input type="text" id="name"name="name" value="<?php echo $name;?>">
                <div class="error"><?php echo $nameerr ;?></div>
            </div>
            <div class="input-control">
                <label for="mn">Mobile Number</label>
                <input type="text" id="mn"name="mobile" value="<?php  echo $mobile?>">
                <div class="error"><?php echo $mobileerr ;?></div>
            </div>
            <div class="input-control">
                <label for="pin">Pincode</label>
                <input type="text" id="pin"name="pin" value="<?php  echo $pin?>">
                <div class="error"><?php echo $pinerr ;?></div>
            </div>
            <div class="input-control">
                <label for="city">City</label>
                <input type="text" id="city"name="city" value="<?php echo $city?>">
                <div class="error"><?php echo $cityerr ;?></div>
            </div>
            <button type="submit" name='sub'>Next</button>
        </form>
    </div>
</body>
</html>