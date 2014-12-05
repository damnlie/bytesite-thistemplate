<?php
defined('_JEXEC') or die;
?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-push-4 col-md-9 col-md-push-3">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
		<div class="col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">
			<jdoc:include type="modules" name="sidebar-a" style="none" />
		</div>
	</div>
</div>