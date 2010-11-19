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
	 * @var object $item
	 */
	protected $item;

	/**
	 * @var object $category
	 */
	protected $category;

	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getItem() 
	{
		if (!isset($this->item)) 
		{
			$id = JRequest::getInt('id');
			// Get a TableHelloWorld instance
			$table = $this->getTable();
			// Load the message
			$table->load($id);
			// Add global parameters
			$params = clone JFactory::getApplication('site')->getParams();
			$params->merge($table->params);
			$table->params = $params;
			// Assign the message
			$this->item = $table;
		}
		return $this->item;
	}

	/**
	 * Get the category
	 * @return object The category assigned to the message
	 */
	public function getCategory() 
	{
		if (!isset($this->category)) 
		{
			$catid = $this->getItem()->catid;
			// Get a TableHelloWorld instance
			$table = $this->getTable('Category', 'JTable');
			// Load the category
			$table->load($catid);
			// Assign the category
			$this->category = $table;
		}
		return $this->category;
	}
}

