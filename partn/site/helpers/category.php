<?php

/**
 * @version		$Id$
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Component Helper
jimport('joomla.application.component.helper');
jimport('joomla.application.categorytree');

/**
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 */
class HelloCategories extends JCategoryTree
{
	public function __construct($options = array()) 
	{
		$options['table'] = 'hello';
		$options['extension'] = 'com_hello';
		parent::__construct($options);
	}
}
