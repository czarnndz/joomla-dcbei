<?php // @version $Id: default.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>
<div class="search<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
<?php if($this->params->get('show_page_title',1)) : ?>
<h2>
	<?php echo $this->escape($this->params->get('page_title')) ?>
</h2>
<?php endif; ?>

<?php if (!$this->error) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>

<?php echo $this->loadTemplate('form'); ?>
</div>
