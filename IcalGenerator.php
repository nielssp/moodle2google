<?php

class IcalGenerator {

  private $text = false;
  
  private $remove = array();

  public function __construct() {
    if (isset($_GET['debug'])) {
      $this->text = true;
    }
    if (isset($_GET['remove'])) {
      $this->remove = $this->csvToArray($_GET['remove']);
    }
    else {
      $this->remove = array('AD2', 'DEB2');
    }
  }
  
  private function csvToArray($input) {
    // TODO: Improve? (like str_getcsv()? (PHP5.3+))
    if (empty($input)) {
      return array();
    }
    return explode(',', $input);
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
    $summary = $event->getSummary();
    foreach ($this->remove as $needle) {
      if (strpos($summary, $needle) !== false) {
        return;
      }
    }
    $summaryArray = explode(' - ', $event->getSummary());
    list( , $course) = explode(' ', $summaryArray[0], 2);
    preg_match('/^(.+?) (\(.+?\))/', $course, $matches);
    $course = $matches[1];
    $thing = $matches[2];
    $note = $summaryArray[1]
    list( , $place) = explode(' ', $summaryArray[4], 2);
    include 'views/vevent.php';
  }
}
