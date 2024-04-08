<?php
include('../connection/connect.php');
if(isset($_GET['del']))
    {

        $c_id=(int)$_GET['del'];
        $qry1="delete from category WHERE c_id=$c_id";
        $des=mysqli_query($con,$qry1);
        $num=mysqli_affected_rows($con);
        if($num>0)
        {
            
            echo"<script>alert('Deleted Successfully');
            window.location.href='interface.php?view_category'</script>";
        }
                  
    }
    ?>