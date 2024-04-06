<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";


/* Set up view for Index */
$view = new View();
$view->setTitle("Huvudsida");
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/index_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();

ob_end_flush();