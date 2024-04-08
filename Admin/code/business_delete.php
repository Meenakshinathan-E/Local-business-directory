<?php
include('../connection/connect.php');
if(isset($_GET['dele']))
    {
        
        $b_id=(int)$_GET['dele'];
        $qry="Select * from business where b_id=$b_id";
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_assoc ($res))
        {
            $ext=$row['image'];
        }
        $img=explode(",",$ext);
        
        $qry1="delete from business WHERE b_id=$b_id";
        $des=mysqli_query($con,$qry1);
        $num=mysqli_affected_rows($con);
        if($num>0)
        {
            for($i=0;$i<count($img)-1;$i++)  
            {
                $e=$img[$i];
                unlink("upload/".$b_id."/".$i.".".$e);
            }
            rmdir("upload/".$b_id);
            echo"<script>alert('Deleted Successfully');
            window.location.href='interface.php?view_business'</script>";
        }
                  
    }
    ?>