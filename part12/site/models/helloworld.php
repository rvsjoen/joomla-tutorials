<?php

/**
 * @version		$Id$
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class HelloWorldModelHelloWorld extends JModelItem
{
	protected $msg;

	public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getMsg() 
	{
		if (!isset($this->msg)) {
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
