<?php
require_once('core.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
if (empty($username) || empty($password)) {
	header("Location: index.php?msg=empty");
	echo "Please fill in all form.";
} else {
	$query = mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'");
	if (mysqli_num_rows($query)) {
		$row = mysqli_fetch_assoc($query) or die(mysqli_error($con));
		if (password_verify($password, $row["password"])) {
			$_SESSION['id'] = $row['id'];
			header("Location: dashboard.php");
		} else {
			header("Location: index.php?msg=loginwrong");
			echo "User data incorrect :-(";
		}
	} else {
		header("Location: index.php?msg=loginwrong");
		echo "User data incorrect :-(";
	}
}