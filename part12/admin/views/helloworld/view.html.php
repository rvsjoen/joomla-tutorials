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
	 * View script
	 */
	protected $script = null;

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

		// get the script
		$script = & $this->get('Script');

		// Check for errors
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return;
		}

		// Bind the Data
		$form->bind($data);

		// Assign the form
		$this->form = $form;

		// Assign the script
		$this->script = $script;

		// Set the toolbar
		$this->_setToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->_setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function _setToolBar() 
	{
		JRequest::setVar('hidemainmenu', 1);
		$isNew = ($this->form->getValue('id') < 1);
		JToolBarHelper::title(JText::_('com_helloworld_Manager') . ': <small><small>[ ' . ($isNew ? JText::_('JToolBar_New') : JText::_('JToolBar_Edit')) . ' ]</small></small>', 'helloworld', 'helloworld');
		JToolBarHelper::save('helloworld.save');
		JToolBarHelper::cancel('helloworld.cancel', $isNew ? 'JToolBar_Cancel' : 'JToolBar_Close');
	}

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function _setDocument() 
	{
		$isNew = ($this->form->getValue('id') < 1);
		$document = & JFactory::getDocument();
		$document->setTitle(JText::_('com_helloworld_Administration') . ' - ' . ($isNew ? JText::_('com_helloworld_HelloWorld_Creating') : JText::_('com_helloworld_HelloWorld_Editing')));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . 'administrator/components/com_helloworld/views/helloworld/submitbutton.js');
		JText::script('com_helloworld_HelloWorld_Error_Some_Values_Are_Unacceptable');
	}
}
