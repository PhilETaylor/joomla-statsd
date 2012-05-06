<?php
/**
 * @version             $Id: statsdview.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

abstract class StatsDView extends JView
{
        protected function addLogoAndTitle($title)
        {
	        // add logo for backend view
	        $doc =& JFactory::getDocument();
	        $style = " .icon-48-fm-logo {background-image:url(components/com_statsd/assets/statsd-logo.png); no-repeat; }";
	        $doc->addStyleDeclaration($style);

	        // title
	        JToolBarHelper::title( JText::_('COM_STATSD_NAME') . ' - Configuration', '' );
        }

        protected function addToolbar()
        {
	        // other  toolbar buttons
	        JToolBarHelper::divider();
	        JToolBarHelper::help('screen.statsd', true);
        }
}
