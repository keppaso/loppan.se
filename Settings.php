<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/src/Controller.php";
require_once __DIR__ . "/src/View.php";
require_once __DIR__ . "/src/DB.php";
require_once __DIR__ . "/models/RequestsModel.php";

$models = array();

$db = new DB("localhost", "Mamma", "root", "rsklmn1o6");
$db->connect();
$rows = $db->getRequests();
$db->close();

foreach($rows as $row)
{
    // build model
    $model = new RequestsModel();
    $model->id = (string)$row["id"];
    $model->name = $row["name"];
    $model->lastname = $row["lastname"];
    $model->email = $row["email"];
    $model->password = $row["password"];

    // add to array
    $models[strval($row['id'])] = $model;

}


if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    /* REGISTRATION */
    if (isset($_POST['approve']))
    {
        /*  BIND OUR CHECKBOXES TO OUR MODEL IN THE ARRAY.
            NOTICE THE KEY BEFORE EACH HTML NAME, THATS THE ID 
        */
        foreach($_POST as $key => $value)
        {
            switch($key)
            {
                case $key[0] . "choose":
                    $models[strval($key[0])]->isAdded = true;
                    break;

                case $key[0] . "allowGallery":
                    $models[strval($key[0])]->allow_gallery = true;
                    break;

                case $key[0] . "isAdmin":
                    $models[strval($key[0])]->is_admin = true;
                    break;
            }
        }

        $db = new DB("localhost", "Mamma", "root", "rsklmn1o6");
        $db->connect();

        foreach($models as $key => $value)
        {
            if ($value->isAdded == true)
            {
                // remove from Requests table
                $db->removeRequest($key);
                // add to User table
                $db->addUser($value);
                $_SESSION["REMOVE_COMPL"] = 1;
            }
        }
        $db->close();
        header("Location: Settings.php");
        exit(0);
    }
}


/* Set up view for Index */
$view = new View();
$view->setTitle("Inställningar");
$view->setLayout(__DIR__ . "/templates/maintemplate.php");
$view->setNavigation(__DIR__ . "/templates/nav.tpl.php");
$view->setContent(__DIR__ . "/Views/settings_view.php");
$view->setModel($models);

/* Set up controller and render view */
$contr = new Controller($view);
$contr->renderView();

ob_end_flush();