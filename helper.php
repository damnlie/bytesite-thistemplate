<?php
// no direct access
defined('_JEXEC') or die;

// Include the helper-class
include_once dirname(__FILE__).'/helper.class.php';

// Browser detection
jimport('joomla.environment.browser');

// Variables
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$user				= JFactory::getUser();
$browser			= JBrowser::getInstance();
$config				= JFactory::getConfig();
$template			= 'templates/' . $this->template;
$menu				= $app->getMenu()->getActive();
$pageclass			= $menu->params->get('pageclass_sfx');

// Detecting Active Variables
$option				= $app->input->getCmd('option', '');
$view				= $app->input->getCmd('view', '');
$layout				= $app->input->getCmd('layout', '');
$task				= $app->input->getCmd('task', '');
$itemid				= $app->input->getCmd('Itemid', '');
//$itemid				= JSite::getMenu()->getActive()->id ;

$grid				= 12;
$gridSidebar		= 3;
$gridSidebarPos		= 'left';
$gridSidebarOffset	= 1;

// Instantiate the helper class
$helper = new ThisTemplateHelper();

// Include adjust meta tags in HEAD
$helper->adjustHead($this);

// Include CSS
$helper->loadCss($this);

// Include Analytics
$analyticsData = $helper->getAnalytics($this);

// Logo
$logo = $helper->getLogo($this);

// Load SVG Injection
if ($this->params->get('svginjection',0))
{
	$helper->getSVGInjector($this);
}

// Load Bootstrap Hover on Dropdown
// https://github.com/CWSpear/bootstrap-hover-dropdown/
if ($this->params->get('dropdownHover',1))
{
	$helper->getDropdownHover($this);
}

// Determine home
if($helper->isHome()) {
	$siteHome = "home";
} else {
	$siteHome = "sub";
}

// Determine FilterJS
// https://github.com/jiren/filter.js/
// micro templating inspired by https://github.com/jashkenas/underscore
if(strpos($pageclass, 'filterjs'))
{
	$helper->getFilterJS($this);
}
if(strpos($pageclass, 'filterjs-partners'))
{
	$helper->getFilterJSPartners($this);
}

// Add scripts
$doc->addScript($template.'/js/application.js', 'text/javascript', true, true);
if($browser->getBrowser() == 'msie' && $browser->getMajor() < 9 ) {
	$stylelink = '<!--[if lt IE 9]>' ."\n";
	$stylelink .= '<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>' ."\n";
	$stylelink .= '<![endif]-->' ."\n";
	$doc->addCustomTag($stylelink);
}

// Check upon the current page layout
$pagelayout = $this->params->get('pagelayout', '1column');

// Determine whether to show sidebar-A (@todo: Jisse, clean up this mess)
$SidebarA = false;
$SidebarB = false;

if ($this->countModules('sidebar-a'))
{
	$SidebarA = true;
}

if ($this->countModules('sidebar-b'))
{
	$SidebarB = true;
}

if (!empty($active) && $active->home == true)
{
	$SidebarA = false;
	$SidebarB = false;
}

if($SidebarA == true)
{
	$pagelayout = '2column-left';
}

if($SidebarB == true)
{
	$pagelayout = '2column-right';
}

if($SidebarA == true && $SidebarB == true)
{
	$pagelayout = '3column';
}