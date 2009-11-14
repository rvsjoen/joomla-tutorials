<?php
/**
 * @version    $Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @author     Christophe Demko
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @license    GNU/GPL
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1>
	<?php echo $this->item->greeting;?>
	<?php if ($this->item->params->get('show_category') && !empty($this->category->title)):?>
		(<?php echo $this->category->title;?>)
	<?php endif;?>
</h1>
