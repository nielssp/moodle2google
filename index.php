<?php


define('PATH', dirname(__FILE__));

define('USERNAME', '');
define('AUTHTOKEN', '');

function p($path) {
  return PATH . '/' . $path;
}

include 'SG-iCalendar-replacements/SG_iCal.php';

$ical = new SG_iCalReader(
  'http://sict.moodle.aau.dk/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming&username='
  . urlencode(USERNAME) . '&authtoken='
  . urlencode(AUTHTOKEN)
);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator();

$icalGenerator->generate($ical);

