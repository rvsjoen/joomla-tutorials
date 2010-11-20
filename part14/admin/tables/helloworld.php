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
// No direct access
defined('_JEXEC') or die('Restricted access');
// import Joomla table library
jimport('joomla.database.table');

/**
 * Hello Table class
 */
class HelloWorldTableHelloWorld extends JTable
{

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__helloworld', 'id', $db);
	}

	/**
	 * Overloaded bind function
	 *
	 * @param	array		$hash named array
	 * @return	null|string	null is operation was satisfactory, otherwise returns an error
	 * @see JTable:bind
	 * @since 1.5
	 */
	public function bind($array, $ignore = '') 
	{
		if (isset($array['params']) && is_array($array['params'])) 
		{
			// Convert the params field to an string.
			$parameter = new JParameter;
			$parameter->loadArray($array['params']);
			$array['params'] = $parameter->toString();
		}
		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules'])) 
		{
			$rules = new JRules($array['rules']);
			$this->setRules($rules);
		}
		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded load function
	 *
	 * @param	int $pk primary key
	 * @param	boolean $reset reset data
	 * @return	boolean
	 * @see JTable:load
	 */
	public function load($pk = null, $reset = true) 
	{
		if (parent::load($pk, $reset)) 
		{
			// Convert the params field to a parameter.
			$parameter = new JParameter;
			$parameter->loadJSON($this->params);
			$this->params = $parameter;
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return	string
	 * @since	1.6
	 */
	protected function _getAssetTitle() 
	{
		return $this->greeting;
	}

	/**
	 * Get the parent asset id for the record
	 *
	 * @return	int
	 */
	protected function _getAssetParentId() 
	{
		// Initialize variables.
		$assetId = null;
		// This is a article under a category.
		if ($this->catid) 
		{
			// Build the query to get the asset id for the parent category.
			$query = new JQuery;
			$query->select('asset_id');
			$query->from('#__categories');
			$query->where('id = ' . (int)$this->catid);
			// Get the asset id from the database.
			$this->_db->setQuery($query);
			if ($result = $this->_db->loadResult()) 
			{
				$assetId = (int)$result;
			}
		}
		// This is an uncategorized article that needs to parent with the extension.
		elseif ($assetId === null) 
		{
			// Build the query to get the asset id for the parent category.
			$query = new JQuery;
			$query->select('id');
			$query->from('#__assets');
			$query->where('name = "com_helloworld"');
			// Get the asset id from the database.
			$this->_db->setQuery($query);
			if ($result = $this->_db->loadResult()) 
			{
				$assetId = (int)$result;
			}
		}
		// Return the asset id.
		if ($assetId) 
		{
			return $assetId;
		}
		else
		{
			return parent::_getAssetParentId();
		}
	}
}

