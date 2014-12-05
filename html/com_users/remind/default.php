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
<div class="remind<?php echo $this->pageclass_sfx?>">
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
				<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=remind.remind'); ?>" method="post" class="form-validate">
					<p>Vul het e-mailadres in dat bij uw account hoort. Uw gebruikersnaam zal naar dit e-mailadres worden verzonden.</p>
			
					<div class="input-group col-xs-4">
						<div class="input-group-addon"><i class="fa fa-envelope-o "></i></div>
						<input type="email" name="jform[email]" class="form-control validate-email required" id="jform_email" value="" size="30" required aria-required="true" placeholder="E-mailadres" />
					</div>
			
					<br /><button type="submit" class="btn btn-primary validate">Verstuur</button>
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>
		</div>
	</section>
</div>
