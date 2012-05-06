joomla-statsd
=============

Joomla StatsD Component

This component hooks into the Joomla event system and sends messages to a StatsD server when events occur. There is one component and 7 plugins. The component is used to configure the StatsD server and supply a prefix for the messages that are sent. The plugins hook into the event system and send messages to the configured StatsD server.

Install 
============
1. Go to the Extension Manager and install the zip file.

StatsD Server Configuration
============
1. In the Components menu in the Administrator interface, click on StatsD.
2. Supply the StatsD server and port as well as a prefix. An example prefix would be 'applications.michaelmarod.'. Be sure to include the trailing period.
3. Click publish.

Plugin Configuration
============
1. Go to the Plugin Manager and you will notice there are 7 new plugins called 'StatsD [Event]' that are by default disabled. Enable the ones you care about.
2. Each plugin has different hooks. Click the plugin name then pick and choose which hooks you want to enable in the configuration panel.
