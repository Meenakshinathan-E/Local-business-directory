<?php
include('../connection/connect.php');
$descer="";
$f=1;
if(isset($_GET['id']))
{
	$id=(int)$_GET['id'];
    $qry="select * from business WHERE b_id=$id";
    $sel=mysqli_query($con,$qry);
    while($row=mysqli_fetch_row($sel))
    {
	    
        $des=$row[12];
	}      
}
if(isset($_POST['sub']))
{
	if(isset($_POST['desc']))
	{
		if(empty($_POST['desc']))
		{
			
			$f=0;
			$descerr="*This Field is required";
		}
		else
		{
			$des=$_POST['desc'];
            if(strlen($des)<5)
            {
                $f=0;
                $descerr="Minimum 50 character are required";
            }
		}
	}
    if($f)
    {
        session_start();
        $id=$_POST['id'];
        $_SESSION['desc']=$_POST['desc'];
        header("location:updatetiming.php?id=$id");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/description.css"></link>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" id="form"method="POST">
            <h1>Additional Informaton</h1>
            <div class="input-control">
                <label for="des">Description about the Business</label>
                <div>
                    <textarea class="box" row=10 placeholder="minimum 50 characters" name="desc"><?php echo $des ?></textarea>
                    <div class="error"><?php if(isset($_POST['sub']))echo $descerr?></div>
                </div>
            </div>
            <input type='hidden' name='id' value="<?php echo $id ?>">
            <button type="submit" name="sub">Next </button>
        </form>
    </div>
</body>
</html>