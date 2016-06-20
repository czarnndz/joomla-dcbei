<?php // @version $Id: blog.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
$cparams = JComponentHelper::getParams ('com_media');
?>

<div class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php if ($this->params->get('show_page_title')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
	<?php endif; ?>
	
	<?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<div class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

		<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
		<img src="<?php echo $this->baseurl . $cparams->get('image_path') . '/' . $this->category->image; ?>" class="image_<?php echo $this->category->image_position; ?>" />
		<?php endif; ?>

		<?php if ($this->params->get('show_description') && $this->category->description) :
			echo $this->category->description;
		endif; ?>

		<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
		<div class="wrap_image">&nbsp;</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	<?php $i = $this->pagination->limitstart;
	$rowcount = $this->params->def('num_leading_articles', 1);
	for ($y = 0; $y < $rowcount && $i < $this->total; $y++, $i++) : ?>
		<div class="leading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php $this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item'); ?>
		</div>
	<?php endfor; ?>
	
	<?php
	if ($i < $this->total) {

		// init vars
		$count   = min($this->params->get('num_intro_articles', 4), ($this->total - $i));
		$rows    = ceil($count / $this->params->get('num_columns', 2));
		$columns = array();
		$row     = 0;
		$column  = 0;
		
		// create intro columns
		for ($j = 0; $j < $count; $j++, $i++) { 

			if ($this->params->get('multi_column_order', 1) == 0) {
				// order down
				if ($row >= $rows) {
					$column++;
					$row  = 0;
					$rows = ceil(($count - $j) / ($this->params->get('num_columns', 2) - $column));
				}
				$row++;
			} else {
				// order across
				$column = $j % $this->params->get('num_columns', 2);
			}

			if (!isset($columns[$column])) {
				$columns[$column] = '';
			}

			$this->item =& $this->getItem($i, $this->params);
			$columns[$column] .= $this->loadTemplate('item');
		}

		// render intro columns
		$count = count($columns);
		if ($count) {
			echo '<div class="items-row cols-'.$count.' clearfix">';
			for ($j = 0; $j < $count; $j++) {
				$first = ($j == 0) ? ' first' : null;
				$last  = ($j == $count - 1) ? ' last' : null;
				echo '<div class="item column-'.($j+1).'"><div class="item-inner '.$first.$last.' clearfix">'.$columns[$j].'</div></div>';
			}
			echo '</div>';
		}
	}
	?>
	
	<?php $numlinks = $this->params->def('num_links', 4);
	if ($numlinks && $i < $this->total) : ?>
	<div class="items-more">
		<?php $this->links = array_slice($this->items, $i - $this->pagination->limitstart, $i - $this->pagination->limitstart + $numlinks);
		echo $this->loadTemplate('links'); ?>
	</div>
	<?php endif; ?>

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
