<?php 
    include('../common_functions/function.php');
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../style/interface.css"></link>
    <title>Document</title>
</head>
<body>
    <header>Mn Business</header>
    <div class="nav1">
        <div class="nav">
            <a href="index.php">Home</a>
        </div>
        <div class="nav">
            <a href="#contact">Contact</a>
        </div>

        <div class="nav">
                   <?php
                if(isset($_SESSION['u_id']))
                {
                   echo $_SESSION['user'];
                   echo "<a href='out.php?id=f'>Log out</a>";
                   echo "<a href='business.php'>Add You business</a>";
                }
                    
                 else
                 {
                     echo "guest";
                     echo "<a href='out.php?id=t'>Log in</a><br><br><br>";
                     
                     
                 }
                 ?>
         </div>
         
    </div>
    <div class="body">
            <?php
                   $qry="Select * from category ";
                   $res=mysqli_query($con,$qry);
                   echo"<div class='catg'>";
                   while($row=mysqli_fetch_array($res))
                   {
                         echo"<a href='index.php?c_id=$row[c_id]'>$row[c_name]</a>";
                   }
                   echo"</div>";
            ?>
         </div>
 </body>
 </html>