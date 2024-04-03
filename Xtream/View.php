<?php
namespace Xtream\MVC;
class View {
	private $_title = "";
	private $_layout = "";
	private $_content = "";
	private $_navigation = "";
	private $_model = null;
	
	public function setTitle($val)
	{
		$this->_title = $val;
	}
	
	public function setNavigation($val)
	{
		$this->_navigation = $val;
	}
	
	public function setModel(&$val)
	{
		$this->_model = $val;
	}
	
	public function getModel()
	{
		return$this->_model;
	}
	
	public function getTitle()
	{
		return $this->_title;
	}
	
	public function getNavigation()
	{
		return $this->_navigation;
	}
	
	public function setLayout($val)
	{
		$this->_layout = $val;
	}
	
	public function setContent($val)
	{
		$this->_content = $val;
	}
	
	public function getContent()
	{
		return $this->_content;
	}
	
	public function render()
	{
		include $this->_layout;
	}
}