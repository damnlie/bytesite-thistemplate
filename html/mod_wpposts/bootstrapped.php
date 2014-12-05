<?php
/*------------------------------------------------------------------------
# mod_wpposts - WordPress Posts
# ------------------------------------------------------------------------
# author    Jesús Vargas Garita
# Copyright (C) 2010 www.joomlahill.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomlahill.com
# Technical Support:  Forum - http://www.joomlahill.com/forum
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

$target = $params->get('target', '_blank');
$title  = $params->get('show_title', 3);
$date   = $params->get('show_date', 0);
?>
<div class="wpposts<?php echo $moduleclass_sfx; ?> row no-gutter padding-top-2x">
<?php if (count($list)) : ?>
	<?php foreach ($list as $post): ?>
	<div class="wppost col-sm-4 ">
		<div class="wppost-img">
			<?php if ( $post->image ) : ?>
			<a href="<?php echo $post->link; ?>" target="<?php echo $target; ?>"><?php echo $post->image; ?></a>
			<?php endif; ?>
		</div>
		<div class="wppost-body">
			<?php if ( $title ) : ?>
			<?php echo '<h' .  $title . '>'; ?><a href="<?php echo $post->link; ?>" target="<?php echo $target; ?>"><?php echo $post->title; ?></a> <?php echo '</h' .  $title . '>'; ?>
			<?php endif; ?>
			<?php if ($date==1 || $date==2) : ?>
				<div class="post_date"><?php echo $post->displayDate; ?></div>
			<?php endif; ?>
			<?php echo $post->content; ?>
			<p><a href="<?php echo $post->link; ?>" class="btn btn-link text-uppercase" target="<?php echo $target; ?>" role="button">Lees meer</a></p>
		</div>
	</div>
	<?php endforeach; ?>
<?php endif; ?>
</div>
