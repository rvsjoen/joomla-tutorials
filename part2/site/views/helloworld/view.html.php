<?php
/**
 * @version    $Id: view.html.php 15 2009-11-02 18:37:15Z chdemko $
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @author     Christophe Demko
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @license    GNU/GPL
 */
// No direct access to this file
defined( '_JEXEC' ) or die( 'Restricted access' );
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * HTML View class for the HelloWorld Component
 *
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloWorldViewHelloWorld extends JView {
	protected $msg=null;
	// Overwriting JView display method
	function display($tpl = null) {
		// Assign data to the view
		$this->msg = 'Hello World';
		// Display the view
		parent::display($tpl);
	}
}

