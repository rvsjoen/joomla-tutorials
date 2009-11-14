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
 */
class TableHelloWorld extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;
	/**
	 * @var string
	 */
	var $greeting = null;
	/**
	 * @var int
	 */
	var $catid = null;
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableHelloWorld(&$db) 
	{
		parent::__construct('#__helloworld', 'id', $db);
	}
}

