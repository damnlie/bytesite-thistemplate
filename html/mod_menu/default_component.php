<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? $item->anchor_css : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';

if ($item->menu_image)
{
	$item->params->get('menu_text', 1) ?
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	$linktype = $item->title;
}

// Add Bootstrap caret
if ($item->isParentAnchor)
{
	$linktype .= ' <span class="caret"></span>';
	$class .= 'dropdown-toggle';
	$attributes = 'data-toggle="dropdown" data-hover="dropdown"';
}

$flink = $item->flink;

switch ($item->browserNav)
{
	default:
	case 0:
?><a href="<?php echo $flink; ?>" <?php echo $title; ?> class="<?php echo $class; ?>" <?php echo $attributes; ?>><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?> class="<?php echo $class; ?>" <?php echo $attributes; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// Use JavaScript "window.open"
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $params->get('window_open');
			?><a href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" class="<?php echo $class; ?>" <?php echo $title; ?> <?php echo $attributes; ?>><?php echo $linktype; ?></a><?php
		break;
}
