<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');
 
class StatsDController extends JController
{
	function display($cachable = false) 
	{
		JRequest::setVar('view', JRequest::getCmd('view', 'StatsD'));
 
		parent::display($cachable);
	}
}
