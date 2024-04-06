<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";
require_once __DIR__ . "/models/LoginModel.php";
require_once __DIR__ . "/src/Validation.php";
require_once __DIR__ . "/src/DB.php";
require_once __DIR__ . "/models/RegisterModel.php";


/* Create model for view and Controller */
$model = new LoginModel();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$model->bind();
	/* Validate POST data and return a LoginModel */
	/*if (Validation::validateLoginModel($model)) */
	if ($model->validate())
	{
		/* Connect to database, Retrieve a LoginModel because we also need to
		   compare the password, close database */
		$db = new DB("localhost", "Mamma", "root", "rsklmn1o6");
		$db->connect();
		
		$loginModel = $db->getLoginModel($model->email);
		$db->close();
		
		/* If model from db is null: client is not registered */
		if ($loginModel == false)
		{
			/* EFTERSOM MAN INTE KAN REGISTRERA SIG PÅ DENNA SIDAN SÅ KANSKE MAN KAN
			   GÖRA DET MÖJLIGT ATT SKICKA EN FÖRFRÅGAN OM REGISTRERING
			*/
			/* Set flags in session and redirect to Register.php */
			$_SESSION["FAILED_LOGIN"] = true;
			$_SESSION["EMAIL"] = $model->email;
			
			header("Location: Register.php");
			exit(0);
		}
		else /* Client is registered */
		{
			/* If database password matches client password */
			if ($loginModel->password == $model->password)
			{
				/* Sucessfully logged in, set session values and redirect to Home */
				$_SESSION["LOGGED_IN"] = true;
				$_SESSION["ID"] = $loginModel->id;
				$_SESSION["IS_ADMIN"] = $loginModel->is_admin;
				$_SESSION["NAME"] = $loginModel->name;
				$_SESSION["LAST_NAME"] = $loginModel->lastname;
				$_SESSION["EMAIL"] = $loginModel->email;
				header("Location: Index.php");
				exit(0);
			}
			else 
			{
				$model->passwordError = "Ogiltligt lösenord!";
			}
		}
	}
}

/* Set up view for Login.php */
$view = new View();
$view->setTitle("Logga in");
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/login_view.php");

/* Set up controller */
$contr = new Controller($view);
$contr->setModel($model); /* this adds to the view aswell */
$contr->renderView();

ob_end_flush();