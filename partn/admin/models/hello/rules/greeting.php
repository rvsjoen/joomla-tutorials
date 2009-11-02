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
// import Joomla formrule library
jimport('joomla.form.formrule');
/**
 * Form Rule class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormRuleGreeting extends JFormRule {
	/**
	 * The regular expression.
	 *
	 * @access	protected
	 * @var		string
	 * @since	1.6
	 */
	protected $_regex='^[^0-9]+$';
}

