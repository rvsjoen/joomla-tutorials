<?php
/**
 * @version    $Id$
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @author     Christophe Demko
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @license    GNU/GPL
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
/**
 * Hello Model
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloModelHello extends JModelItem {
	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getMsg() {
		return $this->getState('msg');
	}
	/**
	 * Method to auto-populate the model state.
	 *
	 * This method should only be called once per instantiation and is designed
	 * to be called on the first call to the getState() method unless the model
	 * configuration flag to ignore the request is set.
	 *
	 * @return	void
	 */
	protected function _populateState() {
		$query = new JQuery;
		// Select some field
		$query->select('greeting, cat.title as category');
		// From hello table
		$query->from('#__hello as hello');
		// Join over the categories.
		$query->join('LEFT', '#__categories AS cat ON cat.id = catid');
		// Order by rand
		$query->order('RAND()');
		$db = & $this->getDBO();
		$db->setQuery($query->toString(), 0, 1);
		$msg = & $db->loadObject();
		$this->setState('msg', $msg);
	}
}

