<?php

/**
 * @package 	Joomla.Tutorials
 * @subpackage 	Component
 * @copyright 	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license 	License GNU General Public License version 2 or later; see LICENSE.txt
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
			$id = JRequest::getInt('id');
			switch ($id)
			{
				case 2:
					$this->item = 'Good bye World!';
					break;
				default:
				case 1:
					$this->item = 'Hello World!';
				break;
			}
		}
		return $this->item;
	}
}
