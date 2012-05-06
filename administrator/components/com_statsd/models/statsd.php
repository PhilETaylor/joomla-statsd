<?php
/**
 * @version             $Id: statsd.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die('Restricted access');

require_once (JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . 'statsdposthelper.php');

jimport( 'joomla.application.component.modelform' );

class StatsDModelStatsD extends JModelForm
{
    public function getForm($data = array(), $loadData = true)
    {
            // Get the form.
            $form = $this->loadForm('com_statsd.statsd', 'statsd', array('control' => 'jform', 'load_data' => $loadData));
            if (empty($form)) {
                    $form = false;
            }

            return $form;
    }


    protected function loadFormData()
    {
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM `#__statsd_config` LIMIT 1;";
			$db->setQuery($query);
			$row = $db->loadRow();

			$data->statsdhost=$row['1'];
			$data->statsdport=$row['2'];
			$data->statsdprefix=$row['3'];

            return $data;
    }

    function post($data)
    {
        $helper =& StatsDPostHelper::getInstance();
        $result = $helper->updateConfig($data);

        return $result;
    }
}
