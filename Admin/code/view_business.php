<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php
    include('../connection/connect.php');
    if($con)
    {   
        $qry="select * from business where status='Verified'";
        $res=mysqli_query($con,$qry);
        $num=mysqli_num_rows($res);
        if($num==0)
            echo"No data";
        else
        {
            echo "<table class='table table-hover table-striped' style='width:50vw'>";
            echo "<tr><th>Contact Person</th><th>Business ID</th>
            <th colspan='3' style='text-align:center'>ACTIONS</th></tr>";
            while($row=mysqli_fetch_row($res))
            {  
                $id=$row[0];
                echo "<tr>
                <td>$row[3]</td>
                <td>$row[0]</td>
                <td ><a class='btn btn-danger'href='business_delete.php?dele=$id'>Delete</a></td>
                <td><a class='btn btn-success' href='businessupdate.php?id=$id'>Update</a></td>
                <td><a class='btn btn-warning' href='viewmore.php?id=$id'>view more</a></td>
                </tr>";
               
            }
            echo "</table>";
            echo "<br>";
        }
    }
?>
</body>
</html>