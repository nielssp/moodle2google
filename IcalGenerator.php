<?php

class IcalGenerator {

  private $text = false;

  public function __construct() {
    if (isset($_GET['debug'])) {
      $this->text = true;
    }
  }
  
  public function generate(SG_iCalReader $ical) {
    if ($this->text) {
      header('Content-Type:text/plain');
    }
    else {
      header('Content-Type:text/calendar');
    }
    $events = $ical->getEvents();
    if (!is_array($events)) {
      echo 'ERROR';
    }
    else {
      include 'views/vcalendar.php';
    }
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
    if (strpos($note, 'SU(ENG)') !== false) {
      return;
    }
    list( , $place) = explode(' ', $summaryArray[4], 2);
    include 'views/vevent.php';
  }
}
