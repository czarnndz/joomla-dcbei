<?php
/**
* @version      $Id: mod_menu_dep_items.php 16 2008-08-07 17:25:57Z ludwig $
* @package      Menu Dependent Items
* @author       Christian Ludwig - viazenetti GmbH
* @copyright    Copyright (C) 2008 viazenetti GmbH. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the helper functions only once
require_once (dirname(__FILE__).DS.'mod_menu_dep_items_class.php');

// Init Object
$moduleHelper = new modMenuDependentItems($params);

// Only continue if folder exists
if ($moduleHelper->folder) {
    // Read directory into an array
    $moduleHelper->setFileList();

    // Sets the filename that should be used
    $moduleHelper->setFileName();

    // Image or Style Sheet selected
    if ($moduleHelper->getFileName()) {
        switch ($moduleHelper->getType()) {
        	case 'css':
        		$css = $moduleHelper->getCss();
        		break;

        	case 'img':
        	default:
        		$image = $moduleHelper->getImage();
        }

        require (JModuleHelper::getLayoutPath('mod_menu_dep_items', $moduleHelper->getType()));
    }
}