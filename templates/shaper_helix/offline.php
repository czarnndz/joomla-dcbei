<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Helix Framework   
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2011 JoomShaper.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# license - CSS  - JS - IMAGE files  are Copyrighted material 
# Websites: http://www.joomshaper.com - http://www.joomxpert.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');

require_once(dirname(__FILE__).DS.'lib'.DS.'helix.php');
$app = JFactory::getApplication();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<?php
		$helix->loadHead();
		$helix->addCSS('system.css');
		if ($helix->getDirection() == 'rtl') $helix->addCSS('system_rtl.css');
		$helix->favicon('favicon.ico');
	?>
</head>

<body class="offline_bg">
	<div class="wrap">
	<jdoc:include type="message" />
	<div id="frame" class="outline">
	<p class="offline_message">
		<?php echo $mainframe->getCfg('offline_message'); ?>
	</p>
	<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
	<?php JHTML::_('script', 'openid.js'); ?>
	<?php endif; ?>	
	<form action="index.php" method="post" name="login" id="form-login">
	<fieldset class="input">
		<p id="form-login-username">
			<label for="username"><?php echo JText::_('Username') ?></label><br />
			<input name="username" class="username" type="text" class="inputbox" alt="<?php echo JText::_('Username') ?>" size="18" />
		</p>
		
		<p id="form-login-password">
			<label for="passwd"><?php echo JText::_('Password') ?></label><br />
			<input type="password" class="passwd" name="passwd" class="inputbox" alt="<?php echo JText::_('Password') ?>" size="18" />
		</p>
		<p id="form-login-remember">
			<label for="remember"><?php echo JText::_('Remember me') ?></label>
			<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('Remember me') ?>" class="remember" />
		</p>
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" />
	</fieldset>
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="login" />
	<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>
	</div>
	</div>
</body>
</html>
