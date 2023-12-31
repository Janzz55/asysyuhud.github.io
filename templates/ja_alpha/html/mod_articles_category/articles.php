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
?>
<div class="category-grid-view article-list<?php echo $moduleclass_sfx; ?>" >
	<div class="container-sm">
		<div class="row">
			<?php if ($grouped) : ?>
				<?php foreach ($list as $group_name => $group) : ?>
					<?php foreach ($group as $item) : ?>
						<div class="col-12 col-sm-12 col-lg-4 col">
						<div class="item-inner">
							<?php
								// Intro Image
								$introImage = json_decode($item->images)->image_intro;
							?>
							<!-- Intro Image -->
							<div class="intro-image">
								<?php if($introImage) : ?>
									<img src="<?php echo $introImage ;?>" alt="Intro Image" />
								<?php else : ?>
									<img src="images/joomlart/default.jpg" alt="No Image" />
								<?php endif ;?>

								<?php if ($item->displayCategoryTitle) : ?>
									<span class="category">
										<?php echo $item->displayCategoryTitle; ?>
									</span>
								<?php endif; ?>
							</div>

							<div class="article-content">
								<!-- Title -->
								<?php if ($params->get('link_titles') == 1) : ?>
									<div class="title">
										<h4>
											<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
												<?php echo $item->title; ?>
											</a>
										</h4>
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

							</div>
						</div>
					</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ($list as $item) : ?>
					<div class="col-12 col-sm-12 col-lg-4 col">
						<div class="item-inner">
							<?php
								// Intro Image
								$introImage = json_decode($item->images)->image_intro;
							?>
							<!-- Intro Image -->
							<div class="intro-image">
								<?php if($introImage) : ?>
									<img src="<?php echo $introImage ;?>" alt="Intro Image" />
								<?php else : ?>
									<img src="images/joomlart/default.jpg" alt="No Image" />
								<?php endif ;?>

								<?php if ($item->displayCategoryTitle) : ?>
									<span class="category">
										<?php echo $item->displayCategoryTitle; ?>
									</span>
								<?php endif; ?>
							</div>

							<div class="article-content">
								<!-- Title -->
								<?php if ($params->get('link_titles') == 1) : ?>
									<div class="title">
										<h4>
											<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
												<?php echo $item->title; ?>
											</a>
										</h4>
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

							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
