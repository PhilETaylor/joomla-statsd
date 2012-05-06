<?php

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

class StatsDPostHelper
{
	private static $instance = null;
	
	protected function StatsDPostHelper()
    {
	    $params =& JComponentHelper::getParams('com_statsd');
    }

    public static function &getInstance()
    {
            if (!self::$instance) {
                    self::$instance = new StatsDPostHelper();
            }

            return self::$instance;
    }
	public function updateConfig($data)
	{        
		$result = false;

		if (array_key_exists ('statsdhost', $data) && array_key_exists ('statsdport', $data) && array_key_exists ('statsdprefix', $data) && !empty($data['statsdhost']) && !empty($data['statsdport']) && !empty($data['statsdprefix'])) {
	        $db = &JFactory::getDBO();
	        $query = "UPDATE ".$db->nameQuote('#__statsd_config')." SET ".$db->nameQuote('host')."=".$db->quote($data['statsdhost']).", ".$db->nameQuote('port')."=".$data['statsdport'].", ".$db->nameQuote('prefix')."=".$db->quote($data['statsdprefix'])." WHERE ".$db->nameQuote('id')."=1";
	        $db->setQuery($query);
	
			$result = $db->query();
		}
		
		return $result;
	}
}