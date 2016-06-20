<?php
/**
 * @package JoomlaPack
 * @copyright Copyright (c)2006-2008 JoomlaPack Developers
 * @license GNU General Public License version 2, or later
 * @version $id$
 * @since 1.3
 */

// Protect from unauthorized access
defined('_JEXEC') or die('Restricted Access');

// Load framework base classes
jimport('joomla.application.component.view');

/**
 * MVC View for Log (raw output for iframe)
 *
 */
class JoomlapackViewLog extends JView
{
	function display()
	{
		$this->loadHelper('log');
		parent::display('raw');
	}
}