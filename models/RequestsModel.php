<?php
require_once __DIR__ . "/../src/ivalidate.php";
require_once __DIR__ . "/../src/ibind.php";
require_once __DIR__ . "/../src/DB.php";
require_once __DIR__ . "/../models/LoginModel.php";

/* This class is a a data class for settings_view.php that implements IBind and IValidate interface  */
class RequestsModel extends LoginModel
{
    public $isAdded = false;
	
	public function bind()
	{

	}
	
	public function validate()
	{
	}
}