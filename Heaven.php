<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/DB.php";
require_once __DIR__ . "/Models/HeavenModel.php";
require_once __DIR__ . "/Xtream/BaseController.php";
require_once __DIR__ . "/Xtream/View.php";


use Xtream\MVC\BaseController as Controller;
use Xtream\MVC\View as View;

$model = new HeavenModel();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$model->bind();
	/* IF VALIDATION RETURNS TRUE */
	if ($model->validate())
	{
		/* 
			CONNECT TO DATABASE AND ADD MESSAGE HEAVEN TO DATABASE
			RETURN TO THIS PAGE FOR DISPLAY
		*/
		$db = new DB("localhost", "Mamma");
		$db->setUsername("root");
		$db->setPassword("rsklmn1o6");
		$db->connect();
	
		$db->addToHeaven($model);
		
		$db->close();
		/* REDIRECT TO HERE TO SHOW THE LATEST HEAVINLY MESSAGES */
		header("Location: Heaven.php");
		exit(0);
	}
}

/* Set up view for Heaven */
$view = new View();
$view->setTitle("Himlen");
$view->setLayout("maintemplate.php");
$view->setNavigation("nav.tpl.php");
$view->setContent(__DIR__ . "/Views/heaven_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->setModel($model); /* this adds to the view aswell */
$contr->renderView();

ob_end_flush();