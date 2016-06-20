<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="statistics">
<?php foreach ($list as $item) : ?>
<li><strong><?php echo $item->title ?></strong> : <span class="stat-data"><?php echo $item->data ?></span></li>
<?php endforeach; ?>
</ul>