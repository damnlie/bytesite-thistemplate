<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="reset-complete<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<header class="page-header">
		<div class="container">
			<div class="col-xs-12">	
				<h1>
					<?php echo $this->escape($this->params->get('page_heading')); ?>
				</h1>
			</div>
		</div>
	</header>
	<?php endif; ?>

	<section>
		<div class="container">
			<div class="col-sm-10 col-sm-offset-1 padding-both-2x">
				<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="form-validate form-horizontal well">
					<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
						<fieldset>
							<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field) : ?>
								<p><?php echo JText::_($fieldset->label); ?></p>
								<div class="control-group">
									<div class="control-label">
										<?php echo $field->label; ?>
									</div>
									<div class="controls">
										<?php echo $field->input; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</fieldset>
					<?php endforeach; ?>
			
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JSUBMIT'); ?></button>
						</div>
					</div>
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>
		</div>
	</section>
</div>
