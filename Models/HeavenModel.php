<?php
require_once __DIR__ . "/../src/ivalidate.php";
require_once __DIR__ . "/../src/ibind.php";
require_once __DIR__ . "/../src/DB.php";

/* This class is a a data class for login_view.php that implements IBind and IValidate interface  */
class HeavenModel implements IBind, IValidate
{
	public $who = "";
	public $message = "";
	public $messageError = "";
	
	
	public function getMessages()
	{
		$db = new DB("localhost", "Mamma");
		$db->setUsername("root");
		$db->setPassword("rsklmn1o6");
		$db->connect();
		
		$fields = $db->executeQuery("SELECT * FROM Heaven ORDER BY id DESC;");
		$result = $fields->fetchAll();
		$db->close();
		
		return $result;
	}
	
	public function bind()
	{
		if (!isset($_POST)) {return false;}
		foreach ($_POST as $key => $value)
		{
			switch($key) 
			{
				case "who":
					$this->who = $value;
				break;
				
				case "message":
					$this->message = $value;
				break;

			}
		}
	}
	
	public function validate()
	{
		$validateError = false;
		// NAME
		if (empty($this->message)) 
		{
			$this->messageError = "Skicka inga tomma medellande till himlen! (medelandet är obligatoriskt)";
			$validateError = true;
		}
		// if flag is true return false indicating validation failed. if not return true
		if ($validateError) {return false;}
		return true;
	}
}