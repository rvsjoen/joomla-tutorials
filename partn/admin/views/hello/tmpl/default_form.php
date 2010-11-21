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
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" class="form-validate">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'HELLO_DETAILS' ); ?></legend>
		<table class="admintable">
			<?php foreach($this->form->getFields() as $field): ?>
				<?php if ($field->hidden): ?>
					<?php echo $field->input; ?>
				<?php else: ?>
					<tr>
						<td width="40%" class="key"><?php echo $field->label; ?></td>
						<td><?php echo $field->input; ?></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_hello" />
	<input type="hidden" name="task" value="hello.edit" />
</form>

