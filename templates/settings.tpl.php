<?php

/**
* ownCloud - Internal Bookmarks plugin
*
* @author Xavier Beurois
* @copyright 2012 Xavier Beurois www.djazz-lab.net
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either 
* version 3 of the License, or any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*  
* You should have received a copy of the GNU Lesser General Public 
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

OCP\Util::addStyle('internal_bookmarks', 'styles');
OCP\Util::addScript('internal_bookmarks','settings.min');

?>
<fieldset class="section">
	<form id="intbks" method="POST" action="#">
		<h2>Internal Bookmarks</h2>
		<br>
		<input type="hidden" id="h_intbks" name="h_intbks" value="1" />
		<ul id="intbks_sortable">
		<?php foreach($_['bk_list'] as $bk){ ?>
		<li rel="intbks_<?php print($bk['bkid']); ?>" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php print($bk['bktitle']); ?></li>
		<?php } ?>
		</ul>
		<br>
		<input type="button" id="saveintbks" value="Save" />
	</form>
</fieldset>