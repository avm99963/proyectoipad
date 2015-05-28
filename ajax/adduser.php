<?php
/*
 * Ajax – newuser.php
 * Add user to table users
 */

require_once("../core.php");
$return = array();

if (!istechnician()) {
	$return["status"] = "error";
	$return["error"] = 1;
	$return["error_msg"] = "User is not logged in as a technician.";
} else {
	return "{}";
	/*if (!isset($_POST[""]))
	$query = mysqli_query($con, "INSERT INTO users (id, name, surname, area, email, password, username) VALUES ()");
	$return["users"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		$return["users"][] = $row;
	}*/
}

echo json_encode($return);