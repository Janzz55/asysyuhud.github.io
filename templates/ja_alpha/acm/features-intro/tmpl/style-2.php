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
	$count = $helper->getRows('title');
	$column = 12/($helper->get('columns'));
?>

<div class="acm-features style-2">
	<div class="container">
		<div class="row">
			<?php for ($i=0; $i<$count; $i++) : ?>
				<div class="col-12 col-sm-6 mb-3 mb-xl-5 col-hd-<?php echo $column ?>">
					<div class="features-item <?php if(!$helper->get('link', $i)) echo 'no-link' ?>">
						<div class="item-inner">
							<?php if($helper->get('font-icon', $i)) : ?>
								<div class="font-icon">
									<span class="<?php echo $helper->get('font-icon', $i) ; ?>"></span>
								</div>
							<?php endif ; ?>

							<?php if($helper->get('img-icon', $i)) : ?>
								<div class="img-icon">
									<img src="<?php echo $helper->get('img-icon', $i) ?>" alt="" />
								</div>
							<?php endif ; ?>
							
							<?php if($helper->get('title', $i)) : ?>
								<h4>
									<?php if($helper->get('link', $i)) : ?>
										<a href="<?php echo $helper->get('link', $i) ?>" class="link-dark">
									<?php endif ; ?>

									<?php echo $helper->get('title', $i) ?>

									<?php if($helper->get('link', $i)) : ?>
										</a>
									<?php endif ; ?>
								</h4>
							<?php endif ; ?>
							
							<?php if($helper->get('description', $i)) : ?>
								<p class="pr-sm-3"><?php echo $helper->get('description', $i) ?></p>
							<?php endif ; ?>

							<?php if($helper->get('link', $i)) : ?>
								<a class="action" href="<?php echo $helper->get('link', $i) ?>">
									<span class="fas fa-arrow-right"></span>
								</a>
							<?php endif ; ?>
						</div>
					</div>
				</div>
			<?php endfor ?>
		</div>

		<?php if($helper->get('more-info')) : ?>
		<div class="features-more">
			<?php echo $helper->get('more-info') ?>
		</div>
		<?php endif ; ?>
	</div>
</div>