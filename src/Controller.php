<?php
class Controller
{
	private $_view = null;
	private $_model = null;
	
	function __construct($view)
	{
		$this->_view = $view;
	}
	
	public function setModel(&$val)
	{
		$this->_model = $val;
		$this->_view->setModel($val);
	}
	
	public function getModel()
	{
		return $this->_model;
	}
	
	public function renderView()
	{
		$this->_view->render();
	}
}