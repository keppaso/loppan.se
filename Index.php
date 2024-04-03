<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/Xtream/BaseController.php";
require_once __DIR__ . "/src/IndexView.php";

use Xtream\MVC\BaseController as Controller;


/* Set up view for Index */
$view = new IndexView();
$view->setTitle("Huvudsida");
$view->setLayout("maintemplate.php");
$view->setNavigation("nav.tpl.php");
$view->setContent(__DIR__ . "/Views/index_view.php");
// $view->setLogo("logo.tpl.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();

ob_end_flush();