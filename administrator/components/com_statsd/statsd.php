<?php
/**
 * @version             $Id: statsd.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('StatsD');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
