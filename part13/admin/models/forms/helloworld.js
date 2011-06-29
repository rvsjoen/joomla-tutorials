/**
 * @version		$Id$
 * @package		Joomla.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

window.addEvent('domready', function() {
	document.formvalidator.setHandler('greeting',
		function (value) {
			regex=/^[^0-9]+$/;
			return regex.test(value);
	});
});

