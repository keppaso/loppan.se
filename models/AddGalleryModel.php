<?php
require_once __DIR__ . "/../src/ivalidate.php";
require_once __DIR__ . "/../src/ibind.php";

/* This class is a a data class for login_view.php that implements IBind and IValidate interface  */
class AddGalleryModel implements IBind, IValidate
{
	public $picture = "";
	public $description = "";
	public $category = "Vanlig hederlig dag";
	public $memory = "";
	public $show_memory = 0;
	public $createdby_id = 0;
	public $createdby_name = "";
	
	public $pictureError = "";
	
	public function bind()
	{
	}
	
	public function validate()
	{
	}
}