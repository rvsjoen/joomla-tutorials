<?php

/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Hello World component helper.
 *
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('HELLO_MESSAGES'), 'index.php?option=com_hello', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('HELLO_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_hello', $submenu == 'categories');
	}
}
