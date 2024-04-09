<?php
$descerr="";
$f=1;
if(isset($_POST['sub']))
{

    if(isset($_POST['desc']))
	{
		if(empty($_POST['desc']))
	   {
        $f=0;
		$descerr="*This field is required";
      
	   }
       else
       {
          $des=$_POST['desc'];
          if(strlen($des)<50)
          {
            $f=0;
            $descerr="Minimum 50 characters are required";
          }
             
       }
    }
    if($f)
    {
        header("location:timing.php");
        session_start();
        $_SESSION['desc']=$_POST['desc'];

    }
       
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/des.css"></link>
</head>
<body>
<div class="container">
        <form action="" id="form" method="POST"  >
            <h1>Additional Information</h1>
            <div class="input-control">
                <label for="des">Description about the business</label>
                <div>
                    <textarea autofocus class='box' rows=10 placeholder='minimum 100 characters'  name='desc'><?php if(isset($_POST['desc'])) echo $_POST['desc']; ?></textarea>
                    <div class="error"><?php  if(isset($_POST['sub']))echo $descerr ?></div>
                </div>    
            </div>
            <button type="submit" name='sub'>Next</button>
        </form>
</div>
</body>
</html>
