<?php

/**
 * @version		$Id$
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
	protected $msg;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getMsg() 
	{
		if (!isset($this->msg)) {
			$id = JRequest::getInt('id');
			switch ($id) 
			{
			case 2:
				$this->msg = 'Good bye World!';
			break;
			default:
			case 1:
				$this->msg = 'Hello World!';
			break;
			}
		}
		return $this->msg;
	}
}
