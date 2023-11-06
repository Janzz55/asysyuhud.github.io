<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$moduleclass_sfx = $params->get('moduleclass_sfx','');
$topInfo = $params->get('top-info');
$btInfo = $params->get('bottom-info');
?>
<div id="mod-articles-<?php echo $module->id; ?>" class="mod-article-list <?php echo $moduleclass_sfx; ?>" >
	<?php if($topInfo) :?>
		<div class="container-sm">
			<div class="top-articles-info">
				<?php echo $topInfo ;?>
			</div>
		</div>
	<?php endif ;?>

	<div class="owl-carousel">
		<?php if ($grouped) : ?>
			<div class="alert alert-warning">
				<?php echo Jtext::_('TPL_NO_SUPPORT') ;?>
			</div>
		<?php else : ?>
			<?php foreach ($list as $item) : ?>
					<div class="item-inner bg-primary-light">
						<?php
							// Intro Image
							$introImage = json_decode($item->images)->image_intro;
							// Custom field
							$extrafields = new JRegistry($item->attribs);
							$client = $extrafields->get('client');
							$day = $extrafields->get('day');
							$type = $extrafields->get('type');
						?>
						<!-- Intro Image -->
						<div class="intro-image">
							<?php if($introImage) : ?>
								<img src="<?php echo $introImage ;?>" alt="Intro Image" />
							<?php else : ?>
								<img src="images/joomlart/default.jpg" alt="No Image" />
							<?php endif ;?>

							<?php if ($item->displayCategoryTitle) : ?>
								<span class="category-name">
									<?php echo $item->displayCategoryTitle; ?>
								</span>
							<?php endif; ?>
						</div>

						<div class="article-content">
							<!-- Title -->
							<?php if ($params->get('link_titles') == 1) : ?>
								<div class="title">
									<h3>
										<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
											<?php echo $item->title; ?>
										</a>
									</h3>
								</div>
							<?php else : ?>

								<h4>
									<?php echo $item->title; ?>
								</h4>
							<?php endif; ?>

							<?php if ($params->get('show_introtext')) : ?>
								<div class="articles-introtext">
									<?php echo $item->displayIntrotext; ?>
								</div>
							<?php endif; ?>

							<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
								<div class="mod-articles-category-tags">
									<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
								</div>
							<?php endif; ?>

							<?php if ($params->get('show_readmore')) : ?>
								<p class="articles-readmore">
									<a class="articles-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
										<?php if ($item->params->get('access-view') == false) : ?>
											<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
										<?php elseif ($readmore = $item->alternative_readmore) : ?>
											<?php echo $readmore; ?>
											<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
											<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
										<?php else : ?>
											<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
											<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php endif; ?>
									</a>
								</p>
							<?php endif; ?>
							
							<div class="article-meta">
								<?php if ($params->get('show_author')) : ?>
									<div class="articles-writtenby">
										<?php echo '<span>'.$item->displayAuthorName.'</span>'; ?>
									</div>
								<?php endif; ?>

								<?php if ($item->displayDate) : ?>
									<div class="articles-date">
										<?php echo $item->displayDate; ?>
									</div>
								<?php endif; ?>

								<?php if ($item->displayHits) : ?>
									<div class="articles-hits">
										<i class="fa fa-eye" aria-hidden="true"></i> <?php echo $item->displayHits; ?>
									</div>
								<?php endif; ?>
							</div>

							<?php if($client || $day || $type) :?>
								<ul class="list-info mt-4">
									<?php if($client) :?>
										<li><label class="text-primary"><?php echo Jtext::_('TPL_CLIENT') ;?>:</label><?php echo $client ;?></li>
									<?php endif ;?>

									<?php if($day) :?>
										<li><label class="text-primary"><?php echo Jtext::_('TPL_DAY') ;?>:</label><?php echo $day ;?></li>
									<?php endif ;?>

									<?php if($type) :?>
										<li><label class="text-primary"><?php echo Jtext::_('TPL_TYPE') ;?>:</label><?php echo $type ;?></li>
									<?php endif ;?>
								</ul>
							<?php endif ;?>

						</div>
					</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php if($btInfo) :?>
		<div class="container-sm">
			<div class="bottom-articles-info lead">
				<?php echo $btInfo ;?>
			</div>
		</div>
	<?php endif ;?>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#mod-articles-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: 2,
      singleItem : true,
      itemsScaleUp : true,
      nav : true,
      navText : ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
      dots: true,
      merge: false,
      mergeFit: true,
      margin: 36,
      slideBy: 1,
      autoHeight: false,
      animateOut: 'fadeOut',
      autoplaySpeed: 1200,
      smartSpeed: 1400,
      loop: false,
      autoplay: false,
      responsive : {
				0 : {
			    items: 1,
			    autoHeight: true
				},
				767 : {
			    items: 1,
			    autoHeight: true
				},
				1200 : {
			    items: 2,
			    autoHeight: false
				}
			}
    });
  });
})(jQuery);
</script>