<?php
defined('_JEXEC') or die;

// Load This Template Helper
include_once JPATH_THEMES.'/'.$this->template.'/helper.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
</head>

<body class="<?php echo $siteHome ; ?>-page <?php echo $option . " view-" . $view . " itemid-" . $itemid . "";?>" itemscope itemtype="http://schema.org/WebPage">

<?php 
	if (!empty($analyticsData) && $analyticsData['position'] == 'after_body_start') {
		echo $analyticsData['script'];
	}
?>

	<header class="navbar navbar-default navbar-shadow navbar-fixed-top mh-docs-nav" id="top" role="banner">
		<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".mh-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<?php echo $logo; ?>
		</div>
		<nav class="collapse navbar-collapse mh-navbar-collapse" role="navigation">
			<?php if ($this->countModules('nav')): ?>
			<jdoc:include type="modules" name="nav" style="none" />
			<?php endif; ?>
			
			<?php if ($this->countModules('user')): ?>
			<jdoc:include type="modules" name="user" style="none" />
			<?php endif; ?>
			
			<?php if ($this->countModules('search')): ?>
			<jdoc:include type="modules" name="search" style="none" />
			<?php endif; ?>
		</nav>
		</div>
	</header>

	<main class="content-wrapper">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</main>


	<footer id="footer" class="footer-wrapper">
		<?php if ($this->countModules('contact')): ?>
		<section class="footer-contact padding-top-4x">
			<div class="container">
				<jdoc:include type="modules" name="contact" style="none" />
			</div>
		</section>
		<?php endif; ?>

		<?php if ($this->countModules('footer')): ?>
		<section class="footer-nav padding-both-2x">
			<div class="container">
				<jdoc:include type="modules" name="footer" style="none" />
			</div>
		</section>
		<?php endif; ?>

		<?php if ($this->countModules('copyright')): ?>
		<section class="footer-copyright padding-both-05x">
			<div class="container">
				<jdoc:include type="modules" name="copyright" style="none" />
			</div>
		</section>
		<?php endif; ?>
	</footer>


	<?php if ($this->countModules('debug')): ?>
	<jdoc:include type="modules" name="debug" style="none" />
	<?php endif; ?>

<?php 
	if (!empty($analyticsData) && $analyticsData['position'] == 'before_body_end') {
		echo $analyticsData['script'];
	}
?>

</body>
</html>
