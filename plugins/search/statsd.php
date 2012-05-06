<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD System plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				Search.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgSearchStatsD extends JPlugin
{
	function plgSearchStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onSearch($text, $phrase = '', $ordering = '', $areas = null) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentSearch')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentSearch");
		}
	}

	function onSearchAreas() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentSearchAreas')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentSearchAreas");
		}
	}

	function onContentSearch($text, $phrase = '', $ordering = '', $areas = null) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentSearch')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentSearch");
		}
	}

	function onContentSearchAreas() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentSearchAreas')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentSearchAreas");
		}
	}
}

