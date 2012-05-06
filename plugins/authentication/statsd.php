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

class plgAuthenticationStatsD extends JPlugin
{
	function plgAuthenticationStatsD( &$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onUserAuthenticate($credentials, $options, &$response)
	{
		$myConfig=StatsD::getConfig();
		$prefix=$myConfig['3'];

		if ($this->params->get('onUserAuthenticate')) {
			StatsD::increment($prefix.".".$this->params->get('subPrefix')."onUserAuthenticate");
		}
	}
}
