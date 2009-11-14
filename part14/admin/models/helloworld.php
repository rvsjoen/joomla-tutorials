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
	 * Method to auto-populate the model state.
	 */
	protected function _populateState() 
	{
		$app = JFactory::getApplication('administrator');
		// Load the User state.
		if (!($pk = (int)$app->getUserState('com_helloworld.edit.helloworld.id'))) 
		{
			$pk = (int)JRequest::getInt('id');
		}
		$this->setState('helloworld.id', $pk);
	}
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
			$data = & JRequest::getVar('jform');
			if (empty($data)) 
			{
				$selected = $this->getState('helloworld.id');
				$data = $this->getTable();
				$data->load((int)$selected);
			}
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
		$form = & parent::getForm('helloworld', 'form', array(
			'array' => 'jform'
		) , false);
		return $form;
	}
	/**
	 * Method to get the javascript attached to the form
	 *
	 * @return string URL to the script.
	 */
	function getScript() 
	{
		return 'administrator/components/com_helloworld/models/forms/helloworld.js';
	}
	/**
	 * Method to save a record
	 *
	 * @param array $data array of data
	 * @access	public
	 * @return	boolean	True on success
	 */
	function save($data) 
	{
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

