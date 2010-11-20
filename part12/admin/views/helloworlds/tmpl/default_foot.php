<?php
/**
 * default head template file for HelloWorldList view of HelloWorld component
 *
 * @version    $Id$
 * @package    Joomla16.Tutorials
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @author     Christophe Demko
 * @link       http://joomlacode.org/gf/project/helloworld_1_6/
 * @license    GNU/GPL
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<td colspan="3"><?php echo $this->pagination->getListFooter(); ?></td>
</tr>
