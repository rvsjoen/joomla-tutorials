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
// import Joomla controller library
jimport('joomla.application.component.controller');
/**
 * Hello Hellos Controller
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloControllerHellos extends JController {
	/**
	 * display record(s)
	 * @return void
	 */
	public function display() {
		$model = & $this->getModel('hellos');
		$view = & $this->getView('hellos');
		$view->setModel($model, true);
		$view->display();
	}
	/**
	 * remove record(s)
	 * @return void
	 */
	function remove() {
		$model = $this->getModel('hellos');
		if ($model->remove()) {
			$msg = JText::_('HELLO_GREETINGS_REMOVED');
			$type = 'message';
		} else {
			$msg = JText::sprintf('HELLO_ONE_OR_MORE_GREETINGS_COULD_NOT_BE_DELETED',$model->getError());
			$type = 'error';
		}
		$this->setRedirect('index.php?option=com_hello', $msg, $type);
	}
}
