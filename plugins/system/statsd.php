<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD System plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				System.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgSystemStatsD extends JPlugin
{
	function plgSystemStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onAfterInitialise() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterInitialise')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterInitialise");
		}
	}

	function onAfterRoute() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterRoute')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterRoute");
		}
	}
	
	function onAfterDispatch() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterDispatch')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterDispatch");
		}
	}
	
	function onAfterRender() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterRender')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterRender");
		}
	}
}

