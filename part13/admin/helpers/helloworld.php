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

// No direct access to this file
defined('_JEXEC') or die;

/**
 * HelloWorld component helper.
 */
class HelloWorldHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('com_helloworld_Messages'), 'index.php?option=com_helloworld', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('com_helloworld_Categories'), 'index.php?option=com_categories&view=categories&extension=com_helloworld', $submenu == 'categories');
		$document = & JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-categories {background-image: url(../media/com_helloworld/images/tux-48x48.png)!important;}');
		$document->addStyleDeclaration('.icon-48-helloworld {background-image: url(../media/com_helloworld/images/tux-48x48.png)!important;}');
		if ($submenu == 'categories') $document->setTitle(JText::_('com_helloworld_Administration') . ' - ' . JText::_('com_helloworld_Categories'));
	}
}
