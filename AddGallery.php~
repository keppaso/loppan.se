<?php
ob_start();
require_once __DIR__ . "/src/Session.php";
require_once __DIR__ . "/Xtream/BaseController.php";
require_once __DIR__ . "/Xtream/View.php";
require_once __DIR__ . "/Models/AddGalleryModel.php";
require_once __DIR__ . "/src/DB.php";
require_once __DIR__ . "/src/Guid.php";

use Xtream\MVC\BaseController as Controller;
use Xtream\MVC\View as View;

/* PREVENT ACCESS UNLESS THE SESSION IS LOGGED IN */
if ((isset($_SESSION["LOGGED_IN"]) == false) || $_SESSION["LOGGED_IN"] != true)
{
	/* REDIRECT TO INDEX */
	header("Location: Index.php");
	exit(0);
}

$model = new AddGalleryModel();


/* HANDLE FORM POST METHOD */
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST["save"]))
	{
		/* SAVE INFORMATION TO DATABASE */
		$db = new DB("localhost", "Mamma", "root", "rsklmn1o6");
		$db->connect();
		
		$model->picture = $_SESSION["TMP_PIC"];
		$model->description = $_POST["descr"];
		$model->memory = $_POST["memory"];
		if(isset($_POST["showmemory"])) { $model->show_memory = 1; }
		if(isset($_POST["category"])) { $model->category = $_POST["category"]; }
				
		$model->createdby_id = $_SESSION["ID"];
		$model->createdby_name = $_SESSION["NAME"];
		
		$db->addGalleryModel($model);
		
		$db->close();
		/* NOTIFY USER IN GALLERY THAT IS HAS BEEN ADDED SUCESSFULLY USING A PANEL AS WE
			DO IN INDEX_VIEW.PHP WHEN A REQUEST OF REGISTRATION HAS BEEN MADE */
		$_SESSION["NEWPIC"] = true;
		/* REDIRECT TO Gallery.php */
		header("Location: Gallery.php");
		exit(0);
	}
	/* LETS HANDLE UPLOADING OF AN IMAGE
	  POST VALUE IS SUBMIT AND THE FILES NAME IS SET*/
	elseif(isset($_POST["submit"]) && $_FILES["file"]["name"] != null)
	{
		/* SPECIFIES THE DIR WHERE THE FILE IS GOING TO BE PLACED ONCE THE UPLOAD IS COMPLETE */
		$target_dir = __DIR__ . "/resources/uploads/";
		
		/* PATH OF THE FILE TO BE UPLOADED */
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		
		/* FLAG */
		$uploadOk = 1;
		
		/* HOLDS THE FILE EXTENSION IN LOWERCASE */
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		/* CHECK IF FILE IS AN ACTUAL IMAGE AND NOT A FAKE FILE  */
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		if($check !== false) 
		{
			$uploadOk = 1;
		} 
		else 
		{
			$model->pictureError = "File is not an image";
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["file"]["size"] > 4194304) // 4 mb
		{
		  $model->pictureError = "File is too large. (4 Mb maximum)";
		  $uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			$model->pictureError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  	$uploadOk = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			$model->pictureError = "Sorry, your file was not uploaded.";
		} 
		else // if everything is ok, try to upload file
		{
			$guid = Guid::NewGuid();
			$newFilePath = $target_dir . $guid . "." . $imageFileType;
		  if (move_uploaded_file($_FILES["file"]["tmp_name"], $newFilePath)) 
		  {
		  		$model->pictureError = "The file ". htmlspecialchars(basename($newFilePath)) . " has been uploaded.";
		  		$model->picture = "../resources/uploads/" . htmlspecialchars(basename($newFilePath));
		  		$_SESSION["TMP_PIC"] = $model->picture;
		  } 
		  else 
		  {
		  		$model->pictureError = "Sorry, there was en error uploading the file.";
		  }
	}
	}
}


/* Set up view for Index */
$view = new View();
$view->setTitle("Lägg till");
$view->setLayout("maintemplate.php");
$view->setNavigation("nav.tpl.php");
$view->setContent(__DIR__ . "/Views/add_gallery_view.php");

/* Set up controller and render view */
$contr = new Controller($view);
$contr->setModel($model);
$contr->renderView();

ob_end_flush();