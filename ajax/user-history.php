<?php
/*
 * Ajax – user-history.php
 * Returns history
 */

require_once("../core.php");
$return = array();

if (!istechnician()) {
	$return["status"] = "error";
	$return["error"] = 1;
	$return["error_msg"] = "User is not logged in as a technician.";
} else {
	if (!isset($_GET["user"])) {
		$return["status"] = "error";
		$return["error"] = 2;
		$return["error_msg"] = "No user history was requested.";
	} else {
		$user = (INT)$_GET["user"];

		$return["status"] = "ok";
		$query = mysqli_query($con, "SELECT id, username, name, surname, email, type, area, clickeduid FROM users WHERE id = {$user}");
		if (!mysqli_num_rows($query)) {
			$return["status"] = "error";
			$return["error"] = 2;
			$return["error_msg"] = "User doesn't exist.";
		} else {
			$return["user"] = mysqli_fetch_assoc($query);
		}
	}
}

echo json_encode($return);