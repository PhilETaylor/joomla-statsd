<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD K2 plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				K2.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2'.DS.'lib'.DS.'k2plugin.php');

class plgK2StatsD extends K2Plugin
{
	function plgK2StatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onK2PrepareContent( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];
		
		if ($this->params->get('onK2PrepareContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2PrepareContent");
		}
	}

	function onK2AfterDisplay( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2AfterDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2AfterDisplay");
		}
	}

	function onK2BeforeDisplay( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2BeforeDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2BeforeDisplay");
		}
	}

	function onK2AfterDisplayTitle( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2AfterDisplayTitle')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2AfterDisplayTitle");
		}
	}

	function onK2BeforeDisplayContent( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2BeforeDisplayContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2BeforeDisplayContent");
		}
	}
	
	function onK2AfterDisplayContent( &$item, &$params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2AfterDisplayContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2AfterDisplayContent");
		}
	}
	
	function onK2CategoryDisplay( & $category, & $params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2CategoryDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2CategoryDisplay");
		}
	}
	
	function onK2UserDisplay( & $user, & $params, $limitstart) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onK2UserDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onK2UserDisplay");
		}
	}
}

