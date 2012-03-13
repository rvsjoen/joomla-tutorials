<?php 

/**
 * @package	Joomla.Tutorials
 * @subpackage	Module
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license	License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

class modHelloWorldHelper
{
	public static function getGreeting() {
		return "Message from the helper";
	}

	public static function getCurrentUsers() {
		$db = JFactory::getDBO();
		$db->setQuery($db->getQuery(true)
			->select("COUNT(*) as users")
			->from("#__session")
		);
		return $db->loadResult();
	}
}
