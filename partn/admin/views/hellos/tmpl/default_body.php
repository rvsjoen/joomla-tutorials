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
<?php for ($i=0, $n=count( $this->items ),$k=0; $i < $n; $i++,$k=1-$k): $row = &$this->items[$i]; ?>
	<tr class="row<?php echo $k;?>">
		<td>
			<?php echo $row->id; ?>
		</td>
		<td>
			<?php echo JHTML::_('grid.id',   $i, $row->id ); ?>
		</td>
		<td>
			<a href="<?php echo JRoute::_( 'index.php?option=com_hello&task=hello.edit&cid[]='. $row->id ); ?>">
				<?php echo $row->greeting; ?>
			</a>
		</td>
		<td>
			<?php echo $row->category; ?>
		</td>
	</tr>
<?php endfor; ?>

