<?php
/**
 * @version		$Id: uninstall.statsd.php
 * @package		StatsD
 * @author		Michael Marod
 * @copyright		Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.installer.installer');

$status = new JObject();
$status->plugins = array();

$plugins = &$this->manifest->xpath('plugins/plugin');
foreach($plugins as $plugin){
	$pname = $plugin->getAttribute('plugin');
	$pgroup = $plugin->getAttribute('group');
	$db = & JFactory::getDBO();
	$query = "SELECT ".$db->nameQuote('extension_id')." FROM ".$db->nameQuote('#__extensions')." WHERE ".$db->nameQuote('type')."=".$db->Quote('plugin')." AND ".$db->nameQuote('element')." = ".$db->Quote($pname)." AND ".$db->nameQuote('folder')." = ".$db->Quote($pgroup);
	$db->setQuery($query);
	$IDs = $db->loadResultArray();
	if (count($IDs)) {
		foreach ($IDs as $id) {
			$installer = new JInstaller;
			$result = $installer->uninstall('plugin', $id);
		}
	}
}
