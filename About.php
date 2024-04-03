<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/Xtream/BaseController.php";
require_once __DIR__ . "/Xtream/View.php";

use Xtream\MVC\BaseController as Controller;
use Xtream\MVC\View as View;

/* Set up view for About */
$view = new View();
$view->setTitle("Om");
$view->setLayout("maintemplate.php");
$view->setNavigation("nav.tpl.php");
$view->setContent(__DIR__ . "/Views/about_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();