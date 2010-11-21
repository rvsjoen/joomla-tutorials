<?php
/**
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @author		Christophe Demko
 * @license		License GNU General Public License version 2 or later
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php" method="post" name="adminForm">
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate('header'); ?></thead>
		<tfoot><?php echo $this->loadTemplate('footer'); ?></tfoot>
		<tbody><?php echo $this->loadTemplate('body'); ?></tbody>
	</table>
	<input type="hidden" name="option" value="com_hello" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="task" value="hellos.display" />
</form>

