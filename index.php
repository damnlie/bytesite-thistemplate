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

    <header class="navbar navbar-default navbar-fixed-top mh-docs-nav" id="top" role="banner">
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
          <?php if ($this->countModules('menu')): ?>
          <jdoc:include type="modules" name="menu" style="none" />
          <?php endif; ?>
        </nav>
      </div>
    </header>

    <?php if ($this->countModules('carousel')): ?>
    <div class="fullscreenbanner-container revolution">
        <div class="fullscreenbanner revslider-initialised tp-simpleresponsive">
            <jdoc:include type="modules" name="carousel" style="standard" />
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->countModules('strapline')): ?>
    <div class="strapline">
        <div class="strapline">
            <jdoc:include type="modules" name="strapline" style="standard" />
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->countModules('top')): ?>
    <div class="light-wrapper">
        <div class="container inner">
            <jdoc:include type="modules" name="top" style="none" />
        </div>
    </div>
    <?php endif; ?>

    <div class="container inner">
        <div class="row">
            <?php if ($this->countModules('left')): ?>
            <aside class="col-md-<?php echo $gridSidebar; ?>">
                <section class="sidebar left-sidebar">
                    <jdoc:include type="modules" name="left" style="standard" />
                </section>
            </aside>
            <?php endif; ?>

            <?php if (!$isFrontpage || $frontpageshow): ?>
            <div class="col-md-<?php echo $span;?>">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </div>
            <?php endif; ?>

            <?php if ($this->countModules('right')) : ?>
            <aside class="col-md-<?php echo $gridSidebar; ?> <?php if($offset) { echo 'col-md-offset-' . $gridSidebarOffset; } ?>">
                <section class="sidebar right-sidebar">
                    <jdoc:include type="modules" name="right" style="standard" />
                </section>
            </aside>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($this->countModules('middle')): ?>
    <div class="black-wrapper inner">
        <div class="container">
            <jdoc:include type="modules" name="middle" style="none" />
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->countModules('bottom1')): ?>
    <div class="light-wrapper">
        <div class="container inner">
            <jdoc:include type="modules" name="bottom1" style="none" />
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->countModules('bottom2')): ?>
    <div class="black-wrapper">
        <div class="inner">
            <jdoc:include type="modules" name="bottom2" style="none" />
        </div>
    </div>
    <?php endif; ?>

    <?php if ($this->countModules('footer1')): ?>
    <div class="light-wrapper">
        <div class="container inner">
            <jdoc:include type="modules" name="footer1" style="none" />
        </div>
    </div>
    <?php endif; ?>

    <div class="clear"></div>
<main id="content-wrapper">

</main>


    <footer id="footer" class="footer-wrapper">
        <?php if ($this->countModules('contact')): ?>
        <section class="footer-contact padding-top-3x">
            <div class="container">
                <jdoc:include type="modules" name="contact" style="none" />
            </div>
        </section>
        <?php endif; ?>

        <?php if ($this->countModules('footer')): ?>
        <section class="footer-nav padding-both-4x">
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

    <?php if ($totop) : ?>
    <a href="#" class="go-top">Back to Top <i class="fa fa-arrow-circle-up"></i></a>
    <?php endif; ?>
</div>


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
