<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>
<div class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	<?php
		$app				= JFactory::getApplication();
		$pageclass			= $this->pageclass_sfx;

		switch(true) {
			case strpos($pageclass,'com_content-vacatures'):
				echo $this->loadTemplate('vacature');
				break;

			default:
				echo $this->loadTemplate('clean');
		}
	?>
</div>
