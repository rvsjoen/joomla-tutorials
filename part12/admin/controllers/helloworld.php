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
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
/**
 * HelloWorld Controller
 */
class HelloWorldControllerHelloWorld extends JControllerForm
{
	function __construct ($config=array())
	{
		parent::__construct($config);
		jimport('joomla.form.formvalidator');
		JFormValidator::addRulePath(JPATH_COMPONENT . DS . 'models' . DS . 'rules');
	}
	protected $_view_list = 'HelloWorldList';
}

