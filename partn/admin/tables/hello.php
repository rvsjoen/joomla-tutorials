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
// import Joomla table library
jimport('joomla.database.table');
/**
 * Hello Table class
 *
 * @package    Joomla16.Tutorials
 * @subpackage Components
 */
class TableHello extends JTable {
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;
	/**
	 * Category id
	 *
	 * @var int
	 */
	var $catid = null;
	/**
	 * @var string
	 */
	var $greeting = null;
	/**
	 * @var int
	 */
	var $checked_out = null;
	/**
	 * @var date/time
	 */
	var $checked_out_time = null;
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableHello(&$db) {
		parent::__construct('#__hello', 'id', $db);
	}
}

