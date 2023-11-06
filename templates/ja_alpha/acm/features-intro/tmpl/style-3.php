<?php 
/**
 * ------------------------------------------------------------------------
 * ja_alpha_tpl
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
*/
defined('_JEXEC') or die;
	$count = $helper->getRows('title');
	$menu = JFactory::getApplication()->getMenu();
	$parent = $menu->getItem( $menu->getActive()->parent_id );
	$id_active = $menu->getActive()->id;
?>

<div class="acm-features style-3">
	<div class="features-wrap">
		<?php for ($i=0; $i<$count; $i++) : ?>
			<div class="features-item">
				<?php if($helper->get('link', $i)) : ?>
					<?php $idMenu = $helper->get('link', $i);
								$active = ($idMenu == $id_active) ? "active" : "";
					?>
					<a href="<?php  echo JRoute::_("index.php?Itemid={$idMenu}"); ?>" class="features-link <?php echo $active;?>">
				<?php endif ; ?>

				<div class="item-inner">
					<?php if($helper->get('font-icon', $i)) : ?>
						<div class="font-icon text-primary">
							<span class="<?php echo $helper->get('font-icon', $i) ; ?>"></span>
						</div>
					<?php endif ; ?>

					<?php if($helper->get('img-icon', $i)) : ?>
						<div class="img-icon">
							<img src="<?php echo $helper->get('img-icon', $i) ?>" alt="" />
						</div>
					<?php endif ; ?>
					
					<div class="features-content">
						<?php if($helper->get('title', $i)) : ?>
							<h4>
								<?php echo $helper->get('title', $i) ?>
							</h4>
						<?php endif ; ?>
						
						<?php if($helper->get('description', $i)) : ?>
							<div class="desc"><?php echo $helper->get('description', $i) ?></div>
						<?php endif ; ?>
					</div>
				</div>
				<?php if($helper->get('link', $i)) : ?>
					</a>
				<?php endif ; ?>
			</div>
		<?php endfor ?>

		<?php if($helper->get('ft-link')) : ?>
		<div class="features-more">
			<a class="link-primary" href="<?php echo $helper->get('ft-link') ;?>" title="">
				<?php echo $helper->get('ft-title') ;?>
			</a>
		</div>
		<?php endif ; ?>
	</div>
</div>