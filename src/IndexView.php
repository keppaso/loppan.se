<?php
require_once __DIR__ . "/../Xtream/View.php";

class IndexView extends Xtream\MVC\View
{
	public $_logo = "";
	
	public function setLogo($val)
	{
		$this->_logo = $val;
	}
	
	public function getLogo()
	{
		return $this->_logo;	
	}
}