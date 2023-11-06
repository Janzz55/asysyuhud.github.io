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
$count=$helper->getRows('data-style-1.stats-count');
?>

<div class="acm-stats style-1">
    <ul class="stats-list row">

      <?php for ($i=0; $i<$count; $i++) : ?>
      <?php if ($helper->get ('data-style-1.stats-count', $i)) : ?>
      <?php
      	$colNumber = 2;
  			if($count<12 && (12%$count==0)) {
  				$colNumber = $count;
  			} elseif(12%$count!=0) {
  				$colNumber = $count-1;
  			}
  		?>
      <li class="col py-3 py-lg-0 col-12 col-md-6 col-lg-<?php echo (12/$colNumber) ?> stats-asset" >
        <div class="stats-inner">
          <span class="stats-item-counter h2 text-primary">
      			<?php echo $helper->get ('data-style-1.stats-count', $i) ?>
      		</span>

          <?php if ($helper->get ('data-style-1.stats-name', $i)) : ?>
            <span class="stats-subject h5"><?php echo $helper->get ('data-style-1.stats-name', $i) ?></span>
          <?php endif; ?>
        </div>
      </li>
      <?php endif; ?>
    <?php endfor;?>
    </ul>
</div>