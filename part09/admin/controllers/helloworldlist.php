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
// import Joomla controller library
jimport('joomla.application.component.controller');
/**
 * HelloWorldList Controller
 */
class HelloWorldControllerHelloWorldList extends HelloWorldController
{
	/**
	 * remove record(s)
	 * @return void
	 */
	function remove() 
	{
		$model = $this->getModel('HelloWorldList');
		if ($model->remove()) 
		{
			$msg = JText::_('com_helloworld_HelloWorldList_Greetings_removed');
			$type = 'message';
		}
		else
		{
			$msg = JText::sprintf('com_helloworld_HelloWorldList_One_or_more_greetings_could_not_be_deleted', implode("<br />", $model->getErrors()));
			$type = 'error';
		}
		$this->setRedirect('index.php?option=com_helloworld', $msg, $type);
	}
}

