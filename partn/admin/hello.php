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
// Verify access rights
$user = & JFactory::getUser();
if (!$user->authorize('com_hello.manage') && false /* to be removed when acl will be OK*/) {
	JFactory::getApplication()->redirect('index.php', JText::_('ALERTNOTAUTH'));
}
// import joomla controller library
jimport('joomla.application.component.controller');
// Set the default task
JRequest::setVar('task', JRequest::getVar('task', 'hellos.display'));
// Get an instance of the controller prefixed by Hello
$controller = JController::getInstance('Hello');
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
// Redirect if set by the controller
$controller->redirect();

