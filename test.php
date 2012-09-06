<?php
include 'SG-iCalendar/SG_iCal.php';

$ical = new SG_iCalReader("http://sict.moodle.aau.dk/calendar/export_execute.php?preset_what=all&preset_time=recentupcoming&username=nspo11%40student.aau.dk&authtoken=37c6068f91a65bb349ac4fe65933bd1dcc3a8928");

foreach ($ical->getEvents() as $event) {
  echo $event->getStart() . PHP_EOL;
}
