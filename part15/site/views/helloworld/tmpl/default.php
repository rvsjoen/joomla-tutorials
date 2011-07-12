<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

?>
<h1>
	<?php echo $this->item->greeting; ?>
	<?php if($this->item->category && $this->item->params->get('show_category')): ?>
		<?php echo ' ('.$this->item->category.') '; ?>
	<?php endif; ?>
</h1>
