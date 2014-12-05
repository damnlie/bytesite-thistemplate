<?php
defined('_JEXEC') or die;
?>

<div class="row">
	<div class="col-sm-6 col-sm-push-3 col-md-6 col-md-push-3">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</div>
	<div class="col-sm-3 col-sm-pull-6 col-md-3 col-md-pull-6">
		<jdoc:include type="modules" name="sidebar-a" style="none" />
	</div>
	<div class="col-sm-3 col-md-3">
		<jdoc:include type="modules" name="sidebar-b" style="none" />
	</div>
</div>