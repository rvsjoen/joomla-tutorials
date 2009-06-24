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
// import Joomla modelitem library
jimport('joomla.application.component.modelform');
/**
 * Hello Hello Model
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloModelHello extends JModelForm {
	/**
	 * Method to get the data.
	 *
	 * @access	public
	 * @return	array of string
	 * @since	1.0
	 */
	public function &getData() {
		$data = $this->getState('data');
		return $data;
	}
	/**
	 * Method to get the hello form.
	 *
	 * @access	public
	 * @return	mixed	JForm object on success, false on failure.
	 * @since	1.0
	 */
	public function &getForm() {
		// Get the form.
		jimport('joomla.form.form');
		jimport('joomla.form.formvalidator');
		JForm::addFormPath(dirname(__FILE__) . DS . basename(__FILE__, ".php") . DS . 'forms');
		JForm::addFieldPath(dirname(__FILE__) . DS . basename(__FILE__, ".php") . DS . 'fields');
		JFormValidator::addRulePath(dirname(__FILE__) . DS . basename(__FILE__, ".php") . DS . 'rules');
		$form = & JForm::getInstance('hello_form', 'hello', true, array('array' => true));
		// Check for an error.
		if (JError::isError($form)) {
			$this->setError($form->getMessage());
			$false = false;
			return $false;
		}
		return $form;
	}
	/**
	 * Method to save a record
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function save() {
		$data = &$this->getData();
		$form = &$this->getForm();
		// Validate the data with respect to the form
		if (!$this->validate($form, $data)) {
			return false;
		}

		// Database processing
		$row = & $this->getTable();
		// Bind the form fields to the hello table
		if (!$row->save($data)) {
			$this->setError($row->getErrorMsg());
			return false;
		}
		return true;
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
		$app = & JFactory::getApplication();
		$data = & JRequest::getVar('hello_form');
		if (empty($data)) {
			$selected = JRequest::getVar('cid', 0, '', 'array');
			$query = new JQuery;
			// Select all fields from the hello table.
			$query->select('*');
			$query->from('`#__hello`');
			$query->where('id = ' . (int)$selected[0]);
			$db = & $this->getDBO();
			$db->setQuery($query->toString());
			$data = & $db->loadAssoc();
		}
		if (empty($data)) {
			// Check the session for previously entered form data.
			$data = $app->getUserState('com_hello.edit.hello.data', array());
			unset($data['id']);
		}
		$app->setUserState('com_hello.edit.hello.data', $data);
		$this->setState('data', $data);
	}
}

