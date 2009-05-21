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
JRequest::setVar('hidemainmenu', 1);
$isNew = ($this->form->getValue('id') < 1);
$text = $isNew ? JText::_('HELLO_NEW') : JText::_('HELLO_EDIT');
JToolBarHelper::title(JText::_('HELLO_HELLO') . ': <small><small>[ ' . $text . ' ]</small></small>');
JToolBarHelper::save('hello.save');
if ($isNew) {
	JToolBarHelper::cancel('hello.cancel');
} else {
	// for existing items the button is renamed `close`
	JToolBarHelper::cancel('hello.cancel', 'HELLO_CLOSE');
}

