<?php // @version $Id: default_graph.php 12230 2009-06-21 02:07:34Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<fieldset>
<dl class="poll">
	<dt><?php echo JText::_( 'Number of Voters' ); ?></dt>
	<dd><?php echo $this->votes[0]->voters; ?></dd>
	<dt><?php echo JText::_( 'First Vote' ); ?></dt>
	<dd><?php echo $this->first_vote; ?></dd>
	<dt><?php echo JText::_( 'Last Vote' ); ?></dt>
	<dd><?php echo $this->last_vote; ?></dd>
</dl>
</fieldset>

<h3>
	<?php echo $this->escape($this->poll->title); ?>
</h3>
<div id="adminForm" class="clearfix">
<table class="category">
	<?php JPlugin::loadLanguage( 'tpl_beez' ); ?>
	<thead>
	<tr>
		<th id="itema" class="td_1"><?php echo JText::_( 'Item' ); ?></th>
		<th id="itemb" class="td_2"><?php echo JText::_( 'Hits' ); ?></th>
		<th id="itemc" class="td_3"><?php echo JText::_( 'Percent' ); ?></th>
		<th id="itemd" class="td_4"><?php echo JText::_( 'Graph' ); ?></th>
	</tr>
	</thead>
	<?php for ( $row = 0; $row < count( $this->votes ); $row++ ) :
		$vote = $this->votes[$row];
	?>
	<tr class="cat-list-row<?php echo ($vote->odd) % 2; ?>" >
		
		<td headers="itema question<?php echo $row; ?>" class="td_1">
			<?php echo $vote->text; ?>
		</td>

		<td headers="itemb question<?php echo $row; ?>" class="td_2">
			<?php echo $vote->hits; ?>
		</td>
		<td headers="itemc question<?php echo $row; ?>" class="td_3">
			<?php echo $vote->percent.'%' ?>
		</td>
		<td headers="itemd question<?php echo $row; ?>" class="td_4">
			<div class="<?php echo $vote->class; ?>" style="height:<?php echo $vote->barheight; ?>px;width:<?php echo $vote->percent; ?>% !important"></div>
		</td>
	</tr>
	<?php endfor; ?>
</table>
</div>
