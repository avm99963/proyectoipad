<?php
/*
 * Ajax – users.php
 * Returns list of users
 */

require_once("../core.php");
$return = array();

if (!istechnician()) {
	$return["status"] = "error";
	$return["error"] = 1;
	$return["error_msg"] = "User is not logged in as a technician.";
} else {
	$return["status"] = "ok";
	$query = mysqli_query($con, "SELECT id, username, name, surname, email, type, area, clickeduid FROM users");
	$return["users"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		$return["users"][] = $row;
	}
}

echo json_encode($return);