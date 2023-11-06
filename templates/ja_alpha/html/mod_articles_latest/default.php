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
$moduleclass_sfx = $params->get('moduleclass_sfx','');
?>
<ul class="latestnews<?php echo $params->get ('moduleclass_sfx') ?>">
<?php foreach ($list as $item) :  ?>
	<li class="clearfix" >
		<?php if(json_decode($item->images)->image_intro) :?>
			<img src="<?php echo json_decode($item->images)->image_intro; ?>" alt="" />
		<?php endif ;?>
		<a href="<?php echo $item->link; ?>">
			<span>
				<?php echo $item->title; ?>
			</span>
		</a>
	</li>
<?php endforeach; ?>
</ul>
