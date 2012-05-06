<?php
// No direct access
defined('_JEXEC') or die;

/**
 * StatsD System plugin
 *
 * @package				StatsD.Plugin
 * @subpackage				Editors.statsd
 * @since				2.5
 */

require_once (JPATH_ADMINISTRATOR . DS . 'components' .DS. 'com_statsd' . DS . 'helpers' . DS . 'statsd.php');

jimport( 'joomla.plugin.plugin' );

class plgEditorsStatsD extends JPlugin
{
	function plgEditorsStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onInit()
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onInit')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onInit");
		}
	}

	function onSave($id) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onSave')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onSave");
		}
	}
	
	function onGetContent($id) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onGetContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onGetContent");
		}
	}
	
	function onSetContent($id, $content) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onSetContent')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onSetContent");
		}
	}
	
	function onGetInsertMethod() {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onGetInsertMethod')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onGetInsertMethod");
		}
	}
	
	function onDisplay($name, $content, $width, $height, $col, $row, $buttons = true, $id = null, $asset = null, $author = null, $params = array()) {
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onDisplay')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onDisplay");
		}	
	}
}

