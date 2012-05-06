<?php
/**
* Base class for AutoTweet backend views
*
* @version 1.0
* @author Ulli Storck
* @copyright (C) 2009-2011 Ulli Storck
* @license GNU/GPLv3 www.gnu.org/licenses/gpl-3.0.html
**/

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