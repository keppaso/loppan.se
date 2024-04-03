<?php
ob_start();
require_once __DIR__ . "/src/Session.php";

require_once __DIR__ . "/Xtream/BaseController.php";
require_once __DIR__ . "/Xtream/View.php";
require_once __DIR__ . "/Models/RegisterModel.php";
require_once __DIR__ . "/src/Validation.php";
require_once __DIR__ . "/src/DB.php";

use Xtream\MVC\BaseController as Controller;
use Xtream\MVC\View as View;

/* Create model for view and Controller */
$model = new RegisterModel();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$model->bind(); // Glömde ;)
	/* Validate POST data and return a RegisterModel */
	if ($model->validate())
	{
		/* 
			CONNECT TO DATABASE AND ADD A REQUEST OF REGISTRATION TO THE 'REQUESTS' TABLE
			NOTIFY USER THAT THE REQUEST IS UNDER PROCESS
		*/
		$db = new DB("localhost", "Mamma");
		$db->setUsername("root");
		$db->setPassword("rsklmn1o6");
		$db->connect();
	
		$db->addRequest($model);
		
		$db->close();
		/* Notify user that registration is under process by setting a session value */
		$_SESSION["REGREQ"] = true;
		header("Location: Index.php");
		exit(0);
	}
}


/* Set up view for Register.php */
$view = new View();
$view->setTitle("Registrering");
$view->setLayout("maintemplate.php");
$view->setNavigation("nav.tpl.php");
$view->setContent(__DIR__ . "/Views/register_view.php");

/* Set up controller */
$contr = new Controller($view);
$contr->setModel($model); /* this adds to the view aswell */
$contr->renderView();

ob_end_flush();
