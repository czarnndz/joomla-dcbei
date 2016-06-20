<?php // @version $Id: blog_links.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
?>

<h3>
	<?php echo JText::_('More Articles...'); ?>
</h3>

<ul>
	<?php foreach ($this->links as $link) : ?>
	<li>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>">
			<?php echo $this->escape($link->title); ?></a>
	</li>
	<?php endforeach; ?>
</ul>
