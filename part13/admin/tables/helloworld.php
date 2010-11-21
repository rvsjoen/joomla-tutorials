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
}
