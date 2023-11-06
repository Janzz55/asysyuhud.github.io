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
	// Sub Color
	$subColor = $params->get('sub-color', 'normal');
	$titleColor = $params->get('title-color', 'normal');

	// Sub Align
	$titleSpace = 'spacer-normal';

	if($params->get('title-space')) {
		$titleSpace = 'spacer-small';
	}

	$decor = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<circle cx="4" cy="4" r="4" fill="#3F3836"/>
	<circle cx="4" cy="16" r="4" fill="#EC4E4F" class="fill-primary"/>
	<circle cx="16" cy="4" r="4" fill="#EC4E4F" class="fill-primary"/>
	<circle cx="16" cy="16" r="4" fill="#3F3836"/>
	</svg>';

	if($subColor == 'white') {
		$decor = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<circle cx="4" cy="4" r="4" fill="white"/>
	<circle cx="4" cy="16" r="4" fill="#A83E3E" class="fill-dark"/>
	<circle cx="16" cy="4" r="4" fill="#A83E3E" class="fill-dark"/>
	<circle cx="16" cy="16" r="4" fill="white"/>
	</svg>';
	}


	// Sub Heading
	$moduleSub = '';

	if($params->get('sub-heading')) {
		$moduleSub = '<span class="sub-heading text-primary text-'.$subColor.'">'.$decor.' '.$module->title.'</span>';
	}

	// Mod Title
	$modTitle = '';

	if($module->showtitle != 0) {
		$modTitle = '<h3 class="section-title h2 text-'.$titleColor.'"><span>'.$params->get('sub-heading').'</span></h3>';
	}

	$count 					= $helper->getRows('data.author');
	$column 				= 1;
?>

<div class="acm-testimonial style-1">
	<div class="container">
		<div class="testimonial-item-wrap">
			<div class="row">
				<?php if($helper->get('t-intro')) : ?>
				<div class="testimonial-image col-lg-6 col-hd-7">
					<img src="<?php echo $helper->get('t-intro'); ?>" alt="" />
				</div>
				<?php endif ; ?>

				<div class="col-lg-6 col-hd-5">
					<div class="testimonial-content">
						<?php if($moduleSub || $modTitle) : ?>
						<div class="section-title-wrap <?php echo $titleSpace ;?>">
							<!-- Module Title -->
							<?php if ($moduleSub): ?>
								<?php echo $moduleSub; ?>
							<?php endif; ?>

							<?php if($modTitle) : ?>
							<?php echo $modTitle ?>
							<?php endif; ?>
							<!-- // Module Title -->

							<?php if ($helper->get('description')): ?>
								<div class="lead text-white">
									<?php echo $helper->get('description'); ?>
								</div>
							<?php endif ; ?>
						</div>
						<?php endif ; ?>

						<div id="acm-testimonial-<?php echo $module->id; ?>">
							<div class="owl-carousel owl-theme">
								<?php 
									for ($i=0; $i<$count; $i++) : 
								?>
									<div class="testimonial-item">
										<div class="quote-mask d-none d-md-block">
											<span class="fas fa-quote-left"></span>
										</div>

										<div class="testimonial-item-inner">
											<div class="testimonial-top mb-4">
												<!-- Description -->
												<?php if($helper->get('data.desc', $i)) : ?>
													<h4 class="desc m-0 font-weight-normal">
														<?php echo $helper->get('data.desc', $i) ?>
													</h4>
												<?php endif ; ?>
											</div>

											<div class="testimonial-bottom">
												<div class="d-flex">
													<!-- Author -->
													<?php if($helper->get('data.author', $i)) : ?>
														<span class="text-primary t-author"><?php echo $helper->get('data.author', $i) ?> </span>
													<?php endif ; ?>

													<!-- Position -->
													<?php if($helper->get('data.t-position', $i)) : ?>
														<span class="t-position"> - <?php echo $helper->get('data.t-position', $i) ?></span>
													<?php endif ; ?>
												</div>
												
											</div>
										</div>
									</div>
								<?php endfor ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#acm-testimonial-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
    	items: 1,
			addClassActive: true,
			itemsScaleUp : true,
			margin: 180,
			nav : true,
			navText : ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
			dots: false,
			autoPlay: false
    });
  });
})(jQuery);
</script>