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
// no direct access
defined('_JEXEC') or die;
$input = JFactory::getApplication()->input;
$option = $input->get('option');
$view = $input->get('view');
$id = $input->get('id');
?>
<?php foreach ($list as $item) : ?>
  <?php 
  if ($option === 'com_content' && $view === 'category' && $id == $item->id) {
    $class = 'active';
  } else {
      $class = '';
  }
  ?>
  <li class="<?php echo $class ?>">
    <a class="heading-link" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
      <?php echo $item->title; ?>
    </a>
    <?php
    if ($params->get('show_description', 0)) {
      echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content');
    }
    if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && count($item->getChildren())) {
      echo '<ul>';
      $temp = $list;
      $list = $item->getChildren();
      require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items');
      $list = $temp;
      echo '</ul>';
    }
    ?>
  </li>
<?php endforeach; ?>