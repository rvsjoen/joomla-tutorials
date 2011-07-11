<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class HelloWorldModelHelloWorld extends JModelItem
{
	protected $item;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getItem() 
	{
		if (!isset($this->item)) {
			$this->item = 'Hello World!';
		}
		return $this->item;
	}
}
