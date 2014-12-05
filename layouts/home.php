<?php
defined('_JEXEC') or die;
?>

<div class="col-xs-12">
	<jdoc:include type="message" />
	<div class="row">
		<div class="col-xs-12">
			module slideshow
		</div>
	</div>
	<div class="row">
		<?php if ($this->countModules('home-brandslider')): ?>
		<div class="col-xs-12 text-center">
			<jdoc:include type="modules" name="home-brandslider" style="no" />
		</div>
		<?php endif; ?>
	</div>
	<div class="row">
		<?php if ($this->countModules('home-bottom-left')): ?>
		<div class="col-sm-4">
			<jdoc:include type="modules" name="home-bottom-left" style="standard" />
		</div>
		<?php endif; ?>
		<?php if ($this->countModules('home-bottom-middle')): ?>
		<div class="col-sm-4">
			<jdoc:include type="modules" name="home-bottom-middle" style="standard" />
		</div>
		<?php endif; ?>
		<?php if ($this->countModules('home-bottom-right')): ?>
		<div class="col-sm-4">
			<jdoc:include type="modules" name="home-bottom-right" style="standard" />
		</div>
		<?php endif; ?>
	</div>
</div>