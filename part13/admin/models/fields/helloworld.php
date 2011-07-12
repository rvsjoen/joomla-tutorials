<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

class JFormFieldHelloWorld extends JFormFieldList
{
	protected $type = 'HelloWorld';

	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('a.id as id, a.greeting as greeting, b.title as category, b.id as catid');
		$query->from('#__helloworld a');
		$query->leftJoin('#__categories b on a.catid=b.id');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if($messages){
			foreach($messages as $message){
				$options[] = JHtml::_('select.option', $message->id, 
					$message->greeting . ($message->catid ? ' (' . $message->category . ')' : ''));
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
