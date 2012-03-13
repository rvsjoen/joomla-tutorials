<?php 

/**
 * @package	Joomla.Tutorials
 * @subpackage	Module
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license	License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
?>

<p><?php echo $params->get('greeting', JText::_('MOD_HELLOWORLD_GREETING_DEFAULT')); ?></p>
<p><?php echo modHelloWorldHelper::getGreeting(); ?></p>
<p>There are <?php echo modHelloWorldHelper::getCurrentUsers(); ?> user(s) logged in</p>
