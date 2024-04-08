<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <?php
    include('../connection/connect.php');
    if($con)
    {
        $qry="select*from user";
        $res=mysqli_query($con,$qry);
        $num=mysqli_num_rows($res);
        if($num==0)
            echo"No data";
        else
        {
            
            echo "<table class='table table-hover table-striped' style='width:50vw'>";
            echo "<tr><th>User ID</th><th>User name</th><th>Email</th>
            <th colspan='2'>ACTIONS</th></tr>";
            while($row=mysqli_fetch_row($res))
            {
                $id=$row[0];
                echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td><a class='btn btn-success' href='update.php?id=$id'>Update</a></td>
                </tr>";
               
            }
            echo "</table>";
           
            
        }
    }
?>
</div>
</body>
</html>