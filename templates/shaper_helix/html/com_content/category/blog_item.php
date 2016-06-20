<?php // @version $Id: blog_item.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<?php if ($this->item->params->get('show_title')) : ?>
<h2>
	<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
		<a href="<?php echo $this->item->readmore_link; ?>">
			<?php echo $this->escape($this->item->title); ?></a>
	<?php else :
		echo $this->escape($this->item->title);
	endif; ?>
</h2>
<?php endif; ?>

<?php if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php
if (
($this->item->params->get('show_create_date'))
|| (($this->item->params->get('show_author')) && ($this->item->author != ""))
|| (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid))
|| ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon'))
|| ($this->item->params->get('show_url') && $this->item->urls)
) :
?>
<div class="article-tools clearfix">

	<dl class="article-info">
	<?php if ($this->item->params->get('show_create_date')) : ?>
	<dd class="createdate">
		<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC1')); ?>
	</dd>
	<?php endif; ?>	

	<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
	<dd class="createdby">
		<?php JText::printf(($this->item->created_by_alias ? $this->escape($this->item->created_by_alias) : $this->escape($this->item->author)) ); ?>
	</dd>
	<?php endif; ?>

	<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>

		<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
		<dd class="section">
		<strong><?php echo JText::_('SECTION'); ?>: </strong>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->section); ?>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</dd>
		<?php endif; ?>

		<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
		<dd class="category">
		<strong><?php echo JText::_('CATEGORY'); ?>: </strong>
		<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->category); ?>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</dd>
		<?php endif; ?>
		
	<?php endif; ?>
	
	</dl>

	<?php if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
	<ul class="buttonheading">
		<?php if ($this->params->get('show_email_icon')) : ?>
		<li class="email-icon">
		<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_print_icon' )) : ?>
		<li class="print-icon">
		<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ($this->params->get('show_pdf_icon')) : ?>
		<li>
		<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
		<li>
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>		
	</ul>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
<span class="small">
	<a href="<?php echo $this->item->urls; ?>" target="_blank">
		<?php echo $this->escape($this->item->urls); ?></a>
</span>
<?php endif; ?>

<?php if (isset ($this->item->toc)) :
	echo $this->item->toc;
endif; ?>

<?php echo JFilterOutput::ampReplace($this->item->text);  ?>

<?php if (intval($this->item->modified) !=0 && $this->item->params->get('show_modify_date')) : ?>
<span class="modifydate">
	<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
</span>
<?php endif; ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->escape($this->item->title); ?>" class="readmore"><span>
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<?php echo JText::_('Read more...'); ?>
			<?php endif; ?>
	</span></a>
<?php endif; ?>
<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent;?>
