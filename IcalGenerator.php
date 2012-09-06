<?php

class IcalGenerator {
  
  public function generate(SG_iCalReader $ical) {
    if (isset($_GET['debug'])) {
      header('Content-Type:text/plain');
    }
    else {
      header('Content-Type:text/calendar');
    }
    $events = $ical->getEvents();
    include 'views/vcalendar.php';
  }

  public function viewEvent(SG_iCal_VEvent $event) {
    $summaryArray = explode(' - ', $event->getSummary());
    list( , $course) = explode(' ', $summaryArray[0], 2);
    preg_match('/^(.+?) (\(.+?\))/', $course, $matches);
    $course = $matches[1];
    $thing = $matches[2];
    $note = $summaryArray[1];
    if (strpos($note, 'AD2') !== false) {
      return;
    }
    if (strpos($note, 'DEB2') !== false) {
      return;
    }
    list( , $place) = explode(' ', $summaryArray[4]);
    include 'views/vevent.php';
  }
}
