<html>
<head>
   <link rel="stylesheet"  href="../style/interface.css"></link>
   <style>
      body
      {
        background-color: cyan;
      }
    </style>
</head>
<?php
 include('../connection/connect.php');
session_start();
$id=$_SESSION['u_id'];
$qry="Select * from payment  where u_id=$id";
$res=mysqli_query($con,$qry);
$num=mysqli_num_rows($res);
if($num>0)
   header("location:business.php");
else
{
    echo"<body>";
    echo "<div class='alert'>
                <div class='a'><h2>To add your business you need to Pay</h2></div>
                <div class='b'>
                  <a href='pay.php'>Payment</a>
                  <a href='index.php'>Cancel</a>
                </div>
          </div>";
    echo"</body>";
    
   

}
 
?>