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
	public function display($tpl = null) {
		// get the Form
		$form = & $this->get('Form');
		// get the Data
		$data = & $this->get('Data');
		// Bind the Data
		$form->bind($data);
		// Assign the Form
		$this->assignRef('form', $form);
		// Display the template
		parent::display($tpl);
	}
}

