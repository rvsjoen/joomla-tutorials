<?php
/**
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @author     Christophe Demko
 * @license    GNU/GPL
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * Hello View
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloViewHello extends JView {
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
		$isNew = ($this->form->getValue('id') < 1);
		$text = $isNew ? JText::_('HELLO_NEW') : JText::_('HELLO_EDIT');
		JToolBarHelper::title(JText::_('HELLO_HELLO') . ': <small><small>[ ' . $text . ' ]</small></small>');
		JToolBarHelper::save('hello.save');
		if ($isNew) {
			JToolBarHelper::cancel('hello.cancel');
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel('hello.cancel', 'HELLO_CLOSE');
		}
	}	
}

