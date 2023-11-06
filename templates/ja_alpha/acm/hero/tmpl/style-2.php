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
	// Sub Align
	$titleSpace = 'spacer-normal';

	if($params->get('title-space')) {
		$titleSpace = 'spacer-small';
	}

	// Sub Color
	$subColor = $params->get('sub-color', 'normal');
	$titleColor = $params->get('title-color', 'normal');

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
	$app = JFactory::getApplication();
	$template = $app->getTemplate();
?>

<div id="acm-hero-<?php echo $mod; ?>" class="acm-hero style-2 bg-<?php echo $bgColor; ?>">
	<div class="hero-lead">
		<div class="container">
			<div class="hero-item">
				<div class="row">
					<div class="col-lg-6">
						<div class="video-intro" style="background-image: url('<?php echo $helper->get('ft-bg') ;?>');">
							<?php if($helper->get('id-video')) : ?>
								<div class="video-play">
			            <a id="myvideo-<?php echo $mod; ?>" class="video-btn-<?php echo $mod ;?>" data-toggle="modal" data-src="https://www.youtube.com/embed/<?php echo $helper->get('data.id-video') ?>" data-target="#videoModal-<?php echo $mod ;?>">
									  <span class="d-none">play</span>
			              <span class="far fa-play"></span>
									</a>
			          </div>
							<?php endif ; ?>
						</div>

						<?php if($helper->get('ft-reviews')) :?>
						<div class="hero-reviews row">
							<div class="col-12 col-sm-4">
								<div class="rating"><span class="stars-rate"></span></div>
							</div>

							<div class="col-12 col-sm-8">
								<div class="reviews-description lead"><?php echo $helper->get('ft-reviews'); ?></div>
							</div>
						</div>
						<?php endif ; ?>
					</div>

					<div class="col-lg-6">
						<div class="hero-content">

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
							</div>
							<?php endif ; ?>

							<?php if($helper->get('description')) : ?>
								<div class="hero-desc"><?php echo $helper->get('description') ?></div>
							<?php endif ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if($helper->get('ft-cta-sub') || $helper->get('ft-cta-sub') || $helper->get('ft-btn-link')) :?>
	<div class="hero-actions-wrap">
		<div class="container">
			<div class="actions-inner">
				<div class="act-content">
					<?php if($helper->get('ft-cta-title')) : ?>
					<div class="title h4 m-0 text-white">
						<?php echo $helper->get('ft-cta-title'); ?>
					</div>
					<?php endif ; ?>

					<?php if($helper->get('ft-cta-sub')) : ?>
					<div class="description h2 m-0 text-white">
						<?php echo $helper->get('ft-cta-sub') ?>
					</div>
					<?php endif ; ?>
				</div>

				<?php if($helper->get('ft-btn-link')) : ?>
					<div class="hero-action">
						<a href="<?php echo $helper->get('ft-btn-link') ?>" class="btn btn-outline-white">
							<?php echo $helper->get('ft-btn-title') ?>
						</a>	 
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
	<?php endif ;?>

	<!-- Modal -->
  <div class="modal fade video-modal" id="videoModal-<?php echo $mod ;?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
          <!-- 16:9 aspect ratio -->
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" id="video-<?php echo $mod ;?>"  allowscriptaccess="always" allow="autoplay"></iframe>
          </div>
        </div>

      </div>
    </div>
  </div> 
</div>

<script>
(function($){
	jQuery(document).ready(function($) {
    //Popup video
	    $(document).ready(function() {
			var $videoSrc;  
			$('.video-btn-<?php echo $mod ;?>').click(function() {
			    $videoSrc = $(this).data( "src" );
			});

			$('#videoModal-<?php echo $mod ;?>').on('shown.bs.modal', function (e) {    
				$("#video-<?php echo $mod ;?>").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
				$(this).appendTo('body');
			})
			  
			$('#videoModal-<?php echo $mod ;?>').on('hide.bs.modal', function (e) {
			    $("#video-<?php echo $mod ;?>").attr('src',$videoSrc); 
			}) 
		});
	});
})(jQuery);
</script>