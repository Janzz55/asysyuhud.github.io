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
	$count = $helper->getRows('link');
?>

<div class="acm-cta style-2">
	<div class="row no-gutters">
		<div class="col-lg-8">
			<div class="cta-content">
				<?php if($helper->get('cta-logo')) :?>
					<div class="cta-logo">
						<img src="<?php echo $helper->get('cta-logo'); ?>" alt=""/>
					</div>
				<?php endif ;?>

				<div class="social-follow-wrap">
				  <div class="social-follow d-flex">
				  	<?php for ($i=0; $i<$count; $i++) : ?>
				    	<div class="social-inner mr-2">
				    		<a href="<?php echo $helper->get('link', $i) ;?>" title="<?php echo $helper->get('title', $i) ;?>">
				          <span class="<?php echo $helper->get('font-icon', $i) ;?>"></span>
				    			<span class="d-none"><?php echo $helper->get('title', $i) ;?></span>
				    		</a>
				    	</div>
				    <?php endfor ?>
				  </div>
				</div>
			</div>
		</div>

		<?php if($helper->get('btn-title')) :?>
		<div class="col-lg-4">
			<a href="<?php echo $helper->get('btn-link'); ?>" class="btn btn-primary">
				<?php echo $helper->get('btn-title'); ?>
				<span class="fas fa-download"></span>
			</a>
		</div>
		<?php endif ;?>
	</div>
</div>
