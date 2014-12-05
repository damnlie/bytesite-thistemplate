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

	<div class="partners content" id="partners">
	</div>

	<?php if (!empty($this->intro_items)) : ?>
	<script>
		//<![CDATA[
		<?php
		echo 'var Partners = [';
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
	<script id="template" type="text/html">
		<div class="partner-blocks col-onethird">
			<!-- Button to trigger modal -->
			<a href="#myModal-{{klantnr}}" role="button" class="btn btn-large btn-clean btn-flat btn-reference" data-toggle="modal">
				<img src="/images/partners/200x92/{{klantnr}}.jpg" alt="{{company}}" title="{{company}}" width="200" height="92" />
				<div>meer info</div>
			</a>
			
			<!-- Modal -->
			<div id="myModal-{{klantnr}}" class="modal modal-large hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-body">
					<div class="row-fluid">
						<div class="span4">
							<img src="/images/partners/200x92/{{klantnr}}.jpg" alt="{{company}}" title="{{company}}" width="200" height="92" />
							<ul class="unstyled margintop" style="margin-top:20px;">
								<li>website: <a href="http://{{domain}}" target="_blank">{{domain}}</a></li>
								{{#phone}}<li>telefoon: {{phone}}</li>{{/phone}}
								{{#email}}<li>e-mail: {{email}}</li>{{/email}}
								{{#twitter}}<li>twitter: {{twitter}}</li>{{/twitter}}
								{{#provincie}}<li>{{provincie}}</li>{{/provincie}}
							</ul>
						</div>
						<div class="span8">
							<h4>{{company}}</h4>
							<p>{{description}}</p>
							<ul class="unstyled">
								<li><i>platform</i>: {{platforms}}</li>
								<li><i>specialisatie</i>: {{specialisms}}</li>
								<li><i>werkzaamheden</i>: {{activities}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</script>
	<script id="platform_template" type="text/html">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="{{platform}}"> {{platform}}
			</label>
		</div>
	</script>
	<script id="specialism_template" type="text/html">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="{{specialism}}"> {{specialism}}
			</label>
		</div>
	</script>
	<script id="activity_template" type="text/html">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="{{activity}}"> {{activity}}
			</label>
		</div>
	</script>
	<script id="provincie_template" type="text/html">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="{{provincie}}"> {{provincie}}
			</label>
		</div>
	</script>
	<?php endif; ?>

</div>
