<?php
   include('../connection/connect.php');
   $cnerr=$cvverr=$ederr=$amterr='';
   $f=1;
 if(isset($_POST['sub']))
 {
	if(isset($_POST['cn']))
	{
		if(empty($_POST['cn']))
	   {
        $f=0;
		$cnerr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[0-9]{16}+$/";
		$check=preg_match_all($pattern,$_POST['cn']);
		
        if(!$check)
		{
			
			$f=0;
		    $cnerr="Inavalid format";
		}
	   }
	}

    if(isset($_POST['cvv']))
	{
		if(empty($_POST['cvv']))
	   {
        $f=0;
		$cvverr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[0-9]{3}$/";
		$check=preg_match_all($pattern,$_POST['cvv']);
		
        if(!$check)
		{
			
			$f=0;
		    $cvverr="Inavalid format11";
		}
	   }
	}
    if(isset($_POST['ed']))
	{
		if(empty($_POST['ed']))
	   {
        $f=0;
		$ederr="*This field is required";
	   }
	   else
	   {
		$pattern="/^[0-9]{2}\/[0-9]{2}$/";
		$check=preg_match_all($pattern,$_POST['ed']);
		
        if(!$check)
		{
			
			$f=0;
		    $ederr="Inavalid format";
		}
	   }
	}
    if(isset($_POST['amt']))
	{
		if(empty($_POST['amt']))
	   {
        $f=0;
		$amterr="*This field is required";
	   }
       else
	   {
		
		
        if($_POST['amt']!=500)
		{
			
			$f=0;
		    $amterr="Amount should be 500";
		}
	   }
	   
	   }
	
    if($f)
    {
        session_start();
        $id=$_SESSION['u_id'];
        $qry1="Insert into payment values($id,'Paid')";
        $r=mysqli_query($con,$qry1);
        if($r)
        {
            echo"<script>alert('Payment successful')
            window.location.href='business.php'</script>";
        }
       
        else
           echo"<script>alert('Error in payment')</script>";
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
            <h1>Payment</h1>
            <div class="input-control">
                <label for="bn">Card number</label>
                <input type="text" id="bn"name="cn" value="<?php  if(isset($_POST['cn'])) echo $_POST['cn'];?>">
                <div class="error"><?php echo $cnerr ;?></div>
            </div>
            <div class="input-control">
                <label for="name">CVV</label>
                <input type="text" id="name"name="cvv" value="<?php  if(isset($_POST['cvv'])) echo $_POST['cvv'];?>">
                <div class="error"><?php echo $cvverr ;?></div>
            </div>
            <div class="input-control">
                <label for="mn">Expiry date</label>
                <input type="text" id="mn"name="ed" placeholder="MM/YY" value="<?php  if(isset($_POST['ed'])) echo $_POST['ed'];?>">
                <div class="error"><?php echo $ederr ;?></div>
            </div>
            <div class="input-control">
                <label for="amt">Amount</label>
                <input type="number" id="amt"name="amt" placeholder="Pay rupees" value="<?php  if(isset($_POST['amt'])) echo $_POST['amt'];?>" >
                <div class="error"><?php echo $amterr ;?></div>
            </div>
            
            
            <button type="submit" name='sub'>Next</button>
        </form>
    </div>
</body>
</html>