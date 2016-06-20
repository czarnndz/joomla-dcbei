<?php // @version $Id: default.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<?php if ($this->params->get('show_page_title',1) && $this->params->get('page_title') != $this->article->title) : ?>
	<h1>
	<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
<?php endif; ?>

<?php if ($this->params->get('show_title')) : ?>
<h2>
	<?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
	<a href="<?php echo $this->article->readmore_link; ?>">
		<?php echo $this->escape($this->article->title); ?></a>
	<?php else :
		echo $this->escape($this->article->title);
	endif; ?>
</h2>
<?php endif; ?>

<?php
if (
($this->params->get('show_create_date'))
|| (($this->params->get('show_author')) && ($this->article->author != ""))
|| (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid))
|| ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon'))
|| ($this->params->get('show_url') && $this->article->urls)
) :
?>
<div class="article-tools clearfix">
	<dl class="article-info">
	<?php if ($this->params->get('show_create_date')) : ?>
	<dd class="createdate">
		<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC1')); ?>
	</dd>
	<?php endif; ?>	

	<?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
	<dd class="createdby">
		<?php JText::printf('Written by', ($this->article->created_by_alias ? $this->escape($this->article->created_by_alias) : $this->escape($this->article->author))); ?>
	</dd>
	<?php endif; ?>

	<?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>

		<?php if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
		<dd class="section">
		<strong><?php echo JText::_('SECTION'); ?>: </strong>
			<?php if ($this->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->section); ?>
			<?php if ($this->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</dd>
		<?php endif; ?>
		
		<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
			<dd class="category">
			<strong><?php echo JText::_('CATEGORY'); ?>: </strong>	
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->escape($this->article->category); ?>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
			</dd>
		<?php endif; ?>		
	<?php endif; ?>	
	
	</dl>

	<?php if ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
	<ul class="buttonheading">
		<?php if ($this->params->get('show_email_icon')) : ?>
		<li class="email-icon">
		<?php echo JHTML::_('icon.email', $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_print_icon' )) : ?>
		<li class="print-icon">
		<?php echo JHTML::_('icon.print_popup', $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ($this->params->get('show_pdf_icon')) : ?>
		<li>
		<?php echo JHTML::_('icon.pdf', $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
		<li>
		<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>		
	</ul>
	<?php endif; ?>
</div>
<?php endif; ?>


<?php if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>

<?php echo $this->article->event->beforeDisplayContent; ?>

<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
<span class="small">
	<a href="<?php echo $this->escape($this->article->urls); ?>" target="_blank">
		<?php echo $this->escape($this->article->urls); ?></a>
</span>
<?php endif; ?>

<?php if (isset ($this->article->toc)) :
	echo $this->article->toc;
endif; ?>

<?php echo JFilterOutput::ampReplace($this->article->text); ?>

<?php if (intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
<span class="modifydate">
	<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
</span>
<?php endif; ?>

<div class="clr"></div>
<?php echo $this->article->event->afterDisplayContent; ?>