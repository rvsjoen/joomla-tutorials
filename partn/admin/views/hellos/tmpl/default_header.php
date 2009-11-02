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
?>
<tr>
	<th width="5">
		<?php echo JText::_( 'HELLO_ID' ); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
	</th>			
	<th>
		<?php echo JText::_( 'HELLO_GREETING' ); ?>
	</th>
	<th>
		<?php echo JText::_( 'HELLO_CATEGORY' ); ?>
	</th>
</tr>

