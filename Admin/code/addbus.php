<?php
$usererr='';
$f=1;
 include('../connection/connect.php');
 if(isset($_POST['sub']))
 {

    $name=$_POST['uname'];
    $qry="Select u_id from user where username='$name'";
    $res=mysqli_query($con,$qry);
    while($row=mysqli_fetch_row($res))
    {
        $id=$row[0];
    }
    session_start();
    $_SESSION['u_id']=$id;
    header("location:business.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Verification</title>
    <link rel="stylesheet" type="text/css" href="../style/addbus.css"></link>
</head>
<body>
<div class="container">
    <form id="form" method="POST" action="">
        <h1>User Insertion</h1>
        <div class="input-control">
            <label for="bn">User :</label>
                <datalist id='val' >
                  <?php   
                 
                     $qry="Select * from user";
                     $res=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_row($res))
                          echo"<option value='$row[1]'></option>  ";     
         
                   ?>    
                </datalist>
            <input id="bn" list='val' name='uname' autocomplete="off" required>
        </div>
            <button type="submit" name='sub'>Submit</button>
    </form>
</body>
</html>