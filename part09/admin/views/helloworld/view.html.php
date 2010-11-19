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
// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorld View
 */
class HelloWorldViewHelloWorld extends JView
{

	/**
	 * View form
	 *
	 * @var		form
	 */
	protected $form = null;

	/**
	 * display method of Hello view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Form
		$form = & $this->get('Form');
		// get the Data
		$data = & $this->get('Data');
		// Bind the Data
		$form->bind($data);
		// Assign the form
		$this->form = $form;
		// Set the toolbar
		$this->_setToolBar();
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function _setToolBar() 
	{
		JRequest::setVar('hidemainmenu', 1);
		$isNew = ($this->form->getValue('id') < 1);
		JToolBarHelper::title(JText::_('com_helloworld_Manager') . ': <small><small>[ ' . ($isNew ? JText::_('JToolBar_New') : JText::_('JToolBar_Edit')) . ' ]</small></small>');
		JToolBarHelper::save('helloworld.save');
		JToolBarHelper::cancel('helloworld.cancel', $isNew ? 'JToolBar_Cancel' : 'JToolBar_Close');
	}
}

