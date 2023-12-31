<?php
/**
T4 Overide
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use T4\Helper\J3J4;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = Factory::getUser();
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

if(version_compare(JVERSION, '4', 'ge')){
	$currentDate       = Factory::getDate()->format('Y-m-d H:i:s');
	$isExpired         = !is_null($this->item->publish_down) && $this->item->publish_down < $currentDate;
	$isNotPublishedYet = $this->item->publish_up > $currentDate;
	$isUnpublished     = $this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $isNotPublishedYet || $isExpired;
}else{
	$isExpired         = (strtotime($this->item->publish_down) < strtotime(Factory::getDate())) && $this->item->publish_down != Factory::getDbo()->getNullDate();
	$isNotPublishedYet = strtotime($this->item->publish_up) > strtotime(Factory::getDate());
	$isUnpublished     = J3J4::checkUnpublishedContent($this->item);
}

// Custom field
$extrafields = new JRegistry($this->item->attribs);

$logo 		= $extrafields->get('logo');
$mask 		= $extrafields->get('mask');
$actTitle = $extrafields->get('act-title');
$actPhone = $extrafields->get('act-phone');
$actDesc 	= $extrafields->get('act-desc');
$actLiti 	= $extrafields->get('act-link-title');
$actLink 	= $extrafields->get('act-link');

$faqList = $extrafields->get('faq-list');
$faqTitle = $extrafields->get('faq-title');

$cliTitle = $extrafields->get('clients-title');
$cliCols = $extrafields->get('clients-cols');
$cliList = $extrafields->get('client-list');
$countList = count((array)$cliList);
?>


<div class="com-content-article view-services-detail item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? Factory::getApplication()->get('language') : $this->item->language; ?>">

	<div class="row">
		<div class="col-lg-12">
			<?php if($params->get('show_category')) :?>
		    <?php echo LayoutHelper::render('joomla.content.info_block.category', array('item' => $this->item, 'params' => $params)); ?>
		  <?php endif;?>

			<?php if ($this->params->get('show_page_heading')) : ?>
			<div class="page-header">
				<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
			</div>
			<?php endif; ?>

			<?php // Todo Not that elegant would be nice to group the params ?>
			<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
			|| $params->get('show_hits') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

			<?php if (!$useDefList && $this->print) : ?>
				<div id="pop-print" class="btn hidden-print clearfix">
					<?php echo HTMLHelper::_('icon.print_screen', $this->item, $params); ?>
				</div>
			<?php endif; ?>

			<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
			<div class="page-header">
				<?php if ($params->get('show_title')) : ?>
					<h2 itemprop="headline">
						<?php echo $this->escape($this->item->title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($isUnpublished) : ?>
					<span class="label label-warning"><?php echo Text::_('JUNPUBLISHED'); ?></span>
				<?php endif; ?>

				<?php if ($isNotPublishedYet) : ?>
					<span class="badge badge-warning"><?php echo Text::_('JNOTPUBLISHEDYET'); ?></span>
				<?php endif; ?>

				<?php if ($isExpired) : ?>
					<span class="badge badge-warning"><?php echo Text::_('JEXPIRED'); ?></span>
				<?php endif; ?>

			</div>
			<?php endif; ?>

			<?php if (!$this->print) : ?>
				<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
					<?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
				<?php endif; ?>
			<?php else : ?>
				<?php if ($useDefList) : ?>
					<div id="pop-print" class="btn hidden-print">
						<?php echo HTMLHelper::_('icon.print_screen', $this->item, $params); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php // Content is generated by content plugin event "onContentAfterTitle" ?>
			<?php echo $this->item->event->afterDisplayTitle; ?>

			<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
				<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
			<?php endif; ?>

			<?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
				<?php $this->item->tagLayout = new FileLayout('joomla.content.tags'); ?>
				<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
			<?php endif; ?>
		</div>
	</div>
	
	<div class="info-service-wrap row">
		<?php if ($params->get('access-view')) : ?>
		<div class="mb-3 mb-lg-0 col-lg-7 col-xl-8">
				<?php echo LayoutHelper::render('joomla.content.full_image', $this->item); ?>
		</div>
		<?php endif ;?>

		<?php if($mask || $logo || $actTitle || $actPhone || $actDesc || $actLink) :?>
		<div class="col-lg-5 col-xl-4">
			<ul class="bg-primary service-action">
				<?php if($mask) :?>
					<li class="sv-mask" style="background-image: url('<?php echo $mask ;?>');"></li>
				<?php endif ;?>

			  <?php if($logo) :?>
					<li class="sv-logo"><img src="<?php echo $logo ;?>" alt=""/></li>
				<?php endif ;?>

				<?php if($actTitle) :?>
					<li class="sv-title"><h3 class="text-white m-0"><?php echo $actTitle ;?></h3></li>
				<?php endif ;?>

				<?php if($actPhone) :?>
					<li class="sv-phone"><a href="tel:<?php echo $actPhone ;?>" title=""><?php echo $actPhone ;?></a></li>
				<?php endif ;?>

				<?php if($actDesc) :?>
					<li class="sv-desc"><?php echo $actDesc ;?></li>
				<?php endif ;?>

				<?php if($actLink) :?>
					<li class="sv-action">
						<a href="<?php echo $actLink ;?>" class="btn btn-outline-white"><?php echo $actLiti ;?></a>
					</li>
				<?php endif ;?>
			</ul>
		</div>
		<?php endif ;?>
	</div>

	

	

	<?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
		|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
		<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php if ($params->get('access-view')) : ?>
		
		<?php if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
			echo $this->item->pagination;
		endif; ?>

	<?php if (isset ($this->item->toc)) : echo $this->item->toc; endif; ?>

	<div itemprop="articleBody" class="com-content-article__body">
		<?php echo $this->item->text; ?>

		<!-- FAQ LIST -->
		<?php if(!empty($faqList)) :?>
			<?php if($faqTitle):?>
				<h3 class="mb-3 mb-lg-4"><?php echo $faqTitle ;?></h3>
			<?php endif ;?>
			<div id="accordion">
				<?php $i=0; foreach ($faqList as $key=>$value) : $i++; ?>
			  <div class="card bg-primary-light">
			    <div class="card-header" id="heading-<?php echo $i ;?>">
		        <a href="javascript:void(0)" class="<?php if($i!=1) echo 'collapsed' ;?>" data-toggle="collapse" data-target="#collapse-<?php echo $i ;?>" aria-expanded="true" aria-controls="collapse-<?php echo $i ;?>">
		          <?php echo $value->faq_title; ?>

		          <span class="float-right text-primary fa fa-plus"></span>
		        </a>
			    </div>

			    <div id="collapse-<?php echo $i ;?>" class="collapse <?php if($i==1) echo 'show' ;?>" aria-labelledby="heading-<?php echo $i ;?>" data-parent="#accordion">
			      <div class="card-body">
			       <?php echo $value->faq_desc; ?>
			      </div>
			    </div>
			  </div>
			  <?php endforeach ;?>
			</div>
	  <?php endif ;?>
	  <!-- FAQ LIST -->


	  <!-- CLIENTS -->
	  <?php if(!empty($cliList)) :?>
	  	<div class="clients-wrap mt-3 mt-5">
		  	<?php if($cliTitle):?>
					<h3 class="mb-3 mb-lg-4"><?php echo $cliTitle ;?></h3>
				<?php endif ;?>

				<div class="clients-inner">
					<?php $i=0; $i<$countList; foreach ($cliList as $key=>$value): ?>
						<?php if ($i%$cliCols==0) echo '<div class="row no-gutters">'; ?>
						<div class="col-6 col-sm-<?php echo (12/$cliCols) ;?> client-item" >
							<div class="client-img">
								<?php if($value->client_link):?>
									<a href="<?php echo $value->client_link; ?>" title="<?php echo $value->client_alt; ?>" >
								<?php endif; ?>

									<img class="img-responsive" alt="<?php echo $value->client_alt; ?>" src="<?php echo $value->client_img; ?>">

								<?php if($value->client_link):?>
									</a>
								<?php endif; ?>
							</div>
						</div> 
						
					 	<?php if ( ($i%$cliCols==($cliCols-1)) || $i==($countList-1) )  echo '</div>'; ?>
					 	
				 	<?php $i++; endforeach ;?>
				</div>
		 	</div>
	  <?php endif ;?>
	  <!-- // CLIENTS -->
	</div>

	<?php if ($info == 1 || $info == 2) : ?>
		<?php if ($useDefList) : ?>
			<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
		<?php endif; ?>

		<?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
			<?php $this->item->tagLayout = new FileLayout('joomla.content.tags'); ?>
			<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php
		if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
			echo $this->item->pagination;
		endif;
	?>

	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
		<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php // Optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
		<?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>
		<?php echo HTMLHelper::_('content.prepare', $this->item->introtext); ?>
		<?php // Optional link to let them register to see the whole article. ?>
	
		<?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
		<?php $menu = Factory::getApplication()->getMenu(); ?>
		<?php $active = $menu->getActive(); ?>
		<?php $itemId = $active->id; ?>
		<?php $link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
		<?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>

		<p class="com-content-article__readmore readmore">
			<a href="<?php echo $link; ?>" class="register">
			<?php $attribs = json_decode($this->item->attribs); ?>
			<?php
			if ($attribs->alternative_readmore == null) :
				echo Text::_('COM_CONTENT_REGISTER_TO_READ_MORE');
			elseif ($readmore = $attribs->alternative_readmore) :
				echo $readmore;
				if ($params->get('show_readmore_title', 0) != 0) :
					echo HTMLHelper::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
				endif;
			elseif ($params->get('show_readmore_title', 0) == 0) :
				echo Text::sprintf('COM_CONTENT_READ_MORE_TITLE');
			else :
				echo Text::_('COM_CONTENT_READ_MORE');
				echo HTMLHelper::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
			endif; ?>
			</a>
		</p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
		if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
			echo $this->item->pagination;
		endif;
	?>

	<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
	<?php echo $this->item->event->afterDisplayContent; ?>
</div>
