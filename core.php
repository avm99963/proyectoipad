<?php
require_once("config.php");

// Timezone
date_default_timezone_set("Europe/Madrid");

// Aquí se recoge la configuración
require("config.php");

// Aquí se accede a la BD y a la sesión
$con = @mysqli_connect($CONF["host_db"], $CONF["usuario_db"], $CONF["clave_db"], $CONF["nombre_db"]) or die("<center>Check Mysqli settings in config.php</center>"); // Conectamos y seleccionamos BD

session_start();

// Custom error handler

function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<div class='alert alert-danger'><b>Error:</b> [$errno] $errstr<br>\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...</div>\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<div class='alert alert-warning'><b>Warning:</b> [$errno] $errstr on line $errline in file $errfile</div>\n";
        break;

    case E_WARNING:
        echo "<div class='alert alert-warning'><b>Warning:</b> [$errno] $errstr on line $errline in file $errfile</div>\n";
        break;

    case E_ERROR:
        echo "<div class='alert alert-danger'><b>Error:</b> [$errno] $errstr<br>\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...</div>\n";
        exit(1);
        break;

    case E_USER_NOTICE:
        echo "<div class='alert alert-warning'><b>Notice:</b> [$errno] $errstr on line $errline in file $errfile</div>\n";
        break;

    default:
        echo "<div class='alert alert-warning'>Unknown error type: [$errno] $errstr on line $errline in file $errfile</div>\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

$old_error_handler = set_error_handler("myErrorHandler");

// Aquí van todas las funciones
function loggedin() {
	if (isset($_SESSION['id'])) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function istechnician() {
	if (!isset($_SESSION['id']))
        return FALSE;
	$id = $_SESSION['id'];
	$query = mysqli_query($GLOBALS['con'], "SELECT type FROM users WHERE id = '".$id."'");
	$row = mysqli_fetch_assoc($query);
	if ($row["type"] == 1) {
		return true;
	} else {
		return false;
	}
}