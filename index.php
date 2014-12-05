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

<body class="<?php
		echo
			$siteHome . '-page' .
			$option .
			' view-' . $view .
			' itemid-' . $itemid .
			($pageclass ? ' ' . $pageclass : '')
		;?>" itemscope itemtype="http://schema.org/WebPage">

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
			<jdoc:include type="modules" name="nav" style="no" />
			<?php endif; ?>

			<?php if ($this->countModules('user')): ?>
			<jdoc:include type="modules" name="user" style="no" />
			<?php endif; ?>

			<?php if ($this->countModules('search')): ?>
			<jdoc:include type="modules" name="search" style="standard" />
			<?php endif; ?>
		</nav>
		</div>
	</header>


	<main class="content-wrapper">
		<aside>
			<?php if ($this->countModules('content-top')): ?>
			<jdoc:include type="modules" name="content-top" style="no" />
			<?php endif; ?>
		</aside>
		<?php
			switch($pagelayout)
			{
				case '1column':
					include_once JPATH_THEMES.'/'.$this->template.'/layouts/1column.php';
					break;

				case '2column-left':
					include_once JPATH_THEMES.'/'.$this->template.'/layouts/2column-left.php';
					break;

				case '2column-right':
					include_once JPATH_THEMES.'/'.$this->template.'/layouts/2column-right.php';
					break;

				case '3column':
					include_once JPATH_THEMES.'/'.$this->template.'/layouts/3column.php';
					break;

				default:
					include_once JPATH_THEMES.'/'.$this->template.'/layouts/1column.php';
			}
		?>
		<?php if ($this->countModules('content-bottom')): ?>
		<jdoc:include type="modules" name="content-bottom" style="no" />
		<?php endif; ?>
	</main>


	<footer id="footer" class="footer-wrapper">
		<?php if ($this->countModules('contact')): ?>
		<section class="footer-contact padding-top-4x">
			<div class="container">
				<jdoc:include type="modules" name="contact" style="no" />
			</div>
		</section>
		<?php endif; ?>

		<?php if ($this->countModules('footer')): ?>
		<section class="footer-nav padding-both-2x">
			<div class="container">
				<jdoc:include type="modules" name="footer" style="no" />
			</div>
		</section>
		<?php endif; ?>

		<?php if ($this->countModules('copyright')): ?>
		<section class="footer-copyright padding-both-05x">
			<div class="container">
				<jdoc:include type="modules" name="copyright" style="no" />
			</div>
		</section>
		<?php endif; ?>
	</footer>


	<?php if ($this->countModules('debug')): ?>
	<jdoc:include type="modules" name="debug" style="no" />
	<?php endif; ?>

<?php
	if (!empty($analyticsData) && $analyticsData['position'] == 'before_body_end') {
		echo $analyticsData['script'];
	}
?>

</body>
</html>
