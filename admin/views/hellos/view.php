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
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * Hellos View
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class HelloViewHellos extends JView {
	/**
	 * items to be displayed
	 */
	protected $items = null;
	/**
	 * pagination for the items
	 */
	protected $pagination = null;
	/**
	 * Hellos view display method
	 * @return void
	 */
	function display($tpl = null) {
		// Get data from the model
		$items = & $this->get('Items');
		$pagination = & $this->get('Pagination');
		// Assign data to the view
		$this->assignRef('items', $items);
		$this->assignRef('pagination', $pagination);
		// Display the template
		parent::display($tpl);
	}
}

