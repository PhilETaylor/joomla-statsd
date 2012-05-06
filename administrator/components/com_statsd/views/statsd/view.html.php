<?php
/**
 * @version             $Id: view.html.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die('Restricted access');

require_once( JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_statsd' . DS . 'helpers' . DS . 'statsdview.php' );

jimport('joomla.application.component.view');

class StatsDViewStatsD extends StatsDView
{
	protected $form;
    
	function display($tpl = null) 
	{
		$this->form = $this->get('Form');	
		$items = $this->get('Items');
 
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		$this->items = $items;

        $this->addLogoAndTitle(JText::_('COM_STATSD_MENU_CONFIGURATION'));
        JToolBarHelper::publish('statsd.post');
        $this->addToolbar();

		parent::display($tpl);
	}
}
