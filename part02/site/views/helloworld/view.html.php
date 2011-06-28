<?php

/**
 * @version		$Id:$
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class HelloWorldViewHelloWorld extends JView
{
	function display($tpl = null) 
	{
		// Assign data to the view
		$this->msg = 'Hello World';

		// Display the view
		parent::display($tpl);
	}
}
