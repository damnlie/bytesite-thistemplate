<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');
?>
<div class="blog<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Blog">
	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc padding-bottom-2x clearfix">
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
	?>

	<div class="" id="partners"></div>

	<?php if (!empty($this->intro_items)) : ?>
	<script>
		//<![CDATA[
		<?php
		echo 'var partners = [';
		foreach ($this->intro_items as $key => &$item) :
			$this->item = & $item;
			echo $this->loadTemplate('item');
			$counter++;
			if (($counter != $introcount)) :
			 echo ',';
			endif;
		endforeach;
		echo '];';
		?>
		//]]>
	</script>

	<script id="partner-template" type="text/html">
		<div class="partner col-sm-6 col-md-4 padding-top">
			<a href="#myModal-<%= klantnr %>" data-toggle="modal" class="btn btn-block btn-clean btn-flat btn-reference">
				<img src="/images/partners/200x92/<%= klantnr %>.jpg" alt="<%= company %>" title="<%= company %>" class="img-responsive" />
				<div>meer info</div>
			</a>
			<div class="modal fade" id="myModal-<%= klantnr %>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<%= klantnr %>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel-<%= klantnr %>"><%= company %></h4>
							<% if (typeof(domain) != "undefined") { %><a href="http://<%= domain %>" target="_blank"><%= domain %></a><% } %>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-4">
									<img src="/images/partners/200x92/<%= klantnr %>.jpg" alt="<%= company %>" title="<%= company %>" class="img-responsive" />
									<ul class="fa-ul margintop" style="margin-top:20px;">
										<% if (typeof(email) != "undefined") { %><li><i class="fa-li fa fa-envelope-square"></i><%= email %></li><% } %>
										<% if (typeof(phone) != "undefined") { %><li><i class="fa-li fa fa-phone-square"></i><%= phone %></li><% } %>
										<% if (typeof(twitter) != "undefined") { %><li><i class="fa-li fa fa-twitter-square"></i><%= twitter %></li><% } %>
										<% if (typeof(provincie) != "undefined") { %><li><%= provincie %></li><% } %>
									</ul>
								</div>
								<div class="col-sm-8">
									<p><% if (typeof(description) != "undefined") { %><%= description %><% } %></p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<dl class="dl-horizontal text-left">
								<% if (typeof(platform)   != "undefined") { %><dt>platform</dt><dd><%= platform %></dd><% } %>
								<% if (typeof(specialism) != "undefined") { %><dt>specialisatie</dt><dd><%= specialism %></dd><% } %>
								<% if (typeof(activity)   != "undefined") { %><dt>werkzaamheden</dt><dd><%= activity %></dd><% } %>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</script>
	<?php endif; ?>

</div>
