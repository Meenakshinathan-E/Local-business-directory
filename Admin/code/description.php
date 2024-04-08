<?php
$descer="";
$f=1;
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
        $_SESSION['desc']=$_POST['desc'];
        header("location:timing.php");
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
                    <textarea class="box" row=10 placeholder="minimum 50 characters" name="desc"><?php if(isset($_POST['desc']))echo $_POST['desc']?></textarea>
                    <div class="error"><?php if(isset($_POST['sub']))echo $descerr?></div>
                </div>
            </div>
            <button type="submit" name="sub">Next </button>
        </form>
    </div>
</body>
</html>