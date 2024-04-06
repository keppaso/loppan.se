<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";


/* Set up view for About */
$view = new View();
$view->setTitle("Om");
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/about_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();