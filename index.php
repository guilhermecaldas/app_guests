<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'control/login.CTRL.php';
LoginCTRL::redirect_if_logged("main.php");
LoginCTRL::redirect_if_not_logged("login.php")
?>
