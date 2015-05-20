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

OC::$CLASSPATH['OC_IntBks'] = 'apps/internal_bookmarks/lib/intbks.class.php';

OCP\App::register(Array(
	'order' => 2,
	'id' => 'internal_bookmarks',
	'name' => 'Internal Bookmarks'
));


if(\OCP\User::isLoggedIn() ){
  OCP\Util::addScript('internal_bookmarks', 'actlink.min');
  foreach(OC_IntBks::getAllItemsByUser() as $item){
	$item['bktarget'] = str_replace('+','%20',urlencode($item['bktarget']));
	//		$item['bktarget'] = str_replace('%2F','//', $item['bktarget']);

	\OCA\Files\App::getNavigationManager()->add(
	  array(
		"id" => 'internal-bookmarks_'. $item['bkid'] ,
		"appname" => 'internal_bookmarks',
		"script" => 'list.php',
		"order" =>  2 + ($item['bkorder'] / 100),
		"name" => $item['bktitle'],
		"href" => "?dir=".$item['bktarget']
	  )
	);
  }
}


//if($i > 0){
//	OCP\App::registerPersonal('internal_bookmarks', 'settings');
//}
