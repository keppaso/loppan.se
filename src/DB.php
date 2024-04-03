<?php
require_once __DIR__ . "/../Models/LoginModel.php";
require_once __DIR__ . "/../Models/AddGalleryModel.php";

/* This class is a helper class for database access. contains a few useful functions for this website */
class DB {
	private $server = "localhost";
	private $db_name = "Mamma";
	private $username = "root";
	private $password = "rsklmn1o6";
	
	private $connection;
	
	public function __construct($server = null, $db = null, $username = null, $password = null)
	{
		if ($server == null) {$this->server = "localhost";} else {$this->server = $server;}
		
		$this->db_name = $db;
		$this->username = $username;
		$this->password = $password;
	}
	
	function __destruct() {
		$this->close();
	}
	
	public function setDatabaseName($db)
	{
		$this->db_name = $db;	
	}
	
	public function setUsername($usrname)
	{
		$this->username = $usrname;	
	}
	
	public function setPassword($pass)
	{
		$this->password = $pass;	
	}
	
	public function getConnection()
	{
		return $this->connection;
	}
	
	public function connect()
	{
		try
		{
			$this->connection = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db_name, 
												$this->username, $this->password);
		}
		catch(PDOException $pdo)
		{	
			echo $pdo->getCode() . " | " . $pdo.getMessage();
			return false;
		}
		return true;
	}
	
	public function executeQuery($query, ...$parameters)
	{
		$statement = $this->connection->prepare($query);
		
		$count = 1;
		foreach($parameters as $param)
		{
			$statement->bindValue($count, $param);
			//$statement->bindParam($count, $param);
			$count++;
		}
		
		$statement->execute();
		return $statement;
	}
	
	public function close()
	{
		if (isset($this->connection))
			$this->connection = null;
	}
	
	public function addGalleryModel($model)
	{
		$this->executeQuery("INSERT INTO Pictures (url, description, memory, category, showmemory, createdby_id, createdby_name) VALUES(?,?,?,?,?,?,?)",
								$model->picture, $model->description, $model->memory, $model->category, $model->show_memory,
								$model->createdby_id, $model->createdby_name);
	}
	
	/*
		Add a Request of registration to DB
	*/
	public function addRequest($model)
	{
		$this->executeQuery("INSERT INTO Requests (name, lastname, email, password) VALUES(?,?,?,?)",
								$model->name, $model->lastname, $model->email, $model->password1);
	}
	
	/*
		Add a Heavinly message to DB
	*/
	public function addToHeaven($model)
	{
		$this->executeQuery("INSERT INTO Heaven (who, message) VALUES(?,?)",
								$model->who, $model->message);
	}

	/*
		Check if email exists in database, returns true if true else false
	*/
	public function isEmailRegistered($email)
	{
		$statement = $this->executeQuery('SELECT * FROM Users WHERE email = ?', $email);
		if ($statement != false)
		{
			/* returns false if an error occured or there are no element, good enough for me */
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			if ($result != false) {return true;}
		}
		return false;
	}

	
	/*
		Gets a LoginModel from email if it exists in database or null
	*/
	public function getLoginModel($email)
	{
		$statement = $this->executeQuery("SELECT * FROM Users WHERE email = ?", $email);
		if ($statement == false) {echo "executing query in getModel failed"; return false;}
		if ($statement != false)
		{
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			if ($result == false) {return false;}
			
			$model = new LoginModel();
			$model->id = $result["id"];
			$model->name = $result["name"];
			$model->lastname = $result["lastname"];
			$model->email = $result["email"];
			$model->password = $result["password"];
			$model->is_admin = $result["is_admin"];
			return $model;
		}
	}
}
?>