<?php
$emailerr = $paserr = $fnameerr = $lnameerr = $unameerr = $confirmerr = "";
$f = 1;
if (isset($_POST['sub'])) {
	if (isset($_POST['fname'])) {
		if (empty($_POST['fname'])) {
			$f = 0;
			$fnameerr = "*This field is required";
		} else {
			$pattern = "/^[A-Z][A-z a-z]+$/";
			$check = preg_match_all($pattern, $_POST['fname']);

			if (!$check) {

				$f = 0;
				$fnameerr = "Inavalid format";
			}
		}
	}
	if (isset($_POST['lname'])) {
		if (empty($_POST['lname'])) {
			$f = 0;
			$lnameerr = "*This field is required";
		} else {
			$pattern = "/^[A-z a-z]+/";
			$check = preg_match_all($pattern, $_POST['lname']);
			if (!$check) {
				$f = 0;
				$lnameerr = "Inavalid format";
			}
		}
	}
	if (isset($_POST['uname'])) {
		if (empty($_POST['uname'])) {
			$f = 0;
			$unameerr = "*This field is required";
		} else {
			$pattern = "/^[A-Z][A-z a-z]+/";
			$check = preg_match_all($pattern, $_POST['uname']);
			if (!$check) {
				$f = 0;
				$unameerr = "Inavalid format";
			}
		}
	}
	if (isset($_POST['email'])) {

		if (empty($_POST['email'])) {
			$f = 0;
			$emailerr = "*This field is required";
		} else {
			$pattern = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			if (!$pattern) {
				$f = 0;
				$emailerr = "Inavalid format";
			}
		}
	}

	if (isset($_POST['pas'])) {
		if (empty($_POST['pas'])) {
			$f = 0;
			$paserr = "*This field is required";
		} else {
			$pattern = "/^[A-Z][A-z a-z 0-9]+/";
			$check = preg_match_all($pattern, $_POST['pas']);
			if (!$check) {
				$f = 0;
				$paserr = "Inavalid format";
			}
		}
	}
	if (isset($_POST['confirm'])) {
		if (empty($_POST['confirm'])) {
			$f = 0;
			$confirmerr = "*This field is required";
		} else {
			if (isset($_POST['pas'])) {
				if (!($_POST['pas'] == $_POST['confirm'])) {
					$f = 0;
					$confirmerr = "Password mismatch";
				}
			}
		}
	}
	if ($f) {
		include('../connection/connect.php');
		$uname = $_POST['uname'];
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$pas = $_POST['pas'];
		$lname = $_POST['lname'];
		$qry = "Insert into user(username,email,password,fname,lname) values('$uname','$email','$pas','$fname','$lname')";
		$res = mysqli_query($con, $qry);
		if ($res) {

			$qry = "Select * from user where email='$email' AND password='$pas'";
			$res = mysqli_query($con, $qry);
			while ($row = mysqli_fetch_assoc($res)) {
				$id = $row['username'];
				$uid = $row['u_id'];
			}
			session_start();
			$_SESSION['user'] = $id;
			$_SESSION['u_id'] = $uid;
			if (isset($_SESSION['u_id']))
				header('location:index.php');
		} else {
			echo "<script>alert('User Already exist')</script>";
		}
	}
}
?><html>

<head>
	<title>Sign up form</title>
	<link rel="stylesheet" type="text/css" href="../style/signup.css">
	</link>
</head>

<body>
	<div class="wrap">
		<form class="login-form" action="" method="POST">

			<div class="form-header">
				<h3>Sign-up Form</h3>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" placeholder="First Name" name='fname' value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
				<span class="err"><?php echo "$fnameerr" ?></span>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" placeholder="Last Name" name='lname' value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
				<span class="err"><?php echo "$lnameerr" ?></span></span>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" placeholder="uname" name='uname' value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
				<span class="err"><?php echo "$unameerr" ?></span></span>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" id='email' placeholder="email" name='email' value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
				<span class="err"><?php echo "$emailerr" ?></span>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" placeholder="password" name='pas' value="<?php if (isset($_POST['pas'])) echo $_POST['pas']; ?>">
				<span class="err"><?php echo "$paserr" ?></span>
			</div>
			<div class="form-group">
				<input type="text" class="form-input" placeholder="confirm password" name='confirm' value="<?php if (isset($_POST['confirm'])) echo $_POST['confirm']; ?>">
				<span class="err"><?php echo "$confirmerr" ?></span></span>
			</div>
			<div class="form-group">
				<button type="submit" class="form-button" name='sub'>Sign up</button>
			</div>
			<div class="form-footer">
				<p>Already have an account</p><a href="log.php">Log in</a>
			</div>
		</form>
	</div>
</body>

<html>
<!-- <script src="../script/login.js"></script> -->