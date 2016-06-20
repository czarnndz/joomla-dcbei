	<?php // @version $Id: default_results.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<?php if (!empty($this->searchword)) : ?>
<div class="searchintro<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
	<p>
		<?php echo JText::_('Search Keyword') ?> <strong><?php echo $this->escape($this->searchword) ?></strong>
		<?php echo $this->result ?>
	</p>
	<p>
		<a href="#form1" onclick="document.getElementById('search_searchword').focus();return false" onkeypress="document.getElementById('search_searchword').focus();return false" ><?php echo JText::_('Search_again') ?></a>
	</p>
</div>
<?php endif; ?>

<?php if (count($this->results)) : ?>
<div class="results">
	<h3><?php echo JText :: _('Search_result'); ?></h3>
	<?php $start = $this->pagination->limitstart + 1; ?>
	<dl class="search-results<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>" start="<?php echo (int)$start ?>">
		<?php foreach ($this->results as $result) : ?>
			<?php if ($result->href) : ?>
			<dt class="result-title">
				<a href="<?php echo JRoute :: _($result->href) ?>" <?php echo ($result->browsernav == 1) ? 'target="_blank"' : ''; ?> >
					<?php echo $this->escape($result->title); ?></a>
			</dt>
			<?php endif; ?>
			<?php if ($result->section) : ?>
			<dd class="result-category"><?php echo JText::_('Category') ?>:
				<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
					<?php echo $this->escape($result->section); ?>
				</span>
			</dd>
			<?php endif; ?>

			<dd class="result-text">
			<?php echo $result->text; ?>
			</dd>
			
			<dd class="result-created<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
				<?php echo $this->escape($result->created); ?>
			</dd>
		<?php endforeach; ?>
	</dl>
	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
	<div class="pagination">	
		<?php if( $this->pagination->get('pages.total') > 1 ) : ?>
		<p class="counter">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
		<?php endif; ?>
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		<?php endif; ?>
	</div>	
	<?php endif; ?>
</div>
<?php endif; ?>
