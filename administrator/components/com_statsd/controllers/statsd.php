<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controllerform');

class StatsDControllerStatsD extends JControllerForm
{
        public function getModel($name = 'StatsD', $prefix = 'StatsDModel', $config = array('ignore_request' => true))
        {
                $model = parent::getModel($name, $prefix, $config);
                return $model;
        }

        function post()
        {
                $data = JRequest::getVar('jform', array(), 'post', 'array');
                $model = $this->getModel();
				
				$result = $model->post($data);
				
                if(!$result) {
                        $msg = JText::_( 'COM_AUTOTWEET_MSG_ERROR_MESSAGEPOSTED' ) . ' ('.$result.') (' . $model->getError() . ')';

                } else {
                        $msg = JText::_( 'COM_AUTOTWEET_MSG_SUCCESS_MESSAGEPOSTED' );
                }

                $link   = 'index.php?option=com_statsd&view=statsd';
                $this->setRedirect($link, $msg);
        }

}
