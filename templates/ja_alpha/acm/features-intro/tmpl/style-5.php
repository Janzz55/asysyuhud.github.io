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

	$app = JFactory::getApplication();
	$template = $app->getTemplate();

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

	$bgColor = 'primary';

	if($helper->get('ft-color')) {
		$bgColor = $helper->get('ft-color');
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

	$mod            = $module->id;

	$count 					= $helper->getRows('data.ft-num');
?>

<div id="acm-features-<?php echo $mod; ?>" class="acm-features style-5 <?php echo $helper->get('features-style'); ?>">
	<div class="row no-gutters">
		<div class="col-lg-6 bg-<?php echo $bgColor; ?>" >
			<div class="features-content-wrap">
				<div class="features-content">
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

					<?php if ($helper->get('btn-link')): ?>
					<div class="features-action">
						<a href="<?php echo $helper->get('btn-link') ;?>" title="<?php echo $helper->get('btn-title') ;?>" class="btn btn-outline-white">
							<?php echo $helper->get('btn-title') ;?>
						</a>
					</div>
					<?php endif ; ?>
					<!--- //Features Content -->
				</div>
			</div>
		</div>

		<div class="features-image col-lg-6" style="background-image: url('<?php echo $helper->get('img-features'); ?>');">
			<div class="features-item-wrap">
				<?php
					for ($i=0; $i<$count; $i++) :
				?>
					<div class="features-item">
						<div class="bg-decor"></div>
						<?php if($helper->get('data.ft-num', $i)) : ?>
							<div class="ft-num h2 text-primary"><?php echo $helper->get('data.ft-num', $i) ?></div>
						<?php endif ; ?>

						<?php if($helper->get('data.ft-title', $i)) : ?>
							<div class="ft-title h4"><?php echo $helper->get('data.ft-title', $i) ?></div>
						<?php endif ; ?>

						<?php if($helper->get('data.ft-description', $i)) : ?>
							<div class="ft-description"><?php echo $helper->get('data.ft-description', $i) ?></div>
						<?php endif ; ?>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</div>
</div>