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

OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('internal_bookmarks');

$c = $_POST['c'];
$k = OC_IntBks::getItemByTarget($c);

if(count($k) > 0){
	OC_IntBks::deleteItemByTarget($c);
	$return = Array('r' => FALSE);
}else{
	$t = OC_IntBks::insertNewItem($c);
	//$t['bktarget'] = str_replace('+','%20',urlencode(str_replace('%2F','/', $t['bktarget'])));
	$t['bktarget'] = OCP\Util::linkTo('files', 'index.php').'&dir=' . $t['bktarget'];
	
	$return = Array('r' => TRUE, 'e' => $t);
}

OCP\JSON::encodedPrint($return);