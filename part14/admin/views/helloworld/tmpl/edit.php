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
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_helloworld'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_( 'com_helloworld_HelloWorld_Details' ); ?></legend>
			<?php foreach($this->form->getFields() as $field): ?>
				<?php if (!$field->hidden): ?>
					<?php echo $field->label; ?>
				<?php endif; ?>
				<?php echo $field->input; ?>
			<?php endforeach; ?>
		</fieldset>
	</div>
	<div class="width-40 fltrt">
		<fieldset class="adminform">
			<legend><?php echo JText::_( 'com_helloworld_HelloWorld_Options' ); ?></legend>
			<?php foreach($this->form->getFields('params') as $field): ?>
				<?php if (!$field->hidden): ?>
					<?php echo $field->label; ?>
				<?php endif; ?>
				<?php echo $field->input; ?>
			<?php endforeach; ?>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_( 'com_helloworld_HelloWorld_Permissions' ); ?></legend>
			<?php foreach($this->form->getFields('permissions') as $field): ?>
				<?php if (!$field->hidden): ?>
					<?php echo $field->label; ?>
				<?php endif; ?>
				<?php echo $field->input; ?>
			<?php endforeach; ?>
		</fieldset>
	</div>
	<input type="hidden" name="task" value="helloworld.edit" />
	<?php echo JHtml::_('form.token'); ?>
</form>

