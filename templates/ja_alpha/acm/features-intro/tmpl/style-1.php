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

  $align = $helper->get('align');

  if ($align==1):
  	$contentAlign = "content-right";
  	$featuresContentPull = "col-sm-12 col-xs-12 col-md-6 order-1";
  	$featuresImgPull = " col-md-6 order-2";
  else:
  	$contentAlign = "content-left";
  	$featuresContentPull = "col-sm-12 col-xs-12 col-md-6 order-2";
  	$featuresImgPull = " col-md-6 order-1";
  endif;

	$mod            = $module->id;
?>

<div id="acm-features-<?php echo $mod; ?>" class="acm-features style-1 <?php echo $helper->get('features-style'); ?>">
	<div class="row no-gutters <?php echo $contentAlign; ?>">
		<?php if($helper->get('img-features')) : ?>
		<div class="features-image <?php echo $featuresImgPull; ?>">
			<img src="<?php echo $helper->get('img-features'); ?>" alt="<?php echo $module->title; ?>"/>
		</div>
		<?php endif; ?>

		<div class="<?php echo $featuresContentPull; ?> bg-primary-light" >
			<div class="features-content">
				<?php if ($helper->get('title')): ?>
					<div class="title">
						<h3><?php echo $helper->get('title'); ?></h3>
					</div>
				<?php endif ; ?>

				<?php if ($helper->get('description')): ?>
					<div class="description">
						<?php echo $helper->get('description'); ?>
					</div>
				<?php endif ; ?>

				<?php if ($helper->get('btn-link') || $helper->get('btn-title')): ?>
				<div class="features-action">
					<a href="<?php echo $helper->get('btn-link') ;?>" title="<?php echo $helper->get('btn-title') ;?>" class="btn btn-outline-primary">
						<?php echo $helper->get('btn-title') ;?><span class="ion-ios-arrow-round-forward"></span>
					</a>
				</div>
				<?php endif ; ?>
				<!--- //Features Content -->
			</div>
		</div>
	</div>
</div>
