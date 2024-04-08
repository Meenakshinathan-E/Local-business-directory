<?php
include('../connection/connect.php');
if(isset($_POST['sub']))
{
	$un=$_POST['uname'];
	$bn=$_POST['bname'];
	$adr=$_POST['addr'];
	$num=$_POST['num'];
	$cid=$_POST['catg'];
	$qry="insert into business(uname,bname,addr,phone,cat_id)values('$un','$bn','$adr','$num','$cid')";
	if($res)
		echo"<script>alert('Inserted Successfully')</script>";
	else
		echo"<script>alert('Insert failed')</script>";
	unset($_POST['sub']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"content="width=device-width,initial-scale=1.0">
	<title>Insert Business</title>
</head>
<body>
	<div class="con">
		<header><h1>Insert Product</h1></header>
		<form action=""method="POST">
			Username<input type="text"name="uname"><br><br>
			Business Name<input type="text"name="bname"><br><br>
			<textarea name="addr"cols="30"rows="10"></textarea><br><br>
			Number<input type="text"name="num"><br><br>
			Category<select name="catg">
				<?php
				$sel="select*from category";
				$res_select=mysqli_query($con,$sel);
				while($row=mysqli_fetch_assoc($res_select))
				{
					$id=$row['c_id'];
					$catg=$row['catg'];
					echo"<option value='$id'>$catg</option>";
				}
				?>
			</select><br><br>
			<button type="submit"name="sub"value="sub">Insert</button>
		</form>
	</div>
</body>
</html>
