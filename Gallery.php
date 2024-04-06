<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";


/* PREVENT ACCESS UNLESS THE SESSION IS LOGGED IN */
if ((isset($_SESSION["LOGGED_IN"]) == false) || $_SESSION["LOGGED_IN"] != true)
{
	/* REDIRECT TO LOGIN PAGE */
	header("Location: Login.php");
	exit(0);
}

/* Set up view for Index */
$view = new View();
$view->setTitle("Foto Galleri");
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/gallery_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();

ob_end_flush();