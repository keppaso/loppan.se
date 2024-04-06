<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/DB.php";
require_once __DIR__ . "/models/HeavenModel.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";


$model = new HeavenModel();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['candleWho']))
    {
		$who = "Anonym";
        if (trim(htmlspecialchars($_POST['candleWho'])) != "")
        {
            $who = htmlspecialchars($_POST['candleWho']);
        }
		
		$db = new DB("localhost", "Mamma", "root", "rsklmn1o6");
		$db->connect();
		$db->addCandle($who);
		$db->close();

		$_SESSION['CANDLE_LIT'] = 1;
		/* REDIRECT TO HERE TO SHOW A CONFIRMATION */
		header("Location: Heaven.php");
		exit(0);
    }

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
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/heaven_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->setModel($model); /* this adds to the view aswell */
$contr->renderView();

ob_end_flush();