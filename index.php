<?php

define('USERNAME', '');
define('AUTHTOKEN', '');

include 'SG-iCalendar/SG_iCal.php';

$ical = new SG_iCalReader(
  'http://sict.moodle.aau.dk/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming&username='
  . USERNAME . '&authtoken='
  . AUTHTOKEN
);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator();

$icalGenerator->generate($ical);

