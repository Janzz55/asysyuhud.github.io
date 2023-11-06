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

<div class="acm-contact-info">
  <div class="contact-follow d-flex">
  	<?php for ($i=0; $i<$count; $i++) : ?>
    	<div class="contact-inner">
        <span class="text-primary"><?php echo $helper->get('ct-label', $i) ;?></span>
    		
        <a href="<?php echo $helper->get('link', $i) ;?>" title="<?php echo $helper->get('title', $i) ;?>">
    			<span class="contact-title"><?php echo $helper->get('title', $i) ;?></span>
    		</a>
    	</div>
    <?php endfor ?>
  </div>
</div>
