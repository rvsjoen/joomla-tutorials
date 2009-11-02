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
// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * HTML View class for the HelloWorld Component
 *
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloViewHello extends JView {
	protected $msg=null;
	function display($tpl = null) {
		$msg = $this->get('Msg');
		$this->assignRef('msg', $msg);
		parent::display($tpl);
	}
}

