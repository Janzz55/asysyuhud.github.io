<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * html5 (chosen html5 tag and font header tags)
 */

defined('_JEXEC') or die;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs  = $displayData['attribs'];


$badge          = preg_match ('/badge/', $params->get('moduleclass_sfx'))? '<span class="badge">&nbsp;</span>' : '';
$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'));
$headerTag      = htmlspecialchars($params->get('header_tag', 'h4'));
$headerClass    = $params->get('header_class');
$bootstrapSize  = $params->get('bootstrap_size');
$moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Sub Align
$titleSpace = 'spacer-normal';

if($params->get('title-space')) {
	$titleSpace = 'spacer-small';
}

// Sub Color
$subColor = $params->get('sub-color', 'normal');
$titleColor = $params->get('title-color', 'normal');

$decor = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="4" cy="4" r="4" fill="#3F3836"/>
<circle cx="4" cy="16" r="4" fill="#EC4E4F" class="fill-primary"/>
<circle cx="16" cy="4" r="4" fill="#EC4E4F" class="fill-primary"/>
<circle cx="16" cy="16" r="4" fill="#3F3836"/>
</svg>';

if($subColor == 'white') {
	$decor = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="4" cy="4" r="4" fill="white"/>
<circle cx="4" cy="16" r="4" fill="#A83E3E" class="fill-dark"/>
<circle cx="16" cy="4" r="4" fill="#A83E3E" class="fill-dark"/>
<circle cx="16" cy="16" r="4" fill="white"/>
</svg>';
}


// Sub Heading
$moduleSub = '';

if($params->get('sub-heading')) {
	$moduleSub = '<span class="sub-heading text-primary text-'.$subColor.'">'.$decor.' '.$module->title.'</span>';
}

// Mod Title
$modTitle = '';

if($module->showtitle != 0) {
	$modTitle = '<'.$headerTag.' class="section-title h2 text-'.$titleColor.' '.$headerClass.'"><span>'.$params->get('sub-heading').'</span></'.$headerTag.'>';
}

if (!empty ($module->content)) {
	$html = "<{$moduleTag} class=\"t4-section-inner section{$moduleClassSfx} {$moduleClass}\" id=\"Mod{$module->id}\">" .
				"<div class=\"section-inner\">" . $badge;

	if ($module->showtitle != 0 || $params->get('sub-heading')) {
		$html .= "<div class=\"container\"><div class=\"section-title-wrap {$titleSpace}\">{$moduleSub}{$modTitle}</div></div>";
	}

	$html .= "<div class=\"section-ct\">{$module->content}</div></div></{$moduleTag}>";

	echo $html;
}