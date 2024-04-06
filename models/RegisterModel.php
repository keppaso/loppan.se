<?php
require_once __DIR__ . "/../src/ivalidate.php";
require_once __DIR__ . "/../src/ibind.php";

/* This class is a a data class for register_view.php that implements IBind and IValidate interface  */
class RegisterModel implements IBind, IValidate
{
	/* Input fields */
	public $name = "";
	public $lastname = "";
	public $email = "";
	public $password1 = "";
	public $password2 = "";
	
	/* Error messages upon validation failure */
	public $nameError = "";
	public $lastnameError = "";
	public $emailError = "";
	public $password1Error = "";
	public $password2Error = "";
	
	
	/* Implementation of bind from IBind interface */
	public function bind()
	{
		if (!isset($_POST)) {return false;}
		foreach ($_POST as $key => $value)
		{
			switch($key) 
			{
				case "name":
					$this->name = $value;
				break;
				
				case "lastname":
					$this->lastname = $value;
				break;
				
				case "email":
					$this->email = $value;
				break;
				
				case "password1":
					$this->password1 = $value;
				break;
				
				case "password2":
					$this->password2 = $value;
				break;

			}
		}
	}
	
	/* Implementation of validate from IValidate interface */
	public function validate()
	{
		$validateError = false;
		// NAME
		if (empty($this->name)) 
		{
			$this->nameError = "Namn är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
	    	// check if name only contains letters and whitespace
	    	if (!preg_match("/^[a-zA-Z-' \Å\å\Ä\ä\Ö\ö]*$/",$this->name)) 
	    	{
	      	$this->nameError = "Ogiltliga tecken i namnet";
	      	$validateError = true;
			}
		}
		// LASTNAME
		if (empty($this->lastname)) 
		{
			$this->lastnameError = "Efternamn är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
	    	// check if name only contains letters and whitespace
	    	if (!preg_match("/^[a-zA-Z-' \Å\å\Ä\ä\Ö\ö]*$/",$this->lastname)) 
	    	{
	      	$this->lastnameError = "Ogiltliga tecken i efternamnet";
	      	$validateError = true;
			}
		}
		
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
		if (empty($this->password1)) 
		{
			$this->password1Error = "Ett lösenord är obligatoriskt";
			$validateError = true;
		} 
		else
		{
			if (strlen($this->password1) < 5) 
			{
				$this->password1Error = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;		
			}
		}
		
		// PASSWORD 2
		if (empty($this->password2)) 
		{
			$this->password1Error = "Lösenordet måste upprepas";
			$validateError = true;
		} 
		else 
		{
			if (strlen($this->password2) < 5) 
			{
				$this->password2Error = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;	
			}
			elseif(strcmp($this->password2, $this->password1) != 0) 
			{
				$this->password2Error = "Lösenorden matcher ej";
				$validateError = true;
			}
		}
		// if flag is true return false indicating validation failed. if not return true
		if ($validateError) {return false;}
		return true;
	}
}