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
		// Check for errors
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("<br />", $errors));
			return;
		}
		// Bind the Data
		$form->bind($data);
		// Assign the Form
		$this->assignRef('form', $form);
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
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('HELLO_ADMINISTRATOR') . ' - ' . JText::_('HELLO_HELLO_EDITING'));
		$document->addScriptDeclaration("
function submitbutton(task)
{
	if (task == 'helloworld.cancel' || document.formvalidator.isValid(document.adminForm)) {
		submitform(task);
	} else {
		alert('" . JText::_("HELLO_SOME_VALUES_ARE_UNACCEPTABLE") . "');
		return false;
	}
}
");
		$isNew = ($this->form->getValue('id') < 1);
		$text = $isNew ? JText::_('HELLO_NEW') : JText::_('HELLO_EDIT');
		JToolBarHelper::title(JText::_('HELLO_HELLO') . ': <small><small>[ ' . $text . ' ]</small></small>','helloworld');
		JToolBarHelper::save('helloworld.save');
		if ($isNew) 
		{
			JToolBarHelper::cancel('helloworld.cancel');
		}
		else
		{
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel('helloworld.cancel', 'HELLO_CLOSE');
		}
	}
}

