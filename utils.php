<?php
session_start();

function loggin() {
	if (! is_logged()) {
		include 'control/logginVD.php';
		validate();
		$_SESSION['user'] = get_user();
	}
}

function loggout() {
	include_once "persistence/dbinit.php";
	close_connection();
	exec("echo 'fechado'> registros.log");
	session_destroy();
}

?>
