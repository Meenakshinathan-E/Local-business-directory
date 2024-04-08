<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/interface.css"></link>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <title>admin dashboard</title>
</head>
<body>
    <div class='head'>Admin dashboard</div>
    <div class="asid">
        <ul>
            <li><a href="interface.php?view_user">View User</a></li>
            <li><a href="interface.php?view_business">View Business</a></li>
            <li><a href="interface.php?view_category">View Category</a></li>
            <li><a href="newuser.php">Insert User</a></li>
            <li><a href="insert_catg.php">Insert Category</a></li>
            <li><a href="addbus.php">Insert Business</a></li>
            <li><a href="interface.php?verify">Verify Business</a></li>
            <li><a href="index.php">Log out</a></li>
        </ul>
    </div>
    <div>
        <div class="con">
                <div >
                    <?php
                    include('../connection/connect.php');
                    if($con)
                    {
                        $qry="select*from user";
                        $res=mysqli_query($con,$qry);
                        $num=mysqli_num_rows($res);
                        echo "Total users:$num";
                    }
                    ?> 
                </div>
                <div>
                <?php
                    include('../connection/connect.php');
                    if($con)
                    {
                        $qry="select*from business";
                        $res=mysqli_query($con,$qry);
                        $num=mysqli_num_rows($res);
                        echo "Total business:$num";
                    }
                    ?>
                </div>
                <div >
                <?php
                    include('../connection/connect.php');
                    if($con)
                    {
                        $qry="select*from category";
                        $res=mysqli_query($con,$qry);
                        $num=mysqli_num_rows($res);
                        echo "Total category:$num";
                    }
                    ?>
                </div>
        </div>
     <div class='section'>
        <?php
          if(isset($_GET['view_user']))
          {
               include('view_user.php');
          }

          if(isset($_GET['view_category']))
          {
            include('view_category.php');
          }
          if(isset($_GET['del']))
          {
            include('delete.php');
          }
          if(isset($_GET['view_business']))
          {
            include('view_business.php');
          }
          if(isset($_GET['dele']))
          {
            include('business_delete.php');
          }
          if(isset($_GET['verify']))
          {
            include('verify.php');
          }
            ?>
     </div>
    </div>
</body>
</html>