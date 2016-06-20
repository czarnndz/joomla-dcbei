<?php
/**
* @version      $Id: img.php 11 2008-07-17 19:09:13Z ludwig $
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
defined('_JEXEC') or die('Restricted access');

/*
 * NOTE: Closing anchor tag must be hard against the end of the image tag
 * otherwise css styling can be unpredictable
 */
if ($image->link) : ?>
	<a href="<?php echo $image->link; ?>" target="_self">
<?php endif; ?>
<img src="<?php echo $image->src; ?>" border="0"<?php echo $image->widhtHeight; ?> alt="<?php echo $image->alttext; ?>" /><?php if ($image->link) : ?></a><?php endif; ?>