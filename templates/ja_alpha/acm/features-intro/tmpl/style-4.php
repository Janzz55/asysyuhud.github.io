<?php
/**
 * ------------------------------------------------------------------------
 * JA Alpha Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
*/
defined('_JEXEC') or die;
	$modTitle       = $module->title;
	$moduleSub 			= $params->get('sub-heading');
	$featuresIntro 	= $helper->get('block-intro');
	$count 					= $helper->getRows('data.title');
	$column 				= $helper->get('columns');
	$slide 					= $helper->get('slide');
?>

<div class="acm-features style-4">
	<?php if($helper->get('btn-link')) :?>
	<div class="container-sm view-all">
		<a href="<?php echo $helper->get('btn-link'); ?>" class="btn btn-outline-primary">
			<?php echo $helper->get('btn-link-title') ?>
		</a>
	</div>
	<?php endif ;?>

	<div id="acm-feature-<?php echo $module->id; ?>">
		<div class="owl-carousel owl-theme">
			<?php
				for ($i=0; $i<$count; $i++) :
			?>
				<div class="features-item bg-primary-light">
					<div class="features-item-inner">
						<div class="features-num text-primary">
							<?php if($i<9) echo '0'.($i+1) ;?>
						</div>

						<?php if($helper->get('data.title', $i)) : ?>
							<h3><?php echo $helper->get('data.title', $i) ?></h3>
						<?php endif ; ?>

						<?php if($helper->get('data.description', $i)) : ?>
							<div class="features-desc"><?php echo $helper->get('data.description', $i) ?></div>
						<?php endif ; ?>

						<?php if($helper->get('data.link', $i)) : ?>
							<div class="action-link">
								<a href="<?php echo $helper->get('data.link', $i) ?>">
									<?php echo $helper->get('data.link-title', $i) ?>
								</a>
							</div>
						<?php endif ; ?>
					</div>
				</div>
			<?php endfor ?>
		</div>
	</div>

	<?php if($helper->get('block-intro')) :?>
	<div class="container-sm features-intro">
		<?php echo $helper->get('block-intro') ;?>
	</div>
	<?php endif ;?>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#acm-feature-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: <?php echo $column; ?>,
      itemsScaleUp : true,
      nav : true,
      navText : ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
      dots: false,
      autoPlay: false,
      margin: 36,
      responsive : {
				0 : {
			    items: 1,
			    autoHeight: true
				},
				767 : {
			    items: 2,
				},
				1200 : {
			    items: <?php echo $column; ?>
				}
			}
    });
  });
})(jQuery);
</script>