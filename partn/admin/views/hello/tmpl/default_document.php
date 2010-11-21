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
$document = & JFactory::getDocument();
$document->setTitle(JText::_('HELLO_ADMINISTRATOR') . ' - ' . JText::_('HELLO_HELLO_EDITING'));
$document->addScriptDeclaration("
function submitbutton(task)
{
	if (task == 'hello.cancel' || document.formvalidator.isValid(document.adminForm)) {
		submitform(task);
	} else {
		alert('".JText::_("HELLO_SOME_VALUES_ARE_UNACCEPTABLE")."');
		return false;
	}
}
");
