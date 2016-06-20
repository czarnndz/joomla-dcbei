<?php
/**
 * @package JoomlaPack
 * @copyright Copyright (c)2006-2008 JoomlaPack Developers
 * @license GNU General Public License version 2, or later
 * @version $id$
 * @since 2.1
 */

// Protect from unauthorized access
defined('_JEXEC') or die('Restricted Access');

?>
<html>
<head>
	<title><?php echo JText::_('LIGHT_HEADER');?></title>
</head>
<body>
<h1><?php echo JText::_('LIGHT_HEADER');?></h1>
<form action="index.php" method="post" name="adminForm" id="adminForm">
	<input type="hidden" name="option" value="com_joomlapack" />
	<input type="hidden" name="view" value="light" />
	<input type="hidden" name="format" value="raw" />
	<input type="hidden" name="task" value="authenticate" />
	<table border="0">
		<?php if(JPSPECIALEDITION): ?>
		<tr>
			<td><label for="profile"><?php echo JText::_('LIGHT_LABEL_PROFILE'); ?></label></td>
			<td><?php echo JHTML::_('select.genericlist', $this->profilelist, 'profile'); ?></td>
		</tr>
		<?php else: ?>
		<input type="hidden" name="profile" id="profile" value="1" />
		<?php endif; ?>
		<tr>
			<td><label for="key"><?php echo JText::_('LIGHT_LABEL_SECRET'); ?></label></td>
			<td><input type="text" name="key" size="20" > </td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="<?php echo JText::_('LIGHT_LABEL_SUBMIT'); ?>" />
			</td>
		</tr>
	</table>
</form>
</body>
</html>