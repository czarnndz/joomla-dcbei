<?php

/*------------------------------------------------------------------------
# "Hot Newsflash" Joomla module
# Copyright (C) 2010 ArhiNet d.o.o. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();
if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }
 
// get parameters from the module's configuration
$enablejQuery = $params->get('enablejQuery','1');
$noConflictMode = $params->get('noConflictMode','0');

$moduleWidth = $params->get('moduleWidth','600');
$moduleBackground = $params->get('moduleBackground','none');
$borderWidth = $params->get('borderWidth','0');
$borderColor = $params->get('borderColor','000000');
$readMore = $params->get('readMore','1');
$readMoreText = $params->get('readMoreText','Full story');

$headingTextColor = $params->get('headingTextColor','000000');
$mainTextColor = $params->get('mainTextColor','000000');

$tabNumber = $params->get('tabNumber','4');
$tabWidth = $params->get('tabWidth','150');
$tabBgColor = $params->get('tabBgColor','none');
$tabBgColorHover = $params->get('tabBgColorHover','f2f2f2');
$tabBgColorActive = $params->get('tabBgColorActive','000000');
$tabFontColor = $params->get('tabFontColor','000000');
$tabFontColorHover = $params->get('tabFontColorHover','000000');
$tabFontColorActive = $params->get('tabFontColorActive','ffffff');
$tabDelimiterColor = $params->get('tabDelimiterColor','cccccc');
$tabMultiline = $params->get('tabMultiline','0');

$imageFolder = $params->get('imageFolder','images/stories');
$imageWidth = $params->get('imageWidth','256');
$imageHeight = $params->get('imageHeight','169');
$imageLink = $params->get('imageLink','1');

for ($loop = 1; $loop <= 5; $loop += 1) {
$heading[$loop] = $params->get('heading'.$loop,'Lorem Ipsum');
}

for ($loop = 1; $loop <= 5; $loop += 1) {
$link[$loop] = $params->get('link'.$loop,'#');
}

for ($loop = 1; $loop <= 5; $loop += 1) {
$info[$loop] = $params->get('info'.$loop,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt condimentum lacus. Pellentesque ut diam.');
}

for ($loop = 1; $loop <= 5; $loop += 1) {
$image[$loop] = $params->get('image'.$loop,'image'.$loop.'.jpg');
}

$speed = $params->get('speed','5000');

require(JModuleHelper::getLayoutPath('mod_hot_newsflash'));
