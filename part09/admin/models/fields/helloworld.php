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
defined('_JEXEC') or die;
// import the list field type
jimport('joomla.html.html.list');
/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldHelloWorld extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'HelloWorld';
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function _getOptions() 
	{
		$db = JFactory::getDBO();
		$query = new JQuery;
		$query->select('id,greeting');
		$query->from('#__helloworld');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		foreach($messages as $message) 
		{
			$options[] = JHtml::_('select.option', $message->id, $message->greeting);
		}
		$options = array_merge(parent::_getOptions() , $options);
		return $options;
	}
}

