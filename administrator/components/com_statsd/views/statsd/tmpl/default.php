<?php
/**
 * @version             $Id: default.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHTML::_('behavior.framework');
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');

?>

<script type="text/javascript">
Joomla.submitbutton = function(task) {
        if (task != 'statsd.post' || document.formvalidator.isValid(document.id('statsd-form'))) {
                Joomla.submitform(task, document.getElementById('statsd-form'));
        }
}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_statsd'); ?>" method="post" name="adminForm" id="statsd-form">
<div>
	<fieldset class="adminform">
        <legend><?php echo JText::_( 'COM_STATSD_VIEW_CONFIG_TITLE' ); ?></legend>
        <ul class="adminformlist">
            <?php foreach($this->form->getFieldset('statsdconfig') as $field): ?>
                    <li>
                            <?php echo $field->label; ?>
                            <?php echo $field->input; ?>
                    </li>
            <?php endforeach; ?>
        </ul>
	</fieldset>
</div>

<div>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
</div>

</form>
