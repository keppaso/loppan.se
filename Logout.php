<?php
ob_start();
require_once __DIR__ . "/src/Session.php";

if (isset($_SESSION["LOGGED_IN"]) && $_SESSION["LOGGED_IN"] == true) 
{
	session_destroy();
	header("Location: Index.php");
	exit(0);
}
ob_end_flush();