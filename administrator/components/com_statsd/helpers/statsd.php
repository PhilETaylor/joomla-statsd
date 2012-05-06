<?php
/**
 * @version             $Id: statsd.php
 * @package             StatsD
 * @author              Michael Marod
 * @copyright           Copyright (c) 2012 Michael Marod. All rights reserved.
 * @license             GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die;

class StatsD {
	public static function getConfig() {
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM ".$db->nameQuote("#__statsd_config")." LIMIT 1;";
		$db->setQuery($query);
		$row = $db->loadRow();

		return $row;
	}

    public static function timing($stat, $time, $sampleRate=1) {
        StatsD::send(array($stat => "$time|ms"), $sampleRate);
    }

    public static function increment($stats, $sampleRate=1) {
        StatsD::updateStats($stats, 1, $sampleRate);
    }

    public static function decrement($stats, $sampleRate=1) {
        StatsD::updateStats($stats, -1, $sampleRate);
    }

    public static function updateStats($stats, $delta=1, $sampleRate=1) {
        if (!is_array($stats)) { $stats = array($stats); }
        $data = array();
        foreach($stats as $stat) {
            $data[$stat] = "$delta|c";
        }

        StatsD::send($data, $sampleRate);
    }

    public static function send($data, $sampleRate=1) {
		$myConfig=StatsD::getConfig();
		$host=$myConfig['1'];
		$port=$myConfig['2'];

        // sampling
        $sampledData = array();

        if ($sampleRate < 1) {
            foreach ($data as $stat => $value) {
                if ((mt_rand() / mt_getrandmax()) <= $sampleRate) {
                    $sampledData[$stat] = "$value|@$sampleRate";
                }
            }
        } else {
            $sampledData = $data;
        }

        if (empty($sampledData)) { return; }

        // Wrap this in a try/catch - failures in any of this should be silently ignored
        try {
            $fp = fsockopen("udp://$host", $port, $errno, $errstr);
            if (! $fp) { return; }
            foreach ($sampledData as $stat => $value) {
                fwrite($fp, "$stat:$value");
            }
            fclose($fp);
        } catch (Exception $e) {
        }
    }
}

?>
