<?php
/**
 * @version		$Id: install.statsd.php
 * @package		StatsD
 * @author		Michael Marod
 * @copyright		Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.installer.installer');

$db = & JFactory::getDBO();
$status = new JObject();
$status->plugins = array();
$src = $this->parent->getPath('source');

$plugins = &$this->manifest->xpath('plugins/plugin');
foreach($plugins as $plugin){
	$pname = $plugin->getAttribute('plugin');
	$pgroup = $plugin->getAttribute('group');
	$path = $src.DS.'plugins'.DS.$pgroup;
	$installer = new JInstaller;
	$result = $installer->install($path);
}
