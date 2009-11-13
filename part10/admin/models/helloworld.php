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
// import Joomla modelform library
jimport('joomla.application.component.modelform');
/**
 * HelloWorld Model
 */
class HelloWorldModelHelloWorld extends JModelForm
{
	/**
	 * @var array data
	 */
	protected $data = null;
	/**
	 * Method to get the data.
	 *
	 * @access	public
	 * @return	array of string
	 * @since	1.0
	 */
	public function &getData() 
	{
		if (empty($this->data)) 
		{
			$app = & JFactory::getApplication();
			$data = & JRequest::getVar('jform');
			if (empty($data)) 
			{
				$selected = & JRequest::getVar('cid', 0, '', 'array');
				$query = new JQuery;
				// Select all fields from the hello table.
				$query->select('*');
				$query->from('`#__helloworld`');
				$query->where('id = ' . (int)$selected[0]);
				$this->_db->setQuery((string)$query);
				$data = & $this->_db->loadAssoc();
			}
			if (empty($data)) 
			{
				// Check the session for previously entered form data.
				$data = $app->getUserState('com_helloworld.edit.helloworld.data', array());
				unset($data['id']);
			}
			$app->setUserState('com_helloworld.edit.helloworld.data', $data);
			$this->data = $data;
		}
		return $this->data;
	}
	/**
	 * Method to get the HelloWorld form.
	 *
	 * @access	public
	 * @return	mixed	JForm object on success, false on failure.
	 * @since	1.0
	 */
	public function &getForm() 
	{
		$form = & parent::getForm('helloworld', 'form', array('array' => 'jform') , false);
		return $form;
	}
	/**
	 * Method to save a record
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function save() 
	{
		$data = & $this->getData();
		// Database processing
		$row = & $this->getTable();
		// Bind the form fields to the hello table
		if (!$row->save($data)) 
		{
			$this->setError($row->getErrorMsg());
			return false;
		}
		return true;
	}
}

