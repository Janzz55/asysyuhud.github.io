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
$count = $helper->count('btn-title');
$modTitle       = $module->title;
$moduleSub = $params->get('sub-heading');
$mod            = $module->id;
$app = JFactory::getApplication();
$template = $app->getTemplate();
?>

<div id="acm-hero-<?php echo $mod; ?>" class="acm-hero style-1" style="background-image: url('<?php echo $helper->get('ft-bg') ;?>');">
	<div class="container">
		<div class="hero-item">
			<div class="hero-content">

				<?php if($helper->get('sub-title')) : ?>
					<div class="hero-sub-title text-primary"><?php echo $helper->get('sub-title') ?></div>
				<?php endif ; ?>

				<?php if($helper->get('ft-title')) : ?>
					<h1 class="text-white"><?php echo $helper->get('ft-title') ?></h1>
				<?php endif ; ?>

				<?php if($helper->get('description')) : ?>
					<div class="hero-desc text-white"><?php echo $helper->get('description') ?></div>
				<?php endif ; ?>

				<?php if($helper->get('ft-btn-link') || $helper->get('id-video')) : ?>
					<div class="hero-action">
						<?php if($helper->get('ft-btn-link')) : ?>
						<a href="<?php echo $helper->get('ft-btn-link') ?>" class="btn btn-outline-white">
							<?php echo $helper->get('ft-btn-title') ?>
						</a>
						<?php endif ; ?>

						<?php if($helper->get('id-video')) : ?>
							<div class="play-icon">
		            <a id="myvideo-<?php echo $mod; ?>" class="video-btn-<?php echo $mod ;?>" data-toggle="modal" data-src="https://www.youtube.com/embed/<?php echo $helper->get('data.id-video') ?>" data-target="#videoModal-<?php echo $mod ;?>">
								  <span class="d-none">play</span>
		              <span class="far fa-play"></span>
								</a>

		            <?php if($helper->get('title-video')) : ?>
		            <span class="video-title text-white">
		            	<?php echo $helper->get('title-video') ;?>
		            </span>
		            <?php endif ; ?>
		          </div>
						<?php endif ; ?>

					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>

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