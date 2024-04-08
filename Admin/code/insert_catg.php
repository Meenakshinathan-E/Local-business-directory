<?php
    include('../connection/connect.php');
    if(isset($_POST['catg_sub']))
    {
        $catg=$_POST['cat'];
        $sel="select*from category where c_name='$catg'";
        $res_select=mysqli_query($con,$sel);
        $num=mysqli_num_rows($res_select);
        if($num>0)
            echo"<script>alert('already there')</script>";
        else
        {
            $qry="insert into category(c_name) values('$catg')";
            $res=mysqli_query($con,$qry);   
            if($res)
                echo"<script>alert('Inserted Successfully');
                window.location.href='interface.php?view_category'</script>"; 

        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/insert.css"></link>
</head>
<body>
    <div class="wrap">
        <form class="login-form" action="" method="POST">
            <div class="form-header">
                <h3>Category Insertion</h3>
            </div>
            <div class="form-group">
                Enter your category:
                <input type="text"name="cat" class="form-input" value="<?php if(isset($_POST['cat'])) echo $_POST['cat'];?>"required>
            </div>
            <div class="form-group">
                <button class="form-button" type="submit"name="catg_sub">Insert</button>
            </div>
        </form>
    </div>
    <script>
	    if(window.history.replaceState)
	      window.history.replaceState(null,null,window.location.history);
    </script>
</body>
</html>