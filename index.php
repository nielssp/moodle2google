<?php

if (!isset($_GET['u']) || !isset($_GET['t'])) {
  echo 'Error: Must set user id and access token';
  exit;
}

$userId = $_GET['u'];
$authToken = $_GET['t'];

date_default_timezone_set('UTC');

$calendarUrl = 'http://moodle.aau.dk/calendar/export_execute.php'
  . '?preset_what=all&preset_time=recentupcoming'
  . '&userid='  . urlencode($userId)
  . '&authtoken=' . urlencode($authToken);

include 'IcalGenerator.php';

$icalGenerator = new IcalGenerator(
  isset($_GET['debug']),
  isset($_GET['remove']) ? str_getcsv($_GET['remove']) : array()
);
$icalGenerator->generate($calendarUrl);

