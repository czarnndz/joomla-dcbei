<?php
/*----------------------------------------------------------------------
# Youjoomla Default Settings - April 2007
# ----------------------------------------------------------------------
# Copyright (C) 2007 You Joomla. All Rights Reserved.
# Designed by: You Joomla
# License: Commercial
# Website: http://www.youjoomla.com
------------------------------------------------------------------------*/
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );


//START COLLAPSING THAT MODULE:)
$left = mosCountModules( 'left' );
$right = mosCountModules( 'right' );
if ( $left  &&  $right  ) {
	$content  = 'content';
	$left  = 'left';
	$right = 'right';
	$mainbody  = 'mainbody';
	$wrap    = 'wrap';
    $insidewrap='insidewrap';
	$landrwrap='landrwrap';
	}elseif ( $left) {
	$content  = 'content_L';
	$left  = 'left_L';
	$mainbody  = 'mainbody_L';
	$wrap    = 'wrapblank';
	$insidewrap='insidewrapblank';
	}elseif ( $right) {
	$content  = 'content_R';
	$right = 'right_R';
	$mainbody  = 'mainbody_R';
	$wrap    = 'wrap';
	$insidewrap='insidewrapblank';
	$landrwrap='landrwrap_R';
	} else {
	$content = 'content_R';
	$mainbody  = 'mainbody_L';
	$wrap    = 'wrapblank';
	$landrwrap='landrwrap';
	$insidewrap='insidewrapblank';
	}




//START COLLAPSING TOP:)
$top = 0;
if (mosCountModules('user1')) $top++;
if (mosCountModules('user2')) $top++;
if ( $top == 2 ) {
	$user1w = '56%';
	$user2w = '41%';
	$username = 'user2';
} else if ($top == 1) {
	$user1w = '100%';
	$user2w = '100%';
	$username = 'user2_2';
}
$bot = 0;
if (mosCountModules('user3')) $bot++;
if (mosCountModules('user4')) $bot++;
if (mosCountModules('user5')) $bot++;
if ($bot == 3) {
	$bottw = '33.3%';
} else if ($bot == 2) {
	$bottw = '49%';		
} else if ($bot == 1) {
	$bottw = '100%';
}
//
$users = 0;
if (mosCountModules('user8')) $users++;
if (mosCountModules('user9')) $users++;
 if ($users == 2) {
	$userswidth = '49%';		
} else if ($users == 1) {
	$userswidth = '100%';
}
//
$tops = 0;
if (mosCountModules('advert1')) $tops++;
if (mosCountModules('advert2')) $tops++;
 if ($tops == 2) {
	$topswidth = '49%';		
} else if ($tops == 1) {
	$topswidth = '100%';
}
?>
