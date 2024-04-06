<?php
require_once __DIR__ . "/../src/ivalidate.php";
require_once __DIR__ . "/../src/ibind.php";

/* This class is a a data class for login_view.php that implements IBind and IValidate interface  */
class LoginModel implements IBind, IValidate
{
	/* Input fields */
	public $email = "";
	public $password = "";
	
	/* data fields */
	public $id = 0;
	public $name = "";
	public $lastname = "";
	public $is_admin = false;
	public $allow_gallery = false;
	
	/* Error messages upon validation failure */
	public $emailError = "";
	public $passwordError = "";
	
	/* Implementation of bind from IBind interface */
	public function bind()
	{
		if (!isset($_POST)) {return false;}
		foreach ($_POST as $key => $value)
		{
			switch($key)
			{	
				case "email":
					$this->email = $value;
				break;
				
				case "password":
					$this->password = $value;
				break;

			}
		}
	}
	
	/* Implementation of validate from IValidate interface */
	public function validate()
	{
		$validateError = false;
		
		// EMAIL
		if (empty($this->email))
		{
			$this->emailError = "Email address är obligatorisk";
			$validateError = true;
		} 
		else 
		{
	    	// check if e-mail address is well-formed
	    	if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
	    	{
	      	$this->emailError = "Ogiltligt email format";
				$validateError = true;
			}
		}
		
		// PASSWORD 1
		if (empty($this->password))
		{
			$this->passwordError = "Ett lösenord är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
			if (strlen($this->password) < 5) 
			{
				$this->passwordError = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;
			}
		}
		if ($validateError) {return false;}
		return true;
	}
}