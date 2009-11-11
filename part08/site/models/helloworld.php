<?php
/**
 * @version    $Id: hello.php 15 2009-11-02 18:37:15Z chdemko $
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @author     Christophe Demko
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @license    GNU/GPL
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
/**
 * HelloWorld Model
 */
class HelloWorldModelHelloWorld extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg;
	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getMsg() 
	{
		if (!isset($this->msg)) 
		{
			$id = JRequest::getInt('id');
			// Get a TableHelloWorld instance
			$table = $this->getTable();
			// Load the message
			$table->load($id);
			// Assign the message
			$this->msg = $table->greeting;
		}
		return $this->msg;
	}
}

