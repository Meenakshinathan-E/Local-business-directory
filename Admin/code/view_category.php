<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form method="POST" action="">
    <?php
    include('../connection/connect.php');
    if($con)
    {
        $qry="select*from category";
        $res=mysqli_query($con,$qry);
        $num=mysqli_num_rows($res);
        if($num==0)
            echo"No Category Data";
        else
        {
            
            echo "<table class='table table-hover table-striped' style='width:50vw'>";
            echo "<tr><th>Category name</th>
            <th colspan='2'>ACTIONS</th></tr>";
            while($row=mysqli_fetch_row($res))
            {
                $id=$row[0];
                echo "<tr>
                <td>$row[1]</td>
                <td ><a class='btn btn-danger' href='delete.php?del=$id'>Delete</a></td>
                </tr>"; 
            }
            echo "</table>";   
            echo "<br>";
        }
    }
?>
</form>
</body>
</html>