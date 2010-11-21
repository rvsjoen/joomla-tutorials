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

// No direct access
defined('_JEXEC') or die('Restricted access');

// import Hello controller
require_once JPATH_COMPONENT . DS . 'controller.php';

/**
 * Hello Hellos Controller
 *
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloControllerHellos extends HelloController
{

	/**
	 * display record(s)
	 * @return void
	 */
	public function display() 
	{
		// Load the submenu (this file is also automatically used by the com_categories component)
		require_once JPATH_COMPONENT . DS . 'helpers' . DS . 'hello.php';
		HelloHelper::addSubmenu('messages');

		// Display the view
		$model = & $this->getModel('hellos');
		$view = & $this->getView('hellos');
		$view->setModel($model, true);
		$view->display();
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove() 
	{
		$model = $this->getModel('hellos');
		if ($model->remove()) 
		{
			$msg = JText::_('HELLO_GREETINGS_REMOVED');
			$type = 'message';
		}
		else
		{
			$msg = JText::sprintf('HELLO_ONE_OR_MORE_GREETINGS_COULD_NOT_BE_DELETED', $model->getError());
			$type = 'error';
		}
		$this->setRedirect('index.php?option=com_hello', $msg, $type);
	}
}
