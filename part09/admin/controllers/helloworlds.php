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
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * HelloWorldList Controller
 */
class HelloWorldControllerHelloWorlds extends JControllerAdmin
{

	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'HelloWorld', $prefix = 'HelloWorldModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}

