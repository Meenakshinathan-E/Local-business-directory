<?php
  
   
  $yearerr=$bnerr=$streeterr=$lmarkerr=$imgerr='';
   $f=1;
 if(isset($_POST['sub1']))
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
    if(isset($_FILES['photo']))  
    {
         for($i=0;$i<count($_FILES['photo']['name']);$i++)
        {
            
            if($_FILES['photo']['size'][$i]>10000000)
            {
                $imgerr="Size is large";
                $f=0;
                break;
            }
                
            $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
            
            if($ext!='png' && $ext!='jpeg')
            {
                
                $imgerr='Invalid Type33';
                $f=0;
                break;
            }
               
        }
        
        
    }
    
    if($f)
    {
        session_start();
        mysqli_report(MYSQLI_REPORT_ERROR);
        $bname=$_SESSION["bname"];
        $uid=$_SESSION["u_id"];
		$name=$_SESSION["name"];
		$mobile=$_SESSION["mobile"];
		$pin=$_SESSION["pin"];
		$city=$_SESSION["city"];
        $mon= $_SESSION['t1'];
        $tue= $_SESSION['t2'];
        $wed= $_SESSION['t3'];
        $thu= $_SESSION['t4'];
        $fri= $_SESSION['t5'];
        $sat= $_SESSION['t6'];
        $sun= $_SESSION['t7'];
        

        $catg=$_POST['catg'];
        $year=$_POST['year'];
        $bn=$_POST['bn'];
        $street=$_POST['street'];
        $lmark=$_POST['lmark'];

        $desc=$_SESSION['desc'];
       
         $img='';
        for($i=0;$i<count($_FILES['photo']['name']);$i++)
        {
            // $img.=$_FILES['photo']['name'][$i].",";
            $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
            $img.=$ext.",";
        }
     
        include('../connection/connect.php');
        mysqli_commit($con);
        $r=mysqli_query($con,"select c_id from category where c_name='$catg'");
        while($row=mysqli_fetch_row($r))
        {
            $c=$row[0];

        }
        
        $qry1="insert into business(u_id,b_name,con_person,mobile,pincode,city,catg,year,building,street,landmark,descrip,image,status)
        values($uid,'$bname','$name','$mobile','$pin','$city',$c,'$year','$bn','$street','$lmark','$desc','$img','Not verified')";
        $res=mysqli_query($con,$qry1);
        if($res==FALSE)
        {
            // echo"<script>alert('Error 2222')
            // window.location.href='business.php'</script>";
            echo $con->error;
        }
        else
        {
            $r=mysqli_query($con,"select b_id from business where mobile='$mobile'");
            while($row=mysqli_fetch_row($r))
             {
               $id=$row[0];

            }
            
            $qry1="insert into timing values($id,'$mon','$tue','$wed','$thu','$fri','$sat','$sun')";
            $res=mysqli_query($con,$qry1);
            $flag=1;
            if($res==FALSE)
            {
                  mysqli_rollback($con);
                  $flag=0;
            }
          
            if($flag)
            {
              $target="upload/".$id."/";
              if(!file_exists($target))
                 mkdir($target,0777);
               for($i=0;$i<count($_FILES['photo']['name']);$i++)
               {
                    $ext=strtolower(pathinfo($_FILES['photo']['name'][$i],PATHINFO_EXTENSION));
                    
                    move_uploaded_file($_FILES['photo']['tmp_name'][$i],$target.$i.".".$ext);
                    
               }
               header("location:index.php");
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
        <form action= " "id="form" method="POST"  enctype='multipart/form-data'>
            <h1>Register</h1>
            <div class="input-control">
                <label for="bn">Category</label>
                <datalist id='val'>
                  <?php   
                   include('../connection/connect.php');
                     $qry="Select c_name from category";
                     $res=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_row($res))
                          echo"<option value='$row[0]'></option>  ";     
         
                   ?>
            </datalist>
              <input list='val' id='bn' name='catg' value=<?php if(isset($_POST['catg'])) echo $_POST['catg']; ?>> 
            </div>
            <div class="input-control">
                <label for="year">Year of Establishment</label>
                <input type="month" id="year"name="year" value="<?php  if(isset($_POST['year'])) echo $_POST['year'];?>">
                <div class="error"><?php  echo $yearerr ?></div>
            </div>
            <div class="input-control">
                <label for="bn">Building Name</label>
                <input type="text" id="bn"name="bn" value="<?php  if(isset($_POST['bn'])) echo $_POST['bn'];?>">
                <div class="error"><?php  echo $bnerr ?></div>
            </div>
            <div class="input-control">
                <label for="street">Street</label>
                <input type="text" id="street"name="street" value="<?php  if(isset($_POST['street'])) echo $_POST['street'];?>">
                <div class="error"><?php  echo $streeterr ?></div>
            </div>
            <div class="input-control">
                <label for="lmark">Landmark</label>
                <input type="text" id="lmark"name="lmark" value="<?php  if(isset($_POST['lmark'])) echo $_POST['lmark'];?>">
                <div class="error"><?php  echo $lmarkerr ?></div>
            </div>
            <div class="input-control">
                <label for="photos">Add Photos</label>
                <input type="file" id="photos"name="photo[]"multiple >
                <div class="error"><?php  echo $imgerr ?></div>
            </div>
            <button type="submit" name='sub1'>Next</button>
        </form>
    </div>
</body>
</html>
<script>
   if(window.history.replaceState)
       window.history.replaceState(null,null,window.location.history);
</script>

