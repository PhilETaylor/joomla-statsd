<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD Content plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				Content.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgContentStatsD extends JPlugin
{
	function plgContentStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onAfterDisplay() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterDisplay");
		}
	}
	
	function onContentAfterSave() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentAfterSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentAfterSave");
		}
	}
	
	function onAfterDisplayTitle() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onAfterDisplayTitle')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onAfterDisplayTitle");
		}
	}
	
	function onContentAfterDisplay() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onContentAfterDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onContentAfterDisplay");
		}
	}
	
	function onPrepareContent() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onPrepareContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onPrepareContent");
		}
	}
	
	function onBeforeDisplay() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onBeforeDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onBeforeDisplay");
		}
	}
	
	function onContentBeforeSave() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onBeforeContentSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onBeforeContentSave");
		}
	}
	
	function onContentBeforeDisplay() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onBeforeDisplayContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onBeforeDisplayContent");
		}
	}
	
	function onPrepareContentForm() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onPrepareContentForm')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onPrepareContentForm");
		}
	}
	
	function onPrepareContentData() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onPrepareContentData')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onPrepareContentData");
		}
	}
}

