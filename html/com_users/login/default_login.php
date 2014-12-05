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
?>
<div class="login<?php echo $this->pageclass_sfx?>">
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


	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	<div class="login-description">
	<?php endif; ?>

		<?php if ($this->params->get('logindescription_show') == 1) : ?>
			<?php echo $this->params->get('login_description'); ?>
		<?php endif; ?>

		<?php if (($this->params->get('login_image') != '')) :?>
			<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT')?>"/>
		<?php endif; ?>

	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	</div>
	<?php endif; ?>

	<section>
		<div class="container">
			<div class="col-sm-10 col-sm-offset-1 padding-both-2x">
				<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate" role="form">
					<div class="form-group">
						<div class="input-group col-xs-4">
							<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
							<input type="text" name="username" id="username" value="" class="validate-username required form-control" size="25" required aria-required="true" placeholder="Gebruikersnaam" />	
						</div>
					</div>
					<div class="form-group">
						<div class="input-group col-xs-4">
							<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
							<input type="password" name="password" id="password" value="" class="validate-password required form-control" size="25" maxlength="99" required aria-required="true" placeholder="Wachtwoord" />
						</div>
					</div>
					<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
					<div id="form-login-remember" class="checkbox">
						<label>
							<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"/><?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?>
						</label>
					</div>
					<?php endif; ?>
			
					<button type="submit" class="btn btn-primary"><?php echo JText::_('JLOGIN'); ?></button>
			
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>

			<div class="col-sm-10 col-sm-offset-1 padding-bottom-2x">
				<a class="btn btn-default btn-sm" href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>"><i class="fa fa-refresh fa-fw fa-spin"></i> <?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>&nbsp;
				<a class="btn btn-default btn-sm" href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>"><i class="fa fa-refresh fa-fw fa-spin"></i> <?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>&nbsp;
				<?php
				$usersConfig = JComponentHelper::getParams('com_users');
				if ($usersConfig->get('allowUserRegistration')) : ?>
				<a class="btn btn-default btn-sm" href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><i class="fa fa-plus"></i> <?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>