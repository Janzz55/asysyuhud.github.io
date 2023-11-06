<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space

if(!class_exists('ContentHelperRoute')){
	if(version_compare(JVERSION, '4', 'ge')){
		abstract class ContentHelperRoute extends \Joomla\Component\content\Site\Helper\RouteHelper{};
	}else{
		JLoader::register('ContentHelperRoute', $com_path . '/helpers/route.php');
	}
}
//compatible params on joomla 4
$this->columns = !empty($this->columns) ? $this->columns : $this->params->get('num_columns');
$this->blog_class_leading = $this->params->get('blog_class_leading','');
$this->blog_class = $this->params->get('blog_class','');
?>
<div class="blog-featured" itemscope itemtype="https://schema.org/Blog">
	<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<div class="page-header">
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>
	<?php if ($this->params->get('page_subheading')) : ?>
		<h2>
			<?php echo $this->escape($this->params->get('page_subheading')); ?>
		</h2>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="com-content-category-blog__item blog-item bg-primary-light"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<div class="blog-item-content"><!-- Double divs required for IE11 grid fallback -->
						<?php
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
					</div>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php
		$introcount = count($this->intro_items);
		$counter = 0;
	?>
	
	<?php if (!empty($this->intro_items)) : ?>
	<div class="items-intro cols-<?php echo $this->columns ;?>">
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
			<?php if ($rowcount === 1) : ?>
				<?php $row = $counter / $this->columns; ?>
			<?php endif; ?>
				<div class="item-wrap">
					<div class="item bg-primary-light clearfix<?php echo $item->state == 0 ? ' system-unpublished' : null; ?>" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
						<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
					?>
					</div><!-- end item -->
					<?php $counter++; ?>
				</div><!-- end span -->
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
		<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="w-100">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter float-right pt-3 pr-2">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>

</div>

<script>
	(function($){
		$(document).ready(function(){
			var $container = $('.items-intro');
			
			if (!$container.length) return ;
			
			$container.isotope({
				itemSelector: '.item-wrap',
				gutter: 30
			});
		
	    // re-order when images loaded
	    $container.imagesLoaded(function(){
	    	$container.isotope();
	    	
	    	/* fix for IE-8 */
	    	setTimeout (function() {
	    		$('.items-intro').isotope();
	    	}, 8000);  
	    });
	  });
	})(jQuery);
</script>
