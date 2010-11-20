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
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorldList View
 */
class HelloWorldViewHelloWorlds extends JView
{

	/**
	 * HelloWorldList view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("<br />", $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
		// Set the toolbar
		$this->addToolBar();
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS'));
		JToolBarHelper::deleteListX('', 'helloworld.delete');
		JToolBarHelper::editListX('helloworld.edit');
		JToolBarHelper::addNewX('helloworld.add');
	}
}

