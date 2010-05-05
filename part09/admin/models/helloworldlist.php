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
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class HelloWorldModelHelloWorldList extends JModelList
{
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_helloworld.helloworldlist';
	/**
	 * Method to remove the selected items
	 *
	 * @return	boolean	true of false in case of failure
	 */
	public function remove() 
	{
		// Get the selected items
		$selected = $this->getState('selected');
		// Get a weblink row instance
		$table = $this->getTable('HelloWorld');
		foreach($selected as $id) 
		{
			// Load the row and check for an error.
			if (!$table->load($id)) 
			{
				$this->setError($table->getError());
				return false;
			}
			// Delete the row and check for an error.
			if (!$table->delete()) 
			{
				$this->setError($table->getError());
				return false;
			}
		}
		return true;
	}
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery() 
	{
		// Create a new query object.		
        $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('id,greeting');
		// From the hello table
		$query->from('#__helloworld');
		return $query;
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
	protected function populateState() 
	{
		// Initialize variables.
		$app = JFactory::getApplication('administrator');
		// Load the list state.
		$this->setState('list.start', $app->getUserStateFromRequest($this->_context . '.list.start', 'limitstart', 0, 'int'));
		$this->setState('list.limit', $app->getUserStateFromRequest($this->_context . '.list.limit', 'limit', $app->getCfg('list_limit', 25) , 'int'));
		$this->setState('selected', JRequest::getVar('cid', array()));
	}
}

