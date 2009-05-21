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
 * Hello Hello Controller
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloControllerHello extends JController {
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct() {
		parent::__construct();
		// Register Extra tasks
		$this->registerTask('add', 'edit');
	}
	/**
	 * display the edit form
	 * @return void
	 */
	function edit() {
		$model = & $this->getModel('hello');
		$view = & $this->getView('hello');
		$view->setModel($model, true);
		$view->display();
	}
	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save() {
		$model = $this->getModel('hello');
		if ($model->save()) {
			$msg = JText::_('HELLO_GREETING_SAVED');
			$type = 'message';
			$this->setRedirect('index.php?option=com_hello', $msg, $type);
		} else {
			$msg = JText::sprintf('HELLO_ERROR_SAVING_GREETING', $model->getError());
			$type = 'error';
			$app = & JFactory::getApplication();
			$app->enqueueMessage($msg, $type);
			$view = & $this->getView('hello');
			$view->setModel($model, true);
			$view->display();
		}
	}
	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel() {
		$msg = JText::_('HELLO_EDIT_CANCELLED');
		$this->setRedirect('index.php?option=com_hello', $msg);
	}
}

