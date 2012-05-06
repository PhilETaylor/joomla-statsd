<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD System plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				User.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgUserStatsD extends JPlugin
{
	function plgUserStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onUserBeforeDelete($user) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserBeforeDelete')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserBeforeDelete");
		}
	}
	
	function onUserAfterDelete($user, $success, $msg) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserAfterDelete')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserAfterDelete");
		}
	}
	
	function onUserBeforeSave($user, $isnew) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserBeforeSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserBeforeSave");
		}
	}
	
	function onUserAfterSave($user, $isnew, $success, $msg) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserAfterSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserAfterSave");
		}
	}
	
	function onUserLogin($user, $options) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserLogin')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserLogin");
		}
		
		return true;
	}
	
	function onUserLogout($user) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserLogout')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserLogout");
		}
		
		return true;
	}
}

