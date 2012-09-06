<?php

define('USERNAME', 'nspo11@student.aau.dk');
define('AUTHTOKEN', '37c6068f91a65bb349ac4fe65933bd1dcc3a8928');

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

