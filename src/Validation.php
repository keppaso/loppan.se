<?php
class Validation
{
	public static function validateRegisterModel(&$model)
	{
		$validateError = false;
		// NAME
		if (empty($model->name)) 
		{
			$model->nameError = "Namn är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
			$model->name = self::strip_input($model->name);
	    	// check if name only contains letters and whitespace
	    	if (!preg_match("/^[a-zA-Z-' ]*$/",$model->name)) 
	    	{
	      	$model->nameError = "Ogiltliga tecken i namnet";
	      	$validateError = true;
			}
		}
		// LASTNAME
		if (empty($model->lastname)) 
		{
			$model->lastnameError = "Efternamn är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
			$model->lastname = self::strip_input($model->lastname);
	    	// check if name only contains letters and whitespace
	    	if (!preg_match("/^[a-zA-Z-' ]*$/",$model->lastname)) 
	    	{
	      	$model->lastnameError = "Ogiltliga tecken i efternamnet";
	      	$validateError = true;
			}
		}
		
		// EMAIL
		if (empty($model->email)) 
		{
			$model->emailError = "Email address är obligatorisk";
			$validateError = true;
		} 
		else
		{
			$model->email = self::strip_input($model->email);
	    	// check if e-mail address is well-formed
	    	if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) 
	    	{
	      	$model->emailError = "Ogiltligt format";
	      	$validateError = true;
			}
		}
		
		// PASSWORD 1
		if (empty($model->password1)) 
		{
			$model->password1Error = "Ett lösenord är obligatoriskt";
			$validateError = true;
		} 
		else
		{
			$model->password1 = self::strip_input($model->password1);
			if (strlen($model->password1) < 5) 
			{
				$model->password1Error = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;		
			}
		}
		
		// PASSWORD 2
		if (empty($model->password2)) 
		{
			$model->password1Error = "Lösenordet måste upprepas";
			$validateError = true;
		} 
		else 
		{
			$model->password2 = self::strip_input($model->password2);
			if (strlen($model->password2) < 5) 
			{
				$model->password2Error = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;	
			}
			elseif(strcmp($model->password2, $model->password1) != 0) 
			{
				$model->password2Error = "Lösenorden matcher ej";
				$validateError = true;
			}
		}
		// if flag is true return false indicating validation failed. if not return true
		if ($validateError) {return false;}
		return true;
	}
	
	
	public static function validateLoginModel(&$model)
	{
		$validateError = false;
		
		// EMAIL
		if ($model->email)
		{
			$model->emailError = "Email address är obligatorisk";
			$validateError = true;
		} 
		else 
		{
			$model->email = self::strip_input($model->email);
	    	// check if e-mail address is well-formed
	    	if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) 
	    	{
	      	$model->emailError = "Ogiltligt format";
				$validateError = true;
			}
		}
		
		// PASSWORD 1
		if ($model->password)
		{
			$model->passwordError = "Ett lösenord är obligatoriskt";
			$validateError = true;
		} 
		else 
		{
			$model->password = self::strip_input($model->password);
			if (strlen($model->password) < 5) 
			{
				$model->passwordError = "Lösenordet måste vara minst 6 tecken";
				$validateError = true;
			}
		}
		if ($validateError) {return false;}
		return true;
	}
	
	static function strip_input ($data) 
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}