<?php
error_reporting(0);
include('../connection/connect.php');
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $qry="select * from business WHERE b_id=$id";
    $sel=mysqli_query($con,$qry);
    while($row=mysqli_fetch_row($sel))
    {
    
    $catg=$row[7];
    $qry1="Select * from category where c_id=$catg";
    $res=mysqli_query($con,$qry1);
    while($row2=mysqli_fetch_row($res))
    {
        $cname=$row2[1];
    }
    $year=$row[8];
    $building=$row[9];
    $street=$row[10];
    $landmark=$row[11];
    $image=$row[13];
    
    }
}
  $yearerr=$bnerr=$streeterr=$lmarkerr=$imgerr='';
   $f=1;
 if(isset($_POST['sub']))
 {
	if(isset($_POST['year']))
	{
		if(empty($_POST['year']))
	   {
        $f=0;
		$yearerr="*This field is required";
      
	   }
	   
	}
    if(isset($_POST['bn']))
	{
		if(empty($_POST['bn']))
	   {
        $f=0;
		$bnerr="*This field is required";
	   }
	   else
	   {
		$pattern="/[A-Z][a-z]+/";
		$check=preg_match_all($pattern,$_POST['bn']);
        if(!$check)
		{
			$f=0;
		    $bnerr="Inavalid format";
		}
	   }
	}
    if(isset($_POST['street']))
	{
		if(empty($_POST['street']))
	   {
        $f=0;
		$streeterr="*This field is required";
	   }
	   else
	   {
		$pattern="/[A-Z][a-z]+/";
		$check=preg_match_all($pattern,$_POST['street']);
        if(!$check)
		{
			$f=0;
		    $streeterr="Inavalid format";
		}
	   }
	}
    if(isset($_POST['lmark']))
	{
		if(empty($_POST['lmark']))
	   {
        $f=0;
		$lmarkerr="*This field is required";
	   }
	   else
	   {
		$pattern="/[A-Z][a-z]+/";
		$check=preg_match_all($pattern,$_POST['lmark']);
        if(!$check)
		{
			$f=0;
		    $lmarkerr="Inavalid format";
		}
	   }
	}
    
    // if(isset($_FILES['photo']))
    // {
    //     print_r($_FILES['photo']['name']);
    //     for($i=0;$i<count($_FILES['photo']['name']);$i++)
    //     {
    //         if($_FILES['photo']['size'][$i]>100000)
    //         {
    //             $imgerr="size is large";
    //             $f=0;
    //             break;
    //         }
    //         $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
    //         if($ext!='png' && $ext!='jpg')
    //         {
    //             $imgerr="Invalid Type";
    //             $f=0;
    //             break;
    //         }
    //     }
        
    // }
    if($f==1)
    {
        mysqli_report(MYSQLI_REPORT_ERROR);
        $bname=$_SESSION["bname"];
        $uid=$_SESSION["u_id"];
        $name=$_SESSION["name"];
        $mobile=$_SESSION["mobile"];
        $pin=$_SESSION["pin"];
        $city=$_SESSION["city"];


        $mon=$_SESSION['t1'];
        $tue=$_SESSION['t2'];
        $wed=$_SESSION['t3'];
        $thu=$_SESSION['t4'];
        $fri=$_SESSION['t5'];
        $sat=$_SESSION['t6'];
        $sun=$_SESSION['t7'];

        $uid=$_SESSION['u_id'];

        $catg=$_POST['catg'];
        $year=$_POST['year'];
        $bn=$_POST['bn'];
        $street=$_POST['street'];
        $lmark=$_POST['lmark'];

        $desc=$_SESSION['desc'];
        $img='';
        // for($i=0;$i<count($_FILES['photo']['name']);$i++)
        // {
        //     $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
        //     $img.=$ext.",";
        // }
        include('../connection/connect.php');

        
        mysqli_commit($con);
        $r=mysqli_query($con,"select c_id from category where c_name='$catg'");
        while($row=mysqli_fetch_row($r))
        {
            $c=$row[0];
        }
        // $qry1="insert into business(u_id,b_name,con_person,mobile,pincode,city,catg,year,building,street,landmark,descrip,image)
        // values($uid,'$bname','$name','$mobile','$pin','$city','$c','$year','$bn','$street','$lmark','$desc','$img')";
        $qry1="update business set u_id='$uid',b_name='$bname',con_person='$name',mobile='$mobile',pincode='$pin',city='$city',
        catg='$c',year='$year',building='$bn',street='$street',landmark='$lmark',descrip='$desc' where b_id=$id";
        $res=mysqli_query($con,$qry1);
        if($res==FALSE)
        {
            echo"<script>alert('Error 2222')</script>";
        }
        else
        {
            if($r=mysqli_query($con,"select b_id from business where mobile='$mobile'"))
            {
            while($row=mysqli_fetch_assoc($r))
            {
                $id=$row['b_id'];
            }
            $qry1="update timing set mon='$mon',tue='$tue',wed='$wed',thur='$thu',fri='$fri',sat='$sat',sun='$sun' where b_id=$id";
            $res=mysqli_query($con,$qry1);
            $flag=1;
            if($res==FALSE)
            {
                mysqli_rollback($con);
                $flag=0;
            }
            if($flag)
            {
                // $target="upload/".$uid."/";
                // if(!file_exists($target))
                // mkdir($target,0777);
                // for($i=0;$i<count($_FILES['photo']['name']);$i++)
                // {
                //     $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
                //     move_uploaded_file($_FILES['photo']['tmp_name'][$i],$target.$i.".".$ext);
                // }
                echo"<script>alert('Updated Successfully');
				window.location.href='interface.php?view_business'</script>";
            }
        }
        }
    }
 }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/business1.css"></link>
</head>
<body>
<div class="container">
        <form action="" id="form" method="POST" enctype="multipart/form-data" >
            <h1>Register</h1>
            <input type="hidden" name="image" value="<?php echo $image  ?>">
            <div class="input-control">
                <label for="bn">Category</label>
                <datalist id='val'>
                  <?php   
                     $qry="Select c_name from category";
                     $res=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_row($res))
                     {
                        echo"<option value='$row[0]'></option>  ";   

                     }
                            
         
                   ?>
            </datalist>
              <input list='val' id='bn' name='catg' value="<?php  echo $cname; ?>"> 
            </div>
            <div class="input-control">
                <label for="year">Year of Establishment</label>
                <input type="month" id="year"name="year" value="<?php echo $year;?>">
                <div class="error"><?php  echo $yearerr ?></div>
            </div>
            <div class="input-control">
                <label for="bn">Building Name</label>
                <input type="text" id="bn"name="bn" value="<?php  echo $building;?>">
                <div class="error"><?php  echo $bnerr ?></div>
            </div>
            <div class="input-control">
                <label for="street">Street</label>
                <input type="text" id="street"name="street" value="<?php echo $street;?>">
                <div class="error"><?php  echo $streeterr ?></div>
            </div>
            <div class="input-control">
                <label for="lmark">Landmark</label>
                <input type="text" id="lmark"name="lmark" value="<?php  echo $landmark;?>">
                <div class="error"><?php  echo $lmarkerr ?></div>
            </div>
            
            <button type="submit" name='sub'>Update</button>
        </form>
    </div>
</body>
</html>