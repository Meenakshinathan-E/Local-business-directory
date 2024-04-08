<?php
include('../connection/connect.php');
if(isset($_GET['id']))
    {

        $id=(int)$_GET['id'];
        $qry1="update business set status='Verified' WHERE b_id=$id";
        $des=mysqli_query($con,$qry1);
        $num=mysqli_affected_rows($con);
        if($num>0)
        {
            
            echo"<script>alert('Verified Successfully');
            window.location.href='interface.php?view_business'</script>";
        }
                  
    }
    ?>