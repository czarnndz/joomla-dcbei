<?php // @version $Id: default_items.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<?php if ( $this->params->get( 'show_limit' ) ) : ?>
<div class="display-limit clearfix">
	<form action="index.php" method="post" name="adminForm">
		<label for="limit"><?php echo JText::_( 'Display Num' ); ?>&nbsp;</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</form>
</div>
<?php endif; ?>

<div id="adminForm" class="clearfix">
<table width="100%" class="category">

	<?php if ( $this->params->get( 'show_headings' ) ) : ?>
	<thead>
	<tr>

		<th class="num" width="5" id="num">
			<?php echo JText::_( 'Num' ); ?>
		</th>

		<?php if ( $this->params->get( 'show_name' ) ) : ?>
		<th width="90%" class="feed-name" id="name">
			<?php echo JText::_( 'Feed Name' ); ?>
		</th>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_articles' ) ) : ?>
		<th width="10%" class="num-articles" nowrap="nowrap" id="num_a">
			<?php echo JText::_('Num Articles'); ?>
		</th>
		<?php endif; ?>

	</tr>
	</thead>
	<?php endif; ?>

	<?php foreach ( $this->items as $item ) : ?>
	<tr class="cat-list-row<?php echo ($item->odd) % 2; ?>" >

		<td align="center" width="5" headers="num">
			<?php echo $item->count + 1; ?>
		</td>

		<td width="90%" headers="name">
			<a href="<?php echo $item->link; ?>" class="category<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
				<?php echo $this->escape($item->name); ?></a>
		</td>

		<?php if ( $this->params->get( 'show_articles' ) ) : ?>
		<td width="10%" headers="num_a"><?php echo $item->numarticles; ?></td>
		<?php endif; ?>

	</tr>
	<?php endforeach; ?>

</table>
</div>
<p class="counter">
	<?php echo $this->pagination->getPagesCounter(); ?>
</p>
<?php echo $this->pagination->getPagesLinks(); ?>