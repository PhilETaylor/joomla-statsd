<?php
/**
 * @version             $Id: controller.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

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
