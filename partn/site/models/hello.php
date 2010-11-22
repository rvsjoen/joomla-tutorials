<?php

/**
 * @version		$Id$
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Hello Model
 *
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloModelHello extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg = null;

	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getMsg() 
	{
		if (empty($this->msg)) 
		{
			$query = new JQuery;
			// Select some field
			$query->select('greeting, cat.title as category');

			// From hello table
			$query->from('#__hello as hello');

			// Join over the categories.
			$query->join('LEFT', '#__categories AS cat ON cat.id = catid');

			// Order by rand
			$query->order('RAND()');
			$this->_db->setQuery((string)$query, 0, 1);
			$this->msg = & $this->_db->loadObject();
		}
		return $this->msg;
	}
}
