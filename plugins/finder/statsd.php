<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD System plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				Finder.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgFinderStatsD extends JPlugin
{
	function plgFinderStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onFinderAfterDelete($context, $table) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onFinderAfterDelete')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onFinderAfterDelete");
		}
	}
	
	function onFinderAfterSave($context, $row, $isNew) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onFinderAfterSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onFinderAfterSave");
		}
	}
	
	function onFinderBeforeSave($context, $row, $isNew) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onFinderBeforeSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onFinderBeforeSave");
		}		
	}
	
	function onFinderChangeState($context, $pks, $value) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onFinderChangeState')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onFinderChangeState");
		}
	}
	
	function onFinderCategoryChangeState($extension, $pks, $value) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onFinderCategoryChangeState')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onFinderCategoryChangeState");
		}
	}

}

