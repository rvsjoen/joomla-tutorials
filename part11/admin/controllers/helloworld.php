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
// inherit general controller
require_once JPATH_COMPONENT . DS .'controller.php';
/**
 * HelloWorld Controller
 */
class HelloWorldControllerHelloWorld extends HelloWorldController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct($config=array()) 
	{
		parent::__construct($config);
		// Register Extra tasks
		$this->registerTask('add', 'edit');
	}
	/**
	 * display the edit form
	 * @return void
	 */
	function edit() 
	{
		$model = & $this->getModel();
		$view = & $this->getView('HelloWorld','html');
		$view->setModel($model, true);
		$view->display();
	}
	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save() 
	{
		$model = $this->getModel();
		if ($model->save()) 
		{
			$msg = JText::_('com_helloworld_HelloWorld_Greeting_saved');
			$type = 'message';
			$this->setRedirect('index.php?option=com_helloworld', $msg, $type);
		}
		else
		{
			$msg = JText::sprintf('com_helloworld_HelloWorld_Error_Saving_greeting', implode("<br />", $model->getError()));
			$type = 'error';
			$app = & JFactory::getApplication();
			$app->enqueueMessage($msg, $type);
			$view = & $this->getView('HelloWorld','html');
			$view->setModel($model, true);
			$view->display();
		}
	}
	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel() 
	{
		$msg = JText::_('com_helloworld_HelloWorld_edit_cancelled');
		$this->setRedirect('index.php?option=com_helloworld', $msg);
	}
}

